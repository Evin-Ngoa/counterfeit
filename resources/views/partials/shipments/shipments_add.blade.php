<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="addShipmentModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmAddShipment">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media" style="display: none;"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="onboarding-title">Create Shipment</h4>
                        <div class="onboarding-text" style="display: none;">In this example you can see a form where you can request some additional information from the customer when they land on the app page.</div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="add-shipment-msgs"></div>
                                <!-- <div class="alert alert-info" role="alert">
                                    <strong>Sorry! </strong>No Records at the moment.
                                </div> -->
                                <div class="alert alert-danger" id="add-error-bag" >
                                    <ul id="add-shipment-errors">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contract">Order Number</label>
                                    <input name="contract" id="contract" class="form-control" placeholder="Shipment Subject...Eg Kiswahili" value="CON_001">
                                    <!-- <input type="hidden" name="id" id="id" class="form-control" value="BOOK_006"> -->
                                    <!-- <input type="hidden" name="sold" id="sold" class="form-control" value="false"> -->
                                    <!-- "$class": "org.evin.book.track.Shipment", -->
                                    <input type="hidden" name="$class" id="$class" class="form-control" value="org.evin.book.track.Shipment">
                                    <!-- <input type="hidden" name="owner" id="owner" class="form-control" value="org.evin.book.track.Publisher#publisher1@gmail.com"> -->
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="shipmentStatus">Select Shipment Status</label>
                                    <select class="form-control" name="shipmentStatus" id="shipmentStatus">
                                        <option value="">-Select-</option>
                                        <option value="WAITING" selected>WAITING</option>
                                        <option value="DISPATCHING">DISPATCHING</option>
                                        <option value="SHIPPED_IN_TRANSIT">SHIPPED_IN_TRANSIT</option>
                                        <option value="CANCELED">CANCELED</option>
                                        <option value="DELIVERED">DELIVERED</option>
                                        <option value="LOST">LOST</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="itemStatus">Select Items Status</label>
                                    <select class="form-control" name="itemStatus" id="itemStatus">
                                        <option value="">-Select-</option>
                                        <option value="GOOD" selected>GOOD</option>
                                        <option value="DAMAGED">DAMAGED</option>
                                        <option value="LOST">LOST</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="unitCount">Quantity</label>
                                    <input name="unitCount" id="unitCount" class="form-control" placeholder="Enter Number of Books" value="300">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input name="location" id="location" class="form-control" placeholder="Type..." value="4.0435,39.6682">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">Shipment Description</label> -->
                                    <!-- <input name="description" id="description" class="form-control" placeholder="Any addition..." value=""> -->
                                    <!-- <textarea name="description" id="description" class="form-control" value="Testing Shipment Description">Any addition...</textarea>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">Shipment Price</label>
                                    <button class="mr-2 mb-2 btn btn-primary btn-sm" type="button"> Save Shipment</button>
                                </div>

                            </div> -->
                            <!-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="price">Shipment Price</label>
                                    <button class="mr-2 mb-2 btn btn-primary btn-sm" type="button"> Save Shipment</button>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-add-shipment" type="button" value="Save Shipment"> Save Shipment</button>
                </div>
            </form>
        </div>
    </div>
</div>