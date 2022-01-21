<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextField extends Component
{
    public $inputType;
    public $title;
    public $desc;
    public $placeholder;
    public $optional;
    public $max;
    public $wireId;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($inputType = null, $title = null, $desc = null, $placeholder = null, $optional = null, $max = null, $wireId = null)
    {
        $this->inputId = $inputId ?? rand();
        $this->inputType = $inputType ?? "text";
        $this->title = $title ?? "NO TITLE SET";
        $this->desc = $desc ?? false;
        $this->placeholder = $placeholder ?? $title;
        $this->optional = $optional ?? false;
        $this->max = $max ?? false;
        $this->wireId = $wireId ?? false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text-field');
    }
}
