<div class="p-6">
    <h2 class="table-title">SOIS: Webpages Types</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createPageTypeShowModel">
            {{ __('Create Web Page Type') }}
        </x-jet-button>
        <x-jet-button wire:click="infoShowModel" class="ml-5" style="background: green;">
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Page Type</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($getPageTypeData->count())
                                @foreach($getPageTypeData as $item)
                                     <tr>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->page_types_id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->page_type }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->page_description }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <x-jet-button wire:click="updatePageTypeShowModal({{ $item->page_types_id }})">
                                                {{__('Update')}}
                                            </x-jet-button>
                                            <x-jet-danger-button wire:click="deletePageTypeShowModal({{ $item->page_types_id }})">
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

    {{$getPageTypeData->links()}}



<!--=================================================================
=            Craete and Update Page Type Section comment            =
==================================================================-->
<x-jet-dialog-modal wire:model="modalCreateUpdatePageTypesFormVisible">
            <x-slot name="title">
                {{ __('Page Type #') }} {{$pageTypeID}}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="page_type" value="{{ __('Page Type Name') }}" />
                    <x-jet-input wire:model="page_type" id="page_type" class="block mt-1 w-full" type="text" />
                    @error('page_type') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="page_description" value="{{ __('Page Type Description') }}" />
                    <x-jet-input wire:model="page_description" id="page_description" class="block mt-1 w-full" type="text" />
                    @error('page_description') <span class="error">{{ $message }}</span> @enderror
            
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalCreateUpdatePageTypesFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                @if($pageTypeID)
                <x-jet-secondary-button class="ml-2" wire:click="updatePageTypeProcess" wire:loading.attr="disabled">
                    {{ __('Update Page Type') }}
                </x-jet-secondary-button>
                @else
                <x-jet-secondary-button class="ml-2" wire:click="createUpdateInterfaceTypeProcess" wire:loading.attr="disabled">
                    {{ __('Create Page Type') }}
                </x-jet-secondary-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>
<!--====  End of Craete and Update Page Type Section comment  ====-->

<!--======================================================
=            Delete Page Type Section comment            =
=======================================================-->
<x-jet-dialog-modal wire:model="modalDeletePageTypesFormVisible">
            <x-slot name="title">
                {{ __('Page Type #') }} {{$pageTypeID}}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="page_type" value="{{ __('Do you want to delete this page type?') }}" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalDeletePageTypesFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="deleteInterfaceTypeProcess" wire:loading.attr="disabled">
                    {{ __('Create Page Type') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Delete Page Type Section comment  ====-->


<x-jet-dialog-modal wire:model="InformationBox">
        <x-slot name="title">
            {{ __('Page Type') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <p>'Page type' table is used by the SOIS: Homepage Maintenance Module to add, update, and delete other web pages type. <span class="text-black font-bold">e.g. News page, System Page</span></p>
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
