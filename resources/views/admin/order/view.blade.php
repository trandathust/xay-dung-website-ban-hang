@extends('admin.admin_layout')
@section('title')
<title>Đơn Hàng</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Đơn Hàng'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-fluid">
    <div class="card">
      {{-- <div class="card-header">

      </div> --}}
      <div class="card-body">
        
       <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="width: 3%">ID</th>
            <th>Ngày Đặt</th>
            <th>Khách Hàng</th>
            <th style="width: 10%">Số Điện Thoại</th>
            <th style="width: 35%">Địa Chỉ</th>
            <th style="width: 7%">Tổng Tiền</th>
            <th style="width: 15%">Trạng Thái</th>
            <th style="width: 15%">#</th>
          </tr>
        </thead>
        <tbody>
          @foreach($listOrder as $item)
          
          <tr>

            <td>{{$item -> id}}</td>
            <td>{{$item -> created_at ->format('d M Y')}}</td>
            @if(optional($item -> customer) -> id) 
            <td>{{optional($item -> customer) -> name}}</td>
            <td>{{optional($item -> customer) -> phone_number}}</td>
            <td>{{optional($item -> customer) -> address}}</td>
            @else
            <td>{{optional($item -> user) -> name}}</td>
            <td>{{optional($item -> user) -> phone_number}}</td>
            <td>{{optional($item -> user) -> address}}</td>
            @endif
            <td><?php 
            $total_sale = 0;
            foreach ($totalPrice as $key) {
              if($key -> order_id == $item -> id){ 
                if($key -> price_sale == null || $key -> price == $key -> price_sale)
                  $total_sale = $total_sale + $key -> quantity * $key -> price;
                else
                  $total_sale = $total_sale + $key -> quantity * $key -> price_sale;
              }
            }
            $total = 0;
            foreach ($totalPrice as $key) {
              if($key -> order_id == $item -> id)
                  $total = $total + $key -> quantity * $key -> price;
            }
            if($total == $total_sale)
              echo(number_format($total));
            else{
            echo("<del>"); 
            echo(number_format($total)); 
            echo("</del> </br>");
            echo(number_format($total_sale));
            }
            ?>
          </td>
          
          <td>
            <form method="" action="">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$item -> id}}" >
            <select class="form-control" id="select_id" name="select_id" data-url="{{route('admin.updateorder',['id' => $item -> id])}}">
              
              @foreach($status as $row)
              
              <option value="{{$row -> id}}" @if($row -> id == $item -> status_id) selected="selected" @endif>{{$row -> display_name}} </option>

              @endforeach
              
            </select>
            </form>

            </td>
            <td>
              <button href="{{route('admin.getPrint',['id' => $item-> id])}}" type="button" class="btn btn-danger btn-sm btnprn"><i class="fas fa-print"></i></i></button>
              <a href="{{route('admin.detailorder',['id' => $item-> id])}}" type="button" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a>
              <a href="" data-url ="{{route('admin.deleteorder',['id' => $item-> id])}}" type="button" class="btn btn-danger btn-sm action_delete"><i class="fas fa-times"></i></a>
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
<script src="{{asset('vendor/admin/product/add/view.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('vendor/admin/order/view.js')}}"></script>

<script src="{{asset('vendor/admin/print/jquery.printPage.js')}}"></script>
<script src="{{asset('vendor/admin/print/print.js')}}"></script>
@endsection