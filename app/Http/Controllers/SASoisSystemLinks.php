<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoisLink;

class SASoisSystemLinks extends Controller
{
    public $link_name;
    public $link_description;
    public $external_link;
    public $status;

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
        return view('normlaravel\sadmin-sois-links-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $link_name = $request->link_name;
        $link_description = $request->link_description;
        $external_link = $request->external_link;
        $status ='1';
        SoisLink::create([
            'link_name' => $request->link_name,
            'link_description' => $request->link_description,
            'external_link' => $request->external_link,
            'status' => '1',
        ]);
        return redirect('/default-interfaces');
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