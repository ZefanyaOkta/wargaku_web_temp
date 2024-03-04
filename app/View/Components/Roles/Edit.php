<?php

namespace App\View\Components\Roles;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $modalId, $title, $role, $permissions;

    /**
     * Create a new component instance.
     */
    public function __construct($modalId, $title, $rowId)
    {
        $this->modalId = $modalId;
        $this->title = $title;
        $this->role = Role::find($rowId);
        $this->permissions = Permission::all();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.roles.edit');
    }
}
