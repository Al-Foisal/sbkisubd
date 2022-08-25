@extends('backEnd.layouts.master')
@section('title','Cancel Membership')
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
            <li class="breadcrumb-item active"><a href="#">Customer</a></li>
            <li class="breadcrumb-item active">Cancel Membership</li>
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
                <h5>Cancel Membership</h5>
              </div>
              <div class="quick-button">
                <a href="{{url('/')}}" class="btn btn-primary btn-actions btn-create">
                All Customer<i class="fas fa-plus"></i>
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
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                       @foreach($cancelmembership as $key=>$value)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{$value->phone}}</td>
                          <td><img src="{{asset($value->image)}}" class="backend_image" alt=""></td>
                          <td>{{$value->status==1?"Active":"Inactive"}}</td>
                          <td>
                            <ul class="action_buttons dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                  <li>
                                    <form action="{{url('superadmin/customer/membership-cancel')}}" method="POST">
                                      @csrf
                                      <input type="hidden" name="customer" value="{{$value->id}}">
                                      <button type="submit" onclick="return confirm('Are you sure ? Cancel membership for this customer.')" class="edit_icon"> Cancel Membership</button>
                                    </form>
                                  </li>
                                   <li>
                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{$value->id}}"> View Details</a>
                                  </li>
                                </ul>
                              </ul>
                          </td>
                          <td>
                            <!-- Modal -->
                          @php
                            $membershopinfoes = App\Membershipform::where('customerId',$value->id)->orderBy('id','DESC')->limit(1)->get();
                          @endphp
                            <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <table class="table table-bordered">
                                    @foreach($membershopinfoes as $membershopinfo)
                                     <tr>
                                       <td>Shop Name</td>
                                       <td>{{$membershopinfo->shopname}}</td>
                                     </tr>
                                     <tr>
                                       <td>Shop Holder Name</td>
                                       <td>{{$membershopinfo->shopholdername}}</td>
                                     </tr>
                                     <tr>
                                       <td>Shop Holder Phone</td>
                                       <td>{{$membershopinfo->shopholderphone}}</td>
                                     </tr>
                                     <tr>
                                       <td>Shop Address</td>
                                       <td>{{$membershopinfo->shopaddress}}</td>
                                     </tr>
                                     @endforeach
                                   </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- modal end -->
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