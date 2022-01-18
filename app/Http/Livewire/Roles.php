<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organization;
use App\Models\Role;
// use App\Models\UserPermission;

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
    public $role_description;
    public $guard_name = 'web';
    public $roleId;
    public $selectedPermsOnRoles = [];
    public $selectedRole;

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
    



    /**
     *
     * Role Data for Validation
     *
     */
    public function roleData()
    {
        return [
            'role' => $this->role,
            'role_description' => $this->role_description,
            'guard_name' => $this->guard_name,
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
            'role_description' => 'required',
            'guard_name' => 'required',
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
        ]);
    }
}
