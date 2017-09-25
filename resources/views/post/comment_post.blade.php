
@include('layouts.header')
<body style="background-color: white">
	<div class="container">
		<h1>Title: {{$post->title}}</h1>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd"> Comment:<span style="color: red">*</span></label>
			<form action="">
			<div class="col-sm-10">          
			<textarea id="demo" name="n_comment" class="form-control ckeditor" placeholder="Mô tả cho công ty"></textarea>
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
			<img style="float: left" src="{{asset('upload/picture/profile/').'/'.$valueComment->user->profile->avatar}}"  width="50em" height="45em" alt="">
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
			// Lấy id post
			var idPost = $("#id_idPost").attr('name');
			$.get(url, {comment:comment, idPost:idPost} , function(data){
				$("#ajaxComment").html(data);
			});
		});
	});
</script>
