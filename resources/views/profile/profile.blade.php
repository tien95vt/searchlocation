@include('layouts.header')
<style>
	.navbar-default{
		background: #00979C;
	}
	.panel-info > .panel-heading {
    background-color: #317E8C!important;
    color: #fff !important;
	}

	.panel-default>.panel-heading {
    color: #fff;
    background-color: #317E8C;
    border-color: #317E8C;
	}
</style>
@include('layouts.menu')
<body>
<div class="container-fluid">
  <div class="row">
  <!-- <div class="col-md-6  toppad  pull-right col-md-offset-3 ">
   <br>
  </div> -->
    <div class="col-md-9">


      <div class="panel panel-info">
        <div class="panel-heading">
          <h2 class="panel-title">Thành Viên</h2>
        </div>
        <div class="panel-body" style="font-size: 16px;">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="{{asset('upload/picture/profile/').'/'.$user->Profile->avatar}}" class="img-circle img-responsive img-profile-lg"> 
              <a id='id_avatar' name="avatar" >Thay đổi ảnh đại diện <i  class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
            </div>
            
            <div class=" col-md-9 col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Tên Thành Viên</td>
                    <td>{{$user->name}} </td>
                    <td><a name="name" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                  </tr>
                  <tr>
                    <td>Ngày Sinh</td>
                    <td>{{ Carbon\Carbon::parse($user->Profile->date_of_birth)->format('d-m-Y') }}  </td>
                    <td><a name="date_of_birth" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                  </tr>
                <tr>
                  <td>Địa Chỉ</td>
                  <td>{{$user->Profile->address}}  </td>
                  <td><a name="address" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                </tr>
                  <tr>
                    <td>Facebook </td>
                    <td>{{$user->Profile->facebook}}  </td>
                    <td><a name="facebook" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                  </tr>

                  <tr>
                    <td>Email</td>
                    <td><a href="mailto:info@support.com">{{$user->email}} </a></td> 
                    <td><a name="email" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                  </tr>

                  <tr>
                    <td>Số điện thoại</td>
                    <td>{{$user->Profile->phone}} </td>
                     <td><a name="phone" class="xd"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><br>
                    </td>
                  </tr>   
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>              
                
                </tbody>
              </table>
              {{-- <a href="edit_account.php"><button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Chỉnh Sửa</button></a> --}}
            </div>
          </div>
        </div>
             <div class="panel-footer">
                    <br>
                    

                </div>
        
      </div>
    </div>
    <!-- End left -->
    <div class="col-md-3">
    	


<div class="panel-group shadowpanel-2 wow slideInRight" data-wow-offset="150" style="visibility: visible; animation-name: slideInRight;">
			  <div class="panel panel-default">
				<div class="panel-heading">
					<h4><i class="fa fa-bookmark" aria-hidden="true"></i> Bài viết mới nhất</h4>
				</div>
				<div class="panel-body">
        @foreach($post as $valuePost)
          <div class="newpost">
          <img src="{{asset('upload/picture/post/').'/'.$valuePost->photo}}" width="60px"> <a href="{{route('show_post')}}/{{$valuePost->id}}">{{$valuePost->title}}</a>
            <hr>
          </div>
        @endforeach					
        </div>
				
			  </div>
			</div>

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


</body>
{{-- @include('layouts.footer') --}}
@include('layouts.footer_new')