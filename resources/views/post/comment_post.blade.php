
@include('layouts.header')
<body style="background-color: white">
	<div class="container">
		<h1>Title: {{$post->title}}</h1>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd"> Comment:<span style="color: red">*</span></label>
			<form action="">
			<div class="col-sm-10">          
			<textarea id="demo" name="n_comment" class="form-control ckeditor" placeholder="Mô tả cho công ty"></textarea>
			<span class="col-md-12">Đánh giá của bạn: </span>
				<div class="col-md-12" style="margin-bottom: 1em">
				
				<fieldset class="rating">
				    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Tuyệt vời - 5 sao"></label>
				    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Tốt - 4.5 sao"></label>
				    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Khá tốt - 4 sao"></label>
				    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Bình thường - 3.5 sao"></label>
				    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Bình thường - 3 sao"></label>
				    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Hơi tệ - 2.5 sao"></label>
				    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Hơi tệ - 2 sao"></label>
				    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Quá tệ - 1.5 sao"></label>
				    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Tệ - 1 sao"></label>
				    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Quá tệ - 0.5 sao"></label>
				</fieldset>
			{{-- 	<script>
					$(document).ready(function() {
					    $('input[type=radio][name=rating]').change(function() {
					        alert(this.value);
					    });
					});
				</script> --}}
				<br>
			</div>
			</div>
			@if(Auth::check())
				{{-- Biến user login --}}
				@php
					$user = App\User::find(Auth::user()->id);
					
				@endphp
				<input type="hidden" id="id_idPost" name="{{$idPost}}">
				<button type="button" class="btn btn-primary cl_sm" id="{{$post->id}}" name="{{route('ajax_comment')}}">Đăng</button>
			@else
			<button type="button" disabled class="btn btn-primary">Đăng nhập để bình luận</button>
			@endif
			</form>
		</div>
		{{-- hiển thị bình luận --}}
		<h1>.......</h1>
		<div id="ajaxComment">
			@foreach($comment as $valueComment)
			<img class="img-profile-nm" style="float: left" src="{{asset('upload/picture/profile/').'/'.$valueComment->user->profile->avatar}}"alt="">
			{{-- Tên user + time--}}
			<p >{{$valueComment->user->name}} <span style="padding-left: 2em">{{$valueComment->created_at}}</span></p>
			{{-- nội dung bình luận --}}
			<p>{{$valueComment->content}}</p>
	

			@endforeach
		</div>

	</body>
</div>
</html>

<script>
	$(document).ready(function(){
		$(".cl_sm").click(function(){
			// url = đường dẫn ajax
			var url = $(this).attr('name');
			// Lấy thông tin comment
			var comment = $('#demo').val();
			// Lấy rating
			var rate = $('input[name=rating]:checked').val();
			// Lấy id post
			var idPost = $("#id_idPost").attr('name');
			$.get(url, {comment:comment, idPost:idPost} , function(data){
				$("#ajaxComment").html(data);
			});
		});
	});
</script>
