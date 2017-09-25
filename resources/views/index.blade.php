@extends('layouts.master')
@section('content')
	<header class="header">
<div class="row" style="background-image: url('images/item-1.jpg');background-size: cover;background-repeat: no-repeat;">
	<canvas id="constellationel"></canvas>
	<div class="col-md-12" style="z-index: 200">
		<div style=" position: absolute;height: 100%;width: 100%;opacity: 0.4;"></div>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button id="menu" type="button" class="navbar-toggle" data-toggle="collapse"><span class="glyphicon glyphicon-align-justify"></span></button>

					<button type="button" id="hide-toggle" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" style="font-family: 'Monoton', cursive;font-size: 30px;" href="#">ITFood</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<!-- <li><a href="#">Link</a></li> -->
					</ul>
					<ul class="nav navbar-nav navbar-right">
						{{-- Begin thông tin user --}}
						@if(Auth::check())
						{{-- biến $user --}}
						@php
						$user = App\User::find(Auth::user()->id);
						@endphp
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img width="25em" height="20em"  src="{{asset('upload/picture/profile/').'/'.$user->profile->avatar}}" alt=""><span style="padding-left: 0.5em"></span>{{Auth::user()->name}} <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
								<a href="{{asset('profile')}}/{{Auth::user()->id}}"><i class="fa fa-user" aria-hidden="true"></i><span style="padding-left: 1.5em">Thông Tin Cá Nhân</span></a>
								</li>

								<li>
								<a href="{{asset('profile')}}/{{Auth::user()->id}}"><i class="fa fa-cog" aria-hidden="true"></i><span style="padding-left: 1.5em">Cập Nhật Thông Tin Cá Nhân</span></a>
								</li>

								<li><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i><span style="padding-left: 1.5em">Logout</span></a></li>
							</ul>
						</li>
						<li style="margin-top: 10px;"><button class="btn btn-success"><a href="add_post" style="color:white">Đăng Bài</a></button></li>
						@else
						{{-- End thông tin user --}}
						<li><a href="register_form">Đăng Ký</a></li>
						<li><a href="login_form">Đăng Nhập</a></li>
						<li style="margin-top: 10px;"><button class="btn btn-success"><a href="add_post" style="color:white">Đăng Bài</a></button></li>
						@endif
						@if(session('No_Category'))
							<p id="123"></p>
						@endif
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>

		<div class="row">
			<div class="col-md-12">
				<center><h2 style="color: #fff;font-size: 24px;font-weight: 600;">TÌM KIẾM XUNG QUANH BẠN</h2></center>
			</div>
		</div>

		<form action="{{route('getPosition')}}" method="get">
			<div class="hide-search row">
			<div class="search col-md-6 col-md-offset-3">
				<div class="search-icon col-sm-6 col-xs-12">
					<div class="input-group">
				      <input type="text" class="form-control" value="{{old('keyword')}}" name="keyword" placeholder="Tìm Kiếm..." id="keyword">
				      <span class="input-group-btn">
				        <button  class="btn btn-secondary" type="submit" id="search"><span class="glyphicon glyphicon-search" ></span></button>
				      </span>
				    </div>
				</div>

				<div class="col-sm-6 col-xs-12">
					<div class="input-group">
				      <input type="text" class="form-control" value="{{old('positionName')}}" name="positionName" id="tenvitri" placeholder="Vị trí...">
				      <input type="hidden" id="vitri"  name="vitri">
				      <span class="input-group-btn">
				        <button class="btn btn-secondary" id="getPosition" type="button"><span class="glyphicon glyphicon-map-marker"></span></button>
				      </span>
				    </div>
				</div>
			</div>
		</div>
		</form>

		<!-- END SEACH -->

		<div class="hide-banner row">
			<div class="col-md-offset-3 col-md-6 col-md-offset-3" style="margin-top: 30px;margin-bottom: 30px;color: #fff">
				<div class="col-sm-3 col-xs-3">
					<div class="fourbanner">
						<div style="margin-top: -8px;">
							<img src="{{asset('images/1.png')}}" class="img-responsive">
						</div>
						<div>
							<p style="font-weight: bold;">Cam kết giá thấp nhất</p>
						</div>
					</div>

				</div>

				<div class="col-sm-3 col-xs-3">
					<div class="fourbanner">
						<div>
							<img src="{{asset('images/2.png')}}" class="img-responsive">
						</div>
						<div>
							<p style="font-weight: bold;">Nhiều sự lựa chọn phù hợp</p>
						</div>
					</div>
				</div>


				<div class="col-sm-3 col-xs-3">
					<div class="fourbanner">
						<div>
							<img src="{{asset('images/3.png')}}" class="img-responsive">
						</div>
						<div>
							<p style="font-weight: bold;">Sẵn sàng hỗ trợ tư vấn</p>
						</div>
					</div>
				</div>


				<div class="col-sm-3 col-xs-3">
					<div class="fourbanner">
						<div>
							<img src="{{asset('images/4.png')}}" class="img-responsive">
						</div>
						<div>
							<p style="font-weight: bold;">Bảo vệ quyền lợi khách hàng</p>
						</div>
					</div>
				</div>


			</div>
		</div>

		<!-- END PHẦN FOUR BANNER -->	
	</div>
</div>
</header>
<!-- END PHẦN HEADER -->

<!-- BẮT ĐẦU PHẦN CONTENT -->

<section class="content-container">
	<div class="row">
		<div class="col-md-12">
			<div id="menu-right" class="col-md-9 sidebar-right" >
				<div class="col-md-12 realdata">
		            <div class="col-md-12 no-padding detail">
						<?php
						$web = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$vitri.'&radius=5000&keyword='.$keyword.'&key=AIzaSyClghS2aCQIm4eUUmp5Of53o6ETwUJyJqI';
						$web = str_replace(' ','-',$web);
						  error_reporting(0);
						    $url = file_get_contents($web);
						    $xml = json_decode($url,true);
						    foreach ($xml['results'] as $value) {
 // Xóa thử phần khoảng cách và time
						    	$lat = $value['geometry']['location']['lat'];
						    	$long = $value['geometry']['location']['lng'];
						    	$end = $lat.','.$long;
						    	// $urldistance = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$vitri."&destinations=".$end."&key=AIzaSyClghS2aCQIm4eUUmp5Of53o6ETwUJyJqI");

						    	// $getjson = json_decode($urldistance, true);
						    	// foreach ($getjson['rows'] as $getdistance) {
						    	// 	$distance = $getdistance['elements'][0]['distance']['value'];
    							// $tmp_duration = $getdistance['elements'][0]['duration']['text'];
    							// 	$duration = str_replace("mins", "Phút", $tmp_duration);
								   // }
// End Xóa thử Xóa thử phần khoảng cách và time
						      	foreach ($value['photos'] as $array) {
								    $photo = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$array['photo_reference']."&key=AIzaSyClghS2aCQIm4eUUmp5Of53o6ETwUJyJqI";
								    	
								  
						        ?>
								
						        <div class="col-md-3 size-product">
				            <div class="product-item">
					              <div class="pi-img-wrapper">
						                <img src="<?php echo $photo; ?>" width="200px" height="150px" alt="Cửa Hàng Bánh Ngọt" style="overflow: hidden;">
						                <div>
						                  <a href="direct/{{$vitri}}/{{$end}}/{{$ogrigin}}/{{$value['name']}}" class="btn">Chỉ đường</a>
						                </div>
					              </div>
					              
					              <div class="col-md-12" style="font-size: 14px;">
					              	<!-- <div style="height: 30px;margin-top: 10px;"><a class="course-title" href="shop-item.html">Bánh hiện đại</a></div> -->
					              	<div style="margin-top: 10px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <a href="#"><?php echo $value['name']; ?></a></div>

					              	<div style="margin-top: 5px;"><i class="fa fa-lg fa-map-marker icon-color-coffee"></i> <a href="direct/{{$vitri}}/{{$end}}/{{$ogrigin}}/{{$value['name']}}"><?php echo $value['vicinity']; ?></a></div>
{{-- khoảng cách thời gian --}}
					         {{--      	<div style="margin-top: 10px;"><i class="glyphicon glyphicon-road
" aria-hidden="true"></i> <a href="#">{{$distance/1000}} Km</a> <i class="glyphicon glyphicon glyphicon-hourglass" aria-hidden="true"></i> <a href="#"> {{$duration}}</a></div> --}}
{{-- End khoảng cách thời gian --}}

					              	<!-- <div style="margin-top: 10px;"><i class="glyphicon glyphicon glyphicon-hourglass" aria-hidden="true"></i> <a href="#">{{$duration}}</a></div> -->

					              </div>
					              <div class="sticker sticker-new"></div>

				            </div>
				        </div>
						        <?php
						      }
						    }
						?>
				        <!-- END PHẦN LIST ITEM -->

		            </div>
					<!-- LIST 2 -->
				</div>
<!-- LIST 2 -->
			</div>
			<div id="menu-left" class="col-md-3 no-padding sidebar-left">
				<div class="menu-left-fix">
					<div style="height: 60px;background: #FE5F55;">
						<p style="font-size: 16px;font-weight: bold;padding-left: 25px;color: #fff;padding-top: 20px;"> Bài viết mới nhất </p>
					</div>

					@foreach($post as $valuePost)
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-5 col-xs-5" style="height: 150px;padding: 0 0 0 5px;">
							<div class="info-image">
								<img src="{{asset('upload/picture/post/').'/'.$valuePost->photo }}" alt="" height="150px" width="100%" style="border-radius: 5px;">
							</div>
							
						</div>

						<div class="col-md-7 col-xs-7" style="height: 140px;">
							<div class="info-title">
								<a href="{{route('show_post')}}/{{$valuePost->id}}"><span>{{$valuePost->title}}</span></a>
							</div>
							<div class="address">
									<span class="fa fa-location-arrow locationicon"></span>
									<span>
										<a href=""><span>{{$valuePost->address}}</span></a>
									</span>
								</div>

								<div class="time-line">
									<span class="fa fa-clock-o houricon"></span>
									<span title=" | 09:00 AM - 10:00 PM">{{$valuePost->open_time}} - {{$valuePost->close_time}}</span>
								</div>

								<div class="price">
									<span class="fa fa-internet-explorer"></span>
									<a href="{{$valuePost->website}}"><span>{{$valuePost->website}}</span></a>
								</div>
							
						</div>
						</div>
					</div>
					<hr style="margin:10px 0 10px 0;">
					@endforeach
					
					<!-- End Item 1 -->
					<hr>
				</div>

				<!-- End phan side -->
			</div>

		</div>
	</div>
</section>

<!-- XONG PHẦN CONTENT -->
@endsection
