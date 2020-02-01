@extends('layout.app')

@section('title', 'Orders | Orders Records')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
    <li class="breadcrumb-item"><span>Orders</span></li>
</ul>
@endsection

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <div class="element-actions">
                    <a class="btn btn-primary btn-sm" href="{{ route('order.create') }}">
                        <i class="os-icon os-icon-ui-22"></i><span>Add Order</span>
                    </a>
                </div>
                <h6 class="element-header">Order Records</h6>
                <div class="element-box-tp">
                    <div class="table-responsive">
                        <table class="table table-padded">
                            <thead>
                                <tr>
                                    <th class="text-center">Order ID</th>
                                    <th class="text-center">Buyer</th>
                                    <th class="text-center">Seller</th>
                                    <th class="text-center">Arrival Date</th>
                                    <th class="text-center">Pay On Arrival</th>
                                    <th class="text-center">Agreed Unit Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Destination Address</th>
                                    <!-- <th class="text-center">Late Arrival Penalty Factor</th>
                                    <th class="text-center">Damaged Penalty Factor</th>
                                    <th class="text-center">Lost Penalty Factor</th> -->
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($orders))
                                @foreach($orders as $order)
                                <tr>
                                    <td><span class="smaller text-center">{{ $order->contractId }}</span></td>
                                    <td>
                                        <div class="smaller text-center">{{ $order->buyer->name }}</div>
                                    </td>
                                    <td><span class="smaller text-center">{{ $order->seller->name }}</span></td>
                                    <td><span class="smaller text-center">{{ Carbon\Carbon::parse($order->arrivalDateTime)->isoFormat('MMM Do YYYY dddd')  }}</span></td>
                                    @if($order->payOnArrival)
                                    <td><span class="smaller text-center">Yes</span></td>
                                    @else
                                    <td><span class="smaller text-center">No</span></td>
                                    @endif
                                    <td><span class="smaller text-center">{{ $order->unitPrice }}</span></td>
                                    <td><span class="smaller text-center">{{ $order->quantity }}</span></td>
                                    <td><span class="smaller text-center">{{ $order->destinationAddress }}</span></td>
                                    <!-- <td><span class="smaller text-center">{{ $order->lateArrivalPenaltyFactor }}</span></td>
                                    <td><span class="smaller text-center">{{ $order->damagedPenaltyFactor }}</span></td>
                                    <td><span class="smaller text-center">{{ $order->lostPenaltyFactor }}</span></td> -->
                                    <td class="row-actions">
                                        <a href="{{ route('verify.book', $order->contractId) }}" data-placement="top" data-toggle="tooltip" title="Track Book"><i class="os-icon os-icon-truck"></i></a><a href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a class="danger" href="#" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <div class="alert alert-info" role="alert">
                                        <strong>Sorry! </strong>No Records at the moment.
                                    </div>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>



                <div class="element-box" style="display: none;">
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Buyer</th>
                                    <th>Seller</th>
                                    <th>Arrival Date</th>
                                    <th>Pay On Arrival</th>
                                    <th>Agreed Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Destination Address</th>
                                    <!-- <th>Late Arrival Penalty Factor</th>
                                    <th>Damaged Penalty Factor</th>
                                    <th>Lost Penalty Factor</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Buyer</th>
                                    <th>Seller</th>
                                    <th>Arrival Date</th>
                                    <th>Pay On Arrival</th>
                                    <th>Agreed Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Destination Address</th>
                                    <!-- <th>Late Arrival Penalty Factor</th>
                                    <th>Damaged Penalty Factor</th>
                                    <th>Lost Penalty Factor</th> -->
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @if(!empty($orders))
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->contractId }}</td>
                                    <td>
                                        <div class="smaller text-center">{{ $order->buyer->name }}</div>
                                    </td>
                                    <td>{{ $order->seller->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($order->arrivalDateTime)->isoFormat('MMM Do YYYY dddd')  }}</td>
                                    @if($order->payOnArrival)
                                    <td>Yes</td>
                                    @else
                                    <td>No</td>
                                    @endif
                                    <td>{{ $order->unitPrice }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->destinationAddress }}</td>
                                    <!-- <td>{{ $order->lateArrivalPenaltyFactor }}</td> -->
                                    <!-- <td>{{ $order->damagedPenaltyFactor }}</td> -->
                                    <!-- <td>{{ $order->lostPenaltyFactor }}</td> -->
                                    <td class="row-actions">
                                        <a href="{{ route('verify.book', $order->contractId) }}" data-placement="top" data-toggle="tooltip" title="Track Book"><i class="os-icon os-icon-truck"></i></a><a href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a class="danger" href="#" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <div class="alert alert-info" role="alert">
                                        <strong>Sorry! </strong>No Records at the moment.
                                    </div>
                                </tr>
                                @endif
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection