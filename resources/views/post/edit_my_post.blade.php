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
			<form action='{{url('process_edit_my_post')}}/{{$idPost}}' method="POST" enctype="multipart/form-data">
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
					<input type="text" class="form-control" id="autocomplete_address_edit_id" name="n_address" placeholder="" value="{{$post->address}}">
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
					<input  type="file" class="form-control" id="" name="n_picture">
				</div>
				<div class="form-group">
					<label for="">Các Hình liên quan</label>
					<br>	
					<div class="form-group row col-md-offset-1">
						<div class="col-md-2">
							<label for="" class="control-label" style="margin-left: 73px; color:red">Thêm hình</label>
						</div>
						<div class="col-md-7">
							<input  type="file" class="form-control" id="" name="images[]" multiple>
						</div>
					</div>
					<br>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">STT</th>
								<th scope="col">Hình</th>
								<th scope="col">Sửa</th>
							</tr>
						</thead>
						<tbody>
							@foreach($post_picture as $key => $value_post_picture)
							<tr class="text-center">
								<th scope="row" width="50px">{{++$key}}</th>
								<td>
									<img src="{{ asset('upload/picture/post'). '/'. $value_post_picture->reference_piture }}" alt="no_pic" width="150px" height="100px">
								</td>
								<td width="">
									<input  type="file" class="form-control test_change" id="{{$value_post_picture->id}}" name="n_picture_{{$key}}">
								</td>
								{{-- hidden: id post_picture --}}
								<input type="hidden" name="n_id_{{$key}}" value="{{$value_post_picture->id}}">
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		@include('layouts.footer_new')
		
		{{-- Autocomplete địa chỉ --}}
		<script>
		$(document).ready(function() {
			autoCompleteEditPost();
		});
		// Autocomplet Add Post
		function autoCompleteEditPost(){
  		var optionsEditPost = {  componentRestrictions: { country: 'vn' }
	  	};
	  	var inputEditPost = document.getElementById('autocomplete_address_edit_id');
	  	var autocomplete = new google.maps.places.Autocomplete(inputEditPost, optionsEditPost);
	      	//End auto complete
	      }
		</script>

	</body>
	</html>