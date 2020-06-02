@extends('admin.admin_layout')
@section('title')
<title>Danh sách người dùng</title>
@endsection
@section('content')

<div class="content-wrapper">
    @include('admin.general.content-header',['name' => 'Danh Sách Khách Hàng'])
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col"></div>
                        <div class="col">
                            <input type="text" id="search_user_on" class="form-control" placeholder="Tìm kiếm">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="table_customer" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Khách Hàng</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Ngày Sinh</th>
                                <th>Giới Tính</th>
                                <th>Địa Chỉ</th>
                                <th style="width: 18%">#</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_user_on">
                            @foreach($listCustomer as $item)
                            <tr>
                                <td>{{$item -> name}}</td>
                                <td>{{$item -> email}}</td>
                                <td>{{$item -> phone_number}}</td>
                                <td>{{$item -> birthday}}</td>
                                <td>{{$item -> sex}}</td>
                                <td>{{$item -> address}}</td>
                                <td>
                                    <a href="{{route('admin.list.order.of.user',['id'=>$item -> id])}}" type="button"
                                        class="btn btn-primary btn-sm"><i class="fas fa-search"></i> Đơn Mua</a>
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

@endsection



@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection




@section('js')
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/admin/user/customer.js')}}"></script>
@endsection
