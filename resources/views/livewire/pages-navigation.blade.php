<div class="p-6">
    <h2 class="table-title">SOIS: Homepage Navigation Bar</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createShowModel">
            {{ __('Create') }}
        </x-jet-button>

        <x-jet-button wire:click="infoShowModel" class="ml-5 bg-green-900" style="background: green;">
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Type
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Squence</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Label</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Url</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sync Type</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($data->count())
                                 @foreach($data as $item)
                                    <tr>
                                        <td class="px-6 py-2">{{ $item->type }}</td>
                                        <td class="px-6 py-2">{{ $item->sequence }}</td>
                                        <td class="px-6 py-2">{{ $item->label }}</td>
                                        <td class="px-6 py-2">
                                            <a href="{{ url($item->slug) }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                                               {{ $item->slug }}
                                            </a>
                                        </td>
                                        <td>
                                            <x-jet-button wire:click="updateShowModal({{ $item->navigation_menus_id }})">
                                                {{__('Update')}}
                                            </x-jet-button>

                                            <x-jet-danger-button wire:click="deleteShowModal({{ $item->navigation_menus_id }})">
                                                {{__('Delete')}}
                                            </x-jet-danger-button>
                                        </td>
                                        <td>
                                            <x-jet-button wire:click="syncNavigationType({{ $item->navigation_menus_id }})">
                                                {{__('Sync')}}
                                            </x-jet-button>
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
    {{ $data->links() }}


<x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('Navigation Menu Item') }} {{$modelId}}
            </x-slot>

            <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="label" value="{{ __('Label') }}" />
                <select wire:model="label" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option default hidden>Choose label</option>
                    @foreach($getSystemPage as $dataPages)
                        <option value="{{$dataPages->pages_id}}">{{$dataPages->title}}</option>
                    @endforeach
                </select>
                    
                
                @if($inputLabelError == 1)
                    <p>Label needs some input from you</p>
                @endif
            </div>
            <div class="mt-4">
                <x-jet-label for="sequence" value="{{ __('Sequence') }}" />
                <x-jet-input wire:model="sequence" id="sequence" class="block mt-1 w-full" type="text" />
                @if($inputTypeError == 1)
                    <p>Type needs some input from you</p>
                @endif
            </div>
            <div class="mt-4">
                <x-jet-label for="sequence" value="{{ __('Type') }}" />
                <select wire:model="type" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option default hidden>Click where the navigaiton goes</option>
                    <option value="1">TopNav</option>
                </select>
            </div>
        </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                    <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                        {{ __('Create Page') }}
                    </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>

<x-jet-dialog-modal wire:model="updatemodalFormVisible">
            <x-slot name="title">
                {{ __('Navigation Menu Item') }}
            </x-slot>

            <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="label" value="{{ __('Label') }}" />
                <select wire:model="label" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="label" required>
                        <!-- <option hidden default value="">Choose a Label</option> -->
                    @foreach($getSystemPage as $dataPages)
                        <option value="{{$dataPages->pages_id}}">{{$dataPages->title}}</option>
                    @endforeach
                </select>
                @error('label') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="sequence" value="{{ __('Sequence') }}" />
                <x-jet-input wire:model="sequence" id="sequence" class="block mt-1 w-full" type="text" placeholder="sequence" />
                @error('sequence') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="sequence" value="{{ __('Type') }}" />
                <select wire:model="type" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="type" required>
                    <option value="1">TopNav</option>
                </select>
            </div>
        </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('updatemodalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                    <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                        {{ __('Update Page') }}
                    </x-jet-secondary-button>  

            </x-slot>
        </x-jet-dialog-modal>

<x-jet-dialog-modal wire:model="modelConfirmDeleteVisible">
            <x-slot name="title">
                {{ __('Delete Page') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this? Once this is deleted, all of its resources and data will be permanently deleted.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modelConfirmDeleteVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>









                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>



<!--==========================================================
=            Sync Navigation type Section comment            =
===========================================================-->
<x-jet-dialog-modal wire:model="modelSyncNavigationTypesVisible">
            <x-slot name="title">
                {{ __('Add Navigation To:') }}
            </x-slot>

            <x-slot name="content">
                <div class="mt-4">
                    <input type="checkbox" id="is_topnav" name="1" value="1" wire:model="is_topnav">
                    <label for="is_topnav">Top Navigation</label><br>
                </div>
                <div class="mt-4">
                    <input type="checkbox" id="is_footer" name="1" value="1" wire:model="is_footer">
                    <label for="is_footer">Fotoer</label><br>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modelSyncNavigationTypesVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-danger-button class="ml-2" wire:click="syncNavtypes" wire:loading.attr="disabled">
                    {{ __('Sync Navigation type') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>




<!--====  End of Sync Navigation type Section comment  ====-->






<x-jet-dialog-modal wire:model="InformationBox">
        <x-slot name="title">
            {{ __('SOIS: Homepage Navigation Bar') }}
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <p>'SOIS: Homepage Navigation Bar' table is used by the SOIS: Homepage Maintenance Module to add and delete button links on the homepage navigation bar</p>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('InformationBox')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>










</div>
