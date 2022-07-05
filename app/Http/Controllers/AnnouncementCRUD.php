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

class AnnouncementCRUD extends Controller
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
        return view('normlaravel.admin-announcement-create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $announcement_title = $request->announcement_title;
        $announcement_content = $request->announcement_content;
        $exp_date = $request->exp_date;
        $exp_time = $request->exp_time;

        $userID = Auth::id();
        $orgIDHolder = DB::table('role_user')->where('user_id','=',$userID)->first('organization_id');
        // dd($orgIDHolder);
        $orgID = (int) $orgIDHolder->organization_id;
        Announcement::create([
            'announcement_title' =>$announcement_title,
            'announcement_content' =>$announcement_content,
            'user_id' => $userID,
            'exp_date' =>$exp_date,
            'exp_time' =>$exp_time,
            'status' => '1',
        ]);
       

        // dd("Hello");
         return redirect('adminAnnouncements')->with('status', 'Announcement Post Form Data Has Been inserted');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $selected_data = DB::Table('announcements')->where('announcements_id','=',$id)->get();
        // dd($selected_data);
        return view('normlaravel.sa-admin-announcements-view',[
            'announcement_data' => DB::Table('announcements')->where('announcements_id','=',$id)->get(),
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
        // dd($id);
        // $artData = Article::findOrFail($id);
        // $selectedArticle = DB::table('articles')->where('articles_id','=',$id)->get();
        // dd($selectedArticle);
        // return view('normlaravel.article-update', compact('artData'), compact('selectedArticle'));
        // $artData = Announcement::findOrFail($id);
        // $announcement_data = DB::Table('announcements')->where('announcements_id','=',$id)->get(),
        // $this->permission_data = new PermissionCheckerController;
        // $this->permission_data->permssionChecker('HP-Edit_News_Article');
        $artData = Announcement::findOrFail($id);
        $selectedArticle = DB::table('announcements')->where('announcements_id','=',$id)->get();
        // dd($selectedArticle);
        // return view('normlaravel.article-update', compact('artData'), compact('selectedArticle'));
        return view('normlaravel.sa-admin-announcements-edit',compact('artData'),compact('selectedArticle'));
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
        $announcement_title = $request->announcement_title;
        $announcement_content = $request->announcement_content;
        
        $data = Announcement::where('announcements_id','=',$id)->first();
        // dd($data);

        if($announcement_title != null){
            $announcement_title_for_null = $announcement_title;
        }else{
            $announcement_title_for_null = $data->announcement_title;
        }
        if($announcement_content != null){
            $announcement_content_for_null = $announcement_content;
        }else{
            $announcement_content_for_null = $data->announcement_content;
        }


        $userID = Auth::id();
        $orgIDHolder = DB::table('role_user')->where('user_id','=',$userID)->first('organization_id');
        $orgID = (int) $orgIDHolder->organization_id;
        $artSlug = str_replace(' ', '-', $announcement_title_for_null);


        // echo $convertedArticleSlug;
            // Article::create($createModelWithoutOrg());
        // $syncArticleOrganization();
        Announcement::where('announcements_id','=',$id)->update([
            'announcement_title' =>      $announcement_title_for_null,
            'announcement_content' =>    $announcement_content_for_null,
            'announcement_slug' =>    $artSlug,
        ]);
         return redirect('announcements')->with('status', 'Blog Post Form Data Has Been inserted');

    }

    public function delete($id)
    {
        Announcement::destroy($id);
        return redirect('announcements')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
