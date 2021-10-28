<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Auth;
use Storage;

use App\Models\User;
// use App\Models\Organization;
use App\Models\Article;

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
    /* MODALS */
    public $modalCreateNewsFormVisible = false;
    public $modalUpdateNewsFormVisible = false;
    public $modalDeleteNewsFormVisible = false;
    public $modalFeatureNewsFormVisible = false;
    public $modalDeleteFeatureNewsFormVisible = false;
    public $modalSetTopNewsFormVisible = false;
    public $modalUnSetTopNewsFormVisible = false;
    public $modalFeatureNewsInOrganizationPageFormVisible = false;
    public $modalUnFeatureNewsInOrganizationPageFormVisible = false;
    
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
        $this->userId = Auth::user()->users_id;
        $this->user = User::find($this->userId);
        // $this->OrgDataFromUser = $this->user->organization->first();
        // $this->OrgDataFromUserOrganizationNameString = $this->OrgDataFromUser->organization_name;
        Article::create($this->createModel());
        // $this->syncArticleOrganization();
        $this->modalCreateNewsFormVisible = false;
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
            'article_slug' => $this->article_slug,
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
        $this->articleId = $id;
        // dd($this->articleId);
        $this->modalUpdateNewsFormVisible = true;
        $this->loadModel();
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
        Article::destroy($this->articleId);
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
    
    /*========================================================================
    =            Unset Articles as Top News Section comment block            =
    ========================================================================*/
    public function unSetTopNewsShowModal($id)
    {
        $this->newsId = $id;
        $this->modalUnSetTopNewsFormVisible = true;
    }
    public function unSetTopNews()
    {
        // Article::find($this->newsId)->update($this->modelData());
        $this->isArticleTopNews = Article::find($this->newsId);
        // dd($this->isArticleTopNews);

        if ($this->isArticleTopNews != '1') {
            Article::where('is_article_featured_landing_page',true)->update([
                'is_article_featured_landing_page' => false,
            ]);
            DB::table('articles')->where('articles_id','=',$this->isArticleTopNews->articles_id)->update(['is_article_featured_landing_page'=>"0"]);
            $this->modalUnSetTopNewsFormVisible = false;
            $this->reset();
            $this->resetValidation();
        }else{
            dd("HEllo");
        }
        
    }
    
    
    /*=====  End of Unset Articles as Top News Section comment block  ======*/
    
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
           ->where('user_id', '=', $this->userId)
           ->paginate(5);
    }

    public function render()
    {
        return view('livewire.articles',[
            'articleDatas' => $this->getArticleTableData(),
            'articleDataController' => $this->getUserRole(),
            'articleOrganization' => $this->getArticleOrganization(),
        ]);
    }
}
