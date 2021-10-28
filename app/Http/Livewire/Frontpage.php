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
    public $homepageID;
    public $homepage;

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
            if($this->data->is_default_home == '1'){
                $this->isDefaultHomeID = $this->data->pages_id;
                $this->getDataOfDefaultHomepage = Page::find($this->isDefaultHomeID)->first();
                $this->homepageID = $this->getDataOfDefaultHomepage->pages_id;
                
                $this->homepage = DB::table('pages')->where('pages_id','=',$this->isDefaultHomeID)->get();
                return $this->homepage;
            }
        }
    }

    

    /**
     *
     * Get Top Bar Links
     *
     */
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

    /**
     *
     * Get Organization Data
     *
     */
    public function getOrgPageData()
    {
        return Organization::select('organizations_id','organization_name','organization_logo','organization_details','organization_primary_color','organization_secondary_color','organization_slug','page_type','created_at','updated_at','status')->get();
    }


    /**
     *
     * Get Articles Data
     *
     */
    public function getArticleAllData()
    {
        return Article::select('articles_id','article_title','article_subtitle','article_content','type','image','status','user_id','article_slug','created_at','updated_at','is_featured_in_newspage','is_article_featured_landing_page')->get();
    }

    /**
     *
     * Get Top News
     *
     */
    public function getTopNews()
    {
        return DB::table('articles')->where('is_article_featured_landing_page','=','1')->get();
        // dd(DB::table('articles')->where('is_article_featured_landing_page','=','1')->first());
    }

    /**
     *
     * Get Lates News
     *
     */
    public function getLatestArticle()
    {
        // dd(DB::table('articles')->orderBy('created_at','asc')->first());
        return DB::table('articles')->orderBy('created_at','asc')->first();
    }

    public function getArticleTime()
    {
        // dd(DB::table('articles')->orderBy('created_at','asc')->skip(1)->take(10)->get());
        return DB::table('articles')->orderBy('created_at','asc')->skip(1)->take(8)->get();
        // return DB::table('articles')->orderBy('created_at','asc')->paginate(10);
    }

    public function render()
    {
        return view('livewire.frontpage',[
            'isWebpageHomepage' => $this->selectSystemHomepage(),
            'isCurrentSlugInSystemPage' => $this->selectSlugForSystemPagesViews(),
            'getTopBarNav' => $this->topBarLinks(),
            'orgLinks' => $this->organizationLinks(),
            'pageOrgData' => $this->getOrgPageData(),
            'getDsiplayArticleDataOnNewsPage' => $this->getArticleAllData(),
            'getTopNewsArticleOnCreatedPage' => $this->getTopNews(),
            'getDsiplayArticleLatestOnCreatedPage' => $this->getLatestArticle(),
            'getDsiplayArticleDataOnCreatedPage' => $this->getArticletime(),
        ])->layout('layouts.frontpage');
    }
}
