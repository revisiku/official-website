<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InvalidFeedback extends Component
{
    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.invalid-feedback');
    }
}
