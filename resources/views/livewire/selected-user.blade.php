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
            <a href="{{ route('user/selected-user/update', ['id'=> $item->user_id ]) }}">
            <x-jet-secondary-button class="ml-2" wire:click="updateRedirect">
                Update User Data
            </x-jet-secondary-button>
            </a>
            <x-jet-button wire:click="updateUserPasswordModel({{ $item->user_id }})">
                {{__('Update Password User')}}
            </x-jet-button>
            @if($displayUserRoleData->count() > 0)
            <x-jet-secondary-button wire:click="addShowRoleModel({{$item->user_id}})" class="ml-2">
                Change Role
            </x-jet-secondary-button>
            @else
            <x-jet-secondary-button wire:click="addShowRoleModel({{$item->user_id}})" class="ml-2">
                Add Role
            </x-jet-secondary-button>
            @endif
            <x-jet-secondary-button wire:click="generateKeyModal({{ $item->user_id }})" class="ml-2">
                Generate Key
            </x-jet-secondary-button>
            <x-jet-secondary-button wire:click="addShowPermissionModel({{ $item->user_id }})" class="ml-2">
                Add Permission
            </x-jet-secondary-button>
            <x-jet-secondary-button wire:click="addShowOrganizationModel({{ $item->user_id }})">
                {{__('Add Organization')}}
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
                    <x-jet-secondary-button class="ml-2" wire:click="updatePassword" wire:loading.attr="disabled">
                        {{ __('Update Password') }}
                    </x-jet-secondary-button>                    
                @endif
            </x-slot>
        </x-jet-dialog-modal>







<!--=======================================================
=            Sync Role To User Section comment            =
========================================================-->
<x-jet-dialog-modal wire:model="modalAddRoleFormVisible">
            <x-slot name="title">
                {{ __('Add Role To User') }} {{$userId}}
            </x-slot>

            <x-slot name="content">
               <div class="mb-4">
                    
    <div class="form-group row">
        <label for="role" class="col-md-4 col-form-label text-md-right">role</label>
        <div class="col-md-6">
            <select wire:model="roleModel" class="form-control">
                <option value="" selected>Choose role</option>
                @foreach($rolesList as $role)
                    <option value="{{ $role->role_id }}">{{ $role->role }}</option>
                @endforeach
            </select>
        </div>
    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalAddRoleFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                @if($userId)
                    <x-jet-secondary-button class="ml-2" wire:click="addRoleToUser" wire:loading.attr="disabled">
                        {{ __('Sync Role') }}
                    </x-jet-secondary-button>                    
                @endif
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Sync Role To User Section comment  ====-->


<!--==================================================
=            Generate Key Section comment            =
===================================================-->
    <x-jet-dialog-modal wire:model="modelConfirmUserGenerateKeyVisible">
        <x-slot name="title">
            {{ __('Delete User') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Are you sure you want to generate key this user?.') }}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modelConfirmUserGenerateKeyVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="generateKey" wire:loading.attr="disabled">
                {{ __('Generate Key') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of Generate Key Section comment  ====-->

<!--====================================================
=            Add Permission Section comment            =
=====================================================-->
<x-jet-dialog-modal wire:model="modaladdPermissionModel">
            <x-slot name="title" >
                <p class="modalTitle">
                    
                {{ __('Add Role To User') }} {{$userId}}
                </p>
            </x-slot>

            <x-slot name="content">
                <div class="mb-4 grid grid-cols-1">
                    <div class="" style="height: 50vh; overflow: auto;">
                        <div>
                            <form>
                                @foreach($permsList as $perms)
                                    <div class="mt-1">
                                        <label class="inline-flex items-center">
                                        <input type="checkbox" value="{{ $perms->permission_id }}" wire:model="permissionModel.{{ $perms->permission_id }}" class="form-checkbox h-6 w-6 text-green-500">
                                            <span class="ml-3 text-sm">{{ $perms->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modaladdPermissionModel')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                @if($userId)
                    <x-jet-secondary-button class="ml-2" wire:click="addPermissionToUser" wire:loading.attr="disabled">
                        {{ __('Sync Permission') }}
                    </x-jet-secondary-button>                    
                @endif
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Add Permission Section comment  ====-->

<!--===============================================================
=            Sync User to Organization Section comment            =
================================================================-->
<x-jet-dialog-modal wire:model="modalAddOrganizationFormVisible">
            <x-slot name="title">
                {{ __('Add Organization To User') }} {{$userId}}
            </x-slot>

            <x-slot name="content">
               <div class="mb-4">
                    <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right">Organization</label>
                        <div class="col-md-6">
                            <select wire:model="organizationModel" class="form-control">
                                <option value="" selected>Choose Organization</option>
                                @foreach($displayOrganizationData as $organization)
                                    <option value="{{ $organization->organization_id }}">{{ $organization->organization_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalAddOrganizationFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                @if($userId)
                    <x-jet-secondary-button class="ml-2" wire:click="addOrganizationToUser" wire:loading.attr="disabled">
                        {{ __('Add Organization to User') }}
                    </x-jet-secondary-button>                    
                @endif
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Sync User to Organization Section comment  ====-->

</div>
