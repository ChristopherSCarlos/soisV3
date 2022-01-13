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
                                <!-- <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Announcement Content</th> -->
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Signature</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Signer Position</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Expiration Data</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User Id</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date Creation</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">feature in slider</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                                    @if($acadsMem->count())
                                        @foreach($acadsMem as $item)
                                             <tr>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    {{ $item->student_number }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    {{ $item->first_name }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    {{ $item->middle_name }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    {{ $item->last_name }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    {{ $item->gender }}
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    <x-jet-button wire:click="viewAnnouncement({{ $item->academic_member_id }})">
                                                        {{__('View announcement')}}
                                                    </x-jet-button>
                                                </td>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                    <x-jet-button wire:click="updateAnnouncementShowModal({{ $item->academic_member_id }})">
                                                        {{__('Update')}}
                                                    </x-jet-button>
                                                    <x-jet-danger-button wire:click="deleteAnnouncementShowModal({{ $item->academic_member_id }})">
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








<x-jet-dialog-modal wire:model="modalViewMembersFormVisible">
            <x-slot name="title">
                {{ __('Member') }}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-12">
                    <div class="col-span-5 bg-red-800">1</div>
                    <div class="col-span-7 bg-yellow-800">1</div>
                </div>

            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalViewMembersFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                </x-slot>
        </x-jet-dialog-modal>







</div>
