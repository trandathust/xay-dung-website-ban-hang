@extends('customer.layout')
@section('title')
<title>Giỏ Hàng | Shop</title>
@endsection
@section('content')



<section id="cart_items">
	<div class="container">
		<div class="review-payment">
			<h2>GIỎ HÀNG</h2>
		</div>
		<div class="table-responsive cart_info">
			<form>
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
							if($details['price'] == $details['price_sale'] || $details['price_sale'] == null || $timenow > $details['end_sale'])
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
									<del style="color: #FE980F">
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
							<td colspan="1">
								<table class="table table-condensed total-result">
									<tr>
										<td>Tổng Tiền</td>
										<td><span>
											@if($total == $total_sale)
												{{ number_format($total) }}đ
											@else
												<del>{{ number_format($total) }}đ</del>
												<br>
												{{ number_format($total_sale) }}đ
											@endif

										</span></td>
									</tr>
									<tr>
										<td>
											<a href="{{route('getShopping')}}" class="btn btn-primary ">MUA THÊM</a>

										</td>
										<td>
											<a href="{{route('getCheckout')}}"  class="btn btn-primary" >THANH TOÁN</a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>

				</table>
			</form>
		</div>
	</div>
</section> <!--/#cart_items-->



@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/customer/cart/cart.css')}}">

@endsection

@section('js')

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="{{asset('vendor/customer/cart/cart.js')}}"></script>


@endsection