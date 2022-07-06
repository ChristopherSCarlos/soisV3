<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageType;

use Auth;
use Storage;

use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\Announcement;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;

use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;

class SAWebPageType extends Controller
{

    public $page_type;
    public $page_description;
    public $status;

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
        return view('normlaravel\sadmin-sois-web-page-type-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page_type = $request->page_type;
        $page_description = $request->page_description;
        $status ='1';
        PageType::create([
            'page_type' => $request->page_type,
            'page_description' => $request->page_description,
            'status' => '1',
        ]);
        return redirect('/default-interfaces');
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
        $spagetype = PageType::findOrFail($id);
        $selectedPageType = DB::table('page_types')->where('page_types_id','=',$id)->get();
        return view('normlaravel.sadmin-web-page-type-edit',compact('spagetype'),compact('selectedPageType'));
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
        $page_type = $request->page_type;
        $page_description = $request->page_description;
        
        $data = PageType::where('page_types_id','=',$id)->first();
        // dd($data);

        if($page_type != null){
            $page_type_for_null = $page_type;
        }else{
            $page_type_for_null = $data->page_type;
        }
        if($page_description != null){
            $page_description_for_null = $page_description;
        }else{
            $page_description_for_null = $data->page_description;
        }
        


        $userID = Auth::id();
        $orgIDHolder = DB::table('role_user')->where('user_id','=',$userID)->first('organization_id');
        $orgID = (int) $orgIDHolder->organization_id;
        $artSlug = str_replace(' ', '-', $page_type_for_null);


        // echo $convertedArticleSlug;
            // Article::create($createModelWithoutOrg());
        // $syncArticleOrganization();
        PageType::where('page_types_id','=',$id)->update([
            'page_type' => $page_type_for_null,
            'page_description' =>    $page_description_for_null,
        ]);
         return redirect('default-interfaces')->with('status', 'Link Form Data Has Been edited');
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
