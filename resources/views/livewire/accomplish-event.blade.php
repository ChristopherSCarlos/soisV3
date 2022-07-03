<div class="p-6">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <style>
        .modal-backdrop {
          z-index: -1;
        }
    </style>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @if($listAccomplishEventData->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Event Title</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Event Description</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($listAccomplishEventData as $eventLists)
                                    <tr>
                                        <td>{{$eventLists->accomplished_event_id}}</td>
                                        <td>{{$eventLists->title}}</td>
                                        <td>{{$eventLists->description}}</td>
                                        <td>
                                            <x-jet-secondary-button wire:click="viewEvent({{$eventLists->accomplished_event_id}})">
                                                View Accomplishment Report
                                            </x-jet-secondary-button>
                                        </td>    
                                    </tr>
                                @endforeach()
                            </tbody>
                        </table>
                    @else
                    @endif
                
                </div>
            </div>
        </div>
    </div>
    {{$listAccomplishEventData->links()}}


<!--================================================================
=            View Accomplishment Report Section comment            =
=================================================================-->
<x-jet-dialog-modal wire:model="modalViewEventFormVisible">
            <x-slot name="title">
                @foreach($showSelectedAccomplishEventData as $selectedEvent)
                    {{ __('Accomplishment Report: ') }} <strong>{{ $selectedEvent->title }}</strong>
                @endforeach
            </x-slot>
            <x-slot name="content">
                @foreach($showSelectedAccomplishEventData as $selectedEvents)
                <div class="flex flex-wrap flex-row">
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">organization_id</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    @foreach($showSelectedOrganization as $orgs)
                                        {{ $orgs->organization_name }}
                                    @endforeach()
                                </th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">event_category_id</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->event_category_id }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">event_role_id</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->event_role_id }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">event_nature_id</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->event_nature_id }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">event_classification_id</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->event_classification_id }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">level_id</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->level_id }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">fund_source_id</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->fund_source_id }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">title</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->title }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">description</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->description }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">objective</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->objective }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">start_date</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->start_date }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">end_date</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->end_date }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">start_time</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->start_time }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">end_time</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->end_time }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">venue</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->venue }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">activity_type</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->activity_type }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">beneficiaries</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->beneficiaries }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">total_beneficiary</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->total_beneficiary }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">sponsors</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->sponsors }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">budget</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->budget }}</th>
                           </tr>
                       </thead>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200">
                       <thead>
                           <tr>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">slug</th>
                               <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ $selectedEvent->slug }}</th>
                           </tr>
                       </thead>
                    </table>
                </div>
                <div class="mt-4">
                    <!-- <x-jet-label for="announcements_title" value="{{ $selectedEvents->title }}" /> -->
                </div>
                @endforeach
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalViewEventFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of View Accomplishment Report Section comment  ====-->






</div>
