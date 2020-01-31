@extends('layout.app')

@section('title', 'Books | Books Records')

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-12">
            <div class="element-wrapper">

                <h6 class="element-header">Recent Transactions</h6>
                <div class="element-box-tp">
                    <div class="table-responsive">
                        <table class="table table-padded">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Entry Type</th>
                                    <th>Participant</th>
                                    <!-- <th class="text-center">Category</th>
                                    <th class="text-right">Amount</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($transactions))
                                @foreach($transactions as $transaction)
                                <tr>
                                    <td><span>{{ Carbon\Carbon::parse($transaction->transactionTimestamp)->isoFormat('MMM Do YYYY dddd')  }}</span><span class="smaller lighter">{{ Carbon\Carbon::parse($transaction->transactionTimestamp)->modify('+3 hours')->isoFormat('HH:mm:ss')  }}</span></td>
                                    <?php
                                            $arr = explode(".", $transaction->transactionType);
                                            if(isset($transaction->participantInvoking)){
                                                $participantFiltered = explode("#", $transaction->participantInvoking);
                                                $getClass =  $participantFiltered[0];
                                                $getClassName = explode(".", $getClass);
                                                $participantFilter = $participantFiltered[1]."(".end($getClassName).")";
                                            }else{
                                                $participantFilter = "None";
                                            }
                                                                                        
                                    ?>
                                    <td class="nowrap"><span>{{ end($arr) }}</span></td>

                                    <td class="cell-with-media"><img alt="" src="img/company1.png" style="height: 25px;"><span>{{ $participantFilter }}</span></td>
                                    <!-- <td class="text-center"><a class="badge badge-success" href="#">Shopping</a></td>
                                    <td class="text-right bolder nowrap"><span class="text-success">+ 1,250 USD</span></td> -->
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <div class="alert alert-info" role="alert">
                                        <strong>Sorry! </strong>No Records at the moment.
                                    </div>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection