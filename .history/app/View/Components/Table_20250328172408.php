<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{

    public $headers;
    public $fields;
    public $items;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->headers = $headers;
        $this->fields = $fields;
        $this
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
