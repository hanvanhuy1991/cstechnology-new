<?php

namespace App\Queries;

use App\Filters\FuzzyFilter;
use App\Sorts\FullNameSort;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class UserQuery extends QueryBuilder
{
    public function __construct($builder, ?Request $request = null)
    {
        parent::__construct($builder, $request);

        $this->allowedSorts([
            'email', 'created_at', 'updated_at', 'id',
            AllowedSort::custom('full_name', new FullNameSort()),
        ])
        ->allowedFilters([
            AllowedFilter::trashed(),
            AllowedFilter::custom('search', new FuzzyFilter(
                'users.first_name',
                'users.last_name',
                'users.email'
            )),
        ])
        ->defaultSort('-created_at');
    }
}
