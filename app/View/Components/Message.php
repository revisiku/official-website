<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Message extends Component
{
    /**
     * The input type.
     *
     * @var string
     */
    public $type;

    /**
     * The input text.
     *
     * @var string
     */
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $text)
    {
        $this->type = $type;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.message');
    }
}
