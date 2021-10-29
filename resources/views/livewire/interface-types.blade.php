<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createInterfaceTypeShowModel">
            {{ __('Create Interface Type') }}
        </x-jet-button>
    </div>
    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Interface Type</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($getInterfaceType->count())
                                @foreach($getInterfaceType as $item)
                                     <tr>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->interface_types_id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->interface_type }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->description }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <x-jet-button wire:click="updateInterfaceTypesShowModal({{ $item->interface_types_id }})">
                                                {{__('Update')}}
                                            </x-jet-button>
                                            <x-jet-danger-button wire:click="deleteInterfaceTypesShowModal({{ $item->interface_types_id }})">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{$getInterfaceType->links()}}


<!--=================================================================
=            Create Interface Type Modal Section comment            =
==================================================================-->
<x-jet-dialog-modal wire:model="modalCreateInterfaceTypesFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="interface_type" value="{{ __('Interface Type') }}" />
                    <x-jet-input wire:model="interface_type" id="interface_type" class="block mt-1 w-full" type="text" />
                    @error('interface_type') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="description" value="{{ __('Interface Type Description') }}" />
                    <x-jet-input wire:model="description" id="description" class="block mt-1 w-full" type="text" />
                    @error('description') <span class="error">{{ $message }}</span> @enderror
            
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalCreateInterfaceTypesFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="createInterfaceTypeProcess" wire:loading.attr="disabled">
                    {{ __('Create Announcement') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Create Interface Type Modal Section comment  ====-->









</div>
