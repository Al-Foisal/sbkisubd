@extends('frontEnd.layouts.master')
@section('title','All Ad Report')
@section('content')
<section class="customer-bg section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 sm-hide">
               @include('frontEnd.customer.sidebar')
            </div>
            <!-- col end -->
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="customer-body">
                    <div class="title">
                        <p>My Ad Report</p>
                    </div>
                    <div class="cbmain-content">
                        <div class="ads-table">
                          
                          <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">Sl No.</th>
                                  <th scope="col">Ad Name</th>
                                  <th scope="col">Status</th>
                                </tr>
                              </thead>
                              <tbody>
                              @foreach($show_datas as $key=>$value)
                                <tr>
                                  <th scope="row">{{$loop->iteration}}</th>
                                  <td>{{$value->title}}</td>
                                  <td>
                                      @if($value->status==0) Pending @endif
                                      @if($value->status==1) Accept @endif
                                      @if($value->status==2) Canceled @endif
                                  </td>
                                  
                                </tr>
                                <!-- item end -->
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-3 col-md-3 col-sm-12 lg-hide sm-show">
                @include('frontEnd.customer.sidebar')
            </div>
        </div>
    </div>
</section>
@endsection