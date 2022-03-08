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
        //
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
        //
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
