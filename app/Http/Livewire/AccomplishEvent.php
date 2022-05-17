<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Storage;

use App\Models\User;
use App\Models\OrganizationAsset;
use App\Models\Organization;
use App\Models\Article;
use App\Models\Announcement;

use Livewire\WithPagination;
use App\Http\Livewire\Objects;
use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;
use Datetime;
use DatePeriod;
use DateInterval;

class AccomplishEvent extends Component
{
    use WithPagination;

    public $modalViewEventFormVisible = false;

    public $event_id;
    public $event_data;

    public function viewEvent($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->modalViewEventFormVisible = true;
        $this->event_id = $id;
    }

    public function getSelectedEventCategory()
    {
        return DB::table('event_categories')->where('event_category_id','=',$this->event_id)->get();
    }

    public function getSelectedOrganization()
    {
        // $this->event_data = DB::table('accomplished_events')->where('accomplished_event_id','=',$this->event_id)->get();
        // echo $this->event_data;
        return DB::table('organizations')->where('organization_id','=',$this->event_id)->get();
    }

    public function showSelectedAccomplishEventDataFromDB()
    {
        return DB::table('accomplished_events')->where('accomplished_event_id','=',$this->event_id)->get();
    }

    public function getAccomplishEventDataFromDB()
    {
        return DB::table('accomplished_events')->orderBy('accomplished_event_id','desc')->paginate(5);
    }

    public function render()
    {
        return view('livewire.accomplish-event',[
            'listAccomplishEventData' => $this->getAccomplishEventDataFromDB(),
            'showSelectedAccomplishEventData' => $this->showSelectedAccomplishEventDataFromDB(),
            'showSelectedOrganization' => $this->getSelectedOrganization(),
            'showSelectedEventCategories' => $this->getSelectedEventCategory(),
        ]);
    }
}
