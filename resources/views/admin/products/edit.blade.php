@extends('admin.admin_layout')
@section('title')
<title>Sửa sản phẩm</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Sửa Sản Phẩm'])
 <!-- /.content-header -->
 <div class="content justify-content-md-center">
  <form action="{{route('admin.posteditproduct',['id' => $product -> id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col form-group col-md-3">   
            <label for="InputName">Tên sản phẩm:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$product -> name}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col form-group col-md-3">   
            <label for="InputName">Giá sản phẩm:</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$product -> price}}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col form-group col-md-3">   
            <label for="InputName">Chọn nhà cung cấp:</label>
            <select class="form-control" name="supplierID">
              @foreach($listSupplier as $supplier)
              <option value="{{$supplier -> id}}"
                      {{ ($product->supplier_id==$supplier -> id)? "selected" : "" }}
                      >{{$supplier -> name}}</option>
              @endforeach
            </select>
          </div>

          <div class="col form-group col-md-3">   
            <label for="InputName">Số lượng sản phẩm:</label>
            <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" placeholder="Nhập số lượng sản phẩm" value="{{$product -> quantity}}" >
            @error('qty')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="col form-group col-md-3">   
            <label for="InputName">Kích cỡ:</label>
            <input type="text" name="size" class="form-control " value="{{$product -> size}}">
          </div>

          <div class="col form-group col-md-3">   
            <label for="InputName">Trọng lượng:</label>
            <input type="text" name="weight" class="form-control " value="{{$product-> weith}}">
          </div>

          <div class="col form-group col-md-3">   
            <label for="InputName">Chọn thương hiệu:</label>
            <select class="form-control " name="brandID">
              @foreach($listBrand as $brand)
              <option value="{{$brand -> id}}"
                      {{ ($product->brand_id==$brand -> id)? "selected" : "" }}
                      >{{$brand -> name}}</option>
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
            <input type="text" name="price_sale" class="form-control " placeholder="Nhập giá khuyến mại" value="{{$product -> price_sale}}">
          </div>

          <div class="col form-group col-md-3">   
            <label for="InputName">Thời gian bắt đầu khuyến mại:</label>
            <input type="date" name="start_sale" class="form-control " value="{{$product -> start_sale}}">
          </div>

          <div class="col form-group col-md-3">   
            <label for="InputName">Thời gian kết thúc khuyến mại:</label>
            <input type="date" name="end_sale" class="form-control " value="{{$product -> end_sale}}">
          </div>

          <div class="col form-group col-md-3">   
            <label for="InputName">Nhập tag cho sản phẩm:</label>
            <select class="form-control tag_select_choose" name="tags[]" multiple="multiple">
              @foreach($product->tags as $tagsItem)
              <option value="{{$tagsItem->name}}" selected>{{$tagsItem->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col form-group col-md-3">
            <div class="checkbox">
              <label >Trạng Thái (Hiện/Ẩn):</label>
              <br>
              <input type="checkbox" value="1" name="status" @if($product -> status ==1) checked @endif id="status">
            </div>
          </div>
          <div class="col form-group col-md-3">
            <div class="custom-file">
              <label >Ảnh chính:</label>
              <input type="file" class="form-control-file" name="feature_image_path" id="exampleFormControlFile1">
            </div>
            <div class="col-md-3">
              <img class="image-product-50-70" src="{{$product->feature_image_path}}">
            </div>
          </div>
          <div class="col form-group col-md-6">
            <div class="custom-file">
              <label>Ảnh chi tiết</label>
              <input type="file" class="form-control-file" multiple="multiple" name="image_path[]" id="exampleFormControlFile1">
            </div>
            <div class="col-md-12" >
              <div class="row">
                @foreach($product -> productImage as $productImageDetail)
                <div class="col-md-2">
                  <img class="image-product-50-70" src="{{$productImageDetail -> image_path}}">
                </div>
                @endforeach
              </div>
              
            </div>
          </div>

          <div class="col form-group col-md-12">
            <label for="comment">Mô tả sản phẩm</label>
            <textarea class="form-control tinymce_editor_init @error('detailSP') is-invalid @enderror" rows="10" name="detailSP">{{$product -> content}}</textarea>
            @error('detailSP')
            <div class="alert alert-danger error-messages">{{ $message }}</div>
            @enderror
          </div>

        </div>
      </div>
      @include('error.check_error')
      <div class="card-footer">
        <div class="row justify-content-md-center">
          <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-save"></i> Lưu</button>
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
<link rel="stylesheet" type="text/css" href="{{asset('vendor/admin/product/add/edit.css')}}">
@endsection

@section('js')
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('vendor/admin/product/add/add.js')}}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection