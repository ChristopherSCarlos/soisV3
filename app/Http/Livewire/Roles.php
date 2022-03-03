<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organization;
use App\Models\Role;
use App\Models\Permission;

use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class Roles extends Component
{
    use WithPagination;

    // modals
    public $modalCreateRolesFormVisible = false;
    public $modalSyncRolePermissionVisible = false;
    public $modalDeleteRolesFormVisible = false;

    // variables
    public $role;
    public $description;
    public $guard_name = 'web';
    public $roleId;
    public $selectedPermsOnRoles = [];
    public $selectedRole;
    public $roleData;
    public $rolePivot;

    /*==========================================================
    =            Craete Roles Section comment block            =
    ==========================================================*/
    public function createShowRolesModel()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCreateRolesFormVisible = true;
    }

    public function create()
    {
        $this->resetValidation();
        $this->validate(); 
        Role::create($this->roleData());
        $this->modalCreateRolesFormVisible = false;
        $this->reset(); 
    }
    
    
    /*=====  End of Craete Roles Section comment block  ======*/
    
    /*=====================================================================
    =            Sync Permission to Role Section comment block            =
    =====================================================================*/
    public function syncPermissionModel($id)
    {
        $this->role_id = $id;
        $this->roleData = Permission::find($this->role_id);
        // dd($this->roleData);
        // $user->roles()->sync($this->roleModel);
        // dd($id);
        $this->modalSyncRolePermissionVisible = true;
    }
    public function syncPermission()
    {
        $this->roleData = Role::find($this->role_id);
        // dd($this->roleData->permissions());
        $this->roleData->permissions()->sync($this->selectedPermsOnRoles);
        // dd($this->selectedPermsOnRoles);
        // dd($this->roleData);
        $this->modalSyncRolePermissionVisible = false;
    }
    
    /*=====  End of Sync Permission to Role Section comment block  ======*/
    
    public function deleteRoleModal($id)
    {
        $this->role_id = $id;

        $this->roleData = Role::find($this->role_id);
        $this->rolePivot = Role::find($this->role_id)->permissions;
        $this->roleData->permissions()->detach($this->rolePivot);
        dd($this->roleData);
        // $this->artId = Article::find($this->articleId);
        // $this->seed = Article::find($this->articleId)->organizations;
        // $this->artId->organizations()->detach($this->seed);
        

        // $this->roleId = $this->roleData->permissions()->find($this->role_id);
        
        // $this->roleId = $this->roleData->permissions()->get();
        // $this->roleData->roles()->detach($this->role_id);
        // dd($this->role_id);
    }


    /**
     *
     * Get all permission
     *
     */
    public function getPermission()
    {
        return DB::table('permissions')->get();
    }


    /**
     *
     * Role Data for Validation
     *
     */
    public function roleData()
    {
        return [
            'role' => $this->role,
            'description' => $this->description,
        ];
    }

    /**
     *
     * Rules for Form
     *
     */
    public function rules()
    {
        return [
            'role' => 'required',
            'description' => 'required',
        ];
    }

    /**
     *
     * Get All Roles From Database
     *
     */
    public function getRolesDataFromDatabase()
    {
        return Role::paginate(5);
    }
    public function render()
    {
        return view('livewire.roles',[
            'displayData' => $this->getRolesDataFromDatabase(),
            'displayPermission' => $this->getPermission(),
        ]);
    }
}
