<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
class AdminAnnouncement extends Controller
{
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
        return view('normlaravel.admin-announcement',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article_title = $request->article_title;
        $article_subtitle = $request->article_subtitle;
        $article_content = $request->article_content;
        $exp_date = $request->exp_date;
        $exp_time = $request->exp_time;
        $article_type_id = $request->article_type_id;

        $request->validate([
            'article_featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $article_featured_image_name = time().'.'.$request->article_featured_image->extension();  

        // $article_featured_image_name = time($article_featured_image->extension());
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
        // dd($orgIDHolder);
        $orgID = (int) $orgIDHolder->organization_id;
        // dd($orgID);
        $artSlug = str_replace(' ', '-', $article_title);
        // echo $convertedArticleSlug;
            // Announcement::create($createModelWithoutOrg());
        // $syncArticleOrganization();
        Announcement::create($this->articleInsertModel($article_title,$article_subtitle,$article_content,$article_type_id,$status = 1,$userID,$artSlug,$orgID));
        $latestNewsID = Announcement::latest()->where('status','=','1')->pluck('announcements_id')->first();
        // dd($latestNewsID);

        OrganizationAsset::create([
            'organization_id' => '1',
            'asset_type_id' => '4',
            'file' => $article_featured_image_name,
            'is_latest_logo' => '0',
            'is_latest_banner' => '0',
            'is_latest_image' => '1',
            'user_id' => $userID,
            'page_type_id' => '2',
            'status' => '1',
            'announcement_id' => $latestNewsID,
        ]);


        // dd("Hello");
         return redirect('adminCreateAnnouncement/create')->with('status', 'Admin Announcement Post Form Data Has Been inserted');
    }

    public function articleInsertModel($artTitle,$artSubtitle,$artContent,$type,$status,$userID,$artSlug,$orgID)
    {
        return [
            'announcement_title' => $artTitle,
            'announcement_subtitle' => $artSubtitle,
            'announcement_content' => $artContent,
            'type' => $type,
            'status' => $status,
            'user_id' => $userID,
            'article_slug' => $artSlug,
            'status' => '1',
            'organization_id' => '1',
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
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
