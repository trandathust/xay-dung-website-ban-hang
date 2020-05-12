@extends('admin.admin_layout')
@section('title')
<title>Shop | Slider</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Slider'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <a href="{{route('admin.addslider')}}" type="submit" class="btn btn-primary btn-sm">Thêm mới</a>
        </div>
      </div>
      <div class="card-body">
       <table id="example2" class="table table-bordered table-hover">
        <thead>
          <th>Id</th>
          <th>Tên Slider</th>
          <th style="width: 50%">Mô Tả</th>
          <th>Hình Ảnh</th>
          <th>Hiện/Ẩn</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        @foreach($listSlider as $row)
        <tr>
          <td>{{$row -> id}}</td>
          <td>{{$row -> name}}</td>
          <td>{{$row -> description}}</td>
          <td><img class="image-product-150-100" src="{{$row -> image_path}}"></td>
          <td>
            <form method="POST" action="">
              @csrf
              <input type="hidden" name="id" id="id" value="{{$row -> id}}">
              <input class="check_status" data-url="{{route('admin.editstatusslider',['id' => $row -> id])}}" type="checkbox"  name="status" @if($row -> status ==1) value="0" checked @else value="1" @endif  id="status">
            </form>
          </td>
          <td>
            <a href="{{route('admin.editslider',['id' => $row -> id])}}" type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
            <a href="" data-url ="{{route('admin.deleteslider',['id' =>$row -> id])}}" type="button" class="btn btn-danger btn-sm action_delete"><i class="fas fa-times"></i></a>
          </td>
        </tr> 
        @endforeach
      </tbody>
    </table> 
  </div>
</div>
<!-- /.card -->
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
{{-- hình ảnh sản phẩm --}}
<link rel="stylesheet" type="text/css" href="{{asset('vendor/admin/product/add/view.css')}}">
@endsection




@section('js')

{{-- sweetalert2  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('vendor/admin/slider/view.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


@endsection