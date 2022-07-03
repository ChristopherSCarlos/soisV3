<div class="p-6">
    <h2 class="table-title">PUP Organizations</h2>

    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
            <a href="#">
            <x-jet-button>
                {{ __('Create Organization') }}
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">School Year</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Fee</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Registration Status</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($ListAcads as $item)
                                <tr>
                                    <th class="px-6 py-4 text-sm whitespace-no-wrap">#</th>
                                    <th class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->semester}}</th>
                                    <th class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->school_year}}</th>
                                    <th class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->membership_fee}}</th>
                                    <th class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->membership_start_date}}</th>
                                    <th class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->membership_end_date}}</th>
                                    <th class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->registration_status}}</th>
                                    <th class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->am_status}}</th>
                                    <th class="px-6 py-4 text-sm whitespace-no-wrap">Action</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>








<!-- final div -->
</div>
