<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use Illuminate\Support\Facades\DB;

class ArticleCreate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public $article_title;
    public $article_subtitle;
    public $article_content;
    public $article_type_id;
    public $article_featured_image;
    public $article_featured_image_name;
    public $convertedArticleSlug;
    public $latestNewsID;
    public $artData;
    public $selectedArticle;

    public $_instance;

    private $orgIDHolder;
    public function index()
    {
        // dd(Auth::id());
        // dd(DB::table('role_user')->where('user_id','=',Auth::id())->pluck('organization_id'));
        return view('normlaravel.super-article-create',);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("Hello");
        // $this->permission_data = new PermissionCheckerController;
        // $this->permission_data->permssionChecker('HP-View_News_Article');
        return view('normlaravel.super-article-create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("Hello");
        $checkUserData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $UserRole = DB::table('roles')->where('role_id','=',$checkUserData->role_id)->first();
            $orgDataOnNull = DB::table('organizations')->where('organization_acronym','=','PUP')->first();
            $orgID2 = $orgDataOnNull->organization_id;
                $article_title = $request->article_title;
                $article_subtitle = $request->article_subtitle;
                $article_content = $request->article_content;
                $article_type_id = $request->article_type_id;
                $request->validate([
                    'article_featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $article_featured_image_name = time().'.'.$request->article_featured_image->extension();  
                $request->article_featured_image->storeAs('files', $article_featured_image_name);
                $request->article_featured_image->move(public_path('files'), $article_featured_image_name);
                $userID = Auth::id();
                $orgIDHolder = DB::table('role_user')->where('user_id','=',$userID)->first('organization_id');
                $orgID2 = (int) $orgIDHolder->organization_id;
                $artSlug = str_replace(' ', '-', $article_title);
                Article::create($this->articleInsertModel($article_title,$article_subtitle,$article_content,$article_type_id,$status = 1,$userID,$artSlug,$orgID2));
                $latestNewsID = Article::latest()->where('status','=','1')->pluck('articles_id')->first();
                OrganizationAsset::create([
                    'organization_id' => $orgID2,
                    'asset_type_id' => '4',
                    'file' => $article_featured_image_name,
                    'is_latest_logo' => '0',
                    'is_latest_banner' => '0',
                    'is_latest_image' => '1',
                    'user_id' => $userID,
                    'page_type_id' => '2',
                    'status' => '1',
                    'articles_id' => $latestNewsID,
                ]);
                return redirect('articles/create')->with('status', 'School news article has been created.');
    }

    public function articleInsertModel($artTitle,$artSubtitle,$artContent,$type,$status,$userID,$artSlug,$orgID)
    {
        return [
            'article_title' => $artTitle,
            'article_subtitle' => $artSubtitle,
            'article_content' => $artContent,
            'type' => $type,
            'status' => $status,
            'user_id' => $userID,
            'article_slug' => $artSlug,
            'organization_id' => $orgID,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        // dd(DB::table('organization_assets')->where('articles_id','=',$id)->get());
        $article_Data = DB::table('articles')->where('articles_id','=',$id)->get();
        // dd(DB::table('articles')->where('articles_id','=',$id)->first());
        $article_image = DB::table('organization_assets')->where('articles_id','=',$id)->get();
        return view('normlaravel.super-article-show', [
            'artData' => $article_Data,
            'artImage' => $article_image,
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
        // $this->permission_data = new PermissionCheckerController;
        // $this->permission_data->permssionChecker('HP-Edit_News_Article');
        $artData = Article::findOrFail($id);
        $selectedArticle = DB::table('articles')->where('articles_id','=',$id)->get();
        // dd($selectedArticle);
        return view('normlaravel.article-update', compact('artData'), compact('selectedArticle'));
        // return view('normlaravel.article-update',[
            // 'selectedArticle' => DB::table('articles')->where('articles_id','=',$id)->get(),
            // 'art' => $artData,
        // ]);
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
        // dd("Hello");
        // dd(Article::where('articles_id','=',$id)->get());
        $validatedData = $request->validate([
            'article_title' => 'required',
            'article_subtitle' => 'required',
            'article_content' => 'required',
            'article_type_id' => 'required',
        ]);
        $article_title = $request->article_title;
        $article_subtitle = $request->article_subtitle;
        $article_content = $request->article_content;
        $article_type_id = $request->article_type_id;


        $userID = Auth::id();
        $orgIDHolder = DB::table('role_user')->where('user_id','=',$userID)->first('organization_id');
        $orgID = (int) $orgIDHolder->organization_id;
        $artSlug = str_replace(' ', '-', $article_title);
        // echo $convertedArticleSlug;
            // Article::create($createModelWithoutOrg());
        // $syncArticleOrganization();
        Article::where('articles_id','=',$id)->update($validatedData);
        // Article::where('articles_id','=',$id)->update($this->articleInsertModel($article_title,$article_subtitle,$article_content,$article_type_id,$status = 1,$userID,$artSlug,$orgID));
        $latestNewsID = Article::latest()->where('status','=','1')->pluck('articles_id')->first();
        // dd($latestNewsID);

        


        // dd("Hello");
         return redirect('viewarticle')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function updateImage($id)
    {
        $article_image = DB::table('organization_assets')->where('articles_id','=',$id)->get();
        // dd($article_image);
        $article_id = DB::table('organization_assets')->where('articles_id','=',$id)->first();
        $imageID = $article_id->organization_asset_id;
        // dd($imageID);
        $article_Data = DB::table('articles')->where('articles_id','=',$id)->first();
        $article_id = $article_Data->articles_id;
        return view('normlaravel.super-article-updateImage', [
            'artImage' => $article_image,
            'id' => $imageID,
            'artID' => $article_id,
        ]);
    }
    public function updateImageProcess(Request $request, $id, $artID)
    {

        $validate = $request->validate([
            'article_featured_image' => 'required',
        ]);
        $article_featured_image= $request->article_featured_image;
        $article_featured_image_name = time().'.'.$article_featured_image->extension();

        $article_featured_image->store('files', 'imgfolder',$article_featured_image_name);

        $article_featured_image->storeAs('files',$article_featured_image_name, 'imgfolder');


        $userId = Auth::user()->user_id;
        $user = User::find($userId);
        $va = DB::table('role_user')->where('user_id','=',$userId)->first();
        $vaHolder = $va->organization_id;
        $latestOrganizationIDtoInsertToDB = (int) $vaHolder;
        // dd($latestOrganizationIDtoInsertToDB);

        OrganizationAsset::create([
            'asset_type_id' => '4',
            'asset_name' => $article_featured_image_name,
            'file' => $article_featured_image_name,
            'is_latest_logo' => '0',
            'is_latest_banner' => '0',
            'is_latest_image' => '1',
            'user_id' => $userId,
            'page_type_id' => '2',
            'organization_id' => $latestOrganizationIDtoInsertToDB,
            'status' => '1',
            'articles_id' => $artID,
        ]);

        $selectedNewsAssetDataIsLatestImage = OrganizationAsset::latest()->where('articles_id','=',$artID)->where('status','=','1')->first();
        // dd($selectedNewsAssetDataIsLatestImage);
        // dd($selectedNewsAssetDataIsLatestImage);
        if ($selectedNewsAssetDataIsLatestImage != null) {
            $selectedNewsAssetDataID = $selectedNewsAssetDataIsLatestImage->organization_asset_id;
            // dd($selectedNewsAssetDataID);
            // dd(OrganizationAsset::find('organization_id','=',$artID)->where('is_latest_logo','=','1'));
            OrganizationAsset::where('articles_id','=',$artID)->where('is_latest_image','=','1')->update([
                'is_latest_image' => '0',
            ]);
            DB::table('organization_assets')->where('organization_asset_id','=',$selectedNewsAssetDataID)->update(['is_latest_image'=>'1']);
        }else{
         return redirect('viewarticle')->with('status', 'Blog Post Form Data Has Been inserted');
        }

         return redirect('viewarticle')->with('status', 'Blog Post Form Data Has Been inserted');
    }


    public function featureNews($id)
    {
        Article::where('articles_id',$id)->update(['is_featured_in_newspage' => '1']);
        return redirect('articles.show', array('id' =>$id));
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
