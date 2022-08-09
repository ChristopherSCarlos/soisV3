<div class="p-6">
    <div class="flex items-center justify-center flex-col">
        <div>
            
        </div>
        <div>
            @if($errorMessage == 1)
                <p class="p-6">This user Doesn't have permission to access the Sois Gate. Please Contact the Administrator's to give you access.</p>
            @elseif($errorMessage == 2)
                <p class="p-6">As a Super Admin, you do not have the role necesary to access the different SOIS System. Please contact the developers of other systems to let you access their system.</p>
            @elseif($errorMessage == 3)
                <p class="p-6">As a Home Page Admin, you do not have the role necesary to access the different SOIS System. Please contact the Super admin or the developers of other systems to let you access their system.</p>
        </div>
        <div>
            @else($errorMessage == 4)
            <h3>
                SOIS GATES  
            </h3>
            <p>Below are the buttons for redirection allowed to your account.</p>
                @foreach($soisbuttons as $butt)
                    @foreach($soisGateKey as $key)
                        <x-jet-button>
                            <a href="{{$butt->external_link}}$0lsL0gIn/idem/{{$this->userId}}/gateportal/{{$key->gate_key}}" target="_blank">{{$butt->link_name}}</a>
                        </x-jet-button>
                    @endforeach
                @endforeach
            @endif
        </div>
    </div>
</div>
