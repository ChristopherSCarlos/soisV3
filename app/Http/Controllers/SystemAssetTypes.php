<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetType;

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

class SystemAssetTypes extends Controller
{
    public $type;
    public $asset_type_description;


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
        return view('normlaravel\admin-sois-asset-type-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = $request->type;
        $asset_type_description = $request->asset_type_description;

        AssetType::create([
            'type' => $request->type,
            'asset_type_description' => $request->asset_type_description,
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
        $sasset = AssetType::findOrFail($id);
        $selectedAsset = DB::table('asset_types')->where('asset_type_id','=',$id)->get();
        return view('normlaravel.admin-sois-asset-type-edit',compact('sasset'),compact('selectedAsset'));
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
        $type = $request->type;
        $asset_type_description = $request->asset_type_description;
        
        $data = AssetType::where('asset_type_id','=',$id)->first();
        // dd($data);

        if($type != null){
            $type_for_null = $type;
        }else{
            $type_for_null = $data->type;
        }
        if($asset_type_description != null){
            $asset_type_description_for_null = $asset_type_description;
        }else{
            $asset_type_description_for_null = $data->asset_type_description;
        }
        


        $userID = Auth::id();
        $orgIDHolder = DB::table('role_user')->where('user_id','=',$userID)->first('organization_id');
        $orgID = (int) $orgIDHolder->organization_id;
        $artSlug = str_replace(' ', '-', $type_for_null);


        // echo $convertedArticleSlug;
            // Article::create($createModelWithoutOrg());
        // $syncArticleOrganization();
        AssetType::where('asset_type_id','=',$id)->update([
            'type' => $type_for_null,
            'asset_type_description' =>    $asset_type_description_for_null,
        ]);
         return redirect('admin-default-interfaces')->with('status', 'Link Form Data Has Been edited');
    }

    public function deleteAdmin($id)
    {
        AssetType::find($id)->delete();
        return redirect('/admin-default-interfaces');
    }

    public function delete($id)
    {
        // AssetType::find($id)->destroy()
        AssetType::find($id)->delete();
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
