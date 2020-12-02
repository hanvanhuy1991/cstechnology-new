<?php


namespace App\Presenters;

use App\Presenters\Traits\TimestampsTrait;
use McCool\LaravelAutoPresenter\BasePresenter;

class OptionTypePresenter extends BasePresenter
{
    use TimestampsTrait;

    public function selectText()
    {
        return $this->wrappedObject->presentation . ' (' . $this->name . ')';
    }
}
