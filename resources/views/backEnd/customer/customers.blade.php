@extends('backEnd.layouts.master')
@section('title', 'All customer')
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
                        <li class="breadcrumb-item active"><a href="#">Customer</a></li>
                        <li class="breadcrumb-item active">All</li>
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
                            <h5>All Customer List</h5>
                        </div>
                        <div class="quick-button">
                            <a href="{{ url('editor/customer/list') }}" class="btn btn-primary btn-actions btn-create">
                                All Customer List <i class="fas fa-plus"></i>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>Wallet</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td><img src="{{ asset($value->image) }}" class="backend_image"
                                                        alt=""></td>
                                                <td>
                                                    <form action="{{ url('superadmin/wallet') }}" method="post"
                                                        class="form-inline">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $value->id }}">
                                                        <div class="form-group">

                                                            <input type="number" name="wallet" required
                                                                class="form-control" value="{{ $value->wallet }}">
                                                        </div>
                                                        <div class="text-center">
                                                          <button type="submit" class="btn btn-success btn-sm">Updare</button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>{{ $value->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <td>
                                                    <ul class="action_buttons dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            data-toggle="dropdown">Action Button
                                                            <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            @if (Auth::user()->role_id == 1)
                                                                <li>
                                                                    @if ($value->status == 1)
                                                                        <form
                                                                            action="{{ url('superadmin/customer/inactive') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="hidden_id"
                                                                                value="{{ $value->id }}">
                                                                            <button type="submit" class="thumbs_down"><i
                                                                                    class="fa fa-thumbs-down"></i>
                                                                                Inactive</button>
                                                                        </form>
                                                                    @else
                                                                        <form
                                                                            action="{{ url('superadmin/customer/active') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="hidden_id"
                                                                                value="{{ $value->id }}">
                                                                            <button type="submit" class="thumbs_up"><i
                                                                                    class="fa fa-thumbs-up"></i>
                                                                                Active</button>
                                                                        </form>
                                                                    @endif
                                                                </li>
                                                            @endif
                                                            <li>
                                                                <a class="edit_icon"
                                                                    href="{{ url('editor/customer/allads/' . $value->slug . '/' . $value->id) }}"><i
                                                                        class="fa fa-eye"></i> All Ads</a>
                                                            </li>
                                                        </ul>
                                                    </ul>
                                                </td>
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
