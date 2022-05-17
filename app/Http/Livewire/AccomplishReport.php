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

class AccomplishReport extends Component
{
    use WithPagination;
    public $modalViewReportFormVisible = false;

    public $AR_Id;

    public function viewReport($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->modalViewReportFormVisible = true;
        $this->AR_Id = $id;
        // dd($this->AR_Id);
    }
    public function selectedARReport()
    {
        // dd($this->AR_Id);
        // https://sois-ar.puptaguigcs.net/admin/events/jma
        // echo $this->AR_Id
        return DB::table('accomplishment_reports')->where('accomplishment_report_id','=',$this->AR_Id)->get();
    }

    public function SuperAdminAccomplishReportList()
    {
        return DB::table('accomplishment_reports')->orderBy('accomplishment_report_id','desc')->paginate(5);
    }

    public function getAccomplishmentReportButton()
    {
        // dd(DB::table('sois_sub_gates')->where('sub_name','=','Accomplishment Reports Menu')->get());
        return DB::table('sois_sub_gates')->where('sub_name','=','Accomplishment Reports Menu')->get();
    }

    public function render()
    {
        return view('livewire.accomplish-report',[
            'SA_AccomplishReport' => $this->SuperAdminAccomplishReportList(),
            'selectedReport' => $this->selectedARReport(),
            'AR_report_bt' => $this->getAccomplishmentReportButton(),
        ]);
    }
}
