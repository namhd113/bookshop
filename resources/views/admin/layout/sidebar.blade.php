<aside class="main-sidebar sidebar-dark-gray-dark elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Books Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Handsome</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Tac gia
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li><a href="{{route('author.list')}}">Danh sách tác giả</a></li>
                        <li><a href="{{route('author.create')}}">Thêm tác giả</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Thể loại
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li><a href="{{route('category.list')}}">Danh sách thể loại</a></li>
                        <li><a href="{{route('category.create')}}">Thêm thể loại</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Sach
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li><a href="{{route('book.list')}}">Danh sách sach</a></li>
                        <li><a href="{{route('book.create')}}">Thêm sach</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li><a href="{{route('users.list')}}">Danh sách user</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Permission
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li><a href="{{route('permissions.list')}}">Danh sách permission</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Role
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li><a href="{{route('roles.list')}}">Danh sách role</a></li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
