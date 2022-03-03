<div class="p-5">
    <div class="grid grid-cols-12">
        <div class="col-span-3" style="background:red;">
            <div>
                <table style="width:100%">
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">First Name</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Middle Name</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Last Name</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Suffix</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Email</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Course</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Gender</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Student Number</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Date of Birth</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Mobile Number</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Address</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Year and Section</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-span-3" style="background:blue;">
            <div>
                <table>
                    @if($displayUserSelectedData->count())
                        @foreach($displayUserSelectedData as $item)
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($item->first_name != null)
                                        {{ $item->first_name }}
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($item->middle_name != null)
                                    {{ $item->middle_name }}
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($item->last_name != null)
                                        {{ $item->last_name }}
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($item->suffix != null)
                                        {{ $item->suffix }}
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($item->email != null)
                                        {{ $item->email }}
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @foreach($displayUserCourseData as $course)
                                        @if($course->course_id != null)
                                            {{ $course->course_name }}
                                        @else
                                            <p>Data Unavailable</p>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @foreach($displayUserGendereData as $gender)
                                        @if($gender->gender_id != null)
                                            {{ $gender->gender }}
                                        @else
                                            <p>Data Unavailable</p>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($item->student_number != null)
                                        {{ $item->student_number }}
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($item->date_of_birth != null)
                                        {!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime($item->date_of_birth))) !!}
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($item->mobile_number != null)
                                        {{ $item->mobile_number }}
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($item->address != null)
                                        {{ $item->address }}
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                    @if($item->year_and_section != null)
                                        {{ $item->year_and_section }}
                                    @else
                                        <p>Data Unavailable</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">
                                No Results Found
                            </td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
        <div class="col-span-3" style="background:red;">
            <div>
                <table style="width:100%">
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Organization</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Role</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">SOIS Key</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">Permissions</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-span-3" style="background:blue;">
            <div>
                <table style="width:100%">
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                            @foreach($displayUserOrganizationData as $viewOrganization)
                                @if($viewOrganization->organization_name != null)
                                    {{ $viewOrganization->organization_name }}
                                @else
                                    <p>Data Unavailable</p>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                            @foreach($displayUserRoleData as $viewRole)
                                @if($viewRole->role != null)
                                    {{ $viewRole->role }}
                                @else
                                    <p>Data Unavailable</p>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                            @if($displayUserGateData->count() > 0)
                                <p>{{ $UserGateKey }}</p>
                            @else
                                <p>Data Unavailable</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                            <div style="overflow: auto; height: 20rem; background:red;">
                                @foreach($displayUserPermsData as $perms)
                                    <div class="pl-5 pr-5 pt-2">
                                        <p>{{$perms->name}}</p>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="p-3">
            @foreach($displayUserSelectedData as $item)
            <a href="{{ route('user/selected-user/update', ['id'=> $item->user_id ]) }}">
            <x-jet-secondary-button class="ml-2" wire:click="updateRedirect">
                Update User Data
            </x-jet-secondary-button>
            </a>
            <x-jet-button wire:click="updateUserPasswordModel({{ $item->user_id }})">
                {{__('Update Password User')}}
            </x-jet-button>
            @if($displayUserRoleData->count() > 0)
            <x-jet-secondary-button class="ml-2">
                Change Role
            </x-jet-secondary-button>
            @else
            <x-jet-secondary-button class="ml-2">
                Add Role
            </x-jet-secondary-button>
            @endif
            <x-jet-secondary-button class="ml-2">
                Generate Key
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2">
                Add Permission
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2">
                Add Organization
            </x-jet-secondary-button>
            @endforeach
        </div>
    </div>









<x-jet-dialog-modal wire:model="modalUpdateUserPasswordFormVisible">
            <x-slot name="title">
                {{ __('Update password of User:') }}
            </x-slot>

            <x-slot name="content">
               <div class="mb-4">
                    <x-jet-label for="password" value="{{ __('password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" wire:model.debounce.800ms="password" required autofocus />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalUpdateUserPasswordFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                @if($userId)
                    <x-jet-secondary-button class="ml-2" wire:click="updateUserPassword" wire:loading.attr="disabled">
                        {{ __('Update Password') }}
                    </x-jet-secondary-button>                    
                @endif
            </x-slot>
        </x-jet-dialog-modal>
















</div>
