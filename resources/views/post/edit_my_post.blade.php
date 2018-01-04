@include('layouts.header')
<body style="background: white">
	@include('layouts.menu')
	<div class="container">  
		<div class="panel-heading">
			<div class="panel-title text-center">
				<h1 class="title" style="color: #00979C">Chỉnh sửa bài đăng</h1>
				<hr />
				<!-- <h3><span style="color: red">*</span>:Bắt buộc phải nhập</h2> -->
				</div>
				@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				@if( session('edit_successfully') )
				<div class="alert alert-success">
					{{ session('edit_successfully') }}
				</div>
				@endif
			</div>
			<form action='{{url('process_edit_my_post')}}/{{$idPost}}' method="POST">
				{{csrf_field()}}
				<div class="form-group">
					<label >Thể loại</label>
					<select class="form-control" id="" name="n_category">
						<option selected value="{{$post->category_id}}">{{$post->category->name}}</option>
						@foreach($category as $valueCategory)
						<option value="{{$valueCategory->id}}">{{$valueCategory->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label >Tiêu đề</label>
					<input type="text" class="form-control" name="n_title" id="" placeholder="" value="{{$post->title}}">
				</div>
				<div class="form-group">
					<label for="">Website</label>
					<input type="text" class="form-control" name="n_website" id="" placeholder="" value="{{$post->website}}">
				</div>
				<div class="form-group">
					<label for="">Địa chỉ</label>
					<input type="text" class="form-control" id="" name="n_address" placeholder="" value="{{$post->address}}">
				</div>
				<div class="form-group">
					<label for="">Số điện thoại</label>
					<input type="text" class="form-control" name="n_phone" id="" placeholder="" value="{{$post->phone}}">
				</div>
				<div class="form-group">
					<label for="">Nội dung</label>
					<textarea id="demo" name="n_des" class="form-control ckeditor" placeholder="Mô tả cho công ty">{{$post->description}}</textarea>
				</div>
				<div class="form-group">
					<label for="">Giờ mở cửa</label>
					<input type="time" class="form-control" name="n_open_time" id="" placeholder="" value="{{$post->open_time}}">
				</div>
				<div class="form-group">
					<label for="">Giờ đóng cửa</label>
					<input type="time" class="form-control" name="n_close_time" id="" placeholder="" value="{{$post->close_time}}">
				</div>
				<div class="form-group">
					<label for="">Hình bài post</label>
					<br>
					<img src="{{asset('upload/picture/post'). '/'. $post->photo}}" alt="no_pic" width="200px" height="150px">
					<input required type="file" class="form-control" id="" name="n_picture">
				</div>
				<div class="form-group">
					<label for="">Các Hình liên quan</label>
					.........
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		@include('layouts.footer_new')
	</body>
	</html>