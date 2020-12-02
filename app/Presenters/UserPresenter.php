<?php


namespace App\Presenters;

use App\Presenters\Traits\TimestampsTrait;
use McCool\LaravelAutoPresenter\BasePresenter;

class UserPresenter extends BasePresenter
{
    use TimestampsTrait;

    public function fullName()
    {
        return $this->wrappedObject->first_name . ' ' . $this->wrappedObject->last_name;
    }
}
