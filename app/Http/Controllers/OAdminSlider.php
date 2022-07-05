<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Http\Livewire\Objects;


use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Auth;


use Datetime;
use DatePeriod;
use DateInterval;

class OAdminSlider extends Controller
{

    public $articleData;
    public $articleID;
    public $userId;
    public $user;
    public $va;
    public $organization_id;
    public $articleOrgData;

    private $userRoleData;
    private $role_name;

    private $object;
    public $userRole;
    public $userRoleString;
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
        return view('normlaravel\oadmin-slider',[
            'getDisplayArticleOnSelectModal' => Article::where('status','=','1')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article_type_id = $request->article_type_id;
        // dd(Article::find($article_type_id));
        
        Article::find($article_type_id)->update(['is_carousel_homepage'=>'1']);
        // dd($article_type_id);
        return redirect('/admin-default-interfaces');
    }

    public function accessControlBack()
    {
        return view('normlaravel\oadmin-slider',[
            'getDisplayArticleOnSelectModal' => Article::where('status','=','1')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
