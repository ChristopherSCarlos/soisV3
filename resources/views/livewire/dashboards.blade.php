<div class="p-6">
     <div class="flex items-center justify-center flex-col">
          @foreach($getUserData as $userData)
               
               <div>
                    <p class="text-4x1">
                         Welcome to your account
                              @if($userData->gender_id == '1')
                                   Mr.
                              @else
                                   Ms.
                              @endif
                         {{$userData->first_name}} {{$userData->middle_name}} {{$userData->last_name}}
                    </p>
               </div>
          @endforeach
          <div>Please Navigate using the navigation bar on the top to access the different parts of the sytem.</div>
     </div> 
</div>
