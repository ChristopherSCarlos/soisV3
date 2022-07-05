<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Storage;

use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;
use App\Models\SoisGate;

use Livewire\WithPagination;
use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Crypt;

class SelectedUser extends Component
{
    use WithPagination;
 
    public $modalUpdateUserPasswordFormVisible = false;
    public $modalAddRoleFormVisible = false;
    public $modelConfirmUserGenerateKeyVisible = false;
    public $modaladdPermissionModel = false;
    public $modalAddOrganizationFormVisible = false;

    public $user;

    public $secret_characters;
    public $end_key;
    
    public $organizationModel=null;
    public $permissionModel=null;

    public $userInt;
    public $userId;
    public $explodedLink;
    public $actual_link;

    private $SelectedUserData;
    public $SelectedUserCourse;
    public $SelectedUserGender;

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
    public $course_id;
    public $course_ids;
    public $gender_id;
    public $gender_ids;

    public $first_name_DB;
    public $middle_name_DB;
    public $last_name_DB;
    public $date_of_birth_DB;
    public $address_DB;
    public $mobile_number_DB;
    public $email_DB;
    public $password_DB;
    public $student_number_DB;
    public $course_id_DB;
    public $gender_id_DB;

    public $data;
    public $course_type = '0';
    public $displayCourseName;

    private $UserRoleOrgData;
    public $UserRole;

    private $UserOrgData;
    public $UserOrg;

    private $UserGateData;
    private $UserGate;
    public $UserGateKey;
    public $UserGateErrorLog;

    private $UserPermsissionData;
    public $UserPermsission;

    private $current_password_data;
    public $current_password_1;
    public $current_password_1_DB;
    public $new_password_1;
    public $new_password_1_DB;

    private $RoleUSerChecker;
    public $latestID;
    private $userOrgData;
    public $userOrgDataInt;
    private $userRoleData;
    public $userRoleDataInt;
    public $roleModel=null;

    private $RoleSignatureChecker;
    public $latestSignatureID;

    private $uuid;
    private $uuidExplodedArray;
    private $uuidArray;
    private $selected_key;
 
    private $encrypted;

    public function mount()
    {
        $this->actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->explodedLink = explode("-",$this->actual_link);
        $this->userInt = (int) $this->explodedLink[3];
        // dd($this->userInt);
    }

     /*====================================================================
    =            Generate Logged in key Section comment block            =
    ====================================================================*/
    public function generateKeyModal($id)
    {
        // $this->resetValidation();
        // $this->reset();
        $this->userId = $id;
        $this->modelConfirmUserGenerateKeyVisible = true;
    }
    public function generateKey()
    {
        echo Str::uuid();
        $this->uuid = Str::uuid();
        echo "<br><br>";
        $this->encrypted =  Hash::make($this->uuid);
        echo "<br><br>";
        // dd(DB::table('sois_gates')->where('user_id','=',$this->userInt)->first());
        $this->selected_key = DB::table('sois_gates')->where('user_id','=',$this->userInt)->first();
        // dd($this->selected_key);
        if ($this->selected_key) {
            // DB::table('sois_gates')->where('user_id','=',$this->userInt)->delete();
            // DB::table('sois_gates')->inse
            // dd(SoisGate::where('gate_key','=',$this->encrypted)->exists());
            if (SoisGate::where('gate_key','=',$this->encrypted)->exists()) {
                echo 1;
            }else{
                echo 2;
            }
            dd("Hello");
            // SoisGate::where('user_id','=',$this->userInt)->update($this->modelUpdateGenerateKey());
            // SoisGate::create($this->modelGenerateKey());
            // dd($this->userId);
            // $this->modelConfirmUserGenerateKeyVisible = false;
            // $this->redirector($this->userInt);
            // $this->resetValidation();
            // $this->reset();
        }else{
            SoisGate::create($this->modelGenerateKey());
            $this->modelConfirmUserGenerateKeyVisible = false;
            $this->redirector($this->userInt);
            $this->resetValidation();
            $this->reset();
        }
        // DD("Hello");
    }

    public function modelUpdateGenerateKey()
    {
        return [
            'gate_key' => $this->uuid,
            'hash_key' => $this->encrypted,
        ];
    }

    public function modelGenerateKey()
    {
        return [
            'user_id' => $this->userId,
            'gate_key' => $this->uuid,
            'hash_key' => $this->encrypted,
        ];
    }
    
    /*=====  End of Generate Logged in key Section comment block  ======*/

    public function getUserData()
    {
        return DB::table('users')->where('user_id','=',$this->userInt)->paginate(1);
    }
    public function getUserCourse()
    {
        $this->SelectedUserCourse = DB::table('users')->where('user_id','=',$this->userInt)->pluck('course_id');
        return DB::table('courses')->where('course_id','=',$this->SelectedUserCourse)->get();
    }
    public function getUserGender()
    {
        $this->SelectedUserGender = DB::table('users')->where('user_id','=',$this->userInt)->pluck('gender_id');
        return DB::table('genders')->where('gender_id','=',$this->SelectedUserGender)->get();
    }
    public function getCourseData()
    {
        return DB::table('courses')->get();
    }
    public function getUserCourseFromDatabaseForUpdateSelection()
    {
        $this->SelectedUserCourse = DB::table('users')->where('user_id','=',$this->userInt)->pluck('course_id');
        return DB::table('courses')->where('course_id','=',$this->SelectedUserCourse)->get();
    }
    public function getGenderData()
    {
        return DB::table('genders')->get();
    }
    public function getUserGenderFromDatabaseForUpdateSelection()
    {
        // $this->SelectedUserData = DB::table('users')->where('user_id','=',$this->userInt)->get();
        $this->SelectedUserGender = DB::table('users')->where('user_id','=',$this->userInt)->pluck('gender_id');
        // $this->SelectedUserGender = $this->SelectedUserData->gender_id;
        return DB::table('genders')->where('gender_id','=',$this->SelectedUserGender)->get();
    }
    public function getUserRole()
    {
        $this->UserRoleOrgData = DB::table('role_user')->where('user_id','=',$this->userInt)->first();
        $this->UserRole = $this->UserRoleOrgData->role_id;
        // print_r(DB::table('role_user')->where('user_id','=',$this->userInt)->get());
        // dd(DB::table('roles')->where('role_id','=',$this->UserRole)->get());
        // dd($this->UserRoleOrgData);
        return DB::table('roles')->where('role_id','=',$this->UserRole)->get();
    }
    public function getUserOrganization()
    {
        $this->UserOrgData = DB::table('role_user')->where('user_id','=',$this->userInt)->first();
        $this->UserOrg = $this->UserOrgData->organization_id;
        // dd($this->UserOrg);
        return DB::table('organizations')->where('organization_id','=',$this->UserOrg)->get();
    }
    public function getUserSoisGate()
    {
        $this->UserGateData = DB::table('sois_gates')->where('user_id','=',$this->userInt)->first();
        if($this->UserGateData){
            $this->UserGateErrorLog = "Exists";
            $this->UserGate = DB::table('sois_gates')->where('user_id','=',$this->userInt)->first();
            $this->UserGateKey = $this->UserGate->gate_key;
            // dd($this->UserGateKey);
            return DB::table('sois_gates')->where('user_id','=',$this->userInt)->get();
        }else{
            $this->UserGateErrorLog = "Doesn't Exists";
            // return $this->UserGateErrorLog;
            return DB::table('sois_gates')->where('user_id','=',$this->userInt)->get();
        }
        // dd($this->UserGateData);
    }

    public function getUserPermission()
    {
        // $this->UserPermsissionData = DB::table('permission_user')->where('user_id','=',)
        // dd(User::find($this->userInt)->permissions()->get());
        // dd("Hello");
        return User::find($this->userInt)->permissions()->get();
    }

    /*=============================================================
    =            Update Password Section comment block            =
    =============================================================*/
    public function updateUserPasswordModel($id)
    {
        // $this->resetValidation();
        // $this->reset();
        $this->userId = $id;
        // dd($this->userId);
        $this->modalUpdateUserPasswordFormVisible = true;
    }
    public function updateUserPassword()
    {
        User::find($this->userId)->update(['password'=>Hash::make($this->password)]);
        $this->modalUpdateUserPasswordFormVisible = false;
        $this->resetValidation();
        $this->reset();
        $this->password = null;
        $this->redirector();

    }
    
    
    /*=====  End of Update Password Section comment block  ======*/
    


    /*=========================================================
    =            Update User Section comment block            =
    =========================================================*/
        public function getUserDataFromDatabase()
        {
            $this->data = User::find($this->userInt);
            // dd($this->data);
            $this->middle_name = $this->data->middle_name;
            $this->last_name = $this->data->last_name;
            $this->date_of_birth = $this->data->date_of_birth;
            $this->course_id = $this->data->course_id;
            $this->address = $this->data->address;
            $this->gender_id = $this->data->gender_id;
            $this->email = $this->data->email;
            $this->mobile_number = $this->data->mobile_number;
            $this->student_number = $this->data->student_number;
        }
        public function modelUpdateUser()
        {
            return [
                'first_name' => $this->first_name_DB,
                'middle_name' => $this->middle_name_DB,
                'last_name' => $this->last_name_DB,
                'date_of_birth' => $this->date_of_birth_DB,
                'course_id' => $this->course_id_DB,
                'address' => $this->address_DB,
                'gender_id' => $this->gender_id_DB,
                'email' => $this->email_DB,
                'mobile_number' => $this->mobile_number_DB,
                'student_number' => $this->student_number_DB,
            ];
        }
        public function update()
        {
            $this->data = User::find($this->userInt);
            // dd($this->data);
            /*==========================================================================
            =            Selector if data is inputted Section comment block            =
            ==========================================================================*/
                // first name
                    if($this->first_name_DB != null){
                        $this->first_name_DB; 
                    }else{
                        $this->first_name_DB = $this->data->first_name;
                    }
                // middle_name_DB,
                    if($this->middle_name_DB != null){
                        $this->middle_name_DB; 
                    }else{
                        $this->middle_name_DB = $this->data->middle_name;
                    }
                // last_name_DB,
                    if($this->last_name_DB != null){
                        $this->last_name_DB; 
                    }else{
                        $this->last_name_DB = $this->data->last_name;
                    }
                // date_of_birth_DB,
                    if($this->date_of_birth_DB != null){
                        $this->date_of_birth_DB; 
                    }else{
                        $this->date_of_birth_DB = $this->data->date_of_birth;
                    }
                // course_id_DB,
                    if($this->course_id_DB != null){
                        $this->course_id_DB; 
                    }else{
                        $this->course_id_DB = $this->data->course_id;
                    }
                // address_DB,
                    if($this->address_DB != null){
                        $this->address_DB; 
                    }else{
                        $this->address_DB = $this->data->address;
                    }
                // gender_id_DB,
                    if($this->gender_id_DB != null){
                        $this->gender_id_DB; 
                    }else{
                        $this->gender_id_DB = $this->data->gender_id;
                    }
                // email_DB,
                    if($this->email_DB != null){
                        $this->email_DB; 
                    }else{
                        $this->email_DB = $this->data->email;
                    }
                // mobile_number_DB,
                    if($this->mobile_number_DB != null){
                        $this->mobile_number_DB; 
                    }else{
                        $this->mobile_number_DB = $this->data->mobile_number;
                    }
                // student_number_DB,            
                    if($this->student_number_DB != null){
                        $this->student_number_DB; 
                    }else{
                        $this->student_number_DB = $this->data->student_number;
                    }
            /*=====  End of Selector if data is inputted Section comment block  ======*/
            
            User::find($this->userInt)->update($this->modelUpdateUser());
            $this->resetValidation();
            $this->reset(['first_name','middle_name','last_name','date_of_birth','address','mobile_number','email','password','student_number','course_id','course_ids','gender_id','gender_ids','first_name_DB','middle_name_DB','last_name_DB','date_of_birth_DB','address_DB','mobile_number_DB','email_DB','password_DB','student_number_DB','course_id_DB','gender_id_DB',]);
            $this->redirector();
            // dd($this->first_name_DB);
        }
        public function redirector($id)
        {
            $this->userId = $id;
            // dd($this->userId);
            // return redirect()->route('id', $this->userId);
            return redirect()->route('user/selected-user', ['id' => $this->userId]);
            // return redirect('/users/selected-user/'.$this->userId);
            // return redirect('/users/selected-user/'.$this->userId);
        }
        public function updateRedirect()
        {
            // code...
        }
    /*=====  End of Update User Section comment block  ======*/
    
    /*=============================================================
    =            Update Password Section comment block            =
    =============================================================*/
        public function getUserPassword()
        {
        //     User::find($this->userId)->update(['password'=>Hash::make($this->password)]);
        // $this->modalUpdateUserPasswordFormVisible = false;
        // $this->resetValidation();
        // $this->reset();
        // $this->password = null;
            // dd(DB::table('users')->where('user_id','=',$this->userInt)->get());
        }
        public function updatePassword()
        {
            $this->userInt;
            $this->current_password_data = DB::table('users')->where('user_id','=',$this->userInt)->first();
            if($this->new_password_1 != null){
                User::find($this->userInt)->update(['password'=> $this->current_password_data->password]);
                $this->resetValidation();
                $this->reset();
            }else{
                User::find($this->userInt)->update(['password'=>Hash::make($this->new_password_1)]);
                $this->resetValidation();
                $this->reset();
                $this->new_password_1 = null;
            }
            // $this->redirector();
        }
    
    
    /*=====  End of Update Password Section comment block  ======*/
    

    /*==============================================================
    =            Sync Role To UserSection comment block            =
    ==============================================================*/
    public function addShowRoleModel($id)
    {
        // dd($this->userInt);
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
        $this->user = User::find($this->userInt);
        $this->RoleUSerChecker = DB::table('role_user')->where('user_id','=',$this->userInt)->first();
        $this->RoleSignatureChecker = DB::table('event_signatures')->where('user_id','=',$this->userInt)->first();
        
        // dd($this->RoleSignatureChecker);
        if($this->RoleUSerChecker){
            DB::table('role_user')->where('user_id','=',$this->userInt)->delete();
            DB::table('role_user')->insert([
                ['role_id' => $this->roleModel, 'user_id' => $this->userInt, 'organization_id' => null],
            ]);
            // $this->modalAddRoleFormVisible = false;
            // $this->redirector($this->userInt);
            // $this->resetAddRoleUserValidation();
            // $this->reset();
        }else{
            DB::table('role_user')->insert([
                ['role_id' => $this->roleModel, 'user_id' => $this->userInt, 'organization_id' => null],
            ]);
            // $this->modalAddRoleFormVisible = false;
            // $this->redirector($this->userInt);
            // $this->resetAddRoleUserValidation();
            // $this->reset();
        }
        if ($this->RoleSignatureChecker) {
            DB::table('event_signatures')->where('user_id','=',$this->userInt)->delete();
            DB::table('event_signatures')->insert([
                ['role_id' => $this->roleModel, 'user_id' => $this->userInt, 'organization_id' => null],
            ]);
        }else{
            DB::table('event_signatures')->insert([
                ['role_id' => $this->roleModel, 'user_id' => $this->userInt, 'organization_id' => null],
            ]);
        }
        $this->modalAddRoleFormVisible = false;
        $this->redirector($this->userInt);
        $this->resetAddRoleUserValidation();
        $this->reset();
    }
    public function resetAddRoleUserValidation()
    {
        $this->roleModel = null;
        $this->userId = null;
    }
    
    
    /*=====  End of Sync Role To UserSection comment block  ======*/
    
   


    /*============================================================
    =            Add Permission Section comment block            =
    ============================================================*/
    public function addShowPermissionModel($id)
    {
        // $this->resetValidation();
        // $this->reset();
        $this->userId = $id;
        $this->modaladdPermissionModel = true;
    }

    public function addPermissionToUser()
    {
        $this->user = User::find($this->userInt);
        // dd(gettype($this->testButtonArray));
        $this->user->permissions()->sync($this->permissionModel);
        $this->modaladdPermissionModel = false;
        $this->redirector($this->userInt);
        $this->resetValidation();
        $this->reset();
        // dd($this->permissionModel);
    }
    
    
    /*=====  End of Add Permission Section comment block  ======*/

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
        $this->user = User::find($this->userInt);
        // dd($this->user);
        // dd($this->organizationModel);
        // $this->userOrgData = DB::table('role_user')->where('user_id','=',$this->userInt)->pluck('organization_id');
        $this->userOrgData = DB::table('role_user')->where('user_id','=',$this->userInt)->first();
        $this->userOrgDataInt = $this->userOrgData->organization_id;
        // dd($this->userOrgDataInt);
        // DB::table('role_user')->where('user_id','=','4')->where('organization_id','=','9')->delete();
        $this->userRoleData = DB::table('role_user')->where('user_id','=',$this->userInt)->first();
        $this->userRoleDataInt = $this->userRoleData->role_id;
        // dd($this->userRoleDataInt);
        // dd(gettype($this->userRoleData));
        // dd(DB::table('role_user')->get());
        $this->RoleUSerChecker = DB::table('role_user')->where('user_id','=',$this->userInt)->where('organization_id','=',$this->userOrgDataInt)->first();
        // dd($this->RoleUSerChecker);
        // dd($this->RoleUSerChecker);
        if($this->RoleUSerChecker){
            // dd("Hello");
            // dd(DB::table('role_user')->where('user_id','=',$this->userInt));
            DB::table('role_user')->where('user_id','=',$this->userInt)->delete();
            DB::table('role_user')->insert([
                ['organization_id' => $this->organizationModel,'role_id' => $this->userRoleDataInt, 'user_id' => $this->userInt],
            ]);
            // $this->modalAddRoleFormVisible = false;
            // $this->redirector($this->userInt);
            // $this->resetValidation();
            // $this->reset();
        // //     $this->resetAddRoleUserValidation();
        // //     $this->reset();
        }else{
            // $this->modalAddRoleFormVisible = false;
            // $this->redirector($this->userInt);
            // $this->resetValidation();
            // $this->reset();
            // dd("world");
            DB::table('role_user')->insert([
                ['organization_id' => $this->organizationModel,'role_id' => $this->userRoleDataInt, 'user_id' => $this->userInt],
            ]);
        // //     $this->modalAddRoleFormVisible = false;
        // //     $this->resetAddRoleUserValidation();
        // //     $this->reset();
        }
        $this->RoleSignatureChecker = DB::table('event_signatures')->where('user_id','=',$this->userInt)->first();
        
        if ($this->RoleSignatureChecker) {
            DB::table('event_signatures')->where('user_id','=',$this->userInt)->delete();
            DB::table('event_signatures')->insert([
                ['organization_id' => $this->organizationModel,'role_id' => $this->userRoleDataInt, 'user_id' => $this->userInt],
            ]);
        }else{
            DB::table('event_signatures')->insert([
                ['organization_id' => $this->organizationModel,'role_id' => $this->userRoleDataInt, 'user_id' => $this->userInt],
            ]);
        }
        $this->modalAddRoleFormVisible = false;
            $this->redirector($this->userInt);
            $this->resetValidation();
            $this->reset();
        // $user->organizations()->sync($this->organizationModel);
        // $this->modalAddOrganizationFormVisible = false;
        // $this->reset();
        // $this->resetAddRoleUserValidation();
    }
    
    
    /*=====  End of Add Organization to UserSection comment block  ======*/

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

    public function render()
    {
        return view('livewire.selected-user',[
            'displayRoleData' => $this->listOfRoles(),
            // 'displayAddRoleData' => $this->addRoleToUser(),
            'rolesList' => $this->listOfRoles(),
            'permsList' => $this->listofPermissions(),
            'displayOrganizationData' => $this->displayOrganization(),

            'displayUserSelectedData' => $this->getUserData(),
            'displayUserCourseData' => $this->getUserCourse(),
            'displayUserGendereData' => $this->getUserGender(),
            'displayUserRoleData' => $this->getUserRole(),
            'displayUserGateData' => $this->getUserSoisGate(),
            'displayUserPermsData' => $this->getUserPermission(),
            'displayUserPasswordData' => $this->getUserPassword(),
            'displayUserOrganizationData' => $this->getUserOrganization(),
            'displayUserDromDB' => $this->getUserDataFromDatabase(),
            'displayCourseDromDB' => $this->getCourseData(),
            'displayCourseDromDBForUpdateSelect' => $this->getUserCourseFromDatabaseForUpdateSelection(),
            'displayGenderDromDB' => $this->getGenderData(),
            'displayGenderDromDBForUpdateSelect' => $this->getUserGenderFromDatabaseForUpdateSelection(),
        ]);
    }
}
