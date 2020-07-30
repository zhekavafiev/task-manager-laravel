<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LabelTag extends Component
{
    public $type;
    public $labelValue;
    public $name;
    public $class;
    public $placeHolder;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $labelValue, $name, $class, $placeHolder, $value)
    {
        $this->type = $type;
        $this->labelValue = $labelValue;
        $this->name = $name;
        $this->class = $class;
        $this->placeHolder = $placeHolder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.label-tag');
    }
}
