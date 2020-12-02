<?php

namespace App;

use App\Presenters\RolePresenter;
use App\Support\Traits\Hashidable;
use McCool\LaravelAutoPresenter\HasPresenter;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole implements HasPresenter
{
    use Hashidable;
    
    public function getPresenterClass()
    {
        return RolePresenter::class;
    }
}
