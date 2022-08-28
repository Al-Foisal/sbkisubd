<!--
Website: Classified
Author: QuickTech IT
Author URI: http://quicktech-ltd.com;
Description: QuickTech IT maintain standard quality for Classified website.
Version: 206.0.0
-->
@php
    $locale = session('language') ?? app()->getLocale();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Home') - Sellquicker </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://kroyandbikroy.com/storage/app/default/ico/apple-touch-icon-144-precomposed.png">
    <!-- all css -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://kroyandbikroy.com/storage/app/default/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://kroyandbikroy.com/storage/app/default/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://kroyandbikroy.com/storage/app/default/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="http://kroyandbikroy.com/storage/app/default/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="http://kroyandbikroy.com/storage/app/ico/thumb-32x32-ico-62d282d632e2b.png">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/bootstrap.min.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/font-awesome.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/feathericon.min.css">
    <!-- feathericon css -->
    <link rel="stylesheet" href="{{ asset('backEnd/') }}/dist/css/toastr.min.css">
    <!-- toastr -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/swiper-menu.css">
    <!-- swiper-menu css -->

    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/theme.css">
    <!-- mtree css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
    <!-- summernote css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/owl.carousel.min.css">
    <!-- owl.carousel.min css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/owl.theme.default.css">
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/nice-select.css">
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/style.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/responsive.css">
    <!-- responsive css -->
    <script src="{{ asset('frontEnd/') }}/js/jquery-3.4.1.min.js"></script>
    <script data-ad-client="ca-pub-3346835581317070" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>





    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="csrf-token" content="WhEyytVMUcy6pD7biPTZLmepECEHGcVD5swYFeXi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-title" content="kroyandbikroy.com">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="/storage/app/default/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="/storage/app/default/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="/storage/app/default/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
        href="/storage/app/default/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="/storage/app/ico/thumb-32x32-ico-62d282d632e2b.png">
    <title>kroyandbikroy.com - Buy Sell Anything</title>
    <meta name="description" property="description" content="kroyandbikroy.com - Buy Sell Anything">
    <meta name="keywords" property="keywords" content="">
	<link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/bootstrap.min.css">
    <link rel="canonical" href="http://kroyandbikroy.com/">
	<link rel="stylesheet" href="{{ asset('/') }}index-style/owl.carousel.min.css">
	<link rel="stylesheet" href="{{ asset('/') }}index-style/owl.theme.default.min.css">
    <!--<base target="_top">-->
    <base href="." target="_top">
    <meta property="fb:app_id" content="996756437567615">
    <meta property="og:site_name" content="kroyandbikroy.com">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://kroyandbikroy.com">
    <meta property="og:title" content="kroyandbikroy.com - Buy Sell Anything">
    <meta property="og:description" content="kroyandbikroy.com - Buy Sell Anything">
    <meta property="og:image" content="/storage/app/logo/header-62d4fbfe293e3.jpeg">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="600">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="kroyandbikroy.com - Buy Sell Anything">
    <meta name="twitter:description" content="kroyandbikroy.com - Buy Sell Anything">
    <meta name="twitter:domain" content="update.kroyandbikroy.com">

    <link rel="alternate" type="application/atom+xml" href="http://kroyandbikroy.com/feed" title="My feed">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('/') }}index-style/app.css" rel="stylesheet">

    <link href="{{ asset('/') }}index-style/style.css" rel="stylesheet">
    <style>
        /* === Homepage: Search Form Area === */
        #homepage .intro:not(.only-search-bar) {
			height: 200px;
         max-height: 200px;
        }

        .intro {
            background:#07A4B4;
            background-size: cover;
        }

        #homepage .intro:not(.only-search-bar) h1 {
            color: #040404;
        }

        #homepage .intro:not(.only-search-bar) p {
            color: #000000;
        }

        #homepage .search-row .search-col:first-child .search-col-inner,
        #homepage .search-row .search-col .search-col-inner,
        #homepage .search-row .search-col .search-btn-border {
            border-width: 5px;
        }

        @media (max-width: 767px) {

            .search-row .search-col:first-child .search-col-inner,
            .search-row .search-col .search-col-inner,
            .search-row .search-col .search-btn-border {
                border-width: 5px;
            }
        }


        #homepage .search-row .search-col:first-child .search-col-inner {
            border-top-left-radius: 5px !important;
            border-bottom-left-radius: 5px !important;
        }

        #homepage .search-row .search-col:first-child .form-control {
            border-top-left-radius: 4px !important;
            border-bottom-left-radius: 4px !important;
        }

        #homepage .search-row .search-col .search-btn-border {
            border-top-right-radius: 5px !important;
            border-bottom-right-radius: 5px !important;
        }

        #homepage .search-row .search-col .btn {
            border-top-right-radius: 4px !important;
            border-bottom-right-radius: 4px !important;
        }

        @media (max-width: 767px) {

            #homepage .search-row .search-col:first-child .form-control,
            #homepage .search-row .search-col:first-child .search-col-inner,
            #homepage .search-row .search-col .form-control,
            #homepage .search-row .search-col .search-col-inner,
            #homepage .search-row .search-col .btn,
            #homepage .search-row .search-col .search-btn-border {
                border-radius: 5px !important;
            }
        }


        #homepage .search-row .search-col:first-child .search-col-inner,
        #homepage .search-row .search-col .search-col-inner,
        #homepage .search-row .search-col .search-btn-border {
            border-color: #00000000;
        }

        @media (max-width: 767px) {

            #homepage .search-row .search-col:first-child .search-col-inner,
            #homepage .search-row .search-col .search-col-inner,
            #homepage .search-row .search-col .search-btn-border {
                border-color: #00000000;
            }
        }

        @media (min-width: 1200px) {
            #homepage .intro.only-search-bar .container {
                max-width: 1200px;
            }
        }

        /* === Homepage: Locations & Country Map === */
    </style>

    <link href="{{ asset('/') }}index-style/custom.css" rel="stylesheet">
    <style>
        li {
        display: block !important;
    
    }
    .solcial_icon{
        display: inline-block !important;
    }
    </style>


        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script src="{{ asset('/') }}index-style/pace.min.js.download"></script>
    <script src="{{ asset('/') }}index-style/modernizr-custom.js.download"></script>

    <link rel="dns-prefetch" href="http://fonts.googleapis.com/">
    <link rel="dns-prefetch" href="http://fonts.gstatic.com/">
    <link rel="dns-prefetch" href="http://storage.googleapis.com/">
    <link rel="dns-prefetch" href="http://graph.facebook.com/">
    <link rel="dns-prefetch" href="http://google.com/">
    <link rel="dns-prefetch" href="http://apis.google.com/">
    <link rel="dns-prefetch" href="http://ajax.googleapis.com/">
    <link rel="dns-prefetch" href="http://www.google-analytics.com/">
    <link rel="dns-prefetch" href="http://www.googletagmanager.com/">
    <link rel="dns-prefetch" href="http://pagead2.googlesyndication.com/">
    <link rel="dns-prefetch" href="http://gstatic.com/">
    <link rel="dns-prefetch" href="http://cdn.api.twitter.com/">
    <link rel="dns-prefetch" href="http://oss.maxcdn.com/">
    <link rel="dns-prefetch" href="http://cloudflare.com/">
    <style>
        .swal2-popup.swal2-toast {
            box-sizing: border-box;
            grid-column: 1/4 !important;
            grid-row: 1/4 !important;
            grid-template-columns: 1fr 99fr 1fr;
            padding: 1em;
            overflow-y: hidden;
            background: #fff;
            box-shadow: 0 0 1px rgba(0, 0, 0, .075), 0 1px 2px rgba(0, 0, 0, .075), 1px 2px 4px rgba(0, 0, 0, .075), 1px 3px 8px rgba(0, 0, 0, .075), 2px 4px 16px rgba(0, 0, 0, .075);
            pointer-events: all
        }

        .swal2-popup.swal2-toast>* {
            grid-column: 2
        }

        .swal2-popup.swal2-toast .swal2-title {
            margin: .5em 1em;
            padding: 0;
            font-size: 1em;
            text-align: initial
        }

        .swal2-popup.swal2-toast .swal2-loading {
            justify-content: center
        }

        .swal2-popup.swal2-toast .swal2-input {
            height: 2em;
            margin: .5em;
            font-size: 1em
        }

        .swal2-popup.swal2-toast .swal2-validation-message {
            font-size: 1em
        }

        .swal2-popup.swal2-toast .swal2-footer {
            margin: .5em 0 0;
            padding: .5em 0 0;
            font-size: .8em
        }

        .swal2-popup.swal2-toast .swal2-close {
            grid-column: 3/3;
            grid-row: 1/99;
            align-self: center;
            width: .8em;
            height: .8em;
            margin: 0;
            font-size: 2em
        }

        .swal2-popup.swal2-toast .swal2-html-container {
            margin: .5em 1em;
            padding: 0;
            font-size: 1em;
            text-align: initial
        }

        .swal2-popup.swal2-toast .swal2-html-container:empty {
            padding: 0
        }

        .swal2-popup.swal2-toast .swal2-loader {
            grid-column: 1;
            grid-row: 1/99;
            align-self: center;
            width: 2em;
            height: 2em;
            margin: .25em
        }

        .swal2-popup.swal2-toast .swal2-icon {
            grid-column: 1;
            grid-row: 1/99;
            align-self: center;
            width: 2em;
            min-width: 2em;
            height: 2em;
            margin: 0 .5em 0 0
        }

        .swal2-popup.swal2-toast .swal2-icon .swal2-icon-content {
            display: flex;
            align-items: center;
            font-size: 1.8em;
            font-weight: 700
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring {
            width: 2em;
            height: 2em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
            top: .875em;
            width: 1.375em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left] {
            left: .3125em
        }

        .swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right] {
            right: .3125em
        }

        .swal2-popup.swal2-toast .swal2-actions {
            justify-content: flex-start;
            height: auto;
            margin: 0;
            margin-top: .5em;
            padding: 0 .5em
        }

        .swal2-popup.swal2-toast .swal2-styled {
            margin: .25em .5em;
            padding: .4em .6em;
            font-size: 1em
        }

        .swal2-popup.swal2-toast .swal2-success {
            border-color: #a5dc86
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line] {
            position: absolute;
            width: 1.6em;
            height: 3em;
            transform: rotate(45deg);
            border-radius: 50%
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left] {
            top: -.8em;
            left: -.5em;
            transform: rotate(-45deg);
            transform-origin: 2em 2em;
            border-radius: 4em 0 0 4em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right] {
            top: -.25em;
            left: .9375em;
            transform-origin: 0 1.5em;
            border-radius: 0 4em 4em 0
        }

        .swal2-popup.swal2-toast .swal2-success .swal2-success-ring {
            width: 2em;
            height: 2em
        }

        .swal2-popup.swal2-toast .swal2-success .swal2-success-fix {
            top: 0;
            left: .4375em;
            width: .4375em;
            height: 2.6875em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line] {
            height: .3125em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip] {
            top: 1.125em;
            left: .1875em;
            width: .75em
        }

        .swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long] {
            top: .9375em;
            right: .1875em;
            width: 1.375em
        }

        .swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-tip {
            -webkit-animation: swal2-toast-animate-success-line-tip .75s;
            animation: swal2-toast-animate-success-line-tip .75s
        }

        .swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-long {
            -webkit-animation: swal2-toast-animate-success-line-long .75s;
            animation: swal2-toast-animate-success-line-long .75s
        }

        .swal2-popup.swal2-toast.swal2-show {
            -webkit-animation: swal2-toast-show .5s;
            animation: swal2-toast-show .5s
        }

        .swal2-popup.swal2-toast.swal2-hide {
            -webkit-animation: swal2-toast-hide .1s forwards;
            animation: swal2-toast-hide .1s forwards
        }

        .swal2-container {
            display: grid;
            position: fixed;
            z-index: 1060;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            box-sizing: border-box;
            grid-template-areas: "top-start     top            top-end""center-start  center         center-end""bottom-start  bottom-center  bottom-end";
            grid-template-rows: minmax(-webkit-min-content, auto) minmax(-webkit-min-content, auto) minmax(-webkit-min-content, auto);
            grid-template-rows: minmax(min-content, auto) minmax(min-content, auto) minmax(min-content, auto);
            height: 100%;
            padding: .625em;
            overflow-x: hidden;
            transition: background-color .1s;
            -webkit-overflow-scrolling: touch
        }

        .swal2-container.swal2-backdrop-show,
        .swal2-container.swal2-noanimation {
            background: rgba(0, 0, 0, .4)
        }

        .swal2-container.swal2-backdrop-hide {
            background: 0 0 !important
        }

        .swal2-container.swal2-bottom-start,
        .swal2-container.swal2-center-start,
        .swal2-container.swal2-top-start {
            grid-template-columns: minmax(0, 1fr) auto auto
        }

        .swal2-container.swal2-bottom,
        .swal2-container.swal2-center,
        .swal2-container.swal2-top {
            grid-template-columns: auto minmax(0, 1fr) auto
        }

        .swal2-container.swal2-bottom-end,
        .swal2-container.swal2-center-end,
        .swal2-container.swal2-top-end {
            grid-template-columns: auto auto minmax(0, 1fr)
        }

        .swal2-container.swal2-top-start>.swal2-popup {
            align-self: start
        }

        .swal2-container.swal2-top>.swal2-popup {
            grid-column: 2;
            align-self: start;
            justify-self: center
        }

        .swal2-container.swal2-top-end>.swal2-popup,
        .swal2-container.swal2-top-right>.swal2-popup {
            grid-column: 3;
            align-self: start;
            justify-self: end
        }

        .swal2-container.swal2-center-left>.swal2-popup,
        .swal2-container.swal2-center-start>.swal2-popup {
            grid-row: 2;
            align-self: center
        }

        .swal2-container.swal2-center>.swal2-popup {
            grid-column: 2;
            grid-row: 2;
            align-self: center;
            justify-self: center
        }

        .swal2-container.swal2-center-end>.swal2-popup,
        .swal2-container.swal2-center-right>.swal2-popup {
            grid-column: 3;
            grid-row: 2;
            align-self: center;
            justify-self: end
        }

        .swal2-container.swal2-bottom-left>.swal2-popup,
        .swal2-container.swal2-bottom-start>.swal2-popup {
            grid-column: 1;
            grid-row: 3;
            align-self: end
        }

        .swal2-container.swal2-bottom>.swal2-popup {
            grid-column: 2;
            grid-row: 3;
            justify-self: center;
            align-self: end
        }

        .swal2-container.swal2-bottom-end>.swal2-popup,
        .swal2-container.swal2-bottom-right>.swal2-popup {
            grid-column: 3;
            grid-row: 3;
            align-self: end;
            justify-self: end
        }

        .swal2-container.swal2-grow-fullscreen>.swal2-popup,
        .swal2-container.swal2-grow-row>.swal2-popup {
            grid-column: 1/4;
            width: 100%
        }

        .swal2-container.swal2-grow-column>.swal2-popup,
        .swal2-container.swal2-grow-fullscreen>.swal2-popup {
            grid-row: 1/4;
            align-self: stretch
        }

        .swal2-container.swal2-no-transition {
            transition: none !important
        }

        .swal2-popup {
            display: none;
            position: relative;
            box-sizing: border-box;
            grid-template-columns: minmax(0, 100%);
            width: 32em;
            max-width: 100%;
            padding: 0 0 1.25em;
            border: none;
            border-radius: 5px;
            background: #fff;
            color: #545454;
            font-family: inherit;
            font-size: 1rem
        }

        .swal2-popup:focus {
            outline: 0
        }

        .swal2-popup.swal2-loading {
            overflow-y: hidden
        }

        .swal2-title {
            position: relative;
            max-width: 100%;
            margin: 0;
            padding: .8em 1em 0;
            color: #595959;
            font-size: 1.875em;
            font-weight: 600;
            text-align: center;
            text-transform: none;
            word-wrap: break-word
        }

        .swal2-actions {
            display: flex;
            z-index: 1;
            box-sizing: border-box;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            width: auto;
            margin: 1.25em auto 0;
            padding: 0
        }

        .swal2-actions:not(.swal2-loading) .swal2-styled[disabled] {
            opacity: .4
        }

        .swal2-actions:not(.swal2-loading) .swal2-styled:hover {
            background-image: linear-gradient(rgba(0, 0, 0, .1), rgba(0, 0, 0, .1))
        }

        .swal2-actions:not(.swal2-loading) .swal2-styled:active {
            background-image: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .2))
        }

        .swal2-loader {
            display: none;
            align-items: center;
            justify-content: center;
            width: 2.2em;
            height: 2.2em;
            margin: 0 1.875em;
            -webkit-animation: swal2-rotate-loading 1.5s linear 0s infinite normal;
            animation: swal2-rotate-loading 1.5s linear 0s infinite normal;
            border-width: .25em;
            border-style: solid;
            border-radius: 100%;
            border-color: #2778c4 transparent #2778c4 transparent
        }

        .swal2-styled {
            margin: .3125em;
            padding: .625em 1.1em;
            transition: box-shadow .1s;
            box-shadow: 0 0 0 3px transparent;
            font-weight: 500
        }

        .swal2-styled:not([disabled]) {
            cursor: pointer
        }

        .swal2-styled.swal2-confirm {
            border: 0;
            border-radius: .25em;
            background: initial;
            background-color: #7367f0;
            color: #fff;
            font-size: 1em
        }

        .swal2-styled.swal2-confirm:focus {
            box-shadow: 0 0 0 3px rgba(115, 103, 240, .5)
        }

        .swal2-styled.swal2-deny {
            border: 0;
            border-radius: .25em;
            background: initial;
            background-color: #ea5455;
            color: #fff;
            font-size: 1em
        }

        .swal2-styled.swal2-deny:focus {
            box-shadow: 0 0 0 3px rgba(234, 84, 85, .5)
        }

        .swal2-styled.swal2-cancel {
            border: 0;
            border-radius: .25em;
            background: initial;
            background-color: #6e7d88;
            color: #fff;
            font-size: 1em
        }

        .swal2-styled.swal2-cancel:focus {
            box-shadow: 0 0 0 3px rgba(110, 125, 136, .5)
        }

        .swal2-styled.swal2-default-outline:focus {
            box-shadow: 0 0 0 3px rgba(100, 150, 200, .5)
        }

        .swal2-styled:focus {
            outline: 0
        }

        .swal2-styled::-moz-focus-inner {
            border: 0
        }

        .swal2-footer {
            justify-content: center;
            margin: 1em 0 0;
            padding: 1em 1em 0;
            border-top: 1px solid #eee;
            color: #545454;
            font-size: 1em
        }

        .swal2-timer-progress-bar-container {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            grid-column: auto !important;
            height: .25em;
            overflow: hidden;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px
        }

        .swal2-timer-progress-bar {
            width: 100%;
            height: .25em;
            background: rgba(0, 0, 0, .2)
        }

        .swal2-image {
            max-width: 100%;
            margin: 2em auto 1em
        }

        .swal2-close {
            z-index: 2;
            align-items: center;
            justify-content: center;
            width: 1.2em;
            height: 1.2em;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: -1.2em;
            padding: 0;
            overflow: hidden;
            transition: color .1s, box-shadow .1s;
            border: none;
            border-radius: 5px;
            background: 0 0;
            color: #ccc;
            font-family: serif;
            font-family: monospace;
            font-size: 2.5em;
            cursor: pointer;
            justify-self: end
        }

        .swal2-close:hover {
            transform: none;
            background: 0 0;
            color: #f27474
        }

        .swal2-close:focus {
            outline: 0;
            box-shadow: inset 0 0 0 3px rgba(100, 150, 200, .5)
        }

        .swal2-close::-moz-focus-inner {
            border: 0
        }

        .swal2-html-container {
            z-index: 1;
            justify-content: center;
            margin: 1em 1.6em .3em;
            padding: 0;
            overflow: auto;
            color: #545454;
            font-size: 1.125em;
            font-weight: 400;
            line-height: normal;
            text-align: center;
            word-wrap: break-word;
            word-break: break-word
        }

        .swal2-checkbox,
        .swal2-file,
        .swal2-input,
        .swal2-radio,
        .swal2-select,
        .swal2-textarea {
            margin: 1em 2em 0
        }

        .swal2-file,
        .swal2-input,
        .swal2-textarea {
            box-sizing: border-box;
            width: auto;
            transition: border-color .1s, box-shadow .1s;
            border: 1px solid #d9d9d9;
            border-radius: .1875em;
            background: inherit;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .06), 0 0 0 3px transparent;
            color: inherit;
            font-size: 1.125em
        }

        .swal2-file.swal2-inputerror,
        .swal2-input.swal2-inputerror,
        .swal2-textarea.swal2-inputerror {
            border-color: #f27474 !important;
            box-shadow: 0 0 2px #f27474 !important
        }

        .swal2-file:focus,
        .swal2-input:focus,
        .swal2-textarea:focus {
            border: 1px solid #b4dbed;
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .06), 0 0 0 3px rgba(100, 150, 200, .5)
        }

        .swal2-file::-moz-placeholder,
        .swal2-input::-moz-placeholder,
        .swal2-textarea::-moz-placeholder {
            color: #ccc
        }

        .swal2-file:-ms-input-placeholder,
        .swal2-input:-ms-input-placeholder,
        .swal2-textarea:-ms-input-placeholder {
            color: #ccc
        }

        .swal2-file::placeholder,
        .swal2-input::placeholder,
        .swal2-textarea::placeholder {
            color: #ccc
        }

        .swal2-range {
            margin: 1em 2em 0;
            background: #fff
        }

        .swal2-range input {
            width: 80%
        }

        .swal2-range output {
            width: 20%;
            color: inherit;
            font-weight: 600;
            text-align: center
        }

        .swal2-range input,
        .swal2-range output {
            height: 2.625em;
            padding: 0;
            font-size: 1.125em;
            line-height: 2.625em
        }

        .swal2-input {
            height: 2.625em;
            padding: 0 .75em
        }

        .swal2-file {
            width: 75%;
            margin-right: auto;
            margin-left: auto;
            background: inherit;
            font-size: 1.125em
        }

        .swal2-textarea {
            height: 6.75em;
            padding: .75em
        }

        .swal2-select {
            min-width: 50%;
            max-width: 100%;
            padding: .375em .625em;
            background: inherit;
            color: inherit;
            font-size: 1.125em
        }

        .swal2-checkbox,
        .swal2-radio {
            align-items: center;
            justify-content: center;
            background: #fff;
            color: inherit
        }

        .swal2-checkbox label,
        .swal2-radio label {
            margin: 0 .6em;
            font-size: 1.125em
        }

        .swal2-checkbox input,
        .swal2-radio input {
            flex-shrink: 0;
            margin: 0 .4em
        }

        .swal2-input-label {
            display: flex;
            justify-content: center;
            margin: 1em auto 0
        }

        .swal2-validation-message {
            align-items: center;
            justify-content: center;
            margin: 1em 0 0;
            padding: .625em;
            overflow: hidden;
            background: #f0f0f0;
            color: #666;
            font-size: 1em;
            font-weight: 300
        }

        .swal2-validation-message::before {
            content: "!";
            display: inline-block;
            width: 1.5em;
            min-width: 1.5em;
            height: 1.5em;
            margin: 0 .625em;
            border-radius: 50%;
            background-color: #f27474;
            color: #fff;
            font-weight: 600;
            line-height: 1.5em;
            text-align: center
        }

        .swal2-icon {
            position: relative;
            box-sizing: content-box;
            justify-content: center;
            width: 5em;
            height: 5em;
            margin: 2.5em auto .6em;
            border: .25em solid transparent;
            border-radius: 50%;
            border-color: #000;
            font-family: inherit;
            line-height: 5em;
            cursor: default;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        .swal2-icon .swal2-icon-content {
            display: flex;
            align-items: center;
            font-size: 3.75em
        }

        .swal2-icon.swal2-error {
            border-color: #f27474;
            color: #f27474
        }

        .swal2-icon.swal2-error .swal2-x-mark {
            position: relative;
            flex-grow: 1
        }

        .swal2-icon.swal2-error [class^=swal2-x-mark-line] {
            display: block;
            position: absolute;
            top: 2.3125em;
            width: 2.9375em;
            height: .3125em;
            border-radius: .125em;
            background-color: #f27474
        }

        .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left] {
            left: 1.0625em;
            transform: rotate(45deg)
        }

        .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right] {
            right: 1em;
            transform: rotate(-45deg)
        }

        .swal2-icon.swal2-error.swal2-icon-show {
            -webkit-animation: swal2-animate-error-icon .5s;
            animation: swal2-animate-error-icon .5s
        }

        .swal2-icon.swal2-error.swal2-icon-show .swal2-x-mark {
            -webkit-animation: swal2-animate-error-x-mark .5s;
            animation: swal2-animate-error-x-mark .5s
        }

        .swal2-icon.swal2-warning {
            border-color: #facea8;
            color: #f8bb86
        }

        .swal2-icon.swal2-info {
            border-color: #9de0f6;
            color: #3fc3ee
        }

        .swal2-icon.swal2-question {
            border-color: #c9dae1;
            color: #87adbd
        }

        .swal2-icon.swal2-success {
            border-color: #a5dc86;
            color: #a5dc86
        }

        .swal2-icon.swal2-success [class^=swal2-success-circular-line] {
            position: absolute;
            width: 3.75em;
            height: 7.5em;
            transform: rotate(45deg);
            border-radius: 50%
        }

        .swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left] {
            top: -.4375em;
            left: -2.0635em;
            transform: rotate(-45deg);
            transform-origin: 3.75em 3.75em;
            border-radius: 7.5em 0 0 7.5em
        }

        .swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right] {
            top: -.6875em;
            left: 1.875em;
            transform: rotate(-45deg);
            transform-origin: 0 3.75em;
            border-radius: 0 7.5em 7.5em 0
        }

        .swal2-icon.swal2-success .swal2-success-ring {
            position: absolute;
            z-index: 2;
            top: -.25em;
            left: -.25em;
            box-sizing: content-box;
            width: 100%;
            height: 100%;
            border: .25em solid rgba(165, 220, 134, .3);
            border-radius: 50%
        }

        .swal2-icon.swal2-success .swal2-success-fix {
            position: absolute;
            z-index: 1;
            top: .5em;
            left: 1.625em;
            width: .4375em;
            height: 5.625em;
            transform: rotate(-45deg)
        }

        .swal2-icon.swal2-success [class^=swal2-success-line] {
            display: block;
            position: absolute;
            z-index: 2;
            height: .3125em;
            border-radius: .125em;
            background-color: #a5dc86
        }

        .swal2-icon.swal2-success [class^=swal2-success-line][class$=tip] {
            top: 2.875em;
            left: .8125em;
            width: 1.5625em;
            transform: rotate(45deg)
        }

        .swal2-icon.swal2-success [class^=swal2-success-line][class$=long] {
            top: 2.375em;
            right: .5em;
            width: 2.9375em;
            transform: rotate(-45deg)
        }

        .swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-tip {
            -webkit-animation: swal2-animate-success-line-tip .75s;
            animation: swal2-animate-success-line-tip .75s
        }

        .swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-long {
            -webkit-animation: swal2-animate-success-line-long .75s;
            animation: swal2-animate-success-line-long .75s
        }

        .swal2-icon.swal2-success.swal2-icon-show .swal2-success-circular-line-right {
            -webkit-animation: swal2-rotate-success-circular-line 4.25s ease-in;
            animation: swal2-rotate-success-circular-line 4.25s ease-in
        }

        .swal2-progress-steps {
            flex-wrap: wrap;
            align-items: center;
            max-width: 100%;
            margin: 1.25em auto;
            padding: 0;
            background: inherit;
            font-weight: 600
        }

        .swal2-progress-steps li {
            display: inline-block;
            position: relative
        }

        .swal2-progress-steps .swal2-progress-step {
            z-index: 20;
            flex-shrink: 0;
            width: 2em;
            height: 2em;
            border-radius: 2em;
            background: #2778c4;
            color: #fff;
            line-height: 2em;
            text-align: center
        }

        .swal2-progress-steps .swal2-progress-step.swal2-active-progress-step {
            background: #2778c4
        }

        .swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step {
            background: #add8e6;
            color: #fff
        }

        .swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line {
            background: #add8e6
        }

        .swal2-progress-steps .swal2-progress-step-line {
            z-index: 10;
            flex-shrink: 0;
            width: 2.5em;
            height: .4em;
            margin: 0 -1px;
            background: #2778c4
        }

        [class^=swal2] {
            -webkit-tap-highlight-color: transparent
        }

        .swal2-show {
            -webkit-animation: swal2-show .3s;
            animation: swal2-show .3s
        }

        .swal2-hide {
            -webkit-animation: swal2-hide .15s forwards;
            animation: swal2-hide .15s forwards
        }

        .swal2-noanimation {
            transition: none
        }

        .swal2-scrollbar-measure {
            position: absolute;
            top: -9999px;
            width: 50px;
            height: 50px;
            overflow: scroll
        }

        .swal2-rtl .swal2-close {
            margin-right: initial;
            margin-left: 0
        }

        .swal2-rtl .swal2-timer-progress-bar {
            right: 0;
            left: auto
        }

        @-webkit-keyframes swal2-toast-show {
            0% {
                transform: translateY(-.625em) rotateZ(2deg)
            }

            33% {
                transform: translateY(0) rotateZ(-2deg)
            }

            66% {
                transform: translateY(.3125em) rotateZ(2deg)
            }

            100% {
                transform: translateY(0) rotateZ(0)
            }
        }

        @keyframes swal2-toast-show {
            0% {
                transform: translateY(-.625em) rotateZ(2deg)
            }

            33% {
                transform: translateY(0) rotateZ(-2deg)
            }

            66% {
                transform: translateY(.3125em) rotateZ(2deg)
            }

            100% {
                transform: translateY(0) rotateZ(0)
            }
        }

        @-webkit-keyframes swal2-toast-hide {
            100% {
                transform: rotateZ(1deg);
                opacity: 0
            }
        }

        @keyframes swal2-toast-hide {
            100% {
                transform: rotateZ(1deg);
                opacity: 0
            }
        }

        @-webkit-keyframes swal2-toast-animate-success-line-tip {
            0% {
                top: .5625em;
                left: .0625em;
                width: 0
            }

            54% {
                top: .125em;
                left: .125em;
                width: 0
            }

            70% {
                top: .625em;
                left: -.25em;
                width: 1.625em
            }

            84% {
                top: 1.0625em;
                left: .75em;
                width: .5em
            }

            100% {
                top: 1.125em;
                left: .1875em;
                width: .75em
            }
        }

        @keyframes swal2-toast-animate-success-line-tip {
            0% {
                top: .5625em;
                left: .0625em;
                width: 0
            }

            54% {
                top: .125em;
                left: .125em;
                width: 0
            }

            70% {
                top: .625em;
                left: -.25em;
                width: 1.625em
            }

            84% {
                top: 1.0625em;
                left: .75em;
                width: .5em
            }

            100% {
                top: 1.125em;
                left: .1875em;
                width: .75em
            }
        }

        @-webkit-keyframes swal2-toast-animate-success-line-long {
            0% {
                top: 1.625em;
                right: 1.375em;
                width: 0
            }

            65% {
                top: 1.25em;
                right: .9375em;
                width: 0
            }

            84% {
                top: .9375em;
                right: 0;
                width: 1.125em
            }

            100% {
                top: .9375em;
                right: .1875em;
                width: 1.375em
            }
        }

        @keyframes swal2-toast-animate-success-line-long {
            0% {
                top: 1.625em;
                right: 1.375em;
                width: 0
            }

            65% {
                top: 1.25em;
                right: .9375em;
                width: 0
            }

            84% {
                top: .9375em;
                right: 0;
                width: 1.125em
            }

            100% {
                top: .9375em;
                right: .1875em;
                width: 1.375em
            }
        }

        @-webkit-keyframes swal2-show {
            0% {
                transform: scale(.7)
            }

            45% {
                transform: scale(1.05)
            }

            80% {
                transform: scale(.95)
            }

            100% {
                transform: scale(1)
            }
        }

        @keyframes swal2-show {
            0% {
                transform: scale(.7)
            }

            45% {
                transform: scale(1.05)
            }

            80% {
                transform: scale(.95)
            }

            100% {
                transform: scale(1)
            }
        }

        @-webkit-keyframes swal2-hide {
            0% {
                transform: scale(1);
                opacity: 1
            }

            100% {
                transform: scale(.5);
                opacity: 0
            }
        }

        @keyframes swal2-hide {
            0% {
                transform: scale(1);
                opacity: 1
            }

            100% {
                transform: scale(.5);
                opacity: 0
            }
        }

        @-webkit-keyframes swal2-animate-success-line-tip {
            0% {
                top: 1.1875em;
                left: .0625em;
                width: 0
            }

            54% {
                top: 1.0625em;
                left: .125em;
                width: 0
            }

            70% {
                top: 2.1875em;
                left: -.375em;
                width: 3.125em
            }

            84% {
                top: 3em;
                left: 1.3125em;
                width: 1.0625em
            }

            100% {
                top: 2.8125em;
                left: .8125em;
                width: 1.5625em
            }
        }

        @keyframes swal2-animate-success-line-tip {
            0% {
                top: 1.1875em;
                left: .0625em;
                width: 0
            }

            54% {
                top: 1.0625em;
                left: .125em;
                width: 0
            }

            70% {
                top: 2.1875em;
                left: -.375em;
                width: 3.125em
            }

            84% {
                top: 3em;
                left: 1.3125em;
                width: 1.0625em
            }

            100% {
                top: 2.8125em;
                left: .8125em;
                width: 1.5625em
            }
        }

        @-webkit-keyframes swal2-animate-success-line-long {
            0% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }

            65% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }

            84% {
                top: 2.1875em;
                right: 0;
                width: 3.4375em
            }

            100% {
                top: 2.375em;
                right: .5em;
                width: 2.9375em
            }
        }

        @keyframes swal2-animate-success-line-long {
            0% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }

            65% {
                top: 3.375em;
                right: 2.875em;
                width: 0
            }

            84% {
                top: 2.1875em;
                right: 0;
                width: 3.4375em
            }

            100% {
                top: 2.375em;
                right: .5em;
                width: 2.9375em
            }
        }

        @-webkit-keyframes swal2-rotate-success-circular-line {
            0% {
                transform: rotate(-45deg)
            }

            5% {
                transform: rotate(-45deg)
            }

            12% {
                transform: rotate(-405deg)
            }

            100% {
                transform: rotate(-405deg)
            }
        }

        @keyframes swal2-rotate-success-circular-line {
            0% {
                transform: rotate(-45deg)
            }

            5% {
                transform: rotate(-45deg)
            }

            12% {
                transform: rotate(-405deg)
            }

            100% {
                transform: rotate(-405deg)
            }
        }

        @-webkit-keyframes swal2-animate-error-x-mark {
            0% {
                margin-top: 1.625em;
                transform: scale(.4);
                opacity: 0
            }

            50% {
                margin-top: 1.625em;
                transform: scale(.4);
                opacity: 0
            }

            80% {
                margin-top: -.375em;
                transform: scale(1.15)
            }

            100% {
                margin-top: 0;
                transform: scale(1);
                opacity: 1
            }
        }

        @keyframes swal2-animate-error-x-mark {
            0% {
                margin-top: 1.625em;
                transform: scale(.4);
                opacity: 0
            }

            50% {
                margin-top: 1.625em;
                transform: scale(.4);
                opacity: 0
            }

            80% {
                margin-top: -.375em;
                transform: scale(1.15)
            }

            100% {
                margin-top: 0;
                transform: scale(1);
                opacity: 1
            }
        }

        @-webkit-keyframes swal2-animate-error-icon {
            0% {
                transform: rotateX(100deg);
                opacity: 0
            }

            100% {
                transform: rotateX(0);
                opacity: 1
            }
        }

        @keyframes swal2-animate-error-icon {
            0% {
                transform: rotateX(100deg);
                opacity: 0
            }

            100% {
                transform: rotateX(0);
                opacity: 1
            }
        }

        @-webkit-keyframes swal2-rotate-loading {
            0% {
                transform: rotate(0)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        @keyframes swal2-rotate-loading {
            0% {
                transform: rotate(0)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) {
            overflow: hidden
        }

        body.swal2-height-auto {
            height: auto !important
        }

        body.swal2-no-backdrop .swal2-container {
            background-color: transparent !important;
            pointer-events: none
        }

        body.swal2-no-backdrop .swal2-container .swal2-popup {
            pointer-events: all
        }

        body.swal2-no-backdrop .swal2-container .swal2-modal {
            box-shadow: 0 0 10px rgba(0, 0, 0, .4)
        }

        @media print {
            body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) {
                overflow-y: scroll !important
            }

            body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown)>[aria-hidden=true] {
                display: none
            }

            body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container {
                position: static !important
            }
        }

        body.swal2-toast-shown .swal2-container {
            box-sizing: border-box;
            width: 360px;
            max-width: 100%;
            background-color: transparent;
            pointer-events: none
        }

        body.swal2-toast-shown .swal2-container.swal2-top {
            top: 0;
            right: auto;
            bottom: auto;
            left: 50%;
            transform: translateX(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-top-end,
        body.swal2-toast-shown .swal2-container.swal2-top-right {
            top: 0;
            right: 0;
            bottom: auto;
            left: auto
        }

        body.swal2-toast-shown .swal2-container.swal2-top-left,
        body.swal2-toast-shown .swal2-container.swal2-top-start {
            top: 0;
            right: auto;
            bottom: auto;
            left: 0
        }

        body.swal2-toast-shown .swal2-container.swal2-center-left,
        body.swal2-toast-shown .swal2-container.swal2-center-start {
            top: 50%;
            right: auto;
            bottom: auto;
            left: 0;
            transform: translateY(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-center {
            top: 50%;
            right: auto;
            bottom: auto;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-center-end,
        body.swal2-toast-shown .swal2-container.swal2-center-right {
            top: 50%;
            right: 0;
            bottom: auto;
            left: auto;
            transform: translateY(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-bottom-left,
        body.swal2-toast-shown .swal2-container.swal2-bottom-start {
            top: auto;
            right: auto;
            bottom: 0;
            left: 0
        }

        body.swal2-toast-shown .swal2-container.swal2-bottom {
            top: auto;
            right: auto;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%)
        }

        body.swal2-toast-shown .swal2-container.swal2-bottom-end,
        body.swal2-toast-shown .swal2-container.swal2-bottom-right {
            top: auto;
            right: 0;
            bottom: 0;
            left: auto
        }
    </style>
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('backEnd/') }}/dist/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/style.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('frontEnd/') }}/css/responsive.css">
</head>

<body class="skin  pace-done">

<header>
    @php
        $news = DB::table('news')->where('id',1)->first();
    @endphp
	<div style="background: #fff">	<marquee style="vertical-align: middle;padding: 7px;color: rgb(0, 0, 0); " behavior="scroll" direction="left">
		<span style="vertical-align: middle;padding: 10px;background: #07A4B4;
	color: #fff;">{{__('Notice')}}:</span> {{ $news->text }}</marquee></div>
		</div>
		
	

			<nav class="navbar  navbar-light  navbar-expand-md" role="navigation" style="background: #07A4B4">
		
				<div class="container-fluid">
		
					<div class="navbar-identity p-sm-0">
		
                        <style>.logo img {
    width: 80px;
    height: 75px;
}
                            .main-logo {
    width: 80px;
    height: 75px;
    max-width: 430px !important;
    max-height: 500px !important;
}

                        </style>
		
						<a href="{{ url('/') }}" class="navbar-brand logo logo-title">
                            @foreach($wlogo as $value)
							<img src="{{ asset($value->image) }}"
								alt="" class="main-logo" data-bs-placement="bottom"
								data-bs-toggle="tooltip" >
                                @endforeach
						</a>
		
						<button class="navbar-toggler -toggler float-end" type="button" data-bs-toggle="collapse"
							data-bs-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false"
							aria-label="Toggle navigation">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30"
								height="30" focusable="false">
								<title>Menu</title>
								<path stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"></path>
							</svg>
						</button>
		
		
					</div>
		
					<div class="navbar-collapse collapse" id="navbarsDefault">
		
		
						<ul class="nav navbar-nav me-md-auto navbar-left">
		
							<li class="nav-item d-lg-block d-md-none d-sm-block d-block">
								<a href="{{ url(app()->getLocale().'/all-ads') }}" class="nav-link">
									<i style="margin-right:5px" class="fas fa-th-list"></i> {{__('All Ads')}}
								</a>
							</li>
							<li class="nav-item dropdown lang-menu ">
                                @if(app()->getLocale() == 'bn')
                                <a style="border: 1px solid #3cbcc9;
                                padding: 13px 14px;
                                border-radius: 6px;" href="{{ url()->current() }}?change_language=en" class="nav-link"
                                    >
                                    <span>English</span>
                                </a>
                                @elseif(app()->getLocale() == 'en')
                                <a style="border: 1px solid #3cbcc9;
                                padding: 13px 14px;
                                border-radius: 6px;" href="{{ url()->current() }}?change_language=bn" class="nav-link"
                                    >
                                    <span>বাংলা</span>
                                </a>
                                @endif
                            </li>
							<!--
		
						  <li class="flag-menu country-flag d-md-block d-sm-none d-none nav-item"
                                data-bs-toggle="tooltip"
                                data-bs-placement="right"
                                >
                                        <a class="p-0" style="cursor: default;">
                                <img class="flag-icon"
                                    src="http://kroyandbikroy.com/images/flags/32/bd.png"
                                    alt="Bangladesh"
                                >
                                </a>
                                        </li>
                                            -->
						</ul>
		                   <style>
							a.nav-link {
								color: #fff !important;
							}
						   </style>
						<ul class="nav navbar-nav ms-auto navbar-right">
							<li class="nav-item pricing">
								<a href="{{ url(app()->getLocale().'/pricing') }}" class="nav-link">
									<i style="margin-right:5px" class="fas fa-tags"></i> {{__('Packages')}}
								</a>
							</li>
							<li class="nav-item pricing">
								<a href="{{ url('/customer/1/nilam') }}" class="nav-link">
									<i style="margin-right:5px" class="fas fa-ad"
										aria-hidden="true"></i>{{__('Nilam')}}
								</a>
							</li>
							<li class="nav-item pricing">
								<a href="#" class="nav-link">
									<i style="margin-right:5px" class="fab fa-facebook-messenger"
										aria-hidden="true"></i>{{__('Message')}}
								</a>
							</li>
                            @php
                                $customerId = Session::get('customerId');
                                $customerInfo = App\Customer::where(['id' => $customerId])->first();
                            @endphp
                            @if ($customerId == null)
							<li class="nav-item dropdown no-arrow open-on-hover d-md-block d-sm-none d-none">
								<a href="#" class="dropdown-toggle nav-link"
									data-bs-toggle="dropdown">
									<i style="margin-right:5px" class="fas fa-user"></i>
									<span>{{__('Login/Signup')}}</span>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
									  </svg>
								</a>
								<ul id="authDropdownMenu" class="dropdown-menu user-menu shadow-sm">
									<li class="dropdown-item">
										<a href="{{ url('/customer/login') }}" class="nav-link"><i class="fas fa-user"></i> {{__('Log In')}}</a>
									</li>
									<li class="dropdown-item">
										<a href="{{ url('/customer/register') }}" class="nav-link"><i
												class="far fa-user"></i> {{__('Sign Up')}}</a>
									</li>
								</ul>
							</li>
                            @else
                            <li class="nav-item dropdown no-arrow open-on-hover d-md-block d-sm-none d-none">
								<a href="#" class="dropdown-toggle nav-link"
									data-bs-toggle="dropdown">
									<i class="fas fa-user"></i>
									<span>{{__('My Account')}}</span>
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
									  </svg>
								</a>
								<ul id="authDropdownMenu" class="dropdown-menu user-menu shadow-sm">
									<li class="dropdown-item">
										<a href="{{ url('customer/0/control-panel/dashboard') }}" class="nav-link"><i class="fas fa-user"></i> {{__('Manage Account')}}</a>
									</li>
									<li class="dropdown-item">
										<a href="{{ url('customer/logout') }}" class="nav-link"><i
												class="far fa-user"></i> {{__('Logout')}}</a>
									</li>
								</ul>
							</li>
                            @endif
							<li class="nav-item d-md-none d-sm-block d-block">
								<a href="{{ url('/customer/login') }}" class="nav-link"
									data-bs-toggle="modal"><i class="fas fa-user"></i> {{__('Log In')}}</a>
							</li>
							<li class="nav-item d-md-none d-sm-block d-block">
								<a href="{{ url('/customer/register') }}" class="nav-link"><i
										class="far fa-user"></i> {{__('Sign Up')}}</a>
							</li>
		
		
		
		
							<li class="nav-item postadd" style=" border-left: solid 1px rgba(255, 0, 0, 0)">
								<a style="background: #EA4335;" class="btn btn-block btn-border btn-listing"
									href="{{ url('/customer/0/control-panel/post-new-ads') }}">
									<i class="far fa-edit"></i> {{__('POST YOUR AD')}}
								</a>
							</li>
		
		
		
						</ul>
					</div>
		
		
				</div>
			</nav>
		
</header>


@yield('content')
<footer class="main-footer">
    <div class="footer-content">
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2 g-3">

                <div class="col">
                    <div class="footer-col">
                        <h4 class="footer-title">{{__('About us')}}</h4>
                        <ul class="list-unstyled footer-nav">
                            @foreach($aboutcompanies as $value)
                            <li>
                                <a href="{{ url(app()->getLocale().'/pages/'.$value->slug) }}"> {{$value->{app()->getLocale().'_pagename'} }} </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- <div class="col">
                    <div class="footer-col">
                        <h4 class="footer-title">{{__('Contact Sitemap')}}</h4>
                        <ul class="list-unstyled footer-nav">
                            <li><a href="{{ url(app()->getLocale().'/contact-us')}}"> {{__('Contact Us')}} </a></li>
                            <li><a href="http://kroyandbikroy.com/sitemap"> {{__('Sitemap ')}}</a></li>
                        </ul>
                    </div>
                </div> --}}

                <div class="col">
                    <div class="footer-col">
                        <h4 class="footer-title">{{__('My Account')}}</h4>
                        <ul class="list-unstyled footer-nav">
                            <li>
                                <a href="{{ url('/customer/login') }}">
                                    {{__('Log In')}} </a>
                            </li>
                            <li><a href="{{ url('/customer/register') }}"> {{__('Register')}} </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col">
                    <div class="footer-col row">

                        <div class="col-sm-12 col-12 p-lg-0">
                            <div class="">
                                <h4 class="footer-title ">{{__('Follow us on')}}</h4>
                                <ul
                                    class="list-unstyled list-inline mx-0 footer-nav social-list-footer social-list-color footer-nav-inline">
                                    <li class="solcial_icon">
                                        <a class="icon-color fb" data-bs-placement="top"
                                            data-bs-toggle="tooltip"
                                            href="http://facebook.com/kroyandbikroyltd" title=""
                                            data-bs-original-title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="solcial_icon">
                                        <a class="icon-color tw" data-bs-placement="top"
                                            data-bs-toggle="tooltip" href="https://twitter.com/sbkichu"
                                            title="" data-bs-original-title="Twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="solcial_icon">
                                        <a class="icon-color pin" data-bs-placement="top"
                                            data-bs-toggle="tooltip"
                                            href="https://www.instagram.com/sbkichultd/" title=""
                                            data-bs-original-title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="solcial_icon">
                                        <a class="icon-color lin" data-bs-placement="top"
                                            data-bs-toggle="tooltip"
                                            href="https://www.linkedin.com/in/sbkichu-ltd-a511a0242/"
                                            title="" data-bs-original-title="LinkedIn">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li class="solcial_icon">
                                        <a class="icon-color pin" data-bs-placement="top"
                                            data-bs-toggle="tooltip"
                                            href="https://www.pinterest.com/kroyandbikroy" title=""
                                            data-bs-original-title="Pinterest">
                                            <i class="fab fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="clear: both"></div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center payment-method-logo">

                        <img src="{{ asset('/') }}beksh.svg" width="100px" alt="PayPal" title="PayPal">
                    </div>

                    <div class="copy-info text-center mb-md-0 mb-3 mt-md-4 mt-3 pt-2">
                        © 2022 sbkisubd.com. All Rights Reserved.
                        Design and Developed by Quicktech-It
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>


<script>
    var siteUrl = 'http://kroyandbikroy.com';
    var languageCode = 'en';
    var isLogged = false;
    var isLoggedAdmin = false;
    var isAdminPanel = false;
    var demoMode = false;
    var demoMessage = 'This feature has been turned off in demo mode.';


    var cookieParams = {
        expires: 1440,
        path: "/",
        domain: "update.kroyandbikroy.com",
        secure: false,
        sameSite: "lax"
    };


    var langLayout = {
        'confirm': {
            'button': {
                'yes': "Yes",
                'no': "No",
                'ok': "OK",
                'cancel': "Cancel"
            },
            'message': {
                'question': "Are you sure you want to perform this action?",
                'success': "The operation has been performed successfully.",
                'error': "An error has occurred during the action performing.",
                'errorAbort': "An error has occurred during the action performing. The operation has not been performed.",
                'cancel': "Action cancelled. The operation has not been performed."
            }
        }
    };
</script>
<script>
    var countryCode = 'BD';
    var timerNewMessagesChecking = 60000;

    /* Complete langLayout translations */
    langLayout.hideMaxListItems = {
        'moreText': "View More",
        'lessText': "View Less"
    };
    langLayout.select2 = {
        errorLoading: function() {
            return "The results could not be loaded."
        },
        inputTooLong: function(e) {
            var t = e.input.length - e.maximum,
                n = 'Please delete ' + t + ' character';
            return t != 1 && (n += 's'), n
        },
        inputTooShort: function(e) {
            var t = e.minimum - e.input.length,
                n = 'Please enter ' + t + ' or more characters';
            return n
        },
        loadingMore: function() {
            return "Loading more results…"
        },
        maximumSelected: function(e) {
            var t = 'You can only select ' + e.maximum + ' item';
            return e.maximum != 1 && (t += 's'), t
        },
        noResults: function() {
            return "No results found"
        },
        searching: function() {
            return "Searching…"
        }
    };

    var fakeLocationsResults = "1";
    var stateOrRegionKeyword = "area:";
    var errorText = {
        errorFound: "Error found"
    };
</script>

<script>
    var maxSubCats = 6;
</script>

<script src="{{ asset('/') }}index-style/app.js.download"></script>
<script src="{{ asset('/') }}index-style/en.js.download"></script>
<script>
    $(document).ready(function() {

        let largeDataSelect2Params = {
            width: '100%',
            dropdownAutoWidth: 'true'
        };

        let select2Params = largeDataSelect2Params;
        select2Params.minimumResultsForSearch = Infinity;

        if (typeof langLayout !== 'undefined' && typeof langLayout.select2 !== 'undefined') {
            select2Params.language = langLayout.select2;
            largeDataSelect2Params.language = langLayout.select2;
        }

        $('.selecter').select2(select2Params);
        $('.large-data-selecter').select2(largeDataSelect2Params);


        $('.share').ShareLink({
            title: 'kroyandbikroy.com - Buy Sell Anything',
            text: 'kroyandbikroy.com - Buy Sell Anything',
            url: 'http://kroyandbikroy.com',
            width: 640,
            height: 480
        });


    });
</script>

<script>
    let counterUpEl = $('.counter');
    counterUpEl.counterUp({
        delay: 10,
        time: 2000
    });
    counterUpEl.addClass('animated fadeInDownBig');
    $('.iconbox-wrap-text').addClass('animated fadeIn');
</script>
<script>
    var rtlIsEnabled = false;
    if ($('html').attr('dir') === 'rtl') {
        rtlIsEnabled = true;
    }


    var carouselItems = 4;
    var carouselAutoplay = false;
    
    
    var carouselLang = {
        'navText': {
            'prev': "prev",
            'next': "next"
        }
    };


    var carouselObject = $('.featured-list-slider._mOx17M');
    var responsiveObject = {
        0: {
            items: 1,
            nav: true
        },
        576: {
            items: 2,
            nav: false
        },
        768: {
            items: 3,
            nav: false
        },
        992: {
            items: 4,
            nav: false,
            loop:true
        }
    };
    carouselObject.owlCarousel({
        rtl: rtlIsEnabled,
        nav: false,
        navText: [carouselLang.navText.prev, carouselLang.navText.next],
        loop: true,
        responsiveClass: true,
        responsive: responsiveObject,
        autoWidth: true,
        autoplay: true,
 
        autoplayHoverPause: true
    });
</script>
<script>
    var rtlIsEnabled = false;
    if ($('html').attr('dir') === 'rtl') {
        rtlIsEnabled = true;
    }


    var carouselItems = 0;
    var carouselAutoplay = true;
  
    var carouselLang = {
        'navText': {
            'prev': "prev",
            'next': "next"
        }
    };


    var carouselObject = $('.featured-list-slider._hepuBW');
    var responsiveObject = {
        0: {
            items: 1,
            nav: true
        },
        576: {
            items: 2,
            nav: false
        },
        768: {
            items: 3,
            nav: false
        },
        992: {
            items: 4,
            nav: false,
            loop: true
        }
    };
    carouselObject.owlCarousel({
        rtl: rtlIsEnabled,
        nav: false,
        navText: [carouselLang.navText.prev, carouselLang.navText.next],
        loop: true,
        responsiveClass: true,
        responsive: responsiveObject,
        autoWidth: true,
        autoplay: true,
 
        autoplayHoverPause: true
    });
</script>
 <script src="{{ asset('frontEnd/') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}index-style/jquery.min.js"></script>
<script src="{{ asset('/') }}index-style/owl.carousel.min.js"></script>
</body>
    <!-- all jquery script -->
    <script src="{{ asset('frontEnd/') }}/js/swiper-menu.js"></script>
    <!--swiper-menu   js-->
    <script src="{{ asset('frontEnd/') }}/js/jquery.ajax.js"></script>
    <!-- ajax js -->
    <script src="{{ asset('frontEnd/') }}/js/bootstrap.min.js"></script>
    <!-- boostrap css -->
    <script src="{{ asset('frontEnd/') }}/js/owl.carousel.min.js"></script>
    <!--carousel js-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <!--waypoints js-->
    <script src="{{ asset('frontEnd/') }}/js/jquery.counterup.min.js"></script>
    <!--counterup js-->
    <script src="{{ asset('frontEnd/') }}/js/jquery.scrollUp.js"></script>
    <!--scrollup  js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
    <!-- summernote js -->
    <script src="{{ asset('frontEnd/') }}/js/jquery.ntm.js"></script>
    <!-- jquery.ntm.js -->
    <script src="{{ asset('frontEnd/') }}/js/jquery.nice-select.min.js"></script>
    <!-- jquery.nice-select.min.js -->
    <script src="{{ asset('frontEnd/') }}/js/script.js"></script>
    <!-- custom script -->
    <script src="{{ asset('backEnd/') }}/dist/js/toastr.min.js"></script>
    <!-- Toastr -->
    {!! Toastr::message() !!}
  
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5edb90ac2b31b3f0"></script>

    <!-- all jquery script -->
    <script src="{{ asset('frontEnd/') }}/js/swiper-menu.js"></script>
    <!--swiper-menu   js-->
    <script src="{{ asset('frontEnd/') }}/js/jquery.ajax.js"></script>
    <!-- ajax js -->
    <script src="{{ asset('frontEnd/') }}/js/bootstrap.min.js"></script>
    <!-- boostrap css -->
    <script src="{{ asset('frontEnd/') }}/js/owl.carousel.min.js"></script>
    <!--carousel js-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <!--waypoints js-->
    <script src="{{ asset('frontEnd/') }}/js/jquery.counterup.min.js"></script>
    <!--counterup js-->
    <script src="{{ asset('frontEnd/') }}/js/jquery.scrollUp.js"></script>
    <!--scrollup  js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
    <!-- summernote js -->
    <script src="{{ asset('frontEnd/') }}/js/jquery.ntm.js"></script>
    <!-- jquery.ntm.js -->
    <script src="{{ asset('frontEnd/') }}/js/jquery.nice-select.min.js"></script>
    <!-- jquery.nice-select.min.js -->
    <script src="{{ asset('frontEnd/') }}/js/script.js"></script>
    <!-- custom script -->
    <script src="{{ asset('backEnd/') }}/dist/js/toastr.min.js"></script>
    <!-- Toastr -->
    {!! Toastr::message() !!}
    <script>
        $(document).ready(function() {
            $('.addDiv').click(function() {
                document.getElementById('location-ads').classList.add('new-height');
                document.getElementById('addDiv').style = "display:none";
                document.getElementById('removeDiv').style = "display:block";
            });
            $('.removeDiv').click(function() {
                document.getElementById('location-ads').classList.remove('new-height');
                document.getElementById('removeDiv').style = "display:none";
                document.getElementById('addDiv').style = "display:block";
            });
        });
    </script>
    <script type="text/javascript">
        $('#category').change(function() {
            // alert('data');
            var ajaxId = $(this).val();
            if (ajaxId) {
                // alert('in ajaxId');
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-category') }}?category_id=" + ajaxId,
                    success: function(res) {
                        if (res) {
                            $("#subcategory").empty();
                            $("#subcategory").append('<option>Select Subcategory</option>');
                            $.each(res, function(key, value) {
                                $("#subcategory").append('<option value="' + key + '">' +
                                    value + '</option>');
                            });

                        } else {
                            $("#subcategory").empty();
                            $("#subcategory").append('<option>Select Subcategory</option>');
                        }
                    }
                });
            } else {
                $("#subcategory").empty();
                $("#subcategory").append('<option>Select Subcategory</option>');
            }
        });
        //child catgeory
        $('#subcategory').change(function() {
            // alert('data');
            var ajaxId = $(this).val();
            if (ajaxId) {
                // alert('in ajaxId');
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-childcategory') }}?subcategory_id=" + ajaxId,
                    success: function(res) {
                        if (res) {
                            $("#childcategory").empty();
                            $("#childcategory").append('<option value="">Select childcategory</option>');
                            $.each(res, function(key, value) {
                                $("#childcategory").append('<option value="' + key + '">' +
                                    value + '</option>');
                            });

                        } else {
                            $("#childcategory").empty();
                            $("#childcategory").append('<option value="">Select Childcategory</option>');
                        }
                    }
                });
            } else {
                $("#childcategory").empty();
                $("#childcategory").append('<option value="">Select Childcategory</option>');
            }
        });
        // District Find
        $('#division').change(function() {
            // alert('data');
            var ajaxId = $(this).val();
            if (ajaxId) {
                // alert('in ajaxId');
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-district') }}?division_id=" + ajaxId,
                    success: function(res) {
                        if (res) {
                            $("#district").empty();
                            $("#district").append('<option>District</option>');
                            $.each(res, function(key, value) {
                                $("#district").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {
                            $("#district").empty();
                            $("#district").empty().append('<option>District</option>');;
                        }
                    }
                });
            } else {
                $("#district").empty();
                $("#district").append('<option>District</option>');;
            }
        });
        // Thana Find
        $('#district').change(function() {
            // alert('data');
            var ajaxId = $(this).val();
            if (ajaxId) {
                // alert('in ajaxId');
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-thana') }}?dist_id=" + ajaxId,
                    success: function(res) {
                        if (res) {
                            $("#thana").empty();
                            $("#thana").append('<option>Select</option>');
                            $.each(res, function(key, value) {
                                $("#thana").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {
                            $("#thana").empty();
                            $("#thana").empty().append('<option>Select</option>');;
                        }
                    }
                });
            } else {
                $("#thana").empty();
                $("#thana").append('<option>Select</option>');;
            }
        });
        // Union Find
        $('#thana').change(function() {
            // alert('data');
            var ajaxId = $(this).val();
            if (ajaxId) {
                // alert('in ajaxId');
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-union') }}?thana_id=" + ajaxId,
                    success: function(res) {
                        if (res) {
                            $("#union").empty();
                            $("#union").append('<option>Select</option>');
                            $.each(res, function(key, value) {
                                $("#union").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {
                            $("#union").empty();
                            $("#union").empty().append('<option>Select</option>');;
                        }
                    }
                });
            } else {
                $("#union").empty();
                $("#union").append('<option>Select</option>');;
            }
        });

        // village Find
        $('#union').change(function() {
            // alert('data');
            var ajaxId = $(this).val();
            if (ajaxId) {
                // alert('in ajaxId');
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-village') }}?union_id=" + ajaxId,
                    success: function(res) {
                        if (res) {
                            $("#village").empty();
                            $("#village").append('<option value="">Select</option>');
                            $.each(res, function(key, value) {
                                $("#village").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {
                            $("#village").empty();
                            $("#village").empty().append('<option value="">Select</option>');
                        }
                    }
                });
            } else {
                $("#village").empty();
                $("#village").append('<option value="">Select</option>');
            }
        });
        // city
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });

        });
        //
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.demo').ntm();
        });
    </script>
    <script>
        $('.dslider').owlCarousel({
            items: 1,
            loop: true,
            dots: true,
            autoplay: true,
            nav: true,
            mouseDrag: true,
            touchDrag: false,
            autoplayHoverPause: false,
            margin: 0,
            smartSpeed: 1000,
            autoplayTimeout: 5000,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],

        });
        //   slider end
        $('.similerad').owlCarousel({
            items: 2,
            loop: true,
            dots: true,
            autoplay: true,
            nav: true,
            mouseDrag: true,
            touchDrag: false,
            autoplayHoverPause: false,
            margin: 20,
            smartSpeed: 1000,
            autoplayTimeout: 5000,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        });
        //   slider end
    </script>

    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("mobile-chat-phon").style.bottom = "0";
            } else {
                document.getElementById("mobile-chat-phon").style.bottom = "-50px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>



    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5edb90ac2b31b3f0"></script>
</body>

</html>

