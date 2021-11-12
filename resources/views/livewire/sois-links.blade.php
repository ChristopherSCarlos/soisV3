<div class="p-6">
    <h2 class="table-title">SOIS System Links</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createSOISLinksModel">
            {{ __('Add SOIS Links') }}
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Url</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($getDisplaySOISLIinks->count())
                                 @foreach($getDisplaySOISLIinks as $item)
                                    <tr>
                                        <td class="px-6 py-2">{{ $item->link_name }}</td>
                                        <td class="px-6 py-2">{{ $item->link_description }}</td>
                                        <td class="px-6 py-2">
                                            <a href="{{ url($item->external_link) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                                               {{ $item->external_link }}
                                            </a>
                                        </td>
                                        <td>
                                            <x-jet-button wire:click="updateSOISLinkShowModal({{ $item->sois_links_id }})">
                                                {{__('Update')}}
                                            </x-jet-button>

                                            <x-jet-danger-button wire:click="deleteSOISLinkShowModal({{ $item->sois_links_id }})">
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
    <br>




<!--=================================================
=            Create Link Section comment            =
==================================================-->
<x-jet-dialog-modal wire:model="modalCreateUpdateSOISLinksFormVisible">
            <x-slot name="title">
                {{ __('Navigation Menu Item') }} {{$soisLinkID}}
            </x-slot>

            <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="link_name" value="{{ __('link_name') }}" />
                <x-jet-input wire:model="link_name" id="link_name" class="block mt-1 w-full" type="text" />
            </div>
            <div class="mt-4">
                <x-jet-label for="link_description" value="{{ __('link_description') }}" />
                <x-jet-input wire:model="link_description" id="link_description" class="block mt-1 w-full" type="text" />
            </div>
            <div class="mt-4">
                <x-jet-label for="external_link" value="{{ __('external_link') }}" />
                <x-jet-input wire:model="external_link" id="external_link" class="block mt-1 w-full" type="text" />
            </div>
        </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalCreateUpdateSOISLinksFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                @if($soisLinkID)
                    <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                        {{ __('Update Page') }}
                    </x-jet-secondary-button>
                @else
                    <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                        {{ __('Create Page') }}
                    </x-jet-secondary-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Create Link Section comment  ====-->


<!--================================================
=            Delete lnk Section comment            =
=================================================-->
<x-jet-dialog-modal wire:model="modalDeleteSOISLinksFormVisible">
            <x-slot name="title">
                {{ __('Navigation Menu Item') }} {{$soisLinkID}}
            </x-slot>

            <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="link_name" value="{{ __('Do you want too delete this?') }}" />
            </div>
        </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modaDeleteeSOISLinksFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                    <x-jet-secondary-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                        {{ __('Delete Page') }}
                    </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Delete lnk Section comment  ====-->



<x-jet-dialog-modal wire:model="soisLinksInformationBox">
        <x-slot name="title">
            {{ __('SOIS Links') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <p>'SOIS Links' table is used by the SOIS: Homepage Maintenance Module to add, update, and delete other SOIS Links</p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('soisLinksInformationBox')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>





<!-- FINAL DIV.  -->
</div>
