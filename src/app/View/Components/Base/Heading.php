<?php

namespace App\View\Components\Base;

use Illuminate\View\Component;

class Heading extends Component
{
    public $title;
    public $desc;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $desc = null)
    {
        $this->title = $title;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base.heading');
    }
}
