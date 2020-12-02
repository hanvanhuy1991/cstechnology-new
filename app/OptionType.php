<?php

namespace App;

use App\Presenters\OptionTypePresenter;
use App\Support\Traits\Hashidable;
use App\Support\Traits\SortableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;
use Spatie\Translatable\HasTranslations;

class OptionType extends Model implements HasPresenter
{
    use Sluggable;
    use SortableTrait;
    use Hashidable;
    use HasTranslations;

    protected $fillable = [
        'name',
        'presentation',
        'position',
    ];

    public $translatable = [
        'presentation',
    ];

    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'presentation',
                'onUpdate' => true,
            ],
        ];
    }

    public function values()
    {
        return $this->hasMany(OptionValue::class, 'option_type_id');
    }

    /**
     * @inheritDoc
     */
    public function getPresenterClass()
    {
        return OptionTypePresenter::class;
    }

    public static function forSelect()
    {
        return static::select('id', 'presentation', 'name')
                ->get();
    }
}
