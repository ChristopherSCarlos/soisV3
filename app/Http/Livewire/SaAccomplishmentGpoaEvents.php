<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Storage;

use App\Models\User;
use App\Models\OrganizationAsset;
use App\Models\Organization;
use App\Models\Article;
use App\Models\Event;

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
class SaAccomplishmentGpoaEvents extends Component
{
     use WithPagination;
    private $organizationID;
    private $organizationData;

    public function get_data_from_db()
    {
        $this->organizationData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->organizationID = $this->organizationData->organization_id;
        // dd(
            // DB::table('upcoming_events')
            return DB::table('upcoming_events')
            ->whereNull('accomplished_event_id')
            // ->where('organization_id', $this->organizationID)
            ->where('advisers_approval', 'approved')
            ->where('studAffairs_approval', 'approved')
            ->where('completion_status', 'accomplished')
            ->paginate(30, ['*'], 'accomplishedEvents');
            // ->paginate(30, ['*'], 'accomplishedEvents')
            // ->get()
        // );
    }
    public function render()
    {
        return view('livewire.sa-accomplishment-gpoa-events',[
            'list_data_from_db' => $this->get_data_from_db(),
        ]);
    }
}
