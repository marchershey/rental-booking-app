<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextField extends Component
{
    public $inputType;
    public $inputClass;
    public $title;
    public $desc;
    public $placeholder;
    public $optional;
    public $max;
    public $disabled;
    public $wireId;
    public $alpineId;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($inputType = null, $inputClass = null, $title = null, $desc = null, $placeholder = null, $optional = null, $max = null, $disabled = null, $wireId = null, $alpineId = null)
    {
        $this->inputId = $inputId ?? rand();
        $this->inputType = $inputType ?? "text";
        $this->inputClass = $inputClass ?? false;
        $this->title = $title ?? "NO TITLE SET";
        $this->desc = $desc ?? false;
        $this->placeholder = $placeholder ?? $title;
        $this->optional = $optional ?? false;
        $this->max = $max ?? false;
        $this->disabled = $disabled ?? false;
        $this->wireId = $wireId ?? false;
        $this->alpineId = $alpineId ?? false;
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
