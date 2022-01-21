<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public $title;
    public $desc;
    public $optional;
    public $placeholder;
    public $options;
    public $wireId;
    public $muted;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options, $title = null, $desc = null, $placeholder = null, $optional = null, $wireId = null)
    {
        $this->title = $title ?? "NO TITLE SET";
        $this->desc = $desc ?? false;
        $this->optional = $optional ?? false;
        $this->placeholder = $placeholder;
        $this->options = collect($options) ?? false;
        $this->wireId = $wireId ?? false;
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
