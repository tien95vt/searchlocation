@include('layouts.header')
<style>
	.navbar-default{
		background: #00979C;
	}
	.col-sm-10{
		padding-left: 25px;
		padding-right: 20px;
	}
	h1{
		color: #00979C;
	}
</style>
<body style="background: white">
	@include('layouts.menu')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 ">
				<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
					<h1 class="title">Đăng bài</h1>
					<hr />
					<!-- <h3><span style="color: red">*</span>:Bắt buộc phải nhập</h2> -->
				</div>
			</div> 

			{{-- Xuất thông báo về đăng bài --}}
			@if( count($errors)>0 )
			<div class="alert alert-danger">
				@foreach($errors->all() as $arr)
				<li>{{$arr}}</li>
				@endforeach
			</div>
			@endif
			@if(session('notice_success'))
				<div class="alert alert-success">
					{{session('notice_success')}}
				</div>
			@endif
			{{-- Kiểm tra login --}}
			@if(session('error_login'))
			<div class="alert alert-danger">
				{{session('error_login')}}
			</div>
			@endif

			<form class="form-horizontal" action="process_add_post" enctype="multipart/form-data" method="post">
			{{csrf_field()}}
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Thể loại:<span style="color: red">*</span></label>
					<div class="col-sm-10">
						<select class="form-control" id="" name="n_category">
							<option disabled selected value="">Chọn thể loại</option>
							@foreach($category as $valueCategory)
								<option value="{{$valueCategory->id}}">{{$valueCategory->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd"> Tiêu đề:<span style="color: red">*</span></label>
					<div class="col-sm-10">          
						<input type="text" class="form-control" id="" name="n_title" placeholder="Tiêu đề của bài post" value="{{old('n_title')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Hình bài post: <span style="color: red">*</span></label>
					<div class="col-sm-10">          
						<input type="file" class="form-control" id="" name="n_picture">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Hình liên quan đến bài post 1:</label>
					<div class="col-sm-10">          
						<input type="file" class="form-control" id="" name="n_ref_picture_1">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Hình liên quan đến bài post 2:</label>
					<div class="col-sm-10">          
						<input type="file" class="form-control" id="" name="n_ref_picture_2">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Hình liên quan đến bài post 3:</label>
					<div class="col-sm-10">          
						<input type="file" class="form-control" id="" name="n_ref_picture_3">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd">Hình liên quan đến bài post 4:</label>
					<div class="col-sm-10">          
						<input type="file" class="form-control" id="" name="n_ref_picture_4">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd"> Website:</label>
					<div class="col-sm-10">          
						<input type="text" class="form-control" id="" name="n_website" value="{{old('n_website')}}" placeholder="Địa chỉ website">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd"> Địa chỉ:</label>
					<div class="col-sm-10">          
						<input type="text" class="form-control" id="" name="n_address" placeholder="Địa chỉ công ty" value="{{old('n_address')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd"> Số điện thoại:</label>
					<div class="col-sm-10">          
						<input type="number" class="form-control" id="" name="n_phone" placeholder="Số điện thoại liên lạc" value="{{old('n_phone')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd"> Nội dung:<span style="color: red">*</span></label>
					<div class="col-sm-10">          
						<textarea id="demo" name="n_des" class="form-control ckeditor" placeholder="Mô tả cho công ty">{{old('n_des')}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd"> Giờ mở cửa (7:30:SA):</label>
					<div class="col-sm-10">          
						<input type="time" class="form-control" id="" name="n_open_time" value="{{old('n_open_time')}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="pwd"> Giờ đóng cửa (5:30:CH):</label>
					<div class="col-sm-10">          
						<input type="time" class="form-control" id="" name="n_close_time" value="{{old('n_close_time')}}" >
					</div>
				</div>
				<div class="form-group">        
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Đăng</button>
					</div>
				</div>
			</form>
		</div>
			</div>
		</div>
	</div>



	@include('layouts.footer')
	<script  type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function($) {
			$('#menu').css('display', 'none');
		});
	</script>

</body>
</html>