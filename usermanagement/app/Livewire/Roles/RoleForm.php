<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleForm extends Component
{
    public $name;
    public $permissions = [];
    public $roleId;
    public $role;
    public $deleteConfirmation = false;

    // Validation rules
    protected $rules = [
        'name' => 'required|unique:roles,name,' . '$this->roleId',  // Exclude current role for editing
        'permissions' => 'array',  // Ensure permissions is an array
    ];

    public function mount($roleId = null)
    {
        // If a role ID is provided, load the role data for editing
        if ($roleId) {
            $this->role = Role::findOrFail($roleId);
            $this->roleId = $this->role->id;
            $this->name = $this->role->name;
            $this->permissions = $this->role->permissions->pluck('id')->toArray();
        }
    }

    // Create or update role
    public function saveRole()
    {
        $this->validate();

        // If editing an existing role, update it; otherwise, create a new role
        $role = $this->roleId ? Role::findOrFail($this->roleId) : new Role();
        $role->name = $this->name;
        $role->save();

        // Sync permissions (add or remove permissions)
        $role->syncPermissions(Permission::whereIn('id', $this->permissions)->get());

        // Flash message for success
        session()->flash('success', $this->roleId ? 'Role updated successfully.' : 'Role created successfully.');

        // Redirect to the roles index page after saving
        return redirect()->route('roles.index');
    }

    // Toggle delete confirmation modal
    public function confirmDelete()
    {
        $this->deleteConfirmation = true;
    }

    // Delete the role
    public function deleteRole()
    {
        $role = Role::findOrFail($this->roleId);
        $role->delete();

        session()->flash('success', 'Role deleted successfully.');
        
        return redirect()->route('roles.index');
    }

    public function render()
    {
        return view('livewire.roles.role-form', [
            'allPermissions' => Permission::all(),
        ])->layout('components.layouts.admin');
    }
}
