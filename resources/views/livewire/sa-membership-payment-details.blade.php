<div class="p-6">
    <h2 class="table-title">Payment Details</h2>

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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Control Number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Membership</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Year and Section</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Amount Paid</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($list_data_from_db as $item)
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->control_number }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->semester }}({{date_format(date_create($item->membership_start_date), 'M. d, Y' )   }} - {{date_format(date_create($item->membership_end_date), 'M. d, Y' )   }})</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->last_name }} {{ $item->suffix }}, {{ $item->first_name }} {{ $item->middle_name }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->year_and_section }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->contact }}</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">₱ {{ $item->membership_fee }}.00</td>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                        <x-jet-secondary-button>
                                            {{ __('View') }}
                                        </x-jet-secondary-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{$list_data_from_db->links()}}






</div>
