@extends('admin.admin_layout')
@section('title')
<title>Shop | Thêm Slider</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Thêm Slider'])
 <!-- /.content-header -->
 <div class="content justify-content-md-center">
  
  <form action="{{route('admin.postaddslider')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col form-group col-md-6">   
            <label for="InputName">Tên slider:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên slider" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col form-group col-md-6">   
            <label for="InputName">URL slider:</label>
            <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror" placeholder="Nhập đường link slider" value="{{old('url')}}">
            @error('url')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col form-group col-md-6">
            <div class="custom-file">
              <label >Ảnh slider:</label>
              <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" name="image_path" id="image_path">
              @error('image_path')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="col form-group col-md-6">
            <div class="checkbox">
              <label >Trạng Thái (Hiện/Ẩn):</label>
              <br>
              <input type="checkbox" value="1" name="status" id="status">
            </div>
          </div>
          <div class="col form-group col-md-12">
            <label for="comment">Mô tả slider</label>
            <textarea class="form-control @error('description') is-invalid @enderror " rows="10" name="description" id="description" placeholder="Mô tả slider..." value="{{old('description')}}"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row justify-content-md-center">
          <button type="submit" class="btn btn-primary btn-sm" >Thêm mới</button>
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

@endsection

@section('js')

@endsection