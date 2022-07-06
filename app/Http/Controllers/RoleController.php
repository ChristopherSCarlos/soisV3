<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\PermissionCheckerController;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use NumberFormatter;
class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function roleView(Role $role)
    {
        $perms_array = DB::table('permission_role')->where('role_id','=',$role->role_id)->pluck('permission_id');
        $perms = Role::where('role_id','=',$role->role_id)->with('permissions')->get();
        $role_data = DB::table('roles')->where('role_id','=',$role->role_id)->get();
        return view('normlaravel/roles-view', compact('role_data'),compact('perms'));
    }


    public function displayPermissions($perms_array)
    {
        for ($i=0; $i < count($perms_array); $i++) { 
            echo "<br>";
            $permsData = DB::table('permissions')->where('permission_id','=',$perms_array[$i])->first();
            echo $i + 1;
            $perms = (array) $permsData;
            print_r($perms);
            echo gettype($perms);
            // return $perms;
        }
        // dd("hello");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // abort_if()
        $this->permssionChecker = new PermissionCheckerController();
        $this->permssionChecker->test('HP-View_Permissiona',$role);
        if ($this->permssionChecker->test('HP-View_Permission',$role) != false) {
            return $this->roleView($role);
        }else{
            abort(403,'Unauthorized Action.');
        }
        // dd($this->permssionChecker->test('HP-View_Permission',$role));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    public function sync($id)
    {
        // dd(DB::Table('permissions')->get());
        return view('normlaravel/super-roles-sync',[
            'id' => $id,
            'perms' => DB::Table('permissions')->get(),
            'role_data' => DB::Table('roles')->where('role_id','=',$id)->get(),
        ]);
    }

    public function rolesSync(Request $request, $id)
    {
        // dd($id);
        $roleData = Role::find($id);
        // dd($roleData->permissions());
        // $input = $request->all();
        
        $input['category'] = $request->input('category');

        
        // $roleData->permissions()->sync($input);

        // Auth::user()->permissions()->attach($request->cate);
        // DB::Table('permission_role')->insert([
        //     'permission_id' => implode(',', (array) $input['category']),
        //     'role_id' => $id,
        // ]);

        $input = $request->all();
        $input['category'] = $request->input('category');
        DB::table('permission_role')create($input);


        dd($input);
        // Role::create($input);
        // return redirect('/roles');


    }

    public function delete($id)
    {
        DB::table('roles')->where('role_id','=',$id)->delete();
        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
