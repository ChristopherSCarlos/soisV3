<div class="p-6">
    <h2 class="table-title">My Academic Organizations</h2>


    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <a href="https://sois-gpoa.puptaguigcs.net/officer/events/partnership-requests" target="_blank">
            <x-jet-button>
                {{ __('Visit your GPOA Pending Partnership Dashboard') }}
            </x-jet-button>
        </a>
    </div>
    


    <div class="flex flex-row flex-wrap lg:items-center justify-center align-middle">
        <div class="mx-auto">
    
    <div class="flex flex-col lg:items-center">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Organization</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">End date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($list_data_from_DB as $item)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->organization_name}}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->membership_start_date}}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->membership_end_date}}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->registration_status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        </div>

    </div>







</div>
