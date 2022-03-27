<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\SoisGate;
use App\Models\Organization;

use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

use Auth;

class Users extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $UpdatemodalFormVisible = false;
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
    public $modelConfirmUserGenerateKeyVisible = false;


    // variables
    public $name;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $date_of_birth;
    public $address;
    public $mobile_number;
    public $email;
    public $password;
    public $student_number;

    public $userId;
    public $displayRoleData;
    // public $rolesList;
    public $role_type;
    public $roleModel=null;
    public $organizationModel=null;
    public $permissionModel=null;

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

    public $secret_characters;
    public $end_key;
    

    private $RoleUSerChecker;
    public $latestID;
    private $userOrgData;
    public $userOrgDataInt;
    private $userRoleData;
    public $userRoleDataInt;


    public $testButton;
    public $userPermission;
    public $testButtonArray = [];

    public function mount()
    {
        $this->user_data = User::find(Auth::id()); 
        $this->userPermission = $this->user_data->permissions()->get();

        // dd($this->userPermission);
        // return $this->userPermission; 
        // dd("Hello");
        // return $this->selectedPermsList();
    }

    public function selectedPermsList()
    {

        return $this->permissionModel;
        // dd("HEllo");
    }

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
        // dd($this->first_name);
        User::create($this->modelCreateUser());
        $this->latestID = DB::table('users')->orderBy('user_id', 'desc')->first();
        DB::table('role_user')->insert([
                ['role_id' => '8', 'user_id' => $this->latestID->user_id, 'organization_id' => null],
            ]);
        $this->modalFormVisible = false;
        $this->reset(); 
        $this->resetValidation(); 
    }

    public function modelCreateUser()
    {
        return [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
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
        $this->UpdatemodalFormVisible = true;
        $this->modelUpdateUserDatas();
    }

    public function modelUpdateUserDatas()
    {
        $data = User::find($this->userId);
        $this->first_name = $data->first_name;
        $this->middle_name = $data->middle_name;
        $this->last_name = $data->last_name;
        $this->date_of_birth = $data->date_of_birth;
        $this->address = $data->address;
        $this->email = $data->email;
        $this->mobile_number = $data->mobile_number;
        $this->student_number = $data->student_number;
    }
    public function modelUpdateUser()
    {
        return [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'email' => $this->email,
            'mobile_number' => $this->mobile_number,
            'student_number' => $this->student_number,
        ];
    }
    public function update()
    {
        User::find($this->userId)->update($this->modelUpdateUser());
        $this->UpdatemodalFormVisible = false;
        $this->resetValidation();
        $this->reset();
        $this->cleanUserDataVars();
    }
    public function cleanUserDataVars()
    {
        $this->first_name = null;
        $this->middle_name = null;
        $this->last_name = null;
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
        $this->user = User::find($this->userId);
        $this->RoleUSerChecker = DB::table('role_user')->where('user_id','=',$this->userId)->first();
        if($this->RoleUSerChecker){
            DB::table('role_user')->where('user_id','=',$this->userId)->delete();
            DB::table('role_user')->insert([
                ['role_id' => $this->roleModel, 'user_id' => $this->userId, 'organization_id' => null],
            ]);
            $this->modalAddRoleFormVisible = false;
            $this->resetAddRoleUserValidation();
            $this->reset();
        }else{
            DB::table('role_user')->insert([
                ['role_id' => $this->roleModel, 'user_id' => $this->userId, 'organization_id' => null],
            ]);
            $this->modalAddRoleFormVisible = false;
            $this->resetAddRoleUserValidation();
            $this->reset();
        }
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
        $this->user = User::find($this->userId);
        // dd($this->user);
        // dd($this->organizationModel);
        // $this->userOrgData = DB::table('role_user')->where('user_id','=',$this->userId)->pluck('organization_id');
        $this->userOrgData = DB::table('role_user')->where('user_id','=',$this->userId)->first();
        $this->userOrgDataInt = $this->userOrgData->organization_id;
        // dd($this->userOrgDataInt);
        // DB::table('role_user')->where('user_id','=','4')->where('organization_id','=','9')->delete();
        $this->userRoleData = DB::table('role_user')->where('user_id','=',$this->userId)->first();
        $this->userRoleDataInt = $this->userRoleData->role_id;
        // dd($this->userRoleDataInt);
        // dd(gettype($this->userRoleData));
        // dd(DB::table('role_user')->get());
        $this->RoleUSerChecker = DB::table('role_user')->where('user_id','=',$this->userId)->where('organization_id','=',$this->userOrgDataInt)->first();
        // dd($this->RoleUSerChecker);
        // dd($this->RoleUSerChecker);
        if($this->RoleUSerChecker){
            // dd("Hello");
            // dd(DB::table('role_user')->where('user_id','=',$this->userId));
            DB::table('role_user')->where('user_id','=',$this->userId)->delete();
            DB::table('role_user')->insert([
                ['organization_id' => $this->organizationModel,'role_id' => $this->userRoleDataInt, 'user_id' => $this->userId],
            ]);
        // //     $this->modalAddRoleFormVisible = false;
        // //     $this->resetAddRoleUserValidation();
        // //     $this->reset();
        }else{
            dd("world");
        //     DB::table('role_user')->insert([
        //         ['organization_id' => $this->organizationModel,'role_id' => $this->userRoleDataInt, 'user_id' => $this->userId],
        //     ]);
        // //     $this->modalAddRoleFormVisible = false;
        // //     $this->resetAddRoleUserValidation();
        // //     $this->reset();
        }
        // $user->organizations()->sync($this->organizationModel);
        // $this->modalAddOrganizationFormVisible = false;
        // $this->reset();
        // $this->resetAddRoleUserValidation();
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


    /*====================================================================
    =            Generate Logged in key Section comment block            =
    ====================================================================*/
    public function generateKeyModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->userId = $id;
        $this->modelConfirmUserGenerateKeyVisible = true;
    }
    public function generateKey()
    {
         $random = '';
  for ($i = 0; $i < 20; $i++) {
    $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
  }
  dd($random);
  // return $random;
        // echo Str::uuid();
        // // dd("hello");
        // // $this->end_key =  Str::uuid();
        // $n=60;
        // $this->secret_characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $this->end_key = '';
        // for ($i = 0; $i < $n; $i++) {
        //     $index = rand(0, strlen($this->secret_characters) - 1);
        //     $this->end_key .= $this->secret_characters[$index];
        // }
        // // return $this->end_key;
        // // // echo $this->end_key;
        // SoisGate::create($this->modelGenerateKey());
        // // dd($this->userId);
        // $this->modelConfirmUserGenerateKeyVisible = false;
        // $this->resetValidation();
        // $this->reset();
    }

    public function modelGenerateKey()
    {
        return [
            'user_id' => $this->userId,
            'gate_key' => $this->end_key,
        ];
    }
    
    /*=====  End of Generate Logged in key Section comment block  ======*/
    
    /*============================================================
    =            Add Permission Section comment block            =
    ============================================================*/
    public function addShowPermissionModel($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->userId = $id;
        $this->modaladdPermissionModel = true;
    }

    public function addPermissionToUser()
    {
        $this->user = User::find($this->userId);
        // dd(gettype($this->testButtonArray));
        $this->user->permissions()->sync($this->permissionModel);
        // dd($this->permissionModel);
    }
    
    
    /*=====  End of Add Permission Section comment block  ======*/
    


    /**
     *
     * Rules for Forms
     *
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'password' => 'required',
            'status' => 'required',
            'student_number' => 'required',
        ];
    }

    /*=======================================
    =            Role Separation            =
    =======================================*/
    
    public function AdminSpecificUsers()
    {
        return DB::table('users')
            ->join('role_user', 'users.user_id', '=', 'role_user.user_id')
            ->where('role_id','=','1')
            ->orderBy('users.user_id','asc')
            ->paginate(20);
    }

    public function HomepageAdminSpecificUsers()
    {
        return DB::table('users')
            ->join('role_user', 'users.user_id', '=', 'role_user.user_id')
            ->where('role_id','=','2')
            ->orderBy('users.user_id','asc')
            ->paginate(10);
    }

    public function UserSpecificUsers()
    {
        return DB::table('users')
            ->join('role_user', 'users.user_id', '=', 'role_user.user_id')
            ->where('role_id','!=','2')
            ->where('role_id','!=','1')
            ->orderBy('users.user_id','asc')
            ->paginate(20);
    }
    
    /*=====  End of Role Separation  ======*/
    
    public function selecteduser($id)
    {
        $this->userId = $id;
        // return route
        // return redirect()->route('users.selected-users.', ['id' => $this->userId]);
        // return redirect('/users/'.$this->userId);
                // dd($this->userId);
    }




    /**
     *
     * Get Permission List
     *
     */
    public function listofPermissions()
    {
        // dd(DB::table('permissions')->orderBy('permission_id','asc')->get());
        return DB::table('permissions')->orderBy('permission_id','asc')->get();
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
            'permsList' => $this->listofPermissions(),
            'displayOrganizationData' => $this->displayOrganization(),
            'HomepageAdminTable' => $this->HomepageAdminSpecificUsers(),
            'AdminTable' => $this->AdminSpecificUsers(),
            'UsersTable' => $this->UserSpecificUsers(),
            'displaySelectedUserPermission' => $this->selectedPermsList(),
        ]);
    }
}
