<?php

namespace App\View\Components\Permission;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Permission\Models\Permission;

class Delete extends Component
{
    public $modalId, $title, $permission;
    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $title, $rowId)
    {
        $this->modalId = $modalId;
        $this->title = $title;

        $data = Permission::find($rowId);

        $this->permission = $data;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.permission.delete');
    }
}
