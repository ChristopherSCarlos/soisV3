<div class="p-6">
    <h2 class="table-title">System Asset Types</h2>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createAssetTypeShowModel">
            {{ __('Create Asset Type') }}
        </x-jet-button>
        <x-jet-button wire:click="infoShowModel" class="ml-5 bg-green-900" style="background: green;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
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
                                            {{ $item->asset_type_id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->type }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->asset_type_description }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <x-jet-button wire:click="updateAssetTypeShowModal({{ $item->asset_type_id }})">
                                                {{__('Update')}}
                                            </x-jet-button>
                                            <x-jet-danger-button wire:click="deleteAssetTypeShowModal({{ $item->asset_type_id }})">
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
                {{ __('Asset Type') }} {{$asset_type_id}}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="type" value="{{ __('Asset Type Name') }}" />
                    <x-jet-input wire:model="type" id="type" class="block mt-1 w-full" type="text" />
                    @error('type') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="asset_type_description" value="{{ __('Asset Type Description') }}" />
                    <x-jet-input wire:model="asset_type_description" id="asset_type_description" class="block mt-1 w-full" type="text" />
                    @error('asset_type_description') <span class="error">{{ $message }}</span> @enderror
            
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalCreateUpdateAssetTypesFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                @if($asset_type_id)
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
                {{ __('Asset Type') }} {{$asset_type_id}}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="type" value="{{ __('Do you want to delete this/') }}" />
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



<x-jet-dialog-modal wire:model="InformationBox">
        <x-slot name="title">
            {{ __('Asset Type') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <p>'Asset type' table is used by the SOIS: Homepage Maintenance Module to determine the type of the assets (images) the user is uploading. <span class="text-black font-bold">e.g. Logo, Carousel</span></p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('InformationBox')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>






<!-- FINAL DIV -->
</div>
