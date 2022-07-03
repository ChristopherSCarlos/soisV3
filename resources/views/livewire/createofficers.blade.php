<div>
        @if($getUserRole == 'Super Admin')
            <a href="{{route('sadmin-officers.create')}}">
                <x-jet-button>
                    {{ __('Add Officer') }}
                </x-jet-button>
            </a>
        @else
            <a href="{{route('admin-officers.create')}}">
                <x-jet-button>
                    {{ __('Add Officer') }}
                </x-jet-button>
            </a>
        @endif
<!-- <a href="{{route('admin-officers.create')}}">
    <x-jet-button>
        {{ __('Add Officer') }}
    </x-jet-button>
</a> -->

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
                        <option value="{{$orgs->organization_id}}">{{$orgs->organization_name}}</option>
                    @endforeach
                </select>
                @error('organization_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="position_title_id" value="{{ __('Position') }}" />
                <x-jet-input wire:model="position_title_id" id="position_title_id" class="block mt-1 w-full" type="text" required/>
                @error('position') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="term_start" value="{{ __('Start Term') }}" />
                <x-jet-input wire:model="term_start" id="term_start" class="block mt-1 w-full" type="date" required/>
                @error('term_start') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="term_end" value="{{ __('End Term') }}" />
                <x-jet-input wire:model="term_end" id="term_end" class="block mt-1 w-full" type="date" required/>
                @error('term_end') <span class="error">{{ $message }}</span> @enderror
            </div>
            <!-- <div class="mt-4">
                <x-jet-label for="officer_signature" value="{{ __('Officer Signature') }}" />
                <x-jet-input wire:model="officer_signature" id="officer_signature" class="block mt-1 w-full" type="file" />
                @error('officer_signature') <span class="error">{{ $message }}</span> @enderror
            </div> -->
            
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
</div>
<!--====  End of Create Officer Modal  ====-->