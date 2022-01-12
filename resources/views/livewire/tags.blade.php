<div class="p-6">
    <h2 class="table-title">Available Hashtags</h2>

     <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <a href="{{$link}}" target="_blank">
        <x-jet-button>
            {{ __('Open New tab') }}
        </x-jet-button>
        </a>
        <x-jet-button wire:click="createTags">
            {{ __('Create Tags') }}
        </x-jet-button>
    </div>
    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tag Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tag Description</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Tag Type</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($getTags->count())
                                @foreach($getTags as $item)
                                    <tr>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->tags_id }}
                                       </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <a class="text-indigo-600 hover:text-indigo-900" targets="_blank"href="{{ URL::to('/'.$item->tags_name) }}">
                                                {{ $item->tags_name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->tags_description }}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->tags_type }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-right">
                                            <x-jet-button wire:click="updateShowModal({{ $item->tags_id }})">
                                                {{__('Update')}}
                                            </x-jet-button>

                                            <x-jet-danger-button wire:click="deleteShowModal({{ $item->tags_id }})">
                                                {{__('Delete')}}
                                            </x-jet-danger-button>
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
    {{ $getTags->links() }}

<!--=================================================
=            Create Tags Section comment            =
==================================================-->
     <x-jet-dialog-modal wire:model="modalCreateTagsFormVisible">
        <x-slot name="title">
            {{ __('Create Tags') }} 
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="tagName" value="{{ __('Tag Name') }}" />
                <x-jet-input wire:model="tagName" id="tagName" class="block mt-1 w-full" type="text" />

                <x-jet-label for="tagDescription" value="{{ __('Tag Description') }}" />
                <x-jet-input wire:model="tagDescription" id="tagDescription" class="block mt-1 w-full" type="text" />

                <x-jet-label for="tagType" value="{{ __('tagType') }}" />
                <x-jet-input wire:model="tagType" id="tagType" class="block mt-1 w-full" type="number" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalCreateTagsFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Create Tags') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of Create Tags Section comment  ====-->

<!--=================================================
=            Update Tags Section comment            =
==================================================-->
     <x-jet-dialog-modal wire:model="modalUpdateTagsFormVisible">
        <x-slot name="title">
            {{ __('Update Tags') }} 
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="tagName" value="{{ __('Tag Name') }}" />
                <x-jet-input wire:model="tagName" id="tagName" class="block mt-1 w-full" type="text" />

                <x-jet-label for="tagDescription" value="{{ __('Tag Description') }}" />
                <x-jet-input wire:model="tagDescription" id="tagDescription" class="block mt-1 w-full" type="text" />

                <x-jet-label for="tagType" value="{{ __('tagType') }}" />
                <x-jet-input wire:model="tagType" id="tagType" class="block mt-1 w-full" type="number" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalUpdateTagsFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                {{ __('Update Tags') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of Update Tags Section comment  ====-->


<!--===================================================
=            Delete Modals Section comment            =
====================================================-->
     <x-jet-dialog-modal wire:model="modalDeleteTagsFormVisible">
        <x-slot name="title">
            {{ __('Delete Tags') }} 
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="tagName" value="{{ __('Do you want to Delete this tag?') }}" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalDeleteTagsFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Tags') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>


<!--====  End of Delete Modals Section comment  ====-->






</div>
