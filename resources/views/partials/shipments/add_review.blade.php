<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="addReviewModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmAddReview">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media" style="display: none;"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="onboarding-title"><i class="os-icon os-icon-ui-02"></i> Rate Delivery</h4>
                        <div class="onboarding-text" style="display: block;">
                            <div class="alert alert-info borderless">
                                <i class="os-icon os-icon-bell"></i>
                                You can only rate this shipment once.
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-sm-2" for="feedbackScale">Scale</label>
                            <div class="col-sm-2">
                                <!-- <input class="form-control" name="feedbackScale" id="feedbackScale" type="text"> -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input checked="" class="form-check-input" name="feedbackScale" type="radio" value="1">
                                        1
                                    </label>
                                </div>
                                <input type="hidden" name="shipment" id="shipment" class="form-control" value="">
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input checked="" class="form-check-input" name="feedbackScale" type="radio" value="2">
                                        2
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input checked="" class="form-check-input" name="feedbackScale" type="radio" value="3">
                                        3
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input checked="" class="form-check-input" name="feedbackScale" type="radio" value="4">
                                        4
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input checked="" class="form-check-input" name="feedbackScale" type="radio" value="5">
                                        5
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="add-review-msgs"></div>
                                <!-- <div class="alert alert-info" role="alert">
                                    <strong>Sorry! </strong>No Records at the moment.
                                </div> -->
                                <div class="alert alert-danger" id="add-review-error-bag">
                                    <ul id="add-review-errors">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6" style="display: none">
                                <div class="form-group">
                                    <label for="contract">Order Number</label>

                                </div>
                            </div>

                
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="itemStatus">Message</label>
                                    <textarea class="form-control" name="feedbackMessage" id="feedbackMessage"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-add-review" type="button" value="Add Review"> Add Review</button>
                </div>
            </form>
        </div>
    </div>
</div>