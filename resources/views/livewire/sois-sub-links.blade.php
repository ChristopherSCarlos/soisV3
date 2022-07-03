<div class="p-6">
    <h2 class="table-title">PUP Organizations</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <p>
            
        {{$UserRole}}
        </p>
        @if($UserRole == 'Head of Student Services')
        <a href="{{route('admin-sub-links.create')}}">
            <x-jet-button>
                {{ __('Create New Sub Link') }}
            </x-jet-button>
        </a>
        @endif
        @if($UserRole == 'Super Admim')
        <a href="{{route('sub-links.create')}}">
            <x-jet-button>
                {{ __('Create New Sub Link') }}
            </x-jet-button>
        </a>
        @endif
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <!-- <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Organization Photo</th> -->
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sub Link Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sub Link Details</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sub Link Slug</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sub Link For General System</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sub Link For Role</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($soisLinks as $links)
                                <tr>
                                    <td class="px-6 py-2">{{ $links->sub_name }}</td>
                                    <td class="px-6 py-2">{{ $links->sub_description }}</td>
                                    <td class="px-6 py-2">
                                        <a href="{{ $links->sub_link }}" class="text-indigo-600 hover:text-indigo-900" target="_blank">
                                           {{ $links->sub_link }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-2">
                                        {{$links->sub_under_for}}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{$links->role_id}}
                                    </td>
                                    <td>
                                        <a href="{{route('sub-links.edit',$links->sois_sub_gates_id)}}">
                                            <x-jet-button>
                                                {{ __('View SOIS Gate') }}
                                            </x-jet-button>
                                        </a>
                                        <x-jet-danger-button wire:click="deleteModal({{ $links->sois_sub_gates_id }})">
                                            {{ __('Delete SOIS Sub Gate') }}
                                        </x-jet-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<x-jet-dialog-modal wire:model="modelConfirmUserDeleteVisible">
        <x-slot name="title">
            {{ __('Delete User') }}
        </x-slot>
        <x-slot name="content">
            {{ __('Are you sure you want to delete your page? Once your page is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your page.') }}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modelConfirmUserDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete User') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>




<!-- final div -->
</div>
