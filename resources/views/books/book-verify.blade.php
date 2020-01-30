@extends('layout.app')

@section('title', 'Books | Book Verification')

@section('content-box')
<div class="content-box">
    <div class="element-wrapper col-md-10">
        <h6 class="element-header">Supply Chain For {{ $id }}</h6>
        <div class="element-box-tp">
            <div class="activity-boxes-w">
                @if(count($groupOwners) > 0)
                    @foreach ($groupOwners as $groupOwner)
                    <div class="activity-box-w">
                        <div class="activity-time">{{ Carbon\Carbon::parse($groupOwner->timestamp)->format('d-m-Y i')  }}</div>
                        <div class="activity-box">
                            <div class="activity-avatar"><img alt="" src="/img/avatar1.jpg"></div>
                            <div class="activity-info">
                                <div class="activity-role">{{ $groupOwner->email }}</div>
                                <strong class="activity-title">{{ $groupOwner->shipment }}</strong>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="panel-body">
                    @lang('No Related Data Found.')
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection