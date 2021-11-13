<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Article;


use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;

use Storage;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class Sliders extends Component
{
    /* Traits */
    use withPagination;
    /* Modals */
    public $modalAddNewsFormVisible = false;
    public $modalRemoveNewsFormVisible = false;
    /* Variables */
    public $articleData;
    public $articleID;
    
    public function createSlider()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalAddNewsFormVisible = true;
    }

    public function add()
    {
        Article::find($this->articleData)->update(['is_carousel_homepage'=>'1']);
        $this->modalAddNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }


    public function deleteNewsShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->articleID = $id;
        $this->modalRemoveNewsFormVisible = true;
    }
    public function remove()
    {
        Article::find($this->articleID)->update(['is_carousel_homepage'=>'0']);
        $this->modalRemoveNewsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }


    public function getArticlesFromDatabase()
    {
        return Article::where('status','=','1')->get();
    }

    public function read()
    {
        // dd(DB::table('articles')->where('is_carousel_homepage','=','1')->get());
        return DB::table('articles')->where('is_carousel_homepage','=','1')->paginate(10);
    }
    public function render()
    {
        return view('livewire.sliders',[
            'getCarouselHomepage' => $this->read(),
            'getDisplayArticleOnSelectModal' => $this->getArticlesFromDatabase(),
        ]);
    }
}
