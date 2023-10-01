<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-image: linear-gradient(to bottom,#7da0be, #ffffff);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <li class="nav-item">
            <img src="{{ asset('') }}resources/images/appimages/spin.png" height="40" width="40" id="spn" alt="" style="display: none">
        </li>

        <li class="nav-item">
            <a class="nav-link" data-slide="true" href="#" role="button">
                <i class="fa fa-user" aria-hidden="true"></i>
                {{ Auth::user()->name }}
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>

    </ul>
</nav>
