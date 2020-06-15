@extends('layout.app')

@section('title', 'Welcome Dashboard')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
    <li class="breadcrumb-item"><span>Dashboard</span></li>
</ul>
@endsection

@section('content-box')
<div class="content-box">
    <div class="row">
        <div class="col-sm-12">
            <div class="element-wrapper">
                @if(\App\User::isCustomerRetailer())
                    <h6 class="element-header">Retailer Dashboard</h6> 
                @else
                    <h6 class="element-header">{{ $role }} Dashboard</h6> 
                @endif
                <div class="element-content">
                    <div class="row">
                        <!-- Orders Customer-->
                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                        <div class="col-sm-4 col-xxxl-4">
                            <a class="element-box el-tablo" href="{{ route('order.view',  ['id' => \App\User::loggedInUserEmail()]) }}">
                                <div class="label">Active Orders</div>
                                <div class="value">{{ $ordersCount }}</div>
                                <!-- <div class="trending trending-up-basic"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div> -->
                            </a>
                        </div>
                        <div class="col-sm-4 col-xxxl-4">
                            <a class="element-box el-tablo" href="#">
                                <div class="label">Active Shipments</div>
                                <div class="value">{{ $shipmentsCount }}</div>
                                <div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-down"></i></div>
                            </a>
                        </div>
                            @if(\App\User::isCustomerRetailer())
                                <div class="col-sm-4 col-xxxl-4">
                                    <a class="element-box el-tablo" href="#">
                                        <div class="label">Purchase Requests</div>
                                        <div class="value">{{ $purchaseRequestsCount }}</div>
                                    </a>
                                </div>
                            @else
                                <div class="col-sm-4 col-xxxl-4">
                                    <a class="element-box el-tablo" href="#">
                                        <div class="label">Delivered</div>
                                        <div class="value">{{ $ordersDeliveredCount }}</div>
                                        <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>
                                    </a>
                                </div>
                            @endif
                        @endif

                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)

                        <div class="col-sm-4 col-xxxl-4">
                            <a class="element-box el-tablo" href="{{ route('order.view',  ['id' => \App\User::loggedInUserEmail()]) }}">
                                <div class="label">Active Orders</div>
                                <div class="value">{{ $ordersCount }}</div>
                                <!-- <div class="trending trending-up-basic"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div> -->
                            </a>
                        </div>
                        <div class="col-sm-4 col-xxxl-4">
                            <a class="element-box el-tablo" href="{{ route('shipment.view',  ['id' => \App\User::loggedInUserEmail()]) }}">
                                <div class="label">Active Shipments</div>
                                <div class="value">{{ $shipmentsCount }}</div>
                                <div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-down"></i></div>
                            </a>
                        </div>
                        <div class="col-sm-4 col-xxxl-4">
                            <a class="element-box el-tablo" href="{{ route('book.view', ['id' => \App\User::loggedInUserEmail()]) }}">
                                <div class="label">Registered Books</div>
                                <div class="value">{{ $booksPubCount }}</div>
                                <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>
                            </a>
                        </div>

                        @endif

                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR)
                        <div class="col-sm-4 col-xxxl-4">
                            <a class="element-box el-tablo" href="{{ route('order.view',  ['id' => \App\User::loggedInUserEmail()]) }}">
                                <div class="label">Active Shipments</div>
                                <div class="value">{{ $shipmentsCount }}</div>
                                <!-- <div class="trending trending-up-basic"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div> -->
                            </a>
                        </div>
                        @endif

                        <!-- Admin-->
                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
                        <div class="col-sm-4 col-xxxl-4">
                            <a class="element-box el-tablo" href="{{ route('publisher.index') }}">
                                <div class="label">Publishers</div>
                                <div class="value">{{ $publishersCount }}</div>
                                <!-- <div class="trending trending-up-basic"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div> -->
                            </a>
                        </div>
                        <div class="col-sm-4 col-xxxl-4">
                            <a class="element-box el-tablo" href="{{ route('distributor.index') }}">
                                <div class="label">Distributors</div>
                                <div class="value">{{ $distributorsCount }}</div>
                                <div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-down"></i></div>
                            </a>
                        </div>
                        <div class="col-sm-4 col-xxxl-4">
                            <a class="element-box el-tablo" href="{{ route('customer.index') }}">
                                <div class="label">Consumers</div>
                                <div class="value">{{ $customersCount }}</div>
                                <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Customer-->
    @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
        @if(\App\User::isCustomerRetailer())
        <div class="row">
            <div class="col-sm-12 col-xxxl-12">
                <div class="element-wrapper">
                    <h6 class="element-header">Active Purchase Requests</h6>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table class="table table-lightborder">
                                <thead>
                                    <tr>
                                        <th class="text-center">Request ID</th>
                                        <th class="text-center">Book ID</th>
                                        <th class="text-center">Buyer Email</th>
                                        <th class="text-center">Seller Email</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div id="add-request-msgs"></div>
                                    <div class="alert alert-danger" id="add-error-request-bag" style="display: none;">
                                        <ul id="add-request-errors">
                                        </ul>
                                    </div>
                                    {{-- dd($ordersWaitingProcessed) --}}
                                    {{-- dd(\App\User::isCustomerRetailer()) --}}
                                    @foreach($purchaseRequests as $activeRequests)
                                    <tr>
                                        <td class="nowrap text-center" style="font-size: .73rem;">{{ $activeRequests->id }}</td>
                                        <td class="text-center" style="font-size: .73rem;">
                                            {{-- \App\User::extractEmailFromResource($activeRequests->seller) --}}
                                            {{ $activeRequests->book->id}}
                                        </td>
                                        <td class="text-center" style="font-size: .73rem;">{{$activeRequests->purchasedBy->email}}</td>
                                        <td class="text-center" style="font-size: .73rem;">{{$activeRequests->purchasedTo->email}}</td>
                                        <td class="text-center" style="font-size: .73rem;">
                                            @if($activeRequests->status == false)
                                            <div class="status-pill yellow" data-title="Waiting" data-toggle="tooltip" data-original-title="" title=""></div>
                                            @elseif($activeRequests->status == true)
                                            <div class="status-pill green" data-title="Confirmed" data-toggle="tooltip" data-original-title="" title=""></div>
                                            @else
                                            @endif
                                        </td>
                                        <td class="text-center" style="font-size: .73rem;">
                                            <div class="pt-btn">
                                                <a class="btn btn-success btn-sm" href="#" onclick="event.preventDefault();updatePurchaseRequest('{{ $activeRequests->id }}', '{{ $activeRequests->book->id }}', '{{ $activeRequests->book->shipment->shipmentId }}', '{{ $activeRequests->purchasedBy->email }}' );">Confirm</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    <div class="row">
        <div class="col-sm-12 col-xxxl-12">
            <div class="element-wrapper">
                <h6 class="element-header">Active Orders</h6>
                <div class="element-box">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th class="text-center">OrderID</th>
                                    <th class="text-center">Seller</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Unit Price [KES]</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- dd($ordersWaitingProcessed) --}}
                                @foreach($ordersWaitingProcessed as $activeOrder)
                                <tr>
                                    <td class="nowrap text-center">{{ $activeOrder->contractId}}</td>
                                    <td class="text-center">
                                        {{ \App\User::extractEmailFromResource($activeOrder->seller)}}
                                    </td>
                                    <td class="text-center">
                                        @if($activeOrder->orderStatus == \App\Http\Traits\OrderConstants::WAITING)
                                        <div class="status-pill yellow" data-title="Waiting" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @elseif($activeOrder->orderStatus == \App\Http\Traits\OrderConstants::PROCESSED)
                                        <div class="status-pill green" data-title="Processed" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @else
                                        @endif
                                        <!-- <div class="status-pill green" data-title="Complete" data-toggle="tooltip" data-original-title="" title=""></div> -->
                                    </td>
                                    <td class="text-center">{{$activeOrder->unitPrice}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 d-xxxl-none" style="display: none;">
            <div class="element-wrapper">
                <h6 class="element-header">Top Selling Today</h6>
                <div class="element-box">
                    <div class="el-chart-w">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas height="148" id="donutChart" width="148" class="chartjs-render-monitor" style="display: block; width: 148px; height: 148px;"></canvas>
                        <div class="inside-donut-chart-label"><strong>142</strong><span>Total Orders</span></div>
                    </div>
                    <div class="el-legend condensed">
                        <div class="row">
                            <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto col-6">
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                    <div class="legend-value"><span>Prada</span>
                                        <div class="legend-sub-value">14 Pairs</div>
                                    </div>
                                </div>
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                    <div class="legend-value"><span>Maui Jim</span>
                                        <div class="legend-sub-value">26 Pairs</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-lg-none d-xxl-block">
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                    <div class="legend-value"><span>Gucci</span>
                                        <div class="legend-sub-value">17 Pairs</div>
                                    </div>
                                </div>
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                    <div class="legend-value"><span>Armani</span>
                                        <div class="legend-sub-value">12 Pairs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-xxxl-block col-xxxl-6">
            <div class="element-wrapper">
                <div class="element-actions">
                    <form class="form-inline justify-content-sm-end">
                        <select class="form-control form-control-sm rounded">
                            <option value="Pending">Today</option>
                            <option value="Active">Last Week </option>
                            <option value="Cancelled">Last 30 Days</option>
                        </select>
                    </form>
                </div>
                <h6 class="element-header">Inventory Stats</h6>
                <div class="element-box">
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Eyeglasses</span></div>
                            <div class="bar-label-right"><span class="info">25 items / 10 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 70%">
                                <div class="bar-level-3" style="width: 40%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Outwear</span></div>
                            <div class="bar-label-right"><span class="info">18 items / 7 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 40%">
                                <div class="bar-level-3" style="width: 20%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Shoes</span></div>
                            <div class="bar-label-right"><span class="info">15 items / 12 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 60%">
                                <div class="bar-level-3" style="width: 30%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Jeans</span></div>
                            <div class="bar-label-right"><span class="info">12 items / 4 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 30%">
                                <div class="bar-level-3" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-top pt-3">
                        <div class="element-actions d-none d-sm-block">
                            <form class="form-inline justify-content-sm-end">
                                <select class="form-control form-control-sm form-control-faded">
                                    <option selected="true">Last 30 days</option>
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Today</option>
                                </select>
                            </form>
                        </div>
                        <h6 class="element-box-header">Inventory History</h6>
                        <div class="el-chart-w">
                            <canvas data-chart-data="13,28,19,24,43,49,40,35,42,46,38,32,45" height="0" id="liteLineChartV3" width="0" style="display: block; width: 0px; height: 0px;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Publisher-->
    @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
    <!-- Orders -->
    <div class="row">
        <div class="col-sm-12 col-xxxl-12">
            <div class="element-wrapper">
                <h6 class="element-header">Active Orders</h6>
                <div class="element-box">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th class="text-center">OrderID</th>
                                    <th class="text-center">Seller</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Unit Price [KES]</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- dd($ordersWaitingProcessed) --}}
                                @foreach($ordersWaitingProcessed as $activeOrder)
                                <tr>
                                    <td class="nowrap text-center">{{ $activeOrder->contractId}}</td>
                                    <td class="text-center">
                                        {{ \App\User::extractEmailFromResource($activeOrder->buyer)}}
                                    </td>
                                    <td class="text-center">
                                        @if($activeOrder->orderStatus == \App\Http\Traits\OrderConstants::WAITING)
                                        <div class="status-pill yellow" data-title="Waiting" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @elseif($activeOrder->orderStatus == \App\Http\Traits\OrderConstants::PROCESSED)
                                        <div class="status-pill green" data-title="Processed" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @else
                                        @endif
                                        <!-- <div class="status-pill green" data-title="Complete" data-toggle="tooltip" data-original-title="" title=""></div> -->
                                    </td>
                                    <td class="text-center">{{$activeOrder->unitPrice}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 d-xxxl-none" style="display: none;">
            <div class="element-wrapper">
                <h6 class="element-header">Top Selling Today</h6>
                <div class="element-box">
                    <div class="el-chart-w">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas height="148" id="donutChart" width="148" class="chartjs-render-monitor" style="display: block; width: 148px; height: 148px;"></canvas>
                        <div class="inside-donut-chart-label"><strong>142</strong><span>Total Orders</span></div>
                    </div>
                    <div class="el-legend condensed">
                        <div class="row">
                            <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto col-6">
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                    <div class="legend-value"><span>Prada</span>
                                        <div class="legend-sub-value">14 Pairs</div>
                                    </div>
                                </div>
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                    <div class="legend-value"><span>Maui Jim</span>
                                        <div class="legend-sub-value">26 Pairs</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-lg-none d-xxl-block">
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                    <div class="legend-value"><span>Gucci</span>
                                        <div class="legend-sub-value">17 Pairs</div>
                                    </div>
                                </div>
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                    <div class="legend-value"><span>Armani</span>
                                        <div class="legend-sub-value">12 Pairs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-xxxl-block col-xxxl-6">
            <div class="element-wrapper">
                <div class="element-actions">
                    <form class="form-inline justify-content-sm-end">
                        <select class="form-control form-control-sm rounded">
                            <option value="Pending">Today</option>
                            <option value="Active">Last Week </option>
                            <option value="Cancelled">Last 30 Days</option>
                        </select>
                    </form>
                </div>
                <h6 class="element-header">Inventory Stats</h6>
                <div class="element-box">
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Eyeglasses</span></div>
                            <div class="bar-label-right"><span class="info">25 items / 10 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 70%">
                                <div class="bar-level-3" style="width: 40%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Outwear</span></div>
                            <div class="bar-label-right"><span class="info">18 items / 7 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 40%">
                                <div class="bar-level-3" style="width: 20%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Shoes</span></div>
                            <div class="bar-label-right"><span class="info">15 items / 12 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 60%">
                                <div class="bar-level-3" style="width: 30%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Jeans</span></div>
                            <div class="bar-label-right"><span class="info">12 items / 4 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 30%">
                                <div class="bar-level-3" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-top pt-3">
                        <div class="element-actions d-none d-sm-block">
                            <form class="form-inline justify-content-sm-end">
                                <select class="form-control form-control-sm form-control-faded">
                                    <option selected="true">Last 30 days</option>
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Today</option>
                                </select>
                            </form>
                        </div>
                        <h6 class="element-box-header">Inventory History</h6>
                        <div class="el-chart-w">
                            <canvas data-chart-data="13,28,19,24,43,49,40,35,42,46,38,32,45" height="0" id="liteLineChartV3" width="0" style="display: block; width: 0px; height: 0px;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shipments -->
    <div class="row">
        <div class="col-sm-12 col-xxxl-12">
            <div class="element-wrapper">
                <h6 class="element-header">Active Shipments</h6>
                <div class="element-box">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th class="text-center">ShipmentID</th>
                                    <th class="text-center">OrderID</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Units</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- dd($shipments) --}}
                                @foreach($shipments as $activeShipment)
                                <tr>
                                    <td class="nowrap text-center">{{ $activeShipment->shipmentId}}</td>
                                    <td class="text-center">
                                        {{ $activeShipment->contract->contractId }}
                                    </td>
                                    <td class="text-center">
                                        @if($activeShipment->ShipmentStatus == \App\Http\Traits\OrderConstants::SHIP_WAITING)
                                        <div class="status-pill yellow" data-title="Waiting" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @elseif($activeShipment->ShipmentStatus == \App\Http\Traits\OrderConstants::SHIP_DISPATCHING)
                                        <div class="status-pill green" data-title="Dispatching" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @elseif($activeShipment->ShipmentStatus == \App\Http\Traits\OrderConstants::SHIP_SHIPPED_IN_TRANSIT)
                                        <div class="status-pill green" data-title="In Transit" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @else
                                        @endif
                                    </td>
                                    <td class="text-center">{{$activeShipment->unitCount}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 d-xxxl-none" style="display: none;">
            <div class="element-wrapper">
                <h6 class="element-header">Top Selling Today</h6>
                <div class="element-box">
                    <div class="el-chart-w">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas height="148" id="donutChart" width="148" class="chartjs-render-monitor" style="display: block; width: 148px; height: 148px;"></canvas>
                        <div class="inside-donut-chart-label"><strong>142</strong><span>Total Orders</span></div>
                    </div>
                    <div class="el-legend condensed">
                        <div class="row">
                            <div class="col-auto col-xxxxl-6 ml-sm-auto mr-sm-auto col-6">
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #6896f9;"></div>
                                    <div class="legend-value"><span>Prada</span>
                                        <div class="legend-sub-value">14 Pairs</div>
                                    </div>
                                </div>
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #85c751;"></div>
                                    <div class="legend-value"><span>Maui Jim</span>
                                        <div class="legend-sub-value">26 Pairs</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-lg-none d-xxl-block">
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #806ef9;"></div>
                                    <div class="legend-value"><span>Gucci</span>
                                        <div class="legend-sub-value">17 Pairs</div>
                                    </div>
                                </div>
                                <div class="legend-value-w">
                                    <div class="legend-pin legend-pin-squared" style="background-color: #d97b70;"></div>
                                    <div class="legend-value"><span>Armani</span>
                                        <div class="legend-sub-value">12 Pairs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-xxxl-block col-xxxl-6">
            <div class="element-wrapper">
                <div class="element-actions">
                    <form class="form-inline justify-content-sm-end">
                        <select class="form-control form-control-sm rounded">
                            <option value="Pending">Today</option>
                            <option value="Active">Last Week </option>
                            <option value="Cancelled">Last 30 Days</option>
                        </select>
                    </form>
                </div>
                <h6 class="element-header">Inventory Stats</h6>
                <div class="element-box">
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Eyeglasses</span></div>
                            <div class="bar-label-right"><span class="info">25 items / 10 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 70%">
                                <div class="bar-level-3" style="width: 40%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Outwear</span></div>
                            <div class="bar-label-right"><span class="info">18 items / 7 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 40%">
                                <div class="bar-level-3" style="width: 20%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Shoes</span></div>
                            <div class="bar-label-right"><span class="info">15 items / 12 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 60%">
                                <div class="bar-level-3" style="width: 30%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="os-progress-bar primary">
                        <div class="bar-labels">
                            <div class="bar-label-left"><span class="bigger">Jeans</span></div>
                            <div class="bar-label-right"><span class="info">12 items / 4 remaining</span></div>
                        </div>
                        <div class="bar-level-1" style="width: 100%">
                            <div class="bar-level-2" style="width: 30%">
                                <div class="bar-level-3" style="width: 10%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 border-top pt-3">
                        <div class="element-actions d-none d-sm-block">
                            <form class="form-inline justify-content-sm-end">
                                <select class="form-control form-control-sm form-control-faded">
                                    <option selected="true">Last 30 days</option>
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Today</option>
                                </select>
                            </form>
                        </div>
                        <h6 class="element-box-header">Inventory History</h6>
                        <div class="el-chart-w">
                            <canvas data-chart-data="13,28,19,24,43,49,40,35,42,46,38,32,45" height="0" id="liteLineChartV3" width="0" style="display: block; width: 0px; height: 0px;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Distributor-->
    @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR)
    <!-- Shipments -->
    <div class="row">
        <div class="col-sm-12 col-xxxl-12">
            <div class="element-wrapper">
                <h6 class="element-header">Active Shipments</h6>
                <div class="element-box">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th class="text-center">ShipmentID</th>
                                    <th class="text-center">OrderID</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Units</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- dd($shipments) --}}
                                @foreach($shipments as $activeShipment)
                                <tr>
                                    <td class="nowrap text-center">{{ $activeShipment->shipmentId}}</td>
                                    <td class="text-center">
                                        {{ $activeShipment->contract->contractId }}
                                    </td>
                                    <td class="text-center">
                                        @if($activeShipment->ShipmentStatus == \App\Http\Traits\OrderConstants::SHIP_WAITING)
                                        <div class="status-pill yellow" data-title="Waiting" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @elseif($activeShipment->ShipmentStatus == \App\Http\Traits\OrderConstants::SHIP_DISPATCHING)
                                        <div class="status-pill green" data-title="Dispatching" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @elseif($activeShipment->ShipmentStatus == \App\Http\Traits\OrderConstants::SHIP_SHIPPED_IN_TRANSIT)
                                        <div class="status-pill green" data-title="In Transit" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @else
                                        @endif
                                    </td>
                                    <td class="text-center">{{$activeShipment->unitCount}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Admin-->
    @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
    <!-- Orders -->
    <div class="row">
        <div class="col-sm-12 col-xxxl-12">
            <div class="element-wrapper">
                <h6 class="element-header">Active Orders</h6>
                <div class="element-box">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th class="text-center">OrderID</th>
                                    <th class="text-center">Seller</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Unit Price [KES]</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- dd($ordersWaitingProcessed) --}}
                                @foreach($ordersWaitingProcessed as $activeOrder)
                                <tr>
                                    <td class="nowrap text-center">{{ $activeOrder->contractId}}</td>
                                    <td class="text-center">
                                        {{ $activeOrder->buyer->email }}
                                    </td>
                                    <td class="text-center">
                                        @if($activeOrder->orderStatus == \App\Http\Traits\OrderConstants::WAITING)
                                        <div class="status-pill yellow" data-title="Waiting" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @elseif($activeOrder->orderStatus == \App\Http\Traits\OrderConstants::PROCESSED)
                                        <div class="status-pill green" data-title="Processed" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @else
                                        @endif
                                        <!-- <div class="status-pill green" data-title="Complete" data-toggle="tooltip" data-original-title="" title=""></div> -->
                                    </td>
                                    <td class="text-center">{{$activeOrder->unitPrice}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shipments -->
    <div class="row">
        <div class="col-sm-12 col-xxxl-12">
            <div class="element-wrapper">
                <h6 class="element-header">Active Shipments</h6>
                <div class="element-box">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                                <tr>
                                    <th class="text-center">ShipmentID</th>
                                    <th class="text-center">OrderID</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Units</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- dd($shipments) --}}
                                @foreach($shipments as $activeShipment)
                                <tr>
                                    <td class="nowrap text-center">{{ $activeShipment->shipmentId}}</td>
                                    <td class="text-center">
                                        {{ $activeShipment->contract->contractId }}
                                    </td>
                                    <td class="text-center">
                                        @if($activeShipment->ShipmentStatus == \App\Http\Traits\OrderConstants::SHIP_WAITING)
                                        <div class="status-pill yellow" data-title="Waiting" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @elseif($activeShipment->ShipmentStatus == \App\Http\Traits\OrderConstants::SHIP_DISPATCHING)
                                        <div class="status-pill green" data-title="Dispatching" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @elseif($activeShipment->ShipmentStatus == \App\Http\Traits\OrderConstants::SHIP_SHIPPED_IN_TRANSIT)
                                        <div class="status-pill green" data-title="In Transit" data-toggle="tooltip" data-original-title="" title=""></div>
                                        @else
                                        @endif
                                    </td>
                                    <td class="text-center">{{$activeShipment->unitCount}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('content-panel')
<div class="content-panel">
    <div class="element-wrapper">
        <h6 class="element-header">Quick Links</h6>
        <div class="element-box-tp">
            <div class="el-buttons-list full-width"><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-delivery-box-2"></i><span>Create New Product</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-window-content"></i><span>Customer Comments</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-wallet-loaded"></i><span>Store Settings</span></a></div>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
<script>
    function updatePurchaseRequest(purchaseRequestID, BookID, ShipmentID, customerEmail) {
        console.log("Clicked updatePurchaseRequest");

        var domainUrl = 'http://localhost:3001/api';

        // 1. Update Purchase Request
        var jsonData = {
            purchaseRequest: "resource:org.evin.book.track.PurchaseRequest#" + purchaseRequestID,
            status: true
        };

        // 2. Update Book as sold in its flag
        var jsonDataBook = {
            book: "resource:org.evin.book.track.Book#" + BookID,
            sold: true
        };

        // 3. Update Final Owner in Supply Chain
        var jsonDataShipOwnership = {
            owner: "resource:org.evin.book.track.Customer#" + customerEmail,
            shipment: "resource:org.evin.book.track.Shipment#" + ShipmentID
        };

        var msgHTML = '';

        $.ajax({
            type: 'POST',
            url: domainUrl + '/updatePurchaseRequestStatus',
            data: jsonData,
            dataType: 'json',
            beforeSend: function() {
                $("#loader").show();
                $("#add-error-request-bag").hide();
                $('#add-request-msgs').hide();
            },
            success: function(data) {

                // Update Book sold
                $.ajax({
                    type: 'POST',
                    url: domainUrl + '/updateBookSold',
                    data: jsonDataBook,
                    dataType: 'json',
                    beforeSend: function() {
                        $("#loader").show();
                        $("#add-error-request-bag").hide();
                        $('#add-request-msgs').hide();
                    },
                    success: function(data) {
                        $("#loader").hide();
                        console.log(data);
                        $("#add-error-request-bag").hide();
                        $('#add-request-msgs').show();
                        msgHTML = '<div class="alert alert-primary" role="alert">' +
                            'Request confirmed and ' + +' added to the supply chain' +
                            '</div>';

                        $('#add-request-msgs').html(msgHTML);

                        window.location.reload();
                    },
                    error: function(data) {
                        var errors = $.parseJSON(data.responseText);
                        var status = errors.error.statusCode;

                        if (status == 422) {
                            console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                            console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                            $("#add-request-msgs").hide();

                            $('#add-request-errors').html('');
                            $.each(errors.error.details.messages, function(key, value) {
                                console.log('Error Value' + value + ' Key ' + key);
                                $('#add-request-errors').append('<li>' + key + ' ' + value + '</li>');
                            });

                        } else {
                            console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                            $('#add-request-errors').html(errors.error.message);
                        }
                        // hide loader
                        $("#loader").hide();

                        $("#add-error-request-bag").show();
                    }
                });
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                var status = errors.error.statusCode;

                if (status == 422) {
                    console.log("Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.details));
                    console.log("Errors >>!!!!!!! " + JSON.stringify(errors.error.details.messages));
                    $("#add-request-msgs").hide();

                    $('#add-request-errors').html('');
                    $.each(errors.error.details.messages, function(key, value) {
                        console.log('Error Value' + value + ' Key ' + key);
                        $('#add-request-errors').append('<li>' + key + ' ' + value + '</li>');
                    });

                } else {
                    console.log("NOT 422 Errors FLAG >>!!!!!!! " + JSON.stringify(errors.error.message));
                    $('#add-request-errors').html(errors.error.message);
                }
                // hide loader
                $("#loader").hide();

                $("#add-error-request-bag").show();
            }
        });
    }
</script>
@endsection