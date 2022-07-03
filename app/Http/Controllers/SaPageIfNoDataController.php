<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaPageIfNoDataController extends Controller
{
    public function function()
    {
        $hello = 1;
        return View::make("admin.s-a-page-if-no-data", compact('hello'));
        // return view('admin.s-a-page-if-no-data')->with($hello);
    }
}
