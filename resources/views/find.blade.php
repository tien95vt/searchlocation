@extends('layouts.master')
@section('content')

<!-- END PHẦN HEADER -->
<!-- BẮT ĐẦU PHẦN CONTENT -->
<?php
$arrayKey = array("AIzaSyAjsicLOeEsQfdF-rcc9_QBrxP7PCZrz58", "AIzaSyDM4ohGC07gP8rsJPC3-BkPOfLqSKgaQvU", "AIzaSyDM59TDUtqoRyJ2sSdGXf97qCfLvfvB6uk", "AIzaSyD09hk8tNuDaJT7JdDu7NYLjSMdxdAt_6U", "AIzaSyBdG28rxjxq78b9162r9YpfINWyzGefSys", "AIzaSyA_cKC7YzUfwQvC7nVYMgB8Gcupt5BAE8k", "AIzaSyB_Ae2YS9wkPDGGA3YpYX5Q7Sxlv-9npp0");	//6
$key = $arrayKey[2];	//3

?>


<header class="header" style="position: fixed; box-shadow: none;">
	<style>
	.navbar-default{
			/*background-color: transparent;
			border-color: transparent;*/
			margin-bottom: -10px;
		}
		
	</style>
	<div class="row" style="background-color: #ECF0F1;background-size: cover;background-repeat: no-repeat;">
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
					<d
					v class="collapse navbar-collapse navbar-ex1-collapse">
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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="img-circle img-profile-sm"  src="{{asset('upload/picture/profile/').'/'.$user->profile->avatar}}" alt=""><span style="padding-left: 0.5em"></span>{{Auth::user()->name}} <b class="caret"></b></a>
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
			</nav>

			<div class="row">
				<form action="{{route('getFind')}}" method="get" id="timkiem">
					<div class="col-md-12 hide-search row">
						<div class="search col-md-10 col-md-offset-1">
							<div class="col-sm-5 col-xs-12 col-md-5">
								<div style="border: 3px solid rgba(0, 0, 0, .1);" class="input-group">
									<input type="text" class="customtextbox form-control" value="{{old('positionName')}}" name="positionName" id="tenvitri" placeholder="<?php if($ogrigin != null) echo $ogrigin; else echo "Tìm kiếm..."; ?>"">
									<input type="hidden" id="vitri"  name="vitri">
									<span class="input-group-btn">
										<button style="background-color: #317E8C" class="btn btn-secondary custombtn" id="getPosition" type="button"><span class="glyphicon glyphicon-map-marker"  style="color: #fff"></span></button>
									</span>
								</div>
							</div>
							<div class="search-icon col-sm-4 col-xs-12 col-md-4">
								<div style="border: 3px solid rgba(0, 0, 0, .1);" class="input-group">
									<input type="text" class="customtextbox form-control" value="{{old('keyword')}}" name="keyword" placeholder="<?php if($keyword != null) echo $keyword; else echo "Vị trí..."; ?>" id="keyword">
									<span class="input-group-btn">
										<button style="background-color: #317E8C" class="btn btn-secondary custombtn" type="button" id="search"><span class="glyphicon glyphicon-search" style="color: #fff"></span></button>
									</span>
								</div>
							</div>
							<div class="search_radius col-sm-3 col-xs-12 col-md-3">
								<div style="border: 3px solid rgba(0, 0, 0, .1);" class="input-group">
									<input type="number" class="customtextbox form-control" value="" name="radius_name" placeholder="Bán kính cần tìm (km)" min="0.5" max="20" id="radius_id">
									<span class="input-group-btn">
										<button style="background-color: #317E8C" class="btn btn-secondary custombtn" type="button" id="search_radius"><span class="glyphicon glyphicon-search" style="color: #fff"></span></button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</form>

				<!-- END SEACH -->


				<!-- END PHẦN FOUR BANNER -->	
			</div>
		</div>
	</div>
</header>
<section class="content-container">
	<div class="small-gap row">
		<div class="col-md-12">
			<div id="menu-right" class="col-md-7 sidebar-right" style="padding-top: 150px;" >
				<div class="col-md-12 realdata">
					<div class="col-md-12 no-padding detail">
						<?php
						$web = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$vitri.'&radius='.$radius.'&keyword='.$keyword.'&key='.$key;
						$web = str_replace(' ','-',$web);
						error_reporting(0);
						  // thực thi file_get_contents
						$url = file_get_contents($web);
						// print_r($url);
						$xml = json_decode($url,true);
						// $latLongArray = mảng Lat Lng sau khi tìm kiếm
						// 0:lat, 1:lng, 2:photo, 3:name, 4:address
						$latLongArray = [[[[[]]]]];
						array_shift($latLongArray); //Xóa phần tử đầu
						foreach ($xml['results'] as $value) {
 // Xóa thử phần khoảng cách và time
							$lat = $value['geometry']['location']['lat'];
							$long = $value['geometry']['location']['lng'];
							$end = $lat.','.$long;
							// kiểm tra xem có photo ko;
							if(array_key_exists('photos', $value))	//có photo
							{
								foreach($value['photos'] as $arrPhoto)
								{
									$photo = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$arrPhoto['photo_reference']."&key=".$key;
								}
							}
							else
							{
								$photo = "../public/images/pic_result_default.jpg";
							}

							$arr = array($lat, $long, $photo, $value['name'], $value['vicinity']);
							array_push($latLongArray, $arr);
							?>
							
							<div class="col-md-4 size-product">
								<div class="product-item" id="{{$end}}" >
									<div class="pi-img-wrapper">
										<img src="<?php echo $photo; ?>" width="100%" height="150px" alt="Cửa Hàng Bánh Ngọt" style="overflow: hidden;">
										<div>
											<a href="direct/{{$vitri}}/{{$end}}/{{$ogrigin}}/{{$value['name']}}" class="btn">Chỉ đường</a>
										</div>
									</div>
									
									<div class="col-md-12">
										<div style="margin-top: 5px ;text-align: center;"> <a style="font-size: 20px;font-style: bold;" href="#"><?php echo $value['name']; ?></a></div>

										<div style="margin-top: 5px;"><i class="fa fa-map-marker icon-color-coffee"></i> <a href="direct/{{$vitri}}/{{$end}}/{{$ogrigin}}/{{$value['name']}}"><?php echo $value['vicinity']; ?></a></div>

									</div>

								</div>
							</div>
							<?php
							
						}
						?>
						<!-- END PHẦN LIST ITEM -->

					</div>
					<!-- LIST 2 -->
				</div>
				<!-- LIST 2 -->
			</div>
			<div id="menu-left" class="col-md-5 no-padding sidebar-left" style="background-color: blue">
				{{-- Map và danh sách marker --}}
				<div id="map_index" style="background-color: blue; width: 100%; height: 100%">

				</div>

				<!-- End phan side -->
			</div>

		</div>
	</div>
	
</section>

{{-- Load map sau khi tìm kiếm --}}
<script>
	// json_encode => string Lat, Long => 102, 231
	var centerLatLng = <?php echo (json_encode($vitri)); ?>;
	if(centerLatLng != "")
	{
		var splitCenter = centerLatLng.split(',');
		var centerLat = Number(splitCenter[0]);
		var centerLong = Number(splitCenter[1]);
 		// alert(centerLong);
 		// biến thành mảng javascript [][] 
 		var latLongArrayJs = <?php echo json_encode($latLongArray); ?>;
 		// Load map 	
 		var uluru = {lat: centerLat, lng: centerLong};
 		var map = new google.maps.Map(document.getElementById('map_index'), {
 			zoom: 13,
 			center: uluru
        // gestureHandling: 'greedy'
    });
        // danh sách marker
        for(var i=0; i<latLongArrayJs.length; i++)
        {
        	var iconBase = '../public/images/information.png';
        	var marker = new google.maps.Marker({
        		position: new google.maps.LatLng(latLongArrayJs[i][0], latLongArrayJs[i][1]),
        		animation: google.maps.Animation.DROP,
        		map: map,
        		icon: {
        			path: google.maps.SymbolPath.CIRCLE,
        			scale: 10,
        			strokeColor: '#317E8C'
        		}, 
        		photoMk: latLongArrayJs[i][2] ,
        		nameMk: latLongArrayJs[i][3],
        		addressMk: latLongArrayJs[i][4]
        	});
        	var at = latLongArrayJs[i][2];
        	google.maps.event.addListener(marker, 'click', function () {
        		infowindow.setContent( '<div style="margin-top: 5px; text-align: center;"> <img width="100%" height="100px" src=" ' + this.photoMk + ' "> </div>'+ '<div style="margin-top: 5px ;text-align: center; font-size: 20px;font-style: bold;">'+this.nameMk+ '</div>'+'<div style="margin-top: 5px; text-align: center;">'+this.addressMk+ '</div>');
        		infowindow.setOptions({maxWidth:250});
        		infowindow.open(map, this);
        	});
        	infowindow = new google.maps.InfoWindow();
        }

        // marker center
        var markerCenter = new google.maps.Marker({
        	position: uluru,
        	map: map,
        	icon: {
        		path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
        		scale: 8,
        		strokeColor: 'gold'
        	}
        });


        // Array Marker
        var markerArray ={};
        // Rê chuột vào kết quả tìm kiếm hiển thị marker
        $(document).ready(function(){
        	$(".product-item").mouseover(function(){
        		var mouseLatLng = $(this).attr('id');
        		mouseLatLng = mouseLatLng.split(',');
        		var mouseLat = Number(mouseLatLng[0]);
        		var mouseLng = Number(mouseLatLng[1]); 
        		// Tạo marker
        		addNewmaker(mouseLat, mouseLng);
        	});
        });
        function addNewmaker(lat, lng){
        	var posNew = {lat: lat, lng: lng};
        	var markerNew = new google.maps.Marker({
        		position: posNew,
        		map: map,
        	});
        	// delete marker khi rê chuột ra
        	$(".product-item").mouseout(function(){
        		markerNew.setMap(null);
        	});
        }
    }
    
</script>
<!-- XONG PHẦN CONTENT -->
@endsection

