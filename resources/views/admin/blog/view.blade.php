@extends('admin.admin_layout')
@section('title')
<title>Bài Viết</title>
@endsection
@section('content')
<div class="content-wrapper">
    @include('admin.general.content-header',['name' => 'Bài Viết'])
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-2">
                            <a href="{{route('admin.getaddblog')}}" type="submit" class="btn btn-primary">Thêm
                                mới</a>
                        </div>
                        <div class="col col-7"></div>
                        <div class="col col-3 align-self-end">
                            <input id="myInput_table" type="text" placeholder="Nhập tên.." class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ngày Viết</th>
                                <th>Hình Ảnh</th>
                                <th>Tiêu Đề Bài Viết</th>

                                <th>Tác Giả</th>
                                <th>Hiện/Ẩn</th>
                                <th style="width: 10%">#</th>
                            </tr>
                        </thead>
                        <tbody id="table_blog">
                            @foreach($listBlog as $blog)
                            <tr>
                                <td>{{$blog -> id}}</td>
                                <td>{{$blog -> created_at ->format('d.m.Y')}}</td>
                                <td><img class="image_title" src="{{$blog -> title_image_path}}"></td>

                                <td>{{$blog -> title}}</td>
                                <td>{{optional($blog ->user)-> name}}</td>
                                <td>
                                    <form method="POST" action="">
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="{{$blog -> id}}">
                                        <input class="check_status"
                                            data-url="{{route('admin.editstatusblog',['id' => $blog -> id])}}"
                                            type="checkbox" name="status" @if($blog -> status ==1) value="0" checked
                                        @else value="1" @endif id="status">
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('admin.geteditblog',['id' => $blog-> id])}}" type="button"
                                        class="btn btn-warning btn-sm"><i class="fas fa-search"></i></a>
                                    <a href="" data-url="{{route('admin.deleteblog',['id' => $blog-> id])}}"
                                        type="button" class="btn btn-danger btn-sm action_delete"><i
                                            class="fas fa-times"></i></a>
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
<link rel="stylesheet" type="text/css" href="{{asset('vendor/admin/blog/view.css')}}">
@endsection




@section('js')
{{-- sweetalert2  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{asset('vendor/admin/blog/view.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@endsection
