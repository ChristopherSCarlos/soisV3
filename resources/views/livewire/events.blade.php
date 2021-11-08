<div class="p-6">
    <h2 class="table-title">Organization Events</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createEvetnsShowModel">
            {{ __('Create Events') }}
        </x-jet-button>
    </div> 

    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <livewire:event 
                    exportable
                    hideable
                    />
                </div>
            </div>
        </div>
    </div>
    {{$getEventDataFromDB->links()}}

<!--=========================================================
=            Craete Event Modals Section comment            =
==========================================================-->
    <x-jet-dialog-modal wire:model="createEventsShowModalFormVisible">
        <x-slot name="title">
            {{ __('Create Event') }} 
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="semester" value="{{ __('Semester') }}" />
                <x-jet-input wire:model="semester" id="semester" class="block mt-1 w-full" type="text" />
                <x-jet-label for="school_year" value="{{ __('School Year') }}" />
                <x-jet-input wire:model="school_year" id="school_year" class="block mt-1 w-full" type="text" />
                <x-jet-label for="course" value="{{ __('Course') }}" />
                <x-jet-input wire:model="course" id="course" class="block mt-1 w-full" type="text" />
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">Organization</label>
                    <div class="col-md-6">
                        <select wire:model="organization" class="form-control">
                            <option value="" selected>Choose Organization</option>
                            @foreach($getOrganizationtDataFromDB as $organization)
                                <option value="{{ $organization->organizations_id }}">{{ $organization->organization_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <x-jet-label for="date" value="{{ __('date') }}" />
                <x-jet-input wire:model="date" id="date" class="block mt-1 w-full" type="date" />
                <x-jet-label for="time" value="{{ __('time') }}" />
                <x-jet-input wire:model="time" id="time" class="block mt-1 w-full" type="time" />
                <x-jet-label for="name_of_activity" value="{{ __('name_of_activity') }}" />
                <x-jet-input wire:model="name_of_activity" id="name_of_activity" class="block mt-1 w-full" type="text" />
                <x-jet-label for="objectives" value="{{ __('objectives') }}" />
                <x-jet-input wire:model="objectives" id="objectives" class="block mt-1 w-full" type="text" />
                <x-jet-label for="participants" value="{{ __('participants') }}" />
                <x-jet-input wire:model="participants" id="participants" class="block mt-1 w-full" type="number" />
                <x-jet-label for="sponsor" value="{{ __('sponsor') }}" />
                <x-jet-input wire:model="sponsor" id="sponsor" class="block mt-1 w-full" type="text" />
                <x-jet-label for="venue" value="{{ __('venue') }}" />
                <x-jet-input wire:model="venue" id="venue" class="block mt-1 w-full" type="text" />
                <x-jet-label for="type_of_activity" value="{{ __('type_of_activity') }}" />
                <x-jet-input wire:model="type_of_activity" id="type_of_activity" class="block mt-1 w-full" type="text" />
                <x-jet-label for="projected_budget" value="{{ __('projected_budget') }}" />
                <x-jet-input wire:model="projected_budget" id="projected_budget" class="block mt-1 w-full" type="number" step="any" />
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">isEventFeat</label>
                    <div class="col-md-6">
                        <select wire:model="isEventFeat" class="form-control">
                            <option value="" selected>Choose If Featuered</option>
                            <option value="1" selected>Featured Event</option>
                            <option value="0" selected>Not Featured Event</option>
                        </select>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('createEventsShowModalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Create Event') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of Craete Event Modals Section comment  ====-->


<!-- UPDATE MODALS -->
    <x-jet-dialog-modal wire:model="updateEventsShowModalFormVisible">
        <x-slot name="title">
            {{ __('Update Event') }} 
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="semester" value="{{ __('Semester') }}" />
                <x-jet-input wire:model="semester" id="semester" class="block mt-1 w-full" type="text" />

                <x-jet-label for="school_year" value="{{ __('School Year') }}" />
                <x-jet-input wire:model="school_year" id="school_year" class="block mt-1 w-full" type="text" />
                
                <x-jet-label for="course" value="{{ __('Course') }}" />
                <x-jet-input wire:model="course" id="course" class="block mt-1 w-full" type="text" />
            
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">Organization</label>
                    <div class="col-md-6">
                        <select wire:model="organization" class="form-control">
                            <option value="" selected>Choose Organization</option>
                            @foreach($getOrganizationtDataFromDB as $organization)
                                <option value="{{ $organization->organizations_id }}">{{ $organization->organization_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <x-jet-label for="date" value="{{ __('date') }}" />
                <x-jet-input wire:model="date" id="date" class="block mt-1 w-full" type="date" />

                <x-jet-label for="time" value="{{ __('time') }}" />
                <x-jet-input wire:model="time" id="time" class="block mt-1 w-full" type="time" />

                <x-jet-label for="name_of_activity" value="{{ __('name_of_activity') }}" />
                <x-jet-input wire:model="name_of_activity" id="name_of_activity" class="block mt-1 w-full" type="text" />

                <x-jet-label for="objectives" value="{{ __('objectives') }}" />
                <x-jet-input wire:model="objectives" id="objectives" class="block mt-1 w-full" type="text" />

                <x-jet-label for="participants" value="{{ __('participants') }}" />
                <x-jet-input wire:model="participants" id="participants" class="block mt-1 w-full" type="number" />

                <x-jet-label for="sponsor" value="{{ __('sponsor') }}" />
                <x-jet-input wire:model="sponsor" id="sponsor" class="block mt-1 w-full" type="text" />

                <x-jet-label for="venue" value="{{ __('venue') }}" />
                <x-jet-input wire:model="venue" id="venue" class="block mt-1 w-full" type="text" />

                <x-jet-label for="type_of_activity" value="{{ __('type_of_activity') }}" />
                <x-jet-input wire:model="type_of_activity" id="type_of_activity" class="block mt-1 w-full" type="text" />

                <x-jet-label for="projected_budget" value="{{ __('projected_budget') }}" />
                <x-jet-input wire:model="projected_budget" id="projected_budget" class="block mt-1 w-full" type="number" step="any" />

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">isEventFeat</label>
                    <div class="col-md-6">
                        <select wire:model="isEventFeat" class="form-control">
                            <option value="" selected>Choose If Featuered</option>
                            <option value="1" selected>Featured Event</option>
                            <option value="0" selected>Not Featured Event</option>
                        </select>
                    </div>
                </div>


            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('updateEventsShowModalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                {{ __('Update Event') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

<!-- DELETE MODAL  -->
        <x-jet-dialog-modal wire:model="deleteEventsShowModalFormVisible">
            <x-slot name="title">
                {{ __('Delete Event') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete your event? Once your event is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your event.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('deleteEventsShowModalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete Event') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>



<!--=========================================================
=            Update Events Image Section comment            =
==========================================================-->
<x-jet-dialog-modal wire:model="updateEventImageShowModalFormVisible">
            <x-slot name="title">
                {{ __('Delete Event') }}
            </x-slot>

            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="event_image" value="{{ __('Event Image') }}" />
                    <x-jet-input wire:model="event_image" id="event_image" class="block mt-1 w-full" type="file" />
                    @error('event_image') <span class="error">{{ $message }}</span> @enderror
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('updateEventImageShowModalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="updateEventImage" wire:loading.attr="disabled">
                    {{ __('Delete Event') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Update Events Image Section comment  ====-->























</div>
