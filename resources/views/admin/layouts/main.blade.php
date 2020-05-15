<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <script src="https://kit.fontawesome.com/540cf737fa.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/admin') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/css/datatable.min.css" rel="stylesheet">
    <link href="{{ asset('assets/admin') }}/css/main.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('admin.partials.header')
        <div class="app-main">
            @include('admin.partials.menu')
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/datatable.min.js"></script>
    <script src="{{ asset('assets/admin') }}/js/chart.min.js"></script>  
    <script src="{{ asset('assets/admin') }}/js/script.js"></script>  
</body>

</html>
