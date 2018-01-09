@include('layouts.header')
@include('layouts.menu')
<style>
	/* hr{

    margin-top: 1px;
    margin-bottom: 1px;
    width: 90%;
    } */
	
	/*style autocomplete*/
	.pac-container {
    background-color: #FFF;
    z-index: 20;
    position: fixed;
    display: inline-block;
    float: left;
	}
	.modal{
	    z-index: 20;   
	}
	.modal-backdrop{
	    z-index: 10;        
	}​
	/*End style autocomplete*/

    .new-post{
    	border-bottom: solid 1px #EEEEEE;
    	padding: 4px;
    }
    .img-thumbnail{
    	padding:1px;
    	width: 100px;
    	height: 70px;
    }
    .navbar-default{
    	background: #00979C;
    }
    body{
    	background: #fff;
    	line-height: 1.8;
    	background: #EEEEEE;
    }
    .photo img{
    	/* border-radius: 8px; */
    	/* padding: 10px; */
    }
    .breadcrumb{
    	border-radius: 0px;	
    	margin-bottom: 10px;
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
    	margin-top:10px;
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
    	padding-top:20px;

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
    	float: right;

    	margin-left: 10px;
    	margin-top: 10px;
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
    		margin-top: 10px;
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
					<div class="breadcrumb">
						<a class="breadcrumb-item" href="#">Thể loại: {{$curentPost->category->name}}</a>
					<!-- <a class="breadcrumb-item" href="#">Quận 1</a><i> >> </i>
						<a class="breadcrumb-item" href="#">Bến Nghé</a> -->
					</div>
					<div class="panel-body">
						<div class="row" style="height: 100%;">
							<div class="col-md-4">
								<div class="photo">
									<img src="{{asset('upload/picture/post').'/'.$curentPost->photo}}" width="100%" height="230px" alt="">
								</div>
							</div>

							{{-- Thể loại --}}
							<div class="col-md-8">

								<div class="main-info-title">
									<h1> {{$curentPost->title}}
										{{-- xu ly rating --}}
										<?php
										$temp = 0;
										$star = 0;
										if (count($rating) == 0) {

										}else{
											foreach ($rating as $ratingPost) {

										//echo $ratingPost->rate + 0;	
												$star += $ratingPost->rate;	
											}
											$temp = $star / count($rating);
										//echo $temp;
											if(0 == $temp && $temp < 0.5){
												echo 	'<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>';
											}else if(0.5 <= $temp && $temp <1){
												echo 	'<i class="fa fa-star-half-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>';
											}else if(1 <= $temp && $temp <1.5){
												echo 	'<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>';
											}else if(1.5 <= $temp && $temp <2){
												echo 	'<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>';
											}else if(2 <= $temp && $temp <2.5){
												echo 	'<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>';
											}else if(2.5 <= $temp && $temp <3){
												echo 	'<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>';
											}else if(3 <= $temp && $temp <3.5){
												echo 	'<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>';
											}else if(3.5 <= $temp && $temp <4){
												echo 	'<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-half-o" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>';
											}else if(4 <= $temp && $temp <4.5){
												echo 	'<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>';
											}else if(4.5 <= $temp && $temp  <5){
												echo 	'<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-half-o" aria-hidden="true"></i>';
											}else if($temp == 5){
												echo 	'<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>';
											}

										}
										?></h1>


									</div>

									<hr>
									<div class="address">
										<span class="fa fa-compass locationicon"></span>
										<span>
											<a href=""><span>{{$curentPost->address}}</span></a>
										</span>
									</div>

									<div class="time-line">
										<span class="fa fa-clock-o houricon"></span>
										<span title=" | 09:00 AM - 10:00 PM">{{$curentPost->open_time}} - {{$curentPost->close_time}}</span>
									</div>
									<?php 
									$dt = new DateTime();

									$gioDong = $dt->format(substr($curentPost->close_time, 0, -6));
									$gioMo = $dt->format(substr($curentPost->open_time, 0, -6));
									$phutDong = $dt->format(substr($curentPost->close_time, 3, -3));
									$phutMo = $dt->format(substr($curentPost->open_time, 3, -3));
									

									if ($dt->format('H')> $gioDong || $dt->format('H') < $gioMo ) {
										echo "<i class=\"fa fa-times-circle-o\" aria-hidden=\"true\"></i> Đã đóng cửa";
									}else if($dt->format('H') === ($gioDong)){
										if ($dt->format('i')> $phutDong	){
											echo "<i class=\"fa fa-times-circle-o\" aria-hidden=\"true\"></i> Đã đóng cửa";
										}else{
											echo "<i class=\"fa fa-check-circle-o\" aria-hidden=\"true\"></i> Đang mở cửa";
										}
									}else if($dt->format('H') == ($gioMo)){
										if ($dt->format('i') < $phutMo ){
											echo "<i class=\"fa fa-times-circle-o\" aria-hidden=\"true\"></i> Đã đóng cửa";
										}else{
											echo "<i class=\"fa fa-check-circle-o\" aria-hidden=\"true\"></i> Đang mở cửa";
										}
									}else{
										echo "<i class=\"fa fa-check-circle-o\" aria-hidden=\"true\"></i> Đang mở cửa";
									}
								// echo $dt->format('H');
								 //echo $phutMo;

									?>

									<div class="price">
										<span class="fa fa-globe"></span>
										<a href="{{$curentPost->website}}"><span>{{$curentPost->website}}</span></a>
									</div>
								</div>
							</div>
							<!-- END phần header -->
							<!-- Phần Body -->
							<div class="col-md-3 micro-item">
								<div class="micro-title">
									<a href="" data-toggle="modal" data-target="#modal-phone"><i class="fa fa-phone"></i> Gọi điện</a>
								</div>
							</div>

							<div class="col-md-3 micro-item">
								<div class="micro-title">
									<a href="" data-toggle="modal" data-target="#modal-direct" id="direct_id"><i class="fa fa-car"></i> Chỉ đường </a>
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
							<hr>
							<!-- End Body -->
							<!-- Phần slider -->
							@include('showpost.micro-image')

							<!-- end slider -->
						</div>
						<header class="header title-subtitle">
							<h2 class="widget-title">Nội dung</h2>
						</header>
						<div style="margin-right: 30px; margin-left: 30px">
						<p>{!! $curentPost->description !!}</p>
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
				<!-- <script>
					$(document).ready(function() {
					    $('input[type=radio][name=rating]').change(function() {
					       // alert(this.value);
					    });
					});
				</script> -->
				<br>
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
	<hr style=" margin: 2px 0; ">
	<!-- End panel -->
	<!-- Phần Bình luận -->
	{{-- Begin Ajax comment --}}
	<div id="ajaxComment">
		@foreach($comment as $valueComment)
		<div class="row" style="margin:0;">
			<div class="col-md-12" style="background: #fff;">
				<div class="comment" style="width: 100%;height: 70px; padding-top: 5px;">
					<div class="comment-head" style="float: left; ">
						<a href=""><img  width="60px" height="60px" src="{{asset('upload/picture/profile/').'/'.$valueComment->user->profile->avatar}}" class="img-responsive img-circle img-profile-nm"></a>
					</div>
					<div class="comment-title" style="float: left;font-size: 15px;font-weight: 600;margin-left: 15px;margin-top: 10px;">
						<a href="">{{$valueComment->user->name}}</a>
					</div>

					{{-- Rating --}}
					<span style="float: left;margin: 10px; ">
						<?php 
						if(0 == $valueComment->rate && $valueComment->rate < 0.5){
							echo 	'<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>';
						}else if(0.5 <= $valueComment->rate && $valueComment->rate <1){
							echo 	'<i class="fa fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>';
						}else if(1 <= $valueComment->rate && $valueComment->rate <1.5){
							echo 	'<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>';
						}else if(1.5 <= $valueComment->rate && $valueComment->rate <2){
							echo 	'<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>';
						}else if(2 <= $valueComment->rate && $valueComment->rate <2.5){
							echo 	'<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>';
						}else if(2.5 <= $valueComment->rate && $valueComment->rate <3){
							echo 	'<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>';
						}else if(3 <= $valueComment->rate && $valueComment->rate <3.5){
							echo 	'<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>';
						}else if(3.5 <= $valueComment->rate && $valueComment->rate <4){
							echo 	'<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>';
						}else if(4 <= $valueComment->rate && $valueComment->rate <4.5){
							echo 	'<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-o" aria-hidden="true"></i>';
						}else if(4.5 <= $valueComment->rate && $valueComment->rate  <5){
							echo 	'<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-half-o" aria-hidden="true"></i>';
						}else if($valueComment->rate == 5){
							echo 	'<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>';
						}
						?>
					</span>	
					

					<div class="comment-time">
						<i class="fa fa-clock-o houricon"></i><a href=""> {{$valueComment->created_at->format('d.m.Y H:i:s')}}</a>
					</div>
					<br>
					
				</div>
				<div class="title" style="font-size:17px;font-weight: 700; margin-left: 65px;">
					<strong>{{$valueComment->title}}</strong>
				</div>

				<div class="content" style="text-align: justify; color: #95a5a6; margin-bottom: 5px; margin-left: 65px;">
					<span>
						{{$valueComment->content}}
					</span>
				</div>
				


			</div>		
		</div>
		<hr style=" margin: 2px 0; ">
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
				
				<div class="col-md-12 new-post">
					<div class="col-md-5">
						<img src="{{asset('upload/picture/post/').'/'.$valueNewRefPost->photo}}" class="img-responsive img-thumbnail">
					</div>
					<div class="col-md-7 post-content">
						<a href="{{route('show_post')}}/{{$valueNewRefPost->id}}">{{$valueNewRefPost->title}}</a>

					</div>
				</div>
				<div class="clear-fix"></div>
				
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
{{-- Modal chỉ đường --}}
<div class="modal fade" id="modal-direct" role="dialog">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Nhập vị trí xuất phát</h4>
			</div>
			<div class="modal-body">
				<form action="{{route('direct_post')}}">
					{{-- vị trí xuất phát --}}
					<input type="text" class="form-control" id="post_auto_id" name="direct_post_name">
					{{-- Vị trí điểm điến --}}
					<input type="hidden" value="{{$curentPost->address}}" name="endposition_name">
					{{-- Tên điểm điến --}}
					<input type="hidden" value="{{$curentPost->title}}" name="destination_name">
					<br>
					<button type="summit" class="btn btn-primary">Chỉ đường</button>
				</form>
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
			// Lấy rating
			var rate = $('input[name=rating]:checked').val();
			//var ratingGlo = ratingLoc; 
			// $(document).ready(function() {
			// 		    $('input[type=radio][name=rating]').change(function() {
			// 		        ratingLoc = this.value;
			// 		    });
			// 		});
			//alert(rate);
			// Lấy id post
			var idPost = $("#id_idPost").attr('name');
			if($.trim(titleComment).length == 0)
			{
				$("#id_comment_success").empty().append('Bạn chưa nhập tiêu đề.');
			}
			else if($.trim(comment).length == 0)
			{
				$("#id_comment_success").empty().append('Bạn chưa nhập nội dung bình luận');
			}else if($.trim(rate).length == 0)
			{
				$("#id_comment_success").empty().append('Bạn chưa nhập đánh giá');
			}
			else
			{
				$.get(url, {titleComment:titleComment, comment:comment, idPost:idPost, rate:rate} , function(data){
					$("#ajaxComment").html(data);
				});
				$("#id_comment_success").empty().append('Đăng thành công');
				// clear input
				$('#id_title_comment').val('');
				$('#demo').val('');
				$('input[name=rating]').prop('checked', false);
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
{{-- Autocomplite bên trang post --}}
  <script>
  	$(document).ready(function() {
  		$('#direct_id').click(function(){
  			autoCompletePost();
  		});
  	});
  	function autoCompletePost(){
  		var optionsPost = {  componentRestrictions: { country: 'vn' }
  	};
  	var inputPost = document.getElementById('post_auto_id');
  	var autocomplete = new google.maps.places.Autocomplete(inputPost, optionsPost);
      	//End auto complete
      }
  </script>
  {{-- End Autocomplite bên trang post --}}
@include('layouts.footer')

</body>