@extends('layout.app')

@section('title', 'Customers | Customers Records')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
    <li class="breadcrumb-item"><span>Customers</span></li>
</ul>
@endsection

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <div class="element-actions">
                    <a class="btn btn-primary btn-sm" href="#" data-target="#addCustomerModal" data-toggle="modal">
                        <i class="os-icon os-icon-ui-22"></i><span>Add Customer</span>
                    </a>
                </div>
                <h6 class="element-header">Customer Records</h6>
                <div class="element-box-tp">
                    <div class="table-responsive">
                        <table class="table table-padded">
                            <thead>
                                <tr>
                                    <!-- <th></th> -->
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Member ID</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($customers))
                                @foreach($customers as $customer)
                                <tr>
                                    <!-- <td class="text-center">
                                        <input class="form-control" type="checkbox">
                                    </td> -->
                                    <td>
                                        <div class="user-with-avatar">
                                            <img alt="" src="img/avatar1.jpg">
                                            <span class="smaller">{{ $customer->name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="smaller text-center">{{ $customer->email }}</div>
                                    </td>
                                    <td><span class="smaller text-center">{{ $customer->memberId }}</span></td>
                                    <td>
                                        <span class="smaller text-center">
                                            {{ $customer->address->country }},
                                            {{ $customer->address->county }},
                                            {{ $customer->address->street }}
                                        </span>
                                    </td>
                                    <td class="row-actions">
                                        <a href="#" data-placement="top" data-toggle="tooltip" title="Track Book"><i class="os-icon os-icon-truck"></i></a><a onclick="event.preventDefault();editCustomerForm('{{ $customer->email }}');" href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a class="danger" onclick="event.preventDefault();deleteCustomerForm('{{ $customer->email }}');" href="#" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
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
@include('partials.customers.customers_add')
@include('partials.customers.customers_edit')
@include('partials.customers.customers_delete')
@endsection