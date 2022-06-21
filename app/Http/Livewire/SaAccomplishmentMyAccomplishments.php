<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Storage;

use App\Models\User;
use App\Models\OrganizationAsset;
use App\Models\Organization;
use App\Models\Article;
use App\Models\StudentAccomplishment;

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
class SaAccomplishmentMyAccomplishments extends Component
{
    use WithPagination;
    private $organizationID;
    private $organizationData;

    public function get_data_from_db(){
        return StudentAccomplishment::with('reviewer')
        // dd(
        //  StudentAccomplishment::with('reviewer')
                // ->where('user_id', Auth::id())
                ->orderBy('created_at', 'DESC')
                // ->paginate(30, ['*'], 'myAccomplishments')
                ->paginate(30, ['*'], 'myAccomplishments');
        // );
    }
    public function render()
    {
        return view('livewire.sa-accomplishment-my-accomplishments',[
            'list_data_from_db' => $this->get_data_from_db(),
        ]);
    }
}
