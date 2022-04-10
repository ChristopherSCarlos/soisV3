<div>
    @if($errorMessage == 1)
        <p class="p-6">This user Doesn't have permission to access the Sois Gate. Please Contact the Administrator's to give you access.</p>
    @endif
    @foreach($soisbuttons as $butt)
        @foreach($soisGateKey as $key)
            <x-jet-button>
                <a href="{{$butt->external_link}}$0lsL0gIn/idem/{{$this->userId}}/gateportal/{{$key->gate_key}}" target="_blank">{{$butt->link_name}}</a>
            </x-jet-button>
        @endforeach
    @endforeach
</div>
