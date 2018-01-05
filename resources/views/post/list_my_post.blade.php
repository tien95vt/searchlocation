@include('layouts.header')
<body style="background: white">
	@include('layouts.menu')
	<div class="container-fluid">  
		<h1 class="text-center title" style="color: #00979C">Danh sách bài post của bạn </h1>
		<hr>
		@if( session('detele_successfully') )
		<div class="alert alert-success">
			{{ session('detele_successfully') }}
		</div>
		@endif 	
		<table class="table table-hover table-bordered table-striped">
			<thead>
				<tr >
					<th class="text-center">Tiêu đề bài viết</th>
					<th class="text-center">Thể loại</th>
					<th class="text-center">Ngày đăng</th>
					<th class="text-center">Trạng thái</th>
					<th class="text-center">Chỉnh sửa</th>
					<th class="text-center">Xóa</th>
					<th class="text-center">Xem bài post</th>
				</tr>
			</thead>
			<tbody>
				@foreach($post as $valuePost)
				<tr>
					<td>{{$valuePost->title}}</td>
					<td>{{$valuePost->category->name}}</td>
					@if( $valuePost->created_at )
					<td>{{$valuePost->created_at->format('d.m.Y H:i:s')}}</td>
					@else
					<td>{{$valuePost->created_at}}</td>
					@endif
					{{-- status: 1->đã duyệt; 0->chưa duyệt --}}
					@if($valuePost->status == 1)
					<td style="color: #33cc33">Đã duyệt</td>
					@else
					<td style="color: red">Chưa duyệt</td>
					@endif
					<td class="text-center"><a href="{{url('edit_my_post')}}/{{$valuePost->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: blue"></i></a></td>
					<td class="text-center"><a onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này.')" href="{{url('delete_my_post')}}/{{$valuePost->id}}"><i class="fa fa-trash" aria-hidden="true" style="color: blue"></i></a></td>
					<td class="text-center"><a href="{{url('showpost')}}/{{$valuePost->id}}"><i class="fa fa-search" aria-hidden="true" style="color: blue"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@include('layouts.footer_new')

</body>
</html>