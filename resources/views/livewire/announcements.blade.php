<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createAnnouncement">
            {{ __('Create Announcement') }}
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Announcement Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Announcement Content</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Signature</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Signer Position</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Expiration Data</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User Id</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Creation</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                                @if($displayAnnouncements->count())
                                    @foreach($displayAnnouncements as $item)
                                         <tr>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->announcements_id }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->announcement_title }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->announcement_content }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->signature }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->signer_position }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->exp_date }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->user_id }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                <x-jet-button wire:click="updateAnnouncementShowModal({{ $item->announcements_id }})">
                                                    {{__('Update')}}
                                                </x-jet-button>
                                                <x-jet-danger-button wire:click="deleteAnnouncementShowModal({{ $item->announcements_id }})">
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

    {{$displayAnnouncements->links()}}


<!--==================================================
=            Create Modal Section comment            =
===================================================-->

<x-jet-dialog-modal wire:model="modalCreateAnnouncementFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="announcements_title" value="{{ __('Announcement announcements_title') }}" />
                    <x-jet-input wire:model="announcements_title" id="announcements_title" class="block mt-1 w-full" type="text" />
                    @error('announcements_title') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="announcements_content" value="{{ __('Announcement announcements_content') }}" />
                    <x-jet-input wire:model="announcements_content" id="announcements_content" class="block mt-1 w-full" type="text" />
                    @error('announcements_content') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="signature" value="{{ __('Announcement signature') }}" />
                    <x-jet-input wire:model="signature" id="signature" class="block mt-1 w-full" type="text" />
                    @error('signature') <span class="error">{{ $message }}</span> @enderror
                
                    <x-jet-label for="signer_position" value="{{ __('Announcement signer_position') }}" />
                    <x-jet-input wire:model="signer_position" id="signer_position" class="block mt-1 w-full" type="text" />
                    @error('signer_position') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="exp_date" value="{{ __('Announcement exp_date') }}" />
                    <x-jet-input wire:model="exp_date" id="exp_date" class="block mt-1 w-full" type="date" />
                    @error('exp_date') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="exp_time" value="{{ __('Announcement exp_time') }}" />
                    <x-jet-input wire:model="exp_time" id="exp_time" class="block mt-1 w-full" type="time" />
                    @error('exp_time') <span class="error">{{ $message }}</span> @enderror                    
                </div>

            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalCreateAnnouncementFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="createAnnouncementProcess" wire:loading.attr="disabled">
                    {{ __('Create Announcement') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Create Modal Section comment  ====-->


<!--==================================================
=            Update Modal Section comment            =
===================================================-->
<x-jet-dialog-modal wire:model="modalUpdateAnnouncementFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="announcements_title" value="{{ __('Announcement announcements_title') }}" />
                    <x-jet-input wire:model="announcements_title" id="announcements_title" class="block mt-1 w-full" type="text" />
                    @error('announcements_title') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="announcements_content" value="{{ __('Announcement announcements_content') }}" />
                    <x-jet-input wire:model="announcements_content" id="announcements_content" class="block mt-1 w-full" type="text" />
                    @error('announcements_content') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="signature" value="{{ __('Announcement signature') }}" />
                    <x-jet-input wire:model="signature" id="signature" class="block mt-1 w-full" type="text" />
                    @error('signature') <span class="error">{{ $message }}</span> @enderror
                
                    <x-jet-label for="signer_position" value="{{ __('Announcement signer_position') }}" />
                    <x-jet-input wire:model="signer_position" id="signer_position" class="block mt-1 w-full" type="text" />
                    @error('signer_position') <span class="error">{{ $message }}</span> @enderror

                    <x-jet-label for="exp_date" value="{{ __('Announcement exp_date') }}" />
                    <x-jet-input wire:model="exp_date" id="exp_date" class="block mt-1 w-full" type="date" />
                    @error('exp_date') <span class="error">{{ $message }}</span> @enderror
                </div>

            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalUpdateAnnouncementFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="updateAnnouncementProcess" wire:loading.attr="disabled">
                    {{ __('Update Announcement') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>    


<!--====  End of Update Modal Section comment  ====-->


<!--==================================================
=            Delete Modal Section comment            =
===================================================-->
    <!-- DELETE ANNOUNCEMENT MODAL -->
        <x-jet-dialog-modal wire:model="modalDeleteAnnouncementFormVisible">
            <x-slot name="title">
                {{ __('News') }}
            </x-slot>
            <x-slot name="content">
                <div class="mt-4">
                    <x-jet-label for="article_title" value="{{ __('Are you sure you want to delete your announcenemnt? Once your announcenemnt is deleted, all of its resources and data will be permanently deleted. Do you wish to proceed?') }}" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalDeleteAnnouncementFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button class="ml-2" wire:click="deleteAnnouncementProcess" wire:loading.attr="disabled">
                    {{ __('Delete Announcement') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Delete Modal Section comment  ====-->


















</div>
