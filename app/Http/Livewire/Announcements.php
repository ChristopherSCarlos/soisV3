<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Storage;

use App\Models\User;
use App\Models\Organization;
use App\Models\Article;
use App\Models\Announcement;

use Livewire\withPagination;
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




class Announcements extends Component
{
    use WithPagination;
    use WithFileUploads;
    // modals
        public $modalCreateAnnouncementFormVisible = false;
        public $modalUpdateAnnouncementFormVisible = false;
        public $modalDeleteAnnouncementFormVisible = false;
        public $modalAddAnnouncementSliderFormVisible = false;
        public $modalViewAnnouncementsFormVisible = false;

    // variables
        public $announcement_id;
        public $announcementId;

        public $announcements_title;
        public $announcements_content;
        public $announcements_slug;
        public $signature;
        public $signer_position;
        public $exp_date;
        public $exp_time;
        public $user_id;
        public $status = true;

        public $date;
        private $data;
        public $param;

        public $currentDate;
        public $newDate;
        public $currentTime;

        public $checkCurrentTime;
        public $checkCurrentDate;
        public $dateArray = [];

        public $getAnnouncementDateFromDB;
        public $getExpiredAnnouncements;
        public $getExpiredAnnouncementsID;
        public $count = 0;
        public $time;
        public $dataArray = [];
        public $dataArrayTime = [];
        public $dateIDExpired = [];

        public $countDBTable;

        private $role;
        private $userData;
        private $userRoleData;
        private $userRole;

        private $object;
        private $user;
        private $va;
        private $v;
        private $roles;
        private $orgID;
        public $organizationDisplayID;




    /*==================================================================
    =            Create Announcements Section comment block            =
    ==================================================================*/
    public function createAnnouncement()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalCreateAnnouncementFormVisible = true;
    }
    public function createAnnouncementProcess()
    {
        $this->user_id = Auth::user()->user_id;
        $this->user = User::find($this->user_id);
        $this->announcements_slug = preg_replace('/\s+/', '_', $this->announcements_title);
        $this->v = $this->user->organizations->first();
        $this->orgID = $this->v->organization_id;
        $this->validate([
            'announcements_title' => 'required',
            'announcements_content' => 'required',
            'signature' => 'required',
            'signer_position' => 'required',
            'exp_date' => 'required',
            'exp_time' => 'required',
        ]);

        $announcements_content = $this->announcements_content;
        $dom = new \DomDocument();
        $dom->loadHtml($announcements_content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');
        foreach($imageFile as $item => $image){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $imgeData = base64_decode($data);
            $image_name= "/upload/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $announcements_content = $dom->saveHTML();

        // dd($this->announcements_title);

        Announcement::create($this->createAnnouncementModel());
        $this->modalCreateAnnouncementFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    public function createAnnouncementModel()
    {
        return [
            'announcement_title' => $this->announcements_title,
            'announcement_content' => $this->announcements_content,
            'signature' => $this->signature,
            'signer_position' => $this->signer_position,
            'status' => $this->status,
            'exp_date' => $this->exp_date,
            'exp_time' => $this->exp_time,
            'user_id' => $this->user_id,
            'organization_id' => $this->orgID,
            'announcement_slug' => $this->announcements_slug,
        ];
    }
    
    
    /*=====  End of Create Announcements Section comment block  ======*/
    
    /*==================================================================
    =            Update Announcements Section comment block            =
    ==================================================================*/
    public function updateAnnouncementShowModal($id)
    {
        $this->announcement_id = $id;
        $this->modalUpdateAnnouncementFormVisible = true;
        $this->loadModel();
    }
    public function loadModel()
    {
        $this->data = Announcement::find($this->announcement_id);
        $this->announcements_title = $this->data->announcement_title;
        $this->announcements_content = $this->data->announcement_content;
        $this->signature = $this->data->signature;
        $this->signer_position = $this->data->signer_position;
    }
    public function updateAnnouncementProcess()
    {
        $this->announcements_slug = preg_replace('/\s+/', '_', $this->announcements_title);
        Announcement::find($this->announcement_id)->update($this->updateAnnouncementModel());
        $this->modalUpdateAnnouncementFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    public function updateAnnouncementModel()
    {
        return [
            'announcement_title' => $this->announcements_title,
            'announcement_content' => $this->announcements_content,
            'signature' => $this->signature,
            'signer_position' => $this->signer_position,
            'announcement_slug' => $this->announcements_slug,
        ];
    }
    
    
    /*=====  End of Update Announcements Section comment block  ======*/
    
    /*=================================================================
    =            Delete Announcement Section comment block            =
    =================================================================*/
    // TRASH ANNOUNCEMENT
    public function deleteAnnouncementShowModal($id)
    {
        $this->announcementId = $id;
        $this->modalDeleteAnnouncementFormVisible = true;
    }
    public function deleteAnnouncementProcess()
    {
        // Announcement::find($this->announcement_id)->update($this->deleteAnnouncementModel());
        // $this->announcementId = Announcement::find($this->announcementId);
        Announcement::where('announcements_id',$this->announcementId)->update([
            'status' => '0',
            'isAnnouncementInHomepage' => '0',
            'isAnnouncementInOrgpage' => '0',
        ]);
        $this->modalDeleteAnnouncementFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    
    
    /*=====  End of Delete Announcement Section comment block  ======*/

    /*=====================================================
    =            Deleted Announcement Redirect            =
    =====================================================*/
    
    public function deletedannouncements()
    {
        return redirect('/announcements/deleted-announcements');
    }
    public function deletedorgannouncements()
    {
        return redirect('/announcements/org-deleted-announcements');
    }
    
    /*=====  End of Deleted Announcement Redirect  ======*/
    
    
    /*===========================================================================
    =            Change Status on Expired Date Section comment block            =
    ===========================================================================*/
    public function getTimezoneDate()
    {
        date_default_timezone_set('Asia/Manila');
        $this->currentDate = date('d-m-y');
        $this->currentTime = date('h:i:s');
        $this->newDate=date('d-m-y', strtotime("+2 months"));

    }
    public function mount()
    {
        date_default_timezone_set('Asia/Manila');
        $this->currentDate = date('d-m-y');
        $this->currentTime = date('h:i:s');
        $this->newDate=date('d-m-Y', strtotime("+2 months"));
        $this->changeAnnouncementStatusOnRefresh();
    }

    public function changeAnnouncementStatusOnRefresh()
    {
        date_default_timezone_set('Asia/Manila');
        $this->checkCurrentDate = date('Y-m-d');
        $this->checkCurrentTime = date('H:i:s');
        $this->getAnnouncementDateFromDB = DB::table('announcements')->get();
        $this->countDBTable = DB::table('announcements')->count();
        foreach ($this->getAnnouncementDateFromDB as $this->data) {
                    // echo $this->data;
                if($this->data->exp_date < $this->checkCurrentDate){
                    $this->dateIDExpired = $this->data->announcements_id;
                    // if ($this->data->exp_time < $this->checkCurrentTime) {
                        Announcement::where('announcements_id', '=', $this->dateIDExpired)->update(['status' => '0']);
                    // }    
                }
                else{
                    $this->dateIDExpired = $this->data->announcements_id;
                    // if ($this->data->exp_time < $this->checkCurrentTime) {
                        Announcement::where('announcements_id', '=', $this->dateIDExpired)->update(['status' => '1']);
                    // }
                }
        }
    }
    /*=====  End of Change Status on Expired Date Section comment block  ======*/
    

    /*===============================================================
    =            view Announcement Section comment block            =
    ===============================================================*/
    public function viewAnnouncement($id)
    {
        // return redirect('/announcements/view-selected-announcements');
        $this->resetValidation();
        $this->reset();
        $this->announcement_id = $id;
        $this->modalViewAnnouncementsFormVisible = true;
        // dd($this->announcement_id);announcement_id
        # return  redirect()->route('/announcements/view-selected-announcements/')->with( [ 'announcement_id' => $this->announcement_id ]);
        // return view('admin.view-selected-announcements', ['announcement_id' -> $id]);
        // return redirect()->route('/announcements/view-selected-announcements', ['announcement_id' => $this->announcement_id]);
        // return redirect()->route('/announcements/view-selected-announcements/')->with('announcement_id',$this->announcement_id);
        // return redirect()->route('/announcements/view-selected-announcements/');
        // $this->viewDataAnnouncement();
    }
    public function viewDataAnnouncement()
    {
        // dd($this->announcement_id);
        // dd(Announcement::where('announcements_id','=',$this->announcement_id)->get());
        return Announcement::where('announcements_id','=',$this->announcement_id)->get();
    }
    
    
    /*=====  End of view Announcement Section comment block  ======*/
    

    public function addOrgAnnouncementSlider($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->announcement_id = $id;
        $this->modalAddAnnouncementSliderFormVisible = true;
    }

    public function addAnnouncementSliderProcess()
    {
        Announcement::where('announcements_id','=',$this->announcement_id)->update(['isAnnouncementInOrgpage'=>'1']);
        $this->modalAddAnnouncementSliderFormVisible = true;
        $this->reset();
        $this->resetValidation();
    }

    /**
     *
     * Get Role of Auth User
     *
     */
    public function getAuthRoleUser()
    {
        $this->object = new Objects();
        $this->userRole = $this->object->roles();
        // dd($this->userRole);
        return $this->userRole;

        // dd($this->role->role_name);
    }
    /**
     *
     * Get Announcement Data fro Database
     *
     */
    public function getAnnouncements()
    {
        $this->user_id = Auth::id();
        // if ($this->getAuthRoleUser() == 'Super Admin') {
            return DB::table('announcements')->where('status','=','1')->orderBy('created_at','desc')->paginate(5);
        // dd(DB::table('announcements')->where('status','=','1')->orderBy('created_at','desc')->paginate(5));
        // }elseif ($this->getAuthRoleUser() == 'Organization Admin') {
            // return DB::table('announcements')->where('status','=','1')->orWhere('user_id','=',Auth::id())->orderBy('created_at','desc')->paginate(5);
            // return DB::table('announcements')->where('status','=','1')->where('user_id','=',$this->user_id)->orderBy('created_at','desc')->paginate(5);
        // }else{
            // echo "User";
        // }
        // dd("Hello");
        // return DB::table('announcements')->where('status','=','1')->orderBy('created_at','desc')->paginate(5);
    }
    public function getOrganizationAnnouncement()
    {
        $this->user = User::find(Auth::id());
        $this->v = $this->user->organizations->first();
        // dd($this->v->organization_id);
        $this->organizationDisplayID = $this->v->organization_id;
        // dd($this->organizationDisplayID);
        // dd(DB::table('announcements')->where('status','=','1')->where('organization_id','=',$this->organizationDisplayID)->orderBy('created_at','desc')->paginate(5));
        // dd(DB::table('announcements')->where('organization_id','=',$this->organizationDisplayID)->orderBy('created_at','desc')->paginate(5));
        return DB::table('announcements')->where('status','=','1')->where('organization_id','=',$this->organizationDisplayID)->orderBy('created_at','desc')->paginate(5);
    }

    public function render()
    {
        return view('livewire.announcements',[
            'displayAnnouncements' => $this->getAnnouncements(),
            'roleUser' => $this->getAuthRoleUser(),
            'displayOrgAnnouncements' => $this->getOrganizationAnnouncement(),
            'displaySelectedOrgAnnouncement' => $this->viewDataAnnouncement(),
        ]);
    }
}
