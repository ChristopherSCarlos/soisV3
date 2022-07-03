<div class="p-6">
    <h2 class="table-title">Upcoming Events</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="createInterfaceTypeShowModel">
            {{ __('Visit your GPOA Upcoming Event Dashboard') }}
        </x-jet-button>
    </div>
    <div class="flex flex-col ">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title of Activity</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Head Organization</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Venue</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if($list_upcoming_events->count())
                                 @foreach($list_upcoming_events as $upcomingEvents)
                                    <tr>
                                        <td class="px-6 py-2">{{ $upcomingEvents->upcoming_event_id  }}</td>
                                        <td class="px-6 py-2">{!! htmlspecialchars_decode(date('F j, Y', strtotime($upcomingEvents->date))) !!}</td>
                                        <td class="px-6 py-2">{{ $upcomingEvents->title  }}</td>
                                        <td class="px-6 py-2">{{ $upcomingEvents->head_organization }}</td>
                                        <td class="px-6 py-2">{{ $upcomingEvents->venue }}</td>
                                        <td>
                                            <x-jet-danger-button wire:click="deleteSOISLinkShowModal({{ $upcomingEvents->upcoming_event_id }})">
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

    {{$list_upcoming_events->links()}}











</div>
