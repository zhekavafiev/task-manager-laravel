<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilterSelectAssigner extends Component
{
    public $array;
    public $name;
    public $startText;
    public $startValue;
    public $selectClass;
    public $filter;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $selectClass, $startText, $startValue, $array, array $filter = null)
    {
        $this->name = $name;
        $this->selectClass = $selectClass;
        $this->startText = $startText;
        $this->startValue = $startValue;
        $this->array = $array;
        $this->filter = $filter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.filter-select-assigner');
    }
}
