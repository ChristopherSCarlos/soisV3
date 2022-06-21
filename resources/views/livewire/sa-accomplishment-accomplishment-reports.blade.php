<div class="p-6">
    <h2 class="table-title">Events</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <a href="https://sois-gpoa.puptaguigcs.net/officer/events/partnership-requests" target="_blank">
            <x-jet-button>
                {{ __('Visit your GPOA Pending Partnership Dashboard') }}
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Inclusive Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Option</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($list_data_from_db as $eventLists)
                                <tr>
                                    <td>{{ $eventLists->accomplishment_report_id }}</td>
                                    <td>{{ $eventLists->accomplishmentReportType->accomplishment_report_type }}</td>
                                    <td>
                                        {{ $eventLists->title }}
                                    </td>
                                    <td>
                                        {{ 
                                            date_format(date_create($eventLists->start_date), 'F d, Y') . ' - ' . 
                                            date_format(date_create($eventLists->end_date), 'F d, Y') 
                                        }}
                                    </td>
                                    <td class="text-center">
                                        @if($eventLists->status == 1)
                                            <span class="badge rounded-pill fs-6 bg-warning text-dark">Pending</span>
                                        @elseif($eventLists->status == 2)
                                            <span class="badge rounded-pill fs-6 bg-success text-white">Approved</span>
                                        @elseif($eventLists->status == 3)
                                            <span class="badge rounded-pill fs-6 bg-danger text-white">Disapproved</span>
                                        @endif
                                    </td>
                                    <td>
                                        button dito para maview
                                    </td>
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





</div>
