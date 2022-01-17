<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Multiselect extends Component
{
    public $title;
    public $desc;
    public $optional;
    public $placeholder;
    public $wireId;

    public $items;

    public $inputId;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $desc = "", $placeholder = "", $optional = false, $wireId = "", $items = [])
    {
        $this->title = $title;
        $this->desc = $desc ?? false;
        $this->placeholder = $placeholder ?? false;
        $this->optional = $optional;
        $this->wireId = $wireId ?? false;

        $this->items = json_encode($items);

        $this->inputId = $inputId ?? rand();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.multiselect');
    }
}
