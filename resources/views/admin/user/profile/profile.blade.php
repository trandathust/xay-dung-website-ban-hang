@extends('admin.admin_layout')
@section('title')
<title>Thông Tin Cá Nhân</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Thông Tin Cá Nhân'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-sm">
   <!-- Profile Image -->
   <div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        @if(auth()->user()->avatar_path)
        <img class="profile-user-img img-fluid img-circle"
        src="{{$user->avatar_path}}"
        alt="User profile picture">
        @else
        <img class="profile-user-img img-fluid img-circle"
        src="{{asset('adminlte/dist/img/avatar04.png')}}"
        alt="User profile picture">
        @endif
      </div>
        <h3 class="profile-username text-center">{{$user->name}}</h3>
      <p class="text-muted text-center">
        @if($user->deleted_ad == null)
        <span style="color: blue">Làm việc</span>
        @else
        <span style="color: red">Tạm nghỉ</span>
        @endif
      </p>
      <ul class="list-group list-group-unbordered mb-3">
        <div class="row  justify-content-md-center">
          <div class="col col-md-6">
            <li class="list-group-item">
              <b>Email: </b> <a class="float-right">{{$user->email}}</a>
            </li>

            <li class="list-group-item">
              <b>Số điện thoại:</b> <a class="float-right">{{$user->phone_number}}</a>
            </li> 
            <li class="list-group-item">
              <b>Ngày sinh:</b> <a class="float-right">{{$user->birthday}}</a>
            </li> 
            <li class="list-group-item">
              <b>Giới tính:</b> <a class="float-right">{{$user->sex}}</a>
            </li> 
            <li class="list-group-item">
              <b>Địa chỉ:</b> <a class="float-right">{{$user->address}}</a>
            </li> 
          </div>
          <li class="list-group-item">
            <label>Vai trò:</label>
            <p>
            @foreach($getRoleOfUser as $role) {{$role}}</br> @endforeach
          </p>
        </li>  
        <li class="list-group-item">
          <label>Quyền truy cập:</label>
          <p>
          @foreach($getPermissionOfUser as $permission) {{$permission}}</br> @endforeach
        </p>
      </li>           
    </div>
  </ul>
</div>
<div class="row flex-container justify-content-center">
  <div class="col col-md-2">
    <a href="{{route('admin.editprofile')}}" class="btn btn-primary"><b>Sửa Thông Tin</b></a>
  </div>
  <div class="col col-md-2">
    <a href="" class="btn btn-danger"><b>Đổi Mật Khẩu</b></a>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection