<!doctype html>
<html lang="en">

<head>
    <title>Customer - @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .dropLink {
            display: block !important;
            padding: 0.5rem 4rem !important;
        }
    </style>
    @stack('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"> <img src="{{ asset('public/assets/images/icons/favicon.png') }}"
                width="30" height="30" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('customerDashboard')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart (<span class="text-danger">2</span>)</a>
                </li>


            </ul>
            <ul class="my-2 my-lg-0" style="list-style: none">
                <li class="nav-item dropdown">
                    <a class="nav-link dropLink dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->fname }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item" href="">Profile</a>
                        <div class="dropdown-divider"></div> --}}
                        <a class="dropdown-item" href="{{ route('userLogout') }}">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @yield('contant')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @stack('script')
</body>

</html>
