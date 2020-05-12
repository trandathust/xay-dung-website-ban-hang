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
        <form method="POST" enctype="multipart/form-data" action="{{route('admin.postchangepassword')}}">
          @csrf
          <div class="card">

            <div class="card-body">
              <div class="row justify-content-md-center">
                <div class="form-group col-md-6">
                  <label for="InputName">Mật Khẩu Hiện Tại</label>
                  <input type="password" name="current_password" class="form-control @error('current_password ') is-invalid @enderror" placeholder="Mật khẩu cũ">
                  @error('current_password ')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row justify-content-md-center">
                <div class="form-group col-md-6">
                  <label for="InputEmail">Mật Khẩu Mới</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu mới">
                  @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                </div>
                <div class="row justify-content-md-center">                       
                <div class="form-group col-md-6">
                  <label for="InputAddress">Xác Nhận Mật Khẩu</label>
                  <input type="password" name="repassword" class="form-control @error('repassword') is-invalid @enderror" placeholder="Xác nhận mật khẩu">
                  @error('repassword')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
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