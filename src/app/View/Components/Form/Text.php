<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Text extends Component
{
    public $label;
    public $description;
    public $placeholder;
    public $wireid;
    public $inputid;
    public $inputclass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = false, $description = false, $placeholder = false, $wireid = false, $inputid = false, $inputclass = false)
    {
        $this->label = $label;
        $this->description = $description;
        $this->placeholder = $placeholder;
        $this->wireid = $wireid;
        $this->inputid = $inputid;
        $this->inputclass = $inputclass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text');
    }
}
