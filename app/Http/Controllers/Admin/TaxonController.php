<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TaxonSortRequest;
use App\Http\Requests\Admin\TaxonStoreRequest;
use App\Http\Requests\Admin\TaxonUpdateRequest;
use App\Taxon;
use App\Taxonomy;
use Prologue\Alerts\Facades\Alert;

class TaxonController
{
    public function getTree(Taxonomy $taxonomy, Taxon $taxon)
    {
        $tree = $taxon->childs()
            ->withCount('childs')
            ->ordered()
            ->get()
            ->map(function ($child) {
                return ['id' => $child->hash_key, 'text' => $child->name, 'children' => $child->childs_count > 0];
            });

        return response()->json($tree);
    }

    public function store(TaxonStoreRequest $request)
    {
        $parentTaxon = Taxon::findOrFail($request->parentId());
        $taxon = $parentTaxon->childs()->create([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'taxonomy_id' => $parentTaxon->taxonomy_id,
        ]);

        return response()->json([
            'id' => $taxon->hash_key,
        ]);
    }

    public function update(Taxon $taxon, TaxonUpdateRequest $request)
    {
        $taxon->update($request->validated());
        if ($request->filled('new_images')) {
            $taxon->addMediaFromDisk($request->input('new_images'))->toMediaCollection('main');
        }
        if ($request->wantsJson()) {
            return response()->json(['status' => true]);
        }
        Alert::success(__('Taxon ":model" has been successfully updated!', ['model' => $taxon->name]))->flash();

        return redirect()->back();
    }

    public function destroy(Taxon $taxon)
    {
        $taxon->delete();

        return response()->json(['status' => true]);
    }

    public function sortHandle(TaxonSortRequest $request, Taxon $taxon)
    {
        $newSiblings = Taxon::whereParentId($request->parentId())->where('id', '<>', $taxon->id)
            ->ordered()
            ->pluck('id')
            ->toArray();
        $taxon->update(['parent_id' => $request->parentId(), 'position' => $request->input('position')]);
        array_splice($newSiblings, (int)$request->input('position'), 0, $taxon->id);
        Taxon::setNewOrder($newSiblings);

        return response()->json(['status' => true]);
    }

    public function edit(Taxon $taxon)
    {
        return view('admin.products.taxons.edit', compact('taxon'));
    }
}
