<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Auth;
use Storage;

use App\Models\User;
use App\Models\Organization;
use App\Models\Permission;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;
use App\Http\Controllers\PermissionCheckerController;

use Livewire\WithPagination;
use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Articles extends Component
{
    use WithPagination;
    use WithFileUploads;  
    /* MODALS */
    public $modalCreateNewsFormVisible = false;
    public $modalUpdateNewsFormVisible = false;
    public $modalDeleteNewsFormVisible = false;
    public $modalFeatureNewsFormVisible = false;
    public $modalDeleteFeatureNewsFormVisible = false;
    public $modalSetTopNewsFormVisible = false;
    public $modalSetOrganizationTopNewsFormVisible = false;
    public $modalUnSetTopNewsFormVisible = false;
    public $modalFeatureNewsInOrganizationPageFormVisible = false;
    public $modalUnFeatureNewsInOrganizationPageFormVisible = false;
    public $modalEditNewsImageFormVisible = false;
    public $modalAddTagsFormVisible = false;
    
    /* VARIABLES */
    public $userId;
    public $user;
    public $OrgDataFromUser;
    public $OrgDataFromUserOrganizationNameString;
    // form variables
    public $article_title;
    public $article_subtitle;
    public $article_content;
    public $article_slug;
    public $type = '1';
    public $status = '1';
    public $image;
    public $data;
    public $articleId;
    public $artId;
    public $seed;
    public $is_article_featured_home_page;

    public $selectedOrganizations = [];
    public $latestArticleCreated;
    public $latestArticleCreatedData;
    
    public $articleData;
    public $OrgDataFromArt;
    public $artOrg;
    public $artsCount;
    public $artOrgData = [];

    // public $articleCreatedDataId;
    public $userData;
    public $userRoles;
    public $userRolesString;
    public $OrgDataFromUserOrganizationOrganization;
    public $v;

    public $userOrg;
    public $userOrgSlug;

    public $newsId;
    public $newsFeatured = 1;
    public $newsFeaturedNull = null;
    public $isArticleInFeaturedId;
    public $isArticleTopNews;
    public $isArticleOrganizationTopNews;

    public $article_featured_image;
    public $article_featured_image_name;
    public $asset_type_id;
    public $is_latest_logo;
    public $is_latest_banner;
    public $page_type_id;
    public $latestOrganizationIDtoInsertToDB;
    public $latestNewsID;
    public $va;
    public $vaHolder;
    public $article_id;

    public $article_image_view;
    public $selectedNewsAssetDataIsLatestImage;
    public $selectedNewsAssetDataID;
    public $orgID;

    public $convertedArticleSlug;
    public $articleTags = [];
    public $article_type_id;
    public $selected_article_id;

    public $RoleUSerChecker_ID;
    private $RoleUSerChecker;
    public $RoleUSerString;
    private $RoleUSerStringHolder;

    public $perms;
    public $permsID;

    private $permission_data;

    private $RoleUserOnNull;
    private $RoleUserDataOnNull;
    private $RoleDataOnNull;

    private $OrganizationDataonNull;

    private $authUserData;

    

    public function mount()
    {
        $this->user = User::find(Auth::id());
        $this->RoleUSerChecker = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->RoleUSerChecker_ID = $this->RoleUSerChecker->role_id;
        $this->RoleUSerStringHolder = DB::table('roles')->where('role_id','=',$this->RoleUSerChecker_ID)->first();
        $this->RoleUSerString =  $this->RoleUSerStringHolder->role;

        // $this->permission_data = new PermissionCheckerController;
        // $this->permission_data->permssionChecker('HP-View_News_Article');
    }

    /*======================================================
    =            Add Tags Section comment block            =
    ======================================================*/
    public function addTags()
    {
        $this->modalAddTagsFormVisible = true;
    }
    public function AddTagsToArticles()
    {
        dd($this->articleTags);
        // $this->modalAddTagsFormVisible = false;
    }
    
    /*=====  End of Add Tags Section comment block  ======*/
    

    /*====================================================
    =            Create Section comment block            =
    ====================================================*/
    public function createNews()
    {

        $this->resetValidation();
        $this->reset();
        $this->modalCreateNewsFormVisible = true;
    }
    public function create()
    {
        $this->validate([
            'article_featured_image' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
            'article_content' => 'required',
        ]);

        $article_content = $this->article_content;
        $dom = new \DomDocument();
        $dom->loadHtml($article_content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');
        foreach($imageFile as $item => $image){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $imgeData = base64_decode($data);
            $image_name= "/upload/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $article_content = $dom->saveHTML();

        $this->article_featured_image_name = time().'.'.$this->article_featured_image->extension();
        // dd($this->article_featured_image_name);


        $this->article_featured_image->store('files', 'imgfolder',$this->article_featured_image_name);

        $this->article_featured_image->storeAs('files',$this->article_featured_image_name, 'imgfolder');


        $this->userId = Auth::user()->user_id;
        $this->user = User::find($this->userId);
        $this->va = $this->user->organizations->first();


        // dd($this->va);
        $this->latestOrganizationIDtoInsertToDB = $this->va->organization_id;
        if($this->latestOrganizationIDtoInsertToDB == null){
            $this->convertedArticleSlug = str_replace(' ', '-', $this->article_title);

            // Article::create($this->createModelWithoutOrg());
        // $this->syncArticleOrganization();

            $this->latestNewsID = Article::latest()->where('status','=','1')->pluck('articles_id')->first();
        // dd($this->latestNewsID);

            OrganizationAsset::create([
                'organization_id' => $this->latestOrganizationIDtoInsertToDB,
                'asset_type_id' => '4',
                'file' => $this->article_featured_image_name,
                'is_latest_logo' => '0',
                'is_latest_banner' => '0',
                'is_latest_image' => '1',
                'user_id' => $this->userId,
                'page_type_id' => '2',
                'status' => '1',
                'articles_id' => $this->latestNewsID,
            ]);
            $this->modalCreateNewsFormVisible = false;
            $this->article_featured_image = null;
            $this->reset();
            $this->resetValidation();
        }else{
            $this->convertedArticleSlug = str_replace(' ', '-', $this->article_title);

            Article::create($this->createModel());
        // $this->syncArticleOrganization();

            $this->latestNewsID = Article::latest()->where('status','=','1')->pluck('articles_id')->first();
        // dd($this->latestNewsID);

            OrganizationAsset::create([
                'organization_id' => $this->latestOrganizationIDtoInsertToDB,
                'asset_type_id' => '4',
                'file' => $this->article_featured_image_name,
                'is_latest_logo' => '0',
                'is_latest_banner' => '0',
                'is_latest_image' => '1',
                'user_id' => $this->userId,
                'page_type_id' => '2',
                'status' => '1',
                'articles_id' => $this->latestNewsID,
            ]);
            $this->modalCreateNewsFormVisible = false;
            $this->article_featured_image = null;
            $this->reset();
            $this->resetValidation();
        }
        // dd($this->latestOrganizationIDtoInsertToDB);

        // $this->OrgDataFromUser = $this->user->organization->first();
        // $this->OrgDataFromUserOrganizationNameString = $this->OrgDataFromUser->organization_name;


        
    }
    public function createModel()
    {
        return [
            'article_title' => $this->article_title,
            'article_subtitle' => $this->article_subtitle,
            'article_content' => $this->article_content,
            'type' => $this->type,
            'status' => $this->status,
            'user_id' => $this->userId,
            'article_slug' => $this->convertedArticleSlug,
            'organization_id' => $this->latestOrganizationIDtoInsertToDB,
        ];
    }
    public function syncArticleOrganization()
    {
        $this->userId = Auth::user()->id;
        $this->user = User::find($this->userId);
        $this->OrgDataFromUser = $this->user->organization->first();
        $this->OrgDataFromUserOrganizationNameString = $this->OrgDataFromUser->id;
        $this->latestArticleCreated = DB::table('articles')->latest('id')->first();
        $this->latestArticleCreatedData = Article::find($this->latestArticleCreated->id);
        array_push($this->selectedOrganizations, $this->userId);
        $this->latestArticleCreatedData->organizations()->attach($this->selectedOrganizations);
    }    
    
    /*=====  End of Create Section comment block  ======*/
    

    /*====================================================
    =            Update Section comment block            =
    ====================================================*/
    public function updateNewsShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->articleId = $id;
        // dd($this->articleId);
        $this->loadModel();
        $this->modalUpdateNewsFormVisible = true;
    }
    public function loadModel()
    {
        $this->data = Article::find($this->articleId);
        $this->article_title = $this->data->article_title;
        $this->article_subtitle = $this->data->article_subtitle;
        $this->article_content = $this->data->article_content;
        $this->type = $this->data->type;
    }
    public function updateModelData()
    {
        return [
            'article_title' => $this->article_title,
            'article_subtitle' => $this->article_subtitle,
            'article_content' => $this->article_content,
            'type' => $this->type,
        ];
    }
    public function update()
    {
        // dd($this);
        $this->validate([
            'article_title' => 'required',
            'article_subtitle' => 'required',
            'article_content' => 'required',
            'type' => 'required',
        ]);
        Article::find($this->articleId)->update($this->updateModelData());
        // $this->syncUpdateArticleOrganization();
        $this->modalUpdateNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    public function syncUpdateArticleOrganization()
    {
        $this->articleData = Article::find($this->articleId);
        $this->OrgDataFromUser = $this->articleData->organizations->first();
        $this->articleData->organizations()->sync($this->selectedOrganizations);
        $this->resetValidation();
        $this->modalSyncRolePermissionVisible = false;
        $this->reset();
    }
    /*=====  End of Update Section comment block  ======*/
    
    /*====================================================
    =            Delete Section comment block            =
    ====================================================*/
    public function deleteNewsShowModal($id)
    {

        $this->articleId = $id;
        $this->modalDeleteNewsFormVisible = true;
    }
    public function checker()
    {
        $this->permission_data = new PermissionCheckerController;
        // $this->permission_data->permssionChecker('HP-Delete_News_Article');
        if ($this->permission_data->permssionChecker('HP-Delete_News_Articles') == true) {
            $this->delete();
        }else{
            abort(403,'Unauthorized Access.');
        }
    }
    public function delete()
    {
        // $users = Article::find($this->articleId)->roles;
        $this->artId = Article::find($this->articleId);
        // $this->seed = Article::find($this->articleId)->organizations;
        // $this->artId->organizations()->detach($this->seed);
        Article::find($this->articleId)->update($this->deleteModal());
        $this->modalDeleteNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
        // $this->resetPage();
    }
    public function deleteModal()
    {
        return [
            'status' => '0',
        ];
    }
    
    /*=====  End of Delete Section comment block  ======*/
    


    /*======================================================
    =            Feature Articles Section comment block            =
    ======================================================*/
    public function featuredNewsShowModal($id)
    {
        $this->newsId = $id;
        $this->modalFeatureNewsFormVisible = true;
    }
    public function featureProcess()
    {
        Article::where('articles_id',$this->newsId)->update(['is_featured_in_newspage' => '1']);
        $this->modalFeatureNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    

    /*=====  End of Feature Articles Section comment block  ======*/
    
    /*================================================================
    =            Unfeature Articles Section comment block            =
    ================================================================*/
    public function deletefeaturedNewsShowModal($id)
    {
        $this->newsId = $id;
        $this->modalDeleteFeatureNewsFormVisible = true;
    }
    public function UnfeatureProcess()
    {
        Article::where('articles_id',$this->newsId)->update(['is_featured_in_newspage' => '0']);
        $this->modalDeleteFeatureNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of Unfeature Articles Section comment block  ======*/
    
    
    /*======================================================================
    =            Set Articles as Top News Section comment block            =
    ======================================================================*/
    public function setTopNewsShowModal($id)
    {
        $this->newsId = $id;
        $this->modalSetTopNewsFormVisible = true;
    }
    public function setTopNews()
    {
        // Article::find($this->newsId)->update($this->modelData());
        $this->isArticleTopNews = Article::find($this->newsId);
        if ($this->isArticleTopNews != null) {
            Article::where('is_article_featured_home_page',true)->update([
                'is_article_featured_home_page' => false,
            ]);
            DB::table('articles')->where('articles_id','=',$this->isArticleTopNews->articles_id)->update(['is_article_featured_home_page'=>"1"]);
            $this->modalSetTopNewsFormVisible = false;
            $this->reset();
            $this->resetValidation();
        }else{
            dd("HEllo");
        }
        
    }
    /*=====  End of Set Articles as Top News Section comment block  ======*/
    
    /*===========================================================================================
    =            Set Articles as Top News in Organization Page Section comment block            =
    ===========================================================================================*/
    public function setOrganizationTopNewsShowModal($id)
    {
        $this->newsId = $id;
        $this->modalSetOrganizationTopNewsFormVisible = true;
    }
    public function setOrganizationTopNews()
    {
        // dd($this->newsId);
        // Article::find($this->newsId)->update($this->modelData());
        $this->isArticleOrganizationTopNews = Article::find($this->newsId);
        if ($this->isArticleOrganizationTopNews != null) {
            Article::where('is_article_top_news_organization_page',true)->update([
                'is_article_top_news_organization_page' => false,
            ]);
            DB::table('articles')->where('articles_id','=',$this->isArticleOrganizationTopNews->articles_id)->update(['is_article_top_news_organization_page'=>"1"]);
            $this->modalSetOrganizationTopNewsFormVisible = false;
            $this->reset();
            $this->resetValidation();
        }else{
            dd("HEllo");
        }
        
    }
    
    
    /*=====  End of Set Articles as Top News in Organization Page Section comment block  ======*/
    


    /*=======================================================================
    =            Featured News to Newspage Section comment block            =
    =======================================================================*/
    public function featuredNewsToOrganizationPageShowModal($id)
    {
        $this->newsId = $id;
        $this->articleData = Article::where('articles_id','=',$this->newsId)->first();
        // dd($this->articleData->article_title);
        $this->modalFeatureNewsInOrganizationPageFormVisible = true;
        // dd($this->articleData);
    }
    public function featureInOrganizationPage()
    {
        DB::table('articles')->where('articles_id','=',$this->newsId)->update(['is_article_featured_organization_page'=>"1"]);
        $this->modalFeatureNewsInOrganizationPageFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of Featured News to Newspage Section comment block  ======*/
    
    /*=================================================================================
    =            UnFeature News to Organization Page Section comment block            =
    =================================================================================*/
    public function unFeaturedNewsToOrganizationPageShowModal($id)
    {
        $this->permission_data = new PermissionCheckerController;
        $this->permission_data->permssionChecker('HP-Create_News_Article');
        $this->newsId = $id;
        $this->articleData = Article::where('articles_id','=',$this->newsId)->first();
        // dd($this->articleData);
        $this->modalUnFeatureNewsInOrganizationPageFormVisible = true;
    }
    public function unFeatureInOrganizationPage()
    {
        DB::table('articles')->where('articles_id','=',$this->newsId)->update(['is_article_featured_organization_page'=>"0"]);
        $this->modalUnFeatureNewsInOrganizationPageFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    /*=====  End of UnFeature News to Organization Page Section comment block  ======*/
    
    /*=================================================================
    =            Edit Featured Image Section comment block            =
    =================================================================*/
    public function editImageNewsModal($id)
    {
        $this->permission_data = new PermissionCheckerController;
        $this->permission_data->permssionChecker('HP-Edit_News_Article');
        $this->resetValidation();
        $this->reset();
        $this->newsId = $id;
        $this->viewImage();
        $this->modalEditNewsImageFormVisible = true;
        
    }
    public function editNewsImage()
    {
        $this->validate([
            'article_featured_image' => 'required',
        ]);
        $this->article_featured_image_name = time().'.'.$this->article_featured_image->extension();

        $this->article_featured_image->store('files', 'imgfolder',$this->article_featured_image_name);

        $this->article_featured_image->storeAs('files',$this->article_featured_image_name, 'imgfolder');


        $this->userId = Auth::user()->user_id;
        $this->user = User::find($this->userId);
        $this->va = DB::table('role_user')->where('user_id','=',$this->userId)->first();
        $this->vaHolder = $this->va->organization_id;
        $this->latestOrganizationIDtoInsertToDB = (int) $this->vaHolder;
        // dd($this->latestOrganizationIDtoInsertToDB);

        // $this->OrgDataFromUser = $this->user->organization->first();
        // $this->OrgDataFromUserOrganizationNameString = $this->OrgDataFromUser->organization_name;
        // $this->syncArticleOrganization();

        // dd($this->latestNewsID);

        OrganizationAsset::create([
            'asset_type_id' => '4',
            'asset_name' => $this->article_featured_image_name,
            'file' => $this->article_featured_image_name,
            'is_latest_logo' => '0',
            'is_latest_banner' => '0',
            'is_latest_image' => '1',
            'user_id' => $this->userId,
            'page_type_id' => '2',
            'organization_id' => $this->latestOrganizationIDtoInsertToDB,
            'status' => '1',
            'articles_id' => $this->newsId,
        ]);

        $this->selectedNewsAssetDataIsLatestImage = OrganizationAsset::latest()->where('articles_id','=',$this->newsId)->where('status','=','1')->first();
        // dd($this->selectedNewsAssetDataIsLatestImage);
        // dd($this->selectedNewsAssetDataIsLatestImage);
        if ($this->selectedNewsAssetDataIsLatestImage != null) {
            $this->selectedNewsAssetDataID = $this->selectedNewsAssetDataIsLatestImage->organization_asset_id;
            // dd($this->selectedNewsAssetDataID);
            // dd(OrganizationAsset::find('organization_id','=',$this->newsId)->where('is_latest_logo','=','1'));
            OrganizationAsset::where('articles_id','=',$this->newsId)->where('is_latest_image','=','1')->update([
                'is_latest_image' => '0',
            ]);
            DB::table('organization_assets')->where('organization_asset_id','=',$this->selectedNewsAssetDataID)->update(['is_latest_image'=>'1']);
            $this->modalEditNewsImageFormVisible = false;
            $this->reset();
            $this->resetValidation();
        }else{
            $this->modalEditNewsImageFormVisible = false;
            $this->reset();
            $this->resetValidation();
        }
        $this->modalEditNewsImageFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    /*=====  End of Edit Featured Image Section comment block  ======*/
    
    public function viewImage()
    {
        $this->article_image_view = DB::table('organization_assets')->where('articles_id','=',$this->newsId)->where('is_latest_image','=','1')->get();
        return $this->article_image_view;
    }

    /**
     *
     * Get User Role for Article
     *
     */
    public function getArticleOrganization()
    {
        $this->userId = Auth::id();

        // dd(DB::table('articles')->where('user_id', '=', $this->userId)->get());
        return DB::table('articles')
            ->where('status','=','1')
            ->where('user_id', '=', $this->userId)
            ->paginate(3);
    }






    public function articleUpdate($id)
    {
        // dd($id);
        $this->selected_article_id = $id;
        // return view('admin.view-selected-announcements', ['announcement_id' -> $id]);
        return redirect()->route('articles/view', ['id' => $this->selected_article_id]);
        // return redirect()->route('articles/view')->with('id',$id);
        // return redirect()->route('/announcements/view-selected-announcements/');
    }








    /**
     *
     * Get User Role
     *
     */
    public function getUserRole()
    {
        $this->userId = Auth::id();
        // dd($this->userId);
        // dd($this->articleCreatedDataId);
        $this->userData = User::find($this->userId);

        $this->RoleUserOnNull = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        // dd($this->RoleUserOnNull->role_id);
        // dd($this->userData->roles->first());
        if($this->userData->roles->first() != null){
            $this->authUserRole = $this->userData->roles->first();
            $this->authUserRoleType = $this->authUserRole->role;         
        }else{
            $this->RoleUserDataOnNull = DB::table('role_user')->where('user_id','=',Auth::id())->first();
            // dd($this->RoleUserDataOnNull->role_id);
            $this->RoleDataOnNull = DB::table('roles')->where('role_id','=',$this->RoleUserDataOnNull->role_id)->first();        
            // dd($this->RoleDataOnNull->role);        
            $this->authUserRoleType = $this->RoleDataOnNull->role;         
        }
        // dd($this->authUserRoleType);
        // dd($this->authUserId);
        return $this->authUserRoleType;

        // $this->userRoles = $this->userData->roles->first();
        // $this->userRolesString = $this->userRoles->role;
        // dd($this->userRolesString);
        // dd(gettype($this->userRolesString));
        // return $this->userRolesString;
    }

    /**
     *
     * Get Article table data
     *
     */
    public function getArticleTableData()
    {
        $this->userId = Auth::user()->user_id;
        // dd($this->userId);
        return DB::table('articles')->where('status','=','1')->paginate(5);
    }

    public function getTagsDataFromDatabase()
    {
        // return DB::table('tags')->where('status','=','1')->get();
    }

    public function getArticleType()
    {
        // dd(DB::table('article_types')->where('status','=','1')->get());
        return DB::table('article_types')->where('status','=','1')->get();
    }

    public function render()
    {
        return view('livewire.articles',[
            'articleDatas' => $this->getArticleTableData(),
            'articleDataController' => $this->getUserRole(),
            'articleOrganization' => $this->getArticleOrganization(),
            'displayArticleImage' => $this->viewImage(),
            'displayTagsData' => $this->getTagsDataFromDatabase(),
            'displayArticleTypeData' => $this->getArticleType(),
        ]);
    }
}
