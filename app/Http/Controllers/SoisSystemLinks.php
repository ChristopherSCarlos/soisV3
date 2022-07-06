<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoisLink;

use Auth;
use Storage;

use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\Announcement;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;

use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;

class SoisSystemLinks extends Controller
{
    public $link_name;
    public $link_description;
    public $external_link;
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
        return view('normlaravel\admin-sois-links-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $link_name = $request->link_name;
        $link_description = $request->link_description;
        $external_link = $request->external_link;
        $status ='1';
        SoisLink::create([
            'link_name' => $request->link_name,
            'link_description' => $request->link_description,
            'external_link' => $request->external_link,
            'status' => '1',
        ]);
        return redirect('/admin-default-interfaces');
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
        $slink = SoisLink::findOrFail($id);
        $selectedLink = DB::table('sois_links')->where('sois_links_id','=',$id)->get();
        return view('normlaravel.admin-system-links-edit',compact('slink'),compact('selectedLink'));
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
        $link_name = $request->link_name;
        $link_description = $request->link_description;
        $external_link = $request->external_link;
        
        $data = SoisLink::where('sois_links_id','=',$id)->first();
        // dd($data);

        if($link_name != null){
            $link_name_for_null = $link_name;
        }else{
            $link_name_for_null = $data->link_name;
        }
        if($link_description != null){
            $link_description_for_null = $link_description;
        }else{
            $link_description_for_null = $data->link_description;
        }
        if($external_link != null){
            $external_link_for_null = $external_link;
        }else{
            $external_link_for_null = $data->external_link;
        }


        $userID = Auth::id();
        $orgIDHolder = DB::table('role_user')->where('user_id','=',$userID)->first('organization_id');
        $orgID = (int) $orgIDHolder->organization_id;
        $artSlug = str_replace(' ', '-', $link_name_for_null);


        // echo $convertedArticleSlug;
            // Article::create($createModelWithoutOrg());
        // $syncArticleOrganization();
        SoisLink::where('sois_links_id','=',$id)->update([
            'link_name' =>      $link_name_for_null,
            'link_description' =>    $link_description_for_null,
            'link_description' =>    $link_description_for_null,
            'external_link' =>    $external_link_for_null,
        ]);
         return redirect('admin-default-interfaces')->with('status', 'Link Form Data Has Been edited');
    }

    public function deleteAdmin($id)
    {
        SoisLink::find($id)->update(['status'=>'0']);
        return redirect('/admin-default-interfaces');
    }

    public function delete($id)
    {
        SoisLink::find($id)->update(['status'=>'0']);
        return redirect('/default-interfaces');
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
