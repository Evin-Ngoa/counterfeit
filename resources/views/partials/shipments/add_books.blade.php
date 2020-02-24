<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="registerBookShipmentModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmregisterBookShipment">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media" style="display: none;"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="onboarding-title"><div id="shipment_id"></div></h4>
                        <div class="onboarding-text" style="display: none;">In this example you can see a form where you can request some additional information from the customer when they land on the app page.</div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="add-book-shipment-msgs"></div>
                                <!-- <div class="alert alert-info" role="alert">
                                    <strong>Sorry! </strong>No Records at the moment.
                                </div> -->
                                <div class="alert alert-danger" id="add-error-bag" >
                                    <ul id="add-book-shipment-errors">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                <label for="book">Book Identifier</label>
                                    <input name="book" id="book" class="form-control" placeholder="" value="">
                                    <!-- <input type="hidden" name="id" id="id" class="form-control" value="BOOK_006"> -->
                                    <!-- <input type="hidden" name="sold" id="sold" class="form-control" value="false"> -->
                                    <!-- "$class": "org.evin.book.track.Shipment", -->
                                    <input type="hidden" name="$class" id="$class" class="form-control" value="org.evin.book.track.BookRegisterShipment">
                                    <input type="hidden" name="shipment" id="shipment" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-add-book-shipment" type="button" value="Save Book"> Save Book To Shipment</button>
                </div>
            </form>
        </div>
    </div>
</div>