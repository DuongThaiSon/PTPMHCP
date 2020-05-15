<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Weather History</title>
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/client/fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/client/fonts/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Loading main css file -->
    <link rel="stylesheet" href="{{ asset('assets/client/style.css') }}">
    <script src="https://kit.fontawesome.com/540cf737fa.js" crossorigin="anonymous"></script>

</head>


<body>
    <div class="site-content">
        <div class="site-header">
            <div class="container">
                <a href="/" class="branding">
                    <img src="{{ asset('assets/client/images/logo.png') }}" alt="" class="logo">
                    <div class="logo-type">
                        <h1 class="site-title">Weather History</h1>
                        <small class="site-description">Software Technology</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @yield('content')

    <script src="{{ asset('assets/client/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/client/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="{{ asset('assets/client/script.js') }}"></script>
    @stack('scripts')
</body>

</html>
