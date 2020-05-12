@extends('admin.admin_layout')
@section('title')
<title>Trang Chủ</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 @include('admin.general.content-header',['name' => 'Trang Chủ'])
 <!-- /.content-header -->

 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Đơn Hàng Trong 30 Ngày</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span class="text-bold text-lg">
                  <?php 
                  $total = 0;
                  foreach ($orderOfMonth as $key => $value) {
                    $total +=$value-> value;
                  }
                  echo($total);
                  ?>
                </span>
                <span>Đơn Hàng</span>
              </p>
            </div>
            <!-- /.d-flex -->

            <div class="position-relative mb-4">
              <canvas id="visitors-chart" height="200" data-order= "{{$orderOfMonth}}"></canvas>
            </div>
            <div class="d-flex flex-row justify-content-end">
              <span class="mr-2">
                <i class="fas fa-square text-primary"></i> Ngày
              </span>
            </div>
          </div>
        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Sản Phẩm Bán Chạy Trong 30 Ngày</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
              <thead>
                <tr>
                  <th>Sản Phẩm</th>
                  <th>Giá</th>
                  <th>SL Bán</th>
                  <th>Xem Thêm</th>
                </tr>
              </thead>
              <tbody>
                @foreach($listProductSale_Good as $item)
                <tr>
                  <td>
                    <img src="{{$item['image']}}" alt="Product 1" class="img-circle img-size-32 mr-2">
                    {{$item['name']}}
                  </td>
                  <td>@if($item['price'] ==$item['price_sale'] || $item['price_sale'] == null || $time_now > $item['end_sale'])
                    {{number_format($item['price'])}}
                    @else
                    <del>{{number_format($item['price'])}}</del>
                    <br>
                    {{number_format($item['price_sale'])}}
                  @endif đ</td>
                  <td>
                    @if($percent_product[$loop -> index] >0 )
                    <small class="text-success mr-1">
                      <i class="fas fa-arrow-up"></i>
                      {{$percent_product[$loop -> index]}}%
                    </small>
                    @else
                    <small class="text-danger mr-1">
                      <i class="fas fa-arrow-down"></i>
                      {{$percent_product[$loop -> index]}}%
                    </small>
                    @endif
                    {{$item['number']}}
                  </td>
                  <td>
                    <a href="{{route('admin.viewproduct') . '?type=selling'}}" target="_blank" class="text-muted">
                      <i class="fas fa-search"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer text-center">
            <a href="{{route('admin.viewproduct') . '?type=selling'}}" class="uppercase">Xem Thêm</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Tổng Tiền Hàng</h3>
              {{-- <a href="javascript:void(0);">View Report</a> --}}
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>

          </div>
          <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span class="text-bold text-lg">
                  <?php
                  $total = 0;
                  foreach ($orderSaleOfMonth as $key => $value) {
                    $total = $total + $value-> value;
                  }
                  echo (number_format($total));
                  ?>

                đ</span>
                <span>Tiền</span>
              </p>
              <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                  <i class="fas fa-arrow-up"></i> {{$percent_money}}%
                </span>
                <span class="text-muted">So với tháng trước</span>
              </p>
            </div>
            <!-- /.d-flex -->

            <div class="position-relative mb-4">
              <canvas id="sales-chart" height="200" data-sale={{$orderSaleOfMonth}}></canvas>
            </div>

            <div class="d-flex flex-row justify-content-end">
              <span class="mr-2">
                <i class="fas fa-square text-primary"></i> Tiền Hàng
              </span>
            </div>
          </div>
        </div>
        <!-- /.card -->

        <!-- PRODUCT LIST -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Recently Added Products</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
              @foreach($listProduct as $item)
              <li class="item">
                <div class="product-img">
                  <img src="{{$item -> feature_image_path}}" alt="Product Image" class="img-circle img-size-32 mr-2">
                </div>
                <div class="product-info">
                  <a href="javascript:void(0)" class="product-title">{{$item -> name}}
                    @if($item -> price == $item -> price_sale || $item -> price_sale == null || $time_now > $item -> end_sale)
                    <span class="badge badge-success float-right">{{number_format($item -> price)}} đ</span>
                    @else 
                    <span class="badge badge-success float-right"><del>{{number_format($item -> price)}} đ</del></span> <br>
                    <span class="badge badge-danger float-right">{{number_format($item -> price_sale)}} đ</span>
                    @endif

                  </a>
                  <span class="product-description">
                    <?php 
                    $content = $item -> content ;
                    $content = substr($content,0,90);
                    echo($content);
                    ?>
                  </span>
                </div>
              </li>
              <!-- /.item -->
              @endforeach
            </ul>
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <a href="{{route('admin.viewproduct')}}" class="uppercase">Xem Thêm</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
      <div class="col-lg-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Đơn Hàng Mới</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Khách Hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Trạng Thái</th>
                    <th>Tổng Tiền</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listOrder as $item)
                  <tr>
                    <td><a href="{{route('admin.detailorder',['id'=> $item -> id])}}">{{$item -> id}}</a></td>
                    @if(optional($item -> customer) -> id) 
                    <td>{{optional($item -> customer) -> name}}</td>
                    <td>{{optional($item -> customer) -> phone_number}}</td>
                    <td>{{optional($item -> customer) -> address}}</td>
                    @else
                    <td>{{optional($item -> user) -> name}}</td>
                    <td>{{optional($item -> user) -> phone_number}}</td>
                    <td>{{optional($item -> user) -> address}}</td>
                    @endif
                    <td>
                      @foreach($status as $subitem)
                      @if($subitem -> id == $item -> status_id)
                      @if($subitem -> name === 'received')
                      <span class="badge badge-success">{{$subitem -> display_name}}</span>
                      @elseif($subitem -> name === 'waiting')
                      <span class="badge badge-warning">{{$subitem -> display_name}}</span>
                      @elseif($subitem -> name === 'delivery')
                      <span class="badge badge-warning">{{$subitem -> display_name}}</span>
                      @elseif($subitem -> name === 'cancelled')
                      <span class="badge badge-danger">{{$subitem -> display_name}}</span>
                      @elseif($subitem -> name === 'order')
                      <span class="badge badge-warning">{{$subitem -> display_name}}</span>
                      @elseif($subitem -> name === 'hoan-ve')
                      <span class="badge badge-danger">{{$subitem -> display_name}}</span>
                      @endif
                      @endif
                      @endforeach
                    </td>
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
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <a href="" class="btn btn-sm btn-info float-left">Thêm Đơn Hàng</a>
            <a href="{{route('admin.getorder')}}" class="btn btn-sm btn-secondary float-right">Xem Thêm</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection