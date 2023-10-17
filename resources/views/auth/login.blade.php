<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" href="{{ url('/resources/images/appimages/lo.png') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('/resources/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/css/hover-min.css') }}">
    <!-- toast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="{{ asset('/resources/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/icomoon/style.css') }}">

    <style>
        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .form-control:focus {
            border-color: #34328F;
            box-shadow: none;
            -webkit-box-shadow: none;
        }

        .has-error .form-control:focus {
            box-shadow: none;
            -webkit-box-shadow: none;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }

        .con {
            display: block;
            position: relative;
            padding-left: 30px;
            padding-top: 12px;
            cursor: pointer;
            font-size: 13px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .con input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            margin-top: 8px;
            height: 25px;
            width: 25px;
            border: 2px solid #4dc6cb;
            border-radius: 15px;
        }

        /* On mouse-over, add a grey background color */
        .con:hover input~.checkmark {
            background-color: #cee3e4;
        }

        /* When the checkbox is checked, add a blue background */
        .con input:checked~.checkmark {
            background-color: #4dc6cb;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .con input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .con .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid #ffffff;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .img {
            -webkit-filter: drop-shadow(5px 5px 5px #222);
            filter: drop-shadow(5px 5px 5px #222);
        }

        .sh1 {
            display: inline-block;
            margin: 0;
            line-height: 1em;
            font-family: Robofan Free;
            src: url('{{ asset('/fonts/Robofan Free.otf') }}');
            font-weight: bold;
            font-size: 30px;
            background: linear-gradient(to right, #1c87c9 10%, #2CBC77 50%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="text-center mb-3">
                        <img src="{{ url('/resources/images/appimages/galaxylogo.svg') }}" alt="Image" height="80" width="120" class="img-fluid">
                    </div>
                    <div class="text-center">
                        <span class="sh1 mb-3">Task Management</span>
                    </div>
                    <img src="{{ url('/resources/images/appimages/undraw_remotely_2j6y.svg') }}" alt="Image"
                        class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <span class="sh1">LOGIN</span>
                                <p class="mb-4">Enter Your Login Details</p>
                            </div>

                            @php
                                if (isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass'])) {
                                    $login_email = $_COOKIE['login_email'];
                                    $login_pass = $_COOKIE['login_pass'];
                                    $is_remember = "checked='checked'";
                                } else {
                                    $login_email = '';
                                    $login_pass = '';
                                    $is_remember = '';
                                }
                            @endphp


                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group has-search">
                                    <span class="fa fa-user form-control-feedback"></span>
                                    <input id="email" type="email" placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ request()->input('email', old('email', $login_email)) }}"
                                        autocomplete="email" autofocus>
                                </div>

                                <div class="form-group has-search">
                                    <span class="fa fa-key form-control-feedback"></span>
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="{{ $login_pass }}" autocomplete="current-password">
                                </div>


                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember</span>
                                        <input type="checkbox" name="remember" id="remember" class="form-control"
                                            {{ $is_remember }}>
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="{{ route('password.request') }}"class="forgot-pass">Forgot Password</a></span>

                                    <span class="ml-auto"><a href="{{ route('register') }}" class="forgot-pass">Register</a></span>



                                </div>

                                <input type="submit" value="Log In" style="background: #34328F" class="btn btn-block btn-primary hvr-grow">

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('/resources/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/resources/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/resources/js/myfunctions.js') }}"></script>

    <script src="{{ asset('/resources/js/popper.min.js') }}"></script>
    <script src="{{ asset('/resources/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/resources/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script src="https://unpkg.com/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script>


</body>

</html>
