<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;
use App\Models\AcademicMember;

use Livewire\WithPagination;
use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

class SaMemberMembership extends Component
{
    use WithPagination;

    private $organizationID;
    private $organizationData;
    public function academicMembership()
    {
        $this->organizationData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->organizationID = $this->organizationData->organization_id;
        // dd($this->organizationID); 
        // dd(DB::table('role_user')->where('user_id','=',Auth::id())->first());

        $this->organizationID = $this->organizationID = $this->organizationData->organization_id;

        // dd(
            return DB::table('academic_membership')
                                ->orderBy('academic_membership_id','DESC')
                                // ->get()
                                ->paginate(10);
        // );
    }

    public function render()
    {
        return view('livewire.sa-member-membership',[
            'ListAcads' => $this->academicMembership(),
        ]);
    }
}
