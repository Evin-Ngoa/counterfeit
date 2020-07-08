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
                                <th class="text-center">Buyer</th>
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