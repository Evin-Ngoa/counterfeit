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
        <div class="col-sm-12">
            <div class="element-wrapper">
                <div class="element-actions">
                    <!-- <a class="btn btn-primary btn-sm"  data-target="#addShipmentModal" data-toggle="modal" href="#"> -->
                    <a class="btn btn-success btn-sm"  data-target="#shipment403MsgModal" data-toggle="modal" href="#">
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
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($shipments))
                                @foreach($shipments as $shipment)
                                <tr>
                                    <td><div class="smaller text-center">{{ $shipment->shipmentId }}</div></td>
                                    <td><div class="smaller text-center">{{ $shipment->contract->contractId }}</div></td>
                                    <td>
                                        <div class="smaller text-center">{{ $shipment->shipmentStatus }}</div>
                                    </td>
                                    <td><div class="smaller text-center">{{ $shipment->itemStatus }}</div></td>
                                    <td><div class="smaller text-center">{{ $shipment->unitCount }}</div></td>
                                    <td><div class="smaller text-center">{{ count($shipment->bookRegisterShipment) }}</div></td>
                                    <td class="row-actions">
                                        <a href="#" onclick="event.preventDefault();openAddBookForm('{{ $shipment->shipmentId }}');" data-placement="top" data-toggle="tooltip" title="Register Book To This Shipment"><i class="os-icon os-icon-book"></i></a><a href="#" onclick="event.preventDefault();selectDistributorForm(100,100,'{{ $shipment->shipmentId }}');" data-placement="top" data-toggle="tooltip" title="Select Distributor"><i class="os-icon os-icon-truck"></i></a>
                                        <a href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a class="danger" href="#" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
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

                @include('partials.shipments.add_books')
                @include('partials.shipments.select_distributor')
                @include('partials.shipments.shipments_add')
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