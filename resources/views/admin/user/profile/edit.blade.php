@extends('admin.admin_layout')
@section('title')
<title>Sửa thông tin</title>
@endsection
@section('content')
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Sửa Thông Tin'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.posteditprofile')}}">
          @csrf
          <div class="card">

            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-6">   
                  <label for="InputName">Tên</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên" value="{{$user->name}}">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="InputEmail">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email" value="{{$user->email}}">
                  @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>                       
                <div class="form-group col-md-6">
                  <label for="InputAddress">Địa chỉ</label>
                  <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Nhập địa chỉ" value="{{$user->address}}">
                  @error('address')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="InputBirthDay">Ngày sinh</label>
                  <input type="date" name="birthday" class="form-control" value="{{$user->birthday}}" >
                </div>
                <div class="form-group col-md-6">
                  <label for="InputAddress">Số điện thoại</label>
                  <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Nhập số điện thoại" value="{{$user->phone_number}}">
                  @error('phone_number')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="InputAddress">Giới tính</label>
                  <input type="text" name="sex" class="form-control" placeholder="" value="{{$user->sex}}">
                </div>
                <div class="form-group col-md-6">
                  <div class="custom-file">
                    <label >Ảnh đại diện:</label>
                    <input type="file" class="form-control-file" name="avatar_name" id="exampleFormControlFile1">
                  </div>
                  <div class="col-md-2">
                    <img class="image-product-100-150" src="{{$user->avatar_path}}">
                  </div>
                </div>
              </div>
              @include('error.check_error')
              <div class="card-footer">
                <div class="row justify-content-md-center">
                  <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </form>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection


@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/admin/user/edit.css')}}">
@endsection




@section('js')

@endsection