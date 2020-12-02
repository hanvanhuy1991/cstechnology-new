<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    /**
     * @var bool
     */
    public $fixed;

    /**
     * Create a new component instance.
     *
     * @param bool $fixed
     */
    public function __construct($fixed = false)
    {
        $this->fixed = $fixed;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.page-header');
    }
}
