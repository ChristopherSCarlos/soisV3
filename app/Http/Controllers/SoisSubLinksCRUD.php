<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Livewire\Objects;
use App\Http\Controllers\PermissionCheckerController;

use Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;
use App\Models\SoisGate;
use App\Models\Permission;
use App\Models\SoisSubGate;

class SoisSubLinksCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $sois_links_data = DB::table('sois_links')->where('status','=',1)->get();
        // dd($sois_links_data);
        // dd(DB::table('sois_links')->where('status','=',1)->get());
        // dd("Hello");
        return view('normLaravel/sois-sub-links-create',[
            'soislinks' => DB::table('sois_links')->where('status','=',1)->get(),
            'roleList' => DB::table('roles')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub_name = $request->sub_name;
        $sub_description = $request->sub_description;
        $sub_link = $request->sub_link;
        $sub_under_for = $request->sub_under_for;
        $role_id = $request->role_id;
        
        // dd($role_id);

        SoisSubGate::create([
            'sub_name' => $sub_name,
            'sub_description' => $sub_description,
            'sub_link' => $sub_link,
            'sub_under_for' => $sub_under_for,
            'status' => 1,
            'role_id' => $role_id,
        ]);

        $sub_name = null;
        $sub_description = null;
        $sub_link = null;
        $sub_under_for = null;
        $role_id = null;

        return redirect()->route('sub-links')->with('success','User has been created');

        // return $this->SoisSubGate();

        // dd("hello");
    }

    public function SoisSubGate()
    {
        return view('livewire/sois-sub-links');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        return view('normLaravel/sois-sub-links-update',[
            'soislinks' => DB::table('sois_links')->where('status','=',1)->get(),
            'roleList' => DB::table('roles')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('normLaravel/sois-sub-links-update',[
            'soislinks' => DB::table('sois_links')->where('status','=',1)->get(),
            'selectedSublinks' => DB::table('sois_sub_gates')->where('sois_sub_gates_id','=',$id)->where('status','=',1)->get(),
            'roleList' => DB::table('roles')->get(),
        ]);
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
        $sub_name = $request->sub_name;
        $sub_description = $request->sub_description;
        $sub_link = $request->sub_link;
        $sub_under_for = $request->sub_under_for;
        $role_id = $request->role_id;

        echo $sub_name;
        echo "<br><br>";
        echo $sub_description;
        echo "<br><br>";
        echo $sub_link;
        echo "<br><br>";
        echo $sub_under_for;
        echo "<br><br>";

        SoisSubGate::where('sois_sub_gates_id','=',$id)->update([
            'sub_name' => $sub_name,
            'sub_description' => $sub_description,
            'sub_link' => $sub_link,
            'sub_under_for' => $sub_under_for,
            'status' => 1,
            'role_id' => $role_id,
        ]);

        $sub_name = null;
        $sub_description = null;
        $sub_link = null;
        $sub_under_for = null;
        $role_id = null;

        // dd('hello');
        return redirect()->route('sub-links')->with('success','User has been created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
