<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionValueVariant extends Model
{
    protected $fillable = [
        'option_value_id',
        'variant_id',
    ];
}
