<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $action;
    public $dataTarget;
    public $dataToggle;
    public function __construct($type,$action)
    {
        $this->type = $type;
        $this->action = $action;
        // $this ->dataTarget = $dataTarget;
        // $this-> dataToggle = $dataToggle;
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}