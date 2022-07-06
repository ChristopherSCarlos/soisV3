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

class SAPositionTitles extends Controller
{

    public $positionOrganization;
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
        return view('normlaravel\sadmin-position-titles',[
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
        return redirect('/officers');
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
        return view('normlaravel.sadmin-position-titles-edit',[
            'spostit' => PositionTitle::findOrFail($id),
            'selectedpostit' => DB::table('position_titles')->where('position_title_id','=',$id)->get(),
            'positionOrganization' => $positionOrganization =  DB::table('organizations')->where('status','=','1')->get(),
            'getPositionCategory' => $getPositionCategory = PositionCategory::get(),
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
        $position_title = $request->position_title;
        $organization_id = $request->organization_id;
        $position_category_id = $request->position_category_id;
        
        $data = Positiontitle::where('position_title_id','=',$id)->first();
        // dd($data);

        if($position_title != null){
            $position_title_for_null = $position_title;
        }else{
            $position_title_for_null = $data->position_title;
        }
        if($organization_id != null){
            $organization_id_for_null = $organization_id;
        }else{
            $organization_id_for_null = $data->organization_id;
        }
        if($position_category_id != null){
            $position_category_id_for_null = $position_category_id;
        }else{
            $position_category_id_for_null = $data->position_category_id;
        }
        


        $userID = Auth::id();
        $orgIDHolder = DB::table('role_user')->where('user_id','=',$userID)->first('organization_id');
        $orgID = (int) $orgIDHolder->organization_id;
        $artSlug = str_replace(' ', '-', $position_title_for_null);


        // echo $convertedArticleSlug;
            // Article::create($createModelWithoutOrg());
        // $syncArticleOrganization();
        PositionTitle::where('position_title_id','=',$id)->update([
            'position_title' => $position_title_for_null,
            'organization_id' =>    $organization_id_for_null,
            'position_category_id' =>    $position_category_id_for_null,
        ]);
         return redirect('officers')->with('status', 'Link Form Data Has Been edited');
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
