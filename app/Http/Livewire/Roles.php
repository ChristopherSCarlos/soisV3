<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organization;
use App\Models\Role;
use App\Models\Permission;

use Illuminate\Validation\Rule;
use Livewire\WithPagination;

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
    public $modalViewRolesPermsFormVisible = false;

    // variables
    public $role;
    public $description;
    public $guard_name = 'web';
    public $roleId;
    public $selectedPermsOnRoles = [];
    public $selectedRole;
    public $roleData;
    public $rolePivot;
    public $perms_array;
    public $perms;
    public $role_data;
    public $role_id;


    /*=============================================================
    =            View Permission Section comment block            =
    =============================================================*/
    public function viewPermissionModel($id)
    {
        // $this->resetValidation();
        // $this->reset();

        // $this->perms_array = DB::table('permission_role')->where('role_id','=',$id)->pluck('permission_id');
        // $this->role_data = DB::table('roles')->where('role_id','=',$id)->get();
        
        // dd($this->perms);
        $this->roleId = $id;
        // dd($this->roleId);
        $this->modalViewRolesPermsFormVisible = true;
        // $this->getPermissionData();
        // dd($id);
    }
    public function getPermissionData()
    {
        // $tole
        // dd($this->roleId);

        // dd($role);
        // $this->role_id = $role;
        // dd($id);
        // dd($this->role_id);
        // dd($id);
        // $this->perms = Role::where('role_id','=',$id)->with('permissions')->get();
        // return $this->perms;
    }    
    
    /*=====  End of View Permission Section comment block  ======*/
    

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
        $this->roleId = $id;
        $this->roleData = Permission::find($this->roleId);
        // dd($this->roleData);
        // $user->roles()->sync($this->roleModel);
        // dd($id);
        $this->modalSyncRolePermissionVisible = true;
    }
    public function syncPermission()
    {
        $this->roleData = Role::find($this->roleId);
        // dd($this->roleData->permissions());
        $this->roleData->permissions()->sync($this->selectedPermsOnRoles);
        // dd($this->selectedPermsOnRoles);
        // dd($this->roleData);
        $this->modalSyncRolePermissionVisible = false;
    }
    
    /*=====  End of Sync Permission to Role Section comment block  ======*/
    
    public function deleteRoleModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->roleId = $id;
        $this->modalDeleteRolesFormVisible = true;
    }

    public function delete()
    {

        $this->roleData = Role::find($this->roleId);
        $this->rolePivot = Role::find($this->roleId)->permissions;
        $this->roleData->permissions()->detach($this->rolePivot);
        // $this->roleData->users()->detach($this->rolePivot);
        DB::table('role_user')->where('role_id','=',$this->roleId)->delete();
        DB::table('roles')->where('role_id','=',$this->roleId)->delete();
        // Permission::find($this->permission_id)->delete();
        $this->modalDeleteRolesFormVisible = false;
        $this->reset();
        $this->resetValidation();
        // dd($this->roleData);
        // $this->artId = Article::find($this->articleId);
        // $this->seed = Article::find($this->articleId)->organizations;
        // $this->artId->organizations()->detach($this->seed);
        

        // $this->roleId = $this->roleData->permissions()->find($this->roleId);
        
        // $this->roleId = $this->roleData->permissions()->get();
        // $this->roleData->roles()->detach($this->roleId);
        // dd($this->roleId);
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
            'displayPermissionData' => $this->getPermissionData(),
        ]);
    }
}
