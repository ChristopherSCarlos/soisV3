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

class OrgAccArticleCreate extends Controller
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

    private $orgIDHolder;

    private $checkUserData;
    private $checkUserRole;
    private $UserRole;
    private $orgDataOnNull;

    public function store(Request $request)
    {
        $checkUserData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $UserRole = DB::table('roles')->where('role_id','=',$checkUserData->role_id)->first();
        if ($checkUserData->organization_id != null) {
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
                return redirect('org-articles/create')->with('status', 'Organizations news article has been created.');
        }else{
            $orgDataOnNull = DB::table('organizations')->where('organization_acronym','=','PUP')->first();
            $orgID = $orgDataOnNull->organization_id;
            if ($UserRole->role == "Head of Student Services") {
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
                // $orgID = (int) $orgIDHolder->organization_id;
                $artSlug = str_replace(' ', '-', $article_title);
                Article::create($this->articleInsertModel($article_title,$article_subtitle,$article_content,$article_type_id,$status = 1,$userID,$artSlug,$orgID));
                $latestNewsID = Article::latest()->where('status','=','1')->pluck('articles_id')->first();
                OrganizationAsset::create([
                    'organization_id' => $orgID,
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
                return redirect('adminArticles')->with('status', 'Head of Student Services news article has been created.');
            }
            elseif($UserRole->role == 'Super Admin'){
                echo $UserRole->role;
            }else{
                echo $UserRole->role;
            }
        }
    }

    public function index()
    {
        // dd(Auth::id());
        // dd(DB::table('role_user')->where('user_id','=',Auth::id())->pluck('organization_id'));
        return view('normlaravel.article-create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("Hello");
        return view('normlaravel.article-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artData = Article::findOrFail($id);
        $selectedArticle = DB::table('articles')->where('articles_id','=',$id)->get();
        // dd($artData);
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

        $request->validate([
            'article_featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article_featured_image_name = time().'.'.$request->article_featured_image->extension();  

        $article_featured_image_name = time($article_featured_image->extension());
        // dd($article_featured_image_name);


        // $path=$request->file('article_featured_image')->store('public');
        // $request->file('article_featured_image')->store('public');
        $request->article_featured_image->storeAs('files', $article_featured_image_name);
        $request->article_featured_image->move(public_path('files'), $article_featured_image_name);
        // $this->article_featured_image->store('files', 'imgfolder',$article_featured_image_name);

        // $this->article_featured_image->storeAs('files',$article_featured_image_name, 'imgfolder');

        // echo $imageName;

        $userID = Auth::id();
        $orgIDHolder = DB::table('role_user')->where('user_id','=',$userID)->first('organization_id');
        $orgID = (int) $orgIDHolder->organization_id;
        // dd($orgID);
        $artSlug = str_replace(' ', '-', $article_title);
        // echo $convertedArticleSlug;
            // Article::create($createModelWithoutOrg());
        // $syncArticleOrganization();
        Article::where('articles_id','=',$id)->update($validatedData);
        // Article::where('articles_id','=',$id)->update($this->articleInsertModel($article_title,$article_subtitle,$article_content,$article_type_id,$status = 1,$userID,$artSlug,$orgID));
        $latestNewsID = Article::latest()->where('status','=','1')->pluck('articles_id')->first();
        // dd($latestNewsID);

        OrganizationAsset::update([
            'organization_id' => $orgID,
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


        // dd("Hello");
         return redirect('article/create')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function deleteCommsOfficer($id)
    {
        Article::find($id)->update(['status'=>'0']);
        return redirect('/Organization/articles');
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
