<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $array;
    public $name;
    public $startText;
    public $startValue;
    public $selectClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $selectClass, $startText, $startValue, $array)
    {
        $this->name = $name;
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
        return view('components.select');
    }
}
