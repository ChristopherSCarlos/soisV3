<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Http\Livewire\Pages;

use App\Http\Livewire\Objects;

use App\Models\Page;
use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;
use Illuminate\Support\Facades\DB;
class PagesUpdateProcess extends Component
{
    private $pagesData;
    private $pagesDataID;
    private $pagesDataIDInt;

    public $pages_id;

    public $getPageData;
    public $data;

    public $title;
    public $slug;
    public $content;

    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages','slug')->ignore($this->pagesDataIDInt)],
            'content' => 'required',
        ];
    }

    public function mount()
    {
        $this->pageData = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // echo $this->pageData;
        $this->pagesDataID = substr($this->pageData, -1);
        $this->pagesDataIDInt = (int)$this->pagesDataID;
        // substr("multibyte string…", -1);
        // dd($this->pagesDataIDInt);
        $this->title;
    }

    public function read()
    {
        // dd("hello");
        $this->getPageData = Page::where('pages_id','=',$this->pagesDataIDInt)->first();
        // dd($this->getPageData);
        $this->title = $this->getPageData->title;
        $this->slug = $this->getPageData->slug;
        $this->content = $this->getPageData->content;
        // $this->isSetToDefaultHomePage = !$data->is_default_home ? null:true;
        // $this->isSetToDefaultHomePage = !$data->is_default_not_found ? null:true;

        // return $this->getPageData;

        // $this->pagesDataID = $this->pagesData->getSelectedorganization();
        // dd($this->pagesDataID);
    }
    public function render()
    {
        return view('livewire.pages-update-process',[
            'data' => $this->read(),
        ]);
    }
}
