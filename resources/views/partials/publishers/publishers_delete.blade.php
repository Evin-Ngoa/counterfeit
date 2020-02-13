
<!-- Delete Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="deletePublisherModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-md modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmDeletePublisher">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media" style="display: none"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="modal-title" id="delete-title" name="title">
                            Delete Publisher
                        </h4>
                        <div class="onboarding-text" style="display: none;">In this example you can see a form where you can request some additional information from the customer when they land on the app page.</div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-warning">
                                    Are you sure you want to delete this publisher?
                                </div>
                                <p class="text-danger">
                                    <small>
                                        This action cannot be undone.
                                    </small>
                                </p>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <input id="email" name="email" type="hidden" value="">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-delete-publisher" id="btn-delete" type="button" value="Delete Publisher">Delete Publisher</button>
                </div>
            </form>
        </div>
    </div>
</div>