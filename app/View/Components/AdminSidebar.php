<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use McCool\LaravelAutoPresenter\Facades\AutoPresenter;

class AdminSidebar extends Component
{
    public $currentUser;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentUser = AutoPresenter::decorate(Auth::user());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin-sidebar');
    }
}
