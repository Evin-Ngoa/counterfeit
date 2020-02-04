<!-- Modal -->
<div aria-hidden="true" class="onboarding-modal modal fade animated" id="onboardingWideFormModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-centered" role="document">
        <div class="modal-content text-center">
            <form id="book_form">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-side-by-side">
                    <div class="onboarding-media"><img alt="" src="img/bigicon5.png" width="200px"></div>
                    <div class="onboarding-content with-gradient">
                        <h4 class="onboarding-title">Example Request Information</h4>
                        <div class="onboarding-text">In this example you can see a form where you can request some additional information from the customer when they land on the app page.</div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="add-book-msgs"></div>
                                <!-- <div class="alert alert-info" role="alert">
                                    <strong>Sorry! </strong>No Records at the moment.
                                </div> -->
                                <div class="alert alert-danger" id="add-error-bag">
                                    <ul id="add-book-errors">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Select Publisher</label>
                                    <select class="form-control" name="initialOwner" id="initialOwner">
                                        <option value="">-Select-</option>
                                        <option value="longhorn publishers" selected>Longhorn</option>
                                        <option value="KLB publishers">KLB</option>
                                        <option value="Moran publishers">Moran</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="type">Subject</label>
                                    <input name="type" id="type" class="form-control" placeholder="Book Subject...Eg Kiswahili" value="Geography">
                                    <input type="hidden" name="id" id="id" class="form-control" value="BOOK_006">
                                    <input type="hidden" name="sold" id="sold" class="form-control" value="false">
                                    <!-- "$class": "org.evin.book.track.Book", -->
                                    <input type="hidden" name="$class" id="$class" class="form-control" value="org.evin.book.track.Book">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input name="author" id="author" class="form-control" placeholder="Enter Book Author" value="Evingtone">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="edition">Edition</label>
                                    <input name="edition" id="edition" class="form-control" placeholder="Enter Edition...Eg 3rd Edition" value="6TH Edition">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">Book Price</label>
                                    <input name="price" id="price" class="form-control" placeholder="Enter Price..." value="550">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">Book Description</label>
                                    <!-- <input name="description" id="description" class="form-control" placeholder="Any addition..." value=""> -->
                                    <textarea name="description" id="description" class="form-control" value="Testing Book Description">Any addition...</textarea>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">Book Price</label>
                                    <button class="mr-2 mb-2 btn btn-primary btn-sm" type="button"> Save Book</button>
                                </div>

                            </div> -->
                            <!-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="price">Book Price</label>
                                    <button class="mr-2 mb-2 btn btn-primary btn-sm" type="button"> Save Book</button>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button"> Close</button>
                    <button class="btn btn-primary btn-add-book" type="button" value="Save Book"> Save Book</button>
                </div>
            </form>
        </div>
    </div>
</div>