<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\NonAcademicMembership;

use Illuminate\Validation\Rule;
use Livewire\WithPagination;

use Illuminate\Support\STR;

use Storage;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use \Carbon\Carbon;
use Datetime;
use DatePeriod;
use DateInterval;

class SAPageIfNoData extends Component
{
    public $actual_link;
    public $exploded_link;
    public $HeaderVariable;
    public $title;
    public $button;

                // $button = "Click Here to Submit an Accomplishment",
    public function TitlePage()
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $exploded_link = explode("/", $actual_link);
        if ($exploded_link[3] = 'SAARSubmitAccomplishments') {
            return $title = "Submit Accomplishments";
        }
    }
    public function render()
    {
        return view('livewire.s-a-page-if-no-data',[
            'DisplayTitle' => $this->TitlePage(),
        ]);
    }
}
