<?php

namespace App\Http\Controllers\Admin;

use App\Taxon;
use Illuminate\Http\Request;

class TaxonSearchController
{
    public function __invoke(Request $request)
    {
        $taxons = Taxon::with(['ancestors' => function ($q) {
            $q->breadthFirst();
        }])
                    ->where('name->' . locale(), 'LIKE', '%' . $request->query('q') . '%')
                    ->paginate();

        $taxons->getCollection()->transform(function ($taxon) {
            $result = [
                'id' => $taxon->hash_key,
            ];
            $prettyName = '';
            if ($taxon->ancestors->isNotEmpty()) {
                foreach ($taxon->ancestors as $ancestor) {
                    $prettyName .= $ancestor->name . ' -> ';
                }
            }
            $prettyName .= $taxon->name;
            $result['pretty_name'] = $prettyName;

            return $result;
        });

        return response()->json($taxons);
    }
}
