<?php


namespace App\Presenters;

use App\Enums\PromotionableType;
use App\Presenters\Traits\TimestampsTrait;
use McCool\LaravelAutoPresenter\BasePresenter;

class ProductPresenter extends BasePresenter
{
    use TimestampsTrait;

    public function isPromotionable(): bool
    {
        return $this->wrappedObject->promotionable == PromotionableType::Allow;
    }
}
