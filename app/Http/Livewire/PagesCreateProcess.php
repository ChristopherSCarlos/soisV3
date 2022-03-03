<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;

use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;
use Illuminate\Support\Facades\DB;

class PagesCreateProcess extends Component
{

    public $modelId;
    public $slug;
    public $title;
    public $content;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    public $status;

    public $isSetHomepage;
    public $isSetErrorPage;

    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages','slug')->ignore($this->modelId)],
            'content' => 'required',
        ];
    }
    public function updatedtitle($value)
    {
        // $this->slug = $value;
        $this->slug = Str::slug($value);
    }
    public function create()
    {
        $this->resetValidation();
        $this->validate(); 
        $this->unassignedDefaultHomePage(); 
        $this->unassignedDefaultNotFoundPage();

        $this->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ]);
 
       $content = $this->content;
       $dom = new \DomDocument();
       $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
       $imageFile = $dom->getElementsByTagName('imageFile');
       foreach($imageFile as $item => $image){
           $data = $img->getAttribute('src');

           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);

           $imgeData = base64_decode($data);
           $image_name= "/upload/" . time().$item.'.png';
           $path = public_path() . $image_name;
           file_put_contents($path, $imgeData);
           $image->removeAttribute('src');
           $image->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();
        $this->status = '1';
        Page::create($this->modelData());
        $this->reset(); 
        $this->resetValidation(); 
        return redirect()->to('/system-pages/create-system-page');
    }

    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
            'status' => $this->status,
        ];
    }

    public function updatedisSetToDefaultHomePage()
    {
        $this->isSetToDefaultNotFoundPage = null;
    }

    public function updatedisSetToDefaultNotFoundPage()
    {
        $this->isSetToDefaultHomePage = null;
    }

    public function unassignedDefaultHomePage()
    {
        // dd($this->modelId);
        if ($this->isSetToDefaultHomePage != null) {
            Page::where('is_default_home',true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    public function unassignedDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            Page::where('is_default_not_found',true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }
















    public function render()
    {
        return view('livewire.pages-create-process');
    }
}
