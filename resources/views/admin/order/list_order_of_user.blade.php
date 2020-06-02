@extends('admin.admin_layout')
@section('title')
<title>Đơn Hàng</title>
@endsection
@section('content')
<div class="content-wrapper">
    @include('admin.general.content-header',['name' => 'Đơn Hàng'])
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-10"></div>
                        <div class="col col-2">
                            {{-- <button type="button" class="btn btn-danger">
                                Exports
                            </button> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @foreach($listOrder as $order)
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="table-primary">
                                <td scope="col" class="text-center table-css">Ảnh</td>
                                <td scope="col" class="text-center table-css">Tên Sản Phẩm</td>
                                <td scope="col" class="text-center table-css">Đơn Giá</td>
                                <td scope="col" class="text-center table-css">Số Lượng</td>
                                <td scope="col" style="width:10%" class="text-center table-css">Thành Tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; $total_sale = 0?>


                            @foreach($listOrderDetail as $product)
                            @if($order -> id == $product -> id)
                            <?php
                    								$total = $total + $product -> price * $product -> quantity;
                    								if($product -> price == $product -> price_sale || $product -> price_sale == null)
                    									$total_sale  = $total_sale + $product -> price * $product -> quantity;
                    								else
                    									$total_sale = $total_sale + $product -> price_sale * $product -> quantity;
                    								?>
                            <tr>
                                <td>
                                    <a href="{{route('getProductDetail',['id'=> $product -> product_id])}}"><img
                                            src="{{$product -> image}}" class="image-product"></a>
                                </td>
                                <td>
                                    <h4>{{$product -> name}}</h4>
                                </td>
                                <td>
                                    @if($product -> price == $product -> price_sale || $product -> price_sale ==
                                    null)
                                    {{number_format($product -> price)}}
                                    @else
                                    <del>{{number_format($product -> price)}}</del>
                                    <br>
                                    {{number_format($product -> price_sale)}}
                                    @endif
                                </td>
                                <td>{{$product -> quantity}}</td>
                                <td>
                                    <p class="cart_total_price">
                                        @if($product -> price == $product -> price_sale || $product ->
                                        price_sale ==
                                        null)
                                        {{number_format($product -> price * $product -> quantity)}}
                                        @else
                                        <del>{{number_format($product -> price * $product -> quantity)}}</del>
                                        <br>
                                        {{number_format($product -> price_sale * $product -> quantity)}}
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            <tr>
                                <td colspan="3">
                                    <table>
                                        <tr>
                                            <td>Khách Hàng:</td>
                                            <td>{{$user -> name}}</td>
                                            <td>Số Điện Thoại:</td>
                                            <td>{{$user -> phone_number}}</td>
                                        </tr>
                                        <tr>

                                            <td>Email:</td>
                                            <td>{{$user -> email}}</td>
                                            <td>Địa Chỉ:</td>
                                            <td>{{$user -> address}}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày Đặt:</td>
                                            <td>
                                                <time
                                                    style="font-size: 16px; color: #FE980F">{{$order -> created_at}}</time>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Trạng Thái:</td>
                                            <td style="color: #FE980F">{{$order -> display_name}}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr></tr>
                                    </table>
                                </td>




                                <td colspan="3">
                                    <table>
                                        <tr>
                                            <td>Tiền Hàng</td>
                                            <td>
                                                @if($total == $total_sale)
                                                {{ number_format($total) }}đ
                                                @else
                                                <del>{{ number_format($total) }}đ</del>
                                                <br>
                                                {{ number_format($total_sale) }}đ
                                                @endif
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Phí Ship</td>
                                            <td>25,000đ</td>
                                        </tr>
                                        <tr>
                                            <td>Tổng Tiền</td>
                                            <td><span style="color: #FE980F">
                                                    {{ number_format($total_sale+25000) }}đ
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>

                                            </td>

                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr style="width:100%;text-align:left;margin-left:0;border: 3px solid;color: #FE980F">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('vendor/customer/user/user.css')}}">
@endsection


@section('js')

@endsection
