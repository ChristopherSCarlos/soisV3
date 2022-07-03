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

                    @if($SA_AccomplishReport->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Report uuid</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">title</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">start date</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">end date</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">reviewed by</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">View</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($SA_AccomplishReport as $report)
                                    <tr>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{$report->accomplishment_report_id}}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{$report->accomplishment_report_uuid}}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{$report->title}}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{$report->start_date}}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{$report->end_date}}
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            @if($report->reviewed_by != null)
                                                {{$report->reviewed_by}}
                                            @else
                                                Information Not Available
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <x-jet-danger-button wire:click="viewReport({{$report->accomplishment_report_id}})">
                                                {{__('View')}}
                                            </x-jet-danger-button>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    @else
                    <div class="p-6">
                        <p>No Accomplishment Report has been Added. Please Go to SOIS Accomplishment Report website to create an Accomplishment Report</p>
                        <x-jet-secondary-button>
                            @foreach($AR_report_bt as $ar_report)
                                <a href="{{$ar_report->sub_link}}">Visit Accomplishment Report Menu</a>
                            @endforeach
                        </x-jet-secondary-button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

     
    @if($SA_AccomplishReport->count())
        {{$SA_AccomplishReport->links()}}
    @endif





<!--============================================================
=            Accomplishment Rerport Section comment            =
=============================================================-->
<x-jet-dialog-modal wire:model="modalViewReportFormVisible">
            <x-slot name="title">
                @foreach($selectedReport as $selectedReports)
                    {{ __('Accomplishment Report: ') }} <strong>{{ $selectedReports->title }}</strong>
                @endforeach
            </x-slot>
            <x-slot name="content">
                @foreach($selectedReport as $selectedReport)
                <div class="flex flex-wrap flex-row">
                    <div class="" style="background:red;">
                        <div>
                            <p>organization_id</p>
                        </div>
                        <div>
                            <p>created_by</p>
                        </div>
                        <div>
                            <p>title</p>
                        </div>
                        <div>
                            <p>description</p>
                        </div>
                        <div>
                            <p>file</p>
                        </div>
                        <div>
                            <p>range_title</p>
                        </div>
                        <div>
                            <p>start_date</p>
                        </div>
                        <div>
                            <p>end_date</p>
                        </div>
                        <div>
                            <p>reviewed_by</p>
                        </div>
                        <div>
                            <p>reviewed_at</p>
                        </div>
                        <div>
                            <p>remarks</p>
                        </div>
                        <div>
                            <p>read_at</p>
                        </div>
                    </div>
                    <div class="" style="background:blue;">
                        <div>
                            <p>{{ $selectedReports->organization_id }}</p>
                        </div>
                        <div>
                            <p>{{ $selectedReports->created_by }}</p>
                        </div>
                        <div>
                            <p>{{ $selectedReports->title }}</p>
                        </div>
                        <div>
                            <p>{{ $selectedReports->description }}</p>
                        </div>
                        <div>
                            <button></button>
                        </div>
                        <div>
                            <p>{{ $selectedReports->range_title }}</p>
                        </div>
                        <div>
                            <p>{{ $selectedReports->start_date }}</p>
                        </div>
                        <div>
                            <p>{{ $selectedReports->end_date }}</p>
                        </div>
                        <div>
                            @if($report->reviewed_by != null)
                                <p>{{ $selectedReports->reviewed_by }}</p>
                            @else
                                <p>Information Not Available</p>
                            @endif
                        </div>
                        <div>
                            @if($report->reviewed_by != null)
                                <p>{{ $selectedReports->reviewed_at }}</p>
                            @else
                                <p>Information Not Available</p>
                            @endif
                        </div>
                        <div>
                            @if($report->reviewed_by != null)
                                <p>{{ $selectedReports->remarks }}</p>
                            @else
                                <p>Information Not Available</p>
                            @endif
                        </div>
                        <div>
                            @if($report->reviewed_by != null)
                                <p>{{ $selectedReports->read_at }}</p>
                            @else
                                <p>Information Not Available</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <x-jet-label for="announcements_title" value="{{ $selectedReport->title }}" />
                </div>
                @endforeach
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalViewReportFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>


<!--====  End of Accomplishment Rerport Section comment  ====-->








</div>
