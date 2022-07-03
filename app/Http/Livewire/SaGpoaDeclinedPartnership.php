<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use Illuminate\Support\STR;

use Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;
use Datetime;
use DatePeriod;
use DateInterval;
class SaGpoaDeclinedPartnership extends Component
{
    use WithPagination;

    private $userData;
    private $user_Org_Id;
    private $user_Role_Id;
    private $user_Org_data;
    private $user_Role_data;

    public function get_ata_from_Db()
    {
        $this->userData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->user_Org_Id = $this->userData->organization_id;
        $this->user_Role_Id = $this->userData->role_id;

        $this->user_Role_data = DB::table('roles')->where('role_id','=',$this->userData->role_id)->first();
        if ($this->user_Role_data->role == 'Super Admin') {
            return DB::table('partnership_requests')
                ->join('upcoming_events','upcoming_events.upcoming_event_id','=','partnership_requests.event_id')
                ->join('organizations','organizations.organization_id','=','upcoming_events.organization_id')
                ->where('request_status','=','declined')
                ->where('request_by',2)->paginate(5);
                             // ->where('request_by',2)->get()
        }else{
            echo "Hello ";
        }

        // dd($this->user_Role_data->role);
        // dd($this->user_Role_Id);

    }
    public function render()
    {
        return view('livewire.sa-gpoa-declined-partnership',[
            'listDataFromDB' => $this->get_ata_from_Db(),
        ]);
    }
}
