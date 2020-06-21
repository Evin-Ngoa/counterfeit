<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="editBookModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="frmEditBook">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media" style="display: none;"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="onboarding-title"><i class="os-icon os-icon-book"></i> Edit Book (<span id="IdBook"></span>)</h4>
                        <div class="onboarding-text" style="display: none;">
                            In this example you can see a form where you can request some additional information
                            from the customer when they land on the app page.
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="edit-book-msgs"></div>
                                <!-- <div class="alert alert-info" role="alert">
                                    <strong>Sorry! </strong>No Records at the moment.
                                </div> -->
                                <div class="alert alert-danger" id="edit-error-bag">
                                    <ul id="edit-book-errors">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="type">Subject</label>
                                    <input name="type" id="type" class="form-control" placeholder="Book Subject...Eg Kiswahili" value="">
                                    <input type="hidden" name="id" id="id" class="form-control" value="">
                                    <input type="hidden" name="sold" id="sold" class="form-control" value="">
                                    <!-- "$class": "org.evin.book.track.Book", -->
                                    <input type="hidden" name="$class" id="$class" class="form-control" value="org.evin.book.track.Book">
                                    <input type="hidden" name="addedBy" id="addedBy" class="form-control" value="resource:org.evin.book.track.Publisher#{{ \App\User::loggedInUserEmail() }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input name="author" id="author" class="form-control" placeholder="Enter Book Author" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edition">Edition</label>
                                    <input name="edition" id="edition" class="form-control" placeholder="Enter Edition...Eg 3rd Edition" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">Book Price</label>
                                    <input name="price" id="price" class="form-control" placeholder="Enter Price..." value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">Book Description</label>
                                    <!-- <input name="description" id="description" class="form-control" placeholder="Any addition..." value=""> -->
                                    <textarea name="description" id="description" class="form-control" value=""></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-edit-book" type="button" value="Edit Book">Edit Book</button>
                </div>
            </form>
        </div>
    </div>
</div>