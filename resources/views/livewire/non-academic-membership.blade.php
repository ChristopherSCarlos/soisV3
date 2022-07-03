<div class="p-6">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Non Academic Membership</h2>

    <div class="flex flex-col ">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Middle Name</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Organization</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Student number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Course</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date of Birth</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Cotnrol Number</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Address</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($displayAcademicMembers as $item)
                                   <tr>
                                       <td class="px-6 py-2">{{ $item->first_name }}</td>
                                       <td class="px-6 py-2">{{ $item->middle_name }}</td>
                                       <td class="px-6 py-2">{{ $item->last_name }}</td>
                                       <td class="px-6 py-2">{{ $item->organization_id }}</td>
                                       <td class="px-6 py-2">{{ $item->student_number }}</td>
                                       <td class="px-6 py-2">{{ $item->course_id }}</td>
                                       <td class="px-6 py-2">{{ $item->email }}</td>
                                       <td class="px-6 py-2">{{ $item->gender }}</td>
                                       <td class="px-6 py-2">{{ $item->date_of_birth }}</td>
                                       <td class="px-6 py-2">{{ $item->contact }}</td>
                                       <td class="px-6 py-2">{{ $item->address }}</td>
                                   </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{$displayAcademicMembers->links()}}



































</div>
