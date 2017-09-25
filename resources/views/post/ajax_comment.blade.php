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
					<div class="comment-time" style="display: inline-block;margin-left: -50px;">
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