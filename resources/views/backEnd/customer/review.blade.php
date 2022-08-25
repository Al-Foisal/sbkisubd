@extends('backEnd.layouts.master')
@section('title','Manage All Reviews')
@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0 text-dark">Welcome !! {{auth::user()->name}}</h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">All Reviews</a></li>
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
                <h5>Manage All Reviews</h5>
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
                        <th>Ad Name</th>
                        <th>Customer Name</th>
                        <th>Reviewer Name</th>
                        <th>Reviews</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($show_datas as $key=>$value)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$value->ads->title}}</td>
                          <td>{{$value->ads->customer->name}} - ({{ $value->ads->customer->city }}) - {{ $value->ads->customer->phone }}</td>
                          <td>
                            {{$value->customer->name}} - ({{ $value->customer->city }}) - {{ $value->customer->phone }}
                          </td>
                          <td>{{$value->review}}</td>
                          <td>
                          	<ul class="action_buttons dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                              	
                                <li>
                                  <form action="{{url('editor/ad/reviews/confirm')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                    <button type="submit" onclick="return confirm('Are you continue this this?')" class="btn btn-primary">Accept</button>
                                  </form>
                                </li>
                                
                                 <li>
                                    <form action="{{url('editor/ad/reviews/delete')}}" method="POST">
                                      @csrf
                                      <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                      <button type="submit" onclick="return confirm('Are you delete this this?')" class="trash_icon" title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                  </li>
                                </ul>
                              </ul>
                          </td>
                          <!-- customer details -->
                         
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