@extends('admin.admin_layout')
@section('title')
<title>Thêm Danh Mục</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Thêm Danh Mục'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <form id="add_category">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12">   
                  <label for="InputName">Tên danh mục:</label>
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <label for="InputName">Chọn danh mục cha:</label>
                  <select id="parent_id" class="form-control" name="parent_id">
                    <option value="0">Danh Mục Gốc</option>
                    {!!$htmlOption!!}
                  </select>
                </div>
                
              </div>
            </div>
            @include('error.check_error')
            <div class="card-footer">
              <div class="row justify-content-md-center">
                <button data-url="{{route('admin.addcategory')}}" class="btn btn-primary btn-sm btn_category">Thêm mới</button>
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
                  <th>STT</th>
                  <th>Danh Mục</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $row)
                <tr>
                  <td>{{$row->id}}</td>
                  <td>{{$row->name}}</td>
                  <td>
                    <a href="{{route('admin.editcategory',['id' => $row -> id])}}" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i></a>
                    <a href="" data-url ="{{route('admin.deletecategory',['id' => $row -> id])}}" type="button" class="btn btn-danger btn-sm action_delete"><i class="fas fa-times"></i></a>
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
  <script src="{{asset('vendor/admin/category/delete.js')}}"></script>
  <script src="{{asset('vendor/admin/category/add.js')}}"></script>


@endsection