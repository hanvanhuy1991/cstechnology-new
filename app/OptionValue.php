<?php

namespace App;

use App\Support\Traits\Hashidable;
use App\Support\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OptionValue extends Model
{
    use SortableTrait;
    use HasTranslations;
    use Hashidable;

    public $translatable = [
        'name',
    ];

    protected $fillable = [
        'name',
        'presentation',
        'position',
        'option_type_id',
    ];

    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'option_value_variants', 'option_value_id', 'variant_id');
    }
}
