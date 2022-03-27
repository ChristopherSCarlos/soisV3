<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Illuminate\Support\Facades\DB;
class SoisGates extends Component
{

    public $sois2;
    public $sois3;
    public $gpoa;
    public $membership;
    public $soisar;
    public $userId;
    public $errorMessage;

    private $getKey;
    private $gateKey;
    private $ipAddress;
    private $sois_links_data;

    public $testRoute = 'reroute-test';

    public function mount()
    {
        $this->userId = Auth::id();
        // dd(DB::table('sois_links')->where('status','=','1')->get());
        $sois_links_data = DB::table('sois_links')->where('status','=','1')->get(['external_link','link_name']);
        // $sois_links_data = DB::table('sois_links')->where('status','=','1')->only('external_link','link_name')->toArray();
        // dd($sois_links_data->external_link);
        // echo User::find($this->userId);
        DB::table('sois_gates')->where('user_id','=',$this->userId)->update(['is_logged_in' => '1']);
        
        $this->getKey = DB::table('sois_gates')->where('user_id','=',$this->userId)->first();

        if ($this->getKey != null) {
            $this->gateKey = $this->getKey->gate_key;
        }else{
            $this->errorMessage = 1;
        }



        // dd($this->gateKey);

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
            // echo "1";
            // echo "<br><br>";
            // echo $ip;
            // echo "<br><br>";
            $this->ipAddress = $ip;
            $this->ipAddress = $ip;
            // DB::table('sois_gates')->where('user_id','=',$this->userId)->update(['ip_address' => $this->ipAddress]);
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            // echo "2";
            // echo "<br><br>";
            // echo $ip;
            // echo "<br><br>";
            $this->ipAddress = $ip;
            // DB::table('sois_gates')->where('user_id','=',$this->userId)->update(['ip_address' => $this->ipAddress]);
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
            // echo "3";
            // echo "<br><br>";
            // echo $ip;
            // echo "<br><br>";
            $this->ipAddress = $ip;
            // DB::table('sois_gates')->where('user_id','=',$this->userId)->update(['ip_address' => $this->ipAddress]);
        }
        // dd($this->gateKey);
    }

    public function linkButtons()
    {
        dD(DB::table('sois_links')->where('status','=','1')->get());
        dd("hello");
    }

    public function sois3Function()
    {
        $this->sois3 = 'http://sois2.puptaguigcs.net/$0lsL0gIn/idem/'.$this->userId.'/gateportal/'.$this->gateKey.'/'.$this->testRoute;
        return $this->sois3;
    }

    public function sois2Function()
    {
        $this->sois2 = 'http://sois2.puptaguigcs.net/$0lsL0gIn/idem/'.$this->userId.'/gateportal/'.$this->gateKey;
        return $this->sois2;
    }
    public function gpoaFunction()
    {
        $this->gpoa = 'http://sois-gpoa.puptaguigcs.net/'; 
        return $this->gpoa;
    }
    public function membershipFunction()
    {
        $this->membership = 'http://sois-membership.puptaguigcs.net/'; 
        return $this->membership;
    }
    public function soisarFunction()
    {
        $this->soisar = 'http://sois-ar.puptaguigcs.net/'; 
        return $this->soisar;
    }

    public function render()
    {
        return view('livewire.sois-gates',[
            'sois2' => $this->sois2Function(),
            'sois3' => $this->sois3Function(),
            'gpoa' => $this->gpoaFunction(),
            'member' => $this->membershipFunction(),
            'soisar' => $this->soisarFunction(),
            'soisbuttons' => DB::table('sois_links')->where('status','=','1')->get(),
            'soisGateKey' => DB::table('sois_gates')->where('user_id','=',$this->userId)->get(),
        ]);
    }
}
