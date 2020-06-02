<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-phone"></i>
                                    @foreach($listSetting as $phone)
                                    @if($phone -> config_key =='phone_number')
                                    {{$phone -> config_value}}
                                    @else
                                    @endif
                                    @endforeach
                                </a></li>
                            <li><a href=""><i class="fa fa-envelope"></i>
                                    @foreach($listSetting as $email)
                                    @if($email -> config_key =='email')
                                    {{$email -> config_value}}
                                    @else
                                    @endif
                                    @endforeach
                                </a></li>
                            <li><a href=""><i class="fa fa-home"></i>
                                    @foreach($listSetting as $address)
                                    @if($address -> config_key =='address')
                                    {{$address -> config_value}}
                                    @else
                                    @endif
                                    @endforeach
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            @foreach($listSetting as $item)
                            @if($item -> config_key == 'phone_number' || $item -> config_key == 'email' || $item ->
                            config_key == 'footer' || $item -> config_key == 'nameshop' || $item -> config_key == 'logo'
                            || $item -> config_key == 'google_map' || $item -> config_key == 'feeship' || $item ->
                            config_key == 'address')

                            @else
                            <li><a href="{{$item -> config_value}}"><i class="{{$item -> config_key}}"></i></a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{route('home')}}"><img src="{{$logo}}" alt="" class="image_logo" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            @if(Auth()->check())
                            <li><a href="{{route('customer.viewprofile')}}"><i class="fa fa-user"></i> Tài Khoản</a>
                            </li>
                            @else

                            @endif
                            <li><a href="{{route('getCheckout')}}"><i class="fa fa-crosshairs"></i> Đặt Hàng</a></li>
                            <li><a href="{{route('getCart')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
                            @if(Auth()->check())
                            <li><a href="{{route('customer.logout')}}" class="active"><i
                                        class="fa fa-lock-open-alt"></i> Đăng Xuất</a></li>
                            @else
                            <li><a href="{{route('customer.getLogin')}}" class="active"><i class="fa fa-lock"></i> Đăng
                                    Nhập | Đăng Ký</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            @foreach($listMenuHeaderChil as $item)
                            <?php
								$listMenuHeaderChil_chil =null;

								$listMenuHeaderChil_chil = DB::table('menus')
								-> where('parent_id','=',$item -> id)
								-> get();

								?>
                            @if(count($listMenuHeaderChil_chil) == 0)

                            <li><a href="{{$item -> url}}">{{$item -> name}}</a></li>
                            @else

                            <li class="dropdown"><a href="{{$item -> url}}">{{$item -> name}}<i
                                        class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($listMenuHeaderChil_chil as $subitem)

                                    <li><a href="{{$subitem -> url}}">{{$subitem -> name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="search_box pull-right">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{route('getSearch')}}">
                                    @csrf
                                    <input type="text" name="data_search" placeholder="Tìm kiếm sản phẩm"
                                        class="@error('data_search') is-invalid @enderror" />
                                    <button href="{{route('getSearch')}}" type="submit"
                                        class="btn btn-default get btn-search">Tìm</button>
                                    @error('data_search')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
