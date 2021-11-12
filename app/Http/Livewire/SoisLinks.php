<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\SoisLink;

use Livewire\withPagination;
use Illuminate\Support\Facades\DB;

class SoisLinks extends Component
{
    /* Traits */
    use withPagination;
    /* Modals */
    public $modalCreateUpdateSOISLinksFormVisible = false;
    public $modalDeleteSOISLinksFormVisible = false;
    public $soisLinksInformationBox = false;

    /* Variables */
    public $link_name;
    public $link_description;
    public $external_link;
    public $status;
    public $soisLinkID;
    public $soisLinkData;
    

    
    /*====================================================
    =            Craete Section comment block            =
    ====================================================*/
    public function createSOISLinksModel()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCreateUpdateSOISLinksFormVisible = true;
    }
    public function create()
    {
        $this->status ='1';
        SoisLink::create($this->soisLinksModel());
        $this->modalCreateUpdateSOISLinksFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of Craete Section comment block  ======*/

    /*===============================================================
    =            Update SOIS Links Section comment block            =
    ===============================================================*/
    public function updateSOISLinkShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->soisLinkID = $id;
        $this->loadSoisLinksModel();
        $this->modalCreateUpdateSOISLinksFormVisible = true;
    }
    public function update()
    {
        $this->status = '1';
        SoisLink::find($this->soisLinkID)->update($this->soisLinksModel());
        $this->modalCreateUpdateSOISLinksFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of Update SOIS Links Section comment block  ======*/
    
    /*===============================================================
    =            Delete SOIS Links Section comment block            =
    ===============================================================*/
    public function deleteSOISLinkShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->soisLinkID = $id;
        $this->modalDeleteSOISLinksFormVisible = true;
    }
    public function delete()
    {
        SoisLink::find($this->soisLinkID)->update(['status'=>false]);
        $this->modalCreateUpdateSOISLinksFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    /*=====  End of Delete SOIS Links Section comment block  ======*/
    

    public function infoShowModel()
    {
        $this->soisLinksInformationBox = true;
    }

    public function loadSoisLinksModel()
    {
        $this->soisLinkData = SoisLink::find($this->soisLinkID);
        $this->link_name = $this->soisLinkData->link_name;
        $this->link_description = $this->soisLinkData->link_description;
        $this->external_link = $this->soisLinkData->external_link;
        $this->status = $this->soisLinkData->status;
    }
    public function soisLinksModel()
    {
        return [
            'link_name' => $this->link_name,
            'link_description' => $this->link_description,
            'external_link' => $this->external_link,
            'status' => $this->status,
        ];
    }
    public function read()
    {
        return SoisLink::where('status','=','1')->get();
    }

    public function render()
    {
        return view('livewire.sois-links',[
            'getDisplaySOISLIinks' => $this->read(),
        ]);
    }
}
