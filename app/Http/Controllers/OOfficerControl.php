<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Officer;
use App\Models\Organization;
use App\Models\PositionTitle;

use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Auth;

class OOfficerControl extends Controller
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
        return view('normlaravel\oadmin-sois-officer-create',[
            'getOrganization' => Organization::where('status','=','1')->get(),
            'getPositionTitles' => PositionTitle::get(),
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
        //  $request->validate([
        //     'officer_signature' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // $officer_signature_name = time().'.'.$request->officer_signature->extension();  
        // $request->officer_signature->storeAs('files', $officer_signature_name);
        // $request->officer_signature->move(public_path('files'), $officer_signature_name);
        // $artSlug = str_replace(' ', '-', $article_title);
        
        Officer::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'suffix' => $request->suffix,
            'organization_id' => $request->organization_id,
            'position_title_id' => $request->position_title_id,
            'term_end' => $request->term_end,
            'term_start' => $request->term_start,
            'status' => '1',
            // 'officer_signature' => $request->officer_signature_name,
        ]);
        return redirect('Organization/officers')->with('status', 'Officer has been added.');
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
