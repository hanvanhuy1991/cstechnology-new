<?php

namespace App;

use App\Enums\VariantType;
use App\Presenters\VariantPresenter;
use App\Support\Traits\Hashidable;
use App\Support\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use McCool\LaravelAutoPresenter\HasPresenter;

class Variant extends Model implements HasPresenter
{
    use Hashidable;
    use SortableTrait;
    use SoftDeletes;

    protected $fillable = [
        'sku',
        'weight',
        'height',
        'width',
        'depth',
        'discontinue_on',
        'is_master',
        'product_id',
        'cost_price',
        'position',
        'track_inventory',
        'tax_category_id',
    ];

    protected $casts = [
        'cost_price' => 'decimal:2',
        'weight' => 'decimal:2',
        'height' => 'decimal:2',
        'width' => 'decimal:2',
        'depth' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function optionValues()
    {
        return $this->belongsToMany(OptionValue::class, 'option_value_variants', 'variant_id', 'option_value_id');
    }

    public function prices()
    {
        return $this->hasMany(Price::class, 'variant_id');
    }

    public function priceMain()
    {
        return $this->hasOne(Price::class, 'variant_id');
    }

    public function scopeOnlyNormal($query)
    {
        $query->where('is_master', '==', VariantType::Normal);
    }

    /**
     * @inheritDoc
     */
    public function getPresenterClass()
    {
        return VariantPresenter::class;
    }
}
