<div class="p-6">
    <h2 class="table-title">Homepage Top Navigation Bar Types</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModel">
            {{ __('Create') }}
        </x-jet-button>
    </div>
    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($getDsiplayNavigationMenuItem->count())
                                 @foreach($getDsiplayNavigationMenuItem as $item)
                                    <tr>
                                        <td class="px-6 py-2">{{ $item->navigation_menu_type }}</td>
                                        <td class="px-6 py-2">{{ $item->navigation_menu_description }}</td>
                                        <td>
                                            <x-jet-button wire:click="updateNavTypeShowModal({{ $item->navigation_menu_types_id }})">
                                                {{__('Update')}}
                                            </x-jet-button>

                                            <x-jet-danger-button wire:click="deleteNavTypeShowModal({{ $item->navigation_menu_types_id }})">
                                                {{__('Delete')}}
                                            </x-jet-danger-button>
                                        </td>
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





<!--============================================================
=            Create Navigation Type Section comment            =
=============================================================-->

<x-jet-dialog-modal wire:model="modalCreateNavigationTypeFormVisible">
            <x-slot name="title">
                {{ __('Navigation Menu Item') }} {{$navTypeID}}
            </x-slot>

            <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="navigation_menu_type" value="{{ __('navigation_menu_type') }}" />
                <x-jet-input wire:model="navigation_menu_type" id="navigation_menu_type" class="block mt-1 w-full" type="text" />
            </div>
            <div class="mt-4">
                <x-jet-label for="navigation_menu_description" value="{{ __('navigation_menu_description') }}" />
                <x-jet-input wire:model="navigation_menu_description" id="navigation_menu_description" class="block mt-1 w-full" type="text" />
            </div>
        </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalCreateNavigationTypeFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                @if($navTypeID)
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


<!--====  End of Create Navigation Type Section comment  ====-->

<!--===========================================================
=            Delte Navigation Type Section comment            =
============================================================-->
<x-jet-dialog-modal wire:model="modalDeleteNavigationTypeFormVisible">
            <x-slot name="title">
                {{ __('Navigation Menu Item') }} {{$navTypeID}}
            </x-slot>

            <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="navigation_menu_type" value="{{ __('Do you want to delete this?') }}" />
            </div>
        </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalDeleteNavigationTypeFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                    <x-jet-secondary-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                        {{ __('Delete Page') }}
                    </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Delte Navigation Type Section comment  ====-->
























<!-- FINAL DIV -->
</div>
