<?php

namespace App;

use App\Presenters\TaxonPresenter;
use App\Support\Traits\Hashidable;
use App\Support\Traits\SortableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Translatable\HasTranslations;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Taxon extends Model implements HasPresenter, HasMedia
{
    use Hashidable;
    use HasTranslations;
    use SortableTrait;
    use Sluggable;
    use HasRecursiveRelationships;
    use HasMediaTrait;

    protected $fillable = [
        'parent_id',
        'taxonomy_id',
        'name',
        'slug',
        'description',
        'position',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public $translatable = [
        'name',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => false,
            ],
        ];
    }

    public function childs()
    {
        return $this->hasMany(Taxon::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Taxon::class, 'parent_id');
    }

    public static function forSelect()
    {
        return static::select('id', 'name')
            ->get();
    }

    public function prototypes()
    {
        return $this->belongsToMany(Prototype::class, 'prototype_taxons', 'taxon_id', 'prototype_id');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('main')
            ->singleFile();
    }

    /**
     * @inheritDoc
     */
    public function getPresenterClass()
    {
        return TaxonPresenter::class;
    }
}
