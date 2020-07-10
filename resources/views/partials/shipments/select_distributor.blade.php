<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="selectDistributorModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmSelectDistributor">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media" style="display: none;"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="onboarding-title">
                            <div id="shipment_title"></div>
                        </h4>
                        <div class="onboarding-text">
                            <div id="selectorMsgId"></div>

                        </div>

                        <div class="row" style="">
                            <div class="col-sm-12">
                                <div id="add-ship-ownership-msgs"></div>
                    
                                <div class="alert alert-danger" id="add-ship-ownership-error-bag" style="display: none">
                                    <ul id="add-ship-ownership-errors">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12" id="selectDistributorDropdown">
                                <div class="form-group">
                                    <label for="selectDistributor" class="">Select Distributor</label>

                                    <select class="form-control" name="owner" id="selectDistributor">
                                        <option selected="true" value="">Select</option>
                                        
                                    </select>

                                    <input type="hidden" name="shipment" id="shipment_owner" class="form-control" value="">
                                    <!-- <input type="hidden" name="sold" id="sold" class="form-control" value="false"> -->
                                    <!-- "$class": "org.evin.book.track.Shipment", -->
                                    <input type="hidden" name="$class" id="$class" class="form-control" value="org.evin.book.track.ShipOwnership">
                                    <input type="hidden" name="shipment" id="shipment" value="">
                                    <input type="hidden" name="loggedInEmail" id="loggedInEmail" class="form-control" value="{{ \App\User::loggedInUserEmail() }}">
                                    <input type="hidden" name="userRole" id="userRole" class="form-control" value="{{ \App\User::getUserRole() }}">
                           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer" id="selectDistributorDropdownActions">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-add-ship-ownership" type="button" value="Save Book"> Save Book To Shipment</button>
                </div>
            </form>
        </div>
    </div>
</div>