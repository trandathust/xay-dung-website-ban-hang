@extends('admin.admin_layout')
@section('title')
<title>Sửa Bài Viết</title>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    @include('admin.general.content-header',['name' => 'Sửa Bài Viết'])
    <!-- /.content-header -->
    <div class="content justify-content-md-center">

        <form action="{{route('admin.posteditblog',['id'=>$dataBlog -> id])}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col form-group col-md-12">
                            <label for="InputName">Tiêu đề bài viết:</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Nhập tiêu đề"
                                value="{{$dataBlog -> title}}">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col form-group col-md-6">
                            <div class="custom-file">
                                <label>Ảnh tiêu đề:</label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                    name="image">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="col form-group col-md-2">
                            <div class="checkbox">
                                <label>Trạng Thái (Hiện/Ẩn):</label>
                                <br>
                                <input type="checkbox" value="1" name="status" id="status" @if($dataBlog -> status ==1)
                                checked @endif>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <img class="image_title_blog" src="{{$dataBlog -> title_image_path}}">
                        </div>
                        <hr width="30%" align="center" />
                        <div class="col form-group col-md-12">
                            <label>Nội dung:</label>
                            <textarea
                                class="form-control tinymce_editor_init error-messages @error('title') is-invalid @enderror"
                                rows="15" name="content"
                                placeholder="Nội dung bài viết...">{{$dataBlog -> content}}</textarea>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                @include('error.check_error')
                <div class="card-footer">
                    <div class="row justify-content-md-center">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="far fa-save"> </i> Lưu</button>
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
<link href="{{asset('vendor/admin/blog/edit.css')}}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('vendor/admin/blog/add.js')}}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection
