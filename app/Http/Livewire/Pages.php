<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;

use App\Http\Livewire\Objects;

use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;
use Illuminate\Support\Facades\DB;

class Pages extends Component
{
    use WithPagination;
    public $modalFormVisible = false;
    public $modelConfirmDeleteVisible = false;
    public $modelId;
    public $slug;
    public $title;
    public $content;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;




    public function create()
    {
        $this->resetValidation();
        $this->validate(); 
        $this->unassignedDefaultHomePage(); 
        $this->unassignedDefaultNotFoundPage(); 
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset(); 
    }

    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];
    }


    public function createShowModel()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }


    public function read()
    {
        return PAge::paginate(5);
    }

    public function update()
    {
        $this->validate(); 
        $this->unassignedDefaultHomePage(); 
        $this->unassignedDefaultNotFoundPage(); 
        Page::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    public function updateModal()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ];
    }

    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        // dd($this->modelId);
        $this->modalFormVisible = true;
        
        $this->loadModel();
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
        $data = Page::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null:true;
        $this->isSetToDefaultHomePage = !$data->is_default_not_found ? null:true;
    }


    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modelConfirmDeleteVisible = true;
        $this->delete();
    }

    public function delete()
    {
        Page::destroy($this->modelId);
        $this->modelConfirmDeleteVisible = false;
        $this->resetPage();
        $this->reset();
    }





    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => 'required',
        ];
    }

    public function mount()
    {
        $this->resetPage();
    }

    public function updatedtitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function render()
    {
        return view('livewire.pages',[
            'data' => $this->read(),
        ]);
    }
}
