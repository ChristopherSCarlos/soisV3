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

use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;

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
    public $org_social_name;

    private $data;


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
        // dd($this);
        $this->validate([
            'embed_data' => 'required',
        ]);
        // echo $this->org_social_link;
        // echo $this->embed_data;
        // echo $this->org_socials_id;
        $this->organizationData = new Objects();
        $this->organizationID = $this->organizationData->userOrganization(); 
        // dd($this->organizationID);

        $embed_data = $this->embed_data;
        $dom = new \DomDocument();
        $dom->loadHtml($embed_data, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
        $embed_data = $dom->saveHTML();

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
            'social_name' => $this->org_social_name,
        ];
    }
    
    /*=====  End of Create Social Media Section comment block  ======*/
    

    public function updateSocialMediaShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->org_socials_id = $id;
        $this->loadModel();
        $this->modalCreateSNSFormVisible = true;
    }

    public function loadModel()
    {
        $this->data = OrgSocial::find($this->org_socials_id);
        $this->org_social_link = $this->data->org_social_link;
        $this->organizationID = $this->data->organizationID;
        $this->status = $this->data->status;
        $this->embed_data = $this->data->embed_data;
        $this->org_socials_id = $this->data->org_socials_id;
        $this->org_social_name = $this->data->social_name;
    }
    public function updateModelData()
    {
        return [
            'org_social_link' => $this->org_social_link,
            'organization_id' => $this->organizationID,
            'status' => $this->status,
            'embed_data' => $this->embed_data,
            'social_id' => $this->org_socials_id,
            'social_name' => $this->org_social_name,
        ];
    }

    public function update()
    {
        // dd($this);
        $this->organizationData = new Objects();
        $this->organizationID = $this->organizationData->userOrganization(); 
        $this->status = 1;
        OrgSocial::find($this->org_socials_id)->update($this->createModel());
        // $this->syncUpdateArticleOrganization();
        $this->modalCreateSNSFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }

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

    /**
     *
     * Get Organiaion Socials
     *
     */
    public function getOrganizationSocialsDataFromDB()
    {
        // dd(OrgSocial::where('organization_id','=',$this->organizationID)->get());
        return OrgSocial::where('organization_id','=',$this->organizationID)->where('status','=','1')->get();
    }

    public function render()
    {
        return view('livewire.org-socials',[
            'getOrganization' => $this->getOrganizationDataFromDB(),
            'getSocial' => $this->getSocialMediaDataFromDB(),
            'getOrganizationSocialData' => $this->getOrganizationSocialsDataFromDB(),
        ]);
    }
}
