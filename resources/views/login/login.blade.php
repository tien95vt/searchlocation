@include('layouts.header')

<body style="background: white">
	<div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
				<h1 class="title">Đăng nhập</h1>
					<hr />
				</div>
			</div> 

			{{-- Xuất thông báo về đăng nhập --}}
			@if( count($errors)>0 )
				<div class="col-md-5 col-md-offset-4">
					<div class="alert alert-danger">
					@foreach($errors->all() as $arr)
						<li>{{$arr}}</li>
					@endforeach
				</div>
				</div>
			@endif
			@if(session('error_login'))
				<div class="col-md-5 col-md-offset-4">
					<div class="alert alert-danger">
					{{session('error_login')}}
				</div>
				</div>
			@endif
			@if(session('login_request'))
				<div class="col-md-5 col-md-offset-4">
					<div class="alert alert-danger">
					{{session('login_request')}}
				</div>
				</div>
			@endif

			<div class="col-md-5 col-md-offset-4">

			<div class="main-login main-center">
				<form class="form-horizontal" method="post" action="process_login">
				{{csrf_field()}}
					<div class="form-group">
						<!-- <label for="email" class="col-sm-2 control-label">Địa chỉ Email</label> -->
						<div class="col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Nhập địa chỉ Email"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<!-- <label for="password" class="col-sm-2 control-label">Mật khẩu</label> -->
						<div class="col-sm-12">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="password" id="password"  placeholder="Nhập mật khẩu"/>
							</div>
						</div>
					</div>

					<div class="form-group ">
						<div class="col-sm-10 col-sm-offset-1">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Đăng nhập</button>
						</div>
					</div>
					<div class="col-sm-10 col-sm-offset-2">
						<div class="login-register">
						<h4>Bạn chưa có tài khoản ? <a href="register_form">Đăng ký</a> ngay.</h4> 
					</div>
					</div>
				</form>
			</div>

			</div>

		</div>
	</div>
</body>
</html>