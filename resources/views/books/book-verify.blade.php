@extends('layout.app')

@section('title', 'Books | Book Verification')

@section('content-box')
<?php
$reportedTo = "N/A";
$first = true;
$reportedToMemberId = "N/A";
$purchasedToEmail = "N/A";
?>
<div class="content-box">
    <div class="element-wrapper ">
        <div class="element-actions">
            <a class="btn btn-primary btn-sm" href="{{ route('book.index') }}">
                <i class="os-icon os-icon-book"></i><span>My Books Records</span>
            </a>
        </div>
        <h6 class="element-header">Supply Chain For {{ $id }}</h6>
        <?php 
            $bookSold = '';
        ?>
        <div class="element-box-tp">
            @if($groupOwners->sold)
                <div class="alert alert-danger">
                    Book Already Sold. By buying this book you are supporting counterfeit products. Please
                    report this on the report deck form and earn points that you can redeem on your next purchase. 
                    Help fight Counterfeits in Kenya.
                </div>
            @endif
            <div class="activity-boxes-w">
                @if($groupOwners)
                <?php 
                    $bookSold = $groupOwners->sold;
                ?>
                @if(isset($groupOwners->shipment->shipOwnership))
                @foreach ($groupOwners->shipment->shipOwnership as $groupOwner)
                <div class="activity-box-w">
                    <div class="activity-time">{{ Carbon\Carbon::parse($groupOwner->timestamp)->isoFormat('MMM Do YYYY dddd')  }}</div>
                    <div class="activity-box">
                    @if(isset($groupOwner->owner->avatar))
                        <div class="activity-avatar"><img alt="" src="{{$groupOwner->owner->avatar}}"></div>
                    @else
                        <div class="activity-avatar"><img alt="" src="/img/avatar.png"></div>
                    @endif
                        
                        <div class="activity-info">
                            @if(isset($groupOwner->owner->firstName))
                            <?php
                            if ($first) {
                                $reportedTo = $groupOwner->owner->email;
                                $first = false;
                            }
                            ?>
                            <div class="activity-role">{{ $groupOwner->owner->firstName }}</div>
                            @else
                            <div class="activity-role">{{ $groupOwner->owner->firstName }} {{ $groupOwner->owner->lastName }} </div>
                            @endif

                            @if(isset($groupOwner->owner->address->country) && isset($groupOwner->owner->address->county))
                            <strong class="activity-title">{{ $groupOwner->owner->address->country}} , {{ $groupOwner->owner->address->county }} , {{ $groupOwner->owner->address->street }}</strong>
                            @endif
                            <?php
                                $reportedToMemberId = $groupOwner->owner->memberId;
                                $purchasedToEmail = $groupOwner->owner->email;
                            ?>
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
        <div class="col-lg-6">
            @include('books.report-deck')
        </div>
        <div class="col-lg-6">
            @include('books.sale')
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
<script>
        console.log("Wards = " + wards[0].name);
        console.log("Wards Size = " + wards.length);

        var denomination = document.getElementById("ward")
        for (var i = 0; i < wards.length; i++) {
            var option = document.createElement("OPTION"),
                txt = document.createTextNode(wards[i].name);
            option.appendChild(txt);
            option.setAttribute("value", wards[i].name);
            denomination.insertBefore(option, denomination.lastChild);
        }
</script>
@endsection

<!-- https://github.com/njoguamos/Kenya-demographics-units/blob/master/src/wards/wards.json -->