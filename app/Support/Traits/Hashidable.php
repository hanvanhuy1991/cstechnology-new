<?php

namespace App\Support\Traits;

trait Hashidable
{
    public function initializeHashidable()
    {
        $this->appends[] = 'hash_key';
    }

    public function getRouteKey()
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }

    public function getHashKeyAttribute()
    {
        return \Hashids::connection(get_called_class())->encode($this->getKey());
    }

    public function scopeByHashid($query, $hashId)
    {
        $query->where($this->getQualifiedKeyName(), decode($hashId, get_called_class()));
    }

    public static function findByHashidOrFail($hashId)
    {
        return static::findOrFail(decode($hashId, get_called_class()));
    }
}
