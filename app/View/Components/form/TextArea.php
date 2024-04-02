<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextArea extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $titulo;
    public $holder;

    public function __construct($id,$titulo,$holder)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->holder = $holder ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text-area');
    }
}
