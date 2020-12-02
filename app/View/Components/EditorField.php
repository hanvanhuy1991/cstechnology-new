<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditorField extends Component
{
    public $name;

    public $required;

    public $label;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param $required
     * @param $label
     */
    public function __construct($name, $required = false, $label = false)
    {
        $this->name = $name;
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
        return view('components.editor-field');
    }
}
