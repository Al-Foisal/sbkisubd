@extends('frontEnd.layouts.master1')
@section('title', 'Package pricing')
@section('body')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <h1 class="text-center">Code Ecstasy</h1>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li class="text-danger">{{ $error }}</li>
                        </ul>
                    @endforeach
                @endif

                <form action="{{ route('uddoktapay.pay') }}" class="mt-4" method="POST">

                    @csrf

                    <label for="name" class="mt-2"><b>Name:</b></label>
                    <input name="full_name" type="text" id="name" class="form-control mt-2" value="Code Ecstasy">

                    <label for="email" class="mt-4"><b>Email:</b></label>
                    <input name="email" type="email" id="email" class="form-control mt-2" value="email@example.com">

                    <label for="name" class="mt-4"><b>Amount:</b></label>
                    <input name="amount" type="number" id="name" class="form-control mt-2" value="50">

                    <input type="submit" class="btn btn-primary mt-4">
                </form>

                <p class="small text-center font-bold mt-5">&copy; Copyright {{ date('Y') }} <a
                        href="http://codecstasy.com">Code Ecstasy</a> - All Rights Reserved</p>
            </div>
        </div>
    </div>

@endsection
