@extends('layout.app')

@section('title', 'Distributors | Distributors Records')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
    <li class="breadcrumb-item"><span>Distributors</span></li>
</ul>
@endsection

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <div class="element-actions">
                    <a class="btn btn-primary btn-sm" href="#" data-target="#addDistributorModal" data-toggle="modal">
                        <i class="os-icon os-icon-ui-22"></i><span>Add Distributor</span>
                    </a>
                </div>
                <h6 class="element-header">Distributor Records</h6>
                <div class="element-box-tp">
                    <div class="table-responsive">
                        <table class="table table-padded">
                            <thead>
                                <tr>
                                    <!-- <th></th> -->
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Member ID</th>
                                    <th class="text-center">Tel</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($distributors))
                                @foreach($distributors as $distributor)
                                <tr>
                                    <!-- <td class="text-center">
                                            <input class="form-control" type="checkbox">
                                        </td> -->
                                    <td>
                                        <div class="user-with-avatar">
                                            <img alt="" src="img/avatar1.jpg">
                                            <span class="smaller">{{ $distributor->name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="smaller text-center">{{ $distributor->email }}</div>
                                    </td>
                                    <td><span class="smaller text-center">{{ $distributor->memberId }}</span></td>
                                    @if(isset( $publisher->telephone ))
                                    <td><span class="smaller text-center">{{ $publisher->telephone }}</span></td>
                                    @else
                                    <td><span class="smaller text-center">Unknown</span></td>
                                    @endif
                                    <td>
                                        <span class="smaller text-center">
                                            {{ $distributor->address->country }},
                                            {{ $distributor->address->county }},
                                            {{ $distributor->address->street }}
                                        </span>
                                    </td>
                                    <td class="row-actions">
                                        <a href="#" data-placement="top" data-toggle="tooltip" title="Track Book"><i class="os-icon os-icon-truck"></i></a><a onclick="event.preventDefault();editDistributorForm('{{ $distributor->email }}');" href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a class="danger" onclick="event.preventDefault();deleteDistributorForm('{{ $distributor->email }}');" href="#" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
                                    </td>
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
<!-- Modal -->
@include('partials.distributors.distributors_add')
@include('partials.distributors.distributors_edit')
@include('partials.distributors.distributors_delete')
@endsection