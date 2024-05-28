<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name,$role,$cart;
    public function __construct($name, $role, $cart){
        $this->name = $name;
        $this->role = $role;
        $this->cart = $cart;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
