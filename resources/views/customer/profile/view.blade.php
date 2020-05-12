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
								<h4 class="panel-title"><a href="{{route('customer.viewprofile')}}" style="color: #FE980F">Tài Khoản</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{route('customer.changepassword')}}">Mật Khẩu</a></h4>
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
				<h2 class="title text-center">THÔNG TIN CÁ NHÂN</h2>
				<div class="row">
					<form method="POST" action="{{route('customer.postviewprofile')}}" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Họ Tên</label>
							<div class="col-sm-10">
								<input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user -> name}}" name="name" >
								@error('name')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$user -> email}}" name="email" id="email">
								@error('email')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-2 col-form-label">Số Điện Thoại</label>
							<div class="col-sm-10">
								<input type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{$user -> phone_number}}" name="phone_number" id="phone_number">
								@error('phone_number')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-2 col-form-label">Địa Chỉ</label>
							<div class="col-sm-10">
								<input type="text" class="form-control @error('address') is-invalid @enderror" value="{{$user -> address}}" name="address" id="address">
								@error('address')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-2 col-form-label">Ngày Sinh</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" value="{{$user -> birthday}}" name="birthday" id="birthday">
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-2 col-form-label">Giới Tính</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" value="{{$user -> sex}}" name="sex" id="sex">
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-sm-2 col-form-label">Ảnh Đại Diện</label>
							<div class="col-sm-10">
								<input type="file" class="form-control-file" name="avatar" id="avatar">
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