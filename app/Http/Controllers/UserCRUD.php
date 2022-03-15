<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\STR;

use Storage;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\Models\User;

class UserCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
    public $latestID;
    public $user_id;

    public $getUserData;
    public $store_New_user_data;
    public $validatedData;

    public $SelectedUserCourse;
    public $SelectedUserCourseHolder;

    public $SelectedUserGender;
    public $SelectedUserGenderHolder;

    public $getCourseData;
    public $getGenderData;

    public $get_user_data_from_database;

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

    public $role_id;
    public $organization_id;

    public $UserOrgData;
    public $UserOrgDataFromDB;
    public $UserOrg;

    public $UserRoleOrgData;
    public $UserRole;

    public $UserGateData;
    public $UserGateErrorLog;
    public $UserGate;

    public $permissionDataFromDB;

    public $userOrgResultMessage;
    public $userOrgDataInt;
    public $userRoleData;
    public $RoleUSerChecker;
    public $RoleSignatureChecker;

    public function addOrg(Request $request, $id)
    {
        $organization_id = $request->organization_id;
        // echo $organization_id;

        $userOrgData = DB::table('role_user')->where('user_id','=',$id)->first();
        $userOrgDataInt = $userOrgData->organization_id;
        // echo $userOrgDataInt;
        
        $userRoleData = DB::table('role_user')->where('user_id','=',$id)->first();
        $userRoleDataInt = $userRoleData->role_id;
        // echo $userRoleDataInt;
        $RoleUSerChecker = DB::table('role_user')->where('user_id','=',$id)->where('organization_id','=',$userOrgDataInt)->first();
        // dd($RoleUSerChecker);
        if($RoleUSerChecker){
            DB::table('role_user')->where('user_id','=',$id)->delete();
            DB::table('role_user')->insert([
                ['organization_id' => $organization_id,'role_id' => $userRoleDataInt, 'user_id' => $id],
            ]);
        }else{
            DB::table('role_user')->insert([
                ['organization_id' => $organization_id,'role_id' => $userRoleDataInt, 'user_id' => $id],
            ]);
        }
        $RoleSignatureChecker = DB::table('event_signatures')->where('user_id','=',$id)->first();
        // dd($RoleSignatureChecker);
        if ($RoleSignatureChecker) {
            DB::table('event_signatures')->where('user_id','=',$id)->delete();
            DB::table('event_signatures')->insert([
                ['organization_id' => $organization_id,'role_id' => $userRoleDataInt, 'user_id' => $id],
            ]);
        }else{
            DB::table('event_signatures')->insert([
                ['organization_id' => $organization_id,'role_id' => $userRoleDataInt, 'user_id' => $id],
            ]);
        }
        return $this->accessControl($id);
    }

    public function accessControl($id)
    {
        return view('normlaravel/users-update-access');
    }

    public function addRole(Request $request, $id)
    {
        $role_id = $request->role_id;
        // echo $role_id;
        if (DB::table('role_user')->where('user_id','=',$id)->pluck('role_id') != null) {
            DB::table('role_user')->where('user_id','=',$id)->delete();
            DB::table('role_user')->insert([
                 'role_id' => $role_id, 'user_id' => $id, 'organization_id' => null,   
            ]);
            // echo "Exists";
        }else{
            DB::table('role_user')->insert([
                 'role_id' => $role_id, 'user_id' => $id, 'organization_id' => null,   
            ]);
            // echo "Not Exists";
        }
        // echo "Hello";
        return $this->accessControl($id);
        // return redirect()->route('user-selected-user', ['id' => $id]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('normlaravel.users-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $first_name = $request->first_name;
        $middle_name = $request->middle_name;
        $last_name = $request->last_name;
        $date_of_birth = $request->date_of_birth;
        $address = $request->address;
        $email = $request->email;
        $mobile_number = $request->mobile_number;
        $student_number = $request->student_number;
        $password = $request->password;


        User::create($this->modelCreateUser($first_name,$middle_name,$last_name,$date_of_birth,$address,$email,$mobile_number,$student_number,$password));
        $latestID = DB::table('users')->orderBy('user_id', 'desc')->first();
        DB::table('role_user')->insert([
                ['role_id' => '8', 'user_id' => $latestID->user_id, 'organization_id' => null],
            ]);

        return view('normlaravel/users-create');
    }

    public function modelCreateUser($first_name,$middle_name,$last_name,$date_of_birth,$address,$email,$mobile_number,$student_number,$password)
    {
        return [
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'date_of_birth' => $date_of_birth,
            'address' => $address,
            'email' => $email,
            'mobile_number' => $mobile_number,
            'status' => '1',
            'student_number' => $student_number,
            'password' => Hash::make($password),
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $getUserData = DB::table('users')->where('user_id','=',$id)->get();
        // dd(DB::table('users')->where('user_id','=',$id)->get());
        // return view('normlaravel/users-update',compact('getUserData'));
        $SelectedUserCourseHolder = DB::table('users')->where('user_id','=',$id)->pluck('course_id');
        $SelectedUserCourse = DB::table('courses')->where('course_id','=',$SelectedUserCourseHolder)->get();
        // dd($SelectedUserCourse);

        $SelectedUserGenderHolder = DB::table('users')->where('user_id','=',$id)->pluck('gender_id');
        // $this->SelectedUserGender = $this->SelectedUserData->gender_id;
        $SelectedUserGender = DB::table('genders')->where('gender_id','=',$SelectedUserGenderHolder)->get();


        $getCourseData = DB::table('courses')->get();
        $getGenderData = DB::table('genders')->get();

        return view('normlaravel/users-update')->with('displayUserSelectedData', $getUserData)->with('displayCourseDromDBForUpdateSelect', $SelectedUserCourse)->with('displayGenderDromDBForUpdateSelect', $SelectedUserGender)->with('displayCourseDromDB',$getCourseData)->with('displayGenderDromDB',$getGenderData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $get_user_data_from_database = User::find($id);
        // Start of if
            /*==========================================================================
            =            Selector if data is inputted Section comment block            =
            ==========================================================================*/
                // first name
        $first_name = $request->first_name;
        $middle_name = $request->middle_name;
        $last_name = $request->last_name;
        $date_of_birth = $request->date_of_birth;
        $address = $request->address;
        $email = $request->email;
        $course_id = $request->course_id;
        $gender_id = $request->gender_id;
        $mobile_number = $request->mobile_number;
        $student_number = $request->student_number;
                    if($first_name != null){
                        $first_name_DB = $first_name;
                        echo "first_name_DB: ".$first_name_DB." : This is not null"; 
                        echo "<br><br>";
                    }else{
                        $first_name_DB= $get_user_data_from_database->first_name;
                        echo "first_name_DB: ".$first_name_DB." : This is null";
                        echo "<br><br>";
                    }
                    // middle_name_DB,
                    if($middle_name != null){
                        $middle_name_DB = $middle_name;
                        echo "middle_name_DB: ".$middle_name_DB." : This is not null";
                        echo "<br><br>"; 
                    }else{
                        $middle_name_DB= $get_user_data_from_database->middle_name;
                        echo "middle_name_DB: ".$middle_name_DB." : This is null";
                        echo "<br><br>";
                    }
                // last_name_DB,
                    if($last_name != null){
                        $last_name_DB = $last_name;
                        echo "last_name_DB: ".$last_name_DB." : This is not null";
                        echo "<br><br>"; 
                    }else{
                        $last_name_DB= $get_user_data_from_database->last_name;
                        echo "last_name_DB: ".$last_name_DB." : This is null";
                        echo "<br><br>";
                    }
                // date_of_birth_DB,
                    if($date_of_birth != null){
                        $date_of_birth_DB = $date_of_birth;
                        echo "date_of_birth_DB: ".$date_of_birth_DB." : This is not null";
                        echo "<br><br>"; 
                    }else{
                        $date_of_birth_DB= $get_user_data_from_database->date_of_birth;
                        echo "date_of_birth_DB: ".$date_of_birth_DB." : This is null";
                        echo "<br><br>";
                    }
                // course_id_DB,
                    if($course_id != null){
                        $course_id_DB = $course_id;
                        echo "course_id_DB: ".$course_id_DB." : This is not null";
                        echo "<br><br>"; 
                    }else{
                        $course_id_DB= $get_user_data_from_database->course_id;
                        echo "course_id_DB: ".$course_id_DB." : This is null";
                        echo "<br><br>";
                    }
                // address_DB,
                    if($address != null){
                        $address_DB = $address;
                        echo "address_DB: ".$address_DB." : This is not null";
                        echo "<br><br>"; 
                    }else{
                        $address_DB= $get_user_data_from_database->address;
                        echo "address_DB: ".$address_DB." : This is null";
                        echo "<br><br>";
                    }
                // gender_id_DB,
                    if($gender_id != null){
                        $gender_id_DB = $gender_id;
                        echo "gender_id_DB: ".$gender_id_DB." : This is not null";
                        echo "<br><br>"; 
                    }else{
                        $gender_id_DB= $get_user_data_from_database->gender_id;
                        echo "gender_id_DB: ".$gender_id_DB." : This is null";
                        echo "<br><br>";
                    }
                // email_DB,
                    if($email != null){
                        $email_DB = $email;
                        echo "email_DB: ".$email_DB." : This is not null";
                        echo "<br><br>"; 
                    }else{
                        $email_DB= $get_user_data_from_database->email;
                        echo "email_DB: ".$email_DB." : This is null";
                        echo "<br><br>";
                    }
                // mobile_number_DB,
                    if($mobile_number != null){
                        $mobile_number_DB = $mobile_number;
                        echo "mobile_number_DB: ".$mobile_number_DB." : This is not null";
                        echo "<br><br>"; 
                    }else{
                        $mobile_number_DB= $get_user_data_from_database->mobile_number;
                        echo "mobile_number_DB: ".$mobile_number_DB." : This is null";
                        echo "<br><br>";
                    }
                // student_number_DB,            
                    if($student_number != null){
                        $student_number_DB = $student_number;
                        echo "student_number_DB: ".$student_number_DB." : This is not null";
                        echo "<br><br>"; 
                    }else{
                        $student_number_DB= $get_user_data_from_database->student_number;
                        echo "student_number_DB: ".$student_number_DB." : This is null";
                        echo "<br><br>";
                    }
        //     /*=====  End of Selector if data is inputted Section comment block  ======*/
        User::find($id)->update($this->modelUpdateUser($first_name_DB,$middle_name_DB,$last_name_DB,$date_of_birth_DB,$address_DB,$email_DB,$mobile_number_DB,$student_number_DB,$course_id_DB,$gender_id_DB));
        return redirect()->route('user-selected-user', ['id' => $id]);
    }
    public function modelUpdateUser($first_name_DB,$middle_name_DB,$last_name_DB,$date_of_birth_DB,$address_DB,$email_DB,$mobile_number_DB,$student_number_DB,$course_id_DB,$gender_id_DB)
        {
            return [
                'first_name' => $first_name_DB,
                'middle_name' => $middle_name_DB,
                'last_name' => $last_name_DB,
                'date_of_birth' => $date_of_birth_DB,
                'course_id' => $course_id_DB,
                'address' => $address_DB,
                'gender_id' => $gender_id_DB,
                'email' => $email_DB,
                'mobile_number' => $mobile_number_DB,
                'student_number' => $student_number_DB,
            ];
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
