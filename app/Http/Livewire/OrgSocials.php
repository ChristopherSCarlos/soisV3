<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\OrgSocial;
use App\Models\Organization;
use App\Models\User;
use App\Models\SocialMedia;

use App\Http\Livewire\Objects;

use Livewire\withPagination;
use Illuminate\Support\Facades\DB;

use Auth;

class OrgSocials extends Component
{
    /* Traits */
    use WithPagination;

    /* Modals */
    public $modalCreateSNSFormVisible = false;

    /* Variables */
    public $obj;

    public $userData;
    public $userID;
    public $userPivot;
    public $userOrganizationID;

    private $organizationData;
    private $organizationID;

    public $org_socials_id;
    public $organization_id;
    public $org_social_link;
    public $status;
    public $embed_data;
    public $social_id;



    public function mount()
    {
        $this->organizationData = new Objects();
        $this->organizationID = $this->organizationData->userOrganization(); 
    }

    /*=================================================================
    =            Create Social Media Section comment block            =
    =================================================================*/
    public function createSocialMediaLinks()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCreateSNSFormVisible = true;
        // dd($this->getOrganizationDataFromDB());
    }
    public function create()
    {
        // echo $this->org_social_link;
        // echo $this->embed_data;
        // echo $this->org_socials_id;
        $this->organizationData = new Objects();
        $this->organizationID = $this->organizationData->userOrganization(); 
        // dd($this->organizationID);
        $this->status = 1;
        OrgSocial::create($this->createModel());
        // dd($this->social_id);
        $this->modalCreateSNSFormVisible = true;
        $this->reset();
        $this->resetValidation();

    }
    public function createModel()
    {
        return [
            'org_social_link' => $this->org_social_link,
            'organization_id' => $this->organizationID,
            'status' => $this->status,
            'embed_data' => $this->embed_data,
            'social_id' => $this->org_socials_id,
        ];
    }
    
    /*=====  End of Create Social Media Section comment block  ======*/
    

    /**
     *
     * Get Organization Data
     *
     */
    public function getOrganizationDataFromDB()
    {
        return Organization::find($this->organizationID);
    }

    /**
     *
     * Get Social Media Data
     *
     */
    public function getSocialMediaDataFromDB()
    {
        return SocialMedia::get();
    }

    public function render()
    {
        return view('livewire.org-socials',[
            'getOrganization' => $this->getOrganizationDataFromDB(),
            'getSocial' => $this->getSocialMediaDataFromDB(),
        ]);
    }
}
