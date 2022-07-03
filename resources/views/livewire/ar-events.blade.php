<div class="p-6">
    <h2 class="table-title">Events</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <a href="https://sois-gpoa.puptaguigcs.net/officer/events/partnership-requests" target="_blank">
            <x-jet-button>
                {{ __('Visit your GPOA Pending Partnership Dashboard') }}
            </x-jet-button>
        </a>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Level</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($list_data_from_db as $eventLists)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$eventLists->accomplished_event_id}}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $eventLists->title }}</td>
                                    <td class="text-center">
                                        <span  style="background-color:{{$eventLists->eventCategory->background_color}}; color:{{$eventLists->eventCategory->text_color}};">
                                            {{$eventLists->eventCategory->category}}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span  style="background-color:{{$eventLists->eventRole->background_color}}; color:{{$eventLists->eventRole->text_color}};">
                                            {{$eventLists->eventRole->event_role}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $eventLists->eventLevel->level }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap"> 
                                        @if($eventLists->start_date == $eventLists->end_date)
                                            {{date_format(date_create($eventLists->start_date), 'F d, Y')}}
                                        @else
                                            {{date_format(date_create($eventLists->start_date), 'F d, Y') . ' - ' . date_format(date_create($eventLists->end_date), 'F d, Y')}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{$list_data_from_db->links()}}





</div>
