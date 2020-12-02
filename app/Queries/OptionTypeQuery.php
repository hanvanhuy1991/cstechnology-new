<?php


namespace App\Queries;

use App\Filters\FuzzyFilter;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class OptionTypeQuery extends QueryBuilder
{
    public function __construct($builder, ?Request $request = null)
    {
        parent::__construct($builder, $request);

        $this->allowedSorts([
            AllowedSort::field('presentation', 'presentation->'.locale()),
            'name', 'position', 'created_at', 'updated_at', 'id',
        ])
        ->allowedFilters([
            AllowedFilter::custom('search', new FuzzyFilter(
                'name',
                'presentation'
            )),
        ])
        ->defaultSort('position');
    }
}
