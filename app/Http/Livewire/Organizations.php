<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Storage;

use App\Models\Organization;
use App\Models\User;

use Livewire\withPagination;

use Illuminate\Support\STR;

use Illuminate\Validation\Rule;

use Livewire\WithFileUploads;

use Intervention\Image\ImageManager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

class Organizations extends Component
{
    /* Traits */
    use WithPagination;
    use WithFileUploads;
    
    /* Modals */
    public $modalFormVisible = false;
    public $updatemodalFormVisible = false;
    public $updateImagemodalFormVisible = false;
    public $modelConfirmDeleteVisible = false;
    
    /* Variables */
    
    public $modelId;
    
    public $organization_name;
    public $organization_logo;
    public $organization_details;
    public $organization_primary_color;
    public $organization_secondary_color;
    public $organization_carousel_image_1;
    public $organization_carousel_image_2;
    public $organization_carousel_image_3;
    public $organization_slug;
    
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;

    public $content;

    public $featuredImage;
    public $title;

    public $authUser;
    public $OrgDataFromUser;
    public $user;
    public $userOrganization;
    public $orgCount = false;
    public $organizationUserData;
    public $orgUserId;

    public $authUserId;
    public $authUserData;
    public $authUserRole;
    public $authUserRoleType;
    public $status = '1';


    /**
     *
     * Organization Rules
     *
     */
    public function rules()
    {
        return [
            'organization_name' => 'required',
            'organization_details' => 'required',
            'organization_primary_color' => 'required',
            'organization_secondary_color' => 'required',
            'organization_slug' => 'required',
            'status' => 'required',
        ];
    }

    /*=================================================================
    =            Create Organization Section comment block            =
    =================================================================*/
    public function createOrganization()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    public function create()
    {
        $this->resetValidation();
        $this->validate(); 
        Organization::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset(); 
    }

    public function modelData()
    {
        return [
            'organization_name' => $this->organization_name,
            'organization_details' => $this->organization_details,
            'organization_primary_color' => $this->organization_primary_color,
            'organization_secondary_color' => $this->organization_secondary_color,
            'organization_slug' => $this->organization_slug,
            'status' => $this->status,
        ];
    }
    
    
    /*=====  End of Create Organization Section comment block  ======*/
    

    /*=================================================================
    =            Update Organization Section comment block            =
    =================================================================*/
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->updatemodalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    public function loadModel()
    {
        $data = Organization::find($this->modelId);
        $this->organization_name = $data->organization_name;
        $this->organization_details = $data->organization_details;
        $this->organization_primary_color = $data->organization_primary_color;
        $this->organization_secondary_color = $data->organization_secondary_color;
        $this->organization_slug = $data->organization_slug;
    }

    public function update()
    {
        $this->validate([
            'organization_name' => 'required',
            'organization_details' => 'required',
            'organization_primary_color' => 'required',
            'organization_secondary_color' => 'required',
            'organization_slug' => 'required',
        ]);
        Organization::find($this->modelId)->update($this->modelData());
        $this->updatemodalFormVisible = false;
    }
    
    
    /*=====  End of Update Organization Section comment block  ======*/
    
    /*=================================================================
    =            Delete Organization Section comment block            =
    =================================================================*/
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modelConfirmDeleteVisible = true;
    }

    public function delete()
    {
        Organization::find($this->modelId)->update(['status'=>'0']);
        $this->modelConfirmDeleteVisible = false;
        $this->resetPage();
    }
    
    
    /*=====  End of Delete Organization Section comment block  ======*/
    



    /**
     *
     * Get Organization Data from database
     *
     */
    public function getOrganizationData()
    {
        return Organization::paginate(5);
    }

    public function render()
    {
        return view('livewire.organizations',[
            'organizationData' => $this->getOrganizationData(),
        ]);
    }
}
