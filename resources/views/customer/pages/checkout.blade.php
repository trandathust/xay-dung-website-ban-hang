@extends('customer.layout')
@section('title')
<title>Đặt Hàng | Shop</title>
@endsection
@section('content')

s<section id="cart_items">
	<div class="container">
		<div class="review-payment">
			<h2>THANH TOÁN</h2>
		</div>

		<div class="table-responsive cart_info">
			<form id="cart">
				@csrf
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Ảnh</td>
							<td class="description">Tên Sản Phẩm</td>
							<td class="price">Đơn Giá</td>
							<td class="quantity">Số Lượng</td>
							<td class="total" style="width:10%">Thành Tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $total = 0; $total_sale= 0?>

						@if(session('cart'))

						@foreach(session('cart') as $id => $details)
						@if($details['quantity'] != 0)
						<?php 
							$total += $details['price'] * $details['quantity'] ;
							if($details['price'] == $details['price_sale'] || $details['price_sale'] == null || $timenow > $details['end_sale'] )
								$total_sale += $details['price'] * $details['quantity'] ;
							else
								$total_sale += $details['price_sale'] * $details['quantity'] ;
						?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{$details['feature_image_path']}}" class="image-cart-70-100" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$details['name']}}</a></h4>
							</td>
							<td class="cart_price">
								@if($details['price'] == $details['price_sale'] || $details['price_sale'] == null || $timenow > $details['end_sale'])
								<p>{{number_format($details['price'])}} đ</p>
								@else
									<del>
										<p>{{number_format($details['price'])}} đ</p>
									</del>
									<br>
									<p>{{number_format($details['price_sale'])}} đ</p>
								@endif
							</td>
							<td class="cart_quantity" data-th="Quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up update-cart" data-id="{{ $id }}" data-url="{{route('updatecart')}}"  data-note="0"> - </a>
									<input class="cart_quantity_input quantity" type="text" name="quantity" value="{{$details['quantity']}}" autocomplete="off" size="2">
									<a class="cart_quantity_up update-cart" data-id="{{ $id }}" data-url="{{route('updatecart')}}"  data-note="1"> + </a>
								</div>
							</td>
							<td class="cart_total">
								@if($details['price'] == $details['price_sale'] || $details['price_sale'] == null || $timenow > $details['end_sale'])
								<p class="cart_total_price">{{number_format($details['price'] * $details['quantity'])}} đ</p>
								@else
									<del>
										<p class="cart_total_price">{{number_format($details['price'] * $details['quantity'])}} đ</p>
									</del>
									<br>
									<p class="cart_total_price">{{number_format($details['price_sale'] * $details['quantity'])}} đ</p>
								@endif
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete remove-from-cart" data-url="{{route('deletecart')}}"  data-id="{{ $id }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endif
						@endforeach
						@endif
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
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
										<td>{{number_format($feeship)}}đ</td>
									</tr>
									<tr>
										<td>Phương Thức</td>
										<td>Thanh Toán Khi Nhận Hàng</td>
									</tr>
									<tr>
										<td>Tổng Tiền</td>
										<td><span>
											@if($total == $total_sale)
												{{ number_format($total +$feeship) }}đ
											@else
												<del>{{ number_format($total +$feeship) }}đ</del>
												<br>
												{{ number_format($total_sale+$feeship) }}đ
											@endif
										</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
			
		</div>
		@if(!(auth()->check()))
		<div class="register-req">
			<p>Hãy <a href= "" > đăng ký tài khoản</a> để dễ dàng kiểm tra đơn đặt hàng. Hoặc bạn có thể sử dụng tài khoản khách để mua hàng. </p>
		</div><!--/register-req-->
		@endif

		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<a href="{{route('getProductDetail',['id' => $product -> id])}}"><img src="{{$product -> feature_image_path}}" class="image-check-out" alt="" /></a>
								<h2>{{number_format($product -> price)}}</h2>
								<p>{{$product -> name}}</p>
								<input type="hidden" name="id" id="id" value="{{$product -> id}}" />
								<input type="hidden" name="quantity" id="quantity" value="1" />
								<a data-url="{{route('saveCart',['id'=> $product -> id])}}" class="btn btn-default add-to-cart btn_add_to_cart_checkout"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</a>
							</div>

						</div>
					</div>
				</div>
				<div class="col-sm-4 clearfix">
					<div class="shopper-info">
						<p>Thông Tin Người Nhận</p>
						@if(!(auth()->check()))
						<form id="checkout">
							<input name="name" id="name" type="text" placeholder="Nhập tên">
							<input name="phone_number" id="phone_number" type="text" placeholder="Nhập số điện thoại">
							<input name="address" id="address" type="text" placeholder="Nhập địa chỉ">
						</form>
						@else
						<form id="checkout">
							<input type="text" name="name" id="name" value="{{auth()->user()-> name}}">
							<input type="text" name="phone_number" id="phone_number" value="{{auth()->user()-> phone_number}}">
							<input name="address" id="address" type="text" value="{{auth()->user()-> address}}">
						</form>
						@endif
						<a class="btn btn-primary" href="{{route('getShopping')}}">Mua Thêm</a>
						<a class="btn btn-primary btn_checkout" data-url="{{route('postCheckout')}}">Thanh Toán</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="order-message">
						<p>Ghi Chú</p>
						<form id="checkout">
							<textarea name="message" id="message" placeholder="Ghi chú thêm.." rows="8"></textarea>
						</form>
					</div>	
				</div>					
			</div>
		</div>
	{{-- </form> --}}
</div>
</section> <!--/#cart_items-->


@endsection



@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/customer/cart/cart.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/customer/checkout/checkout.css')}}">
@endsection

@section('js')

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="{{asset('vendor/customer/cart/cart.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/customer/checkout/checkout.js')}}"></script>

@endsection