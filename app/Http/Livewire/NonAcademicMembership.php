<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;

use Livewire\WithPagination;
use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NonAcademicMembership extends Component
{
    use WithPagination;

    public $modalSetTopNewsFormVisible = false;

    public $members_id;

    public function viewData($id)
    {
        $this->members_id = $id;
        

    }

    public function academicMembersData()
    {
        return DB::table('non_academic_members')->paginate(10);
    }
    public function render()
    {
        return view('livewire.non-academic-membership',[
            'displayAcademicMembers' => $this->academicMembersData(),
        ]);
    }
}
