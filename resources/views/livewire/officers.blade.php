<div class="p-6">
	<div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
		<x-jet-button wire:click="createOfficerModal">
				{{ __('Add New Officer') }}
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Organization</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Position</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">School Year</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">End of term</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Position Category</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($OfficerData as $item)
                                            <tr>
                                                <td class="px-6 py-2">{{ $item->first_name }}</td>
                                                <td class="px-6 py-2">{{ $item->last_name }}</td>
                                                @foreach($getOrganization as $orgs)
                                                    @if($item->organization_id == $orgs->organizations_id)
                                                        <td class="px-6 py-2">{{ $orgs->organization_name }}</td>
                                                    @endif
                                                @endforeach
                                                <!-- <td class="px-6 py-2">{{ $item->organization_id }}</td> -->
                                                <td class="px-6 py-2">{{ $item->position }}</td>
                                                <td class="px-6 py-2">{{ $item->school_year }}</td>
                                                <td class="px-6 py-2">{{ $item->semester }}</td>
                                                <td class="px-6 py-2">{{ $item->exp_date }}</td>
                                                @foreach($getOfficerPosition as $op)
                                                    @if($item->position_category == $op->officer_positions_id)
                                                        <td class="px-6 py-2">{{ $op->position_category }}</td>
                                                    @endif
                                                @endforeach
                                                <!-- <td class="px-6 py-2">{{ $item->position_category }}</td> -->

                                                <td>
                                                    <x-jet-button wire:click="viewShowModal({{ $item->officers_id }})">
                                                        {{__('View')}}
                                                    </x-jet-button>
                                                    <x-jet-button wire:click="updateShowModal({{ $item->officers_id }})">
                                                        {{__('Update')}}
                                                    </x-jet-button>
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
                <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                <x-jet-input wire:model="first_name" id="first_name" class="block mt-1 w-full" type="text" required/>
                @error('first_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input wire:model="last_name" id="last_name" class="block mt-1 w-full" type="text" required/>
                @error('last_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="middle_name" value="{{ __('Middle Name') }}" />
                <x-jet-input wire:model="middle_name" id="middle_name" class="block mt-1 w-full" type="text" required/>
                @error('middle_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="suffix" value="{{ __('Suffix') }}" />
                <x-jet-input wire:model="suffix" id="suffix" class="block mt-1 w-full" type="text" required/>
                @error('suffix') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="organization_id" value="{{ __('Organization') }}" />
                <select wire:model="organization_id" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option default hidden>Choose organization</option>
                    @foreach($getOrganization as $orgs)
                        <option value="{{$orgs->organizations_id}}">{{$orgs->organization_name}}</option>
                    @endforeach
                </select>
                @error('organization_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="school_year" value="{{ __('School Year') }}" />
                <x-jet-input wire:model="school_year" id="school_year" class="block mt-1 w-full" type="text" required/>
                @error('school_year') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="semester" value="{{ __('Semester') }}" />
                <x-jet-input wire:model="semester" id="semester" class="block mt-1 w-full" type="text" required/>
                @error('semester') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="position" value="{{ __('Position') }}" />
                <x-jet-input wire:model="position" id="position" class="block mt-1 w-full" type="text" required/>
                @error('position') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="exp_date" value="{{ __('Exp Date') }}" />
                <x-jet-input wire:model="exp_date" id="exp_date" class="block mt-1 w-full" type="date" required/>
                @error('exp_date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="position_category" value="{{ __('Position Category') }}" />
                <select wire:model="position_category" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option default hidden>Choose Position Category</option>
                    @foreach($getOfficerPosition as $op)
                        <option value="{{$op->officer_positions_id}}">{{$op->position_category}}</option>
                    @endforeach
                </select>
                @error('position_category') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('CreatemodalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create User') }}
                </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

<!--====  End of Create Officer Modal  ====-->

<!--==========================================
=            Update Officer Modal            =
===========================================-->

    <x-jet-dialog-modal wire:model="updatemodalFormVisible">
        <x-slot name="title">
            Create Officer
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                <x-jet-input wire:model="first_name" id="first_name" class="block mt-1 w-full" type="text" required/>
                @error('first_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input wire:model="last_name" id="last_name" class="block mt-1 w-full" type="text" required/>
                @error('last_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="middle_name" value="{{ __('Middle Name') }}" />
                <x-jet-input wire:model="middle_name" id="middle_name" class="block mt-1 w-full" type="text" required/>
                @error('middle_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="suffix" value="{{ __('Suffix') }}" />
                <x-jet-input wire:model="suffix" id="suffix" class="block mt-1 w-full" type="text" required/>
                @error('suffix') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="organization_id" value="{{ __('Organization') }}" />
                <select wire:model="organization_id" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option default hidden>Choose organization</option>
                    @foreach($getOrganization as $orgs)
                        <option value="{{$orgs->organizations_id}}">{{$orgs->organization_name}}</option>
                    @endforeach
                </select>
                @error('organization_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="school_year" value="{{ __('School Year') }}" />
                <x-jet-input wire:model="school_year" id="school_year" class="block mt-1 w-full" type="text" required/>
                @error('school_year') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="semester" value="{{ __('Semester') }}" />
                <x-jet-input wire:model="semester" id="semester" class="block mt-1 w-full" type="text" required/>
                @error('semester') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="position" value="{{ __('Position') }}" />
                <x-jet-input wire:model="position" id="position" class="block mt-1 w-full" type="text" required/>
                @error('position') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="exp_date" value="{{ __('Exp Date') }}" />
                <x-jet-input wire:model="exp_date" id="exp_date" class="block mt-1 w-full" type="date" required/>
                @error('exp_date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="position_category" value="{{ __('Position Category') }}" />
                <select wire:model="position_category" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option default hidden>Choose Position Category</option>
                    @foreach($getOfficerPosition as $op)
                        <option value="{{$op->officer_positions_id}}">{{$op->position_category}}</option>
                    @endforeach
                </select>
                @error('position_category') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('updatemodalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update Officer') }}
                </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

<!--====  End of Update Officer Modal  ====-->

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






<!-- final div -->
</div>
