<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="addOrderModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmAddOrder">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media" style="display: none;"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient" style="padding: 70px 70px 10px;">
                        <h4 class="onboarding-title"><i class="os-icon os-icon-mail-14"></i> Create Order</h4>
                        <div class="onboarding-text" style="display: block;">
                            <div class="alert alert-info borderless">
                                <i class="os-icon os-icon-bell"></i> Ensure the details are correct. Once the order is processed you cannot edit the order.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="add-order-msgs"></div>
                                <div class="alert alert-danger" id="add-order-error-bag" style="display: none;">
                                    <ul id="add-order-errors">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="seller">Publisher Email</label>
                                    <input name="seller" id="seller" class="form-control" placeholder="Use publisher email" value="publisher1@gmail.com">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="arrivalDateTime">Expected Arrival Date</label>
                                    <input name="arrivalDateTime" id="arrivalDateTime" class="form-control datetime" placeholder="DD/MM/YYYY" value="">

                                    <input type="hidden" name="buyer" id="buyer" class="form-control" value="{{\App\User::loggedInUserEmail()}}">

                                    <input type="hidden" name="participantName" id="participantName" class="form-control" value="{{\App\User::getParticipantNames()}}">

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
                                    @else
                                    <input type="hidden" name="orderStatus" id="orderStatus" class="form-control" value="WAITING">
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="pricePoints">Enter Points to redeem [Minimum 100 and Maximum 400 per book ; 1sh = 10 Points]</label>
                                            <input type="number" class="form-control" name="pricePoints" id="pricePoints" min="100" max="400" step="10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                            <button class="btn btn-primary btn-add-order" type="button" value="Save"> Save</button>
                        </div>
            </form>
        </div>
    </div>
</div>