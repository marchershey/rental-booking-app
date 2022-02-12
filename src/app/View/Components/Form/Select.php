<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    public $options;
    public $label;
    public $description;
    public $wireid;
    public $inputid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options = [], $label = false, $description = false, $wireid = false, $inputid = false)
    {
        $this->options = $options;
        $this->label = $label;
        $this->description = $description;
        $this->wireid = $wireid;
        $this->inputid = $inputid;
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
