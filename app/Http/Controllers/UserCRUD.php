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
use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;
use App\Models\SoisGate;
use App\Models\Permission;

use Auth;

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
    public $id;

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
    public $userOrgPermsMessage;
    public $userOrgDataInt;
    public $userRoleData;
    public $RoleUSerChecker;
    public $RoleSignatureChecker;

    public $uuid;
    public $userData;
    public $selectedPerms = [];

    public $confirmable_password;
    public $new_password;
    public $old_password_1;
    public $old_password_2;

    public function addPassword(Request $request,$id)
    {
        echo Auth::user()->password;
        $old_password = DB::table('users')->where('user_id','=',$id)->pluck('password');
        $old_password_1 = str_replace("[\"", '', $old_password);
        $old_password_2 = str_replace("\"]", '', $old_password_1);
        $confirmable_password =$request->confirmable_password;
        $new_password =$request->new_password;
        if (!Hash::check($new_password, Auth::user()->password)) {
            if ($new_password != $confirmable_password) {
                $error = 'new_pw_doest_match_confrimable_pass';
                return $this->accessControl($id,$error);
            }else{
                User::find($id)->update(['password'=>Hash::make($new_password)]);
                // dd(User::find($id));
                return $this->accessControl($id);
            }
        }else{
            $error = 'same_password_From_last_pw';
            return $this->accessControl($id,$error);
        }
        // dd($id);
    }

    public function addMorePerms(Request $request,$id)
    {
        $selectedMorePerms = $request->selectedMorePerms;
        $userData = User::find($id);
        $userData->permissions()->attach($selectedMorePerms);
        $selectedMorePerms = null;
        $userData = null;
        // dd($selectedMorePerms);
        // dd("hello");
        return $this->accessControl($id);
    }

    public function addPerms(Request $request,$id)
    {
        $selectedPerms = $request->selectedPerms;
        // dd(gettype($selectedPerms));
        // dd($selectedPerms);
        // $data = [
        //     ['permission_id' => $selectedPerms],
        //     ['role_id' => '1'],
        // ];
        // DB::table('permission_role')->insert($data);
        // dd(gettype($selectedPerms));
        // dd(DB::table('permission_user')->where('user_id','=',$id)->get());
        $userData = User::find($id);
        // dd(DB::table('permission_role')->where('role_id','=',$id)->get());
        // DB::table('permission_role')->where('role_id','=',$id)->delete();
        // DB::table('permission_role')->insert([
        //     ['permission_id' => $selectedPerms,'role_id' => $id ],
        // ]);
        // dd($selectedPerms);
        $userData->permissions()->sync($selectedPerms);
        // return $this->accessControl($id);
        return $this->accessControl($id);
    }

    public function addKey($id)
    {
        // echo Str::uuid();
        $uuid = Str::uuid();
        // echo "<br><br>";
        // $this->encrypted =  Hash::make($this->uuid);
        // echo "<br><br>";
        // dd(DB::table('sois_gates')->where('user_id','=',$id)->first());
        $selected_key = DB::table('sois_gates')->where('user_id','=',$id)->first();
        // dd($selected_key);
        if ($selected_key) {
            // DB::table('sois_gates')->where('user_id','=',$id)->delete();
        //     // DB::table('sois_gates')->inse
        //     // dd(SoisGate::where('gate_key','=',$this->encrypted)->exists());
        //     dd("Hello");
            SoisGate::where('user_id','=',$id)->update($this->modelGenerateKey($id,$uuid));
            // SoisGate::create($this->modelGenerateKey($id,$uuid));
        //     // dd($this->userId);
        //     // $this->modelConfirmUserGenerateKeyVisible = false;
        //     // $this->redirector($this->userInt);
        //     // $this->resetValidation();
        //     // $this->reset();
        }else{
        //     echo "Do tno Exist";
            SoisGate::create($this->modelGenerateKey($id,$uuid));
        //     // $this->modelConfirmUserGenerateKeyVisible = false;
        //     // $this->redirector($this->userInt);
        //     // $this->resetValidation();
        //     // $this->reset();
        }
        // echo "Hello";
        // dd($id);
        return $this->accessControl($id);

    }
    public function modelGenerateKey($id,$uuid)
    {
        return [
            'user_id' => $id,
            'gate_key' => $uuid,
        ];
    }

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

    public function accessControl($id, $error = null)
    {
        // dd($id);
        // dd(DB::table('permission_user')->where('user_id','=',$id)->get('permission_id'));
        $role_id = null;
        echo $error;
        $getUserData = DB::table('users')->where('user_id','=',$id)->get();
        // dd(DB::table('users')->where('user_id','=',$id)->get());
        // return view('normlaravel/users-update',compact('getUserData'));
        $SelectedUserCourseHolder = DB::table('users')->where('user_id','=',$id)->pluck('course_id');
        $SelectedUserCourse = DB::table('courses')->where('course_id','=',$SelectedUserCourseHolder)->get();
        // dd($SelectedUserCourse);

        $SelectedUserGenderHolder = DB::table('users')->where('user_id','=',$id)->pluck('gender_id');
        // $this->SelectedUserGender = $this->SelectedUserData->gender_id;
        $SelectedUserGender = DB::table('genders')->where('gender_id','=',$SelectedUserGenderHolder)->get();

        //             'displayUserOrganizationData' => $this->getUserOrganization(),
        $UserOrgData = DB::table('role_user')->where('user_id','=',$id)->first();
        // dd($UserOrgData);
        $UserOrg = $UserOrgData->organization_id;
        
        if ($UserOrg) {
            $userOrgResultMessage = 'Change Organizaion';
        }else{
            $userOrgResultMessage = 'Add Organizaion';
        }
        // dd($UserOrg);

        // DB::table('organizations')->where('organization_id','=',$this->UserOrg)->get();
        // dd(DB::table('organizations')->where('organization_id','=',$this->UserOrg)->get());

            // 'displayUserRoleData' => $this->getUserRole(),
        $UserRoleOrgData = DB::table('role_user')->where('user_id','=',$id)->get();
        // $UserRoleOrgData = DB::table('role_user')->join('roles','roles.role_id','=','users.role_id')
        //                        ->where('users.user_id',$id)
        //                        ->select('roles.role')
        //                        ->get();
        // $UserRole = $UserRoleOrgData->role_id;
        // dd($UserRoleOrgData);
        $listofroles = DB::table('roles')->get();
        // dd($listofroles);



            // 'displayUserGateData' => $this->getUserSoisGate(),
        $UserGateData = DB::table('sois_gates')->where('user_id','=',$id)->get();
        if($UserGateData){
            $UserGateErrorLog = "Exists";
            $UserGate = DB::table('sois_gates')->where('user_id','=',$id)->first();
            // $UserGateKey = $UserGate->gate_key;
            // dd($UserGateKey);
            // return DB::table('sois_gates')->where('user_id','=',$id)->get();
        }else{
            $UserGateErrorLog = "Doesn't Exists";
            // return $UserGateErrorLog;
            // return DB::table('sois_gates')->where('user_id','=',$id)->get();
        }

            // 'displayUserPermsData' => $getUserPermission(),
        $permissionDataFromDB = User::find($id)->permissions()->get();
        // dd($permissionDataFromDB);
        // dd(DB::table('permission_user')->where('user_id','=',$id)->get());
        // dd(DB::table('organizations')->where('organization_id','=',$UserOrg)->get());
        // dd(DB::table('sois_gates')->where('user_id','=',$id)->get());

        $getCourseData = DB::table('courses')->get();
        $getGenderData = DB::table('genders')->get();
        $getRolesData = DB::table('roles')->get();
        $getOrganizationData = DB::table('organizations')->get();
        $getPermissionsData = DB::table('permissions')->get();
        // dd($getRolesData);
        $d = DB::table('permission_user')->where('user_id','=',Auth::id())->get('permission_id');
        $x = (array) $d;
        // echo gettype($x);
        // print_r($x->permission_id);
        $f = DB::table('permission_user')->where('user_id', '=', $id)->get('permission_id');
        // $f = DB::table('permission_user')->select('permission_id')->where('user_id', '=', $id)->get('permission_id');
        // echo gettype((string)$f);
        // $a[] = $f;
        // dd($a);

        $xxx = DB::table('permission_user')->where('user_id','=',$id)->get();
// echo gettype($xxx);
// dd($xxx);
    if ($xxx != null) {
        $data[] = [0];
    }else{
        foreach ($xxx as $zzz) {
            $data[] = $zzz->permission_id;
        }
    }
// dd("hello");
        // foreach ($xxx as $zzz) {
        //     $data[] = $zzz->permission_id;
        // }
// dd($data);

        // $c = DB::table('permissions')->whereNotIn('permission_id', $x)->get();;
        // $c = DB::table('permissions')->whereNotIn('permission_id', $data)->get();
        // dd($c);
        // dd($f);
        // $d = DB::table('permissions')
        //     ->join('permission_user', 'permissions.permission_id', '=', 'permission_user.permission_id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            // ->select('permissions.permission_id', 'contacts.phone', 'orders.price')
            // ->select('permissions.permission_id', 'permissions.name')
            // ->where('permissions.permission_id', '!=', 'permission_user.permission_id')
            // ->get();
        // dd($c);
        // dd("Hello");
        // return view('normlaravel/users-update');
        return view('normlaravel\users-update-access')
                ->with('errorMessage', $error)
                ->with('displayUserSelectedData', $getUserData)
                ->with('rolesList', $getRolesData)
                ->with('OrgsList', $getOrganizationData)
                ->with('permsList', $getPermissionsData)
                ->with('displayCourseDromDBForUpdateSelect', $SelectedUserCourse)
                ->with('displayGenderDromDBForUpdateSelect', $SelectedUserGender)
                ->with('displayCourseDromDB',$getCourseData)
                ->with('displayGenderDromDB',$getGenderData)
                // ->with('displayUserOrganizationData',$UserOrgData)
                // ->with('displayUserOrganizationData',DB::table('organizations')->where('organization_id','=',$UserOrg)->get())
                ->with('displayUserOrganizationData',DB::table('organizations')->where('organization_id','=',$UserOrg)->get())
                ->with('displayUserOrganizationDataMessage',$userOrgResultMessage)
                // ->with('displayUserRoleData',DB::table('roles')->where('role_id','=',$UserRole)->get())
                ->with('displayUserRoleData',$UserRoleOrgData)
                ->with('displayUserGateData',DB::table('sois_gates')->where('user_id','=',$id)->get())
                ->with('displayUserGateKeyData',DB::table('sois_gates')->where('user_id','=',$id)->get())
                ->with('displayUserPermsData',$permissionDataFromDB)
                ->with('displayListOgRoles',$listofroles)
                ->with('displayUserSelectedPermsData',DB::table('permissions')->whereNotIn('permission_id', $data)->get());
    }

    public function addRole(Request $request, $id)
    {
        $role_id = $request->role_id;
        $orgainzation_id = $request->organization_id;
        
        $userWithOrgData = DB::table('role_user')->where('user_id','=',$id)->where('organization_id','!=',null)->first();
        // dd($userWithOrgData->organization_id);

        // dd(DB::table('role_user')->where('user_id','=',$id)->where('organization_id','!=',null)->first());
        // echo $role_id;

        DB::table('role_user')->insert([
                 'role_id' => $role_id, 'user_id' => $id, 'organization_id' => $userWithOrgData->organization_id,   
            ]);
        
        $userRoleData = DB::table('role_user')->where('user_id','=',$id)->first();
        // dd($userRoleData->role_id);
        $userRoleDataInt = $userRoleData->role_id;
        // echo $userRoleDataInt;
        $RoleUSerChecker = DB::table('role_user')->where('user_id','=',$id)->where('organization_id','=',$userRoleData->organization_id)->first();
        // dd($RoleUSerChecker);
        if (DB::table('event_signatures')->where('user_id','=',$id)->first() == null) {
            DB::table('event_signatures')->insert([
                ['organization_id' => $userRoleData->organization_id,'role_id' => $userRoleDataInt, 'user_id' => $id],
            ]);
        }
        // dd(DB::table('event_signatures')->where('user_id','=',$id)->first());

        // if($RoleUSerChecker){
        //     DB::table('role_user')->where('user_id','=',$id)->delete();
        //     DB::table('role_user')->insert([
        //         ['organization_id' => $organization_id,'role_id' => $userRoleDataInt, 'user_id' => $id],
        //     ]);
        // }else{
        //     DB::table('role_user')->insert([
        //         ['organization_id' => $organization_id,'role_id' => $userRoleDataInt, 'user_id' => $id],
        //     ]);
        // }
        // $RoleSignatureChecker = DB::table('event_signatures')->where('user_id','=',$id)->first();
        // // dd($RoleSignatureChecker);
        // if ($RoleSignatureChecker) {
        //     DB::table('event_signatures')->where('user_id','=',$id)->delete();
        //     DB::table('event_signatures')->insert([
        //         ['organization_id' => $organization_id,'role_id' => $userRoleDataInt, 'user_id' => $id],
        //     ]);
        // }else{
        //     DB::table('event_signatures')->insert([
        //         ['organization_id' => $organization_id,'role_id' => $userRoleDataInt, 'user_id' => $id],
        //     ]);
        // }



            
        
        // echo "Hello";
        $role_id = null;
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
        // return view('normlaravel/users-update',[
        //     'displayUserSelectedData' => $getUserData,
        //     'displayCourseDromDBForUpdateSelect' => $SelectedUserCourse,
        //     'displayCourseDromDBForUpdateSelect' => DB::table('courses')->where('course_id','=',$SelectedUserCourseHolder)->get(),
        //     'displayGenderDromDBForUpdateSelect' => $SelectedUserGender,
        //     'displayCourseDromDB' =>$getCourseData,
        //     'displayGenderDromDB' =>$getGenderData,
        // ]);
        // return view('normlaravel/users-update')
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
        // $validatedData = $request->validate([
        //     'first_name' => 'required',
        // ]);
        $get_user_data_from_database = User::find($id);
        // Start of if
        // $first_name_DB = $get_user_data_from_database->first_name;
        // $middle_name_DB = $get_user_data_from_database->middle_name;
        // $last_name_DB = $get_user_data_from_database->last_name;
        // $date_of_birth_DB = $get_user_data_from_database->date_of_birth;
        // $course_id_DB = $get_user_data_from_database->course_id;
        // $address_DB = $get_user_data_from_database->address;
        // $gender_id_DB = $get_user_data_from_database->gender_id;
        // $email_DB = $get_user_data_from_database->email;
        // $mobile_number_DB = $get_user_data_from_database->mobile_number;
        // $student_number_DB = $get_user_data_from_database->student_number;
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
        
        echo "first_name: ".$first_name;
        echo "<br><br>";
        echo "middle_name: ".$middle_name;
        echo "<br><br>";
        echo "last_name: ".$last_name;
        echo "<br><br>";
        echo "date_of_birth: ".$date_of_birth;
        echo "<br><br>";
        echo "address: ".$address;
        echo "<br><br>";
        echo "email: ".$email;
        echo "<br><br>";
        echo "course_id: ".$course_id;
        echo "<br><br>";
        echo "gender_id: ".$gender_id;
        echo "<br><br>";
        echo "mobile_number: ".$mobile_number;
        echo "<br><br>";
        echo "student_number: ".$student_number;
        echo "<br><br>";
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
            // $this->reset(['first_name','middle_name','last_name','date_of_birth','address','mobile_number','email','password','student_number','course_id','course_ids','gender_id','gender_ids','first_name_DB','middle_name_DB','last_name_DB','date_of_birth_DB','address_DB','mobile_number_DB','email_DB','password_DB','student_number_DB','course_id_DB','gender_id_DB',]);
            // $this->redirector();
        // return redirect('user-selected-user', ['id' => $id]);
        return redirect()->route('user-selected-user', ['id' => $id]);
            // return view('normlaravel/users-update');
        // dd("Hello");

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
