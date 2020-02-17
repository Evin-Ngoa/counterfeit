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
                    <a class="btn btn-success btn-sm" href="#" data-target="#addOrderModal" data-toggle="modal">
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
                                    <th class="text-center">Order Status</th>
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
                                        @if(isset($order->buyer->name))
                                        <div class="smaller text-center">{{ $order->buyer->name }}</div>
                                        @else
                                        <div class="smaller text-center">Unknown</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($order->seller->name))
                                        <div class="smaller text-center">{{ $order->seller->name }}</div>
                                        @else
                                        <div class="smaller text-center">Unknown</div>
                                        @endif
                                    </td>
                                    <td><span class="smaller text-center">{{ Carbon\Carbon::parse($order->arrivalDateTime)->isoFormat('MMM Do YYYY dddd')  }}</span></td>
                                    @if($order->payOnArrival)
                                    <td><span class="smaller text-center">Yes</span></td>
                                    @else
                                    <td><span class="smaller text-center">No</span></td>
                                    @endif
                                    <td><span class="smaller text-center">{{ $order->unitPrice }}</span></td>
                                    <td><span class="smaller text-center">{{ $order->quantity }}</span></td>
                                    <td><span class="smaller text-center">{{ $order->destinationAddress }}</span></td>
                                    @if($order->orderStatus == 'WAITING')
                                    <td class="text-center"><a class="badge badge-danger" href="#">WAITING</a></td>
                                    @else
                                    <td class="text-center"><a class="badge badge-success" href="#">PROCESSED</a></td>
                                    @endif
                                    <!-- <td><span class="smaller text-center">{{ $order->lateArrivalPenaltyFactor }}</span></td>
                                    <td><span class="smaller text-center">{{ $order->damagedPenaltyFactor }}</span></td>
                                    <td><span class="smaller text-center">{{ $order->lostPenaltyFactor }}</span></td> -->


                                    @if($order->orderStatus == 'WAITING')
                                    <td class="row-actions">
                                        <a href="#" onclick="event.preventDefault();createShipmentOrder('{{ $order->contractId }}', '{{ $order->quantity }}');" data-placement="top" data-toggle="tooltip" title="Create Shipment"><i class="os-icon os-icon-globe"></i></a><a onclick="event.preventDefault();editOrderForm('{{ $order->contractId }}');" href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a class="danger" href="#" onclick="event.preventDefault();deleteOrderForm('{{ $order->contractId }}');" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
                                    </td>
                                    @endif

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

<!-- Modal -->
@include('partials.orders.orders_add')
@include('partials.orders.orders_edit')
@include('partials.orders.orders_delete')

@include('partials.shipments.shipments_add')

@endsection