<?php

namespace App\Queries;

use App\Filters\FuzzyFilter;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RoleQuery extends QueryBuilder
{
    public function __construct($builder, ?Request $request = null)
    {
        parent::__construct($builder, $request);

        $this->allowedSorts([
            'name', 'created_at', 'updated_at', 'id',
        ])
        ->allowedFilters([
            AllowedFilter::trashed(),
            AllowedFilter::custom('search', new FuzzyFilter(
                'roles.name'
            )),
        ])
        ->defaultSort('-created_at');
    }
}
