<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    public $options;
    public $label;
    public $description;
    public $wireid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options = [], $label = false, $description = false, $wireid = false)
    {
        $this->options = $options;
        $this->label = $label;
        $this->description = $description;
        $this->wireid = $wireid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
