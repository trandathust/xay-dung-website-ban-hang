	<footer id="footer"><!--Footer-->
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Liên Hệ</h2>

							<table class="table table-borderless">
								<tbody>
									<tr>
										<th >Số Điện Thoại:</th>
										<td>@foreach($listSetting as $phone)
											@if($phone -> config_key =='phone_number')
											{{$phone -> config_value}}
											@else
											@endif
											@endforeach
										</td>
									</tr>
									<tr>
										<th >Email: </th>
										<td>
											@foreach($listSetting as $email)
											@if($email -> config_key =='email')
											{{$email -> config_value}}
											@else
											@endif
											@endforeach
										</td>
									</tr>
									<tr>
										<th scope="row">Địa Chỉ Shop:</th>
										<td >@foreach($listSetting as $address)
											@if($address -> config_key =='address')
											{{$address -> config_value}}
											@else
											@endif
										@endforeach</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Xem Nhanh</h2>
							<ul class="nav nav-pills nav-stacked">
								@foreach($listMenuFooterChilVIEW as $menu)
								<li><a href="{{$menu -> url}}">{{$menu -> name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Thông Tin</h2>
							<ul class="nav nav-pills nav-stacked">
								@foreach($listMenuFooterChilINFO as $menu)
								<li><a href="{{$menu -> url}}">{{$menu -> name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>

					<div class="col-sm-5">
						<div class="single-widget">
							<h2>Tìm Đến Cửa Hàng</h2>
							<?php
							foreach($listSetting as $google_map)
							if($google_map -> config_key =='google_map')
							
							echo($google_map -> config_value);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">
						@foreach($listSetting as $footer)
						@if($footer -> config_key =='footer')
						{{$footer -> config_value}}
						@else
						@endif
						@endforeach
					</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	