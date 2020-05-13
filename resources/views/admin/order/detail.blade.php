@extends('admin.admin_layout')
@section('title')
<title>Đơn Hàng | Shop</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    @include('admin.general.content-header',['name' => 'Chi Tiết Đơn Hàng'])
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                {{-- <div class="card-header">
      </div> --}}
                <div class="card-body">
                    <div class="">
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td colspan="7">

                                    <table class="table table-condensed total-result">
                                        <tr>
                                            <td><b> Khách Hàng:</b></td>
                                            @if(optional($findorder -> customer) -> id)
                                            <td>{{optional($findorder -> customer) -> name}}</td>
                                            <td>{{optional($findorder -> customer) -> phone_number}}</td>
                                            <td>{{optional($findorder -> customer) -> address}}</td>
                                            @else
                                            <td>{{optional($findorder -> user) -> name}}</td>
                                            <td>{{optional($findorder -> user) -> phone_number}}</td>
                                            <td>{{optional($findorder -> user) -> address}}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td><b>Ngày Tạo:</b></td>
                                            <td>{{$findorder -> created_at -> format('d-M-Y')}}</td>
                                            <td><b>Ngày Cập Nhật:</b></td>
                                            <td>{{$findorder -> updated_at -> format('d-M-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Tổng Tiền:</b></td>
                                            <td>
                                                <?php
                      $total_sale = 0;
                      foreach ($totalprice as $key) {
                        if($key -> price_sale == null || $key -> price == $key -> price_sale)
                          $total_sale = $total_sale + $key -> quantity * $key -> price;
                        else
                          $total_sale = $total_sale + $key -> quantity * $key -> price_sale;
                      }
                      $total = 0;
                      foreach ($totalprice as $key) {
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
                                            <td><b>Trạng Thái:</b></td>
                                            <td>
                                                <form method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" id="id" value="{{$findorder -> id}}">
                                                    <select class="form-control" id="select_id" name="select_name"
                                                        data-url="{{route('admin.updateorder',['id' => $findorder -> id])}}">
                                                        @foreach($status as $row)
                                                        <option value="{{$row -> id}}" @if($row -> id == $findorder ->
                                                            status_id) selected="selected"
                                                            @endif>{{$row -> display_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Ghi Chú:</b></td>
                                            <td>{{$findorder -> message}}</td>
                                            <td></td>
                                            <td><button class="action_delete btn btn-danger btn-sm"
                                                    data-url="{{route('admin.deleteorder',['id' => $findorder -> id])}}"><i
                                                        class="fas fa-times"> </i> Xóa Đơn Hàng</button></td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <th>STT</th>
                                <th>Mã</th>
                                <th>Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($totalprice as $item)
                            <tr>
                                <td>{{$loop -> iteration}}</td>
                                <td>{{$item -> name}}</td>
                                <td><img src="{{$item -> feature_image_path}}" alt="" class="image-cart-70-100"></td>
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
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
{{-- hình ảnh sản phẩm --}}
<link rel="stylesheet" type="text/css" href="{{asset('vendor/admin/order/detail.css')}}">
@endsection




@section('js')
{{-- sweetalert2  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
{{-- <script src="{{asset('vendor/admin/product/add/view.js')}}"></script> --}}
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('vendor/admin/order/detail.js')}}"></script>



@endsection
