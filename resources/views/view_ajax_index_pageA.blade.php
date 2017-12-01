
@php $breakRow = 1; @endphp
				<div class="row" style="margin: 5px;">
					@foreach($postNhahang as $valuePostNhaHang)
					<div class="col-xs-12 col-md-3" style="word-wrap: break-word; padding: 10px;">
						<div class="post_item">
							<div class="row">
								<div class="col-md-12">
									<a href="{{url('showpost')}}/{{$valuePostNhaHang->id}}">
									<img src="{{asset('upload/picture/post/'). '/'. $valuePostNhaHang->photo}}" alt="no_pic" height="150px" width="100%">
									</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 title_post" >
									<h4>{{$valuePostNhaHang->title}}</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-globe" aria-hidden="true"></i><a href="" class="space_left">{{$valuePostNhaHang->website}}</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-hourglass-half" aria-hidden="true"></i>
									{{$valuePostNhaHang->open_time}} - {{$valuePostNhaHang->close_time}}
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-phone-square" aria-hidden="true" style="margin-right: 5px"></i>{{$valuePostNhaHang->phone}}
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<i class="fa fa-location-arrow" aria-hidden="true" style="margin-right: 5px"></i>{{$valuePostNhaHang->address}}
								</div>
							</div>
						</div>
					</div>
					@if($breakRow%4 == 0)
				</div> <div class="row" style="margin: 10px;">
					@endif
					@php $breakRow++ ; @endphp
					@endforeach
				</div>
				<div class="text-center pageA">{{$postNhahang->appends(array_except(Request::query(), 'page'))->links()}}</div>