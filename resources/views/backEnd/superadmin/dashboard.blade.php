@extends('backEnd.layouts.master')
@section('title','Super Admin Dashboard')
@section('content')
 

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$alluser}}</h3>

                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{url('superadmin/user/manage')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$newads}}</h3>
                        <p>New Ad</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ad"></i>
                    </div>
                    <a href="{{url('admin/show/ads-new/request')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{$updateads}}</h3>

                        <p>Pending Ads</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ad"></i>
                    </div>
                    <a href="{{url('admin/show/ads-update/request')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$premiumads}}</h3>

                        <p>Premium Ads</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ad"></i>
                    </div>
                    <a href="{{url('admin/show/ads-premium/request')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$adsall}}</h3>

                        <p>Total Ads</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ad"></i>
                    </div>
                    <a href="{{url('/admin/customer/show/all-ads')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$membeReqeuest}}</h3>

                        <p>Membership Request</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-cog"></i>
                    </div>
                    <a href="{{url('superadmin/customer/membership-request')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$totalMember}}</h3>

                        <p>Total Members</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-handshake"></i>
                    </div>
                    <a href="{{url('/superadmin/customer/all-membership')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$cancelMember}}</h3>

                        <p>Membership Cancel</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-alt-slash"></i>
                    </div>
                    <a href="{{url('superadmin/customer/membership-cancel')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>{{$todayAds}}</h3>

                        <p>Today's Ad</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-primary">
                    <div class="inner">
                        <h3>{{$totalcustomer}}</h3>

                        <p>Total Customers</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users-cog"></i>
                    </div>
                    <a href="{{url('editor/customer/list')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
    </div>
</section>






@endsection