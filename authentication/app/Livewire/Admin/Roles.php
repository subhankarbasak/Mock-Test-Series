<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Component
{
    public $role_name;
    public $permissions = [];
    public $selected_role_id;

    public function createRole()
    {
        $this->validate(['role_name' => 'required|string|unique:roles,name']);
        Role::create(['name' => $this->role_name]);
        session()->flash('success', 'Role created successfully!');
        $this->reset('role_name');
    }

    public function assignPermissions()
    {
        $role = Role::find($this->selected_role_id);
        if ($role) {
            $role->syncPermissions($this->permissions);
            session()->flash('success', 'Permissions assigned successfully!');
        }
    }

    public function render()
    {
        // return view('livewire.admin.roles');

        return view('livewire.admin.roles', [
            'roles' => Role::all(),
            'permissions' => Permission::all()
        ])->layout('components.layouts.admin');
    }
}
