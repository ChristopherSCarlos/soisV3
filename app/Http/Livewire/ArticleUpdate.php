<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Storage;

use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;

use Livewire\WithPagination;
use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ArticleUpdate extends Component
{
    use WithPagination;
    public $articleId;
    public $explodedLink;
    public $actual_link;

    public $article_title;
    public $article_subtitle;
    public $article_content;
    public $article_slug;
    public $type = '1';
    public $status = '1';
    public $image;
    public $data;
    public $artId;
    public $seed;
    public $is_article_featured_home_page;


    public $article_title_From_DB;
    public $article_subtitle_From_DB;
    public $article_content_From_DB;
    public $article_slug_From_DB;
    public $type_From_DB;
    public $status_From_DB;
    public $image_From_DB;
    public $data_From_DB;
    public $artId_From_DB;
    public $seed_From_DB;
    public $is_article_featured_home_page_From_DB;


    public $article_Data;
    public $selected_article_type;


    public function mount()
    {
        $this->actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->explodedLink = explode("/",$this->actual_link);
        $this->articleId = (int) $this->explodedLink[5];
    }

    public function getSelectedArticleType()
    {
        $this->selected_article_type = DB::table('articles')->where('articles_id','=',$this->articleId)->pluck('article_type_id');
        return DB::table('article_types')->where('article_types_id','=',$this->selected_article_type)->get();
        // dd(DB::table('article_types')->where('article_types_id','=',$this->selected_article_type)->get());
    }

    public function getArticleDataFromDB()
    {
        // $this->article_Data = DB::table('articles')->where('articles_id','=',$this->articleId)->get();
        // dd($this->article_Data);
        return DB::table('articles')->where('articles_id','=',$this->articleId)->get();
    }
    public function getArticleTypeFromDB()
    {
        // dd(DB::table('article_types')->where('status','=','1')->get());
        return DB::table('article_types')->where('status','=','1')->get();
        // dd($this->PassArticleDataFromDBToNewVariable());
    }


    /*============================================================
    =            Update Article Section comment block            =
    ============================================================*/
        public function updateModelData()
        {
            return [
                'article_title' => $this->article_title,
                'article_subtitle' => $this->article_subtitle,
                'article_content' => $this->article_content,
                'type' => $this->type,
                'article_slug' => $this->article_slug,
            ];
        }
        public function update()
        {
            $this->data = Article::find($this->articleId);
            /*==========================================================================
            =            Error Handler For Selection Section comment block            =
            ==========================================================================*/
                if($this->article_title != null){
                    $this->article_title;
                    $this->article_slug = str_replace(' ', '-', $this->article_title);
                    // dd($this->article_slug);
                }else{
                    $this->article_title = $this->data->article_title;
                    $this->article_slug = $this->data->article_slug;
                }
                if ($this->article_subtitle != null) {
                    $this->article_subtitle;
                }else{
                    $this->article_subtitle = $this->data->article_subtitle;
                }
                if ($this->type != null) {
                    $this->type;
                }else{
                    $this->type = $this->data->type;
                }

            // dd("hello");
            /*=====  End of Error Handler For Selection Section comment block  ======*/

            // dd($this->article_content);
        Article::find($this->articleId)->update($this->updateModelData());
        $this->reset();
        $this->resetValidation();
        $this->redirector();   
        }
        public function PassArticleDataFromDBToNewVariable()
        {
            $this->data = Article::find($this->articleId);
            $this->article_title_From_DB = $this->data->article_title;
            $this->article_subtitle_From_DB = $this->data->article_subtitle;
            $this->article_content_From_DB = $this->data->article_content;
            $this->article_slug_From_DB = $this->data->article_slug;
            $this->type_From_DB = $this->data->type;
            $this->status_From_DB = $this->data->status;
            $this->is_article_featured_home_page_From_DB = $this->data->is_article_featured_home_page;
        }
    
    
    /*=====  End of Update Article Section comment block  ======*/
    

    public function redirector()
        {
            return redirect('/articles');
        }

    public function render()
    {
        return view('livewire.article-update',[
            'displayArticleData' => $this->getArticleDataFromDB(),
            'displayArticleType' => $this->getArticleTypeFromDB(),

            'displaySelectedArticleType' => $this->getSelectedArticleType(),
        ]);
    }
}
