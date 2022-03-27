<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Storage;

use App\Models\Organization;
use App\Models\User;
use App\Models\SystemAsset;
use App\Models\OrganizationAsset;
use App\Models\PageType;
use App\Http\Livewire\Objects;

use Livewire\WithPagination;

use Illuminate\Support\STR;

use Illuminate\Validation\Rule;

use Livewire\WithFileUploads;

use Intervention\Image\ImageManager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

class Organizations extends Component
{
    /* Traits */
    use WithPagination;
    use WithFileUploads;    
    /* Modals */
    public $modalFormVisible = false;
    public $updatemodalFormVisible = false;
    public $updateImagemodalFormVisible = false;
    public $updateBannermodalFormVisible = false;
    public $modelConfirmDeleteVisible = false;
    public $viewmodalFormVisible = false;
    
    /* Variables */
    
    public $modelId;
    
    public $organization_name;
    public $organization_logo;
    public $organization_details;
    public $organization_primary_color;
    public $organization_secondary_color;
    public $organization_carousel_image_1;
    public $organization_carousel_image_2;
    public $organization_carousel_image_3;
    public $organization_slug;
    public $organization_type_id;
    public $organization_banner;
    public $organization_acronym;
    
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;

    public $content;

    public $featuredImage;
    public $title;

    public $authUser;
    public $OrgDataFromUser;
    public $user;
    public $userOrganization;
    public $orgCount = false;
    public $organizationUserData;
    public $orgUserId;

    public $authUserId;
    public $authUserData;
    public $authUserRole;
    public $authUserRoleType;
    public $status = '1';

    public $orgtype = '0';

    public $fileName;
    public $fileNameBanner;

    public $objectData;
    public $userID;
    public $pageType;
    public $pageTypeID;
    public $pageTypeData;
    public $latestOrganizationID;
    public $latestOrganizationIDtoInsertToDB;

    public $asset_type_id;
    public $asset_name;
    public $is_latest_logo;
    public $is_latest_banner;
    public $user_id;
    public $page_type_id;
    public $organization_id;
    public $asset_status;


    public $loadDataVarsFromDB;

    private $systemAssetDataFromDB;
    public $userDataPivot;
    public $userDataPivotOrganization;
    
    public $selectedOrganizationAssetData;
    public $selectedOrganizationAssetDataFromDB;
    public $selectedOrganizationAssetDataCount;
    public $selectedOrganizationAssetDataIsLatestLogo;
    public $selectedOrganizationAssetDataID;
    public $latestSystemAssetForImageUpload;
    public $getSystemAssetData;



    public function mount()
    {
        $this->organization_slug = $this->organization_name;

    }


    /**
     *
     * Organization Rules
     *
     */
    public function rules()
    {
        return [
            'organization_name' => 'required',
            'organization_details' => 'required',
            'organization_primary_color' => 'required',
            'organization_secondary_color' => 'required',
            'organization_slug' => 'required',
            'organization_type_id' => 'required',
            'status' => 'required',
        ];
    }

    /*=================================================
    =            View Organization Section            =
    =================================================*/
    public function viewShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->viewmodalFormVisible = true;
        $this->modelId = $id;
        $this->loadImageModel();
        $this->getSelectedOrganizationLogo();
    }
    public function getSelectedOrganizationLogo()
    {
        // $this->systemAssetDataFromDB = SystemAsset::where('organization_id','=',$this->modelId)->get();
        $this->systemAssetDataFromDB = DB::table('organization_assets')->where('organization_id','=',$this->modelId)->where('is_latest_logo','=','1')->first();
        $this->organization_logo = $this->systemAssetDataFromDB->file; 
        // return $this->organization_logo;
        // dd($this->systemAssetDataFromDB->file);
    }
    /*=====  End of View Organization Section  ======*/
    

    /*============================================
    =            Image Upload Section            =
    ============================================*/
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'organization_name' => 'required',
            'organization_details' => 'required',
            'organization_primary_color' => 'required',
            'organization_secondary_color' => 'required',
            'organization_slug' => 'required',
            'organization_type_id' => 'required',
            'organization_logo' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
        ]);
    
        $data = [
            'organization_name' => 'required',
            'organization_details' => 'required',
            'organization_primary_color' => 'required',
            'organization_secondary_color' => 'required',
            'organization_slug' => 'required',
            'organization_type_id' => 'required',
            'organization_logo' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip', 
        ];

        $fileName = time().'.'.$request->organization_logo->extension();  
     
        $organization_name = $request->organization_name;
        $organization_details = $request->organization_details;
        $organization_primary_color = $request->organization_primary_color;
        $organization_secondary_color = $request->organization_secondary_color;
        $organization_slug = $request->organization_slug;
        $organization_logo = $request->organization_logo;
        $organization_type_id = $request->organization_type_id;



        $request->organization_logo->move(public_path('files'), $fileName);

  
        /* Store $fileName name in DATABASE from HERE */
        // Organization::create($request->all());
        Organization::create([
            'organization_logo' => $fileName,
            'organization_details' => $organization_details,
            'organization_name' => $organization_name,
            'organization_primary_color' => $organization_primary_color,
            'organization_secondary_color' => $organization_secondary_color,
            'organization_slug' => $organization_slug,
            'organization_type_id' => $organization_type_id,
        ]);

        $this->cleanVars();
        return redirect()->route('organization-menus')->with('success','User has been created');
    }
    
    /*=====  End of Image Upload Section  ======*/
    

    /*=================================================================
    =            Create Organization Section comment block            =
    =================================================================*/
    public function createOrganization()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function create()
    {

        $this->validate([
            'organization_name' => 'required',
            'organization_details' => 'required',
            'organization_primary_color' => 'required',
            'organization_secondary_color' => 'required',
            'organization_slug' => 'required',
            'organization_type_id' => 'required',
            'organization_logo' => 'file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
        ]);
    
        if(preg_match_all('/\b(\w)/',strtoupper($this->organization_name),$m)) {
            $this->organization_acronym = implode('',$m[1]); // $v is now SOQTU
        }

        $this->fileName = time().'.'.$this->organization_logo->extension();  
        // dd($this->organization_name);
        $this->organization_name = $this->organization_name;
        $this->organization_details = $this->organization_details;
        $this->organization_primary_color = $this->organization_primary_color;
        $this->organization_secondary_color = $this->organization_secondary_color;
        $this->organization_slug = $this->organization_slug;
        $this->organization_type_id = $this->organization_type_id;
        $this->organization_logo = $this->organization_logo;

       
        $this->organization_logo->store('files', 'imgfolder',$this->fileName);

        $this->organization_logo->storeAs('files',$this->fileName, 'imgfolder');
        

        $this->status = true;
  
        /* Store $fileName name in DATABASE from HERE */
        Organization::create([
            'organization_details' => $this->organization_details,
            'organization_name' => $this->organization_name,
            'organization_type_id' => $this->organization_type_id,
            'organization_primary_color' => $this->organization_primary_color,
            'organization_secondary_color' => $this->organization_secondary_color,
            'organization_slug' => $this->organization_slug,
            'organization_acronym' => $this->organization_acronym,
            'status' => $this->status,
        ]);        
        $this->asset_name = $this->fileName;
        $this->is_latest_logo = 1;


        $this->user_id = Auth::id();
        $this->is_latest_banner = 0;
        $this->asset_status = 1;


        $this->page_type_id = 4;
        $this->asset_type_id = 1;
        $this->latestOrganizationID = DB::table('organizations')->latest('organization_id')->first();
        // dd($this->latestOrganizationID->organization_id);
        $this->latestOrganizationIDtoInsertToDB = $this->latestOrganizationID->organization_id;
        // $this->latestOrganizationID = (int)$this->organization_id; 
        // dd(gettype($this->latestOrganizationID));
        
        OrganizationAsset::create([
            'asset_type_id' => $this->asset_type_id,
            'asset_name' => $this->fileName,
            'file' => $this->fileName,
            'is_latest_logo' => $this->is_latest_logo,
            'is_latest_banner' => $this->is_latest_banner,
            'user_id' => $this->user_id,
            'page_type_id' => $this->page_type_id,
            'organization_id' => $this->latestOrganizationIDtoInsertToDB,
            'status' => $this->asset_status,
        ]);
    



        $this->modalFormVisible = false;
        $this->reset();
        $this->resetValidation();
        $this->cleanVars();

    }

    private function cleanVars()
    {
        $this->organization_name = null;    
        $this->organization_details = null; 
        $this->organization_primary_color = null;   
        $this->organization_secondary_color = null; 
        $this->organization_slug = null;    
        $this->organization_logo = null;    
    }

    public function modelData()
    {
        return [
            'organization_name' => $this->organization_name,
            'organization_details' => $this->organization_details,
            'organization_primary_color' => $this->organization_primary_color,
            'organization_secondary_color' => $this->organization_secondary_color,
            'organization_slug' => $this->organization_slug,
            'organization_type_id' => $this->organization_type_id,
            'status' => $this->status,
        ];
    }
    
    
    /*=====  End of Create Organization Section comment block  ======*/
    

    /*=================================================================
    =            Update Organization Section comment block            =
    =================================================================*/
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->updatemodalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    public function loadModel()
    {
        $orgtype = 0;
        $data = Organization::find($this->modelId);
        $this->organization_name = $data->organization_name;
        $this->organization_details = $data->organization_details;
        $this->organization_primary_color = $data->organization_primary_color;
        $this->organization_secondary_color = $data->organization_secondary_color;
        $this->organization_slug = $data->organization_slug;
        $this->organization_type_id = $data->organization_type_id;
        if($this->organization_type_id == '1'){
            $this->orgtype = 1;
        }else{
            $this->orgtype = 2;
        }
    }

    public function update()
    {
        // dd($this);
        $this->validate([
            'organization_name' => 'required',
            'organization_details' => 'required',
            'organization_primary_color' => 'required',
            'organization_secondary_color' => 'required',
            'organization_slug' => 'required',
            'organization_type_id' => 'required',
        ]);
        Organization::find($this->modelId)->update($this->modelData());
        $this->updatemodalFormVisible = false;
        // dd($this->modelId);
    }
    
    
    /*=====  End of Update Organization Section comment block  ======*/

    /*============================================
    =            Update Image Section            =
    ============================================*/
    
    public function ImagemodelData()
    {
        $fileName = time().'.'.$this->organization_logo->extension();
        return [
            'organization_name' => $this->organization_name,
            'organization_logo' => $this->organization_logo->storeAs('files',$fileName, 'imgfolder'),
            'organization_logo' => $fileName,
            // 'organization_logo' => $this->organization_logo,
            'organization_details' => $this->organization_details,
            'organization_primary_color' => $this->organization_primary_color,
            'organization_secondary_color' => $this->organization_secondary_color,
            'organization_slug' => $this->organization_slug,
            'organization_type_id' => $this->organization_type_id,
        ];
    }

    public function updateImageShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        // $this->loadImageModel();
        // dd($this->modelId);
        $this->updateImagemodalFormVisible = true;
    }

    public function loadImageModel()
    {
        $data = Organization::find($this->modelId);
        $this->organization_name = $data->organization_name;
        $this->organization_details = $data->organization_details;
        $this->organization_primary_color = $data->organization_primary_color;
        $this->organization_secondary_color = $data->organization_secondary_color;
        $this->organization_slug = $data->organization_slug;
        $this->organization_type_id = $data->organization_type_id;
        $this->organization_logo = $data->organization_logo;
    }

    public function updateAssetLogo()
    {
        $this->validate([
            'organization_logo' => 'required',
        ]);
        // dd($this->organization_logo);

        $this->fileName = time().'.'.$this->organization_logo->extension();  
       
        $this->organization_logo->store('files', 'imgfolder',$this->fileName);

        $this->organization_logo->storeAs('files',$this->fileName, 'imgfolder');
        
        $this->asset_name = $this->fileName;

        $this->user_id = Auth::id();
        // $this->latestOrganizationID = DB::table('organizations')->latest('organization_id')->first();
        // $this->latestOrganizationIDtoInsertToDB = $this->latestOrganizationID->organization_id;
        
        /* Get User ID */
        $this->userDataPivot = User::find(Auth::id());
        /* Get Organization ID from pivot table using USER ID */
        $this->userDataPivotOrganization = $this->userDataPivot->organizations->first();
        // $this->latestOrganizationIDtoInsertToDB = $this->userDataPivotOrganization->organization_id;
        /* Asset Status is set to true */
        $this->asset_status = 1;
        /* Asset Type is set to Logo (Logo is 1 in Asset types table) */
        $this->asset_type_id = 1;
        /* Set image as latest organization asset logo */
        $this->is_latest_logo = 1;
        /* Unset image as image banenr */
        $this->is_latest_banner = 0;
        /* Page Type is set to Organization (Organization is id 4 in pagetypes table) */
        $this->page_type_id = 4;

        OrganizationAsset::create([
            'asset_type_id' => $this->asset_type_id,
            'asset_name' => $this->fileName,
            'file' => $this->fileName,
            'is_latest_logo' => $this->is_latest_logo,
            'is_latest_banner' => $this->is_latest_banner,
            'user_id' => $this->user_id,
            'page_type_id' => $this->page_type_id,
            'organization_id' => $this->modelId,
            'status' => $this->asset_status,
        ]);
        
        $this->selectedOrganizationAssetDataIsLatestLogo = OrganizationAsset::latest()->where('organization_id','=',$this->modelId)->where('status','=','1')->first();
        // dd($this->selectedOrganizationAssetDataIsLatestLogo);
        if ($this->selectedOrganizationAssetDataIsLatestLogo != null) {
            $this->selectedOrganizationAssetDataID = $this->selectedOrganizationAssetDataIsLatestLogo->organization_asset_id;
            // dd($this->selectedOrganizationAssetDataID);
            // dd(OrganizationAsset::find('organization_id','=',$this->modelId)->where('is_latest_logo','=','1'));
            OrganizationAsset::where('organization_id','=',$this->modelId)->where('is_latest_logo','=','1')->update([
                'is_latest_logo' => '0',
            ]);
            DB::table('organization_assets')->where('organization_asset_id','=',$this->selectedOrganizationAssetDataID)->update(['is_latest_logo'=>"1"]);
            $this->updateImagemodalFormVisible = false;
            $this->resetValidation();
            $this->reset();
        }else{
            $this->updateImagemodalFormVisible = false;
            $this->resetValidation();
            $this->reset();
        }
        $this->updateImagemodalFormVisible = false;
        $this->resetValidation();
        $this->reset();
    
        
        // dd(DB::table('organizations_users')->where('user_id','=',Auth::id())->pluck('organization_id'));
       


    }

    public function Imageupdate()
    {
        // dd($this->ImagemodelData());
        $this->validate(['organization_logo' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',]);
        Organization::find($this->modelId)->update($this->ImagemodelData());
        $this->updateImagemodalFormVisible = false;
    }
    
    /*=====  End of Update Image Section  ======*/
    
    
    /*=================================================================
    =            Delete Organization Section comment block            =
    =================================================================*/
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modelConfirmDeleteVisible = true;
    }

    public function delete()
    {
        Organization::find($this->modelId)->update(['status'=>'0']);
        $this->modelConfirmDeleteVisible = false;
        $this->resetPage();
    }
    
    
    /*=====  End of Delete Organization Section comment block  ======*/
    


    /*========================================================================
    =            Update Organization Banner Section comment block            =
    ========================================================================*/
    public function updateBannerShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->clearInput();
        $this->modelId = $id;
        $this->updateBannermodalFormVisible = true;
        // dd($this->modelId);
    }
    
    public function updateAssetBanner()
    {
        // dd($this->organization_banner);
        $this->validate([
            'organization_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100048',
        ]);
        // dd($this->organization_banner);

        $this->fileNameBanner = time().'.'.$this->organization_banner->extension();  
       
        $this->organization_banner->store('files', 'imgfolder',$this->fileNameBanner);

        $this->organization_banner->storeAs('files',$this->fileNameBanner, 'imgfolder');
        
        $this->asset_name = $this->fileNameBanner;

        $this->user_id = Auth::id();
        // $this->latestOrganizationID = DB::table('organizations')->latest('organization_id')->first();
        // $this->latestOrganizationIDtoInsertToDB = $this->latestOrganizationID->organization_id;
        
        /* Get User ID */
        $this->userDataPivot = User::find(Auth::id());
        /* Get Organization ID from pivot table using USER ID */
        $this->userDataPivotOrganization = $this->userDataPivot->organizations->first();
        // $this->latestOrganizationIDtoInsertToDB = $this->userDataPivotOrganization->organization_id;
        /* Asset Status is set to true */
        $this->asset_status = 1;
        /* Asset Type is set to Logo (Logo is 1 in Asset types table) */
        $this->asset_type_id = 2;
        /* Set image as latest organization asset logo */
        $this->is_latest_logo = 0;
        /* Unset image as image banenr */
        $this->is_latest_banner = 1;
        /* Page Type is set to Organization (Organization is id 4 in pagetypes table) */
        $this->page_type_id = 4;

        OrganizationAsset::create([
            'asset_type_id' => $this->asset_type_id,
            'asset_name' => $this->fileNameBanner,
            'file' => $this->fileNameBanner,
            'is_latest_logo' => $this->is_latest_logo,
            'is_latest_banner' => $this->is_latest_banner,
            'user_id' => $this->user_id,
            'page_type_id' => $this->page_type_id,
            'organization_id' => $this->modelId,
            'status' => $this->asset_status,
        ]);
        
        $this->selectedOrganizationAssetDataIsLatestLogo = OrganizationAsset::latest()->where('organization_id','=',$this->modelId)->where('status','=','1')->first();
        // dd($this->selectedOrganizationAssetDataIsLatestLogo);
        if ($this->selectedOrganizationAssetDataIsLatestLogo != null) {
            $this->selectedOrganizationAssetDataID = $this->selectedOrganizationAssetDataIsLatestLogo->organization_asset_id;
            // dd($this->selectedOrganizationAssetDataID);
            // dd(OrganizationAsset::find('organization_id','=',$this->modelId)->where('is_latest_logo','=','1'));
            OrganizationAsset::where('organization_id','=',$this->modelId)->where('is_latest_banner','=','1')->update([
                'is_latest_banner' => '0',
            ]);
            DB::table('organization_assets')->where('organization_asset_id','=',$this->selectedOrganizationAssetDataID)->update(['is_latest_banner'=>"1"]);
            $this->updateBannermodalFormVisible = false;
            $this->clearInput();
            $this->reset();
            $this->resetValidation();
        }else{
            $this->updateBannermodalFormVisible = false;
            $this->clearInput();
            $this->reset();
            $this->resetValidation();
        }
        $this->updateBannermodalFormVisible = false;
        $this->clearInput();
        $this->reset();
        $this->resetValidation();
    }
    public function clearInput()
    {
        $this->organization_banner = null;
        $this->organization_name = null;
        $this->organization_logo = null;
        $this->organization_details = null;
        $this->organization_primary_color = null;
        $this->organization_secondary_color = null;
        $this->organization_carousel_image_1 = null;
        $this->organization_carousel_image_2 = null;
        $this->organization_carousel_image_3 = null;
        $this->organization_slug = null;
        $this->organization_type_id = null;
    }
    /*=====  End of Update Organization Banner Section comment block  ======*/
    





    public function specificOrganization()
    {
        $this->authUser = Auth::id();
        $this->user = User::find($this->authUser);
        $this->OrgDataFromUser = $this->user->organizations->first();
        // dd($this->OrgDataFromUser->id);
        if($this->OrgDataFromUser){
            $this->orgUserId = $this->OrgDataFromUser->organization_id;
            $this->userOrganization = $this->OrgDataFromUser->organization_name;
            // dd($this->orgUserId);
            $this->orgCount = true;
            // dd($this->orgCount);
            // dd(DB::table('organizations')->where('organization_id', '=', $this->orgUserId)->get());
            return DB::table('organizations')
           ->where('organization_id', '=', $this->orgUserId)
           ->get();



        }else{
            $this->orgCount = false;
            return DB::table('organizations')
           ->where('status', '=', '1')
           ->get();            
            // dd("2");
        }
        // dd($this->orgUserId);
        // $this->organizationUserData = Organization::find($this->orgUserId);        
        // return $this->organizationUserData;
        // dd(gettype(Organization::where($this->orgUserId)));
        // return Organization::where($this->orgUserId);
                
        // dd($this->organizationUserData);
        // dd(gettype($this->OrgDataFromUser));        

        // $this->user = User::find($this->userId);
        // dd($this->OrgDataFromUser->organization_name);
    }

    /**
     *
     * Get User Role
     *
     */
    public function getAuthUserRole()
    {
        $this->authUserId = Auth::id();
        $this->authUserData = User::find($this->authUserId);        
        $this->authUserRole = $this->authUserData->roles->first();
        $this->authUserRoleType = $this->authUserRole->role;         
        // dd($this->authUserRoleType);
        // dd($this->authUserRoleType);
        return $this->authUserRoleType;
    }

    /**
     *
     * Get Organization Data from database
     *
     */
    public function getOrganizationData()
    {
        return Organization::where('status','=','1')->paginate(10);
    }
    

    public function render()
    {
        return view('livewire.organizations',[
            'organizationData' => $this->getOrganizationData(),
            'userAuthRole' => $this->getAuthUserRole(),
            'posts' => $this->getOrganizationData(),
            'userAffliatedOrganization' => $this->specificOrganization(),
        ]);
    }
}
