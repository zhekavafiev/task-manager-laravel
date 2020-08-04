<?php

namespace App\View\Components;

use App\Task;
use Illuminate\View\Component;

class LabelSelectAssigner extends Component
{
    public $array;
    public $labelText;
    public $startText;
    public $startValue;
    public $selectClass;
    public $task;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($labelText, $selectClass, $startText, $startValue, $array, Task $task)
    {
        $this->labelText = $labelText;
        $this->selectClass = $selectClass;
        $this->startText = $startText;
        $this->startValue = $startValue;
        $this->array = $array;
        $this->task = $task;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.label-select-assigner');
    }
}
