<div class="p-6">
    <h2 class="table-title">Organization Officers</h2>

@livewireStyles
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <!-- <x-jet-button wire:click="createOfficerModal">
                {{ __('Add New Officer') }}
        </x-jet-button> -->
    </div>
    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <livewire:Officer 
                    exportable
                    hideable
                    />
            </div>
        </div>
    </div>

<!--==========================================
=            Delete Officer Modal            =
===========================================-->

    <x-jet-dialog-modal wire:model="modelConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Officer') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this officer? Once this officer is deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modelConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Officer') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

<!--====  End of Delete Officer Modal  ====-->





@livewireScripts
<!-- final div -->
</div>
