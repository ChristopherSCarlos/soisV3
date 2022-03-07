<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class CreationTest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $tags_name;
    public $tags_description;
    public $tags_type;
    public $user_id;

    public function index()
    {
        return view::make('normLaravel.text');
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
        // insertModel();
        $tags_name = $request->tags_name;
        $tags_description = $request->tags_description;
        $tags_type = $request->tags_type;
        $user_id = $request->user_id;
           
        $this->insertModel($tags_name,$tags_description,$tags_type,$user_id);
        // echo "$request->tags_name";
        // echo "$request->tags_description";
        // echo "$request->tags_type";
        // echo "$request->user_id";
        // $post = new Post;
        DB::table('tags')->insert($this->insertModel($tags_name,$tags_description,$tags_type,$user_id));
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();
        // echo $request->title;
        // echo $request->description;
        // dd("Hello");
        return redirect('test/normal/controller')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    public function insertModel($tags,$description,$type,$userID)
    {
        return [
            'tags_name' => $tags,
            'tags_description' => $description,
            'tags_type' => $type,
            'user_id' => $userID,
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
