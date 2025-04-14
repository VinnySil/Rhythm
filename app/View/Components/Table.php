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
    public $type;
    public $actions;

    /**
     * Create a new component instance.
     */
    public function __construct($headers, $fields, $items, $type, $actions)
    {
        $this->headers = $headers;
        $this->fields = $fields;
        $this->items = $items;
        $this->type = $type;
        $this->actions = $actions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
