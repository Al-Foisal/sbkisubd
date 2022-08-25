@extends('frontEnd.layouts.master1')
@section('body')
    @php
    use App\Adsimage;
    @endphp
    <style>
        a.nav-link {
            color: #080808 !important;
        }

        .skin a:not(.btn),
        .skin .nav-link,
        .skin .link-color {
            color: #000000 !important;
        }
    </style>
    <div class="main-container">


        <div class="container">
            <nav aria-label="breadcrumb" role="navigation" class="search-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/'.app()->getLocale()) }}"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item active">
                        {{ $page->{app()->getLocale().'_pagename'} }}
                    </li>
                </ol>
            </nav>
        </div>



        <div class="container">
            <div class="row">

                <div class="col-md-12 page-content col-thin-left mb-4">
                    <div class="category-list make-grid">


                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="contentAll" role="tabpanel" aria-labelledby="tabAll">
                                <div id="postsList" class="category-list-wrapper posts-wrapper row no-margin">
                                    <h1> {{ $page->{app()->getLocale().'_pagename'} }}</h1>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-box save-search-bar text-center">
                            <a href="#"> &nbsp; </a>
                        </div>
                    </div>
                    {!! $page->{app()->getLocale().'_text'} !!}

                    <nav class="mt-3 mb-0 pagination-sm" aria-label="">
                    </nav>

                </div>
            </div>
        </div>
    @endsection
