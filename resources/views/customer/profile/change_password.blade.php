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
								<h4 class="panel-title"><a href="{{route('customer.changepassword')}}" style="color: #FE980F">Mật Khẩu</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{route('customer.getorder')}}">Đơn Mua</a></h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-1">
				
			</div>
			<div class="col-sm-8 padding-right">
				<h2 class="title text-center">ĐỔI MẬT KHẨU</h2>
				<div class="row">
					<form method="POST" action="{{route('customer.postchangepassword')}}">
						@csrf
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Mật Khẩu Cũ</label>
							<div class="col-sm-10">
								<input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" >
								@error('current_password')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-2 col-form-label">Mật Khẩu Mới</label>
							<div class="col-sm-10">
								<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
								@error('password')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-2 col-form-label">Xác Nhận Mật Khẩu</label>
							<div class="col-sm-10">
								<input type="password" class="form-control @error('repassword') is-invalid @enderror" name="repassword" id="repassword">
								@error('repassword')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						@include('error.check_error')
						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary" href="{{route('customer.postviewprofile')}}">Lưu Lại</button>
							</div>
						</div>
					</form>
				</div>
			</div>
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