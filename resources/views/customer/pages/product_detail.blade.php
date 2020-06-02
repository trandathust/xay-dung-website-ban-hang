@extends('customer.layout')
@section('title')
<title>Trang Chủ | Shop</title>
@endsection
@section('content')


<section>
    <div class="container">
        <div class="row">
            @include('customer.genaral.category')

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{$product -> feature_image_path}}" alt="" />
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">

                                <div class="item active">
                                    @foreach($list_image as $item)
                                    <a href=""><img src="{{$item -> image_path}}" alt=""
                                            class="image-product-84-85"></a>
                                    @endforeach
                                </div>

                                <div class="item">
                                    @foreach($productimage as $item )
                                    <a href=""><img src="{{$item -> image_path}}" alt=""
                                            class="image-product-84-85"></a>
                                    @endforeach
                                </div>

                            </div>
                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <form action="{{route('buyNow')}}" method="POST">
                            @csrf
                            <div class="product-information">
                                <!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2>{{$product -> name}}</h2>
                                <span>
                                    <span>
                                        @if($product -> price == $product -> price_sale || $product -> price_sale ==
                                        null || $timenow > $product -> end_sale)
                                        {{number_format($product -> price)}}
                                        @else
                                        <del>
                                            {{number_format($product -> price)}}
                                        </del>
                                        <br>
                                        {{number_format($product -> price_sale)}}
                                        @endif
                                    </span>
                                    <label>Số lượng:</label>
                                    <input type="number" name="quantity" id="quantity" min="0"
                                        max="{{$product -> quantity}}" value="1" />


                                </span>
                                <hr>
                                @if($product -> price == $product -> price_sale || $product -> price_sale == null ||
                                $timenow > $product -> end_sale)
                                @else
                                <div class="row">
                                    <p><b>THỜI GIAN KẾT THÚC KHUYẾN MẠI: <time
                                                style="font-size: 16px; color: #FE980F">{{$product -> end_sale}}</time></b>
                                    </p>
                                </div>
                                <hr>
                                @endif
                                <div class="row">
                                    <input type="hidden" name="id" id="id" value="{{$product -> id}}" />
                                    <button type="button" class="btn btn-fefault cart btn_add_to_cart"
                                        data-url="{{route('saveCart',['id'=> $product -> id])}}">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm Vào Giỏ
                                    </button>
                                    <button href="{{route('buyNow')}}" class="btn btn-default cart btn-buy-now"
                                        type="submit"><i class="fa fa-shopping-cart"></i> Mua Ngay</button>
                                </div>
                                <p><b>Trong Kho:</b> {{$product -> quantity}} sản phẩm</p>
                                <p><b>Thương Hiệu:</b> {{$product -> brand -> name}}</p>
                                <p><b>Tags:</b>
                                    @foreach($product -> tags as $item)
                                    <a href="{{route('getTag',['id'=>$item-> id])}}">{{$item -> name}},</a>
                                    @endforeach
                                </p>
                                <a href=""><img src="{{asset('eshopper/images/product-details/share.png')}}"
                                        class="share img-responsive" alt="" /></a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="category-tab shop-details-tab">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#reviews" data-toggle="tab">Giới Thiệu Sản Phẩm</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">
                                <?php echo ($product -> content)?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-tab shop-details-tab">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#reviews" data-toggle="tab">Đánh Giá Sản Phẩm</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">
                                @foreach($listComment as $comment)
                                <ul class="media-list">
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object image_avatar"
                                                src="{{optional($comment ->user) -> avatar_path }}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <ul>
                                                <li><a href=""><i
                                                            class="fa fa-user"></i>{{optional($comment -> user)-> name}}</a>
                                                </li>
                                                <li><a href=""><i
                                                            class="fa fa-clock-o"></i>{{$comment -> created_at ->format('H:i:s')}}</a>
                                                </li>
                                                <li><a href=""><i
                                                            class="fa fa-calendar-o"></i>{{$comment -> created_at ->format('Y.m.d')}}</a>
                                                </li>
                                            </ul>
                                            <p>{{$comment -> comment}}</p>
                                        </div>
                                    </li>
                                </ul>
                                @endforeach
                                <hr width="70%" align="center" />
                                <h4 align="center"><b>Viết đánh giá sản phẩm: </b></h4>
                                @if(auth()->check())
                                <form action="">
                                    @csrf
                                    <span>
                                        <label>Họ và Tên:</label>
                                        <label>{{auth()->user()->name}}</label>
                                    </span>
                                    <textarea name="comment" id="comment"></textarea>
                                    <input type="hidden" name="product_id" id="product_id" value="{{$product -> id}}">
                                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">

                                    <button type="button" class="btn btn-default pull-right submit_comment"
                                        data-url="{{route('postProductDetail',['id'=>$product -> id])}}">
                                        Đánh Giá
                                    </button>
                                </form>
                                @else
                                <p><b>Bạn hãy <a href="{{route('customer.getLogin')}}">đăng nhập</a> để viết đánh giá
                                        sản phẩm! </b></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="recommended_items">
                    <h2 class="title text-center">SẢN PHẨM TƯƠNG TỰ</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                @foreach($recomment_first as $item)
                                <form action="{{route('buyNow')}}" method="POST">
                                    @csrf
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <a href="{{route('getProductDetail',['id' => $item -> id])}}"><img
                                                            class="image-home" src="{{$item-> feature_image_path}}"
                                                            alt="" /></a>
                                                    <h2>{{number_format($item -> price)}}</h2>
                                                    <p>{{$item -> name}}</p>
                                                    <input type="hidden" name="id" id="id" value="{{$item -> id}}" />
                                                    <input type="hidden" name="quantity" id="quantity" value="1" />
                                                    <a data-url="{{route('saveCart',['id'=> $item -> id])}}"
                                                        class="btn btn-default add-to-cart btn_add_to_cart_detail"><i
                                                            class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</a>
                                                    <button type="submit" class="btn btn-default add-to-cart">Mua
                                                        Ngay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                            <div class="item">
                                @foreach($recomment_second as $item)
                                <form action="{{route('buyNow')}}" method="POST">
                                    @csrf
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{$item -> feature_image_path}}" alt=""
                                                        class="image-home" />
                                                    <h2>{{number_format($item -> price)}}</h2>
                                                    <p>{{$item -> name}}</p>
                                                    <input type="hidden" name="id" id="id" value="{{$item -> id}}" />
                                                    <input type="hidden" name="quantity" id="quantity" value="1" />
                                                    <a data-url="{{route('saveCart',['id'=> $item -> id])}}"
                                                        class="btn btn-default add-to-cart btn_add_to_cart_detail"><i
                                                            class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</a>
                                                    <button type="submit" class="btn btn-default add-to-cart">Mua
                                                        Ngay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection



@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/customer/product-detail/product-detail.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/customer/home/home.css')}}">
@endsection


@section('js')

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="{{asset('vendor/customer/cart/cart.js')}}"></script>

<script type="text/javascript" src="{{asset('vendor/customer/product-detail/product-detail.js')}}"></script>
@endsection
