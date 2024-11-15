<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\Permission;
use Livewire\WithPagination;

class RoleManagement extends Component
{
    use WithPagination;

    public $roleName, $roleId, $permissions = [];
    public $isEditMode = false;
    public $showAddRoleForm = false;
    public $showEditRoleForm = false;

    protected $rules = [
        'roleName' => 'required|string|max:255|unique:roles,name',
        'permissions' => 'array',
    ];

    public function addRole()
    {
        $this->reset(['roleName', 'permissions']);
        $this->dispatch('show-add-role-modal');
    }

    public function saveRole()
    {
        $this->validate();
        
        $role = Role::create(['name' => $this->roleName]);
        $role->permissions()->sync($this->permissions); // attach permissions to the role

        $this->dispatch('hide-role-modal');
        session()->flash('message', 'Role added successfully.');
    }

    public function editRole($id)
    {
        $role = Role::find($id);
        $this->roleId = $role->id;
        $this->roleName = $role->name;
        $this->permissions = $role->permissions->pluck('id')->toArray(); 

        $this->dispatch('show-edit-role-modal');
    }

    public function updateRole()
    {
        $this->validate([
            'roleName' => 'required|string|max:255|unique:roles,name,' . $this->roleId,
            'permissions' => 'array',
        ]);

        $role = Role::find($this->roleId);
        $role->update(['name' => $this->roleName]);
        $role->permissions()->sync($this->permissions); // update permissions for the role

        $this->dispatch('hide-role-modal');
        session()->flash('message', 'Role updated successfully.');
    }

    public function deleteRole($id)
    {
        // remove all permissions associated with this role
        $role = Role::find($id);
        if ($role) {
            $role->permissions()->detach(); 
            $role->delete(); 
            session()->flash('message', 'Role deleted successfully.');
        } else {
            session()->flash('error', 'Role not found.');
        }
    }
    
    

    public function render()
    {
        $roles = Role::paginate(10);
        $permissions = User::all(); 

        return view('livewire.admins.role-management', ['roles' => $roles, 'permissions' => $permissions]);
    }
}