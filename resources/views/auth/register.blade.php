<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/login/images/icons/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login/css/main.css') }}">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title p-b-26">
                        Create Account
                    </span>
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate="Full name is required">
                        <input class="input100" type="text" name="name" value="{{ old('name') }}">
                        <span class="focus-input100" data-placeholder="Full Name"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="email" value="{{ old('email') }}">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password confirmation is required">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password_confirmation">
                        <span class="focus-input100" data-placeholder="Confirm Password"></span>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Sign Up
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Already have an account?
                        </span>

                        <a class="txt2" href="{{ route('login') }}">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <script src="{{ asset('assets/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/login/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('assets/login/js/main.js') }}"></script>

</body>

</html>
