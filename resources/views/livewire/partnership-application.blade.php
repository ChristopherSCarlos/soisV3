<div class="p-6">
    <h2 class="table-title">Events</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <a href="https://sois-gpoa.puptaguigcs.net/officer/events/partnership-requests" target="_blank">
            <x-jet-button>
                {{ __('Visit your GPOA Application Partnership Dashboard') }}
            </x-jet-button>
        </a>
    </div>
    <div class="flex flex-col items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title of Activity</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Organization</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($list_data->count())
                                 @foreach($list_data as $accomplishedEvents)
                                    <tr>
                                        <td class="px-6 py-2">{{ $accomplishedEvents->accomplished_event_id   }}</td>
                                        <td class="px-6 py-2">{{ $accomplishedEvents->title  }}</td>
                                        <td class="px-6 py-2">{{ $accomplishedEvents->organization_name  }}</td>
                                        <td>
                                            <x-jet-danger-button wire:click="deleteSOISLinkShowModal({{ $accomplishedEvents->accomplished_event_id  }})">
                                                {{__('View Event')}}
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



    {{$list_data->links()}}






</div>
