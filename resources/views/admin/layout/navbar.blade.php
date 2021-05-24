<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            @yield('search')
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            @if(\Illuminate\Support\Facades\Auth::user())
                <h5 class="nav-link" data-toggle="dropdown">
                    <i class="fas fa-user-tie"></i> {{\Illuminate\Support\Facades\Auth::user()->name ?? ''}}
                </h5>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Profile
                                </h3>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('admin.logout')}}" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                   Logout
                                </h3>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                </div>
            @endif
        </li>
    </ul>
</nav>
