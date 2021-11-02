<div class="p-6">
	<div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
		<x-jet-button wire:click="createOfficerModal">
				{{ __('Add New Officer') }}
		</x-jet-button>
		@if($getAuthUserRole == 'Super Admin')
        <x-jet-button wire:click="createOfficer">
                {{ __('Add New Position Category') }}
        </x-jet-button>
        @endif
	</div>
	<div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <!-- <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th> -->
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Organization</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Position</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">School Year</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">End of term</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($OfficerData as $item)
                                            <tr>
                                                <td class="px-6 py-2">{{ $item->first_name }}</td>
                                                <td class="px-6 py-2">{{ $item->last_name }}</td>
                                                <td class="px-6 py-2">{{ $item->organization_id }}</td>
                                                <td class="px-6 py-2">{{ $item->position }}</td>
                                                <td class="px-6 py-2">{{ $item->school_year }}</td>
                                                <td class="px-6 py-2">{{ $item->semester }}</td>
                                                <td class="px-6 py-2">{{ $item->exp_date }}</td>

                                                <td>
                                                    <x-jet-button wire:click="viewShowModal({{ $item->officers_id }})">
                                                        {{__('View')}}
                                                    </x-jet-button>
                                                    <x-jet-button wire:click="updateShowModal({{ $item->officers_id }})">
                                                        {{__('Update')}}
                                                    </x-jet-button>
<!--                                                     <x-jet-button wire:click="updateImageShowModal({{ $item->organizations_id }})">
                                                        {{__('Update Logo')}}
                                                    </x-jet-button> -->
                                                    <x-jet-danger-button wire:click="deleteShowModal({{ $item->officers_id }})">
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
		 
<!--==========================================
=            Create Officer Modal            =
===========================================-->

    <x-jet-dialog-modal wire:model="CreatemodalFormVisible">
        <x-slot name="title">
            Create Officer
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="first_name" value="{{ __('first name') }}" />
                <x-jet-input wire:model="first_name" id="first_name" class="block mt-1 w-full" type="text" required/>
                @error('first_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('last name') }}" />
                <x-jet-input wire:model="last_name" id="last_name" class="block mt-1 w-full" type="text" required/>
                @error('last_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="middle_name" value="{{ __('middle name') }}" />
                <x-jet-input wire:model="middle_name" id="middle_name" class="block mt-1 w-full" type="text" required/>
                @error('middle_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="suffix" value="{{ __('suffix') }}" />
                <x-jet-input wire:model="suffix" id="suffix" class="block mt-1 w-full" type="text" required/>
                @error('suffix') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="organization_id" value="{{ __('organization_id') }}" />
                <x-jet-input wire:model="organization_id" id="organization_id" class="block mt-1 w-full" type="text" required/>
                @error('organization_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="school_year" value="{{ __('school_year') }}" />
                <x-jet-input wire:model="school_year" id="school_year" class="block mt-1 w-full" type="text" required/>
                @error('school_year') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="semester" value="{{ __('semester') }}" />
                <x-jet-input wire:model="semester" id="semester" class="block mt-1 w-full" type="text" required/>
                @error('semester') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="position" value="{{ __('position') }}" />
                <x-jet-input wire:model="position" id="position" class="block mt-1 w-full" type="text" required/>
                @error('position') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="exp_date" value="{{ __('exp_date') }}" />
                <x-jet-input wire:model="exp_date" id="exp_date" class="block mt-1 w-full" type="text" required/>
                @error('exp_date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <!-- <div class="mt-4">
                <x-jet-label for="position_category" value="{{ __('position_category') }}" />
                <x-jet-input wire:model="position_category" id="position_category" class="block mt-1 w-full" type="text" required/>
                @error('position_category') <span class="error">{{ $message }}</span> @enderror
            </div> -->
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create User') }}
                </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

<!--====  End of Create Officer Modal  ====-->








<!-- final div -->
</div>
