@php $breakRow = 1; @endphp
<div class="row" style="margin: 5px;">
	@foreach($postAll as $valuePostAll)
	<div class="col-xs-6 col-md-3" style="word-wrap: break-word; padding: 10px;">
		<div class="post_item">
			<div class="row">
				<div class="col-md-12">
					<a href="{{url('showpost')}}/{{$valuePostAll->id}}">
						<div class="img-post">
							<img src="{{asset('upload/picture/post/'). '/'. $valuePostAll->photo}}" alt="no_pic"  class="image">

							<div class="overlay">
								<a class="btn text" href="{{url('showpost')}}/{{$valuePostAll->id}}">Chi tiết</a>
								{{--  <div class="btn btn_detail text">{{$valuePostNhaHang->title}}</div> --}}
							</div>
						</div>
					</a>
				</div>
			</div>
			<div style="padding: 10px;">
				<div class="row">
					<div class="col-md-12 title_post" >
						<h4>{{$valuePostAll->title}}</h4>
					</div>
				</div>
								{{-- <div class="row">
									<div class="col-md-12">
										<i class="fa fa-phone-square" aria-hidden="true" style="margin-right: 5px"></i>{{$valuePostNhaHang->phone}}
									</div>
								</div> --}}
								<div class="row title-overflow">
									<div class="col-md-12">
										<i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 5px"></i>{{$valuePostAll->address}}
									</div>
								</div>
								{{-- <div class="row">
									<div class="col-md-12">
										<i class="fa fa-comment"></i>
									</div>
								</div> --}}
							</div>

						</div>
					</div>
					@if($breakRow%4 == 0)
				</div> 
				<div class="row" style="margin: 10px;">
					@endif
					@php $breakRow++ ; @endphp
					@endforeach
				</div>
				<div class="text-center pageKhac">{{$postAll->links()}}
				</div>