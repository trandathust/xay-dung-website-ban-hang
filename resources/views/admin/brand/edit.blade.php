@extends('admin.admin_layout')
@section('title')
<title>Brand | Shop</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Sửa Thương Hiệu'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <form action="{{route('admin.editbrand', ['id' => $brand -> id])}}">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12">   
                  <label for="InputName">Tên thương hiệu:</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$brand -> name}}">
                  <input type="hidden" name="id" id="id" class="form-control" value="{{$brand -> id}}">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <label for="InputName">Mô tả thương hiệu:</label>
                  <textarea class="form-control  @error('description') is-invalid @enderror error-messages" rows="10" name="description" id="description" placeholder="Mô tả thương hiệu..." value="{{old('description')}}">{{$brand -> description}}</textarea>
                  @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            @include('error.check_error')
            <div class="card-footer">
              <div class="row justify-content-md-center">
                <button data-url="{{route('admin.editbrand', ['id' => $brand -> id])}}" class="btn btn-primary btn-sm btn_brand">Lưu</button>
              </div>
            </div>
          </div>
        </form>
      </div>

      <!-- /.col-md-6 -->
      <div class="col-lg-6">
        <div class="card">
          {{-- <div class="card-header border-0 ">
              <h3 class="card-title">Danh sách nhân viên đang làm việc</h3>
            </div> --}}
            <div class="card-body">
             <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Thương Hiệu</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                @foreach($listBrand as $row)
                <tr>
                  <td>{{$row -> id}}</td>
                  <td>{{$row -> name}}</td>
                  <td>
                    <a href="{{route('admin.editbrand',['id' => $row -> id])}}" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i></a>
                    <a href="" data-url ="{{route('admin.deletebrand',['id' => $row -> id])}}" type="button" class="btn btn-danger btn-sm action_delete"><i class="fas fa-times"></i></a>
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
  <script src="{{asset('vendor/admin/brand/delete.js')}}"></script>
   <script src="{{asset('vendor/admin/brand/edit.js')}}"></script>


@endsection