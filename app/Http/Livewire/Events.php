<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\Organization;
use App\Models\SystemAsset;
use App\Models\User;

use Livewire\withPagination;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

use Intervention\Image\ImageManager;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;

use Auth;
// class Events extends Component
class Events extends LivewireDatatable
{
    // traits
    use withPagination;
    use WithFileUploads;    


    // modals
    public $createEventsShowModalFormVisible = false;
    public $updateEventsShowModalFormVisible = false;
    public $deleteEventsShowModalFormVisible = false;
    public $updateEventImageShowModalFormVisible = false;
    
    // variables
    public $userId;
    public $eventId;
    public $status;
    public $data;

    public $semester;
    public $school_year;
    public $course;
    public $organization;
    public $date;
    public $time;
    public $name_of_activity;
    public $objectives;
    public $participants;
    public $sponsor;
    public $venue;
    public $type_of_activity;
    public $projected_budget;
    public $isEventFeat;

    public $event_image;

    public $asset_type_id;
    public $asset_name;
    public $is_latest_logo;
    public $is_latest_banner;
    public $user_id;
    public $page_type_id;
    public $organization_id;
    public $asset_status;
    public $fileNameEventImage;

    public $selectedEventsAssetDataIsLatestImage;
    public $selectedDataAssetDataID;

    public $model = Event::class;
    public $exportable = true;
    public $hideable = 'select';

    /*======================================
    =            Events Section            =
    ======================================*/
    
    public function columns()
    {
        return [
            NumberColumn::name('event_id')
                ->label('ID')
                ->defaultSort('asc')
                ->filterable()
                ->sortBy('event_id'),

            Column::name('semester')
                ->label('Semester')
                ->filterable()
                ->editable()
                ->searchable(),

            Column::name('school_year')
                ->label('School Year')
                ->filterable()
                ->editable()
                ->searchable(),

            Column::name('course')
                ->label('Course')
                ->filterable()
                ->editable()
                ->searchable(),

            Column::name('organization')
                ->label('Organization')
                ->filterable()
                ->editable()
                ->searchable(),

            DateColumn::name('date')
                ->label('Date')
                ->editable()
                ->filterable(),

            DateColumn::name('end_date')
                ->label('End Date')
                ->editable()
                ->filterable(),

            TimeColumn::name('time')
                ->label('Time')
                ->editable()
                ->filterable(),

            Column::name('name_of_activity')
                ->label('Activity Name')
                ->filterable()
                ->editable()
                ->searchable(),

            Column::name('objectives')
                ->label('Objectives')
                ->filterable()
                ->editable()
                ->searchable(),

            NumberColumn::name('participants')
                ->label('No. of Participants')
                ->filterable()
                ->editable()
                ->searchable(),

            Column::name('sponsor')
                ->label('Sponsor')
                ->filterable()
                ->editable()
                ->searchable(),

            Column::name('venue')
                ->label('Venue')
                ->filterable()
                ->editable()
                ->searchable(),

            Column::name('type_of_activity')
                ->label('Type of Activity')
                ->filterable()
                ->editable()
                ->searchable(),

            Column::name('projected_budget')
                ->label('Projected Budget')
                ->filterable()
                ->editable()
                ->searchable(),

            Column::name('user_id')
                ->label('User Id')
                ->filterable()
                ->searchable(),

            Column::name('organization_id')
                ->label('Organization Id')
                ->filterable()
                ->searchable(),

            BooleanColumn::name('isEventFeat')
                ->label('Featured')
                ->editable()
                ->filterable(),

            BooleanColumn::name('status')
                ->label('Status')
                ->editable()
                ->filterable(),

        ];
    }
    
    /*=====  End of Events Section  ======*/
    

    /*=============================================
    =            crete Events comment block            =
    =============================================*/
    public function createEvetnsShowModel()
    {
        $this->reset();
        $this->resetValidation();
        $this->createEventsShowModalFormVisible = true;
    }
    public function create()
    {
        $this->userId = Auth::user()->users_id;
        Event::create($this->uploadEventModel());
        $this->createEventsShowModalFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of crete Events comment block  ======*/

    /*==================================================
    =            Update Event comment block            =
    ==================================================*/
    public function updateEventsModel($id)
    {
        $this->userId = Auth::user()->id;
        $this->eventId = $id;
        $this->updateEventsShowModalFormVisible = true;
        $this->loadEventModel($this->eventId);
        // dd($this->loadEventModel($this->eventId));
    }
    public function update()
    {
        Event::find($this->eventId)->update($this->updateEventModel());
        $this->updateEventsShowModalFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    /*=====  End of Update Event comment block  ======*/
    
    /*=========================================================
    =            Delete EventSection comment block            =
    =========================================================*/
    // public function deleteEventsModal($id)
    // {
    //     $this->eventId = $id;
    //     $this->deleteEventsShowModalFormVisible = true;
    // }
    // public function delete()
    // {
    //     Event::find($this->eventId)->update($this->deleteEventModel());
    //     $this->updateEventsShowModalFormVisible = false;
    //     $this->reset();
    //     $this->resetValidation();
    // }
    /*=====  End of Delete EventSection comment block  ======*/











     /*=========================================================
    =            Event Model Section comment block            =
    =========================================================*/
    /**
     *
     * UPLOAD EVENT MODEL
     *
     */
    public function deleteEventModel()
    {
        return [
            'status' => "0",
        ];
    }
    public function uploadEventModel()
    {
        return [
            'user_id' => $this->userId,
            'status' => $this->status,
            'semester' => $this->semester,
            'school_year' => $this->school_year,
            'course' => $this->course,
            'organization' => $this->organization,
            'date' => $this->date,
            'time' => $this->time,
            'name_of_activity' => $this->name_of_activity,
            'objectives' => $this->objectives,
            'participants' => $this->participants,
            'sponsor' => $this->sponsor,
            'venue' => $this->venue,
            'type_of_activity' => $this->type_of_activity,
            'projected_budget' => $this->projected_budget,
            'isEventFeat' => $this->isEventFeat,
            'status' => "1",
        ];
    }
    public function updateEventModel()
    {
        return [
            'status' => $this->status,
            'semester' => $this->semester,
            'school_year' => $this->school_year,
            'course' => $this->course,
            'organization' => $this->organization,
            'date' => $this->date,
            'time' => $this->time,
            'name_of_activity' => $this->name_of_activity,
            'objectives' => $this->objectives,
            'participants' => $this->participants,
            'sponsor' => $this->sponsor,
            'venue' => $this->venue,
            'type_of_activity' => $this->type_of_activity,
            'projected_budget' => $this->projected_budget,
            'isEventFeat' => $this->isEventFeat,
        ];
    }
    public function loadEventModel($id)
    {
        $this->eventId = $id;
        $this->data = Event::find($this->eventId);
        $this->userId = $this->data->userId;
        $this->status = $this->data->status;
        $this->semester = $this->data->semester;
        $this->school_year = $this->data->school_year;
        $this->course = $this->data->course;
        $this->organization = $this->data->organization;
        $this->date = $this->data->date;
        $this->time = $this->data->time;
        $this->name_of_activity = $this->data->name_of_activity;
        $this->objectives = $this->data->objectives;
        $this->participants = $this->data->participants;
        $this->sponsor = $this->data->sponsor;
        $this->venue = $this->data->venue;
        $this->type_of_activity = $this->data->type_of_activity;
        $this->projected_budget = $this->data->projected_budget;
        $this->isEventFeat = $this->data->isEventFeat;
    }
    /*=====  End of Event Model Section comment block  ======*/


    public function addImageToEvent($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->eventId = $id;
        $this->updateEventImageShowModalFormVisible = true;
    }
    public function updateEventImage()
    {
         $this->validate([
            'event_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100048',
        ]);
        // dd($this->event_image);

        $this->fileNameEventImage = time().'.'.$this->event_image->extension();  
       
        $this->event_image->store('files', 'imgfolder',$this->fileNameEventImage);

        $this->event_image->storeAs('files',$this->fileNameEventImage, 'imgfolder');
        
        $this->asset_name = $this->fileNameEventImage;

        $this->user_id = Auth::id();
        // $this->latestOrganizationID = DB::table('organizations')->latest('organizations_id')->first();
        // $this->latestOrganizationIDtoInsertToDB = $this->latestOrganizationID->organizations_id;
        
        /* Get User ID */
        // $this->userDataPivot = User::find(Auth::id());
        /* Get Organization ID from pivot table using USER ID */
        // $this->userDataPivotOrganization = $this->userDataPivot->organizations->first();
        // $this->latestOrganizationIDtoInsertToDB = $this->userDataPivotOrganization->organizations_id;
        /* Asset Status is set to true */
        $this->asset_status = 1;
        /* Asset Type is set to Logo (Logo is 1 in Asset types table) */
        $this->asset_type_id = 2;
        /* Set image as latest organization asset logo */
        $this->is_latest_logo = 0;
        /* Unset image as image banenr */
        $this->is_latest_banner = 0;
        /* Page Type is set to Organization (Organization is id 4 in pagetypes table) */
        $this->page_type_id = 2;
        // $this->events_id = 1;

        // SystemAsset::create([
        //     'asset_type_id' => $this->asset_type_id,
        //     'asset_name' => $this->fileNameEventImage,
        //     'is_latest_logo' => false,
        //     'is_latest_banner' => false,
        //     'user_id' => $this->user_id,
        //     'page_type_id' => $this->page_type_id,
        //     'status' => $this->asset_status,
        //     'is_latest_image' => '1',
        //     'events_id' => $this->eventId,
        // ]);
        
        $this->selectedEventsAssetDataIsLatestImage = SystemAsset::latest()->where('events_id','=',$this->eventId)->where('status','=','1')->first();
        // dd($this->selectedEventsAssetDataIsLatestImage);
        // dd($this->selectedEventsAssetDataIsLatestImage);
        if ($this->selectedEventsAssetDataIsLatestImage != null) {
            $this->selectedDataAssetDataID = $this->selectedEventsAssetDataIsLatestImage->system_assets_id;
            // dd($this->selectedDataAssetDataID);
            // dd(SystemAsset::find('organization_id','=',$this->modelId)->where('is_latest_logo','=','1'));
            SystemAsset::where('events_id','=',$this->eventId)->where('is_latest_image','=','1')->update([
                'is_latest_image' => '0',
            ]);
            DB::table('system_assets')->where('system_assets_id','=',$this->selectedDataAssetDataID)->update(['is_latest_image'=>"1"]);
            $this->updateEventImageShowModalFormVisible = false;
            $this->reset();
            $this->resetValidation();
        }else{
            $this->updateEventImageShowModalFormVisible = false;
            $this->reset();
            $this->resetValidation();
        }
        $this->updateEventImageShowModalFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }






    /**
     *
     * GET ORGANIZATION DATA
     *
     */
    public function organizationDataDatabase()
    {
        return DB::table('organizations')->orderBy('organizations_id','asc')->get();
    }
    /**
     *
     * GET EVENT DATA 
     *
     */
    public function eventDataDatabase()
    {
        return Event::where(['status' => 1, 'user_id' => Auth::user()->users_id,])->paginate(10);
    }
//     public function render()
//     {
//         return view('livewire.events',[
//             'getEventDataFromDB' => $this->eventDataDatabase(),
//             'getOrganizationtDataFromDB' => $this->organizationDataDatabase(),
//         ]);
//     }
}
