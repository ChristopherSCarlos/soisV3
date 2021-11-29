<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Auth;
use Storage;

use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\SystemAsset;

use Livewire\withPagination;
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
    public $article_id;

    public $article_image_view;
    public $selectedNewsAssetDataIsLatestImage;
    public $selectedNewsAssetDataID;
    public $orgID;

    public $convertedArticleSlug;
    public $articleTags = [];
    public $article_type_id;


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
        // dd($this);
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


        $this->userId = Auth::user()->users_id;
        $this->user = User::find($this->userId);
        $this->va = $this->user->organizations->first();


        // dd($this->va);
        $this->latestOrganizationIDtoInsertToDB = $this->va->organizations_id;
        // dd($this->latestOrganizationIDtoInsertToDB);

        // $this->OrgDataFromUser = $this->user->organization->first();
        // $this->OrgDataFromUserOrganizationNameString = $this->OrgDataFromUser->organization_name;
        $this->convertedArticleSlug = str_replace(' ', '-', $this->article_title);

        Article::create($this->createModel());
        // $this->syncArticleOrganization();

        $this->latestNewsID = Article::latest()->where('status','=','1')->pluck('articles_id')->first();
        // dd($this->latestNewsID);

        SystemAsset::create([
            'asset_type_id' => '4',
            'asset_name' => $this->article_featured_image_name,
            'is_latest_logo' => '0',
            'is_latest_banner' => '0',
            'is_latest_image' => '1',
            'user_id' => $this->userId,
            'page_type_id' => '2',
            'organization_id' => $this->latestOrganizationIDtoInsertToDB,
            'status' => '1',
            'articles_id' => $this->latestNewsID,
        ]);

        $this->modalCreateNewsFormVisible = false;
        $this->article_featured_image = null;
        $this->reset();
        $this->resetValidation();
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
    public function delete()
    {
        // $users = Article::find($this->articleId)->roles;
        $this->artId = Article::find($this->articleId);
        // $this->seed = Article::find($this->articleId)->organizations;
        // $this->artId->organizations()->detach($this->seed);

        Article::where('articles_id',$this->articleId)->update([
            'status' => '0',
            'is_featured_in_newspage' => '0',
            'is_article_featured_landing_page' => '0',
            'is_article_featured_organization_page' => '0',
            'is_article_top_news_organization_page' => '0',
            'is_carousel_homepage' => '0',
            'is_carousel_org_page' => '0',
        ]);
        // Article::destroy($this->articleId);
        $this->modalDeleteNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
        // $this->resetPage();
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
            Article::where('is_article_featured_landing_page',true)->update([
                'is_article_featured_landing_page' => false,
            ]);
            DB::table('articles')->where('articles_id','=',$this->isArticleTopNews->articles_id)->update(['is_article_featured_landing_page'=>"1"]);
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


        $this->userId = Auth::user()->users_id;
        $this->user = User::find($this->userId);
        $this->va = $this->user->organizations->first();
        // dd($this->va);
        $this->latestOrganizationIDtoInsertToDB = $this->va->organizations_id;
        // dd($this->latestOrganizationIDtoInsertToDB);

        // $this->OrgDataFromUser = $this->user->organization->first();
        // $this->OrgDataFromUserOrganizationNameString = $this->OrgDataFromUser->organization_name;
        // $this->syncArticleOrganization();

        // dd($this->latestNewsID);

        SystemAsset::create([
            'asset_type_id' => '4',
            'asset_name' => $this->article_featured_image_name,
            'is_latest_logo' => '0',
            'is_latest_banner' => '0',
            'is_latest_image' => '1',
            'user_id' => $this->userId,
            'page_type_id' => '2',
            'organization_id' => $this->latestOrganizationIDtoInsertToDB,
            'status' => '1',
            'articles_id' => $this->newsId,
        ]);

        $this->selectedNewsAssetDataIsLatestImage = SystemAsset::latest()->where('articles_id','=',$this->newsId)->where('status','=','1')->first();
        // dd($this->selectedNewsAssetDataIsLatestImage);
        // dd($this->selectedNewsAssetDataIsLatestImage);
        if ($this->selectedNewsAssetDataIsLatestImage != null) {
            $this->selectedNewsAssetDataID = $this->selectedNewsAssetDataIsLatestImage->system_assets_id;
            // dd($this->selectedNewsAssetDataID);
            // dd(SystemAsset::find('organization_id','=',$this->newsId)->where('is_latest_logo','=','1'));
            SystemAsset::where('articles_id','=',$this->newsId)->where('is_latest_image','=','1')->update([
                'is_latest_image' => '0',
            ]);
            DB::table('system_assets')->where('system_assets_id','=',$this->selectedNewsAssetDataID)->update(['is_latest_image'=>'1']);
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
        $this->article_image_view = DB::table('system_assets')->where('articles_id','=',$this->newsId)->where('is_latest_image','=','1')->get();
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
           ->where('user_id', '=', $this->userId)
           ->paginate(3);
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
        $this->userRoles = $this->userData->roles->first();
        $this->userRolesString = $this->userRoles->role_name;
        // dd($this->userRolesString);
        // dd(gettype($this->userRolesString));
        return $this->userRolesString;
    }

    /**
     *
     * Get Article table data
     *
     */
    public function getArticleTableData()
    {
        $this->userId = Auth::user()->users_id;
        // dd($this->userId);
        return DB::table('articles')
           ->where('status','=','1')
           ->paginate(5);
    }

    /*=============================================
    =            Deleted News Redirect            =
    =============================================*/
    
    public function deletednews()
    {
        return redirect('/articles/deleted-articles');
    }
    
    /*=====  End of Deleted News Redirect  ======*/
    

    public function getTagsDataFromDatabase()
    {
        return DB::table('tags')->where('status','=','1')->get();
    }

    public function getArticleType()
    {
        // dd(DB::table('article_types')->where('status','=','1')->get());
        return DB::table('article_types')->where('status','=','1')->get();
    }

    /*================================================
    =            Get Organization Section            =
    ================================================*/
    
    public function getOrganizationsFromDatabase()
    {
        return DB::table('organizations')->where('status','=','1')->get();
    }
    
    /*=====  End of Get Organization Section  ======*/

    public function render()
    {
        return view('livewire.articles',[
            'articleDatas' => $this->getArticleTableData(),
            'articleDataController' => $this->getUserRole(),
            'articleOrganization' => $this->getArticleOrganization(),
            'displayArticleImage' => $this->viewImage(),
            'displayTagsData' => $this->getTagsDataFromDatabase(),
            'displayArticleTypeData' => $this->getArticleType(),
            'getOrganization' => $this->getOrganizationsFromDatabase(),
        ]);
    }
}
