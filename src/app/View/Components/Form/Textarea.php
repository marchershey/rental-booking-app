<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $label;
    public $description;
    public $placeholder;
    public $rows;
    public $cols;
    public $wireid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = false, $description = false, $placeholder = false, $rows = "3", $cols = "auto", $wireid = false)
    {
        $this->label = $label;
        $this->description = $description;
        $this->placeholder = $placeholder;
        $this->rows = $rows;
        $this->cols = $cols;
        $this->wireid = $wireid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.textarea');
    }
}
