<!-- Delete Book Modal Form HTML -->
<!-- <div class="modal fade" id="deleteBookModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteBook">
                <div class="modal-header">
                    <h4 class="modal-title" id="delete-title" name="title">
                        Delete Book
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete this book?
                    </p>
                    <p class="text-warning">
                        <small>
                            This action cannot be undone.
                        </small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input id="book_id" name="book_id" type="hidden" value="0">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                    <button class="btn btn-danger" id="btn-delete" type="button">
                        Delete Book
                    </button>
                    </input>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="deleteBookModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmDeleteBook">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="modal-title" id="delete-title" name="title">
                            Delete Book
                        </h4>
                        <div class="onboarding-text">In this example you can see a form where you can request some additional information from the customer when they land on the app page.</div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-warning">
                                    Are you sure you want to delete this book?
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
                    <input id="book_id" name="book_id" type="hidden" value="0">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-edit-book" id="btn-delete" type="button" value="Edit Book">Edit Book</button>
                </div>
            </form>
        </div>
    </div>
</div>