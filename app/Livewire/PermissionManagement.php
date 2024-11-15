<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Permission;
use Livewire\WithPagination;

class PermissionManagement extends Component
{

        use WithPagination;
    
        public $permissionName, $permissionId;
        public $isEditMode = false;
    
        protected $rules = [
            'permissionName' => 'required|string|max:255|unique:permissions,name',
        ];
    
        public function addPermission()
        {
            $this->reset(['permissionName']);
            $this->dispatch('show-add-permission-modal');
        }
    
        public function savePermission()
        {
            $this->validate();
    
            Permission::create(['name' => $this->permissionName]);
    
            $this->dispatch('hide-permission-modal');
            session()->flash('message', 'Permission added successfully.');
        }
    
        public function editPermission($id)
        {
            $permission = Permission::find($id);
            $this->permissionId = $permission->id;
            $this->permissionName = $permission->name;
    
            $this->dispatch('show-edit-permission-modal');
        }
    
        public function updatePermission()
        {
            $this->validate([
                'permissionName' => 'required|string|max:255|unique:permissions,name,' . $this->permissionId,
            ]);
    
            $permission = Permission::find($this->permissionId);
            $permission->update(['name' => $this->permissionName]);
    
            $this->dispatch('hide-permission-modal');
            session()->flash('message', 'Permission updated successfully.');
        }
    
        public function deletePermission($id)
        {
            $permission = Permission::find($id);
            if ($permission) {
                $permission->delete();
                session()->flash('message', 'Permission deleted successfully.');
            } else {
                session()->flash('error', 'Permission not found.');
            }
        }
    
        public function render()
        {
            $permissions = Permission::paginate(10);
    
            return view('livewire.admins.permission-management', ['permissions' => $permissions]);
        }
}
