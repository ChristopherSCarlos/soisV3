<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;
use App\Models\Organization;
use App\Models\Event;
use App\Models\User;
use App\Models\Article;
// use App\Models\DefaultInterface;
use Illuminate\Support\Facades\DB;

use Auth;

class Frontpage extends Component
{

    public $getPagesDataFromDB;
    public $p = 0;
    public $isDefaultHome;
    public $isDefaultHomeID;
    public $getDataOfDefaultHomepage;
    private $data;

    public $systemPagesDataForSlugSelection;
    public $urlslug;
    public $isFrontPageSlugNull = null;

    public function mount($urlslug = null)
    {
        $this->retrieveContent($urlslug);
    }

    public function retrieveContent($urlslug)
    {
        if (empty($urlslug)) {
            $data = Page::where('is_default_home',true)->first();
            $data = Page::select('title')->first();
        } else {
            $data = Page::where('slug',$urlslug)->first();
        
            // if may error
            if (!$data) {
                $data = Page::where('is_default_not_found',true)->first();
            }
        }

        $this->title = $data->title;
        $this->content = $data->content;
    }

    /**
     *
     * Get The Homepage
     *
     */
    public function selectSystemHomepage()
    {
        $this->getPagesDataFromDB = DB::table('pages')->get();
        foreach ($this->getPagesDataFromDB as $this->data) {
            // echo $this->data->title . " || ";
            if($this->data->is_default_home == '1'){
                // echo $this->data->title . " || ";
                $this->isDefaultHomeID = $this->data->pages_id;
                // echo $this->isDefaultHomeID;
                $this->getDataOfDefaultHomepage = Page::find($this->isDefaultHomeID);
                // dd($this->getDataOfDefaultHomepage);
                // $this->getDataOfDefaultHomepage;
                return $this->getDataOfDefaultHomepage;
            }
            // else{
            //     $this->dateIDExpired = $this->data->announcements_id;
            //     if ($this->data->exp_time < $this->checkCurrentTime) {
            //         Announcement::where('announcements_id', '=', $this->dateIDExpired)->update(['status' => '1']);
            //     }
            // }
        }
        // echo '<br><br><br>This is the data: '.count($this->getPagesDataFromDB);
        // dd(count(array($this->getPagesDataFromDB)));
    }

    
    public function topBarLinks()
    {
        return DB::table('navigation_menus')
            ->where('type', '=', '1')
            ->orderBy('sequence','asc')
            // ->orderBy('created_at','asc')
            ->get();
    }

    /**
     *
     * Get Slug of System Web Pages
     *
     */
    public function selectSlugForSystemPagesViews()
    {
        $this->systemPagesDataForSlugSelection = DB::table('pages')
                                    ->orderBy('pages_id','asc')
                                    ->get()
                                    ->pluck('slug');
        // dd($this->systemPagesDataForSlugSelection);                                    
        return $this->systemPagesDataForSlugSelection;
    }

    /**
     *
     * Get Organization Data
     *
     */
    public function organizationLinks()
    {
        return DB::table('organizations')
            ->orderBy('created_at','asc')
            ->get();
    }



    public function getTopNews()
    {
        return DB::table('articles')->where('is_article_featured_landing_page','=','1')->get();
        // dd(DB::table('articles')->where('is_article_featured_landing_page','=','1')->first());
    }

    public function getArticleTime()
    {
        // dd(DB::table('articles')->orderBy('created_at','asc')->skip(1)->take(10)->get());
        return DB::table('articles')->orderBy('created_at','asc')->skip(1)->take(8)->get();
        // return DB::table('articles')->orderBy('created_at','asc')->paginate(10);
    }

    public function getLatestArticle()
    {
        // dd(DB::table('articles')->orderBy('created_at','asc')->first());
        return DB::table('articles')->orderBy('created_at','asc')->first();
    }
    public function getAllFeaturedArticle()
    {
        return DB::table('articles')->where('is_featured_in_newspage','=','1')->get();
    }

    public function getSelectedNewsArticle()
    {
        return DB::table('articles')
            ->orderBy('articles_id','asc')
            ->get()
            ->pluck('article_slug');
    }

    public function getSelectedNewsArticleData()
    {
        return DB::table('articles')
            ->where('article_slug','=',$this->urlslug)
            ->get();    
    }

    public function getSelectedOrganization()
    {
        return DB::table('organizations')
            ->orderBy('organizations_id','asc')
            ->get()
            ->pluck('organization_slug');
        // return DB::table('organizations')
        //     ->where('organization_slug','=',$this->urlslug)
        //     ->get()
        //     ->pluck('organization_slug'); 
    }
    public function getSelectedOrganizationData()
    {
        return DB::table('organizations')
            ->where('organization_slug','=',$this->urlslug)
            ->get();
    }

    public function render()
    {
        return view('livewire.frontpage',[
            'isWebpageHomepage' => $this->selectSystemHomepage(),
            'isCurrentSlugInSystemPage' => $this->selectSlugForSystemPagesViews(),
            'getTopBarNav' => $this->topBarLinks(),
            'orgLinks' => $this->organizationLinks(),
            'getTopNewsArticleOnCreatedPage' => $this->getTopNews(),
            'getDsiplayArticleDataOnCreatedPage' => $this->getArticletime(),
            'getDsiplayArticleLatestOnCreatedPage' => $this->getLatestArticle(),
            'getDsiplayFeaturedArticleOnCreatedPage' => $this->getAllFeaturedArticle(),
            'getDisplaySelectedNewsArticle' => $this->getSelectedNewsArticle(),
            'getDisplaySelectedNewsArticleData' => $this->getSelectedNewsArticleData(),
            'getDisplaySelectedOrganization' => $this->getSelectedOrganization(),
            'getDisplaySelectedOrganizationData' => $this->getSelectedOrganizationData(),
        ])->layout('layouts.frontpage');
    }
}
