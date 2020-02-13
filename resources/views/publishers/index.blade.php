@extends('layout.app')

@section('title', 'Publishers | Publishers Records')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
    <li class="breadcrumb-item"><span>Publishers</span></li>
</ul>
@endsection

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <div class="element-actions">
                    <a class="btn btn-primary btn-sm" href="#" data-target="#addPublisherModal" data-toggle="modal">
                        <i class="os-icon os-icon-ui-22"></i><span>Add Publisher</span>
                    </a>
                </div>
                <h6 class="element-header">Publisher Records</h6>
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
                                @if(!empty($publishers))
                                    @foreach($publishers as $publisher)
                                    <tr>
                                        <!-- <td class="text-center">
                                            <input class="form-control" type="checkbox">
                                        </td> -->
                                        <td>
                                            <div class="user-with-avatar">
                                                <img alt="" src="img/avatar1.jpg">
                                                <span class="smaller">{{ $publisher->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="smaller text-center">{{ $publisher->email }}</div>
                                        </td>
                                        <td><span class="smaller text-center">{{ $publisher->memberId }}</span></td>
                                        <td>
                                            <span class="smaller text-center">
                                                {{ $publisher->address->country }},
                                                {{ $publisher->address->county }},
                                                {{ $publisher->address->street }}
                                            </span>
                                        </td>
                                        <td class="row-actions">
                                            <a href="#" data-placement="top" data-toggle="tooltip" title="Placeholder"><i class="os-icon os-icon-truck"></i></a><a onclick="event.preventDefault();editPublisherForm('{{ $publisher->email }}');" href="#" data-placement="top" data-toggle="tooltip" title="Edit"><i class="os-icon os-icon-edit"></i></a><a class="danger" href="#" data-placement="top" data-toggle="tooltip" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
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
@include('partials.publishers.publishers_add')
@include('partials.publishers.publishers_edit')
@endsection
