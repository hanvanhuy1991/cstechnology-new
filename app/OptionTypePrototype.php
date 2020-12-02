<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionTypePrototype extends Model
{
    protected $fillable = [
        'option_type_id',
        'prototype_id',
    ];
}
