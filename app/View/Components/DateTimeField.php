<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DateTimeField extends Component
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $icon;

    /**
     * @var string
     */
    public $required;

    /**
     * @var string
     */
    public $label;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param bool $icon
     * @param bool $required
     * @param bool $label
     */
    public function __construct($name, $icon = false, $required = false, $label = false)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->required = $required;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.date-time-field');
    }
}
