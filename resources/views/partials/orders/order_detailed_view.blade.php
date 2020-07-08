<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="orderViewModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md modal-centered" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="os-icon os-icon-mail-14"></i> Order Detailed View</h5>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">Order ID</td>
                                <td class="text-left"><div id="orderIdView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Order Status</td>
                                <td class="text-left"><div id="orderStatusView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Buyer Info</td>
                                <td class="text-left"><div id="buyerInfoView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Seller Info</td>
                                <td class="text-left"><div id="sellerInfoView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Arrival Date</td>
                                <td class="text-left"><div id="arrivalDateTimeView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Pay On Arrival</td>
                                <td class="text-left"><div id="payOnArrivalView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Agreed Unit Price</td>
                                <td class="text-left"><div id="unitPriceView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Payment Details</td>
                                <td class="text-left"><div id="discountView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Quantity</td>
                                <td class="text-left"><div id="quantityView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Description</td>
                                <td class="text-left"><div id="descriptionView"></div></td>
                            </tr>
                            <tr>
                                <td class="text-left">Destination Address</td>
                                <td class="text-left"><div id="destinationAddressView"></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>