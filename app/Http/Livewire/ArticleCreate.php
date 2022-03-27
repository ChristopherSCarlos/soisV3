<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Storage;

use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;

use Livewire\WithPagination;
use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ArticleCreate extends Component
{
    use WithFileUploads;  
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
    public $article_id;

    public $article_image_view;
    public $selectedNewsAssetDataIsLatestImage;
    public $selectedNewsAssetDataID;
    public $orgID;

    public $convertedArticleSlug;
    public $articleTags = [];
    public $article_type_id;





    /*====================================================
    =            Create Section comment block            =
    ====================================================*/
    public function createNews()
    {
        $this->resetValidation();
        $this->reset();
    }
    public function create()
    {
        // $this->validate([
        //     'article_featured_image' => 'required|file|mimes:jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt,pdf,zip',
        //     'article_content' => 'required',
        // ]);

        dd($this->article_title);

        // $article_content = $this->article_content;
        // $dom = new \DomDocument();
        // $dom->loadHtml($article_content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        // $imageFile = $dom->getElementsByTagName('imageFile');
        // foreach($imageFile as $item => $image){
        //     $data = $img->getAttribute('src');

        //     list($type, $data) = explode(';', $data);
        //     list(, $data)      = explode(',', $data);

        //     $imgeData = base64_decode($data);
        //     $image_name= "/upload/" . time().$item.'.png';
        //     $path = public_path() . $image_name;
        //     file_put_contents($path, $imgeData);
        //     $image->removeAttribute('src');
        //     $image->setAttribute('src', $image_name);
        // }
        // $article_content = $dom->saveHTML();

        // $this->article_featured_image_name = time().'.'.$this->article_featured_image->extension();
        // // dd($this->article_featured_image_name);


        // $this->article_featured_image->store('files', 'imgfolder',$this->article_featured_image_name);

        // $this->article_featured_image->storeAs('files',$this->article_featured_image_name, 'imgfolder');


        // $this->userId = Auth::user()->user_id;
        // $this->user = User::find($this->userId);
        // $this->va = $this->user->organizations->first();


        // // dd($this->va);
        // $this->latestOrganizationIDtoInsertToDB = $this->va->organization_id;
        // if($this->latestOrganizationIDtoInsertToDB == null){
        //     $this->convertedArticleSlug = str_replace(' ', '-', $this->article_title);

        //     // Article::create($this->createModelWithoutOrg());
        // // $this->syncArticleOrganization();

        //     $this->latestNewsID = Article::latest()->where('status','=','1')->pluck('articles_id')->first();
        // // dd($this->latestNewsID);

        //     // OrganizationAsset::create([
        //     //     'organization_id' => $this->latestOrganizationIDtoInsertToDB,
        //     //     'asset_type_id' => '4',
        //     //     'file' => $this->article_featured_image_name,
        //     //     'is_latest_logo' => '0',
        //     //     'is_latest_banner' => '0',
        //     //     'is_latest_image' => '1',
        //     //     'user_id' => $this->userId,
        //     //     'page_type_id' => '2',
        //     //     'status' => '1',
        //     //     'articles_id' => $this->latestNewsID,
        //     // ]);
        //     // $this->article_featured_image = null;
        //     // $this->reset();
        //     // $this->resetValidation();
        //     $this->newsRedirector();
        // }else{
        //     $this->convertedArticleSlug = str_replace(' ', '-', $this->article_title);

        //     Article::create($this->createModel());
        // // $this->syncArticleOrganization();

        //     $this->latestNewsID = Article::latest()->where('status','=','1')->pluck('articles_id')->first();
        // // dd($this->latestNewsID);

        //     OrganizationAsset::create([
        //         'organization_id' => $this->latestOrganizationIDtoInsertToDB,
        //         'asset_type_id' => '4',
        //         'file' => $this->article_featured_image_name,
        //         'is_latest_logo' => '0',
        //         'is_latest_banner' => '0',
        //         'is_latest_image' => '1',
        //         'user_id' => $this->userId,
        //         'page_type_id' => '2',
        //         'status' => '1',
        //         'articles_id' => $this->latestNewsID,
        //     ]);
        //     $this->article_featured_image = null;
        //     $this->reset();
        //     $this->resetValidation();
        //     $this->newsRedirector();
        // }
        // // dd($this->latestOrganizationIDtoInsertToDB);

        // // $this->OrgDataFromUser = $this->user->organization->first();
        // // $this->OrgDataFromUserOrganizationNameString = $this->OrgDataFromUser->organization_name;


        
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
    public function createModelWithoutOrg()
    {
        return [
            'article_title' => $this->article_title,
            'article_subtitle' => $this->article_subtitle,
            'article_content' => $this->article_content,
            'type' => $this->type,
            'status' => $this->status,
            'user_id' => $this->userId,
            'article_slug' => $this->convertedArticleSlug,
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









    public function newsRedirector()
    {
            return redirect()->route('articles');
    }






    public function getArticleType()
    {
        // dd(DB::table('article_types')->where('status','=','1')->get());
        return DB::table('article_types')->where('status','=','1')->get();
    }

    public function render()
    {
        return view('livewire.article-create',[
            'displayArticleTypeData' => $this->getArticleType(),

        ]);
    }
}
