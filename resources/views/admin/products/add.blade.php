@extends('admin.admin_layout')
@section('title')
<title>Thêm sản phẩm</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Thêm Sản Phẩm'])
 <!-- /.content-header -->
 <div class="content justify-content-md-center">
  
  <form action="{{route('admin.postaddproduct')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col form-group col-md-3">   
            <label for="InputName">Tên sản phẩm:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên sản phẩm" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col form-group col-md-3">   
            <label for="InputName">Giá sản phẩm:</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Nhập giá sản phẩm" value="{{old('price')}}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col form-group col-md-3">   
            <label for="InputName">Chọn nhà cung cấp:</label>
            <select class="form-control" name="supplierID">
              @foreach($listSupplier as $supplier)
              <option value="{{$supplier -> id}}">{{$supplier -> name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col form-group col-md-3">   
            <label for="InputName">Số lượng sản phẩm:</label>
            <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror " placeholder="Nhập số lượng sản phẩm" value="{{old('qty')}}">
            @error('qty')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col form-group col-md-3">   
            <label for="InputName">Kích cỡ:</label>
            <input type="text" name="size" class="form-control " value="{{old('size')}}">
          </div>
          <div class="col form-group col-md-3">   
            <label for="InputName">Trọng lượng:</label>
            <input type="text" name="weight" class="form-control " value="{{old('weight')}}">
          </div>
          <div class="col form-group col-md-3">   
            <label for="InputName">Chọn thương hiệu:</label>
            <select class="form-control" name="brandID">
              @foreach($listBrand as $brand)
              <option value="{{$brand -> id}}">{{$brand -> name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col form-group col-md-3">   
            <label for="InputName">Chọn danh mục:</label>
            <select class="form-control" name="categoryID">
              <option value="0">Danh Mục Gốc</option>
              {!!$htmlOption!!}
            </select>
          </div>
          <div class="col form-group col-md-3">   
            <label for="InputName">Giá khuyến mại:</label>
            <input type="text" name="price_sale" class="form-control " placeholder="Nhập giá khuyến mại" value="{{old('price_sale')}}">
          </div>
          <div class="col form-group col-md-3">   
            <label for="InputName">Thời gian bắt đầu khuyến mại:</label>
            <input type="date" name="start_sale" class="form-control " value="{{old('start_sale')}}">
          </div>
          <div class="col form-group col-md-3">   
            <label for="InputName">Thời gian kết thúc khuyến mại:</label>
            <input type="date" name="end_sale" class="form-control " value="{{old('end_sale')}}">
          </div>
          
          <div class="col form-group col-md-3">   
            <label for="InputName">Nhập tag cho sản phẩm:</label>
            <select class="form-control tag_select_choose" name="tags[]" multiple="multiple">
            </select>
          </div>
          <div class="col form-group col-md-3">
            <div class="checkbox">
              <label >Trạng Thái (Hiện/Ẩn):</label>
              <br>
              <input type="checkbox" value="1" name="status" id="status">
            </div>
          </div>
          <div class="col form-group col-md-3">
            <div class="custom-file">
              <label >Ảnh chính:</label>
              <input type="file" class="form-control-file" name="feature_image_path" id="exampleFormControlFile1">
            </div>
          </div>
          <div class="col form-group col-md-6">
            <div class="custom-file">
              <label>Ảnh chi tiết</label>
              <input type="file" class="form-control-file" multiple="multiple" name="image_path[]" id="exampleFormControlFile1">
            </div>
          </div>
          <div class="col form-group col-md-12">
            <label for="comment">Mô tả sản phẩm</label>
            <textarea class="form-control tinymce_editor_init error-messages" rows="10" name="detailSP" placeholder="Thông tin sản phẩm..." value="{{old('detailSP')}}"></textarea>
            
          </div>
        </div>
      </div>
      @include('error.check_error')
      <div class="card-footer">
        <div class="row justify-content-md-center">
          <button type="submit" class="btn btn-primary btn-sm"> <i class="far fa-save">  </i> Thêm mới</button>
        </div>
      </div>
    </div>
  </form>

</div>
<!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
@endsection


@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('vendor/admin/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('vendor/admin/product/add/add.js')}}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection