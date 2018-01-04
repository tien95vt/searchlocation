@include('layouts.header')
<body style="background: white">
	@include('layouts.menu')
	<div class="container-fluid">  
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked" role="tablist" style="width: 200px;">
				<li><a href="{{ url('admin') }}">Admin</a></li>
				<li class="active"><a href="{{ url('admin/list_post') }}">Quản trị bài post</a></li>
				<li><a href="{{ url('admin/list_user') }}">Quản lý user</a></li>
				<li><a href="#">About</a></li>        
			</ul>
		</div>     
		<div class="col-md-9">
			@if( session('change_status_successfully') )
			<div class="alert alert-success">
				{{session('change_status_successfully')}}
			</div>
			@endif
			<h2 class="text-center" style="color: #00979C">Danh sách các bài đăng</h2>
			<hr />
			<table class="table table-hover table-bordered table-striped">
				<thead>
					<tr >
						<th class="text-center">Người đăng</th>
						<th class="text-center">Tiêu đề bài viết</th>
						<th class="text-center">Thể loại</th>
						<th class="text-center">Ngày đăng</th>
						<th class="text-center">Trạng thái</th>
						<th class="text-center">Duyệt <br>bài post</th>
						<th class="text-center">Xem <br>bài post</th>
					</tr>
				</thead>
				<tbody>
					@foreach($post as $valuePost)
					<tr>
						<td>{{$valuePost->user->name}}</td>
						<td>{{$valuePost->title}}</td>
						<td>{{$valuePost->category->name}}</td>
						<td>{{$valuePost->created_at}}</td>
						{{-- status: 1->đã duyệt; 0->chưa duyệt --}}
						@if($valuePost->status == 1)
						<td style="color: #33cc33"><i class="fa fa-check" aria-hidden="true"></i> Đã duyệt</td>
						@else
						<td style="color: red"><i class="fa fa-question" aria-hidden="true"></i> Chưa duyệt</td>
						@endif
						{{-- Duyệt bài --}}
						@if($valuePost->status == 1)
						<td ><a href="{{url('admin/change_post_status')}}/{{$valuePost->id}}" style="color: red"><i class="fa fa-times" aria-hidden="true"></i> Bỏ duyệt</a></td>
						@else
						<td><a href="{{url('admin/change_post_status')}}/{{$valuePost->id}}" style="color: #33cc33"><i class="fa fa-check" aria-hidden="true"></i> Duyệt bài</a></td>
						@endif
						<td class="text-center"><a href="{{url('showpost')}}/{{$valuePost->id}}"><i class="fa fa-search" aria-hidden="true" style="color: blue"></i></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>     
		
	</div>

	@include('layouts.footer_new')

	<script>
		$('div.alert').delay(3000).slideUp(300);
	</script>
</body>
</html>