<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Shop</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(auth()->user()->avatar_path)
                <img src="{{auth()->user()->avatar_path}}" class="img-circle elevation-2" alt="User Image">
                @else
                <img src="{{asset('adminlte/dist/img/avatar04.png')}}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Trang Chủ
                        </p>
                    </a>
                </li>
                @if(in_array('product',$listPermissionOfParent))
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.viewproduct')}}" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Sản Phẩm
                        </p>
                    </a>
                </li>
                @endif
                @if(in_array('order',$listPermissionOfParent))
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.getorder')}}" class="nav-link">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Đơn Hàng
                        </p>
                    </a>
                </li>
                @endif
                @if(in_array('category',$listPermissionOfParent))
                <li class="nav-item">
                    <a href="{{route('admin.addcategory')}}" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh Mục Sản Phẩm
                        </p>
                    </a>
                </li>
                @endif
                @if(in_array('supplier',$listPermissionOfParent))
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.getsupplier')}}" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Nhà Cung Cấp
                        </p>
                    </a>
                </li>
                @endif
                @if(in_array('brand',$listPermissionOfParent))
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.addbrand')}}" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Thương Hiệu
                        </p>
                    </a>
                </li>
                @endif
                @if(in_array('menu',$listPermissionOfParent))
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.addmenu')}}" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>
                @endif
                @if(in_array('slider',$listPermissionOfParent))
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.viewslider')}}" class="nav-link">
                        <i class="nav-icon fas fa-bomb"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                @endif
                @if(in_array('setting',$listPermissionOfParent))
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.addsetting')}}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Cài Đặt
                        </p>
                    </a>
                </li>
                @endif
                @if(in_array('blog',$listPermissionOfParent))
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.getviewblog')}}" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Bài Viết
                        </p>
                    </a>
                </li>
                @endif
                @if(in_array('user',$listPermissionOfParent))
                <li class="nav-header">QUẢN LÝ TÀI KHOẢN</li>
                <li class="nav-item">
                    <a href="{{route('admin.adduser')}}" class="nav-link">
                        <i class="fas fa-user-plus nav-icon"></i>
                        <p>Thêm Mới</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.listuser')}}" class="nav-link">
                        <i class="fas fa-address-book nav-icon"></i>
                        <p>Danh Sách</p>
                    </a>
                </li>
                @endif
                @if(in_array('role',$listPermissionOfParent))
                <li class="nav-item">
                    <a href="{{route('admin.addrole')}}" class="nav-link">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p>Vai Trò</p>
                    </a>
                </li>
                @endif
                <li class="nav-header">CÁ NHÂN</li>
                <li class="nav-item">
                    <a href="{{route('admin.profile')}}" class="nav-link">
                        <i class="fas fa-user-circle nav-icon"></i>
                        <p>Thông Tin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.getchangepassword')}}" class="nav-link">
                        <i class="fas fa-key nav-icon"></i>
                        <p>Đổi Mật Khẩu</p>
                    </a>
                </li>
                <li class="nav-header">HOẠT ĐỘNG</li>
                <li class="nav-item">
                    <a href="{{route('admin.logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p class="text">Đăng Xuất</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
