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

    // variables
        public $announcement_id;

        public $announcements_title;
        public $announcements_content;
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

    /*==================================================================
    =            Create Announcements Section comment block            =
    ==================================================================*/
    public function createAnnouncement()
    {
        $this->reset();
        $this->resetValidation();
        $this->modalCreateAnnouncementFormVisible = true;
    }
    public function createAnnouncementProcess()
    {
        $this->user_id = Auth::user()->users_id;
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
        ];
    }
    
    
    /*=====  End of Update Announcements Section comment block  ======*/
    
    /*=================================================================
    =            Delete Announcement Section comment block            =
    =================================================================*/
    // TRASH ANNOUNCEMENT
    public function deleteAnnouncementShowModal($id)
    {
        $this->announcement_id = $id;
        $this->modalDeleteAnnouncementFormVisible = true;
    }
    public function deleteAnnouncementProcess()
    {
        Announcement::find($this->announcement_id)->update($this->deleteAnnouncementModel());
        $this->modalDeleteAnnouncementFormVisible = false;
        $this->reset();
        $this->resetValidation();
    }
    public function deleteAnnouncementModel()
    {
        return [
            'status' => '0',
        ];
    }
    
    
    /*=====  End of Delete Announcement Section comment block  ======*/
    
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
                if($this->data->exp_date < $this->checkCurrentDate){
                    $this->dateIDExpired = $this->data->announcements_id;
                    if ($this->data->exp_time < $this->checkCurrentTime) {
                        Announcement::where('announcements_id', '=', $this->dateIDExpired)->update(['status' => '0']);
                    }    
                }
                else{
                    $this->dateIDExpired = $this->data->announcements_id;
                    if ($this->data->exp_time < $this->checkCurrentTime) {
                        Announcement::where('announcements_id', '=', $this->dateIDExpired)->update(['status' => '1']);
                    }
                }
        }
    }
    /*=====  End of Change Status on Expired Date Section comment block  ======*/
    



    /**
     *
     * Get Role of Auth User
     *
     */
    public function getAuthRoleUser()
    {
        $this->object = new Objects();
        $this->userRole = $this->object->roles();
        return $this->userRole;
        // dd($this->userRole);

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
        if ($this->getAuthRoleUser() == 'Super Admin') {
            return DB::table('announcements')->where('status','=','1')->orderBy('created_at','desc')->paginate(5);
        }elseif ($this->getAuthRoleUser() == 'Organization Admin') {
            // return DB::table('announcements')->where('status','=','1')->orWhere('user_id','=',Auth::id())->orderBy('created_at','desc')->paginate(5);
            return DB::table('announcements')->where('status','=','1')->where('user_id','=',$this->user_id)->orderBy('created_at','desc')->paginate(5);
        }else{
            echo "User";
        }
        // dd("Hello");
        // return DB::table('announcements')->where('status','=','1')->orderBy('created_at','desc')->paginate(5);
    }

    public function render()
    {
        return view('livewire.announcements',[
            'displayAnnouncements' => $this->getAnnouncements(),
            'roleUser' => $this->getAuthRoleUser(),
        ]);
    }
}
