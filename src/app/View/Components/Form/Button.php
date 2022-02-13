<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Button extends Component
{
    public $buttonClass;
    public $color;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($buttonClass = false, $color = "primary", $type = "button")
    {
        $this->buttonClass = $buttonClass;
        $this->type = $type;

        switch ($color) {
            case "primary":
                $this->buttonClass .= " bg-primary text-white hover:bg-primary";
                break;
            case "muted":
                $this->buttonClass .= " bg-muted-lighter text-muted-darker";
                break;
            case "red":
                $this->buttonClass .= " bg-transparent text-red-500";
                break;
            case "link":
                $this->buttonClass .= " bg-transparent text-primary";
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.button');
    }
}
