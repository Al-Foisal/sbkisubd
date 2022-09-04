@extends('backEnd.layouts.master')
@section('title', 'Manage All Nilam Ads')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark">Welcome !! {{ auth::user()->name }}</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="#">All Ads Request</a></li>
                        <li class="breadcrumb-item active">Manage</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="manage-button">
                        <div class="body-title">
                            <h5>Nilam Ads</h5>
                        </div>
                        <div class="quick-button">
                            <a href="{{ url('editor/all-ads/manage') }}" class="btn btn-primary btn-actions btn-create">
                                All Ads <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Base Price</th>
                                            <th>Bid Price</th>
                                            <th>Post By</th>
                                            <th>Bid By</th>
                                            <th>Bid</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($show_datas as $key => $value)
                                            <tr>
                                                @php
                                                    $bid = App\Nilamhistories::find($value->bidder_id);
                                                @endphp
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset($value->image->image) }}" style="height:50px;width:50px">
                                                </td>
                                                <td>{{ $value->title }} </td>
                                                <td>{{ $value->price }} </td>
                                                <td>{{ $value->bid_price }} </td>
                                                <td>{{ $value->customer->name ?? '' }} </td>
                                                <td>{{ $bid->customer->name ?? '' }} </td>
                                                <td>{{ $value->nilamhistory->count() }} </td>
                                                <td>{{ $value->status === 1 ? 'Close' : 'Active' }} </td>
                                            </tr>
                                        @endforeach
                                        </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
