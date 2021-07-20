<?php

namespace App\View\Components\Element;

use Illuminate\View\Component;

class Delete extends Component
{
    public int $id;
    public string $routeName;
    public string $routeKey;
    public string $label = 'Delete'; // we are just setting a default value here

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $id, string $routeName, string $routeKey, ?string $label = null) //php scalar variable   --- ?string is allowing null
    {
        $this->routeName = $routeName;
        $this->id = $id;
        $this->routeKey = $routeKey;
        $this->label = $label ?? $this->label;  //if value isn't passed, use default value.     same
        //$this->label = $label ? $label : $this->label;                                        same
        //if($label) $this->label = $label;                                                     same
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.element.delete');
    }
}
