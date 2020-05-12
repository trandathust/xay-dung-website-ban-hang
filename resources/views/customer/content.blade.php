@extends('customer.layout')
@section('title')
<title>Trang Chủ | Shop</title>
@endsection
@section('content')

@include('customer.genaral.slider')

<section>
	<div class="container">
		<div class="row">
			@include('customer.genaral.category')
			
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center"><a href="{{route('getNew')}}" style="color: #FE980F">SẢN PHẨM MỚI</a></h2>
					@foreach($listProductlatest as $item)
					<form >
						@csrf
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="{{route('getProductDetail',['id' => $item -> id])}}"><img class="image-home" src="{{$item-> feature_image_path}}" alt="" /></a>
										<h2>
											@if($item -> price == $item -> price_sale || $item -> price_sale == null || $mytime > $item -> end_sale)
											{{number_format($item-> price)}} 
											@else
											<del style="color: #4a4946"><span style="color: #4a4946">{{number_format($item-> price)}}</span></del>
											{{number_format($item-> price_sale)}}
											@endif
										</h2>
										<p>{{$item -> name}}</p>
										<input type="hidden" name="id" id="id" value="{{$item -> id}}" />
										<input type="hidden" name="quantity" id="quantity" value="1" />
										<a data-url="{{route('saveCart',['id'=> $item -> id])}}" class="btn btn-default add-to-cart btn_add_to_cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</a>
										<a data-url="{{route('saveCart',['id'=> $item -> id])}}"  class="btn btn-default add-to-cart btn_buy_now">Mua Ngay</a>
									</div>
									@if($item['price'] == $item['price_sale'] || $item['price_sale'] == null || $mytime > $item -> end_sale )

									@else
										<img src="{{asset('eshopper/images/home/sale.png')}}" class="new" alt="" />
									@endif
								</div>
							</div>
						</div>
					</form>
					@endforeach
					{{-- 6 SẢN PHẨM --}}
				</div><!--features_items-->

				

				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center" ><a style="color: #FE980F"href="{{route('getSale')}}">SẢN PHẨM GIẢM GIÁ</a></h2>

					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">	
								@foreach($listProductSale as $item)
								<form>
									@csrf
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{route('getProductDetail',['id' => $item -> id])}}"><img class="image-home" src="{{$item-> feature_image_path}}" alt="" /></a>
													<h2>
														@if($item -> price == $item -> price_sale || $item -> price_sale == null || $mytime > $item -> end_sale)
														{{number_format($item-> price)}} 
														@else
														<del style="color: #4a4946"><span style="color: #4a4946">{{number_format($item-> price)}}</span></del>
														{{number_format($item-> price_sale)}}
														@endif

													</h2>
													<p>{{$item -> name}}</p>
													<input type="hidden" name="id" id="id" value="{{$item -> id}}" />
													<input type="hidden" name="quantity" id="quantity" value="1" />
													<a data-url="{{route('saveCart',['id'=> $item -> id])}}" class="btn btn-default add-to-cart btn_add_to_cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</a>
													<a data-url="{{route('saveCart',['id'=> $item -> id])}}"  class="btn btn-default add-to-cart btn_buy_now">Mua Ngay</a>
												</div>
												<img src="{{asset('eshopper/images/home/sale.png')}}" class="new" alt="" />
											</div>
										</div>
									</div>
								</form>
								@endforeach
								{{-- 3 sản phẩm --}}
							</div>
							<div class="item">	
								@foreach($listProductSale1 as $item)
								<form >
									@csrf
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="{{route('getProductDetail',['id' => $item -> id])}}"><img class="image-home" src="{{$item-> feature_image_path}}" alt="" /></a>
													<h2>
														@if($item -> price == $item -> price_sale || $item -> price_sale == null || $mytime > $item -> end_sale)
														{{number_format($item-> price)}} 
														@else
														<del style="color: #4a4946"><span style="color: #4a4946">{{number_format($item-> price)}}</span></del>
														{{number_format($item-> price_sale)}}
														@endif

													</h2>
													<p>{{$item -> name}}</p>
													<input type="hidden" name="id" id="id" value="{{$item -> id}}" />
													<input type="hidden" name="quantity" id="quantity" value="1" />
													<a data-url="{{route('saveCart',['id'=> $item -> id])}}" class="btn btn-default add-to-cart btn_add_to_cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</a>
													<a data-url="{{route('saveCart',['id'=> $item -> id])}}"  class="btn btn-default add-to-cart btn_buy_now">Mua Ngay</a>
												</div>
												<img src="{{asset('eshopper/images/home/sale.png')}}" class="new" alt="" />
											</div>
										</div>
									</div>
								</form>
								@endforeach
								{{-- 3 sản phẩm --}}
							</div>
						</div>
						<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div><!--/recommended_items-->


				<div class="category-tab"><!--category-tab-->
					<h2 class="title text-center">SẢN PHẨM BÁN CHẠY</h2>
					@foreach($listProductSelling_3 as $item)
					<form>
						@csrf
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="{{route('getProductDetail',['id' => $item['id']])}}"><img class="image-home" src="{{$item['feature_image_path']}}" alt="" /></a>
										<h2>
											@if($item['price'] == $item['price_sale'] || $item['price_sale'] == null || $mytime > $item['end_sale'])
											{{number_format($item['price'])}} 
											@else
											<del style="color: #4a4946"><span style="color: #4a4946">{{number_format($item['price'])}}</span></del>
											{{number_format($item['price_sale'])}}
											@endif

										</h2>
										<p>{{$item['name']}}</p>
										<input type="hidden" name="id" id="id" value="{{$item['id']}}" />
										<input type="hidden" name="quantity" id="quantity" value="1" />
										<a data-url="{{route('saveCart',['id'=> $item['id']])}}" class="btn btn-default add-to-cart btn_add_to_cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</a>
										<a data-url="{{route('saveCart',['id'=> $item['id']])}}"  class="btn btn-default add-to-cart btn_buy_now">Mua Ngay</a>
									</div>
									@if($item['price'] == $item['price_sale'] || $item['price_sale'] == null || $mytime > $item['end_sale'])

									@else
										<img src="{{asset('eshopper/images/home/sale.png')}}" class="new" alt="" />
									@endif
								</div>
							</div>
						</div>
					</form>
					@endforeach
				</div><!--/category-tab-->

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