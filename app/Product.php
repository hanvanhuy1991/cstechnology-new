<?php

namespace App;

use App\Enums\VariantType;
use App\Presenters\ProductPresenter;
use App\Support\Traits\Hashidable;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use McCool\LaravelAutoPresenter\HasPresenter;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasPresenter, HasMedia
{
    use SoftDeletes;
    use Sluggable;
    use HasTranslations;
    use Hashidable;
    use HasMediaTrait;

    protected $fillable = [
        'name',
        'description',
        'status',
        'slug',
        'meta_description',
        'meta_title',
        'meta_keywords',
        'tax_category_id',
        'shipping_category_id',
        'promotionable',
        'available_on',
        'discontinue_on',
    ];

    public $translatable = [
        'name',
        'description',
        'meta_description',
        'meta_title',
        'meta_keywords',
    ];

    protected $dates = [
        'available_on',
        'discontinue_on',
    ];

    /**
     * @inheritDoc
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function variants()
    {
        return $this->hasMany(Variant::class, 'product_id');
    }

    public function variantMaster()
    {
        return $this->hasOne(Variant::class, 'product_id')->where('is_master', VariantType::Master);
    }

    public function variantNormal()
    {
        return $this->hasMany(Variant::class, 'product_id')->where('is_master', VariantType::Normal);
    }

    public function createMasterVariant($sku)
    {
        return $this->variants()->create(['sku' => $sku, 'is_master' => VariantType::Master]);
    }

    public function optionTypes()
    {
        return $this->belongsToMany(OptionType::class, 'product_option_types', 'product_id', 'option_type_id');
    }

    public function taxons()
    {
        return $this->belongsToMany(Taxon::class, 'product_taxons', 'product_id', 'taxon_id');
    }

    public function setDiscontinueOnAttribute($value)
    {
        $this->attributes['discontinue_on'] = ! empty($value) ? Carbon::createFromFormat('Y-m-d H:i', $value) : null;
    }

    public function setAvailableOnAttribute($value)
    {
        $this->attributes['available_on'] = ! empty($value) ? Carbon::createFromFormat('Y-m-d H:i', $value) : now();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_FILL, 245, 245)
            ->background('white');

        $this->addMediaConversion('small-thumb')
            ->fit(Manipulations::FIT_FILL, 100, 100)
            ->background('white');

        $this->addMediaConversion('main')
            ->fit(Manipulations::FIT_FILL, 600, 600)
            ->background('white');
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('images')
            ->useFallbackUrl('/images/placeholders/placeholder.jpg');
    }

    /**
     * @inheritDoc
     */
    public function getPresenterClass()
    {
        return ProductPresenter::class;
    }
}
