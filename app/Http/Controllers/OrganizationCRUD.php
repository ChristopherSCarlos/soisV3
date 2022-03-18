<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use Auth;
use Storage;

use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;

use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;



class OrganizationCRUD extends Controller
{

    public $article_featured_image;
    public $article_title;
    public $article_subtitle;
    public $article_content;
    public $article_type_id;

    public $organization_logo;
    public $organization_acronym;
    public $organization_logo_name;
    public $organization_logo_checker;
    public $organization_name;
    public $organization_slug;
    public $organization_details;
    public $organization_type_id;
    public $organization_primary_color;
    public $organization_secondary_color;
    public $fileName;

    public $organization_logo_DB;
    public $organization_acronym_DB;
    public $organization_logo_name_DB;
    public $organization_name_DB;
    public $organization_slug_DB;
    public $organization_details_DB;
    public $organization_type_id_DB;
    public $organization_primary_color_DB;
    public $organization_secondary_color_DB;
    public $fileName_DB;

    public $latest_created_data;
    public $latest_organization;

    public $organization_id;
    public $asset_type_id;
    public $file;
    public $is_latest_logo;
    public $is_latest_banner;
    public $is_latest_image;
    public $user_id;
    public $page_type_id;
    public $status;
    public $announcement_id;
    public $articles_id;

    public $organization_data_from_DB;
    public $organization_banner;
    public $organization_banner_name;
    public $organization_banner_DB;
    public $organization_banner_checker;

    public $selectedOrganizationAssetDataIsLatestLogo;
    public $selectedOrganizationAssetDataID;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('normlaravel/organization-view',[
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('normlaravel/organization-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'organization_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $organization_logo_name = $request->organization_logo;

        $organization_logo_name = time().'.'.$request->organization_logo->extension();  



        $organization_name = $request->organization_name;
        $organization_details = $request->organization_details;
        $organization_type_id = $request->organization_type_id;
        $organization_primary_color = $request->organization_primary_color;
        $organization_secondary_color = $request->organization_secondary_color;
        $organization_acronym = $request->organization_acronym;

        $organization_slug = str_replace(" ", "_", $organization_name);


        $status = 1;

        $fileName = time().'.'.$request->organization_logo->extension();
       
        $request->organization_logo->store('files', 'imgfolder',$fileName);

        $request->organization_logo->storeAs('files',$fileName, 'imgfolder');
  
        /* Store $organization_logo_name name in DATABASE from HERE */
        Organization::create([
            'organization_details' => $organization_details,
            'organization_name' => $organization_name,
            'organization_type_id' => $organization_type_id,
            'organization_primary_color' => $organization_primary_color,
            'organization_secondary_color' => $organization_secondary_color,
            'organization_slug' => $organization_slug,
            'organization_acronym' => $organization_acronym,
            'status' => $status,
        ]);    
        $latest_created_data = DB::table('organizations')->orderBy('organization_id','desc')->first();
        $latest_organization = $latest_created_data->organization_id;
        $is_latest_logo = 1;
        $is_latest_banner = 0;
        $asset_status = 1;
        $page_type_id = 4;
        $asset_type_id = 1;
        OrganizationAsset::create([
            'organization_id' => $latest_organization,
            'asset_type_id' => $asset_type_id,
            'file' => $fileName,
            'is_latest_logo' => $is_latest_logo,
            'is_latest_banner' => $is_latest_banner,
            'user_id' => Auth::id(),
            'page_type_id' => $page_type_id,
            'status' => $asset_status,
        ]);

        $authUserId = Auth::id();
        $authUserData = User::find($authUserId);        
        $authUserRole = $authUserData->roles->first();
        $authUserRoleType = $authUserRole->role;         

        return view('normlaravel/organization-create',[
        ]);         
    }

    public function accessOrgControll($id)
    {
        $this->cleanVars();

        $authUserId = Auth::id();
        $authUserData = User::find($authUserId);        
        $authUserRole = $authUserData->roles->first();
        $authUserRoleType = $authUserRole->role;


        $org_latest_banner = DB::table('organization_assets')->where('organization_id','=',$id)->where('is_latest_banner','=',1)->first();
        if ($org_latest_banner) {
            $organization_banner_checker = 1;
        }else{
            $organization_banner_checker = 0;
        }
        
        return view('normlaravel/organization-view',[
            'displayOrganizationData' => DB::table('organizations')->where('organization_id','=',$id)->get(),
            'displayOrganizationLogo' => DB::table('organization_assets')->where('organization_id','=',$id)->where('is_latest_logo','=',1)->get(),
            'displayOrganizationBanner' => DB::table('organization_assets')->where('organization_id','=',$id)->where('is_latest_banner','=',1)->get(),
            'displayOrganizationBannerChecker' => $organization_banner_checker,
            'displayOrganizationType' => DB::table('organization_types')->where('organization_type_id','=',DB::table('organizations')->where('organization_id','=',$id)->pluck('organization_type_id'))->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->cleanVars();
        $org_latest_banner = DB::table('organization_assets')->where('organization_id','=',$id)->where('is_latest_banner','=',1)->first();
        if ($org_latest_banner) {
            $organization_banner_checker = 1;
        }else{
            $organization_banner_checker = 0;
        }
        return view('normlaravel/organization-view',[
            'displayOrganizationData' => DB::table('organizations')->where('organization_id','=',$id)->get(),
            'displayOrganizationLogo' => DB::table('organization_assets')->where('organization_id','=',$id)->where('is_latest_logo','=',1)->get(),
            'displayOrganizationBanner' => DB::table('organization_assets')->where('organization_id','=',$id)->where('is_latest_banner','=',1)->get(),
            'displayOrganizationBannerChecker' => $organization_banner_checker,
            'displayOrganizationType' => DB::table('organization_types')->where('organization_type_id','=',DB::table('organizations')->where('organization_id','=',$id)->pluck('organization_type_id'))->get(),
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

        $organization_data_from_DB = DB::table('organizations')->where('organization_id','=',$id)->first();

        $organization_name = $organization_data_from_DB->organization_name;
        $organization_details = $organization_data_from_DB->organization_details;
        $organization_type_id = $organization_data_from_DB->organization_type_id;
        $organization_primary_color = $organization_data_from_DB->organization_primary_color;
        $organization_secondary_color = $organization_data_from_DB->organization_secondary_color;
        $organization_acronym = $organization_data_from_DB->organization_acronym;

        return view('normlaravel/organization-update',[
            'displayOrganizationData' => DB::table('organizations')->where('organization_id','=',$id)->get(),
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
        $get_org_data_from_DB = DB::table('organizations')->where('organization_id','=',$id)->first();

        $organization_name = $request->organization_name;
        $organization_details = $request->organization_details;
        $organization_type_id = $request->organization_type_id;
        $organization_primary_color = $request->organization_primary_color;
        $organization_secondary_color = $request->organization_secondary_color;
        $organization_acronym = $request->organization_acronym;
        if($organization_name != null){
            $organization_name_DB = $organization_name;
            $organization_slug_DB = str_replace(" ", "_", $organization_name_DB);
        }else{
            $organization_name_DB = $get_org_data_from_DB->organization_name;
            $organization_slug_DB = $get_org_data_from_DB->organization_slug;
        }
        if($organization_details != null){
            $organization_details_DB = $organization_details;
        }else{
            $organization_details_DB= $get_org_data_from_DB->organization_details;
        }
        if($organization_type_id != null){
            $organization_type_id_DB = (int) $organization_type_id;
        }else{
            $organization_type_id_DB= (int) $get_org_data_from_DB->organization_type_id;
        }
        if($organization_primary_color != null){
            $organization_primary_color_DB = $organization_primary_color;
        }else{
            $organization_primary_color_DB= $get_org_data_from_DB->organization_primary_color;
        }
        if($organization_secondary_color != null){
            $organization_secondary_color_DB = $organization_secondary_color;
        }else{
            $organization_secondary_color_DB= $get_org_data_from_DB->organization_secondary_color;
        }
        if($organization_acronym != null){
            $organization_acronym_DB = $organization_acronym;
        }else{
            $organization_acronym_DB= $get_org_data_from_DB->organization_acronym;
        }
        Organization::find($id)->update($this->modelData($organization_name_DB,$organization_details_DB,$organization_type_id_DB,$organization_primary_color_DB,$organization_secondary_color_DB,$organization_acronym_DB,$organization_slug_DB));

        return $this->accessOrgControll($id);
    }

    public function modelData($organization_name_DB,$organization_details_DB,$organization_type_id_DB,$organization_primary_color_DB,$organization_secondary_color_DB,$organization_acronym_DB,$organization_slug_DB)
    {
        return [

            'organization_name' => $organization_name_DB,
            'organization_details' => $organization_details_DB,
            'organization_primary_color' => $organization_primary_color_DB,
            'organization_secondary_color' => $organization_secondary_color_DB,
            'organization_type_id' => $organization_type_id_DB,
            'organization_acronym' => $organization_acronym_DB,
            'organization_slug' => $organization_slug_DB,
        ];
    }


    public function updateBnner(Request $request,$id)
    {
        $organization_banner = $request->organization_banner;
        $organization_banner_name = time().'.'.$request->organization_banner->extension();
        $is_latest_logo = 0;
        $is_latest_banner = 1;
        $asset_status = 1;
        $page_type_id = 4;
        $asset_type_id = 1;

        $request->organization_banner->store('files', 'imgfolder',$organization_banner_name);

        $request->organization_banner->storeAs('files',$organization_banner_name, 'imgfolder');

        OrganizationAsset::create([
            'organization_id' => $id,
            'asset_type_id' => $asset_type_id,
            'file' => $organization_banner_name,
            'is_latest_logo' => $is_latest_logo,
            'is_latest_banner' => $is_latest_banner,
            'user_id' => Auth::id(),
            'page_type_id' => $page_type_id,
            'status' => $asset_status,
        ]);

        $selectedOrganizationAssetDataIsLatestLogo = OrganizationAsset::latest()->where('organization_id','=',$id)->where('status','=','1')->first();
        if ($selectedOrganizationAssetDataIsLatestLogo != null) {
            $selectedOrganizationAssetDataID = $selectedOrganizationAssetDataIsLatestLogo->organization_asset_id;
            OrganizationAsset::where('organization_id','=',$id)->where('is_latest_banner','=','1')->update([
                'is_latest_banner' => '0',
            ]);
            DB::table('organization_assets')->where('organization_asset_id','=',$selectedOrganizationAssetDataID)->update(['is_latest_banner'=>"1"]);
            $this->cleanVars();
            return $this->accessOrgControll($id);
        }else{
            $this->cleanVars();
            return $this->accessOrgControll($id);
        }

    }

    public function updateLogo(Request $request, $id)
    {
        $organization_logo = $request->organization_logo;
        $organization_logo_name = time().'.'.$request->organization_logo->extension();
        $is_latest_logo = 1;
        $is_latest_banner = 0;
        $asset_status = 1;
        $page_type_id = 4;
        $asset_type_id = 1;

        $request->organization_logo->store('files', 'imgfolder',$organization_logo_name);

        $request->organization_logo->storeAs('files',$organization_logo_name, 'imgfolder');

        OrganizationAsset::create([
            'organization_id' => $id,
            'asset_type_id' => $asset_type_id,
            'file' => $organization_logo_name,
            'is_latest_logo' => $is_latest_logo,
            'is_latest_banner' => $is_latest_banner,
            'user_id' => Auth::id(),
            'page_type_id' => $page_type_id,
            'status' => $asset_status,
        ]);

        $selectedOrganizationAssetDataIsLatestLogo = OrganizationAsset::latest()->where('organization_id','=',$id)->where('status','=','1')->first();
        if ($selectedOrganizationAssetDataIsLatestLogo != null) {
            $selectedOrganizationAssetDataID = $selectedOrganizationAssetDataIsLatestLogo->organization_asset_id;
            OrganizationAsset::where('organization_id','=',$id)->where('is_latest_logo','=','1')->update([
                'is_latest_logo' => '0',
            ]);
            DB::table('organization_assets')->where('organization_asset_id','=',$selectedOrganizationAssetDataID)->update(['is_latest_logo'=>"1"]);
            $this->cleanVars();
            return $this->accessOrgControll($id);
        }else{
            $this->cleanVars();
            return $this->accessOrgControll($id);
        }
    }

    public function cleanVars()
    {
        $organization_name_DB = null;
        $organization_details_DB = null;
        $organization_primary_color_DB = null;
        $organization_secondary_color_DB = null;
        $organization_type_id_DB = null;
        $organization_acronym_DB = null;
        $organization_slug_DB = null;
        $organization_logo_name = null;
        $organization_logo = null;

        $latest_organization = null;
        $asset_type_id = null;
        $fileName = null;
        $is_latest_logo = null;
        $is_latest_banner = null;
        $page_type_id = null;
        $asset_status = null;
        $selectedOrganizationAssetDataIsLatestLogo = null;
        $selectedOrganizationAssetDataID = null;
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
