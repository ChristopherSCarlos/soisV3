<div class="p-5">
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <div>
                @foreach($displayUserSelectedData as $user)
            <div class="mt-4">
                <x-jet-label for="first_name" value="{{ __('First name') }} : {{$user->first_name}}" />
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="first_name_DB" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label for="middle_name" value="{{ __('Middle Name') }} : {{$user->middle_name}}" />
                <x-jet-input id="middle_name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="middle_name_DB" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('last name') }} : {{$user->last_name}}" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" wire:model="last_name_DB" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('email') }} : {{$user->email}}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" wire:model="email_DB" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label value="{{ __('Course') }}" />
                <select wire:model="course_id_DB" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach($displayCourseDromDBForUpdateSelect as $selectedCouse)
                                <option default hidden value="{{$selectedCouse->course_id}}">{{$selectedCouse->course_name}}</option>
                            @endforeach
                            @foreach($displayCourseDromDB as $courses)
                                <option value="{{$courses->course_id}}">{{$courses->course_name}}</option>
                            @endforeach
                </select>
            </div>
            <div class="mt-4">
                <x-jet-label value="{{ __('Gender') }}" />
                <select wire:model="gender_id_DB" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            @foreach($displayGenderDromDBForUpdateSelect as $selectedGender)
                                <option default hidden value="{{$selectedGender->gender_id}}">{{$selectedGender->gender}}</option>
                            @endforeach
                            @foreach($displayGenderDromDB as $genders)
                                <option value="{{$genders->gender_id}}">{{$genders->gender}}</option>
                            @endforeach
                </select>
            </div>
            <div class="mt-4">
                <x-jet-label for="date_of_birth" value="{{ __('Birth Date') }} : {!! htmlspecialchars_decode(date('j F Y', strtotime($user->date_of_birth))) !!}" />
                <x-jet-input wire:model="date_of_birth_DB" id="date_of_birth" class="block mt-1 w-full" type="date" required/>
            </div>
            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('address') }} : {{$user->address}}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" wire:model="address_DB" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label for="mobile_number" value="{{ __('Mobile Number') }} : {{$user->mobile_number}}" />
                <x-jet-input id="mobile_number" class="block mt-1 w-full" type="text" wire:model="mobile_number_DB" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label for="student_number" value="{{ __('student_number') }} : {{$user->student_number}}" />
                <x-jet-input id="student_number" class="block mt-1 w-full" type="text" wire:model="student_number_DB" required autofocus />
            </div>
            @endforeach
            <x-jet-secondary-button class="m-5" wire:click="update">
                {{ __('Update User') }}
            </x-jet-secondary-button>
            </div>
        </div>
    </div>
</div>
