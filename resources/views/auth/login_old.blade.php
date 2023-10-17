<!DOCTYPE html>
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

    <style>
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
<body class="hold-transition login-page">

    <div class="login-box">
        {{-- <img src="{{ url('/resources/images/appimages/mainlogo.png') }}" height="80" width="80" class="rounded mx-auto d-block" alt="..."> --}}
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <span class="sh1">LOGIN</span>
            </div>
            <div class="card-body">

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
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <input id="email" type="email" placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ request()->input('email', old('email', $login_email)) }}" autocomplete="email"
                            autofocus>

                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input id="password" type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            value="{{ $login_pass }}" autocomplete="current-password">

                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember" class="form-control"
                                    {{ $is_remember }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" id="SubmitBtn" class="btn btn-primary hvr-grow">Sign In</button>
                        </div>

                    </div>
                </form>

                <p class="mb-1">
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                </p>
            </div>

        </div>

    </div>


    <script src="{{ asset('/resources/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/resources/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/resources/js/myfunctions.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script src="https://unpkg.com/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script>

    <script>
        $('#SubmitBtn').click(function() {

            var vEmail = document.getElementById('email').value;
            if (vEmail == '') {
                message('Password Field is Empty!', '#FF0000', 'white', 'error');
                document.getElementById("email").focus();
                return false;
            }

            var vPass = document.getElementById('password').value;
            if (vPass == '') {
                message('Password Field is Empty!', '#FF0000', 'white', 'error');
                document.getElementById("password").focus();
                return false;
            }

            return true;

        });

        //logo animation
        $('#ln').tilt({
            scale: 1.2
        })

        //show any error
        @if (!empty($errors->all()))
            @foreach ($errors->all() as $eerror)
                message("{{ $eerror }}", '#FF0000', 'white', 'error');
            @endforeach
        @endif

        //show hide password
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("bi-eye");
        });
        const form = document.querySelector("form");
        form.addEventListener('submit', function(e) {
            e.preventDefault();
        });
    </script>

</body>

</html>
