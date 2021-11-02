<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createAssetTypeShowModel">
            {{ __('Create Asset Type') }}
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Asset Type</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($getAssetTypes->count())
                                @foreach($getAssetTypes as $item)
                                     <tr>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->asset_types_id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->asset_type_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->asset_type_description }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <x-jet-button wire:click="updateAssetTypeShowModal({{ $item->asset_types_id }})">
                                                {{__('Update')}}
                                            </x-jet-button>
                                            <x-jet-danger-button wire:click="deleteAssetTypeShowModal({{ $item->asset_types_id }})">
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

    {{$getAssetTypes->links()}}


<!--==================================================================
=            Create and Update Asset Type Section comment            =
===================================================================-->
<x-jet-dialog-modal wire:model="modalCreateUpdateAssetTypesFormVisible">
            <x-slot name="title">
                {{ __('Asset Type') }} {{$asset_types_id}}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="asset_type_name" value="{{ __('Asset Type Name') }}" />
                    <x-jet-input wire:model="asset_type_name" id="asset_type_name" class="block mt-1 w-full" type="text" />
                    @error('asset_type_name') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="asset_type_description" value="{{ __('Asset Type Description') }}" />
                    <x-jet-input wire:model="asset_type_description" id="asset_type_description" class="block mt-1 w-full" type="text" />
                    @error('asset_type_description') <span class="error">{{ $message }}</span> @enderror
            
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalCreateUpdateAssetTypesFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                @if($asset_types_id)
                <x-jet-secondary-button class="ml-2" wire:click="updateAssetTypeProcess" wire:loading.attr="disabled">
                    {{ __('Update Asset Type') }}
                </x-jet-secondary-button>
                @else
                <x-jet-secondary-button class="ml-2" wire:click="createAssetTypeProcess" wire:loading.attr="disabled">
                    {{ __('Create Asset Type') }}
                </x-jet-secondary-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>
<!--====  End of Create and Update Asset Type Section comment  ====-->

<!--========================================================
=            Delete Assset Type Section comment            =
=========================================================-->
<x-jet-dialog-modal wire:model="modalDeleteAssetTypesFormVisible">
            <x-slot name="title">
                {{ __('Asset Type') }} {{$asset_types_id}}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="asset_type_name" value="{{ __('Do you want to delete this/') }}" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalDeleteAssetTypesFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="deleteAssetTypeProcess" wire:loading.attr="disabled">
                    {{ __('Delete Asset Type') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Delete Assset Type Section comment  ====-->










<!-- FINAL DIV -->
</div>
