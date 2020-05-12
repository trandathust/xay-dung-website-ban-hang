	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach($listSlider as $slider)
							@if($loop -> first)
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							@endif
							@if(!($loop -> first))
							<li data-target="#slider-carousel" data-slide-to="{{$loop -> iteration}}"></li>
							@endif
							@endforeach
						</ol>
						<div class="carousel-inner">
							@foreach($listSlider as $slider)
							@if($loop -> first)
							<div class="item active">
								<div class="col-sm-6">
									{{-- <h1><span>E</span>-SHOPPER</h1> --}}
									<h2>{{$slider -> name}}</h2>
									<p>{{$slider -> description}}</p>
									<a href="{{$slider ->url}}" type="button" class="btn btn-default get">Xem Ngay</a>
								</div>
								<div class="col-sm-6">
									<img src="{{$slider -> image_path}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							@endif
							@if(!($loop -> first))
							<div class="item ">
								<div class="col-sm-6">
									{{-- <h1><span>E</span>-SHOPPER</h1> --}}
									<h2>{{$slider -> name}}</h2>
									<p>{{$slider -> description}}</p>
									<a href="{{$slider ->url}}" type="button" class="btn btn-default get">Xem Ngay</a>
								</div>
								<div class="col-sm-6">
									<img src="{{$slider -> image_path}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							@endif
							@endforeach
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	

