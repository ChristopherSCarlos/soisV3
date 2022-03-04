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

use Livewire\WithPagination;
use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class SelectedUser extends Component
{
    use WithPagination;
 
    public $modalUpdateUserPasswordFormVisible = false;


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

    public function mount()
    {
        $this->actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->explodedLink = explode("/",$this->actual_link);
        $this->userInt = (int) $this->explodedLink[5];
    }

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
        public function redirector()
        {
            // return redirect()->route('id', $this->userId);
            return redirect()->route('/user/selected-user', ['id' => $this->userId]);
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
            $this->redirector();
        }
    
    
    /*=====  End of Update Password Section comment block  ======*/
    

    /*=========================================================
    =            Update Role Section comment block            =
    =========================================================*/
    public function test()
    {
        dd("heyllo");
    }
    public function addRoleToUser()
    {
        // $this->user = User::find($this->userInt);
        // $this->RoleUSerChecker = DB::table('role_user')->where('user_id','=',$this->userInt)->first();
        // dd($this->RoleUSerChecker);
        dd("Hello");
        // if($this->RoleUSerChecker){
        //     DB::table('role_user')->where('user_id','=',$this->userInt)->delete();
        //     DB::table('role_user')->insert([
        //         ['role_id' => $this->roleModel, 'user_id' => $this->userInt, 'organization_id' => null],
        //     ]);
        //     $this->modalAddRoleFormVisible = false;
        //     $this->resetAddRoleUserValidation();
        //     $this->reset();
        // }else{
        //     DB::table('role_user')->insert([
        //         ['role_id' => $this->roleModel, 'user_id' => $this->userInt, 'organization_id' => null],
        //     ]);
        //     $this->resetAddRoleUserValidation();
        //     $this->reset();
        // }
    }
    public function resetAddRoleUserValidation()
    {
        $this->roleModel = null;
        $this->userInt = null;
    }
    
    
    /*=====  End of Update Role Section comment block  ======*/
    




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