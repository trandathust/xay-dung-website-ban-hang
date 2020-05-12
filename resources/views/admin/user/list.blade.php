@extends('admin.admin_layout')
@section('title')
<title>Danh sách người dùng</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Danh Sách Người Dùng'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header border-0 ">
            <h3 class="card-title"><b>Danh sách nhân viên đang làm việc</b></h3>
          </div>
          <div class="card-body">
           <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nhân Viên</th>
                <th>Vai Trò</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>Địa Chỉ</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($userenable as $row)
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
                <td>{{$row->birthday}}</td>
                <td>{{$row->sex}}</td>
                <td>{{$row->address}}</td>
                <td>
                  <a href="{{route('admin.detailuser',['id' => $row -> id])}}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a>
                  <a href="{{route('admin.edituser',['id' => $row -> id])}}" type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                  <a href="" data-url ="{{route('admin.softdeleteuser',['id' => $row -> id])}}"  type="button" class="btn btn-danger btn-sm action_off">Nghỉ làm</a>
                </td>
                @endforeach
              </tr>                     
            </tbody>
          </table> 
        </div>
      </div>



      <!-- /.col-md-6 -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header border-0 ">
            <div class="card-header border-0 ">
              <h3 class="card-title"><b>Danh sách nhân viên đã nghỉ việc</b></h3>
            </div>
          </div>
          <div class="card-body">
           <table id="example3" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nhân Viên</th>
                <th>Vai Trò</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>Địa Chỉ</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($userdisable as $row)
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
                <td>{{$row->birthday}}</td>
                <td>{{$row->sex}}</td>
                <td>{{$row->address}}</td>
                <td>
                  <a href="{{route('admin.detailuser',['id' => $row -> id])}}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a>
                  <a href="" data-url="{{route('admin.restoreuser',['id' => $row -> id])}}" type="button" class="btn btn-warning btn-sm action_restore">Khôi phục</a>
                  <a href="" data-url ="{{route('admin.deleteuser',['id' => $row -> id])}}"  type="button" class="btn btn-danger btn-sm action_delete"><i class="fas fa-times"></i></a>
                </td>
                @endforeach
              </tr>                     
            </tbody>
          </table> 
        </div>
      </div>
      <!-- /.card -->
    </div>
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

  {{-- sweetalert2  --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="{{asset('vendor/admin/user/delete.js')}}"></script>
  <script src="{{asset('vendor/admin/user/list.js')}}"></script>


@endsection