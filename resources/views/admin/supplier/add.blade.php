@extends('admin.admin_layout')
@section('title')
<title>Nhà Cung Cấp</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Nhà Cung Cấp'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4">
        <form id="insert_supplier">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12">   
                  <label for="InputName">Họ và Tên:</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên">
                </div>
                <div class="form-group col-md-12">   
                  <label for="InputName">Email:</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Nhập Email">
                </div>
                <div class="form-group col-md-12">   
                  <label for="InputName">Số Điện Thoại:</label>
                  <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Nhập số điện thoại">
                </div>
                <div class="form-group col-md-12">   
                  <label for="InputName">Địa Chỉ:</label>
                  <input type="text" name="address" id="address" class="form-control" placeholder="Nhập địa chỉ">
                </div>
                
                
              </div>
            </div>
            @include('error.check_error')
            <div class="card-footer">
              <div class="row justify-content-md-center">
                <button data-url = "{{route('admin.postsupplier')}}" class="btn btn-primary btn-sm btn-submit-supplier">Thêm mới</button>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </form>
      </div>

      <!-- /.col-md-6 -->
      <div class="col-lg-8">
        <div class="card">
          {{-- <div class="card-header border-0 ">
              <h3 class="card-title">Danh sách nhân viên đang làm việc</h3>
            </div> --}}
            <div class="card-body">
             <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Tên</th>
                  <th>Email</th>
                  <th>Số Điện Thoại</th>
                  <th>Địa Chỉ</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                @foreach($listSupplier as $row)
                <tr>
                  <td>{{$row->name}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->phone_number}}</td>
                  <td>{{$row->address}}</td>
                  <td>
                    <a href="{{route('admin.editsupplier',['id' => $row -> id])}}" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i></a>
                    <a href="" data-url ="{{route('admin.deletesupplier',['id' => $row -> id])}}"type="button" class="btn btn-danger btn-sm action_delete"><i class="fas fa-times"></i></a>
                  </td>
                </tr>   
                @endforeach            
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
  <script src="{{asset('vendor/admin/supplier/delete.js')}}"></script>
  <script src="{{asset('vendor/admin/supplier/add.js')}}"></script>


@endsection