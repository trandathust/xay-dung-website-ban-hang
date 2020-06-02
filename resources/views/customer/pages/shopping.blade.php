@extends('customer.layout')
@section('title')
<title>Sản Phẩm | Shop</title>
@endsection
@section('content')


<section>
    <div class="container">
        <div class="row">
            @include('customer.genaral.category')

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">TẤT CẢ SẢN PHẨM</h2>
                    @foreach($listProduct as $item)
                    <form id="add_cart_category" method="POST" action="{{route('buyNow')}}">
                        @csrf
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{route('getProductDetail',['id' => $item -> id])}}"><img
                                                class="image-home" src="{{$item-> feature_image_path}}" alt="" /></a>
                                        <h2>
                                            @if($item -> price == $item -> price_sale || $item -> price_sale == null)
                                            {{number_format($item-> price)}}
                                            @else
                                            <del style="color: #4a4946"><span
                                                    style="color: #4a4946">{{number_format($item-> price)}}</span></del>
                                            {{number_format($item-> price_sale)}}
                                            @endif
                                        </h2>
                                        <p>{{$item-> name}}</p>
                                        <input type="hidden" name="id" id="id" value="{{$item -> id}}" />
                                        <input type="hidden" name="quantity" id="quantity" value="1" />
                                        <a data-url="{{route('saveCart',['id'=> $item -> id])}}"
                                            class="btn btn-default add-to-cart btn_add_to_cart"><i
                                                class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</a>
                                        <button type="submit" class="btn btn-default add-to-cart">Mua
                                            Ngay</button>
                                    </div>
                                    @if($item['price'] == $item['price_sale'] || $item['price_sale'] == null)

                                    @else
                                    <img src="{{asset('eshopper/images/home/sale.png')}}" class="new" alt="" />
                                    @endif
                                </div>

                            </div>
                        </div>
                    </form>
                    @endforeach

                </div>
                <!--features_items-->
                {{ $listProduct->links() }}

            </div>
        </div>
    </div>
</section>


@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/customer/home/home.css')}}">

@endsection


@section('js')

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="{{asset('vendor/customer/cart/cart.js')}}"></script>


@endsection
