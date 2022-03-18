<div class="p-5">
    <div class="grid grid-cols-12">
        <div class="col-span-3" style="">
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
        <div class="col-span-3" style="">
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
        <div class="col-span-3" style="">
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
        <div class="col-span-3" style="">
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
                            <div style="overflow: auto; height: 20rem; ">
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
            <a href="{{ route('users.edit', $item->user_id) }}">
                <x-jet-secondary-button class="ml-2" wire:click="updateRedirect">
                    Update User Data
                </x-jet-secondary-button>
            </a>
            <x-jet-button wire:click="updateUserPasswordModel({{ $item->user_id }})">
                {{__('Update Password User')}}
            </x-jet-button>
            <a href="{{ route('users/access-control', $item->user_id) }}">
                <x-jet-secondary-button class="ml-2">
                    Update User Access
                </x-jet-secondary-button>
            </a>
            @endforeach
        </div>
    </div>




</div>




</div>
