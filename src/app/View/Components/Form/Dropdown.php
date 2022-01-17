<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public $inputId;
    public $title;
    public $desc;
    public $placeholder;
    public $optional;
    public $wireId;
    public $options;

    public $muted;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options, $inputId = null, $title = null, $desc = null, $placeholder = null, $optional = null, $wireId = null)
    {
        $this->inputId = $inputId ?? rand();
        $this->inputType = $inputType ?? "text";
        $this->title = $title ?? "NO TITLE SET";
        $this->desc = $desc ?? false;
        $this->placeholder = $placeholder;
        $this->optional = $optional ?? false;
        $this->wireId = $wireId ?? false;
        $this->options = collect($options) ?? false;

        $this->muted = (isset($placeholder)) ? 'true' : 'false';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.dropdown');
    }
}
