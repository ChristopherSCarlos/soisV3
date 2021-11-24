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
    public $organizationID;
    public $organizationAssetLogo;
    private $organizationAssetLogoDisplay;
    public $organizationAssetBanner;
    public $organizationInterfaceData;

    public $pageData;
    public $pageDataCount;

    public $articlesImageID;
    public $articlesImageArray;
    public $articlesImageIDCount;

    private $selectedArticlesImageID;
    public $selectedArticlesImageArray;
    public $selectedArticlesImageIDCount;
    public $selectedArticlesImageIDint;

    public $displayedOrganizationOnWebpage;
    public $selectedOrganizationDataIDint;
    public $selectedOrganizationArticleArray;
    public $selectedOrganizationArray;
    public $selectedOrganizationEventsArray;
    
    public $displayedOrganizationData;
    public $displayedOrganizationDataID;
    public $displayedOrganizationDataPassOnView;

    public function mount($urlslug = null)
    {
        $this->retrieveContent($urlslug);
    }

    public function retrieveContent($urlslug)
    {
        if (empty($urlslug)) {
            $this->data = Page::where('is_default_home',true)->first();
            $this->data = Page::select('title')->first();
        } else {
            $this->data = Page::where('slug',$urlslug)->first();
            $this->pagesData = Page::pluck('slug');
            // dd(count($this->pagesData));
            if (Page::where('slug', '=', $urlslug)->exists()) {
                // dd($urlslug);
            }
            if (Organization::where('organization_slug', '=', $urlslug)->exists()) {
                $this->organizationAssetLogo = DB::table('system_assets')->where('organization_id','=',$this->getOrganizationID())->where('is_latest_logo','=','1')->where('status','=','1')->get();
                $this->organizationAssetBanner = DB::table('system_assets')->where('organization_id','=',$this->getOrganizationID())->where('is_latest_banner','=','1')->where('status','=','1')->get();
                $this->organizationInterfaceData = DB::table('organizations')->where('organization_slug','=',$urlslug)->get();
            }
            if (Article::where('article_slug', '=', $urlslug)->exists()) {
                // dd($urlslug);
            }
            // dd($urlslug);

            // if may error
            if (!$this->data) {
                $this->data = Page::where('is_default_not_found',true)->first();
            }
        }

        $this->title = $this->data->title;
        $this->content = $this->data->content;
    }


    public function getOrganizationAssetLogoFromDatabase()
    {
        return $this->organizationAssetLogo;
    }
    public function getOrganizationAssetBannerFromDatabase()
    {
        return $this->organizationAssetBanner;
    }
    public function getOrganizationInterfaceDataFromDatabase()
    {
        return $this->organizationInterfaceData;
    }
    /**
     *
     * Get The Homepage
     *
     */
    public function selectSystemHomepage()
    {
        // $this->getPagesDataFromDB = DB::table('pages')->first();
        $this->getPagesDataFromDB = DB::table('pages')->where('is_default_home','=','1')->get();
        // dd($this->getPagesDataFromDB);
        return $this->getPagesDataFromDB;
        // foreach ($this->getPagesDataFromDB as $this->data) {
        //     echo $this->data->title . " || ";
        //     if($this->data->is_default_home == '1'){
        //         // echo $this->data->title . " || ";
        //         $this->isDefaultHomeID = $this->data->pages_id;
        //         // echo $this->isDefaultHomeID;
        //         $this->getDataOfDefaultHomepage = Page::find($this->isDefaultHomeID)->get();
        //         dd($this->getDataOfDefaultHomepage);
        //         // dd($this->getDataOfDefaultHomepage);
        //         // $this->getDataOfDefaultHomepage;
        //         return $this->getDataOfDefaultHomepage;
        //     }
            // else{
            //     $this->dateIDExpired = $this->data->announcements_id;
            //     if ($this->data->exp_time < $this->checkCurrentTime) {
            //         Announcement::where('announcements_id', '=', $this->dateIDExpired)->update(['status' => '1']);
            //     }
            // }
        // }
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
    public function getHomepageFeaturedArticleTime()
    {
        // dd(DB::table('articles')->orderBy('created_at','asc')->skip(1)->take(10)->get());
        return DB::table('articles')->where('is_article_featured_landing_page','=','1')->orderBy('created_at','asc')->get();
        // return DB::table('articles')->orderBy('created_at','asc')->paginate(10);
    }
    public function getHomepageEvents()
    {
        // dd(DB::table('articles')->orderBy('created_at','asc')->skip(1)->take(10)->get());
        return DB::table('articles')->where('article_type_id','=','2')->orderBy('created_at','asc')->get();
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
    public function getAllFeaturedArticleInHomepage()
    {
        return DB::table('articles')->where('is_article_featured_landing_page','=','1')->get();
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
        // dd(DB::table('organizations')
        //     ->where('organization_slug','=',$this->urlslug)
        //     ->get());
    }

    /**
     *
     * Get system Asset Data from database
     *
     */
    public function getOrganizationAssetLogo()
    {
        // $this->organizationAssetLogo = DB::table('system_assets')->where('organization_id','=',$this->getOrganizationID())->where('is_latest_logo','=','1')->where('status','=','1')->get();
        // dd($this->organizationAssetLogo);
        // return $this->organizationAssetLogo;
    }

    public function getOrganizationID()
    {
        $this->organizationID = DB::table('organizations')
            ->where('organization_slug','=',$this->urlslug)
            ->pluck('organizations_id');
        return $this->organizationID;
    }

    public function getNewsImage()
    {
        // dd(DB::table('articles')->orderBy('created_at','asc')->skip(1)->take(8)->pluck('articles_id'));
        $this->articlesImageID = DB::table('articles')->orderBy('created_at','asc')->skip(1)->take(8)->pluck('articles_id');
        // dd(count($this->articlesImageID));
        // dd(gettype($this->articlesImageID));
        // dd($this->articlesImageID);
        // foreach($this->articlesImageID as $object){
        //     // $this->articlesImageArray[] = $object->toArray();
        // }
        $this->articlesImageArray = DB::table('system_assets')->where('status','=','1')->where('is_latest_image','=','1')->get();
        // dd($articlesImageArray);
        // $s       // dd(DB::table('system_assets')->where('articles_id','=',$i)->where('status','=','1')->where('is_latest_image','=','1')->get());
        // dd($this->articlesImageIDCount);
        // dd('hello');
        return $this->articlesImageArray;
    }
    public function getSelectedNewsImage()
    {
        // dd($this->urlslug);
        $this->selectedArticlesImageID = DB::table('articles')->where('article_slug','=',$this->urlslug)->pluck('articles_id');
        // $this->selectedArticlesImageID = DB::table('articles')->where('article_slug','=',$this->urlslug)->first();
        // dd($this->selectedArticlesImageID->articles_id);
        // echo var_dump($this->selectedArticlesImageID);
        // echo $this->urlslug;
        
        if (Article::where('article_slug', '=', $this->urlslug)->exists()) {
            // echo 'Data found';
            // echo var_dump(json_decode($this->selectedArticlesImageID[0],true));
            $this->selectedArticlesImageIDint = json_decode($this->selectedArticlesImageID[0]);
            $this->selectedArticlesImageArray = DB::table('system_assets')->where('is_latest_image','=','1')->where('status','=','1')->where('articles_id','=',$this->selectedArticlesImageIDint)->get();
            // echo $this->selectedArticlesImageArray;
            // dd($this->selectedArticlesImageArray);
            return $this->selectedArticlesImageArray;
        }



        // echo gettype(var_dump(json_decode($this->selectedArticlesImageID,true)));

        // echo json_decode($this->selectedArticlesImageID);

        // foreach ($this->selectedArticlesImageID as $data) {
        //     echo "Helllo";
        // }


        // dd(gettype((array)$this->selectedArticlesImageID));
        // $this->selectedArticlesImageIDint = (array)$this->selectedArticlesImageID[0];
        
        // echo gettype($this->selectedArticlesImageIDint);
        // echo gettype($this->selectedArticlesImageIDint);
        // // echo number_format($this->selectedArticlesImageIDint);
        // echo intval($this->selectedArticlesImageIDint);
        // echo (double)$this->selectedArticlesImageIDint;
        // $this->selectedArticlesImageIDCount = $this->selectedArticlesImageID->;
        // dd((array)$this->selectedArticlesImageID[0]);
        // dd((array)$this->selectedArticlesImageID[0]);
        // dd("Hello");
    }


    public function getAnnouncements()
    {
        return Announcement::where('status','=','1')->orderBy('created_at','asc')->get();
    }

    public function getIsAnnouncementActivated()
    {
        if ($this->urlslug != null) {
            dd(Page::where('is_announcements_activated','=','1')->get());
        }else{
            dd(Page::where('is_announcements_activated','=','1')->where('slug','=',$this->urlslug)->get());
        }
        // return Pages::where('is_announcements_activated','=','1')->get();
    }

    public function getFeaturedEvent()
    {
        return DB::table('system_assets')->where('status','=','1')->where('is_latest_image','=','1')->get();
    }

    public function getOrganizationAnnouncement()
    {
        // dd($this->urlslug);
        $this->displayedOrganizationOnWebpage = DB::table('organizations')->where('organization_slug','=',$this->urlslug)->pluck('organizations_id');
        // return DB::table('announcements')->where('organization','=',)
        if (Organization::where('organization_slug', '=', $this->urlslug)->exists()) {
            // echo var_dump(json_decode($this->selectedArticlesImageID[0],true));
            $this->selectedOrganizationDataIDint = json_decode($this->displayedOrganizationOnWebpage[0]);
            $this->selectedOrganizationArray = DB::table('announcements')->where('organization_id','=',$this->selectedOrganizationDataIDint)->get();
            // dd($this->selectedOrganizationArray);
            return $this->selectedOrganizationArray;
            // dd($this->selectedOrganizationArray);
            // $this->selectedOrganizationArray = DB::table('system_assets')->where('is_latest_image','=','1')->where('status','=','1')->where('articles_id','=',$this->selectedOrganizationDataIDint)->get();
            // echo $this->selectedOrganizationArray;
            // dd($this->selectedOrganizationArray);
            // return $this->selectedOrganizationArray;
        }
        // dd("hello");
    }

    public function getOrganizationArticle()
    {
        // dd($this->urlslug);
        $this->displayedOrganizationOnWebpage = DB::table('organizations')->where('organization_slug','=',$this->urlslug)->pluck('organizations_id');
        // dd($this->displayedOrganizationOnWebpage);
        // return DB::table('announcements')->where('organization','=',)
        if (Organization::where('organization_slug', '=', $this->urlslug)->exists()) {
            // echo var_dump(json_decode($this->selectedArticlesImageID[0],true));
            // dd($this->displayedOrganizationOnWebpage[0]);
            $this->selectedOrganizationDataIDint = json_decode($this->displayedOrganizationOnWebpage[0]);
            // dd($this->selectedOrganizationDataIDint);
            $this->selectedOrganizationArticleArray = DB::table('articles')->where('organization_id','=',$this->selectedOrganizationDataIDint)->orderBy('created_at','desc')->get();
            // dd($this->selectedOrganizationArticleArray);
            return $this->selectedOrganizationArticleArray;
            // $this->selectedOrganizationArray = DB::table('system_assets')->where('is_latest_image','=','1')->where('status','=','1')->where('articles_id','=',$this->selectedOrganizationDataIDint)->get();
            // echo $this->selectedOrganizationArray;
            // dd($this->selectedOrganizationArray);
            // return $this->selectedOrganizationArray;
        }
        // dd("hello");
    }

    public function getOrganizationEvents()
    {
        // dd($this->urlslug);
        $this->displayedOrganizationOnWebpage = DB::table('organizations')->where('organization_slug','=',$this->urlslug)->pluck('organizations_id');
        // return DB::table('announcements')->where('organization','=',)
        if (Organization::where('organization_slug', '=', $this->urlslug)->exists()) {
            // echo var_dump(json_decode($this->selectedArticlesImageID[0],true));
            $this->selectedOrganizationDataIDint = json_decode($this->displayedOrganizationOnWebpage[0]);
            $this->selectedOrganizationEventsArray = DB::table('articles')->where('organization_id','=',$this->selectedOrganizationDataIDint)->where('article_type_id','=','1')->get();
            return $this->selectedOrganizationEventsArray;
            // dd($this->selectedOrganizationArray);
            // $this->selectedOrganizationArray = DB::table('system_assets')->where('is_latest_image','=','1')->where('status','=','1')->where('articles_id','=',$this->selectedOrganizationDataIDint)->get();
            // echo $this->selectedOrganizationArray;
            // dd($this->selectedOrganizationArray);
            // return $this->selectedOrganizationArray;
        }
        // dd("hello");
    }

    public function getSelectedCurrentWebPage()
    {
        return Page::where('slug','=',$this->urlslug)->get();
    }

    public function getAllOrganizationLogo()
    {
        // dd(SystemAsset::where('is_latest_logo','=','1')->get());
        return SystemAsset::where('is_latest_logo','=','1')->get();
    }

    public function getAnnouncementsInDatabaseFeaturedHomepage()
    {
        // dd(Announcement::where('isAnnouncementInHomepage','=','1')->get());
        return Announcement::where('isAnnouncementInHomepage','=','1')->get();
    }

    public function getHomepageCarouselDataFromDatabase()
    {
        return DB::table('articles')->where('is_carousel_homepage','=','1')->get();
    }

    public function getOrganizationCarouselDataFromDatabase()
    {
        // dd($this->urlslug);
        if (Organization::where('organization_slug', '=', $this->urlslug)->exists()) {
            $this->displayedOrganizationData = DB::table('organizations')->where('organization_slug','=',$this->urlslug)->pluck('organizations_id');
            $this->displayedOrganizationDataID = json_decode($this->displayedOrganizationData[0]);
            $this->displayedOrganizationDataPassOnView =  DB::table('articles')->where('is_carousel_org_page','=','1')->where('organization_id','=',$this->displayedOrganizationDataID)->get();
            return $this->displayedOrganizationDataPassOnView;
        // dd($this->displayedOrganizationDataPassOnView);

        }
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
            // 'getDisplaySelectedOrganizationAssetLogoData' => $this->getOrganizationAssetLogo(),
            'getDisplaySelectedOrganizationAssetLogoData' => $this->getOrganizationAssetLogoFromDatabase(),
            'getDisplaySelectedOrganizationAssetBannerData' => $this->getOrganizationAssetBannerFromDatabase(),
            'getDisplaySelectedOrganizationInterfaceBannerData' => $this->getOrganizationInterfaceDataFromDatabase(),
            'getDisplaySelectedNewsImageData' => $this->getNewsImage(),
            'getDisplaySelectedNewsImageDataOnSelectedNews' => $this->getSelectedNewsImage(),
            'getAnnouncementsOnHomepage' => $this->getAnnouncements(),
            'getDisplayFeaturedArticlesOnHomepage' => $this->getAllFeaturedArticleInHomepage(),
            'getDisplayLandingPageHomepage' => $this->getHomepageFeaturedArticleTime(),
            'getDisplayEventsHomepage' => $this->getHomepageEvents(),
            'getDisplayEventsAssetData' => $this->getFeaturedEvent(),
            'getDisplayAnnouncementData' => $this->getOrganizationAnnouncement(),
            'getDisplayArticleData' => $this->getOrganizationArticle(),
            'getDisplayEventsData' => $this->getOrganizationEvents(),
            'getDisplayCurrentWebPageOnHomepage' => $this->getSelectedCurrentWebPage(),
            'getDisplayOrganizationsLogoOnHomepage' => $this->getAllOrganizationLogo(),
            'getDisplayAnnouncementFeaturedHomepage' => $this->getAnnouncementsInDatabaseFeaturedHomepage(),
            'getDisplayArticlesOnHomepageCarousel' => $this->getHomepageCarouselDataFromDatabase(),
            'getDisplayArticlesOnOrganizationCarousel' => $this->getOrganizationCarouselDataFromDatabase(),
         
            // 'IfAnnouncementActivated' => $this->getIsAnnouncementActivated(),

        ])->layout('layouts.frontpage');
    }
}
