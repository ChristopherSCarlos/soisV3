<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Storage;

use App\Models\User;
use App\Models\OrganizationAsset;
use App\Models\Organization;
use App\Models\Article;
use App\Models\PositionTitle;

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
use Illuminate\Database\Eloquent\Builder;

class SaAccomplishmentOfficersSignature extends Component
{
     use WithPagination;

    private $orgData;
    private $orgID;

    public function get_data_from_db()
    {
        $this->orgData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->orgID = $this->orgData->organization_id; 
        // dd($this->orgID);
        // dd(DB::table('role_user')->where('user_id','=',Auth::id())->first());
        
        // dd(
        return PositionTitle::with(['officers' => function($query){
         // PositionTitle::with(['officers' => function($query){
                $query->where('status', 1);}])
            ->whereHas('positionCategory', function(Builder $query){
                $query->whereIn('position_category', ['President', 'Documentation']);
            })
            ->where('organization_id', '=', $this->orgID)
            ->paginate(5); 
            // ->get()
        // );
        // dd(
        //     PositionTitle::where('officers')->where('status','=',1)->get()
        // );
    }
    public function render()
    {
        return view('livewire.sa-accomplishment-officers-signature',[
            'list_data_from_db' => $this->get_data_from_db(),
        ]);
    }
}
