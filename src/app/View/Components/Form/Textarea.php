<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
{
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
    public function __construct($title = null, $desc = null, $placeholder = null, $optional = null, $max = null, $wireId = null)
    {
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
        return view('components.form.textarea');
    }
}
