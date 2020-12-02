<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\VariantStoreRequest;
use App\Http\Requests\Admin\VariantUpdateRequest;
use App\Product;
use App\Queries\VariantQuery;
use App\Support\RedirectHelper;
use App\Variant;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class VariantController
{
    use RedirectHelper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Product $product)
    {
        $options = $product->optionTypes()->pluck('presentation', 'id');
        $variantQuery = (new VariantQuery(Variant::query()->whereProductId($product->id)->onlyNormal()))
                        ->with([
                            'optionValues' => function ($q) {
                                $q->ordered();
                            },
                            'priceMain'
                        ]);

        return view('admin.products.variants.index', [
            'variants' => $variantQuery->paginate(request('perPage')),
            'product' => $product,
            'options' => $options,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Product $product)
    {
        $options = $product->optionTypes->load('values');

        return view('admin.products.variants.create', compact('product', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VariantStoreRequest $request, Product $product)
    {
        $variant = $product->variants()->create($request->validated());
        $variant->priceMain()->create(['amount' => $request->input('price')]);
        $variant->optionValues()->sync($request->optionValues());
        Alert::success(__('Variant ":model" has been successfully created!', ['model' => $product->name]))->flash();

        return $this->redirect($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product, Variant $variant)
    {
        $options = $product->optionTypes->load('values');
        $variant->load('optionValues');

        return view('admin.products.variants.edit', compact('variant', 'product', 'options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(VariantUpdateRequest $request, Product $product, Variant $variant)
    {
        $variant->update($request->validated());
        $variant->priceMain()->update(['amount' => $request->input('price')]);
        $variant->optionValues()->sync($request->optionValues());
        Alert::success(__('Variant ":model" has been successfully updated!', ['model' => $product->name]))->flash();

        return $this->redirect($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product, Variant $variant)
    {
        $variant->delete();
        Alert::success(__('Variant ":model" has been successfully deleted!', ['model' => $product->name]))->flash();

        return response()->json([
            'status' => true,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function sortHandle(Product $product, Request $request)
    {
        $sortedIds = decodeArray($request->ids, Variant::class);
        $minPosition = Variant::whereIn('id', $sortedIds)->min('position');
        Variant::setNewOrder($sortedIds, $minPosition);

        return response()->json([
            'status' => true,
        ]);
    }

    protected function redirect(Request $request)
    {
        $submitType = $request->input('submit_type', 'back');
        if ($submitType == 'submit_and_create') {
            return redirect()->action([self::class, 'create'], ['product' => $request->route('product')]);
        }
        if ($submitType == 'submit_and_back') {
            return redirect()->action([self::class, 'index'], ['product' => $request->route('product')]);
        }

        return redirect()->back();
    }
}
