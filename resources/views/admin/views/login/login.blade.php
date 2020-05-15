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
    <link href="{{ asset('assets/client') }}/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('assets/client') }}/login.css" rel="stylesheet">
</head>

<body>
    <section id="login">
        <div class="card">
            <form class="form-signin" action="" method="post">
                @CSRF
                <h3 class="text-center mt-3 mb-5">Đăng nhập</h3>
                <div class="input-group">
                    <input type="email" name="Email" id="" class="form-control">
                    <span class="input-group-ava">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
                <br>
                <div class="input-group">
                    <input type="password" name="Pass" id="" class="form-control">
                    <span class="input-group-ava">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-block text-uppercase">Log in</button>
                <div class="alert alert-info mt-3 mb-0">
                    * Hệ thống sử dụng tốt nhất với
                    <a href="https://www.google.com/chrome">Google Chrome</a>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
