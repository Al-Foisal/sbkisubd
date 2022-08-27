@extends('backEnd.layouts.master')
@section('title', 'Manage District Childcity')
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
                        <li class="breadcrumb-item active"><a href="#">District Childcity</a></li>
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
                            <h5>Create District Childcity</h5>
                        </div>
                        <div class="quick-button">
                            <a href="{{ route('editor.districtchildcity.create') }}"
                                class="btn btn-primary btn-actions btn-create">
                                <i class="fas fa-plus"></i> Create
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
                                            <th>Name in English</th>
                                            <th>Name in Bangla</th>
                                            <th>District City</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cities as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->en_name }}</td>
                                                <td>{{ $value->bn_name }}</td>
                                                <td>{{ $value->districtsubcity->en_name ?? '' }}</td>
                                                <td>
                                                    <ul class="action_buttons dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            data-toggle="dropdown">Action Button
                                                            <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="edit_icon"
                                                                    href="{{ route('editor.districtchildcity.edit', $value->id) }}"
                                                                    title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                                            </li>
                                                            <li>
                                                                <form
                                                                    action="{{ route('editor.districtchildcity.destroy', $value->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit"
                                                                        onclick="return confirm('Are you delete this this?')"
                                                                        class="trash_icon" title="Delete"><i
                                                                            class="fa fa-trash"></i> Delete</button>
                                                                </form>
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
