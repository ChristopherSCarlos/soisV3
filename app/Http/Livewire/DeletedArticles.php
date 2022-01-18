<?php

namespace App\Http\Livewire;

use Auth;

use Livewire\Component;
use App\Models\Article;
use App\Models\User;

use Illuminate\Validation\Rule;
use Livewire\withPagination;

use Illuminate\Support\STR;
use Illuminate\Support\Facades\DB;

class DeletedArticles extends Component
{

    public $modelId;
    public $userId;
    public $articleId;
    public $userData;
    public $userRoles;
    public $userRolesString;
    public $slug;
    public $title;
    public $content;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    public $status;
    public $data;

    public $isSetHomepage;
    public $isSetErrorPage;

    /*=======================================
    =            Restore Article            =
    =======================================*/
    
    public function restore($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->articleId = $id;


        $this->data = Article::find($this->articleId);
        $this->status = $this->data->status;

        Article::where('articles_id',$this->articleId)->update([
            'status' => '1',
        ]);
    }
    
    /*=====  End of Restore Article  ======*/
    
    /*=====================================
    =            Get User Role            =
    =====================================*/
    
    public function getUserRole()
    {
        $this->userId = Auth::id();
        // dd($this->userId);
        // dd($this->articleCreatedDataId);
        $this->userData = User::find($this->userId);
        $this->userRoles = $this->userData->roles->first();
        $this->userRolesString = $this->userRoles->role;
        // dd($this->userRolesString);
        // dd(gettype($this->userRolesString));
        return $this->userRolesString;
    }
    
    /*=====  End of Get User Role  ======*/
    

    /*=================================================
    =            Get Deleted Articles Data            =
    =================================================*/
    
    public function getArticleTableData()
    {
        $this->userId = Auth::user()->users_id;
        // dd($this->userId);
        return DB::table('articles')
           ->where('status','=','0')
           ->paginate(5);
    }
    
    /*=====  End of Get Deleted Articles Data  ======*/
    


    public function render()
    {
        return view('livewire.deleted-articles',[
            'deletedarticleDatas' => $this->getArticleTableData(),
            'articleDataController' => $this->getUserRole(),
        ]);
    }
}
