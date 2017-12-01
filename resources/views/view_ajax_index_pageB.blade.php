@php $breakRow = 0; @endphp
				<div class="row" style="margin: 5px;">
					@foreach($postKhachSan as $valuePostKhachSan)
					<div class="col-xs-12 col-md-3" style="word-wrap: break-word; padding: 10px;">
						<div class="post_item">
							<div class="row">
								<div class="col-md-12">
									<a href="{{url('showpost')}}/{{$valuePostKhachSan->id}}">
									<img src="{{asset('upload/picture/post/'). '/'. $valuePostKhachSan->photo}}" alt="no_pic" height="150px" width="100%">
									</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 title_post" >
									<h4>{{$valuePostKhachSan->title}}</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-globe" aria-hidden="true"></i><a href="" class="space_left">{{$valuePostKhachSan->website}}</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-hourglass-half" aria-hidden="true"></i>
									{{$valuePostKhachSan->open_time}} - {{$valuePostKhachSan->close_time}}
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-phone-square" aria-hidden="true" style="margin-right: 5px"></i>{{$valuePostKhachSan->phone}}
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-location-arrow" aria-hidden="true" style="margin-right: 5px"></i>{{$valuePostKhachSan->address}}
								</div>
							</div>
						</div>
					</div>
					@if($breakRow==3)
				</div> <div class="row" style="margin: 10px;">
					@endif
					@php $breakRow++ ; @endphp
					@endforeach
				</div>
				<div class="text-center pageB">{{$postKhachSan->appends(array_except(Request::query(), 'other_page'))->links()}}</div>