@extends('layout.app')

@section('title', 'Shipments | Shipments Records')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
    <li class="breadcrumb-item"><span>Shipments</span></li>
</ul>
@endsection

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
    @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
        <div class="col-sm-12">
            <div class="alert alert-warning borderless">
                <h5 class="alert-heading">Note</h5>
                @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                <p>
                    You can view shipment status of your order. 
                </p>
                @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
                <p>
                    To Process the Shipment, <br>
                    <ol>
                        <li>
                            Add the books to the shipment by clicking (<i class="os-icon os-icon-book"></i>) icon.
                            Units added should be equal to units ordered.
                        </li>
                        <li>
                            Assign the shipment to your prefered distributor by clicking (<i class="os-icon os-icon-truck"></i>) icon.
                        </li>
                    </ol>                  
                </p>
                @endif
                <!-- <div class="alert-btn"><a class="btn btn-white-gold" href="#"><i class="os-icon os-icon-ui-92"></i><span>Send Referral</span></a></div> -->
            </div>
        </div>
        @endif
        <div class="col-sm-12">
            <div class="element-wrapper">
                <div class="element-actions">
                    <!-- <a class="btn btn-primary btn-sm"  data-target="#addShipmentModal" data-toggle="modal" href="#"> -->
                    <a class="btn btn-success btn-sm" data-target="#shipment403MsgModal" data-toggle="modal" href="#">
                        <i class="os-icon os-icon-ui-22"></i><span>Add Shipment</span>
                    </a>
                </div>
                <h6 class="element-header">Shipment Records</h6>
                <div class="element-box-tp">
                    <div class="table-responsive">
                        <table class="table table-padded">
                            <thead>
                                <tr>
                                    <th class="text-center">Shipment ID</th>
                                    <th class="text-center">Order</th>
                                    <th class="text-center">Shipment Status</th>
                                    <th class="text-center">Item Status</th>
                                    <th class="text-center">Units Ordered</th>
                                    <th class="text-center">Units Added</th>
                                    @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                                    @else
                                    <th class="text-center">Actions</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($shipments))
                                @foreach($shipments as $shipment)
                                <tr>
                                    <td>
                                        <div class="smaller text-center">{{ $shipment->shipmentId }}</div>
                                    </td>
                                    <td>
                                        <div class="smaller text-center">{{ $shipment->contract->contractId }}</div>
                                    </td>
                                    <td class="text-center">
                                        @if($shipment->shipmentStatus == 'WAITING')
                                        <a class="badge badge-secondary" href="#">{{ $shipment->shipmentStatus }}</a>
                                        @elseif($shipment->shipmentStatus == 'DISPATCHING')
                                        <a class="badge badge-warning" href="#">{{ $shipment->shipmentStatus }}</a>
                                        @elseif($shipment->shipmentStatus == 'SHIPPED_IN_TRANSIT')
                                        <a class="badge badge-info" href="#">{{ $shipment->shipmentStatus }}</a>
                                        @elseif($shipment->shipmentStatus == 'CANCELED')
                                        <a class="badge badge-danger" href="#">{{ $shipment->shipmentStatus }}</a>
                                        @elseif($shipment->shipmentStatus == 'DELIVERED')
                                        <a class="badge badge-success" href="#">{{ $shipment->shipmentStatus }}</a>
                                        @elseif($shipment->shipmentStatus == 'LOST')
                                        <a class="badge badge-danger" href="#">{{ $shipment->shipmentStatus }}</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="smaller text-center">{{ $shipment->itemStatus }}</div>
                                    </td>
                                    <td>
                                        <div class="smaller text-center">{{ $shipment->unitCount }}</div>
                                    </td>
                                    <td>
                                        <div class="smaller text-center">{{ count($shipment->bookRegisterShipment) }}</div>
                                    </td>

                                    @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
                                    <td class="row-actions">
                                        <a href="#" onclick="event.preventDefault();openAddBookForm('{{ $shipment->shipmentId }}');" data-placement="top" data-toggle="tooltip" title="Register Book To This Shipment"><i class="os-icon os-icon-book"></i></a><a href="#" onclick="event.preventDefault();selectDistributorForm('{{ $shipment->unitCount }}','{{ count($shipment->bookRegisterShipment) }}','{{ $shipment->shipmentId }}');" data-placement="top" data-toggle="tooltip" title="Select Distributor"><i class="os-icon os-icon-truck"></i></a>
                                        <a onclick="event.preventDefault();editShipmentForm('{{ $shipment->shipmentId }}');" href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a class="danger" href="#" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
                                    </td>
                                    @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                                    <!-- <td class="row-actions">
                                    </td> -->
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

                @include('partials.shipments.add_books')
                @include('partials.shipments.select_distributor')
                @include('partials.shipments.shipments_add')
                @include('partials.shipments.shipments_edit')
                @include('partials.shipments.shipments_403')


                <!-- <div class="element-box" style="display: none;">
                    <div class="table-responsive">
                        <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                            <thead>
                                <tr>
                                    <th>Shipment ID</th>
                                    <th>Shipment Status</th>
                                    <th>Item Status</th>
                                    <th>Unit Count</th>
                                    <th>contract</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Shipment ID</th>
                                    <th>Shipment Status</th>
                                    <th>Item Status</th>
                                    <th>Unit Count</th>
                                    <th>contract</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @if(!empty($shipments))
                                @foreach($shipments as $shipment)
                                <tr>
                                    <td>{{ $shipment->shipmentId }}</td>
                                    <td>{{ $shipment->shipmentStatus }}</td>
                                    <td>{{ $shipment->itemStatus }}</td>
                                    <td>{{ $shipment->unitCount }}</td>
                                    <td>{{ $shipment->contract->contractId }}</td>
                                    <td class="row-actions">
                                        <a href="{{ route('verify.book', $shipment->shipmentId) }}" data-placement="top" data-toggle="tooltip" title="Track Book"><i class="os-icon os-icon-truck"></i></a><a href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a class="danger" href="#" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
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
                </div> -->
            </div>
        </div>
    </div>


</div>
@endsection