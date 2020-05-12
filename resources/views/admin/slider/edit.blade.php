@extends('admin.admin_layout')
@section('title')
<title>Shop | Sửa Slider</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Sửa Slider'])
 <!-- /.content-header -->
 <div class="content justify-content-md-center">
  
  <form action="{{route('admin.posteditslider', ['id' => $slider -> id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col form-group col-md-6">   
            <label for="InputName">Tên slider:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$slider -> name}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col form-group col-md-6">   
            <label for="InputName">URL slider:</label>
            <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" value="{{$slider -> url}}">
            @error('url')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col form-group col-md-6">
            <div class="custom-file">
              <label >Ảnh slider:</label>
              <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" name="image_path" id="exampleFormControlFile1">
              @error('image_path')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
          </div>
          <div class="col form-group col-md-6">
            <div class="checkbox">
              <label >Trạng Thái (Hiện/Ẩn):</label>
              <br>
              <input type="checkbox" value="1" name="status" id="status" @if($slider-> status ==1) checked @endif>
            </div>
          </div>
          <div class="col-md-12">
              <img class="image_slider" src="{{$slider -> image_path}}">
          </div>
          <div class="col form-group col-md-12">
            <label for="comment">Mô tả slider</label>
            <textarea class="form-control  @error('description') is-invalid @enderror error-messages" rows="10" name="description" placeholder="Thông tin sản phẩm...">{{$slider -> description}}</textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      @include('error.check_error')
      <div class="card-footer">
        <div class="row justify-content-md-center">
          <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
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
<link rel="stylesheet" type="text/css" href="{{asset('vendor/admin/slider/edit.css')}}">
@endsection

@section('js')

@endsection