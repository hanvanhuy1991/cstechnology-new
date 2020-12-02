<?php


namespace App\Queries;

use App\Filters\FuzzyFilter;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class ProductQuery extends QueryBuilder
{
    public function __construct($builder, ?Request $request = null)
    {
        parent::__construct($builder, $request);

        $this->allowedSorts([
            AllowedSort::field('name', 'name->'.locale()),
            'created_at', 'updated_at', 'id', 'sku',
        ])
        ->allowedFilters([
            AllowedFilter::trashed(),
            AllowedFilter::custom('search', new FuzzyFilter(
                'sku',
                'name'
            )),
        ])
        ->defaultSort('-created_at');
    }
}
