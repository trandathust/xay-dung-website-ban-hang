@extends('admin.admin_layout')
@section('title')
<title>Vai Trò</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Sửa Vai Trò'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <form method="POST">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12">   
                  <label for="InputName">Tên vai trò:</label>
                  <input type="text" name="display_name" class="form-control @error('display_name') is-invalid @enderror" placeholder="Nhập tên" value="{{$role->display_name}}">
                  @error('display_name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <label for="InputName">Danh sách quyền:</label>
                </div>
                <div class="form-group col-md-12">
                  <div class="row">

                    @foreach($listPermissionParent as $item)
                    <div class="card card-js border-dark col-md-12">
                      <div class="card-header">
                        <label>
                          <input type="checkbox"  value="{{$item -> id}}" class="checkbox_wrapper">
                        </label>
                        {{$item -> display_name}}
                      </div>
                      <div class="row">
                        @foreach($item -> permissionChildrent as $subitem)
                        <div class="card-body text-dark col-md-3">
                          <label>
                            <input type="checkbox" name="permission[]" value="{{$subitem -> id}}" class="checkbox_childrent" 
                            {{$getAllPermissionOfRole->contains($subitem->id) ? 'checked' : ''}} 
                            >
                          </label>
                          <?php
                          if (strpos($subitem -> name, 'add') !== false) {
                            echo 'Thêm';
                          } elseif(strpos($subitem -> name, 'edit') !== false) {
                            echo 'Sửa';
                          }
                          elseif(strpos($subitem -> name, 'delete') !== false) {
                            echo 'Xóa';
                          }
                          elseif(strpos($subitem -> name, 'list') !== false) {
                            echo 'Xem';
                          }
                          elseif(strpos($subitem -> name, 'update') !== false) {
                            echo 'Cập Nhật';
                          }
                          ?>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    @endforeach
                  </div>

                </div>
                
              </div>
              {{-- /.card body --}}
              @include('error.check_error')
            </div>
            <div class="card-footer">
              <div class="row justify-content-md-center">
                <button type="submit" class="btn btn-primary btn-sm ">Lưu</button>
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
                <th>Vai Trò</th>
                <th>Quyền</th>
                <th>#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($Role as $row)
              <tr>
                <td>{{$row->display_name}}</td>
                <td>
                  @foreach($Permission as $per)
                  @if($per->role_id == $row ->id)
                  {{$per->permission_name}} <br>
                  @endif
                  @endforeach
                </td>
                <td>
                  <a type="button" class="btn btn-primary btn-sm" href="{{route('admin.editrole',['id' => $row -> id])}}"><i class="fas fa-edit"></i></a>
                  <a type="button" class="btn btn-danger btn-sm action_delete" href="" data-url ="{{route('admin.deleterole',['id' => $row -> id])}}"><i class="fas fa-times"></i></a>
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
<link rel="stylesheet" type="text/css" href="{{asset('vendor/admin/role/role.css')}}">
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection




@section('js')
 {{-- sweetalert2  --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="{{asset('vendor/admin/role/delete.js')}}"></script>
  <script src="{{asset('vendor/admin/role/role.js')}}"></script>
<!-- DataTables -->
  <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


@endsection