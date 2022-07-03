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
		 



@livewireScripts
<!-- final div -->
</div>
