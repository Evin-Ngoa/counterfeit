@extends('layout.app')

@section('title', 'BookShop | BookShop Verification')

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-8 col-lg-8">
            <div class="element-wrapper">
                <div class="element-actions">
                   
                </div>
                <h6 class="element-header">BookShop Verification Form</h6>
                <div class="element-box">
                    <form id="verify_bookshop">
                        <h5 class="form-header">Note</h5>
                        <div class="form-desc">Ensure you enter the right value. It is case sensitive.</div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div id="verify-bookshop-msgs"></div>
                                
                                <div class="alert alert-danger" id="verify-error-bag" style="display: none;">
                                    <ul id="verify-bookshop-errors">
                                    </ul>
                                </div>
                            </div>
                            <label class="col-form-label col-sm-4" for=""> Enter BookShop ID</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="bookshop_id" id="bookshop_id" placeholder="Enter BookShop ID" type="text">
                                <input class="form-control" name="loggedInUser" id="loggedInUser" value="{{\App\User::loggedInUserEmail()}}" type="hidden">
                                <input type="hidden" name="loggedInEmail" id="loggedInEmail" class="form-control" value="{{ \App\User::loggedInUserEmail() }}">
                                <input type="hidden" name="userRole" id="userRole" class="form-control" value="{{ \App\User::getUserRole() }}">
                            </div>
                        </div>

                        <div class="form-buttons-w">
                            <button class="btn btn-primary btn-verify-bookshop" type="button"> Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('customers.bookshop-results')
@endsection

@section('content-panel')

@endsection