<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Page;
use App\Models\Organization;
use App\Models\Event;
use App\Models\User;
use App\Models\Article;
use App\Models\DefaultInterface;
use App\Models\NavigationMenu;
use Illuminate\Support\Facades\DB;

class Footers extends Component
{
    public function getPages()
    {
        return DB::table('navigation_menus')->where('is_footer','=','1')->get();
    }
    public function getSOISPages()
    {
        return DB::table('sois_links')->where('status','=','1')->get();
    }
    public function getNonAcademicOrganization()
    {
        return DB::table('organizations')->where('organization_type_id','=','2')->get();
    }
    public function getAcademicOrganization()
    {
        return DB::table('organizations')->where('organization_type_id','=','1')->get();
    }
    public function render()
    {
        return view('livewire.footers',[
            'displayPagesOnFooter' => $this->getPages(),
            'displaySOISPagesOnFooter' => $this->getSOISPages(),
            'displayNonAcademicOrganizationOnFooter' => $this->getNonAcademicOrganization(),
            'displayAcademicOrganizationOnFooter' => $this->getAcademicOrganization(),
        ]);
    }
}
