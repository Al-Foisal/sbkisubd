@extends('frontEnd.layouts.master')
@section('title', 'Shop open schedule')
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
                            <p>Shop open schedule</p>
                        </div>
                        <div class="cbmain-content">
                            <form action="{{ url('/customer/shop/store-schedule') }}" method="POST" novalidate
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $customerId = Session::get('customerId') }}"
                                    name="customer_id">
                                    <input type="hidden" name="id[0]" value="{{ $open[0]->id ?? '' }}">
                                    <input type="hidden" name="id[1]" value="{{ $open[1]->id ?? '' }}">
                                    <input type="hidden" name="id[2]" value="{{ $open[2]->id ?? '' }}">
                                    <input type="hidden" name="id[3]" value="{{ $open[3]->id ?? '' }}">
                                    <input type="hidden" name="id[4]" value="{{ $open[4]->id ?? '' }}">
                                    <input type="hidden" name="id[5]" value="{{ $open[5]->id ?? '' }}">
                                    <input type="hidden" name="id[6]" value="{{ $open[6]->id ?? '' }}">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Day <span>*</span></label>
                                            <input type="text" class="form-control" value="Saturday" readonly
                                                placeholder="Day name" name="day_name[0]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Open Time <span>*</span></label>
                                            <input type="time" value="{{ $open[0]->open ?? '' }}" class="form-control" name="open[0]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Close time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[0]->close??'' }}"
                                                name="close[0]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Day <span>*</span></label>
                                            <input type="text" class="form-control" value="Sunday" readonly
                                                placeholder="Day name" name="day_name[1]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Open Time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[1]->open ?? '' }}"
                                                name="open[1]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Close time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[1]->close??'' }}"
                                                name="close[1]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                </div>





                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Day <span>*</span></label>
                                            <input type="text" class="form-control" value="Monday" readonly
                                                placeholder="Day name" name="day_name[2]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Open Time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[2]->open ?? '' }}"
                                                name="open[2]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Close time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[2]->close??'' }}"
                                                name="close[2]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Day <span>*</span></label>
                                            <input type="text" class="form-control" value="Tuesday" readonly
                                                placeholder="Day name" name="day_name[3]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Open Time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[3]->open ?? '' }}"
                                                name="open[3]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Close time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[3]->close??'' }}"
                                                name="close[3]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Day <span>*</span></label>
                                            <input type="text" class="form-control" value="Wednesday" readonly
                                                placeholder="Day name" name="day_name[4]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Open Time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[4]->open ?? '' }}"
                                                name="open[4]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Close time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[4]->close??'' }}"
                                                name="close[4]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Day <span>*</span></label>
                                            <input type="text" class="form-control" value="Thursday" readonly
                                                placeholder="Day name" name="day_name[5]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Open Time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[5]->open ?? '' }}"
                                                name="open[5]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Close time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[5]->close??'' }}"
                                                name="close[5]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Day <span>*</span></label>
                                            <input type="text" class="form-control" value="Friday" readonly
                                                placeholder="Day name" name="day_name[6]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Open Time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[6]->open ?? '' }}"
                                                name="open[6]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Close time <span>*</span></label>
                                            <input type="time" class="form-control" value="{{ $open[6]->close??'' }}"
                                                name="close[6]" required>
                                        </div>
                                        <!-- form group -->
                                    </div>
                                </div>
                                <!-- col end -->
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <button class="cbutton">Post Now</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-3 col-md-3 col-sm-12 lg-hide sm-show">
                @include('frontEnd.customer.sidebar')
            </div>
            <!-- col end -->
        </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection
