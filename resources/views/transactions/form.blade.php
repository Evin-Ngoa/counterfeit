@extends('layout.app')

@section('title', 'Transactions History | Transaction Form')

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-8 col-lg-8">
            <div class="element-wrapper">
                <div class="element-actions">

                </div>
                <h6 class="element-header">Transaction Form</h6>
                <div class="element-box">

                    <!-- <form id="verify_form"> -->
                    <!-- transactionForm -->
                    <form id="transaction_form">
                        <h5 class="form-header">Note</h5>
                        <div class="form-desc">Ensure you enter the right item ID. It is case sensitive.</div>

                        <div class="col-sm-12">
                            <div id="add-transaction-msgs"></div>

                            <div class="alert alert-danger" id="add-transaction-error-bag" style="display: none;">
                                <ul id="add-transaction-errors">
                                </ul>
                            </div>
                        </div>

                        <!-- Transaction Name -->
                        <div class="form-group row">
                            <label class="col-form-label col-sm-4" for=""> Transaction Name</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="transaction_name" id="transaction_name">
                                    <!-- <option value="">Select Transaction</option> -->
                                    <option value="getIsConfimedReportHistorian">Report Case Confirmation</option>
                                </select>
                            </div>
                        </div>

                        <!-- Item ID -->
                        <div class="form-group row">

                            <label class="col-form-label col-sm-4" for=""> Enter Item ID</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="itemID" id="itemID" placeholder="Enter Item Serial" type="text">
                                <input class="form-control" name="loggedInUser" id="loggedInUser" value="{{\App\User::loggedInUserEmail()}}" type="hidden">
                                <input class="form-control" name="role" id="role" value="{{\App\User::getUserRole()}}" type="hidden">
                            </div>
                        </div>

                        <div class="form-buttons-w">
                            <!-- transactionHistorySbtBtn -->
                            <button class="btn btn-primary btn-transaction-history" type="button"> Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.reports.reports_trace')
@endsection



