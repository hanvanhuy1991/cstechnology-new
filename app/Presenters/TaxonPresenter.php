<?php

namespace App\Presenters;

use App\Presenters\Traits\TimestampsTrait;
use McCool\LaravelAutoPresenter\BasePresenter;

class TaxonPresenter extends BasePresenter
{
    use TimestampsTrait;

    public function selectText()
    {
        $prettyName = '';
        if ($this->wrappedObject->ancestors->isNotEmpty()) {
            foreach ($this->wrappedObject->ancestors as $ancestor) {
                $prettyName .= $ancestor->name . ' -> ';
            }
        }
        $prettyName .= $this->wrappedObject->name;

        return $prettyName;
    }
}
