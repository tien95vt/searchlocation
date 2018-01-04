@include('layouts.header')
@include('layouts.menu')
<body style="background-color: white">
	<div class="container-fluid">
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked" role="tablist" style="width: 200px;">
				<li ><a href="{{ url('admin') }}">Admin</a></li>
				<li><a href="{{ url('admin/list_post') }}">Quản trị bài post</a></li>
				<li class="active"><a href="{{ url('admin/list_user') }}">Quản lý user</a></li>
				<li><a href="#">About</a></li>        
			</ul>
		</div>
		<div class="col-md-9">
			<h2 class="text-center" style="color: #00979C">Danh sách account</h2>
			<hr>
			<table class="table table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên</th>
						<th>Email</th>
						<th>Quyền</th>
						<th>Thay đổi quyền</th>
					</tr>
				</thead>
				<tbody>
					@php
					$i=1
					@endphp
					@foreach($user as $valueUser)
					<tr>
						<td width="5%">{{$i++}}</td>
						<td>{{$valueUser->name}}</td>
						<td>{{$valueUser->email}}</td>
						{{-- role: 0= user; 1= admin --}}
						<td>
							@if($valueUser->role == 1)
							Admin
							@else
							User
							@endif
						</td>
						<td width="15%"><a class="click" id="{{$valueUser->id}}" name="{{$valueUser->email}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="">Thay đổi quyền: <span id="appendName"></span> </h4>
				</div>
				<div class="modal-body">
					<p>Vui lòng chọn quyền bạn muốn thay đổi.</p>
					<button type="button " class="btn btn-primary admin" data-dismiss="modal" addr="{{route('change_role')}}" attr_click="1">Admin</button>
					<button type="button" class="btn btn-success user" data-dismiss="modal" addr="{{route('change_role')}}" attr_click="0">User</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>

	@include('layouts.footer_new')

</body>




<script>
 	// Nhấn vào nút thay đổi quyền -> show modal lên
 	$(document).ready(function(){
 		$(".click").click(function(){
 			var idUser = $(this).attr('id');
 			var emailUser = $(this).attr('name');
 			$("#appendName").empty().append(emailUser);
 			$("#myModal").modal('show');
 			$(".admin").click(function(){
 				var route_ajax =  $(this).attr('addr');
 				var new_role = $(this).attr('attr_click');
 				$.get(route_ajax, {idUser:idUser, new_role:new_role}, function(data){
 					location.reload();
 				});
 			});
 			$(".user").click(function(){
 				var route_ajax =  $(this).attr('addr');
 				var new_role = $(this).attr('attr_click');
 				$.get(route_ajax, {idUser:idUser, new_role:new_role}, function(data){
 					location.reload();
 				});
 			});
 		});
 	});
 </script>