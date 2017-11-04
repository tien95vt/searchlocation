@extends('layouts.master')
@section('content')
<header class="header">
	<style>
	.navbar-transparent{
		background-color: transparent;
		border-color: transparent;
		position: fixed;
		width: 100%;
		z-index: 1000000000;
		border-radius:none;

	</style>

	<div class="row" style="background-image: url('images/bg3.jpg');background-size: cover;background-repeat: no-repeat;">
		<canvas id="constellationel"></canvas>
		<div class="col-md-12" style="z-index: 200">
			<div style=" position: absolute;height: 100%;width: 100%;opacity: 0.4;"></div>
			<nav class="navbar-default navbar-transparent" role="navigation">
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
						{{-- <a class="navbar-brand" href="#"><img style="text-align: center;" src="./images/logo-small.png" alt="logo"></a> --}}
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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="img-circle img-profile-sm"  src="{{asset('upload/picture/profile/').'/'.$user->profile->avatar}}" alt=""><span style="padding-left: 0.5em"></span>{{Auth::user()->name}} <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{asset('profile')}}/{{Auth::user()->id}}"><i class="fa fa-user" aria-hidden="true"></i><span style="padding-left: 1.5em">Thông Tin Cá Nhân</span></a>
									</li>

									<li>
										<a href="{{asset('profile')}}/{{Auth::user()->id}}"><i class="fa fa-cog" aria-hidden="true"></i><span style="padding-left: 1.5em">Cập Nhật Thông Tin Cá Nhân</span></a>
									</li>

									<li><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i><span style="padding-left: 1.5em">Đăng xuất</span></a></li>
								</ul>
							</li>
							<li style="margin-top: 10px;"><button style="background-color: #317E8C;" class="btn"><a href="add_post" style="color:white">Đăng Bài</a></button></li>
							@else
							{{-- End thông tin user --}}
							<li><a style="color:white" href="register_form">Đăng Ký</a></li>
							<li><a style="color:white" href="login_form">Đăng Nhập</a></li>
							{{-- <li style="margin-top: 10px;"><button style="background-color: #317E8C;" class="btn"><a href="add_post" style="color:white">Đăng Bài</a></button></li> --}}
							@endif
							@if(session('No_Category'))


							<p id="123"></p>
							@endif
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>

			<div class="row row-first-page">
				<div class="first-page">
					<div class="col-md-12">
					<center>
						<img style="text-align: center;padding-bottom: 30px;" src="./images/logo-small.png" alt="logo">
						<h2 style="color: #fff;font-size: 26px;font-weight: 600;">TÌM KIẾM MỌI ĐỊA ĐIỂM XUNG QUANH BẠN</h2></center>

				</div>


				<form action="{{route('getFind')}}" method="get" id="timkiem">
					<div class="hide-search row">
						<div class="search col-md-8 col-md-offset-2">


							<div class="col-sm-4 col-xs-12">
								<div class="input-group border-div">
									<input type="text" style="height:60px;font-size: 18px;" class="customtextbox form-control" value="{{old('positionName')}}" name="positionName" id="tenvitri" placeholder="Vị trí">
									<input type="hidden" id="vitri"  name="vitri">
									{{-- check click lấy vị trí hiện tại --}}
									<input type="hidden" id="check_click"  name="check_click">
									<span class="input-group-btn">
										<button style="width: 60px; height:60px;font-size: 18px;" class="btn btn-secondary custombtn" id="getPosition" type="button"><span class="glyphicon glyphicon-map-marker"></span></button>
									</span>
								</div>
							</div>

							<div class="col-sm-4 col-xs-12">
								<div class="input-group  border-div">
									<input type="number" style="height:60px;font-size: 18px;" class="customtextbox form-control" value="" name="radius_name" placeholder="Bán kính (km)" min="0.5" max="20" id="radius_id">
									<span class="input-group-btn">
										<button  style="width: 60px; height:60px;font-size: 18px;" class="btn btn-secondary custombtn" type="button" id="search_radius"><span class="glyphicon glyphicon-transfer"></span></button>
									</span>
								</div>
							</div>

							<div class="search-icon col-sm-4 col-xs-12">
								<div class="input-group border-div">
									<input type="text" style="height:60px;font-size: 18px;" class="customtextbox form-control" value="{{old('keyword')}}" name="keyword" placeholder="Nội dung tìm" id="keyword">
									<span class="input-group-btn">
										<button  style="width: 60px; height:60px;font-size: 18px;" class="btn btn-secondary custombtn" type="button" id="search"><span class="glyphicon glyphicon-search" ></span></button>
									</span>
								</div>
							</div>
						</div>
					</div>
				</form>

				<!-- END SEACH -->

				<div class="hide-banner row">
					<div class="col-md-offset-3 col-md-6 col-md-offset-3" style="padding-top: 50px;margin-top: 30px;margin-bottom: 30px;color: #fff">
						<div class="col-sm-3 col-xs-3">
							<div class="fourbanner">
								<center>
									<div style="margin-top: 0px">
										{{-- <img src="{{asset('images/1.png')}}" class="img-responsive"> --}}
										<i class="fa fa-map-marker fa-3x" aria-hidden="true"></i>
									</div>
									<div>
										<p style="font-weight: bold;">Tìm kiếm bất cứ đâu</p>
									</div>
								</center>
							</div>

						</div>

						<div class="col-sm-3 col-xs-3">
							<div class="fourbanner">
								<center>
									<div>
										{{-- <img style="align-items: center" src="{{asset('images/2.png')}}" class="img-responsive"> --}}
										<i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i>
									</div>
									<div>
										<p style="font-weight: bold;">Nhiều sự lựa chọn phù hợp</p>
									</div>
								</center>
							</div>
						</div>


						<div class="col-sm-3 col-xs-3">
							<center>
								<div class="fourbanner">
									<div>
										{{-- <img src="{{asset('images/4.png')}}" class="img-responsive"> --}}
										<i class="fa fa-comments-o fa-3x" aria-hidden="true"></i>
									</div>
									<div>
										<p style="font-weight: bold;">Cộng đồng đánh giá khách quan</p>
									</div>
								</div>
							</center>
						</div>


						<div class="col-sm-3 col-xs-3">
							<div class="fourbanner">
								<center>
									<div>
										{{-- <img style="align-items: center" src="{{asset('images/3.png')}}" class="img-responsive"> --}}
										<i class="fa fa-thumbs-o-up fa-3x" aria-hidden="true"></i>
									</div>
									<div>
										<p style="font-weight: bold;">Hoàn toàn miễn phí</p>
									</div>
								</center>
							</div>
						</div>
					</div>
				</div>

				</div>
				
				<!-- END PHẦN FOUR BANNER -->	
			</div>
		</div>
	</div>
</header>
<!-- END PHẦN HEADER -->

<!-- BẮT ĐẦU PHẦN CONTENT -->
<section>	
	<h1 class="text-center">DANH SÁCH CÁC BÀI POST</h1>	
	<div class="panel-group">
		{{-- Post nhà hàng --}}
		<div class="panel panel-primary " style="margin: 20px;">
			<div class="panel-heading page1_focus">NHÀ HÀNG </div>
			<div class="panel-body content_ajax_pageA">
				@php $breakRow = 1; @endphp
				<div class="row" style="margin: 5px;">
					@foreach($postNhahang as $valuePostNhaHang)
					<div class="col-xs-12 col-md-3" style="word-wrap: break-word; padding: 10px;">
						<div class="post_item">
							<div class="row">
								<div class="col-md-12">
									<img src="{{asset('upload/picture/post/'). '/'. $valuePostNhaHang->photo}}" alt="no_pic" height="150px" width="100%">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 title_post" >
									<h4>{{$valuePostNhaHang->title}}</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-globe" aria-hidden="true"></i><a href="" class="space_left">{{$valuePostNhaHang->website}}</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-hourglass-half" aria-hidden="true"></i>
									{{$valuePostNhaHang->open_time}} - {{$valuePostNhaHang->close_time}}
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-phone-square" aria-hidden="true" style="margin-right: 5px"></i>{{$valuePostNhaHang->phone}}
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-location-arrow" aria-hidden="true" style="margin-right: 5px"></i>{{$valuePostNhaHang->address}}
								</div>
							</div>
						</div>
					</div>
					@if($breakRow%4 == 0)
				</div> <div class="row" style="margin: 10px;">
					@endif
					@php $breakRow++ ; @endphp
					@endforeach
				</div>
				<div class="text-center pageA">{{$postNhahang->appends(array_except(Request::query(), 'page'))->links()}}</div>
			</div>
		</div>
		<div class="panel panel-primary" style="margin: 20px;">
			<div class="panel-heading">KHÁCH SẠN</div>
			<div class="panel-body content_ajax_pageB">
				@php $breakRow = 0; @endphp
				<div class="row" style="margin: 5px;">
					@foreach($postKhachSan as $valuePostKhachSan)
					<div class="col-xs-12 col-md-3" style="word-wrap: break-word; padding: 10px;">
						<div class="post_item">
							<div class="row">
								<div class="col-md-12">
									<img src="{{asset('upload/picture/post/'). '/'. $valuePostKhachSan->photo}}" alt="no_pic" height="150px" width="100%">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 title_post" >
									<h4>{{$valuePostKhachSan->title}}</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-globe" aria-hidden="true"></i><a href="" class="space_left">{{$valuePostKhachSan->website}}</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-hourglass-half" aria-hidden="true"></i>
									{{$valuePostKhachSan->open_time}} - {{$valuePostKhachSan->close_time}}
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-phone-square" aria-hidden="true" style="margin-right: 5px"></i>{{$valuePostKhachSan->phone}}
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-location-arrow" aria-hidden="true" style="margin-right: 5px"></i>{{$valuePostKhachSan->address}}
								</div>
							</div>
						</div>
					</div>
					@if($breakRow==3)
				</div> <div class="row" style="margin: 10px;">
					@endif
					@php $breakRow++ ; @endphp
					@endforeach
				</div>
				<div class="text-center pageB">{{$postKhachSan->appends(array_except(Request::query(), 'other_page'))->links()}}</div>
			</div>
		</div>

	</div>		



</section>

<script>
	// Ajax pagination A
	$(document).ready(function() {
		$(document).on('click', '.pageA .pagination a',function(e){
			e.preventDefault();	//Dừng refresh page
			var page = $(this).attr('href').split('pagination_a=')[1];
			getProduct(page);
		});
	});

	function getProduct(page){
		$.ajax({
			url: 'ajax/product_pageA?pagination_a='+ page //?pagination_a => Quan trọng
		}).done(function(data){
			// console.log(data);
			$(".content_ajax_pageA").html(data);
		});
	}
	// End Ajax pagination A
	// // Ajax pagination B
	$(document).ready(function() {
		$(document).on('click', '.pageB .pagination a', function(e){
			e.preventDefault();
			var pageB = $(this).attr('href').split('pagination_b=')[1];
			getProductPageB(pageB);
		});
	});
	function getProductPageB(pageB){
		$.ajax({
			url: 'ajax/product_pageB?pagination_b='+ pageB	//?pagination_b => Quan trọng
		}).done(function(data){
			// console.log(data);
			$(".content_ajax_pageB").html(data);
		});
	}
	// End  Ajax pagination B
</script>

<!-- XONG PHẦN CONTENT -->
@endsection



