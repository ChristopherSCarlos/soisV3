<div class="p-6">
    <h2 class="table-title">Events</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <a href="https://sois-gpoa.puptaguigcs.net/officer/events/partnership-requests" target="_blank">
            <x-jet-button>
                {{ __('Visit your GPOA Pending Partnership Dashboard') }}
            </x-jet-button>
        </a>
    </div>
    <div class="flex flex-col lg:items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date and Time</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Option</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($list_data_from_db as $studentAccomplishments)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap"></td>
                                    <td>{{ $studentAccomplishments->title }}</td>
                                    <td>
                                        @if($studentAccomplishments->status == 1)
                                            <span class="badge rounded-pill fs-6 bg-warning text-dark">Pending</span>
                                        @elseif($studentAccomplishments->status == 2)
                                            <span class="badge rounded-pill fs-6 bg-success text-white">Approved</span>
                                        @elseif($studentAccomplishments->status == 3)
                                            <span class="badge rounded-pill fs-6 bg-danger text-white">Disapproved</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($studentAccomplishments->start_date == $studentAccomplishments->end_date)
                                        {{
                                            date_format(date_create($studentAccomplishments->start_date), 'F d, Y')
                                        }}
                                        @else
                                        {{
                                            date_format(date_create($studentAccomplishments->start_date), 'F d, Y') . ' - ' . date_format(date_create($studentAccomplishments->end_date), 'F d, Y')
                                        }}
                                        @endif
                                        -
                                        @if($studentAccomplishments->start_time == $studentAccomplishments->end_time)
                                        {{
                                            date_format(date_create($studentAccomplishments->start_time), 'h:i A')
                                        }}
                                        @else
                                        {{
                                            date_format(date_create($studentAccomplishments->start_time), 'h:i A') . ' - ' . date_format(date_create($studentAccomplishments->end_time), 'h:i A')
                                        }}
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
