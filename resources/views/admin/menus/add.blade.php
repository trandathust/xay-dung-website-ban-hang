@extends('admin.admin_layout')
@section('title')
<title>Thêm Menu</title>
@endsection
@section('content')

<div class="content-wrapper">
    @include('admin.general.content-header',['name' => 'Thêm Menu'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <form id="insert_menu">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="InputName">Tên Menu:</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nhập tên">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="InputName">URL:</label>
                                        <input type="text" name="url" id="url"
                                            class="form-control @error('url') is-invalid @enderror"
                                            placeholder="Nhập đường dẫn">
                                        @error('url')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="InputName">Chọn menu cha:</label>
                                        <select id="parent_id" class="form-control" name="parent_id">
                                            <option value="0">Menu Gốc</option>
                                            {!!$htmlOption!!}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @include('error.check_error')
                            <div class="card-footer">
                                <div class="row justify-content-md-center">
                                    <button data-url="{{route('admin.addmenu')}}"
                                        class="btn btn-primary btn-sm btn-submit-menu">Thêm mới</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>URL</th>
                                        <th style="width: 20%;">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($menus as $row)
                                    <tr>
                                        <td><a href="{{$row->url}}">{{$row->name}}</a></td>
                                        <td><a href="{{$row->url}}">{{$row->url}}</a></td>
                                        <td>
                                            <a href="{{route('admin.editmenu',['id' => $row -> id])}}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <a href="" data-url="{{route('admin.deletemenu',['id' => $row -> id])}}"
                                                type="button" class="btn btn-danger btn-sm action_delete"><i
                                                    class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="{{asset('vendor/admin/menu/add.js')}}"></script>


@endsection
