<?php

namespace App;

use App\Presenters\TaxonomyPresenter;
use App\Support\Traits\Hashidable;
use App\Support\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use McCool\LaravelAutoPresenter\HasPresenter;
use Spatie\Translatable\HasTranslations;

class Taxonomy extends Model implements HasPresenter
{
    use SortableTrait;
    use HasTranslations;
    use Hashidable;

    public $translatable = [
        'name',
    ];

    protected $fillable = [
        'name',
        'position',
    ];

    public function taxons()
    {
        return $this->hasMany(Taxon::class, 'taxonomy_id');
    }

    public function mainTaxon()
    {
        return $this->hasOne(Taxon::class, 'taxonomy_id')->whereNull('parent_id');
    }

    public function createRootTaxon()
    {
        $this->taxons()->create(['name' => $this->name, 'slug' => Str::slug($this->name)]);
    }

    /**
     * @inheritDoc
     */
    public function getPresenterClass()
    {
        return TaxonomyPresenter::class;
    }
}
