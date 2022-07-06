<div class="p-6">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Roles</h2>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
            <a href="{{route('sadmin-role.create')}}">
                <x-jet-button>
                    {{ __('Add Role') }}
                </x-jet-button>
            </a>

    </div>

    <div class="flex flex-col ">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Roles</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Roles Description</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Creation</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Update</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sync Permission</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($displayData->count())
                                @foreach($displayData as $item)
                                     <tr>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->role_id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->role }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->description }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->created_at }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->updated_at }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <a href="{{ route('roles/delete',$item->role_id) }}">
                                                <x-jet-danger-button>
                                                    {{__('Delete Role')}}
                                                </x-jet-danger-button>
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <a href="{{ route('roles/sync',$item->role_id) }}">
                                                <x-jet-button>
                                                    {{__('Sync Permission')}}
                                                </x-jet-button>
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <a href="{{route('roles.show', $item->role_id)}}">
                                                <x-jet-button>
                                                    {{__('View Role')}}
                                                </x-jet-button>
                                            </a>
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
=            Craete Modal Section comment            =
===================================================-->
    <x-jet-dialog-modal wire:model="modalCreateRolesFormVisible">
        <x-slot name="title">
            {{ __('Create Role') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="role" value="role" />
                <x-jet-input id="role" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="role" required autofocus />
            </div>
            <div class="mt-4">
                <x-jet-label for="description" value="description" />
                <x-jet-input id="description" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="description" required autofocus />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalCreateRolesFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Add Role') }}
            </x-jet-secondary-button>                    
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of Craete Modal Section comment  ====-->


<!--=====================================================
=            Sync permission Section comment            =
======================================================-->
    <x-jet-dialog-modal wire:model="modalSyncRolePermissionVisible">
        <x-slot name="title">
            {{ __('Create Role') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-4" style="overflow:auto; height: 50vh;">
            <x-jet-label for="role" value="{{ __('Select Article to add in Homepage Slider') }}" />
                        
                            @foreach($displayPermission as $permissions)
                        <input type="checkbox" wire:model="selectedPermsOnRoles" id="{{$permissions->permission_id}}" name="{{$permissions->name}}" value="{{$permissions->permission_id}}">
                        <label for="{{$permissions->name}}">{{$permissions->name}}</label><br>
                            @endforeach
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalSyncRolePermissionVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="syncPermission" wire:loading.attr="disabled">
                {{ __('Add Role') }}
            </x-jet-secondary-button>                    
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of Sync permission Section comment  ====-->


<!--=====================================================
=            DElete permission Section comment            =
======================================================-->
    <x-jet-dialog-modal wire:model="modalDeleteRolesFormVisible">
        <x-slot name="title">
            {{ __('Delete Role') }}
        </x-slot>
        <x-slot name="content">
            <div class="m-4">
                {{ __('Are you sure you want to delete your permission? Once your permission is deleted, all of its resources and data will be permanently deleted. ') }}
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalDeleteRolesFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Role') }}
            </x-jet-secondary-button>                    
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of DElete permission Section comment  ====-->





























</div>
