<?php

namespace App;

use App\Presenters\PrototypePresenter;
use App\Support\Traits\Hashidable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;
use Spatie\Translatable\HasTranslations;

class Prototype extends Model implements HasPresenter
{
    use Sluggable;
    use Hashidable;
    use HasTranslations;

    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'presentation',
                'onUpdate' => true,
            ],
        ];
    }

    public $translatable = [
        'presentation',
    ];

    protected $fillable = [
        'name',
        'presentation',
    ];

    public function optionTypes()
    {
        return $this->belongsToMany(OptionType::class, 'option_type_prototypes', 'prototype_id', 'option_type_id');
    }

    public function taxons()
    {
        return $this->belongsToMany(Taxon::class, 'prototype_taxons', 'prototype_id', 'taxon_id');
    }

    /**
     * @inheritDoc
     */
    public function getPresenterClass()
    {
        return PrototypePresenter::class;
    }

    public static function forSelect()
    {
        return static::select('id', 'name', 'presentation')->get();
    }
}
