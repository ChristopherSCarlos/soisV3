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
class ArStudentAccomplishments extends Component
{
    use WithPagination;
    private $organizationID;
    private $organizationData;

    public function get_data_from_db()
    {
        $this->organizationData = DB::table('role_user')->where('user_id','=',Auth::id())->first();
        $this->organizationID = $this->organizationData->organization_id;

        // dd(
            // DB::table('student_accomplishments')
           return  DB::table('student_accomplishments')
            // StudentAccomplishment::with('reviewer')
                ->where('user_id', Auth::id())
                ->orderBy('created_at', 'DESC')
                ->paginate(30, ['*'], 'myAccomplishments');
                // ->get()
        // );
    }

    public function render()
    {
        return view('livewire.ar-student-accomplishments',[
            'list_data_from_db' => $this->get_data_from_db(),
        ]);
    }
}
