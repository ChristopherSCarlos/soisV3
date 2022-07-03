<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
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
        //
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
            // Article::create($createModelWithoutOrg());
        // $syncArticleOrganization();
        Announcement::create($this->articleInsertModel($article_title,$article_subtitle,$article_content,$article_type_id,$status = 1,$userID,$artSlug,$orgID));
        $latestNewsID = Article::latest()->where('status','=','1')->pluck('articles_id')->first();
        // dd($latestNewsID);

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


        // dd("Hello");
         return redirect('article/create')->with('status', 'Blog Post Form Data Has Been inserted');
    }


    


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
