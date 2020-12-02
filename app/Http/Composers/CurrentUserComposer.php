<?php


namespace App\Http\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use McCool\LaravelAutoPresenter\Facades\AutoPresenter;

class CurrentUserComposer
{
    /**
     * Bind data to view
     *
     */
    public function compose(View $view)
    {
        $view->withCurrentUser(AutoPresenter::decorate(Auth::user()));
    }
}
