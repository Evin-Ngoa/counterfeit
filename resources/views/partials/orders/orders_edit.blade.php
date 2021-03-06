<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="editOrderModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmEditOrder">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media" style="display: none;"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="onboarding-title"><i class="os-icon os-icon-mail-14"></i> Edit Order (<span id="IdOrder"></span>)</h4>
                        <div class="onboarding-text" style="display: none;">In this example you can see a form where you can request some additional information from the customer when they land on the app page.</div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="edit-order-msgs"></div>
                                
                                <div class="alert alert-danger" id="edit-error-bag">
                                    <ul id="edit-order-errors">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="seller">Publisher Email</label>
                                    <input name="seller" id="sellerEdit" class="form-control" placeholder="Use publisher email" value="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="arrivalDateTime">Expected Arrival Date</label>
                                    <input name="arrivalDateTime" id="arrivalDateTime" class="form-control datetime" placeholder="DD/MM/YYYY" value="">
                              
                                    <input type="hidden" name="buyer" id="buyer" class="form-control" value="">
                                    <input type="hidden" name="contractId" id="contractId" class="form-control" value="">
                                    <input type="hidden" name="createdAt" id="createdAt" class="form-control" value="">
                                    <input type="hidden" name="pricePoints" id="pricePoints" class="form-control" value="">
                                    <input type="hidden" name="discountPoints" id="discountPoints" class="form-control" value="">
                                    @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                                        <input type="hidden" name="orderStatus" id="orderStatus"  value="WAITING">
                                    @endif
                                
                                    <input type="hidden" name="$class" id="$class" class="form-control" value="org.evin.book.track.OrderContract">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="payOnArrival">Pay On Arrival</label>
                                    <select class="form-control" name="payOnArrival" id="payOnArrival">
                                        <option value="">-Select-</option>
                                        <option value="true" selected>Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                            </div>
                            @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR || \App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
                            <div class="col-sm-4">
                            @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                            <div class="col-sm-6">
                            @endif
                                <div class="form-group">
                                    <label for="unitPrice">Agreed Unit Price</label>
                                    <input name="unitPrice" id="unitPrice" class="form-control" placeholder="Enter Price" value="300">
                                </div>
                            </div>
                            @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR || \App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
                            <div class="col-sm-4">
                            @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                            <div class="col-sm-6">
                            @endif
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input name="quantity" id="quantity" class="form-control" placeholder="Enter Price..." value="120">
                                </div>
                            </div>
                            @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR || \App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="orderStatus">Order Status</label>
                                    <select class="form-control" name="orderStatus" id="orderStatus">
                                        <option value="">-Select-</option>
                                        <option value="WAITING" selected>WAITING</option>
                                        <option value="PROCESSED">PROCESSED</option>
                                    </select>
                                </div>
                            </div>
                            @endif

                            @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR || \App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
                            <div class="col-sm-6" style="display: none;">
                                <div class="form-group">
                                    <label for="lateArrivalPenaltyFactor">% Discount Per Book on Late Arrival</label>
                                    <input name="lateArrivalPenaltyFactor" id="lateArrivalPenaltyFactor" class="form-control" placeholder="Enter Penalty in decimal Eg 5% => 0.05" value="0.20">                                
                                </div>
                            </div>
                            <div class="col-sm-6" style="display: none;">
                                <div class="form-group">
                                    <label for="damagedPenaltyFactor">% Discount Per Book on Damaged Books</label>
                                    <input name="damagedPenaltyFactor" id="damagedPenaltyFactor" class="form-control" placeholder="Use decimal Eg 10% => 0.10" value="0.10">                                
                                </div>
                            </div>
                            <div class="col-sm-6" style="display: none;">
                                <div class="form-group">
                                    <label for="lostPenaltyFactor">% Discount Per Book on Lost Books</label>
                                    <input name="lostPenaltyFactor" id="lostPenaltyFactor" class="form-control" placeholder="Use decimal Eg 15% => 0.15" value="0.15">                                
                                </div>
                            </div>
                            @endif
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="destinationAddress">Delivery Address</label>
                                    <textarea name="destinationAddress" id="destinationAddress" class="form-control" value="" placeholder="Be specific; County, Street, building name, Flr etc">Nairobi, Loita Street, Barclays Plaza, Floor 12</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">Provide Book Description</label>
                                    <textarea name="description" id="description" class="form-control" value="" placeholder="Provide Book Name, subject, Author, Edition etc"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-edit-order" type="button" value="Save"> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>