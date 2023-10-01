<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Send Password</title>
    {{-- Browser Icon --}}
    <link rel="icon" href="{{ url('/resources/images/appimages/lo.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/resources/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('/resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/resources/css/adminlte.min.css') }}">

    <!-- toast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

</head>


<body class="hold-transition login-page" style="background-image: url({{asset('/resources/images/appimages/bg-cyan.jpg')}});background-repeat: no-repeat;background-size: 100% 100%;">

{{-- <body class="hold-transition login-page"> --}}
    <div class="login-box shadow-lg">
        <!-- /.login-logo -->
        <div class="text-center m-2">
            <img src="{{ URL::asset('/resources/images/appimages/lo.png') }}" alt="profile Pic" height="80" width="80">
        </div>
        <div class="card card-outline card-primary">

            <div class="card-header text-center">
                <a href="" class="h1"><b>Reset Password</b></a>
            </div>
            <div class="card-body">

                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" id="btSendLink" class="btn btn-primary btn-block">SEND MAIL</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('/resources/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/resources/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/resources/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/resources/js/myfunctions.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script src="https://unpkg.com/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script>

    <script>

        $('#btSendLink').click(function () {

            var vEmail= document.getElementById('email').value;
            if (vEmail=='') {
                $.toast({text: 'Email Field is Empty!',loader: false,allowToastClose : true,position: 'top-right',hideAfter: 2000,
                showHideTransition: 'slide',bgColor : '#FF0000',textColor: 'white',icon: 'error'});
                document.getElementById("email").focus();
                return false;
            }


            return true;

        });

    </script>

    <script>

        @if (session('status'))
        $.toast({text: "{{ session('status') }}" ,loader: false,allowToastClose : true,position: 'top-right',hideAfter: 2000,showHideTransition: 'slide',bgColor : 'green',textColor: 'white',icon: 'success'});
        @endif

    </script>



</body>

</html>
