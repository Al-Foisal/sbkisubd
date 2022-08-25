@extends('backEnd.layouts.master')
@section('title','Manage Customer All Ads')
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
            <li class="breadcrumb-item active"><a href="#">'Manage Customer All Ads</a></li>
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
                <h5>Manage Customer All Ads</h5>
              </div>
              <div class="quick-button">
                <a href="{{url('editor/customer/list')}}" class="btn btn-primary btn-actions btn-create">
                All Customer <i class="fas fa-plus"></i>
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
                        <div class="customerinfo">
                            <div class="customerinfo-head">
                                <h4>Customer Information</h4>
                            </div>
                            <div class="customerinfo-body">
                                <img src="{{asset($customerInfo->image)}}" style="width:100px;height:100px;border-radius:50%;margin:20px 0"/>
                                <h6><strong>Name:</strong> {{$customerInfo->name}}</h6>
                                <h6><strong>Email:</strong> {{$customerInfo->email}}</h6>
                                <h6><strong>Phone:</strong> {{$customerInfo->phone}}</h6>
                                <h6><strong>Total Ads:</strong> {{$customersads->count()}}</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($customersads as $key=>$value)
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
                          <td>{{$value->catname}} <i class="fas fa-angle-right"></i> {{$value->subcategoryName}}
                          </td>
                          <td>{{$value->status==1?"Active":"Inactive"}}</td>
                          <td>
                          	<ul class="action_buttons dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action Button
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                              	<li>
                              		<a class="edit_icon" href="{{url('admin/customer/ads/activation/'.$value->id)}}" title="Edit"><i class="fas fa-check"></i> Activation</a>
                              	</li>
                                <li>
                                  @if($value->status==1)
                                  <form action="{{url('admin/customer/ads/unpublished')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                    <button type="submit" class="thumbs_up" title="unpublished"><i class="fa fa-thumbs-up"></i> Published</button>
                                  </form>
                                  @else
                                    <form action="{{url('admin/customer/ads/published')}}" method="POST">
                                      @csrf
                                      <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                      <button type="submit" class="thumbs_down" title="published"><i class="fa fa-thumbs-down"></i> Unpublished</button>
                                    </form>
                                  @endif
                                </li>
                                 <li>
                                    <form action="{{url('admin/customer/ads/delete')}}" method="POST">
                                      @csrf
                                      <input type="hidden" name="hidden_id" value="{{$value->id}}">
                                      <button type="submit" onclick="return confirm('Are you delete this this?')" class="trash_icon" title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                    </form>
                                  </li>
                                </ul>
                              </ul>
                          </td>
                          <!-- customer details -->
                          <div id="myModal{{$value->customerId}}" class="modal fade" role="dialog">
	                        <div class="modal-dialog">
	                          <!-- Modal content-->
	                          <div class="modal-content">
	                            <div class="modal-header">
	                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                            </div>
	                            <div class="modal-body">

	                              <div class="profileimage">
	                                <img src="{{asset($value->customerimage)}}" alt="">
	                              </div>
	                              <p><strong>Customar Name : </strong> {{$value->customername}}</p>
	                              <p><strong>Customar Email :</strong> {{$value->email}}</p>
	                              <p><strong>Customar Phone :</strong> {{$value->phone}}</p>
	                            </div>
	                            <div class="modal-footer">
	                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                            </div>
	                          </div>

	                        </div>
	                      </div>
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