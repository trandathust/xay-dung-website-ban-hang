<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Đăng nhập | Shop</title>
    <link href="{{asset('eshopper/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('eshopper/css/responsive.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('eshopper/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{asset('eshopper/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{asset('eshopper/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{asset('eshopper/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed"
        href="{{asset('eshopper/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->

<body>
    @include('customer.genaral.header')
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <h2>Đăng nhập tài khoản</h2>

                    <div class="login-form">
                        <!--login form-->
                        <form method="POST">
                            @csrf
                            <input class="@error('email_login') is-invalid @enderror" name="email_login" type="email"
                                placeholder="Nhập email" />
                            @error('email_login')
                            <div class="sub_error" style=" color: red;">{{ $message }}</div>
                            @enderror
                            <input class="@error('password_login') is-invalid @enderror" type="password"
                                placeholder="Nhập mật khẩu" name="password_login" />
                            @error('password_login')
                            <div class="sub_error" style=" color: red;">{{ $message }}</div>
                            @enderror
                            <span>
                                <input type="checkbox" class="checkbox" name="remmember">
                                Nhớ đăng nhập
                            </span>
                            @include('error.check_error')
                            <button type="submit" class="btn btn-default">Đăng Nhập</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">HOẶC</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Đăng ký tài khoản!</h2>
                        <form action="{{route('customer.postSingin')}}" method="POST">
                            @csrf
                            <input class="@error('name') is-invalid @enderror" name="name" type="text"
                                placeholder="Nhập tên" />
                            @error('name')
                            <div class="sub_error" style=" color: red;">{{ $message }}</div>
                            @enderror
                            <input class="@error('email') is-invalid @enderror" name="email" type="email"
                                placeholder="Nhập Email" />
                            @error('email')
                            <div class="sub_error" style=" color: red;">{{ $message }}</div>
                            @enderror
                            <input class="@error('password') is-invalid @enderror" name="password" type="password"
                                placeholder="Nhập mật khẩu" />
                            @error('password')
                            <div class="sub_error" style=" color: red;">{{ $message }}</div>
                            @enderror
                            <input class="@error('confirm_pasword') is-invalid @enderror" name="confirm_pasword"
                                type="password" placeholder="Xác nhận mật khẩu" />
                            @error('confirm_password')
                            <div class="sub_error" style=" color: red;">{{ $message }}</div>
                            @enderror
                            <input class="@error('phone_number') is-invalid @enderror" name="phone_number" type="text"
                                placeholder="Nhập số điện thoại" />
                            @error('phone_number')
                            <div class="sub_error" style=" color: red;">{{ $message }}</div>
                            @enderror
                            <input class="@error('address') is-invalid @enderror" name="address" type="text"
                                placeholder="Nhập địa chỉ" />
                            @error('address')
                            <div class="sub_error" style=" color: red;">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-default">Đăng Ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/form-->

    @include('customer.genaral.footer')


    <script src="{{asset('eshopper/js/jquery.js')}}"></script>
    <script src="{{asset('eshopper/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('eshopper/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('eshopper/js/price-range.js')}}"></script>
    <script src="{{asset('eshopper/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('eshopper/js/main.js')}}"></script>
</body>

</html>
