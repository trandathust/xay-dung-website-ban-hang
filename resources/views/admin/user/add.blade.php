@extends('admin.admin_layout')
@section('title')
<title>Thêm người dùng</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Thêm Người Dùng'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <form method="POST" action="{{route('admin.postadduser')}}" enctype="multipart/form-data">
          @csrf
          <div class="card">
            @include('error.check_error')
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-6">   
                  <label for="InputName">Tên</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên" value="{{old('name')}}">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="InputEmail">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email" value="{{old('email')}}">
                  @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>                       
                <div class="form-group col-md-6">
                  <label for="InputPassword">Mật khẩu</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nhập mật khẩu" value="{{old('password')}}">
                  @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="InputRePassword">Xác nhận mật khẩu</label>
                  <input type="password" name="repassword" class="form-control @error('repassword') is-invalid @enderror" placeholder="Xác nhận mật khẩu">
                  @error('repassword')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="InputAddress">Địa chỉ</label>
                  <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Nhập địa chỉ" value="{{old('address')}}">
                  @error('address')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="InputBirthDay">Ngày sinh</label>
                  <input type="date" name="birthday" class="form-control" value="{{old('birthday')}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="InputAddress">Số điện thoại</label>
                  <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Nhập số điện thoại" value="{{old('phone_number')}}">
                  @error('phone_number')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="InputAddress">Giới tính</label>
                  <input type="text" name="sex" class="form-control" placeholder="" value="{{old('sex')}}">
                </div>
                <div class="form-group col-md-6">
                  <div class="custom-file">
                    <label >Ảnh đại diện:</label>
                    <input type="file" class="form-control-file" name="avatar_name" id="exampleFormControlFile1">
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label>Vai Trò</label>

                  <select multiple class="form-control" name="roles[]">
                    @foreach($listRole as $row)
                    <option value="{{$row -> id}}">{{$row -> display_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <div class="row justify-content-md-center">
                  <button type="submit" class="btn btn-primary btn-sm">Thêm mới</button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </form>
      </div>



      <!-- /.col-md-6 -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
           <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nhân Viên</th>
                <th>Vai Trò</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($listUser as $row)
              <tr>
                <td>{{$row->name}}</td>
                <td>
                  @foreach($listUserRole as $role)
                  @if($role->id == $row->id)
                  {{$role -> display_name}} <br>
                  @endif
                  @endforeach
                </td>
                <td>{{$row->email}}</td>
                <td>{{$row->phone_number}}</td>
                <td>
                  <a href="{{route('admin.detailuser',['id' => $row -> id])}}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a>
                  <a href="{{route('admin.edituser',['id' => $row -> id])}}" type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                </td>
                @endforeach
              </tr>                     
            </tbody>
          </table> 
        </div>
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
</div>
<!-- /.content-wrapper -->
@endsection


@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection




@section('js')
<!-- DataTables -->
  <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  {{-- sweet alert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="{{asset('vendor/admin/menu/delete.js')}}"></script>
  <script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "info": false
      });
    });
  </script>

@endsection