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
                                    <div class="activity-role">{{ $groupOwner->owner->name }}</div>
                                    <strong class="activity-title">{{ $groupOwner->owner->address->country}} , {{ $groupOwner->owner->address->county }} , {{ $groupOwner->owner->address->street }}</strong>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="alert alert-success">
                        @lang('No Related Data Found.')
                    </div>
                    @endif
                @else
                <div class="alert alert-success">
                    @lang('No Related Data Found.')
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection