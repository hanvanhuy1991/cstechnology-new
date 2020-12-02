<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\OptionValue;
use App\Product;
use App\Prototype;
use App\Queries\ProductQuery;
use App\Support\RedirectHelper;
use App\Taxon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Prologue\Alerts\Facades\Alert;

class ProductController
{
    use RedirectHelper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsQuery = new ProductQuery(Product::query()->with('variantMaster', 'media'));
        $filterCount = Product::withTrashed()
                    ->selectRaw('count(*) as total')
                    ->selectRaw("count(case when deleted_at is not null then 1 end) as trashed")
                    ->first();

        return view('admin.products.products.index', [
            'products' => $productsQuery->paginate(request('perPage', 15)),
            'filterCount' => $filterCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prototypes = Prototype::forSelect();

        return view('admin.products.products.create', compact('prototypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->validated());
        $masterVariant = $product->createMasterVariant($request->input('sku'));
        $masterVariant->prices()->create(['amount' => $request->input('price')]);
        $product->optionTypes()->attach($request->optionTypes());
        $product->taxons()->attach($request->taxons());

        if (count($request->combineVariations()) > 0) {
            foreach ($request->combineVariations() as $combineValue) {
                $optionValues = OptionValue::whereIn('id', $combineValue)->pluck('name');
                $sku = Str::studly($product->slug);
                foreach ($optionValues as $value) {
                    $sku .= '_' . Str::slug($value);
                }
                $variant = $product->variants()->create(['sku' => $sku]);
                $variant->priceMain()->create(['amount' => $request->input('price')]);
                $variant->optionValues()->attach(array_values($combineValue));
            }
        }
        Alert::success(__('Product ":model" has been successfully created!', ['model' => $product->name]))->flash();

        return redirect()->route('products.edit', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load([
            'variantMaster.priceMain',
            'taxons' => function ($query) {
                $query->with(['ancestors' => function ($q) {
                    $q->breadthFirst();
                }]);
            },
            'media',
        ]);

        return view('admin.products.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        // Remove media if not provide
        $product->load('media');
        if ($product->getMedia('images')->isNotEmpty()) {
            foreach ($product->getMedia('images') as $media) {
                if (! in_array($media->hash_key, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        // Create new media
        foreach ($request->input('new_images', []) as $image) {
            $product->addMediaFromDisk($image)->toMediaCollection('images');
        }

        $product->update($request->validated());
        // Sync taxon
        $product->taxons()->sync($request->taxons());
        // Update variant masters
        $variantMaster = $product->variantMaster;
        $variantMaster->update(['sku' => $request->input('sku'), 'cost_price' => $request->input('cost_price')]);
        $variantMaster->priceMain()->update(['amount' => $request->input('price')]);
        Alert::success(__('Product ":model" has been successfully updated!', ['model' => $product->name]))->flash();

        return $this->redirect($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Alert::success(__('Product ":model" has been successfully deleted!', ['model' => $product->name]))->flash();

        return response()->json(['status' => true]);
    }
}
