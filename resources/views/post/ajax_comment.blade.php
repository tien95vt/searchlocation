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