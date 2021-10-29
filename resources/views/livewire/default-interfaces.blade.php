<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createDefaultInterfaceShowModel">
            {{ __('Create Default Interface') }}
        </x-jet-button>
    </div>

    <div class="article-card-container flex flex-row flex-wrap">
        @foreach($displayInterface as $defaultInterface)
        <div class="article-jumbotron bg-white shadow-2xl rounded-lg mx-auto text-center m-4 p-6" style="background: linear-gradient(200deg, {{$defaultInterface->interface_primary_color}} 0%, {{$defaultInterface->interface_secondary_color}} 51%,  {{$defaultInterface->interface_tertiary_color}} 100%);" data-aos="flip-up">
            <div class="grid grid-cols-2">
                <div class="front-article-img-container">
                    <img alt="blog photo" src="https://images.unsplash.com/photo-1542435503-956c469947f6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=967&q=80" class="max-h-80 w-full object-cover"/>
                </div>
                <div class="mt-8 flex flex-col">
                    <h3 style="color: {{$defaultInterface->interface_primary_text_color }};">{{$defaultInterface->interface_name}}</h3>
                    <hr>
                    <p style="color: {{$defaultInterface->interface_secondary_text_color }};">{{$defaultInterface->interface_description}}</p>
                    <hr>
                    <div class="inline-flex rounded-md shadow">
                        <x-jet-button  wire:click="updateDefaultInterfaceShowModel({{$defaultInterface->default_interfaces_id}})">
                            Update
                        </x-jet-button>
                        <x-jet-danger-button  wire:click="deleteDefaultInterfaceShowModel({{$defaultInterface->default_interfaces_id}})">
                            Delete
                        </x-jet-danger-button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>






<!--====================================================
=            Create Section Section comment            =
=====================================================-->
<x-jet-dialog-modal wire:model="createDefaultInterfaceShowModalFormVisible">
        <x-slot name="title">
            {{ __('Create Default Interface') }} {{$interfaceID}}
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="interface_name" value="{{ __('Interface Title') }}" />
                <x-jet-input wire:model="interface_name" id="interface_name" class="block mt-1 w-full" type="text" />
            </div>
            <div class="mt-4">
                <x-jet-label for="interface_description" value="{{ __('Interface Description') }}" />
                <x-jet-input wire:model="interface_description" id="interface_description" class="block mt-1 w-full" type="text" />
            </div>
            <div class="mt-4">
                <x-jet-label for="interface_primary_color" value="{{ __('Interface Primary Color') }}" />
                <x-jet-input wire:model="interface_primary_color" id="interface_primary_color" class="block mt-1 w-full" type="color" />
            </div>
            <div class="mt-4">
                <x-jet-label for="interface_secondary_color" value="{{ __('Interface Secondary Color') }}" />
                <x-jet-input wire:model="interface_secondary_color" id="interface_secondary_color" class="block mt-1 w-full" type="color" />
            </div>
            <div class="mt-4">
                <x-jet-label for="interface_tertiary_color" value="{{ __('Interface Tertiary Color') }}" />
                <x-jet-input wire:model="interface_tertiary_color" id="interface_tertiary_color" class="block mt-1 w-full" type="color" />
            </div>
            <div class="mt-4">
                <x-jet-label for="interface_primary_text_color" value="{{ __('Interface Primary Text Color') }}" />
                <x-jet-input wire:model="interface_primary_text_color" id="interface_primary_text_color" class="block mt-1 w-full" type="color" />
            </div>
            <div class="mt-4">
                <x-jet-label for="interface_secondary_text_color" value="{{ __('Interface Secondary Text Color') }}" />
                <x-jet-input wire:model="interface_secondary_text_color" id="interface_secondary_text_color" class="block mt-1 w-full" type="color" />
            </div>
            <div class="mt-4">
                <div class="form-group row">
                    <label for="interface_type_id" class="col-md-4 col-form-label text-md-right">interface_type_id</label>
                    <div class="col-md-6">
                        <select wire:model="interface_type_id" class="form-control">
                            <option value="" selected>Choose interface_type</option>
                            @foreach($displayInterfaceType as $interfaceType)
                                <option value="{{$interfaceType->interface_types_id}}" selected>{{$interfaceType->interface_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('createDefaultInterfaceShowModalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            @if($interfaceID)
            <x-jet-secondary-button class="ml-2" wire:click="updateInterface" wire:loading.attr="disabled">
                {{ __('Update Interface') }} {{$interfaceID}}
            </x-jet-secondary-button>
            @else
            <x-jet-secondary-button class="ml-2" wire:click="createInterface" wire:loading.attr="disabled">
                {{ __('Create Interface') }}
            </x-jet-secondary-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
<!--====  End of Create Section Section comment  ====-->


<!--==============================================================
=            Delete Default Interface Section comment            =
===============================================================-->
<x-jet-dialog-modal wire:model="deleteDefaultInterfaceShowModalFormVisible">
        <x-slot name="title">
            {{ __('Create Default Interface') }} {{$interfaceID}}
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <p>Do you want to delete this default interface?</p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteDefaultInterfaceShowModalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="deleteInterface" wire:loading.attr="disabled">
                {{ __('Delete Interface') }} {{$interfaceID}}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of Delete Default Interface Section comment  ====-->











<!-- FINAL DIV -->
</div>
