<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="icon" href="{{ url('/resources/images/appimages/lo.png') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('/resources/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/resources/plugins/select2/css/select2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}

    <!-- toast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <style>
        .select2-selection {
            height: 40px !important;
            border-color: #ced4da !important;
        }
    </style>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>Registration</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="name" type="text" placeholder="Full Name"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="designation" type="text" placeholder="Designation"
                            class="form-control @error('designation') is-invalid @enderror" name="designation"
                            value="{{ old('designation') }}" required autocomplete="designation" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">

                        <div class="form-label-group in-border">
                            <label for="company_name">Company</label>
                            <select class="custom-select form-control select2" id="company_name" name="company_name">
                                <option selected value="">Choose...</option>
                                <option value="Air Galaxy Ltd Gsa Bangkok Airways">Air Galaxy Ltd Gsa Bangkok Airways
                                </option>
                                <option value="Air Galaxy Ltd Gsa Oman Air">Air Galaxy Ltd Gsa Oman Air</option>
                                <option value="Air Galaxy Ltd. Gsa Thai Airways">Air Galaxy Ltd. Gsa Thai Airways
                                </option>
                                <option value="Apg Bangladesh Ltd">Apg Bangladesh Ltd</option>
                                <option value="Galaxy Aviation Service Ltd">Galaxy Aviation Service Ltd</option>
                                <option value="Galaxy Express Limited">Galaxy Express Limited</option>
                                <option value="Galaxy Facilitation Service">Galaxy Facilitation Service</option>
                                <option value="Galaxy Facilitation Service (Manpower Service Staff)">Galaxy Facilitation
                                    Service (Manpower Service Staff)</option>
                                <option value="Galaxy Healthcare Services(Singhealth)">Galaxy Healthcare
                                    Services(Singhealth)</option>
                                <option value="Galaxy Heathcare Services(Nu Hospitals)">Galaxy Heathcare Services(Nu
                                    Hospitals)</option>
                                <option value="Galaxy Holidays">Galaxy Holidays</option>
                                <option value="Galaxy Hotels & Resorts Ltd.">Galaxy Hotels & Resorts Ltd.</option>
                                <option value="Galaxy Lines Ltd. (Anl)">Galaxy Lines Ltd. (Anl)</option>
                                <option value="Galaxy Lines Ltd. (Cclog)">Galaxy Lines Ltd. (Cclog)</option>
                                <option value="Galaxy Travel Internation Gsa Indian Railway">Galaxy Travel Internation
                                    Gsa Indian Railway</option>
                                <option value="Galaxy Travel International">Galaxy Travel International</option>
                                <option value="Galaxy World Logistics Ltd. ( Forwarding)">Galaxy World Logistics Ltd. (
                                    Forwarding)</option>
                                <option value="Gbx Logistics Ltd ( Oel)
                                ">Gbx Logistics
                                    Ltd ( Oel)
                                </option>
                                <option value="Gbx Logistics Ltd-Hl">Gbx Logistics Ltd-Hl</option>
                                <option value="Gbx Logistics Ltd. ( Blpl)">Gbx Logistics Ltd. ( Blpl)</option>
                                <option value="Gbx Logistics Ltd. ( Forwarding)">Gbx Logistics Ltd. ( Forwarding)
                                </option>
                                <option value="Jet Aviation Ltd">Jet Aviation Ltd</option>
                                <option value="Oryx Aviation Ltd Gsa Qatar Airways Cargo">Oryx Aviation Ltd Gsa Qatar
                                    Airways Cargo</option>
                                <option value="Skyjet Aviation Ltd. Gsa Spicejet">Skyjet Aviation Ltd. Gsa Spicejet
                                </option>
                                <option value="United Link Ltd (Raffles Hospitals)">United Link Ltd (Raffles Hospitals)
                                </option>
                                <option value="United Link Ltd (Yo)">United Link Ltd (Yo)</option>
                                <option value="United Link Ltd Gsa Saudia">United Link Ltd Gsa Saudia</option>
                                <option value="Bluesky Travel Limited">Bluesky Travel Limited</option>


                            </select>

                        </div>

                    </div>
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="Current Email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" placeholder="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password-confirm" placeholder="Retype Password" type="password"
                            class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <a href="{{ route('login') }}" class="text-center">Back To Login</a>
                        </div>

                        <div class="col-4">
                            <button type="submit" id="SubmitBtn" class="btn btn-primary btn-block">Register</button>
                        </div>

                    </div>
                </form>


            </div>

        </div>
    </div>


    <script src="{{ asset('/resources/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/resources/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/resources/js/myfunctions.js') }}"></script>
    <script src="{{ asset('/resources/plugins/select2/js/select2.full.min.js') }}"></script>
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
    </script>


    <script>
        @if (!empty($errors->all()))
            @foreach ($errors->all() as $eerror)
                message("{{ $eerror }}", '#FF0000', 'white', 'error');
            @endforeach
        @endif

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

</body>

</html>
