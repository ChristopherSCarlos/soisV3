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

class UpdateUser extends Component
{
    use WithPagination;
    public $userInt;
    public $explodedLink;
    public $actual_link;

    private $SelectedUserData;
    public $SelectedUserCourse;
    public $SelectedUserGender;

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

    public function mount()
    {
        $this->actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->explodedLink = explode("-",$this->actual_link);
        // dd($this->explodedLink);
        $this->userInt = (int) $this->explodedLink[3];
    }
    public function getUserData()
    {
        return DB::table('users')->where('user_id','=',$this->userInt)->get();
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
    public function getUserCourseFromDatabaseForUpdateSelection()
    {
        $this->SelectedUserCourse = DB::table('users')->where('user_id','=',$this->userInt)->pluck('course_id');
        return DB::table('courses')->where('course_id','=',$this->SelectedUserCourse)->get();
    }
    public function getCourseData()
    {
        return DB::table('courses')->get();
    }
    public function getUserGenderFromDatabaseForUpdateSelection()
    {
        // $this->SelectedUserData = DB::table('users')->where('user_id','=',$this->userInt)->get();
        $this->SelectedUserGender = DB::table('users')->where('user_id','=',$this->userInt)->pluck('gender_id');
        // $this->SelectedUserGender = $this->SelectedUserData->gender_id;
        return DB::table('genders')->where('gender_id','=',$this->SelectedUserGender)->get();
    }
    public function getGenderData()
    {
        return DB::table('genders')->get();
    }

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
            // $this->redirector();
            // dd($this->first_name_DB);
        }
        public function redirector()
        {
            // return redirect()->route('login');
            return redirect()->route('user-selected-user', ['id' => $this->userInt]);
            // return redirect('/users-selected-user-'.$this->userInt);
        }
        public function updateRedirect()
        {
            // code...
        }
    /*=====  End of Update User Section comment block  ======*/











    public function render()
    {
        return view('livewire.update-user',[
            'displayUserSelectedData' => $this->getUserData(),
            'displayUserCourseData' => $this->getUserCourse(),
            'displayUserGendereData' => $this->getUserGender(),
            'displayCourseDromDBForUpdateSelect' => $this->getUserCourseFromDatabaseForUpdateSelection(),
            'displayCourseDromDB' => $this->getCourseData(),
            'displayGenderDromDBForUpdateSelect' => $this->getUserGenderFromDatabaseForUpdateSelection(),
            'displayGenderDromDB' => $this->getGenderData(),

        ]);
    }
}
