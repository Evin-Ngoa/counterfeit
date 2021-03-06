@extends('layout.app')

@section('title', 'Report Cases | Report Records')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
    <li class="breadcrumb-item"><span>Report Cases</span></li>
</ul>
@endsection

@section('content-box')
<div class="content-box">

    <div class="row">
        <div class="col-sm-12 col-xxxl-12">
            <div class="element-wrapper">
                <h6 class="element-header">Reports</h6>
                <div class="element-box">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th class="text-center">Report ID</th>
                                    <th class="text-center">Book ID</th>
                                    <th class="text-center">Reporter Email</th>
                                    <th class="text-center">Involved Bookseller</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div id="add-report-msgs"></div>
                                <div class="alert alert-danger" id="add-error-report-bag" style="display: none;">
                                    <ul id="add-report-errors">
                                    </ul>
                                </div>
                                {{-- dd($ordersWaitingProcessed) --}}
                                {{-- dd(\App\User::isCustomerRetailer()) --}}
                                @foreach($report as $activeReports)
                                <tr>
                                    <td class="nowrap text-center" style="font-size: .73rem;">{{ $activeReports->id }}</td>
                                    <td class="text-center" style="font-size: .73rem;">
                                        {{-- \App\User::extractEmailFromResource($activeReports->seller) --}}
                                        {{ $activeReports->book->id}}
                                    </td>
                                    <td class="text-center" style="font-size: .73rem;">{{$activeReports->reportedBy->email}}</td>
                                    <td class="text-center" style="font-size: .73rem;">{{$activeReports->store->email}}</td>
                                    <td class="text-center" style="font-size: .73rem;">
                                        @if($activeReports->isConfirmed == false )
                                            @isset($activeReports->updatedAt)
                                                <div class="status-pill red" data-title="Declined" data-toggle="tooltip" data-original-title="" title=""></div>
                                                <!-- <div class="status-pill yellow" data-title="Not Investigated" data-toggle="tooltip" data-original-title="" title=""></div> -->
                                            @else
             
                                                <!-- <div class="status-pill red" data-title="Declined" data-toggle="tooltip" data-original-title="" title=""></div> -->
                                                <div class="status-pill yellow" data-title="Not Investigated" data-toggle="tooltip" data-original-title="" title=""></div>
                                            @endisset
                                        @elseif($activeReports->isConfirmed == true)
                                        <div class="status-pill green" data-title="Confirmed" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @else
                                        
                                        @endif
                                    </td>
                                    <td class="text-center" style="font-size: .73rem;">{{$activeReports->description}}</td>
                                    @if($activeReports->isConfirmed == false)
                                        @isset($activeReports->updatedAt)
                                        <td class="text-center" style="font-size: .73rem;">
                                            <div class="pt-btn">
                                                <a class="btn btn-success btn-sm" href="#" onclick="event.preventDefault();traceReportConfirmation('{{ $activeReports->id }}');">Trace</a>
                                            </div>
                                        </td>
                                        
                                        @else
                                        <td class="text-center" style="font-size: .73rem;">
                                            <div class="pt-btn">
                                                <a class="btn btn-success btn-sm" href="#" onclick="event.preventDefault();updateTrueIsConfirmedReport('{{ $activeReports->id }}', '{{ $activeReports->book->id }}', '{{ $activeReports->book->shipment->shipmentId }}', '{{ $activeReports->reportedBy->email }}', '{{ \App\User::getUserRole() }}', '{{ \App\User::loggedInUserEmail() }}' );">Confirm</a>
                                                <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault();updateFalseIsConfirmedReport('{{ $activeReports->id }}', '{{ $activeReports->book->id }}', '{{ $activeReports->book->shipment->shipmentId }}', '{{ $activeReports->reportedBy->email }}', '{{ \App\User::getUserRole() }}', '{{ \App\User::loggedInUserEmail() }}' );">Decline</a>
                                            </div>
                                        </td>
                                        @endisset
                                    @else
                                    <td class="text-center" style="font-size: .73rem;">
                                        <div class="pt-btn">
                                            <a class="btn btn-success btn-sm" href="#" onclick="event.preventDefault();traceReportConfirmation('{{ $activeReports->id }}');">Trace</a>
                                        </div>
                                    </td>
                                    @endif
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

@endsection