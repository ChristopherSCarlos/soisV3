<div class="p-6">
     @foreach($AR_sub_links as $arLinks)
          <a href="{{$arLinks->sub_link}}" target="_blank">
               <x-jet-secondary-button class="m-2">
                   {{$arLinks->sub_name}}
               </x-jet-secondary-button>
          </a>
     @endforeach
</div>
