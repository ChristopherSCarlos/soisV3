<div class="p-6">

    <h2 class="table-title">Position Titles</h2>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createPositionTitleModal">
            {{ __('Create Position') }}
        </x-jet-button>
    </div>


    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Position Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Organization</th>
                                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($getUserRole == 'Super Admin')                                    
                            <!-- this is super admin -->
                                @if($PositionData->count())
                                    @foreach($PositionData as $item)
                                         <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->position_title }}
                                            </td>
                                             @foreach($getOrganization as $orgs)
                                                @if($item->organization_id == $orgs->organization_id)
                                                    <td class="px-6 py-2" >{{ $orgs->organization_name }}</td>
                                                @endif
                                            @endforeach
                                            
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <x-jet-button wire:click="updatePositionTitleModal({{ $item->position_title_id }})">
                                                    {{__('Update')}}
                                                </x-jet-button>
                                                <x-jet-danger-button wire:click="deletePositionTitleModal({{ $item->position_title_id }})">
                                                    {{__('Delete')}}
                                                </x-jet-danger-button>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @else
                            <!-- this is organization admin -->
                                @if($getUserRole == 'Home Page Admin')
                                    @foreach($getUserOrgData as $item)
                                         <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->position_title }}
                                            </td>
                                            @foreach($getOrganization as $orgs)
                                                @if($item->organization_id == $orgs->organization_id)
                                                    <td class="px-6 py-2">{{ $orgs->organization_name }}</td>
                                                @endif
                                            @endforeach
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <x-jet-button wire:click="updatePositionTitleModal({{ $item->position_title_id }})">
                                                    {{__('Update')}}
                                                </x-jet-button>
                                                <x-jet-danger-button wire:click="deletePositionTitleModal({{ $item->position_title_id }})">
                                                    {{__('Delete')}}
                                                </x-jet-danger-button>     
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
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if($getUserRole == 'Super Admin')
        {{$PositionData->links()}}
    @else
        {{$Organization->links()}}
    @endif

<!-- MODALS -->
    <!-- CREATE NEWS MODALS -->
<!--=================================================
=            Create News Section comment            =
==================================================-->
        <x-jet-dialog-modal wire:model="CreatemodalFormVisible">
            <x-slot name="title">
                {{ __('Create Position') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="position_title" value="{{ __('Position Title') }}" />
                    <x-jet-input wire:model="position_title" id="position_title" class="block mt-1 w-full" type="text" />
                    @error('position_title') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    @if($getUserRole == 'Super Admin')
                    <x-jet-label for="selectedOrganization" value="{{ __('Organization') }}" />
                        <select wire:model="selectedOrganization" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <!-- <option default hidden>Choose organization</option> -->

                            @foreach($getOrganization as $orgs)
                                <option value="{{$orgs->organization_id}}">{{$orgs->organization_name}}</option>
                            @endforeach
                        </select>
                        @error('selectedOrganization') <span class="error">{{ $message }}</span> @enderror
                    @else
                        @if($getUserRole == 'Home Page Admin')
                            <x-jet-label for="organization_id" value="{{ __('Organization') }}" />
                            <select wire:model="organization_id" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                @foreach($getOrganization as $orgs)
                                    @if($item->organization_id == $orgs->organization_id)
                                        <option default value="{{$orgs->organization_id}}">{{$orgs->organization_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('organization_id') <span class="error">{{ $message }}</span> @enderror
                        @endif
                    @endif
                </div>
                
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('CreatemodalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create Position') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Create News Section comment  ====-->


<!--=============================================================
=            Update News In Homepage Section comment            =
==============================================================-->
        <x-jet-dialog-modal wire:model="UpdatemodalFormVisible">
            <x-slot name="title">
                {{ __('Update Position') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="position_title" value="{{ __('Position Title') }}" />
                    <x-jet-input wire:model="position_title" id="position_title" class="block mt-1 w-full" type="text" />
                    @error('position_title') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    @if($getUserRole == 'Super Admin')
                    <x-jet-label for="selectedOrganization" value="{{ __('Organization') }}" />
                        <select wire:model="selectedOrganization" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option default hidden>Choose organization</option>
                            @foreach($getOrganization as $orgs)
                                <option value="{{$orgs->organization_id}}">{{$orgs->organization_name}}</option>
                            @endforeach
                        </select>
                        @error('selectedOrganization') <span class="error">{{ $message }}</span> @enderror
                    @else
                        @if($getUserRole == 'Home Page Admin')
                            
                        @endif
                    @endif
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('UpdatemodalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update Organization Position') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Update News In Homepage Section comment  ====-->


<!--=================================================
=            Delete News Section comment            =
==================================================-->
        <x-jet-dialog-modal wire:model="modelConfirmDeleteVisible">
            <x-slot name="title">
                {{ __('Delete Position') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="position_title" value="{{ __('Are you sure you want to delete this postion title? Do you wish to proceed?') }}" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modelConfirmDeleteVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete Organization Position') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Delete News Section comment  ====-->
<!-- FINAL DIV -->
</div>
