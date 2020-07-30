<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LabelSelect extends Component
{
    public $array;
    public $name;
    public $labelText;
    public $startText;
    public $startValue;
    public $selectClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $labelText, $selectClass, $startText, $startValue, $array)
    {
        $this->name = $name;
        $this->labelText = $labelText;
        $this->selectClass = $selectClass;
        $this->startText = $startText;
        $this->startValue = $startValue;
        $this->array = $array;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.label-select');
    }
}
