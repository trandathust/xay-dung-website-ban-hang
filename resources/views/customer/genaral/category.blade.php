					<div class="col-sm-3">
						<div class="left-sidebar">
							<h2>DANH MỤC SẢN PHẨM</h2>
							<div class="panel-group category-products" id="accordian">
								@foreach($listCategory as $item)
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="{{route('getCategory',['id' => $item -> id,'slug'=>$item ->slug])}}">{{$item -> name}}</a></h4>
									</div>
								</div>
								@endforeach

							</div><!--/category-products-->
							
							<div class="brands_products"><!--brands_products-->
								<h2>THƯƠNG HIỆU</h2>
								<div class="brands-name">
									<ul class="nav nav-pills nav-stacked">
										@foreach($listBrand as $item)
										<li><a href="{{route('getBrand',['id' => $item -> id, 'slug'=>$item ->slug])}}"> <span class="pull-right">(50)</span>{{$item ->  name}}</a></li>
										@endforeach
									</ul>
								</div>
							</div><!--/brands_products-->


							<div class="price-range"><!--price-range-->
								<h2>Tags</h2>
								<div class="well text-center">
									<h4> 
									@foreach($listTag as $item)
									<a href="{{route('getTag',['id'=>$item ->id])}}" class="background_tag">
										{{$item -> name}},
										</a>
										<br>
									@endforeach
								</h4>
								</div>
							</div><!--/price-range-->

							{{--  <div class="shipping text-center">
								<img src="images/home/shipping.jpg" alt="" />
							</div> --}}
							
						</div>
					</div>
