<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="shipmentViewModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md modal-centered" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="os-icon os-icon-globe"></i> Shipment Detailed View</h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> ×</span></button>
            </div>
            <div class="modal-body">
                <!-- Stripped Tables -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-left">Titles</th>
                                <th class="text-left">Values</th>
                                <th style="display:none;" class="text-center">Status</th>
                                <th style="display:none;" class="text-right">Order Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">Shipment ID</td>
                                <td class="text-left"><div id="shipmentIdView"></div></td>
                                <td class="text-center" style="display:none;">
                                    <div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div>
                                </td>
                                <td class="text-right" style="display:none;">$354</td>
                            </tr>
                            <tr>
                                <td class="text-left">Shipment Status</td>
                                <td class="text-left"><div id="ShipmentStatusView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Item Status</td>
                                <td class="text-left"><div id="itemStatusView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Customer Feedback Scale</td>
                                <td class="text-left"><div id="feedbackScaleView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Customer Feedback Message</td>
                                <td class="text-left"><div id="feedbackMessageView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Quantity</td>
                                <td class="text-left"><div id="unitCountView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Contract ID</td>
                                <td class="text-left"><div id="contractIdView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Buyer Email</td>
                                <td class="text-left"><div id="buyerView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Seller Email</td>
                                <td class="text-left"><div id="sellerView"></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>