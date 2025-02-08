<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionList extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function deletePermission($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        session()->flash('message', 'Permission deleted successfully.');
    }

    public function render()
    {
        $permissions = Permission::where('name', 'like', '%' . $this->search . '%')->paginate(10);

        // return view('livewire.permissions.permission-list');
        return view('livewire.permissions.permission-list', compact('permissions'))->layout('components.layouts.admin');
    }
}
