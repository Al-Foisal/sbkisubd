<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }
    </style>
</head>

<body>
    <header>
        @php
            $news = DB::table('news')
                ->where('id', 1)
                ->first();
        @endphp
        <div style="background: #fff">
            <marquee style="vertical-align: middle;padding: 7px;color: rgb(0, 0, 0); " behavior="scroll" direction="left">
                <span
                    style="vertical-align: middle;padding: 10px;background: #07A4B4;
        color: #fff;">{{ __('Notice') }}:</span>
                {{ $news->text }}
            </marquee>
        </div>



        <nav class="navbar  navbar-light  navbar-expand-md" role="navigation" style="background: #07A4B4">

            <div class="container-fluid">

                <div class="navbar-identity p-sm-0">
                    <style>
                        .logo img {
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
                        @foreach ($wlogo as $value)
                            <img src="{{ asset($value->image) }}" alt="" class="main-logo"
                                data-bs-placement="bottom" data-bs-toggle="tooltip"
                                style="width: 80px;
                                    height: 75px;max-height:1000px;">
                        @endforeach
                    </a>




                </div>

                <div class="navbar-collapse collapse" id="navbarsDefault">

                    <h1 style="color: #fff">Find your location</h1>

                </div>


            </div>
        </nav>

    </header>

    <div class="container">
        <h2>Multi-Level Dropdowns</h2>
        <p>In this example, we have created a .dropdown-submenu class for multi-level dropdowns (see style section
            above).</p>
        <p>Note that we have added jQuery to open the multi-level dropdown on click (see script section below).</p>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="#">HTML</a></li>
                <li><a tabindex="-1" href="#">CSS</a></li>
                <li class="dropdown-submenu">
                    <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                        <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                        <li class="dropdown-submenu">
                            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">3rd level dropdown</a></li>
                                <li><a href="#">3rd level dropdown</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>

</body>

</html>
