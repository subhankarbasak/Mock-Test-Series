<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionForm extends Component
{
    public $permissionId;
    public $name;

    protected $rules = [
        'name' => 'required|string|unique:permissions,name',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $permission = Permission::findOrFail($id);
            $this->permissionId = $permission->id;
            $this->name = $permission->name;
        }
    }

    public function savePermission()
    {
        $this->validate();

        if ($this->permissionId) {
            $permission = Permission::findOrFail($this->permissionId);
            $permission->update(['name' => $this->name]);
            session()->flash('message', 'Permission updated successfully.');
        } else {
            Permission::create(['name' => $this->name]);
            session()->flash('message', 'Permission created successfully.');
        }

        return redirect()->route('permissions.index');
    }
    
    public function render()
    {
        return view('livewire.permissions.permission-form')->layout('components.layouts.admin');
    }
}
