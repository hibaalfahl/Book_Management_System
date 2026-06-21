<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
public $type;
public $name;
public $id;
    public function __construct($type='text' ,$name='' ,$id=null)
    {
        $this->type=$type;
        $this->name=$name;
        $this->id=$id;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
