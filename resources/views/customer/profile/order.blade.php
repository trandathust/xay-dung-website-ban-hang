@extends('customer.layout')
@section('title')
<title>Tài Khoản | Shop</title>
@endsection
@section('content')

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
				<div class="text-left">
					@if(auth()->user()->avatar_path)
					<img class="profile-user-img img-fluid img-circle image-avatar"
					src="{{$user->avatar_path}} " alt="Avatar"
					>
					@else
					<img class="profile-user-img img-fluid img-circle image-avatar"
					src="{{asset('adminlte/dist/img/avatar04.png')}}"
					alt="User profile picture">
					@endif
					<h4 class="text-center" >{{$user -> name}}</h4>
				</div>

				<div class="left-sidebar">
					<div class="panel-group category-products" id="accordian">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{route('customer.viewprofile')}}">Tài Khoản</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{route('customer.changepassword')}}">Mật Khẩu</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a  href="{{route('customer.getorder')}}" style="color: #FE980F">Đơn Mua</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-1">

			</div>
			@if(request()->type == null)
				<div class="col-sm-9 padding-right">
					<div class="role">
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder')}}" type="button" class="btn btn-primary btn-block">Tất Cả</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=waiting'}}" type="button" class="btn btn-css btn-block">Chờ Soạn Hàng</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=delivery'}}" type="button" class="btn btn-css btn-block">Đang Giao</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=received'}}" type="button" class="btn btn-css btn-block">Đã Nhận</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=cancelled'}}" type="button" class="btn btn-css btn-block" >Đã Hủy</a>
						</div>
					</div>
					<br>
					<br>
					<hr>
					<div class="table-responsive cart_info">
						@foreach($listOrder as $order)
						<table class="table table-striped table-bordered">
							<thead>
								<tr class="table-primary">
									<td scope="col" class="text-center table-css" >Ảnh</td>
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
									<td >
										<a href="{{route('getProductDetail',['id'=> $product -> product_id])}}"><img src="{{$product -> image}}" class="image-product"></a>
									</td>
									<td ><h4>{{$product -> name}}</h4></td>
									<td >
										@if($product -> price == $product -> price_sale || $product -> price_sale == null)
										{{number_format($product -> price)}}
										@else
										<del>{{number_format($product -> price)}}</del>
										<br>
										{{number_format($product -> price_sale)}}
										@endif
									</td>
									<td >{{$product -> quantity}}</td>
									<td><p class="cart_total_price">
										@if($product -> price == $product -> price_sale || $product -> price_sale == null)
										{{number_format($product -> price * $product -> quantity)}}
										@else
										<del>{{number_format($product -> price * $product -> quantity)}}</del>
										<br>
										{{number_format($product -> price_sale * $product -> quantity)}}
										@endif
									</p></td>
								</tr>
								@endif
								@endforeach
								<tr>
									<td colspan="3">
										<table>
											<tr>
												<td>Ngày Đặt:</td>
												<td>
													<time style="font-size: 16px; color: #FE980F">{{$order -> created_at}}</time>
												</td>
											</tr>
											<tr>
												<td>Trạng Thái:</td>
												<td style="color: #FE980F">{{$order -> display_name}}</td>
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
													@if($order -> status_name == 'received' || $order -> status_name == 'cancelled')
												<form method="POST" action="">
													<a href="{{route('customer.reOrder',['id'=>$order -> id])}}" class="btn btn-primary ">ĐẶT LẠI</a>
												</form>
													@endif
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
			@elseif(request()->type === 'waiting')
				<div class="col-sm-9 padding-right">
					<div class="role">
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder')}}" type="button" class="btn  btn-css btn-block">Tất Cả</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=waiting'}}" type="button" class="btn btn-primary btn-block">Chờ Soạn Hàng</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=delivery'}}" type="button" class="btn btn-css btn-block">Đang Giao</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=received'}}" type="button" class="btn btn-css btn-block">Đã Nhận</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=cancelled'}}" type="button" class="btn btn-css btn-block" >Đã Hủy</a>
						</div>
					</div>
					<br>
					<br>
					<hr>
					<div class="table-responsive cart_info">
						@foreach($listOrder as $order)
						@if($order -> status_name == 'waiting')
						<table class="table table-striped table-bordered">
							<thead>
								<tr class="table-primary">
									<td scope="col" class="text-center table-css" >Ảnh</td>
									<td scope="col" class="text-center table-css">Tên Sản Phẩm</td>
									<td scope="col" class="text-center table-css">Đơn Giá</td>
									<td scope="col" class="text-center table-css">Số Lượng</td>
									<td scope="col" style="width:10%" class="text-center table-css">Thành Tiền</td>
								</tr>
							</thead>
							<tbody>
								<?php $total = 0; $total_sale = 0?>


								@foreach($listOrderDetail as $product)
								@if($order -> id == $product -> id )
								<?php
								$total = $total + $product -> price * $product -> quantity;
								if($product -> price == $product -> price_sale || $product -> price_sale == null)
									$total_sale  = $total_sale + $product -> price * $product -> quantity;
								else
									$total_sale = $total_sale + $product -> price_sale * $product -> quantity;
								?>
								<tr>
									<td >
										<a href="{{route('getProductDetail',['id'=> $product -> product_id])}}"><img src="{{$product -> image}}" class="image-product"></a>
									</td>
									<td ><h4>{{$product -> name}}</h4></td>
									<td >
										@if($product -> price == $product -> price_sale || $product -> price_sale == null)
										{{number_format($product -> price)}}
										@else
										<del>{{number_format($product -> price)}}</del>
										<br>
										{{number_format($product -> price_sale)}}
										@endif
									</td>
									<td >{{$product -> quantity}}</td>
									<td><p class="cart_total_price">
										@if($product -> price == $product -> price_sale || $product -> price_sale == null)
										{{number_format($product -> price * $product -> quantity)}}
										@else
										<del>{{number_format($product -> price * $product -> quantity)}}</del>
										<br>
										{{number_format($product -> price_sale * $product -> quantity)}}
										@endif
									</p></td>
								</tr>
								@endif
								@endforeach
								<tr>
									<td colspan="3">
										<table>
											<tr>
												<td>Ngày Đặt:</td>
												<td>
													<time style="font-size: 16px; color: #FE980F">{{$order -> created_at}}</time>
												</td>
											</tr>
											<tr>
												<td>Trạng Thái:</td>
												<td style="color: #FE980F">{{$order -> display_name}}</td>
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
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<hr style="width:100%;text-align:left;margin-left:0;border: 3px solid;color: #FE980F">
						@endif
						@endforeach
					</div>
				</div>
			@elseif(request()->type === 'delivery')
				<div class="col-sm-9 padding-right">
					<div class="role">
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder')}}" type="button" class="btn  btn-css btn-block">Tất Cả</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=waiting'}}" type="button" class="btn btn-css  btn-block">Chờ Soạn Hàng</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=delivery'}}" type="button" class="btn btn-primary btn-block">Đang Giao</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=received'}}" type="button" class="btn btn-css btn-block">Đã Nhận</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=cancelled'}}" type="button" class="btn btn-css btn-block" >Đã Hủy</a>
						</div>
					</div>
					<br>
					<br>
					<hr>
					<div class="table-responsive cart_info">
						@foreach($listOrder as $order)
						@if($order -> status_name == 'delivery')
						<table class="table table-striped table-bordered">
							<thead>
								<tr class="table-primary">
									<td scope="col" class="text-center table-css" >Ảnh</td>
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
									<td >
										<a href="{{route('getProductDetail',['id'=> $product -> product_id])}}"><img src="{{$product -> image}}" class="image-product"></a>
									</td>
									<td ><h4>{{$product -> name}}</h4></td>
									<td >
										@if($product -> price == $product -> price_sale || $product -> price_sale == null)
										{{number_format($product -> price)}}
										@else
										<del>{{number_format($product -> price)}}</del>
										<br>
										{{number_format($product -> price_sale)}}
										@endif
									</td>
									<td >{{$product -> quantity}}</td>
									<td><p class="cart_total_price">
										@if($product -> price == $product -> price_sale || $product -> price_sale == null)
										{{number_format($product -> price * $product -> quantity)}}
										@else
										<del>{{number_format($product -> price * $product -> quantity)}}</del>
										<br>
										{{number_format($product -> price_sale * $product -> quantity)}}
										@endif
									</p></td>
								</tr>
								@endif
								@endforeach
								<tr>
									<td colspan="3">
										<table>
											<tr>
												<td>Ngày Đặt:</td>
												<td>
													<time style="font-size: 16px; color: #FE980F">{{$order -> created_at}}</time>
												</td>
											</tr>
											<tr>
												<td>Trạng Thái:</td>
												<td style="color: #FE980F">{{$order -> display_name}}</td>
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
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<hr style="width:100%;text-align:left;margin-left:0;border: 3px solid;color: #FE980F">
						@endif
						@endforeach
					</div>
				</div>
			@elseif(request()->type === 'received')
				<div class="col-sm-9 padding-right">
					<div class="role">
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder')}}" type="button" class="btn  btn-css btn-block">Tất Cả</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=waiting'}}" type="button" class="btn btn-css  btn-block">Chờ Soạn Hàng</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=delivery'}}" type="button" class="btn btn-css btn-block">Đang Giao</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=received'}}" type="button" class="btn btn-primary btn-block">Đã Nhận</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=cancelled'}}" type="button" class="btn btn-css btn-block" >Đã Hủy</a>
						</div>
					</div>
					<br>
					<br>
					<hr>
					<div class="table-responsive cart_info">
						@foreach($listOrder as $order)
						@if($order -> status_name == 'received')
						<table class="table table-striped table-bordered">
							<thead>
								<tr class="table-primary">
									<td scope="col" class="text-center table-css" >Ảnh</td>
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
									<td >
										<a href="{{route('getProductDetail',['id'=> $product -> product_id])}}"><img src="{{$product -> image}}" class="image-product"></a>
									</td>
									<td ><h4>{{$product -> name}}</h4></td>
									<td >
										@if($product -> price == $product -> price_sale || $product -> price_sale == null)
										{{number_format($product -> price)}}
										@else
										<del>{{number_format($product -> price)}}</del>
										<br>
										{{number_format($product -> price_sale)}}
										@endif
									</td>
									<td >{{$product -> quantity}}</td>
									<td><p class="cart_total_price">
										@if($product -> price == $product -> price_sale || $product -> price_sale == null)
										{{number_format($product -> price * $product -> quantity)}}
										@else
										<del>{{number_format($product -> price * $product -> quantity)}}</del>
										<br>
										{{number_format($product -> price_sale * $product -> quantity)}}
										@endif
									</p></td>
								</tr>
								@endif
								@endforeach
								<tr>
									<td colspan="3">
										<table>
											<tr>
												<td>Ngày Đặt:</td>
												<td>
													<time style="font-size: 16px; color: #FE980F">{{$order -> created_at}}</time>
												</td>
											</tr>
											<tr>
												<td>Trạng Thái:</td>
												<td style="color: #FE980F">{{$order -> display_name}}</td>
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
													<a href="{{route('getShopping')}}" class="btn btn-primary ">ĐẶT LẠI</a>
												</td>

											</tr>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<hr style="width:100%;text-align:left;margin-left:0;border: 3px solid;color: #FE980F">
						@endif
						@endforeach
					</div>
				</div>
			@elseif(request()->type ==='cancelled')
				<div class="col-sm-9 padding-right">
					<div class="role">
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder')}}" type="button" class="btn  btn-css btn-block">Tất Cả</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=waiting'}}" type="button" class="btn btn-css  btn-block">Chờ Soạn Hàng</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=delivery'}}" type="button" class="btn btn-css btn-block">Đang Giao</a>
						</div>

						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=received'}}" type="button" class="btn btn-css btn-block">Đã Nhận</a>
						</div>
						<div class="col col-sm-2">
							<a href="{{route('customer.getorder'). '?type=cancelled'}}" type="button" class="btn btn-primary btn-block" >Đã Hủy</a>
						</div>
					</div>
					<br>
					<br>
					<hr>
					<div class="table-responsive cart_info">
						@foreach($listOrder as $order)
						@if($order -> status_name == 'cancelled')
						<table class="table table-striped table-bordered">
							<thead>
								<tr class="table-primary">
									<td scope="col" class="text-center table-css" >Ảnh</td>
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
									<td >
										<a href="{{route('getProductDetail',['id'=> $product -> product_id])}}"><img src="{{$product -> image}}" class="image-product"></a>
									</td>
									<td ><h4>{{$product -> name}}</h4></td>
									<td >
										@if($product -> price == $product -> price_sale || $product -> price_sale == null)
										{{number_format($product -> price)}}
										@else
										<del>{{number_format($product -> price)}}</del>
										<br>
										{{number_format($product -> price_sale)}}
										@endif
									</td>
									<td >{{$product -> quantity}}</td>
									<td><p class="cart_total_price">
										@if($product -> price == $product -> price_sale || $product -> price_sale == null)
										{{number_format($product -> price * $product -> quantity)}}
										@else
										<del>{{number_format($product -> price * $product -> quantity)}}</del>
										<br>
										{{number_format($product -> price_sale * $product -> quantity)}}
										@endif
									</p></td>
								</tr>
								@endif
								@endforeach
								<tr>
									<td colspan="3">
										<table>
											<tr>
												<td>Ngày Đặt:</td>
												<td>
													<time style="font-size: 16px; color: #FE980F">{{$order -> created_at}}</time>
												</td>
											</tr>
											<tr>
												<td>Trạng Thái:</td>
												<td style="color: #FE980F">{{$order -> display_name}}</td>
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
													<a href="{{route('getShopping')}}" class="btn btn-primary ">ĐẶT LẠI</a>
												</td>

											</tr>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
						<hr style="width:100%;text-align:left;margin-left:0;border: 3px solid;color: #FE980F">
						@endif
						@endforeach
					</div>
				</div>
			@endif
		</div>
	</div>
</section>


@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/customer/user/user.css')}}">

@endsection


@section('js')

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="{{asset('vendor/customer/cart/cart.js')}}"></script>


@endsection
