<div class="p-6">
    <div>
    <h2 class="table-title">Officer Position Category</h2>

    <x-jet-button wire:click="createOfficerPositionModal">
            {{ __('Add New Position Category') }}
    </x-jet-button>
    </div>
    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <!-- <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th> -->
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Position Category</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($OfficerPositionData as $item)
                                            <tr>
                                                <td class="px-6 py-2">{{ $item->position_category }}</td>

                                                <td>
                                                    <x-jet-button wire:click="updateShowModal({{ $item->position_category_id }})">
                                                        {{__('Update')}}
                                                    </x-jet-button>
                                                    <x-jet-danger-button wire:click="deleteShowModal({{ $item->position_category_id }})">
                                                        {{__('Delete')}}
                                                    </x-jet-danger-button>
                                                </td>
                                                </td>
                                            </tr>
                                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{$OfficerPositionData->links()}}

         
<!--==========================================
=            Create Officer Modal            =
===========================================-->

    <x-jet-dialog-modal wire:model="CreatemodalFormVisible">
        <x-slot name="title">
            Create Officer Position
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="position_category" value="{{ __('Position Category') }}" />
                <x-jet-input wire:model="position_category" id="position_category" class="block mt-1 w-full" type="text" required/>
                @error('position_category') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('CreatemodalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Create Position Category') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

<!--====  End of Create Officer Modal  ====-->

<!--===================================================
=            Update Officer Position Modal            =
====================================================-->

<x-jet-dialog-modal wire:model="UpdatemodalFormVisible">
        <x-slot name="title">
            Update Officer Position
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="position_category" value="{{ __('Position Category') }}" />
                <x-jet-input wire:model="position_category" id="position_category" class="block mt-1 w-full" type="text" required/>
                @error('position_category') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('UpdatemodalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                {{ __('Update Position Category') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

<!--====  End of Update Officer Position Modal  ====-->

<!--==================================================
=            Delete Modal Section comment            =
===================================================-->
        <x-jet-dialog-modal wire:model="modelConfirmDeleteVisible">
            <x-slot name="title">
                {{ __('Delete Position Category') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this? Once this is deleted, all of its resources and data will be permanently deleted.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modelConfirmDeleteVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete Position Category') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Delete Modal Section comment  ====-->





<!-- final div -->
</div>
