@extends('layout.app')

@section('title', 'Books | Book Verification')

@section('content-box')
<div class="content-box">
    <div class="element-wrapper ">
        <div class="element-actions">
            <a class="btn btn-primary btn-sm" href="{{ route('book.index') }}">
                <i class="os-icon os-icon-book"></i><span>My Books Records</span>
            </a>
        </div>
        <h6 class="element-header">Supply Chain For {{ $id }}</h6>
        <div class="element-box-tp">
            <div class="activity-boxes-w">
                @if($groupOwners)
                @if(isset($groupOwners->shipment->shipOwnership))
                @foreach ($groupOwners->shipment->shipOwnership as $groupOwner)
                <div class="activity-box-w">
                    <div class="activity-time">{{ Carbon\Carbon::parse($groupOwner->timestamp)->isoFormat('MMM Do YYYY dddd')  }}</div>
                    <div class="activity-box">
                        <div class="activity-avatar"><img alt="" src="/img/avatar1.jpg"></div>
                        <div class="activity-info">
                            @if(isset($groupOwner->owner->name))
                            <div class="activity-role">{{ $groupOwner->owner->name }}</div>
                            @else
                            <div class="activity-role">{{ $groupOwner->owner->firstName }} {{ $groupOwner->owner->lastName }} </div>
                            @endif

                            @if(isset($groupOwner->owner->address->country))
                            <strong class="activity-title">{{ $groupOwner->owner->address->country}} , {{ $groupOwner->owner->address->county }} , {{ $groupOwner->owner->address->street }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="alert alert-success">
                    <!-- If Book exists but there is no tracking yet -->
                    @lang('WARNING!!! The Book {{ $id }} is a possible counterfeit.')
                </div>
                @endif
                @else
                <div class="alert alert-success">
                    <!-- If Book does not exist -->
                    @lang('WARNING!!! The Book {{ $id }} is a possible counterfeit.')
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-8">
            <div class="element-wrapper">
                <h6 class="element-header">Report Deck</h6>
                <div class="element-box">
                    <form id="frmReport">
                        <!-- <h5 class="form-header">Report </h5> -->
                        <div class="form-desc">
                            Report a book that is rendered possible counterfeit and get points
                        </div>
                        <div id="add-review-msgs"></div>

                        <div class="alert alert-danger" id="add-error-report-bag">
                            <ul id="add-review-errors">
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="ward"> Select Ward</label>
                            <select class="form-control" name="ward" id="ward">
                                <option>Select Ward</option>
                                <option>Ngara</option>
                           
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="book"> Book ID</label>
                            <input class="form-control" placeholder="Enter Book ID" type="text" name="book" id="book" value="{{ $id }}">
                        </div>

                        <div class="form-group">
                            <label for="store"> Enter Store ID</label>
                            <input class="form-control" placeholder="Enter Book ID" type="text" name="store" id="store" value="">
                            <input class="form-control" type="hidden" name="reportedBy" id="reportedBy" value="">
                            <input class="form-control" type="hidden" name="reportedTo" id="reportedTo" value="">
                        </div>

                        <div class="form-group">
                            <label for="store"> Enter Description</label>
                            <textarea class="form-control" name="description" id="description" value=""></textarea>
                        </div>

                        <div class="form-buttons-w">
                            <button class="btn btn-primary btn-report" type="button"> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection