@extends('layout.app')

@section('title', 'Books | Verification Form')

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-8 col-lg-8">
            <div class="element-wrapper">
                <div class="element-actions">
                    <!-- <a class="btn btn-success btn-sm" href="{{ route('book.index') }}">
                        <i class="os-icon os-icon-book"></i><span>My Books Records</span>
                    </a> -->
                    <!-- <a class="btn btn-primary btn-sm" href="#">
                        <i class="os-icon os-icon-grid-10"></i><span>Make Payment</span>
                    </a> -->
                </div>
                <h6 class="element-header">Book Verification Form</h6>
                <div class="element-box">
                    <form id="verify_form">
                        <h5 class="form-header">Note</h5>
                        <div class="form-desc">Ensure you enter the right value. It is case sensitive.</div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div id="add-book-msgs"></div>
                                
                                <div class="alert alert-danger" id="add-error-bag" style="display: none;">
                                    <ul id="add-book-errors">
                                    </ul>
                                </div>
                            </div>
                            <label class="col-form-label col-sm-4" for=""> Enter Book Serial</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="book_serial" id="book_serial" placeholder="Enter Book Serial" type="text">
                                <input class="form-control" name="loggedInUser" id="loggedInUser" value="{{\App\User::loggedInUserEmail()}}" type="hidden">
                            </div>
                        </div>

                        <div class="form-buttons-w">
                            <button class="btn btn-primary btn-verify-book" type="button"> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content-panel')

@endsection