@include('layouts.header')
@include('layouts.menu')
<style>
	.navbar-default{
		background: #00979C;
	}
	body{
		background: #fff;
		line-height: 1.8;
		background: #EEEEEE;
	}
	.photo img{
		border-radius: 8px;
	}

	.fa-location-arrow:before{
		content: "\f124";
	}

	.fa-clock-o:before {
    content: "\f017";
	}
	

	.micro-item{
		height: 50px;
		text-align: center;
		border: 1px solid #ddd;
		cursor: pointer;
	}

	
	.micro-item .micro-title>a{
		display: inline-block;
		text-decoration: none;
		padding-top: 10px;
		width: 100%;
		height: 48px;
		font-weight: 700;
	}
	.micro-item:hover{
		color: #046e96;
		background: #f8f8f8;
		outline: none;
	}
	.micro-item .micro-title>a:focus{
		outline: none;
	}

	.image-post img{
		float: left;
	}

	.image-post{
		padding: 0;
	}
	.post-content{
		float: left;
		font-size: 14px;
		font-weight: 600;
		line-height: 20px;
		
	}
	.post-content a{
		color: #333;
	}

	.clear-fix{
		clear: both;
	}

	.panel-default>.panel-heading{
		background: #28AFB0;
		color: #fff;
	}
	.btn{
		margin-bottom: 10px;
	}

	.comment-time{
		display: inline-block;
		margin-left: -100px;
	}

	@media all and (max-width: 600px)
      {
    	#slide-image img{
    		width: 100%;
    		height: 150px;
    		margin-top: 20px;
    		border-radius: 5px;
    	}    
		
		.comment-time{
		display: inline-block;
		margin-left: 10px;
	}
		#menu{
			display: none;
		}
      }
</style>
<body>
<div class="row" style="padding: 15px;">
	<div class="col-md-9">
		<div class="panel-group shadowpanel">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{$curentPost->title}}</h3>
				</div>
				<div class="panel-body">
					<div class="row" style="height: 100%">
						<div class="col-md-4">
							<div class="photo">
								<img src="{{asset('upload/picture/post').'/'.$curentPost->photo}}" width="270px" height="250px" alt="">
							</div>
						</div>
						
						{{-- Thể loại --}}
						<div class="col-md-8">
							<div class="breadcrumb">
							  <a class="breadcrumb-item" href="#">Thể loại: {{$curentPost->category->name}}</a>
							  {{-- <a class="breadcrumb-item" href="#">Quận 1</a><i> >> </i>
							  <a class="breadcrumb-item" href="#">Bến Nghé</a> --}}
							</div>

							<div class="main-info-title">
								<h1>{{$curentPost->title}}</h1>
							</div>

							<hr>
							<div class="address">
								<span class="fa fa-location-arrow locationicon"></span>
								<span>
									<a href=""><span>{{$curentPost->address}}</span></a>
								</span>
							</div>

							<div class="time-line">
								<span class="fa fa-clock-o houricon"></span>
								<span title=" | 09:00 AM - 10:00 PM">{{$curentPost->open_time}} - {{$curentPost->close_time}}</span>
							</div>

							<div class="price">
								<span class="fa fa-internet-explorer"></span>
								<a href="{{$curentPost->website}}"><span>{{$curentPost->website}}</span></a>
							</div>
						</div>
					</div>
					<hr>
					<!-- END phần header -->
					<!-- Phần Body -->
					<div class="row">
						<div class="col-md-3 micro-item">
							<div class="micro-title">
								
								<a href="" data-toggle="modal" data-target="#modal-phone"><i class="fa fa-phone"></i> Gọi điện</a>
							</div>
						</div>

						<div class="col-md-3 micro-item">
							<div class="micro-title">							
								<a href=""><i class="fa fa-bookmark"></i> Bộ sưu tập </a>
							</div>
						</div>

						<div class="col-md-3 micro-item">
							<div class="micro-title">
								
								<a id="id_comment_button"><i class="fa fa-comment"></i> Bình luận</a>
							</div>
						</div>

						<div class="col-md-3 micro-item">
							<div class="micro-title">
								
								<a href=""><i class="fa fa-camera"></i> Hình Ảnh</a>
							</div>
						</div>
					</div>
					  <h4>Hình Ảnh</h4>
					<hr>
					<!-- End Body -->
					<!-- Phần slider -->
					@include('showpost.micro-image')

					<!-- end slider -->
				</div>
			</div> 
		</div>
	
	{{-- Thanh bình luận và nút --}}
	<div class="row" style="margin:0;">
		<div class="col-md-12" style="background: #fff;">
		{{-- p: trả về thành công khi đăng bài --}}
		<strong class="text-danger" id="id_comment_success">&nbsp;</strong>

			<div><h4>Viết bình luận</h4></div>
			<div style="margin-top: 1em;margin-bottom: 1em;">
				<input type="text" id="id_title_comment" name="n_title_comment" class="form-control" placeholder="Nhập tiêu đề, ví dụ: Món ăn ở đây thật tuyệt vời">
			</div>
			<div style="margin-bottom: 1em">
				<textarea id="demo" name="n_comment" class="form-control " placeholder="Nhập nội dung bình luận"></textarea>
			</div>
			<div>
				@if(Auth::check())
				{{-- Biến user login --}}
				@php
				$user = App\User::find(Auth::user()->id);
				@endphp
				<input type="hidden" id="id_idPost" name="{{$postId}}">
				<button type="button" class="btn btn-primary cl_sm" id="" name="{{route('ajax_comment')}}">Đăng</button>
				@else
				<button type="button" disabled class="btn btn-primary">Đăng nhập để bình luận</button>
				@endif
			</div>
		</div>
	</div>
		<!-- End panel -->
		<!-- Phần Bình luận -->
		{{-- Begin Ajax comment --}}
		<div id="ajaxComment">
		@foreach($comment as $valueComment)
		<div class="row" style="margin:0;">
			<div class="col-md-12" style="background: #fff;">
			<hr>
				<div class="comment" style="width: 100%;height: 70px;">
					<div class="comment-head" style="float: left; ">
						<a href=""><img  width="60px" height="60px" src="{{asset('upload/picture/profile/').'/'.$valueComment->user->profile->avatar}}" class="img-responsive img-circle"></a>
					</div>
					<div class="comment-title" style="float: left;font-size: 15px;font-weight: 600;margin-left: 15px;">
						<a href="">{{$valueComment->user->name}}</a>
					</div>
					<br>
					<div class="comment-time" style="display: inline-block;margin-left: -25px;">
						<i class="fa fa-clock-o houricon"></i><a href=""> {{$valueComment->created_at->format('d.m.Y H:i:s')}}</a>
					</div>
				</div>
				<hr>
				<div class="title" style="font-size:14px;font-weight: 700;margin-left:50px;">
					<p><strong>{{$valueComment->title}}</strong></p>
				</div>

				<div class="content" style="text-align: justify;padding: 0px 50px 50px 50px;">
					<span>
						{{$valueComment->content}}
					</span>
				</div>

			</div>		
		</div>
		<hr>
		@endforeach
		{{-- Phân trang bình luận --}}
		<div>{!! $comment->links() !!}</div>
		</div>
		
		{{-- End Ajax comment --}}
		<!-- End Bình Luận -->
		<!-- Phần để viết Bình luận -->
				{{-- THÊM PHẦN ĐỂ VIẾT BÌNH LUẬN VÀO ĐÂY --}}

		<!-- End phần viết bình luận -->
	</div>
	<div class="col-md-3">
		<div class="panel-group shadowpanel">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Bài Viết Mới</h4>
			</div>
			<div class="panel-body">
				@foreach($newRefPost as $valueNewRefPost)
				<div class="col-md-12">
					<div class="col-md-3 image-post">
						<img width="115px" height="60px" src="{{asset('upload/picture/post/').'/'.$valueNewRefPost->photo}}" class="img-responsive img-thumbnail">
					</div>
					<div class="col-md-9 post-content">
						<a href="{{route('show_post')}}/{{$valueNewRefPost->id}}">{{$valueNewRefPost->title}}</a>
						<hr>
					</div>
				</div>
				<div class="clear-fix"></div>
				<hr>
				@endforeach
			</div>
		</div> 
		</div>
	</div>

	<!-- End bài viết mới -->
</div>
<!-- Modal -->
  <div class="modal fade" id="modal-phone" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Điện Thoại</h4>
        </div>
        <div class="modal-body">
          <i class="fa fa-phone"></i>
          <span style="font-size: 16px;">{{$curentPost->phone}}</span>
        </div>
      </div>
    </div>
  </div>
<script>
  $(document).ready(function(){

$('#itemslider').carousel({ interval: 3000 });

$('.carousel-showmanymoveone .item').each(function(){
var itemToClone = $(this);

for (var i=1;i<6;i++) {
itemToClone = itemToClone.next();

if (!itemToClone.length) {
itemToClone = $(this).siblings(':first');
}

itemToClone.children(':first-child').clone()
.addClass("cloneditem-"+(i))
.appendTo($(this));
}
});
});

</script>
{{-- Ajax comment --}}
<script>
	$(document).ready(function(){
		$(".cl_sm").click(function(){
			// url = đường dẫn ajax
			var url = $(this).attr('name');
			// Lấy tiêu đề comment
			var titleComment = $('#id_title_comment').val();
			// Lấy nội dung comment
			var comment = $('#demo').val();
			// Lấy id post
			var idPost = $("#id_idPost").attr('name');
			if($.trim(titleComment).length == 0)
			{
				$("#id_comment_success").empty().append('Bạn chưa nhập tiêu đề.');
			}
			else if($.trim(comment).length == 0)
			{
				$("#id_comment_success").empty().append('Bạn chưa nhập nội dung bình luận');
			}
			else
			{
				$.get(url, {titleComment:titleComment, comment:comment, idPost:idPost} , function(data){
				$("#ajaxComment").html(data);
				});
				$("#id_comment_success").empty().append('Đăng thành công');
				// clear input
				$('#id_title_comment').val('');
				$('#demo').val('');
			}
		});
	});
</script>
{{-- Nhấn nút bình luận thì focus xuống thanh bình luận--}}
<script>
	$(document).ready(function(){
		$("#id_comment_button").click(function(){
			$("#id_title_comment").focus();	
		});
	});
</script>
@include('layouts.footer')
	
</body>