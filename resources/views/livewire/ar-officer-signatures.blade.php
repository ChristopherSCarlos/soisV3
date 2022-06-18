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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Position Title</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Officer</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Signature</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Options</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            
                            @foreach($list_data_from_db as $positionTitle)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$positionTitle->position_title_id}}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$positionTitle->position_title}}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$positionTitle->officers->first()->full_name}}</td>
                                    @if($positionTitle->officers->first()->signature != NULL)
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap"><span class="text-center">View signature on GPOA Website</span></td>
                                    @else
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap"><span class="text-center">View signature on GPOA Website</span></td>
                                    @endif
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>






</div>
