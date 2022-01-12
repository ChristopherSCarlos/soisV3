<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;

use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;
use Illuminate\Support\Facades\DB;


class Pages extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $updatemodalFormVisible = false;
    public $modelConfirmDeleteVisible = false;
    public $modalSetHomepageFormVisible = false;
    public $modalSetErrorPageFormVisible = false;
    public $InformationBox = false;


    public $modelId;
    public $slug;
    public $title;
    public $content;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    public $status;

    public $isSetHomepage;
    public $isSetErrorPage;

    private $selectedPageDate;
    public $selectedPageID;

    public $data;


    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages','slug')->ignore($this->modelId)],
            'content' => 'required',
        ];
    }

    public function mount()
    {
        $this->resetPage();
    }

    public function updatedtitle($value)
    {
        // $this->slug = $value;
        $this->slug = Str::slug($value);
    }

    // public function generateSlug($value)
    // {
    //     $process1 = str_replace(' ', '-',$value);
    //     $process2 = strtolower($process1);
    //     $this->slug = $process2;
    // }

    public function create()
    {
        // dd($this);
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
        $this->status = 1;
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset(); 
        $this->resetValidation(); 
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


    public function createShowModel()
    {
        return redirect('/system-pages/create-system-page');
    }


    

    public function update()
    {
        // dd($this);
        // $this->validate(); 
        // $this->unassignedDefaultHomePage(); 
        // $this->unassignedDefaultNotFoundPage(); 
        Page::find($this->modelId)->update($this->modelData());
        $this->status = 1;
        // DB::table('pages')->where('pages_id','=',$this->modelId)->update($this->modelData());
        $this->updatemodalFormVisible = false;
        $this->reset();
    }

    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->loadModel();
        $this->updatemodalFormVisible = true;
        // dd($this->content);
        // $this->modelId = $id;
        // $this->selectedPageID = $this->modelId;
        // // dd($this->selectedPageID);
        // $this->selectedPageDate = DB::table('pages')->where('pages_id','=',$this->selectedPageID)->first();
        // dd($this->selectedPageDate->title);
        // return redirect('/system-pages/update-system-page');
        // return redirect()->route('system-pages/update-system-page', ['pages_id' => $this->modelId]);
        // return redirect()->route('/system-pages/update-system-page')->with('pages_id',$this->modelId);
        // return view('livewire.pages-update-process',compact('selectedPageDate'));
        // return view('livewire.pages-update-process');
        
    }
    public function getSelectedorganization()
    {
        $this->selectedPageID = $this->modelId;
        $this->selectedPageDate = DB::table('pages')->where('pages_id','=',$this->selectedPageID)->first();
        // dd($this->selectedPageDate);
        // $this->selectedPageDate = Page::find($this->selectedPageID)->first();
        // dd($this->selectedPageDate);
        // dd('Hello');
        return $this->selectedPageDate;
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

    public function loadModel()
    {
        $this->data = Page::find($this->modelId);
        // dd($this->data->content);
        $this->title = $this->data->title;
        $this->slug = $this->data->slug;
        $this->content = $this->data->content;
        // $this->isSetToDefaultHomePage = !$data->is_default_home ? null:true;
        // $this->isSetToDefaultHomePage = !$data->is_default_not_found ? null:true;
    }


    public function deleteShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->delete();
        $this->modelConfirmDeleteVisible = true;
    }

    public function delete()
    {
        $this->status = '0';
        DB::table('pages')->where('pages_id','=',$this->modelId)->update(['status'=>"0"]);
        $this->modelConfirmDeleteVisible = false;
        // $this->resetPage();

        $this->reset();
        $this->resetValidation();
    }




    /*=============================================================
    =            Set as Homepage Section comment block            =
    =============================================================*/
    public function setAsHomepage($id)
    {
        $this->modelId = $id;
        $this->modalSetHomepageFormVisible =true;
    }
    public function setHomepage()
    {
        $this->isSetHomepage = Page::find($this->modelId);
        if ($this->isSetHomepage != null) {
            Page::where('is_default_home',true)->update([
                'is_default_home' => false,
            ]);
            DB::table('pages')->where('pages_id','=',$this->isSetHomepage->pages_id)->update(['is_default_home'=>"1"]);
            $this->modalSetHomepageFormVisible = false;
            $this->reset();
            $this->resetValidation();
        }else{
            dd("HEllo");
        }
        // dd($this->isSetHomepage);
        $this->reset();
        $this->resetValidation();
    }    
    /*=====  End of Set as Homepage Section comment block  ======*/
    
    /*==============================================================
    =            Set as Error PageSection comment block            =
    ==============================================================*/
    public function setAsErrorPage($id)
    {
        $this->modelId = $id;
        $this->modalSetErrorPageFormVisible = true;
    }
    public function setErrorPage()
    {
        $this->isSetErrorPage = Page::find($this->modelId);
        if ($this->isSetErrorPage != null) {
            Page::where('is_default_not_found',true)->update([
                'is_default_not_found' => false,
            ]);
            DB::table('pages')->where('pages_id','=',$this->isSetErrorPage->pages_id)->update(['is_default_not_found'=>"1"]);
            $this->modalSetHomepageFormVisible = false;
            $this->reset();
            $this->resetValidation();
        }else{
            dd("HEllo");
        }
        // dd($this->isSetHomepage);
        $this->reset();
        $this->resetValidation();
    }
    
    public function infoShowModel()
    {
        $this->InformationBox = true;
    }
    
    /*=====  End of Set as Error PageSection comment block  ======*/
    
    public function read()
    {
        return Page::where('status','!=','1')->paginate(5);
    }
    public function ggetDBData()
    {
        return DB::table('pages')->where('status','!=','0')->paginate(5);
    }

    // liveware data rendering
    public function render()
    {
        return view('livewire.pages',[
            'data' => $this->read(),
            'getData' => $this->ggetDBData(),
        ]);
    }
}