@extends('admin.admin_layout')
@section('title')
<title>Sản Phẩm</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    @include('admin.general.content-header',['name' => 'Sản Phẩm'])
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                @if(request()->type == null)
                <div class="card-header">
                    <nav class="navbar navbar-light bg-light justify-content-between">
                        <a href="{{route('admin.addproduct')}}" type="submit" class="btn btn-primary ">Thêm
                            mới</a>

                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button"
                                class="btn btn-primary btn-block dropdown-toggle btn-warning" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Tất Cả Sản Phẩm
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{route('admin.viewproduct'). '?type=sale'}}">Sản
                                    Phẩm Khuyến Mại</a>
                                <a class="dropdown-item" href="{{route('admin.viewproduct') . '?type=selling'}}">Sản
                                    Phẩm Bán Chạy</a>
                                <a class="dropdown-item" href="{{route('admin.viewproduct') . '?type=inventory'}}">Hàng
                                    Tồn Kho</a>
                            </div>
                        </div>
                        <form action="{{route('admin.export_allproduct')}}" method="post">
                            @csrf
                            <div class="input-group-prepend">
                                <input type="date" class="form-control" name="start_date">
                                <input type="date" class="form-control" name="end_date">
                                <button href="{{route('admin.export_allproduct')}}" type="submit"
                                    class="btn btn-outline-danger">
                                    Export</button>
                            </div>
                        </form>


                        <form class="form-inline" action="{{route('admin.productSearch')}}" method="POST">
                            @csrf
                            <input class="form-control @error('data_search') is-invalid @enderror" type="text"
                                placeholder="Nhập tên sản phẩm" name="data_search">
                            @error('data_search')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <button class="btn btn-outline-success" type="submit"
                                href="{{route('admin.productSearch')}}">Tìm</button>
                        </form>

                    </nav>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Hình Ảnh</th>
                                <th>Danh Mục</th>
                                <th>Thương Hiệu</th>
                                <th>Hiện/Ẩn</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listProduct as $product)
                            <tr>
                                <td>{{$product -> id}}</td>
                                <td>{{$product -> name}}</td>
                                <td>
                                    @if($product ->price ==$product -> price_sale || $product -> price_sale == null ||
                                    $mytime > $product -> end_sale)
                                    {{number_format($product -> price)}}
                                    @else
                                    <del>{{number_format($product -> price)}}</del>
                                    <br>
                                    {{number_format($product -> price_sale)}}
                                    @endif
                                </td>
                                <td>{{number_format($product -> quantity)}}</td>
                                <td><img class="image-product-150-100" src="{{$product -> feature_image_path}}"></td>
                                <td>{{optional($product ->category)-> name}}</td>
                                <td>{{optional($product ->brand)-> name}}</td>
                                <td>
                                    <form method="POST" action="">
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="{{$product -> id}}">
                                        <input class="check_status"
                                            data-url="{{route('admin.editstatus',['id' => $product -> id])}}"
                                            type="checkbox" name="status" @if($product -> status ==1) value="0" checked
                                        @else value="1" @endif id="status">
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('admin.editproduct',['id' => $product-> id])}}" type="button"
                                        class="btn btn-warning btn-sm"><i class="fas fa-search"></i></a>
                                    <a href="" data-url="{{route('admin.deleteproduct',['id' => $product-> id])}}"
                                        type="button" class="btn btn-danger btn-sm action_delete"><i
                                            class="fas fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif(request()-> type === 'sale')
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a href="{{route('admin.addproduct')}}" type="submit"
                                        class="btn btn-primary mr-sm-4">Thêm
                                        mới</a>
                                </li>
                                <li class="nav-item">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-warning mr-sm-4 dropdown-toggle " data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Sản Phẩm Khuyến Mại
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item"
                                                href="{{route('admin.viewproduct') . '?type=inventory'}}">Hàng
                                                Tồn Kho</a>
                                            <a class="dropdown-item" href="{{route('admin.viewproduct')}}">Tất Cả Sản
                                                Phẩm</a>
                                            <a class="dropdown-item"
                                                href="{{route('admin.viewproduct') . '?type=selling'}}">Sản
                                                Phẩm Bán Chạy</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.export_saleproduct')}}" type="submit"
                                        class="btn btn-danger mr-sm-4">
                                        Export</a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action=" {{route('admin.productSearch')}}"
                                method="POST">
                                @csrf
                                <input class="form-control @error('data_search') is-invalid @enderror" type="text"
                                    placeholder="Nhập tên sản phẩm" name="data_search">

                                <button class="btn btn-outline-success" type="submit"
                                    href="{{route('admin.productSearch')}}">Tìm</button>
                            </form>
                        </div>



                    </nav>
                </div>

                <div class="card-body">
                    <table id="table1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Ngày BĐ</th>
                                <th>Ngày KT</th>
                                <th>Hình Ảnh</th>
                                <th>Hiện/Ẩn</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listProductSale as $sale)
                            <tr>
                                <td>{{$sale -> id}}</td>
                                <td>{{$sale -> name}}</td>
                                <td>

                                    <del>{{number_format($sale -> price)}}</del>
                                    <br>
                                    {{number_format($sale -> price_sale)}}
                                </td>
                                <td>{{number_format($sale -> quantity)}}</td>
                                <td>{{$sale -> start_sale}}</td>
                                <td>{{$sale -> end_sale}} </td>
                                <td><img class="image-product-150-100" src="{{$sale -> feature_image_path}}"></td>
                                <td>
                                    <form method="POST" action="">
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="{{$sale -> id}}">
                                        <input class="check_status"
                                            data-url="{{route('admin.editstatus',['id' => $sale -> id])}}"
                                            type="checkbox" name="status" @if($sale -> status ==1) value="0" checked
                                        @else value="1" @endif id="status">
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('admin.editproduct',['id' => $sale-> id])}}" type="button"
                                        class="btn btn-warning btn-sm"><i class="fas fa-search"></i></a>
                                    <a href="" data-url="{{route('admin.deleteproduct',['id' => $sale-> id])}}"
                                        type="button" class="btn btn-danger btn-sm action_delete"><i
                                            class="fas fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                @elseif(request()-> type ==='inventory')
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a href="{{route('admin.addproduct')}}" type="submit"
                                        class="btn btn-primary mr-sm-4 ">Thêm
                                        mới</a>
                                </li>
                                <li class="nav-item">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-warning mr-sm-4 dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Hàng Tồn Kho
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item"
                                                href="{{route('admin.viewproduct'). '?type=sale'}}">Sản
                                                Phẩm Khuyến Mại</a>
                                            <a class="dropdown-item" href="{{route('admin.viewproduct')}}">Tất Cả Sản
                                                Phẩm</a>
                                            <a class="dropdown-item"
                                                href="{{route('admin.viewproduct') . '?type=selling'}}">Sản
                                                Phẩm Bán Chạy</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.export_inventoryproduct')}}" type="submit"
                                        class="btn btn-danger mr-sm-4"> Export</a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action=" {{route('admin.productSearch')}}"
                                method="POST">
                                @csrf
                                <input class="form-control @error('data_search') is-invalid @enderror" type="text"
                                    placeholder="Nhập tên sản phẩm" name="data_search">

                                <button class="btn btn-outline-success" type="submit"
                                    href="{{route('admin.productSearch')}}">Tìm</button>
                            </form>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Sản Phẩm </th>
                                <th>Giá Thường</th>
                                <th>Số Lượng</th>
                                <th>Hình Ảnh</th>
                                <th>Hiện/Ẩn</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listInventory as $sale)
                            <tr>
                                <td>{{$sale['id']}}</td>
                                <td>{{$sale['name']}}</td>
                                <td>
                                    @if($sale ->price ==$sale -> price_sale || $sale -> price_sale == null || $mytime >
                                    $sale -> end_time)
                                    {{number_format($sale -> price)}}
                                    @else
                                    <del>{{number_format($sale -> price)}}</del>
                                    <br>
                                    {{number_format($sale -> price_sale)}}
                                    @endif
                                </td>
                                <td>{{number_format($sale['quantity'])}}</td>
                                <td><img class="image-product-150-100" src="{{$sale['feature_image_path']}}"></td>
                                <td>
                                    <form method="POST" action="">
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="{{$sale -> id}}">
                                        <input class="check_status"
                                            data-url="{{route('admin.editstatus',['id' => $sale -> id])}}"
                                            type="checkbox" name="status" @if($sale -> status ==1) value="0" checked
                                        @else value="1" @endif id="status">
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('admin.editproduct',['id' => $sale['id']])}}" type="button"
                                        class="btn btn-warning btn-sm"><i class="fas fa-search"></i></a>
                                    <a href="" data-url="{{route('admin.deleteproduct',['id' => $sale['id']])}}"
                                        type="button" class="btn btn-danger btn-sm action_delete"><i
                                            class="fas fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @elseif(request()-> type ==='selling')
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a href="{{route('admin.addproduct')}}" type="submit"
                                        class="btn btn-primary mr-sm-4">Thêm
                                        mới</a>
                                </li>
                                <li class="nav-item">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                            class="btn btn-warning mr-sm-4 dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Sản Phẩm Bán Chạy
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="dropdown-item"
                                                href="{{route('admin.viewproduct'). '?type=sale'}}">Sản
                                                Phẩm Khuyến Mại</a>
                                            <a class="dropdown-item" href="{{route('admin.viewproduct')}}">Tất Cả Sản
                                                Phẩm</a>
                                            <a class="dropdown-item"
                                                href="{{route('admin.viewproduct') . '?type=inventory'}}">Hàng Tồn
                                                Kho</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.export_sellingproduct')}}" type="submit"
                                        class="btn btn-danger mr-sm-4"> Export</a>
                                </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0" action=" {{route('admin.productSearch')}}"
                                method="POST">
                                @csrf
                                <input class="form-control @error('data_search') is-invalid @enderror" type="text"
                                    placeholder="Nhập tên sản phẩm" name="data_search">

                                <button class="btn btn-outline-success" type="submit"
                                    href="{{route('admin.productSearch')}}">Tìm</button>
                            </form>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Đã Bán</th>
                                <th>Tên Sản Phẩm </th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Hình Ảnh</th>
                                <th>Hiện/Ẩn</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listProductSelling as $sale)
                            <tr>
                                <td>{{$sale['id']}}</td>
                                <td>{{$sale['count']}}</td>
                                <td>{{$sale['name']}}</td>
                                <td>
                                    @if($sale['price'] ==$sale['price_sale'] || $sale['price_sale'] == null || $mytime >
                                    $sale['end_sale'])
                                    {{number_format($sale['price'])}}
                                    @else
                                    <del>{{number_format($sale['price'])}}</del>
                                    <br>
                                    {{number_format($sale['price_sale'])}}
                                    @endif
                                </td>

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
                                    {{number_format($sale['quantity'])}}
                                </td>
                                <td><img class="image-product-150-100" src="{{$sale['feature_image_path']}}"></td>
                                <td>
                                    <form method="POST" action="">
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="{{$sale['id']}}">
                                        <input class="check_status"
                                            data-url="{{route('admin.editstatus',['id' => $sale['id']])}}"
                                            type="checkbox" name="status" @if($sale['status']==1) value="0" checked
                                            @else value="1" @endif id="status">
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('admin.editproduct',['id' => $sale['id']])}}" type="button"
                                        class="btn btn-warning btn-sm"><i class="fas fa-search"></i></a>
                                    <a href="" data-url="{{route('admin.deleteproduct',['id' => $sale['id']])}}"
                                        type="button" class="btn btn-danger btn-sm action_delete"><i
                                            class="fas fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
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

@endsection
