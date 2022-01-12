<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Tag;

use Livewire\withPagination;
use Illuminate\Support\Facades\DB;

use Auth;

class Tags extends Component
{
    /* Traits */
    use withPagination;

    /* Modals */
    public $modalCreateTagsFormVisible = false;
    public $modalUpdateTagsFormVisible = false;
    public $modalDeleteTagsFormVisible = false;
    
    /* variables */
    public $tagName;
    public $tagDescription;
    public $tagType;

    public $userId;
    public $tagsId;
    public $tagData;

    public $link = "https://getbootstrap.com/";


    /*=========================================================
    =            Create Tags Section comment block            =
    =========================================================*/
    public function createTags()
    {
        $this->reset();
        $this->resetValidation();
        $this->modalCreateTagsFormVisible = true;
    }
    public function create()
    {
        $this->userId = Auth::user()->user_id;
        Tag::create($this->uploadTagsModel());
        $this->modalCreateTagsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    public function uploadTagsModel()
    {
        return [
            'tags_name' => $this->tagName,
            'tags_description' => $this->tagDescription,
            'tags_type' => $this->tagType,
            'user_id' => $this->userId,
            'status' => '1',
        ];
    }    
    
    /*=====  End of Create Tags Section comment block  ======*/
    
    /*=========================================================
    =            Update Tags Section comment block            =
    =========================================================*/
    public function updateShowModal($id)
    {
        $this->tagsId = $id;
        $this->modalUpdateTagsFormVisible = true;
        $this->updateloadModel();
    }
    public function update()
    {
        Tag::find($this->tagsId)->update($this->uploadEventModel());
        $this->modalUpdateTagsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    public function updateloadModel()
    {
        $this->tagData = Tag::find($this->tagsId);
        $this->tagName = $this->tagData->tags_name;
        $this->tagDescription = $this->tagData->tags_description;
        $this->tagType = $this->tagData->tags_type;
    }
    
    public function uploadEventModel()
    {
        return [
            'tags_name' => $this->tagName,
            'tags_description' => $this->tagDescription,
            'tags_type' => $this->tagType,
        ];
    }
    /*=====  End of Update Tags Section comment block  ======*/
    
    /*=========================================================
    =            Delete Tags Section comment block            =
    =========================================================*/
    public function deleteShowModal($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->tagsId = $id;
        $this->modalDeleteTagsFormVisible = true;
    }
    public function delete()
    {
        Tag::find($this->tagsId)->update($this->deleteModel());
        $this->modalDeleteTagsFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    public function deleteModel()
    {
        return [
            'status' => '0',
        ];
    }
    
    
    /*=====  End of Delete Tags Section comment block  ======*/
    


    /**
     *
     * Get Tags Data from Database
     *
     */
    public function getTagsDataFromDatabase()
    {
        return DB::table('tags')->where('status','=','1')->orderBy('tags_id','asc')->paginate(5);
    }


    public function rules()
    {
        return [
            'tags_name' => 'required',
            'tags_description' => 'required',
            'tags_type' => 'required',
            'status' => 'required',
        ];
    }

    public function opentab()
    {
        dd("hello");
    }

    public function render()
    {
        return view('livewire.tags',[
            'getTags' => $this->getTagsDataFromDatabase(),
        ]);
    }
}
