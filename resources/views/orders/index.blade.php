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
    <div class="row pt-4" style="padding-top: 0px !important;">
        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
        <div class="col-sm-12">
            <div class="alert alert-warning borderless">
                <h5 class="alert-heading">Note</h5>
                @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                <p>
                    Once Your order status changes from <a class="badge badge-danger" href="#">WAITING</a>
                    to <a class="badge badge-success" href="#">PROCESSED</a>, a shipment would have been
                    created for that order and you can view the status of the shipment with the order id.<br>
                    <b>Once the order is processed you cannot edit the order. Ensure the details are correct.</b>
                </p>
                @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
                <p>
                    To Process the order, <br>
                    - Create a new shipment (<i class="os-icon os-icon-globe"></i>) in the order details and
                    view the shipments with the order ID.<br>

                </p>
                @endif
                <!-- <div class="alert-btn"><a class="btn btn-white-gold" href="#"><i class="os-icon os-icon-ui-92"></i><span>Send Referral</span></a></div> -->
            </div>
        </div>
        @endif
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

                                    @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
                                    <th class="text-center">Buyer</th>
                                    @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                                    <th class="text-center">Seller</th>
                                    @endif
                                    <th class="text-center">Arrival Date</th>
                                    <!-- <th class="text-center">Pay On Arrival</th> -->
                                    <th class="text-center">Agreed Unit Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Destination Address</th>
                                    <th class="text-center">Order Status</th>
                                    <th class="text-center" id="orderAction">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($orders))
                                @foreach($orders as $order)
                                <tr>
                                    <td><span class="smaller text-center">{{ $order->contractId }}</span></td>
                                    <!-- If publisher view  buyer details -->
                                    @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
                                    <td>
                                        @if(isset($order->buyer->firstName))
                                        <div class="smaller text-center">{{ $order->buyer->firstName }}</div>
                                        @elseif(isset($order->buyer))
                                        <div class="smaller text-center">
                                            {{ \App\User::extractEmailFromResource($order->buyer) }}
                                        </div>
                                        @else
                                        <div class="smaller text-center">Unknown</div>
                                        @endif
                                    </td>
                                    <!-- If Customer view  seller details -->
                                    @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                                    <td>
                                        @if(isset($order->seller->firstName))
                                        <div class="smaller text-center">{{ $order->seller->firstName }}</div>
                                        @elseif(isset($order->seller))
                                        <div class="smaller text-center">
                                            {{ \App\User::extractEmailFromResource($order->seller) }}
                                        </div>
                                        @else
                                        <div class="smaller text-center">Unknown</div>
                                        @endif
                                    </td>
                                    @endif
                                    <td><span class="smaller text-center">{{ Carbon\Carbon::parse($order->arrivalDateTime)->isoFormat('MMM Do YYYY dddd')  }}</span></td>

                                    <td><span class="smaller text-center">
                                            {{ $order->unitPrice }} <br>
                                            @if($order->payOnArrival)
                                                Pay On Arrival:<br>( Yes )
                                            @else
                                                Pay On Arrival:<br>( No )
                                            @endif
                                        </span></td>
                                    <td><span class="smaller text-center">{{ $order->quantity }}</span></td>
                                    <td><span class="smaller text-center">{{ $order->destinationAddress }}</span></td>
                                    @if(isset($order->orderStatus))
                                        <td class="text-center">
                                            @if($order->orderStatus == \App\Http\Traits\OrderConstants::WAITING)
                                            <a class="badge badge-secondary" href="#">{{$order->orderStatus}}</a>
                                            @elseif(($order->orderStatus == \App\Http\Traits\OrderConstants::PROCESSED))
                                                <a class="badge badge-info" href="#">{{$order->orderStatus}}</a>
                                                <!-- Show what to do for customer on processed status -->
                                                @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                                                <div class="smaller lighter">
                                                    View this order in shipment. 
                                                </div>
                                                @else
                                                <div class="smaller lighter">
                                                    Shipment for this Order has been generated. 
                                                </div>
                                                @endif
                                            @elseif(($order->orderStatus == \App\Http\Traits\OrderConstants::SHIP_DELIVERED))
                                            <a class="badge badge-success" href="#">{{$order->orderStatus}}</a>
                                            @else
                                            <!-- CANCELED -->
                                            <a class="badge badge-danger" href="#">{{$order->orderStatus}}</a>
                                            @endif
                                        </td>
                                    @endif


                                    @if(isset($order->orderStatus))
                                    @if($order->orderStatus == \App\Http\Traits\OrderConstants::WAITING)
                                    <!-- <td class="row-actions">
                                                <a href="#" onclick="event.preventDefault();createShipmentOrder('{{ $order->contractId }}', '{{ $order->quantity }}');" data-placement="top" data-toggle="tooltip" title="Create Shipment"><i class="os-icon os-icon-globe"></i></a><a onclick="event.preventDefault();editOrderForm('{{ $order->contractId }}');" href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a class="danger" href="#" onclick="event.preventDefault();deleteOrderForm('{{ $order->contractId }}');" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
                                            </td> -->
                                    @endif
                                    @endif
                                    <td class="row-actions">
                                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
                                            @if(isset($order->orderStatus))
                                                @if($order->orderStatus == \App\Http\Traits\OrderConstants::WAITING)
                                                    <a href="#" onclick="event.preventDefault();createShipmentOrder('{{ $order->contractId }}', '{{ $order->quantity }}');" data-placement="top" data-toggle="tooltip" title="Create Shipment"><i class="os-icon os-icon-globe"></i></a><a onclick="event.preventDefault();editOrderForm('{{ $order->contractId }}');" href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a  onclick="event.preventDefault();orderDetailedView('{{ $order->contractId }}');" href="#" data-placement="top" data-toggle="tooltip" title="Detailed View"><i class="os-icon os-icon-eye"></i></a><a class="danger" href="#" onclick="event.preventDefault();deleteOrderForm('{{ $order->contractId }}');" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
                                                    @else
                                                    <a class="danger" href="#" data-placement="top" data-toggle="tooltip" title="Order Locked"><i class="os-icon os-icon-lock"></i></a><a  onclick="event.preventDefault();orderDetailedView('{{ $order->contractId }}');" href="#" data-placement="top" data-toggle="tooltip" title="Detailed View"><i class="os-icon os-icon-eye"></i></a>
                                                @endif
                                            @endif
                                        @endif

                                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                                            @if(isset($order->orderStatus))
                                                @if($order->orderStatus == \App\Http\Traits\OrderConstants::WAITING)
                                                    <a onclick="event.preventDefault();editOrderForm('{{ $order->contractId }}');" href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a  onclick="event.preventDefault();orderDetailedView('{{ $order->contractId }}');" href="#" data-placement="top" data-toggle="tooltip" title="Detailed View"><i class="os-icon os-icon-eye"></i></a><a class="danger" href="#" onclick="event.preventDefault();deleteOrderForm('{{ $order->contractId }}');" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
                                                @else
                                                    <a class="danger" href="#" data-placement="top" data-toggle="tooltip" title="Order Locked"><i class="os-icon os-icon-lock"></i></a><a  onclick="event.preventDefault();orderDetailedView('{{ $order->contractId }}');" href="#" data-placement="top" data-toggle="tooltip" title="Detailed View"><i class="os-icon os-icon-eye"></i></a>
                                                @endif
                                            @endif
                                        @endif
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

<!-- Modal -->
@include('partials.orders.orders_add')
@include('partials.orders.orders_edit')
@include('partials.orders.orders_delete')
@include('partials.orders.order_detailed_view')
@include('partials.shipments.shipments_add')

@endsection