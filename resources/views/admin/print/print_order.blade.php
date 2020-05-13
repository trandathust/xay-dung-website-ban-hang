@extends('admin.admin_layout')
@section('title')
<title>In Đơn Hàng | Shop</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    @include('admin.general.content-header',['name' => 'In Đơn Hàng'])
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                {{-- <div class="card-header">
      </div> --}}
                <div class="card-body">
                    <div class="card">
                        <div class="card-title text-center">
                            <div class="row">
                                <div class="col col-1">

                                </div>
                                <div class="col col-3 ">
                                    <img src="{{$logo}}" class="image-logo">
                                </div>
                                <div class="col col-8">
                                    <h1>{{$nameshop}}</h1>
                                    <h5>{{$address}}</h5>
                                    <h5>{{$phone_number}}</h5>
                                    <h5>{{$email}}</h5>
                                </div>
                            </div>

                            <br>
                            <h2><b>HÓA ĐƠN THANH TOÁN</b></h2>
                        </div>
                        <div class="card-body text-left">
                            <span>Tên khách hàng: </span>
                            <span>
                                @if(optional($findorder -> customer) -> id)
                                {{optional($findorder -> customer) -> name}}
                                @else
                                {{optional($findorder -> user) -> name}}
                                @endif
                            </span>
                            <br>
                            <span>Số điện thoại: </span>
                            <span>
                                @if(optional($findorder -> customer) -> id)
                                {{optional($findorder -> customer) -> phone_number}}
                                @else
                                {{optional($findorder -> user) -> phone_number}}
                                @endif
                            </span>
                            <br>
                            <span>Tên khách hàng: </span>
                            <span>
                                @if(optional($findorder -> customer) -> id)
                                {{optional($findorder -> customer) -> address}}
                                @else
                                {{optional($findorder -> user) -> address}}
                                @endif
                            </span>
                            <br>
                            <span>Ghi Chú: </span>
                            <span>
                                {{$findorder -> message}}
                            </span>
                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Đơn Giá</th>
                                <th>Chiết Khấu</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($totalprice as $item)
                            <tr>
                                <td>{{$loop -> iteration}}</td>
                                <td>{{$item -> name}}</td>
                                <td>{{$item -> quantity}}</td>
                                <td>

                                    {{number_format($item -> price)}}

                                </td>
                                <td>
                                    @if($item -> price_sale == null || $item -> price == $item -> price_sale )
                                    0
                                    @else
                                    {{number_format($item -> price - $item -> price_sale)}}
                                    @endif
                                </td>

                                <td>
                                    @if($item -> price_sale == null || $item -> price == $item -> price_sale )
                                    {{number_format($item -> quantity * $item -> price)}}
                                    @else
                                    {{number_format($item -> quantity * $item -> price_sale)}}
                                    @endif
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">

                                    <table class="table table-condensed total-result">
                                        <tr>
                                            <td><b> Chiết Khấu:</b></td>
                                            <td>
                                                <?php
                      $total_sale = $feeship;
                      foreach ($totalprice as $key) {
                        if($key -> price_sale == null || $key -> price == $key -> price_sale)
                          $total_sale = $total_sale + $key -> quantity * $key -> price;
                        else
                          $total_sale = $total_sale + $key -> quantity * $key -> price_sale;
                      }
                      $total = $feeship;
                      foreach ($totalprice as $key) {
                        $total = $total + $key -> quantity * $key -> price;
                      }
                      if($total == $total_sale)
                        echo(0);
                      else{
                        echo(number_format($total - $total_sale));
                      }
                      ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Phí Ship:</b></td>
                                            <td>{{number_format($feeship)}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Tổng Tiền:</b></td>
                                            <td>
                                                <?php
                      $total_sale = $feeship;
                      foreach ($totalprice as $key) {
                        if($key -> price_sale == null || $key -> price == $key -> price_sale)
                          $total_sale = $total_sale + $key -> quantity * $key -> price;
                        else
                          $total_sale = $total_sale + $key -> quantity * $key -> price_sale;
                      }
                      $total = $feeship;
                      foreach ($totalprice as $key) {
                        $total = $total + $key -> quantity * $key -> price;
                      }
                      if($total == $total_sale)
                        echo(number_format($total));
                      else{
                        echo(number_format($total_sale));
                      }
                      ?>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </tfoot>
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
<link rel="stylesheet" type="text/css" href="{{asset('vendor/admin/print/print.css')}}">
@endsection




@section('js')
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>




@endsection
