<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PositionTitle;

use App\Models\Organization;
use App\Models\PositionCategory;

use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Auth;

class PositionTitles extends Controller
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
        return view('normlaravel\admin-position-titles',[
            'getOrganization' => Organization::where('status','=','1')->get(),
            'getPositionCategory' => PositionCategory::get(),
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
        $position_title = $request->position_title;
        $organization_id = $request->organization_id;
        $position_category_id = $request->position_category_id;
        $status ='1';
        PositionTitle::create([
            'position_title' => $request->position_title,
            'organization_id' => $request->organization_id,
            'position_category_id' => $request->position_category_id,
        ]);
        return redirect('/Adminofficers');
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
