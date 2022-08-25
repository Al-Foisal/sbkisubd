@extends('backEnd.layouts.master')
@section('title','Manage All Reports')
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
            <li class="breadcrumb-item active"><a href="#">All Reports</a></li>
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
                <h5>Manage All Reports</h5>
              </div>
              <div class="quick-button">
                <a href="{{url('editor/ad/reports/')}}" class="btn btn-primary btn-actions btn-create">
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
                        <th>Ad Name</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Phone</th>
                        <th>Reports</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($show_datas as $key=>$value)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$value->title}}</td>
                          <td>{{$value->reportername}}</td>
                          <td>{{$value->reporteremail}}</td>
                          <td>{{$value->reporterphone}}</td>
                          <td>{!!$value->adreport!!}</td>
                          <td>
                              @if($value->status==0) Pendinng @endif
                              @if($value->status==1) Accept @endif
                              @if($value->status==2) Canceled @endif
                              
                            </td>
                          <td>
                          	<ul class="action_buttons dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                              	
                                <li>
                                  <form action="{{url('editor/reports/published')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                    <button type="submit" onclick="return confirm('Are you continue this this?')" class="btn btn-primary">Accept</button>
                                  </form>
                                </li>
                                
                                 <li>
                                    <form action="{{url('editor/reports/unpublished')}}" method="POST">
                                      @csrf
                                      <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                      <button type="submit" onclick="return confirm('Are you continue this this?')" title="published" class="btn btn-info"> Canceled</button>
                                    </form>
                                </li>
                                
                                 <li>
                                    <form action="{{url('editor/reports/delete')}}" method="POST">
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