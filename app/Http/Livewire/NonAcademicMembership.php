<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\AssetType;
use App\Models\OrganizationAsset;
use App\Models\SystemAsset;
use App\Models\NonAcademicMember;

use Livewire\WithPagination;
use Illuminate\Support\STR;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;

class NonAcademicMembership extends LivewireDatatable
{
    use WithPagination;

    public $modalSetTopNewsFormVisible = false;

    public $members_id;

    public $model = NonAcademicMember::class;
    public $exportable = true;

    /*=========================================
    =            Join/Create Table            =
    =========================================*/

    public function builder()
    {
       return NonAcademicMember::query();
    }
    /*=====  End of Join/Create Table  ======*/
    
    /*=====================================
    =            Table Headers            =
    =====================================*/
    
    public function columns()
    {
        return[
            Column::name('first_name')
            ->label('First Name')
            ->filterOn('first_name')
            ->searchable()
            ->filterable(),

            Column::name('middle_name')
            ->label('Middle Name')
            ->filterOn('middle_name')
            ->searchable()
            ->filterable(),

            Column::name('last_name')
            ->label('Last Name')
            ->filterOn('last_name')
            ->searchable()
            ->filterable(),

            Column::name('organization')
            ->label('organization')
            ->filterOn('organization')
            ->searchable()
            ->filterable(),

            Column::name('student_number')
            ->label('Student Number')
            ->filterOn('student_number')
            ->searchable()
            ->filterable(),

            Column::name('course')
            ->label('course')
            ->filterOn('course')
            ->searchable()
            ->filterable(),

            Column::name('email')
            ->label('Email')
            ->filterOn('email')
            ->searchable()
            ->filterable(),

            Column::name('gender')
            ->label('Gender')
            ->filterOn('gender')
            ->searchable()
            ->filterable(),

            DateColumn::name('date_of_birth')
            ->label('Date Of Birth')
            ->searchable()
            ->filterable(),

            Column::name('control_number')
            ->label('Control Number')
            ->filterOn('control_number')
            ->searchable()
            ->filterable(),

            Column::name('address')
            ->label('Address')
            ->filterOn('address')
            ->searchable()
            ->filterable(),
        ];
    }

    // public function viewData($id)
    // {
    //     $this->members_id = $id;
        

    // }

    // public function academicMembersData()
    // {
    //     return DB::table('non_academic_members')->paginate(10);
    // }
    // public function render()
    // {
    //     return view('livewire.non-academic-membership',[
    //         'displayAcademicMembers' => $this->academicMembersData(),
    //     ]);
    // }
}
