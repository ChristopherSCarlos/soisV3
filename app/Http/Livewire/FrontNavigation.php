<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;
use App\Models\Organization;
use App\Models\Event;
use App\Models\User;
use App\Models\Article;
use App\Models\Announcement;
use App\Models\SystemAsset;
use App\Models\OrganizationAsset;
// use App\Models\DefaultInterface;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Controllers\CookieController;

use Illuminate\Support\Facades\DB;

use Auth;

class FrontNavigation extends Component
{
    public function getHomepageCarouselDataFromDatabase()
    {

        // dd(DB::table('articles')->where('is_carousel_homepage','=','1')->get());
        return DB::table('articles')->where('is_carousel_homepage','=','1')->get();
    }
    public function getNewsImage()
    {
        return DB::table('organization_assets')->where('status','=','1')->where('is_latest_image','=','1')->get();
    }
    public function organizationLinks()
    {
        return DB::table('organizations')
            ->orderBy('created_at','asc')
            ->get();
        // return DB::table('organizations')->get();
    }
    public function render()
    {
        return view('livewire.front-navigation',[
            'getDisplayArticlesOnHomepageCarousel' => $this->getHomepageCarouselDataFromDatabase(),
            'getDisplaySelectedNewsImageData' => $this->getNewsImage(),
            'orgLinks' => $this->organizationLinks(),
        ]);
    }
}
