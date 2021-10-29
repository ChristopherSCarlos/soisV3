<div class="p-6">
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Type
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Squence</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Label</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Url</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
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
                        <option value="">Hello</option>
                    @foreach($getSystemPage as $dataPages)
                        <option value="{{$dataPages->pages_id}}">{{$dataPages->title}}</option>
                    @endforeach
                </select>
                @error('label') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="sequence" value="{{ __('Sequence') }}" />
                <x-jet-input wire:model="sequence" id="sequence" class="block mt-1 w-full" type="text" />
                @error('sequence') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="sequence" value="{{ __('Type') }}" />
                <select wire:model="type" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="0">Click where the navigaiton goes</option>
                    <option value="1">TopNav</option>
                </select>
            </div>
        </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                @if($modelId)
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




















</div>
