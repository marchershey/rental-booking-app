<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Ticker extends Component
{
    public $value;
    public $step;
    public $min;
    public $max;
    public $title;
    public $desc;
    public $wireId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $desc, $default = 1, $step = 1, $min = 0, $max = 50, $wireId = "")
    {
        $this->title = $title;
        $this->desc = $desc;
        $this->value = $default;
        $this->step = $step;
        $this->min = $min;
        $this->max = $max;
        $this->wireId = $wireId;

        $this->value = $default;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.ticker');
    }
}
