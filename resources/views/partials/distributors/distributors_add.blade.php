<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="addDistributorModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmAddDistributor">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media" style="display: none;"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="onboarding-title"><i class="os-icon os-icon-truck"></i> Add Distributor</h4>
                        <div class="onboarding-text" style="display: none;">In this example you can see a form where you can request some additional information from the customer when they land on the app page.</div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="add-distributor-msgs"></div>
                                <!-- <div class="alert alert-info" role="alert">
                                    <strong>Sorry! </strong>No Records at the moment.
                                </div> -->
                                <div class="alert alert-danger" id="add-error-bag">
                                    <ul id="add-distributor-errors">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" id="name" class="form-control" placeholder="Enter Distributor Name" value="Distributor3">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="abc@abc.com" value="distributor3@gmail.com">
                                    <!-- <input type="hidden" name="id" id="id" class="form-control" value="BOOK_006"> -->
                                    <!-- <input type="hidden" name="sold" id="sold" class="form-control" value="false"> -->
                                    <!-- "$class": "org.evin.book.track.Distributor", -->
                                    <input type="hidden" name="$class" id="$class" class="form-control" value="org.evin.book.track.Distributor">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="telephone">Mobile Telephone</label>
                                    <input name="telephone" id="telephone" class="form-control" placeholder="Enter Phone" value="0701864761">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="accountBalance">Account Balance</label>
                                    <input name="accountBalance" id="accountBalance" class="form-control" placeholder="Enter accountBalance" value="4000000">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input name="country" id="country" class="form-control" placeholder="Enter Country" value="Kenya">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="county">County</label>
                                    <input name="county" id="county" class="form-control" placeholder="Enter County" value="Nairobi">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="street">Street Address</label>
                                    <input name="street" id="street" class="form-control" placeholder="Enter Street Address..." value="Loita Street">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-add-distributor" type="button" value="Save Distributor"> Save Distributor</button>
                </div>
            </form>
        </div>
    </div>
</div>