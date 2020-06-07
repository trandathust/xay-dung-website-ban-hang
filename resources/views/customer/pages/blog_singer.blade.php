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
                    <h2 class="title text-center">BÀI VIẾT</h2>
                    <div class="single-blog-post">
                        <h1>{{$dataBlog -> title}}</h1>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i>{{optional($dataBlog -> user) -> name}}</li>
                                <li><i class="fa fa-clock-o"></i>{{$dataBlog -> created_at -> format('H:m:s')}}</li>
                                <li><i class="fa fa-calendar"></i>{{$dataBlog -> created_at -> format('d.M.Y')}}</li>
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
                            <img src="{{$dataBlog -> title_image_path}}" alt="">
                        </a>
                        <?php echo($dataBlog -> content) ?>

                    </div>
                </div>
                <!--/blog-post-area-->

                <hr style="width:100%;text-align:left;margin-left:0;border: 3px solid;color: #FE980F">
                <div class="response-area">
                    <h2>BÌNH LUẬN</h2>
                    @foreach($listComment as $comment)
                    <ul class="media-list">
                        <li class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object image_avatar"
                                    src="{{optional($comment ->user) -> avatar_path }}" alt="">
                            </a>
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i>{{optional($comment ->user) -> name }}</li>
                                    <li><i class="fa fa-clock-o"></i>{{$comment -> created_at -> format('H:m:s')}}</li>
                                    <li><i class="fa fa-calendar"></i>{{$comment -> created_at -> format('d.M.Y')}}</li>
                                </ul>
                                <p>{{$comment-> comment}}</p>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>
                <!--/Response-area-->
                <div class="replay-box">
                    @if(auth()->check())
                    <form>
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="blank-arrow">
                                    <label>Họ và Tên</label>
                                </div>
                                <input type="text" style="color: black" value="{{auth()->user() -> name}}" readonly />
                            </div>
                            <div class="col-sm-12">
                                <div class="text-area">
                                    <div class="blank-arrow">
                                        <label>Bình Luận</label>
                                    </div>
                                    <textarea name="comment" id="comment" rows="5"
                                        placeholder="Viết bình luận..."></textarea>
                                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()-> id}}">
                                    <input type="hidden" name="blog_id" id="blog_id" value="{{$dataBlog-> id}}">
                                    <a class="btn btn-primary submit_comment" href=""
                                        data-url="{{route('blogcomment',['id'=>$dataBlog -> id])}}">Gửi</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                    <p><b>Bạn hãy <a href="{{route('customer.getLogin')}}">đăng nhập</a> để bình luận bài viết! </b></p>
                    @endif
                </div>
                <!--/Repaly Box-->
            </div>
        </div>
    </div>
</section>


@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/customer/blog/blog-singer.css')}}">

@endsection


@section('js')

{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="{{asset('vendor/customer/cart/cart.js')}}"></script>
<script type="text/javascript" src="{{asset('vendor/customer/blog/blog-singer.js')}}"></script>
@endsection
