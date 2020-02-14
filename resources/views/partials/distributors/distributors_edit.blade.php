<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="editDistributorModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmEditDistributor">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media" style="display: none;"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="onboarding-title"><i class="os-icon os-icon-documents-17"></i> Edit Distributor</h4>
                        <div class="onboarding-text" style="display: none;">In this example you can see a form where you can request some additional information from the customer when they land on the app page.</div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="edit-distributor-msgs"></div>
                                
                                <div class="alert alert-danger" id="edit-error-bag">
                                    <ul id="edit-distributor-errors">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" id="name" class="form-control" placeholder="Enter Distributor Name" value="">

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="abc@abc.com" value="">
                                    <input type="hidden" name="memberId" id="memberId" class="form-control" value="">
                                    <input type="hidden" name="$class" id="$class" class="form-control" value="org.evin.book.track.Distributor">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="telephone">Mobile Telephone</label>
                                    <input name="telephone" id="telephone" class="form-control" placeholder="Enter Phone" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="accountBalance">Account Balance</label>
                                    <input name="accountBalance" id="accountBalance" class="form-control" placeholder="Enter accountBalance" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input name="country" id="country" class="form-control" placeholder="Enter Country" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="county">County</label>
                                    <input name="county" id="county" class="form-control" placeholder="Enter County" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="street">Street Address</label>
                                    <input name="street" id="street" class="form-control" placeholder="Enter Street Address..." value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-edit-distributor" type="button" value="Edit Distributor"> Edit Distributor</button>
                </div>
            </form>
        </div>
    </div>
</div>