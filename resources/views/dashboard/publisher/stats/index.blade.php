<div class="col-sm-3 col-xxxl-3">
    <a class="element-box el-tablo" href="{{ route('order.view',  ['id' => \App\User::loggedInUserEmail()]) }}">
        <div class="label">Active Orders</div>
        <div class="value">{{ $ordersCount }}</div>
        <!-- <div class="trending trending-up-basic"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div> -->
    </a>
</div>
<div class="col-sm-3 col-xxxl-3">
    <a class="element-box el-tablo" href="{{ route('shipment.view',  ['id' => \App\User::loggedInUserEmail()]) }}">
        <div class="label">Active Shipments</div>
        <div class="value">{{ $shipmentsCount }}</div>
        <div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-down"></i></div>
    </a>
</div>
<div class="col-sm-3 col-xxxl-3">
    <a class="element-box el-tablo" href="{{ route('book.view', ['id' => \App\User::loggedInUserEmail()]) }}">
        <div class="label">Registered Books</div>
        <div class="value">{{ $booksPubCount }}</div>
        <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>
    </a>
</div>
<div class="col-sm-3 col-xxxl-3">
    <a class="element-box el-tablo" href="{{ route('book.view', ['id' => \App\User::loggedInUserEmail()]) }}">
        <div class="label">New Reports</div>
        <div class="value">{{ $reportCount }}</div>
        <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>
    </a>
</div>
<div class="col-sm-3 col-xxxl-3">
    <a class="element-box el-tablo" href="{{ route('book.view', ['id' => \App\User::loggedInUserEmail()]) }}">
        <div class="label">Publisher Points</div>
        <div class="value">{{ $points }}</div>
        <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>
    </a>
</div>