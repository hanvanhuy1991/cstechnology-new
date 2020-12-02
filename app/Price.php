<?php

namespace App;

use App\Support\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use Hashidable;

    protected $fillable = [
        'variant_id',
        'amount',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }
}
