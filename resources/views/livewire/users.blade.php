<div class="p-6">
    <h2 class="table-title">Users Information</h2>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModel">
            {{ __('Create New User') }}
        </x-jet-button>
        <x-jet-danger-button wire:click="deletedusers">
            {{ __('Deleted Users') }}
        </x-jet-danger-button>
    </div>
        <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Roles</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Permission Action</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Connect User Organization</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($displayData->count())
                                @foreach($displayData as $item)
                                     <tr>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->first_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->email }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <x-jet-button wire:click="updateUserModel({{ $item->user_id }})">
                                                {{__('Update User')}}
                                            </x-jet-button>
                                            <x-jet-button wire:click="updateUserPasswordModel({{ $item->user_id }})">
                                                {{__('Update Password User')}}
                                            </x-jet-button>
                                            <x-jet-danger-button wire:click="deleteShowUserModal({{ $item->user_id }})">
                                                {{__('Delete')}}
                                            </x-jet-danger-button>
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap"  style="
                                                                                            ">
                                            <x-jet-button wire:click="addShowRoleModel({{ $item->user_id }})">
                                                {{__('Add Role')}}
                                            </x-jet-button>
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap"  style="
                                                                                            ">
                                            <x-jet-button wire:click="addShowRoleModel({{ $item->user_id }})">
                                                {{__('Add Permission')}}
                                            </x-jet-button>
                                        </td>

                                        <td class="px-6 py-4 text-sm whitespace-no-wrap"  style="
                                                                                            ">
                                            <x-jet-button wire:click="addShowOrganizationModel({{ $item->user_id }})">
                                                {{__('Add Organization')}}
                                            </x-jet-button>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $displayData->links() }}




<!--==================================================
=            Create Modal Section comment            =
===================================================-->
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Save Users') }} {{$userId}}
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="name" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" wire:model.debounce.800ms="email" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" wire:model.debounce.800ms="password" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label for="student_number" value="{{ __('student_number') }}" />
                <x-jet-input id="student_number" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="student_number" required autofocus />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            @if($userId)
                <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update User') }}
                </x-jet-secondary-button>                    
            @else
                <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create User') }}
                </x-jet-secondary-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of Create Modal Section comment  ====-->

<!--=================================================
=            Delete User Section comment            =
==================================================-->
    <x-jet-dialog-modal wire:model="modelConfirmUserDeleteVisible">
        <x-slot name="title">
            {{ __('Delete User') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Are you sure you want to delete your page? Once your page is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your page.') }}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modelConfirmUserDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" wire:click="deleteUserData" wire:loading.attr="disabled">
                {{ __('Delete User') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of Delete User Section comment  ====-->



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
                        {{ __('Update Page') }}
                    </x-jet-secondary-button>                    
                @endif
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Sync Role To User Section comment  ====-->



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



<!--=====================================================
=            Update Password Section comment            =
======================================================-->
<x-jet-dialog-modal wire:model="modalUpdateUserPasswordFormVisible">
            <x-slot name="title">
                {{ __('Update password of User:') }} {{$userId}}
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


<!--====  End of Update Passwoprd Section comment  ====-->





















</div>
