<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Heading extends Component
{
    public $heading;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($heading, $description = false)
    {
        $this->heading = $heading;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.heading');
    }
}
