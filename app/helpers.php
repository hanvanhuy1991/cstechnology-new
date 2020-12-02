<?php

use App\Support\Filterable;
use App\User;
use Spatie\QueryString\QueryString;
use Vinkla\Hashids\Facades\Hashids;

function current_user($guard = 'web'): ?User
{
    return Auth::user($guard);
}

function locale()
{
    return config('app.locale');
}



function filter(string $name, $filterValue = null): QueryString
{
    if ($filterValue instanceof Filterable) {
        $filterValue = $filterValue->getFilterValue();
    }

    $queryString = app(QueryString::class);

    return $queryString
        ->disable('page')
        ->filter($name, $filterValue);
}


function filter_active(string $name, $filterValue = null): bool
{
    if ($filterValue instanceof Filterable) {
        $filterValue = $filterValue->getFilterValue();
    }

    $queryString = app(QueryString::class);

    return $queryString->isActive(
        $queryString->resolveFilterName($name),
        $filterValue
    );
}

function query_sort(string $value): QueryString
{
    $queryString = app(QueryString::class);

    return $queryString->sort($value);
}

function query_sort_active(string $value): bool
{
    $queryString = app(QueryString::class);

    return $queryString->isActive('sort', $value);
}

function query_string(): QueryString
{
    return app(QueryString::class);
}

function clear_filter(string $name): string
{
    $queryString = app(QueryString::class);

    return $queryString->clear($name);
}

function decodeArray(array $encodeIds, $connection = 'main')
{
    if (count($encodeIds) == 0) {
        return [];
    }
    $decodeIds = [];
    foreach ($encodeIds as $encode) {
        $decodeIds[] = Hashids::connection($connection)->decode($encode)[0] ?? null;
    }

    return $decodeIds;
}
if (! function_exists('decode')) {
    function decode($encodeId, $connection = 'main')
    {
        return Hashids::connection($connection)->decode($encodeId)[0] ?? null;
    }
}

function getCombinations($arrays)
{
    $result = [[]];
    foreach ($arrays as $property => $propertyValues) {
        $tmp = [];
        foreach ($result as $resultItem) {
            foreach ($propertyValues as $propertyValue) {
                $tmp[] = array_merge($resultItem, [$property => $propertyValue]);
            }
        }
        $result = $tmp;
    }

    return $result;
}
