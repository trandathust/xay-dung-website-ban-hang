@extends('customer.layout')
@section('title')
<title>Bài Viết | Shop</title>
@endsection
@section('content')


<section>
    <div class="container">
        <div class="row">
            @include('customer.genaral.category')

            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">BÀI VIẾT MỚI NHẤT</h2>
                    @foreach($listBlog as $blog)
                    <div class="single-blog-post">
                        <div class="col-12">
                            <a href="{{route('getsingerblog',['id'=>$blog -> id , 'slug' =>$blog -> slug])}}"
                                style="color: #4f4f4f" target="_blank">
                                <h2>{{$blog -> title}}</h2>
                            </a>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i>{{optional($blog -> user) -> name}}</li>
                                    <li><i class="fa fa-clock-o"></i>{{$blog -> created_at -> format('H:m:s')}}</li>
                                    <li><i class="fa fa-calendar"></i>{{$blog -> created_at -> format('d.M.Y')}}</li>
                                </ul>
                                <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </span>
                            </div>
                            <a href="">
                                <img src="{{$blog -> title_image_path}}" alt="" class="image-blog">
                            </a>

                            <p>
                                <?php
									$content = $blog -> content ;
								  	$content = substr($content,0,500);
								  	echo($content);
								 ?>
                            </p>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-12">

                            <a class="btn btn-primary"
                                href="{{route('getsingerblog',['id'=>$blog -> id , 'slug' =>$blog -> slug])}}"
                                target="_blank"> Đọc Thêm</a>
                        </div>

                        <hr style="width:100%;text-align:left;margin-left:0;border: 3px solid;color: #FE980F">

                    </div>
                    @endforeach
                    <div class="pagination-area">
                        {{ $listBlog->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/customer/blog/blog.css')}}">

@endsection


@section('js')

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="{{asset('vendor/customer/cart/cart.js')}}"></script>

@endsection
