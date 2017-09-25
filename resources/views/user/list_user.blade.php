@include('layouts.header')
<body style="background-color: white">
	<div class="container">
		<h2>Danh sách account</h2>

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
          <button type="button " class="btn btn-primary admin" data-dismiss="modal">Admin</button>
          <button type="button" class="btn btn-success user" data-dismiss="modal">User</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</body>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <script>
 	// Nhấn vào nút thay đổi quyền -> show modal lên
 	$(document).ready(function(){
 		$(".click").click(function(){
 			var idUser = $(this).attr('id');
 			var emailUser = $(this).attr('name');
 			$("#appendName").empty().append(emailUser);
 			$("#myModal").modal('show');
 			$(".admin").click(function(){
 				$.get('change_role/1');
 			});
 			$(".user").click(function(){
 				// alert("change_role/2");
 			});
 		});
 	});
 </script>
