<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organization;

use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Auth;

class Users extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalUpdateUser = false;
    public $modelUpdateUserData = false;
    public $modaladdPermissionModel = false;
    public $modelUpdateUserPasswordData = false;
    public $modelConfirmUserDeleteVisible = false;
    public $modalAddRoleFormVisible = false;
    public $modalAddOrganizationFormVisible = false;
    public $modalCreateTeamsFormVisible = false;
    public $modalDeleteTeamsFormVisible = false;
    public $modalUpdateUserPasswordFormVisible = false;


    // variables
    public $name;
    public $email;
    public $password;
    public $student_number;

    public $userId;
    public $displayRoleData;
    // public $rolesList;
    public $role_type;
    public $roleModel=null;
    public $organizationModel=null;

    public $user;

    public $test;
    public $TeamNameData;
    public $TeamName;
    public $TeamNameString;
    public $PersonalTeam;

    public $resultArray;
    public $TeamId;
    public $newUserTeamId;

    public $v;
    public $latestCreatedUser;
    public $latestCreatedUserId;
    public $userFindForSyncRole;
    public $userNewCreatedId;

    // design
    public $isUserOrgAuthId;
    public $isUserOrgAuthArray = [];
    public $isUserOrgAuthData;
    public $isUserOrgAuthAffliatedOrg;

    public $isUserAuthId;
    public $isUserAuthArray = [];

    public $resultArrays;


    public $userDeleteId;

    public $usersDeleteRoleData;
    public $usersDeleteRoleDataId;

    public $usersOrganizationRoleData;
    
    public $usersTeamRoleData;


    public $isUserRoleAuthId;
    public $isUserRoleAuthArray = [];

    public $userTeamDataForDeletion;
    public $userTeamDataForDeletionId;
    public $userTeamDataForDeletionUserId;
    public $userTeamDataForDeletionUserNull = null;
    
    public $userTeamDataForDeletionUserData;


    /*=========================================================
    =            Create User Section comment block            =
    =========================================================*/
    public function createShowModel()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function create()
    {
        User::create($this->modelCreateUser());
        $this->modalFormVisible = false;
        $this->reset(); 
        $this->resetValidation(); 
    }

    public function modelCreateUser()
    {
        return [
            'first_name' => $this->name,
            'email' => $this->email,
            'status' => '1',
            'student_number' => $this->student_number,
            'password' => Hash::make($this->password),
        ];
    }
    
    /*=====  End of Create User Section comment block  ======*/
    
    /*=========================================================
    =            Update User Section comment block            =
    =========================================================*/
    public function updateUserModel($id)
    {
        $this->userId = $id;
        $this->modalFormVisible = true;
        $this->modelUpdateUserDatas();
    }

    public function modelUpdateUserDatas()
    {
        $data = User::find($this->userId);
        $this->name = $data->first_name;
        $this->email = $data->email;
        $this->student_number = $data->student_number;
    }
    public function modelUpdateUser()
    {
        return [
            'first_name' => $this->name,
            'email' => $this->email,
            'student_number' => $this->student_number,
        ];
    }
    public function update()
    {
        User::find($this->userId)->update($this->modelUpdateUser());
        $this->modalFormVisible = false;
        $this->resetValidation();
        $this->reset();
        $this->cleanUserDataVars();
    }
    public function cleanUserDataVars()
    {
        $this->name = null;
        $this->email = null;
    }
    /*=====  End of Update User Section comment block  ======*/
    
    /*=========================================================
    =            Delete User Section comment block            =
    =========================================================*/
    public function deleteShowUserModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->userId = $id;
        $this->modelConfirmUserDeleteVisible = true;
    }
    public function deleteUserData()
    {
        // dd($userId);
        $this->userDeleteId = $this->userId;
        User::find($this->userDeleteId)->update(['status' => '0']);
        $this->modelConfirmUserDeleteVisible = false;
        $this->resetValidation();
        $this->reset();
        // $this->cleanUserPasswordVars();
        // $this->resetPage();
    }
    
    
    /*=====  End of Delete User Section comment block  ======*/
    

    /*==============================================
    =            Deleted Table Redirect            =
    ==============================================*/
    
    public function deletedusers()
    {
        return redirect('/users/deleted-users');
    }
    
    /*=====  End of Deleted Table Redirect  ======*/
    

    /*==============================================================
    =            Sync Role To UserSection comment block            =
    ==============================================================*/
    public function addShowRoleModel($id)
    {
        $this->userId = $id;
        $this->modalAddRoleFormVisible = true;
    }

    public function displayRole()
    {
        return DB::table('roles')
            ->orderBy('role_id','asc')
            ->get();
    }
    public function addRoleToUser()
    {
        $user = User::find($this->userId);
        $user->roles()->sync($this->roleModel);
        $this->modalAddRoleFormVisible = false;
        $this->reset();
        $this->resetAddRoleUserValidation();
    }
    public function resetAddRoleUserValidation()
    {
        $this->roleModel = null;
        $this->userId = null;
    }
    
    
    /*=====  End of Sync Role To UserSection comment block  ======*/
    

    /*=====================================================================
    =            Add Organization to UserSection comment block            =
    =====================================================================*/
    public function addShowOrganizationModel($id)
    {
        $this->userId = $id;
        // dd($this->userId);
        $this->modalAddOrganizationFormVisible = true;
    }
    public function displayOrganization()
    {
        return DB::table('organizations')
            ->orderBy('organization_id','asc')
            ->get();
    }
    public function addOrganizationToUser()
    {
        $user = User::find($this->userId);
        // dd($this->user);
        // dd($this->organizationModel);
        $user->organizations()->sync($this->organizationModel);
        $this->modalAddOrganizationFormVisible = false;
        $this->reset();
        $this->resetAddRoleUserValidation();
    }
    
    
    /*=====  End of Add Organization to UserSection comment block  ======*/
    
    public function updateUserPasswordModel($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->userId = $id;
        $this->modalUpdateUserPasswordFormVisible = true;
    }
    public function updateUserPassword()
    {
        User::find($this->userId)->update(['password'=>Hash::make($this->password)]);
        $this->modalUpdateUserPasswordFormVisible = false;
        $this->resetValidation();
        $this->reset();
        $this->password = null;
    }




    /**
     *
     * Rules for Forms
     *
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
            'student_number' => 'required',
        ];
    }


    /**
     *
     * Get Role List
     *
     */
    public function listOfRoles()
    {
        return DB::table('roles')
            ->orderBy('role_id','asc')
            ->get();
    }
    /**
     *
     * Get all the User data to be displayed in the user table
     *
     */
    public function read()
    {
        // return User::paginate(10);
        return DB::table('users')
                ->where('status','=','1')
                ->orderBy('user_id','asc')
                ->paginate(10);
                // ->get();
    }

    public function render()
    {
        return view('livewire.users',[
            'displayData' => $this->read(),
            'rolesList' => $this->listOfRoles(),
            'displayOrganizationData' => $this->displayOrganization(),
        ]);
    }
}
