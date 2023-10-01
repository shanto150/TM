<aside class="main-sidebar sidebar-dark-success elevation-1">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        {{-- <img src="{{ asset('') }}resources/images/appimages/spin.png" alt="AdminLTE Logo" id="spn" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-center sh1">HOME</span> --}}
        <div style="margin-left: 70px;" class="sh1">
            HOME
        </div>
    </a>

    <!-- Sidebar -->
    {{-- <div class="sidebar"> --}}
    <div class="sidebar" style="background-image: linear-gradient(to bottom, #000428, #073863);">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fa fa-home" aria-hidden="true"></i>
                        <p>
                            Deshboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon fa fa-wrench"></i> --}}
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ array_search(Auth::user()->role, ['Manager', 'Admin'], true) == 1 ? route('index.verify') : '#' }}"
                                class="nav-link">
                                <i class="nav-icon far fa fa-plus-circle"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('parteis_index') }}" class="nav-link">
                        <i class="nav-icon fa fa-address-card"></i>
                        <p>
                            Party
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('feedback_index') }}" class="nav-link">
                        <i class="nav-icon fa fa-bullhorn"></i>
                        <p>
                            Market Feedback
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-text-width"></i>
                        <p>
                           Task
                        </p>
                    </a>
                </li>


                <li class="nav-item border-top border-secondary">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-in-alt"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
