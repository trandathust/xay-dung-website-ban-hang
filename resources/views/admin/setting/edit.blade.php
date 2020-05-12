@extends('admin.admin_layout')
@section('title')
<title>Shop | Setting</title>
@endsection
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Main content -->
 <!-- Content Header (Page header) -->
 @include('admin.general.content-header',['name' => 'Cài Đặt'])
 <!-- /.content-header -->
 <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <form action="{{route('admin.editsetting',['id' => $setting -> id])}}">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12">   
                  <label for="InputName">Tên:</label>
                  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$setting -> name}}">
                  <input type="hidden"  id="id" class="form-control @error('name') is-invalid @enderror" value="{{$setting -> id}}">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <label for="InputName">Link:</label>
                  <input type="text" name="config_value" id="config_value" class="form-control @error('config_value') is-invalid @enderror" value="{{$setting -> config_value}}">
                  @error('config_value')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <label for="InputName">Icon FontAwesome:</label>
                  <input type="text" name="config_key" id="config_key" class="form-control @error('config_key') is-invalid @enderror" value="{{$setting-> config_key}}">
                  @error('config_key')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            @include('error.check_error')
            <div class="card-footer">
              <div class="row justify-content-md-center">
                <button data-url = "{{route('admin.editsetting',['id' => $setting -> id])}}"  class="btn btn-primary btn-sm btn-submit-icon">Lưu</button>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </form>
         <form id="insert_genaral" action="{{route('admin.posteditgenaral')}}">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12">   
                  <label>Tên Cửa Hàng:</label>
                  <input type="text" name="nameshop" id="nameshop" class="form-control @error('nameshop') is-invalid @enderror" value="{{$nameshop}}">
                  @error('nameshop')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <label for="InputName">Số điện thoại:</label>
                  <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Nhập số điện thoại" value="{{$phone}}">
                  @error('phone_number')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <label for="InputName">Email:</label>
                  <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="shop@email.com" value="{{$email}}">
                  @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <label>Địa Chỉ Cửa Hàng:</label>
                  <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{$address}}">
                  @error('address')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group col-md-12">   
                  <label for="InputName">Chân trang:</label>
                  <input type="text" name="footer" id="footer" class="form-control @error('footer') is-invalid @enderror" placeholder="Copyright © 2013 SHOP Inc. All rights reserved." value="{{$footer}}">
                  @error('footer')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <label >Phí Ship:</label>
                  <input type="text" name="feeship" id="feeship" class="form-control @error('feeship') is-invalid @enderror" placeholder="Nhập phí ship" value="{{$feeship}}">
                  @error('feeship')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <label>Goolge Map:</label>
                  <input type="text" name="google_map" id="google_map" class="form-control @error('google_map') is-invalid @enderror" value="{{$google_map}}">
                  @error('google_map')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group col-md-12">   
                  <?php echo($google_map)?>
                </div>
              </div>
            </div>
            @include('error.check_error')
            <div class="card-footer">
              <div class="row justify-content-md-center">
                <button data-url = "{{route('admin.posteditgenaral')}}" class="btn btn-primary btn-sm btn_submit_genaral">Lưu Lại</button>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </form>
        <form  action="{{route('admin.updatelogo')}}" method="post" id="upload_form" enctype="multipart/form-data" data-url="{{route('admin.updatelogo')}}">
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12">   
                  <label >Logo:</label>
                  <input type="file" name="select_file" id="select_file" class="form-control-file" />
                </div>
                <hr  width="100%" align="center" />
                <div class="form-group col-md-12">   
                  <img src="{{$logo}}">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row justify-content-md-center">
                <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload" >
              </div>
            </div>
          </div>
          <!-- /.card -->
        </form>
      </div>

      <!-- /.col-md-6 -->
      <div class="col-lg-6">
        <div class="card">
          {{-- <div class="card-header border-0 ">
              <h3 class="card-title">Danh sách nhân viên đang làm việc</h3>
            </div> --}}
            <div class="card-body">
             <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Tên</th>
                  <th>Link</th>
                  <th>Icon</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
                @foreach($listSetting as $row)
                @if($row -> config_key == 'phone_number' || $row -> config_key == 'email' || $row -> config_key == 'footer' || $row -> config_key == 'logo' || $row -> config_key == 'address' || $row -> config_key == 'google_map'|| $row -> config_key == 'feeship' || $row -> config_key == 'nameshop')
                @else
                <tr>
                  <td>{{$row -> name}}</td>
                  <td> {{$row -> config_value}}</td>
                  <td align="center"><i class="{{$row -> config_key}}"></i></td>
                  <td>
                    <a href="{{route('admin.editsetting',['id' => $row -> id])}}" class="btn btn-primary btn-sm" ><i class="fas fa-edit"></i></a>
                    <a href="" data-url ="{{route('admin.deletesetting',['id' => $row -> id])}}" type="button" class="btn btn-danger btn-sm action_delete"><i class="fas fa-times"></i></a>
                  </td>
                </tr>   
                @endif
                @endforeach            
              </tbody>
            </table> 
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
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
<link rel="stylesheet" type="text/css" href="{{asset('vendor/admin/setting/edit.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection




@section('js')
{{-- sweetalert2  --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="{{asset('vendor/admin/setting/delete.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/admin/setting/edit.js')}}"></script>



@endsection