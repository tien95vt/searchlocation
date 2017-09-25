@include('layouts.header')
@include('layouts.menu')
<style>
	.navbar-default{
		background: #00979C;
	}
	body{
		background: #fff;
		line-height: 1.8;
		background: #EEEEEE;
	}
	.photo img{
		border-radius: 8px;
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
		
	}
	.post-content a{
		color: #333;
	}

	.clear-fix{
		clear: both;
	}

	tr, td {
		border: none
	}
</style>

<body style="background-color: white">
<div class="container">
	<h1 class="text-center">Thông tin cá nhân</h1>
	<div class="row">
		<div class="col-sm-4 ">
			<h2>Tên:</h2>
		</div>
		<div class="col-sm-8">
			<h2>{{$user->name}} <a name="name" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 ">
			<h2>Email:</h2>
		</div>
		<div class="col-sm-8">
			<h2>{{$user->email}}  <a name="email" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 ">
			<h2>Ngày sinh:</h2>
		</div>
		<div class="col-sm-8">
			<h2>{{ Carbon\Carbon::parse($user->Profile->date_of_birth)->format('d-m-Y') }}  <a name="date_of_birth" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 ">
			<h2>Địa chỉ:</h2>
		</div>
		<div class="col-sm-8">
			<h2>{{$user->Profile->address}}  <a name="address" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 ">
			<h2>Số điện thoại:</h2>
		</div>
		<div class="col-sm-8">
			<h2>{{$user->Profile->phone}}  <a name="phone" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 ">
			<h2>Facebook:</h2>
		</div>
		<div class="col-sm-8">
			<h2>{{$user->Profile->facebook}}  <a name="facebook" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 ">
			<h2>Hình đại diện:</h2>
		</div>
		<div class="col-sm-8">
			<img width="50em" height="60em" src="{{asset('upload/picture/profile/').'/'.$user->Profile->avatar}}" alt="">
			<a id='id_avatar' name="avatar" ><i  class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
		</div>
	</div>
 </div>

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thay đổi thông tin</h4>
        </div>
        <div class="modal-body">
          <input type="text" id="id_info"  class="form-control" placeholder="Nhập thông tin cần thay đổi">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="id_ok" class="btn btn-success" data-dismiss="modal" name="{{route('ajax_profile')}}">Thay đổi</button>
        </div>
      </div>
      
    </div>
  </div>
  {{-- End modal --}}

	<!-- Modal cho avatar -->
  <div class="modal fade" id="avatarModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thay đổi ảnh đại diện</h4>
        </div>
        <form action="" id="id_form_avatar" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        	<div class="modal-body">
        		<input type="file" name="n_avatar">
        	</div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="id_avatar_ok" class="btn btn-success" data-dismiss="modal" name="{{route('ajax_change_avatar')}}">Thay đổi</button>
        </div>
      </div>
      </form>
      
    </div>
  </div>
  {{-- End modal --}}

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

{{-- Modal: thay đổi profile (-avatar) --}}
<script>
	$(document).ready(function(){
		$('a.xd').click(function(){
			// info_click: Lấy thông tin thuộc tính cần sửa , vs: name, adress,...
			var atribute_click = $(this).attr('name');
			$('#myModal').modal('show');
			$('#id_ok').click(function(){
				// thông tin nhập để thay đổi
				var info_change = $('#id_info').val();
				var route_ajax = $(this).attr('name');
				$.get(route_ajax,  {atribute_click:atribute_click, info_change:info_change},function(data){
				location.reload();
			})
			});	
		});
	});
</script>

{{-- Modal thay đổi avatar --}}
<script>
	$(document).ready(function(){
		$("#id_avatar").click(function(){
			$('#avatarModal').modal('show');
			$('#id_avatar_ok').click(function(){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var url = $(this).attr('name');
				$.ajax({
					url: url,
					type: "POST",
					data : new FormData($('#id_form_avatar')[0]),
					processData: false,
					contentType: false,
					success: function(data){
						location.reload();
						// $("#idPopupEditPI .close").click();
						// $("#lolPI").html(data);
					}
				});
			});				
		});
	});
</script>

@include('layouts.footer')
</body>