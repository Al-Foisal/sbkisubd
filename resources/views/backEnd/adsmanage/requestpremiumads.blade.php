@extends('backEnd.layouts.master')
@section('title','Manage Premium Ads Request')
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
            <li class="breadcrumb-item active"><a href="#">Premium Ads Request</a></li>
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
                <h5>Manage Premium Ads Request</h5>
              </div>
              <div class="quick-button">
                <a href="{{url('editor/all-ads/manage')}}" class="btn btn-primary btn-actions btn-create">
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
                        <th>Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($show_datas as $key=>$value)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$value->title}} </td>
                          <td>
                             @foreach($adsimage as $image)
					            @if($value->id==$image->ads_id)
					               <img src="{{asset($image->image)}}" class="backend_image" alt="">
					                @break
					            @endif
					        @endforeach</td>
                          <td>{{$value->catname}} <i class="fas fa-angle-right"></i> {{$value->en_subcategoryName}}
                          </td>
                          <td> <button data-toggle="modal" class="btn btn-info btn-sm" data-target="#myModal{{$value->id}}">{{$value->customername}}</button>
                          
                          <!-- Modal -->
                                <div id="myModal{{$value->id}}" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Customer Basic Information</h4>
                                        
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <div class="modal-body">
                                        <p><img src="{{asset($value->customerimage)}}" class="backend_image"></p>
                                        <p>{{$value->customername}}</p>
                                        <p><a href="tel:{{$value->phone}}">{{$value->phone}}</a></p>
                                        <p><a href="mailto:{{$value->email}}">{{$value->email}}</a></p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                
                                  </div>
                                </div>
                          </td>
                          <td>{{$value->status==1?"Active":"Inactive"}}</td>
                          <td>
                          	<ul class="action_buttons dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                <li>
                                  @if($value->request==0)
                                    <form action="{{url('admin/customer/premium-ads/acceptrequest')}}" method="POST">
                                      @csrf
                                      <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                      <button type="submit" onclick="return confirm('Are you sure accept this?')" class="thumbs_up" title="Accept"><i class="fa fa-thumbs-up"></i> Accept Request</button>
                                    </form>
                                  @endif
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