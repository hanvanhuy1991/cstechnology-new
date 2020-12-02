<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TaxonomyStoreRequest;
use App\Http\Requests\Admin\TaxonomyUpdateRequest;
use App\Queries\TaxonomyQuery;
use App\Taxonomy;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class TaxonomyController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxonomiesQuery = new TaxonomyQuery(Taxonomy::query());

        return view('admin.products.taxonomies.index', [
            'taxonomies' => $taxonomiesQuery->paginate(request('perPage')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.taxonomies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TaxonomyStoreRequest $request)
    {
        $taxonomy = Taxonomy::create($request->validated());
        $taxonomy->createRootTaxon();
        Alert::success(__('Taxonomy ":model" has been successfully created!', ['model' => $taxonomy->name]))->flash();

        return response()->json([
            'status' => true,
            'redirectUrl' => route('taxonomies.edit', $taxonomy->hash_key),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return void
     */
    public function edit(Taxonomy $taxonomy)
    {
        return view('admin.products.taxonomies.edit', compact('taxonomy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaxonomyUpdateRequest $request, Taxonomy $taxonomy)
    {
        $taxonomy->update($request->validated());
        Alert::success(__('Taxonomy ":model" has been successfully updated!', ['model' => $taxonomy->name]))->flash();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Taxonomy $taxonomy)
    {
        $taxonomy->delete();
        $taxonomy->taxons->each->delete();
        Alert::success(__('Taxonomy ":model" has been successfully deleted!', ['model' => $taxonomy->name]))->flash();

        return response()->json(['status' => true]);
    }

    public function sortHandle(Request $request)
    {
        $sortedIds = decodeArray($request->ids, Taxonomy::class);
        $minPosition = Taxonomy::whereIn('id', $sortedIds)->min('position');
        Taxonomy::setNewOrder($sortedIds, $minPosition);

        return response()->json([
            'status' => true,
        ]);
    }

    public function getTree(Request $request, Taxonomy $taxonomy)
    {
        $mainTaxon = $taxonomy->mainTaxon;

        return response()->json([
            ['id' => $mainTaxon->hash_key, 'text' => $mainTaxon->name, 'children' => true],
        ]);
    }
}
