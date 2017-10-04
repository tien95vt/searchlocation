@extends('layouts.master')
@section('content')
	<header class="header">
		<style>
			.navbar-default{
			background-color: transparent;
			border-color: transparent;
		</style>
<div class="row" style="background-image: url('images/bg.jpg');background-size: cover;background-repeat: no-repeat;">
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
				</div>
			</nav>

		<div class="row">
			<div class="col-md-12">
				<center><h2 style="color: #fff;font-size: 30px;font-weight: 600;">TÌM KIẾM XUNG QUANH</h2></center>

			</div>


		<form action="{{route('getFind')}}" method="get" id="timkiem">
			<div class="hide-search row">
			<div class="search col-md-6 col-md-offset-3">
				

				<div class="col-sm-6 col-xs-12">
					<div class="input-group border-div">
				      <input type="text" class="customtextbox form-control" value="{{old('positionName')}}" name="positionName" id="tenvitri" placeholder="Vị trí...">
				      <input type="hidden" id="vitri"  name="vitri">
				      <span class="input-group-btn">
				        <button class="btn btn-secondary custombtn" id="getPosition" type="button"><span class="glyphicon glyphicon-map-marker"></span></button>
				      </span>
				    </div>
				</div>

				<div class="search-icon col-sm-6 col-xs-12">
					<div class="input-group border-div">
				      <input type="text" class="customtextbox form-control" value="{{old('keyword')}}" name="keyword" placeholder="Tìm Kiếm..." id="keyword">
				      <span class="input-group-btn">
				        <button  class="btn btn-secondary custombtn" type="button" id="search"><span class="glyphicon glyphicon-search" ></span></button>
				      </span>
				    </div>

			{{-- <form action="{{route('getPosition')}}" method="get">
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
					</div> --}}
					</div>
				</div>
			</form>

			<!-- END SEACH -->

		<div class="hide-banner row">
			<div class="col-md-offset-3 col-md-6 col-md-offset-3" style="margin-top: 30px;margin-bottom: 30px;color: #fff">
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

		<!-- END PHẦN FOUR BANNER -->	
	</div>
</div>
</header>
<!-- END PHẦN HEADER -->

<!-- BẮT ĐẦU PHẦN CONTENT -->

	
<!-- XONG PHẦN CONTENT -->
@endsection

