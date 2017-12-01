{{-- Begin thông tin user --}}
@if(Auth::check())
{{-- biến $user --}}
@php
$user = App\User::find(Auth::user()->id);
@endphp
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="img-circle img-profile-sm"  src="{{asset('upload/picture/profile/').'/'.$user->profile->avatar}}" alt=""><span style="padding-left: 0.5em"></span>{{Auth::user()->name}} <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li>
			<a href="{{asset('profile')}}/{{Auth::user()->id}}"><i class="fa fa-user" aria-hidden="true"></i><span style="padding-left: 1.5em">Thông Tin Cá Nhân</span></a>
		</li>

		<li>
			<a href="{{asset('profile')}}/{{Auth::user()->id}}"><i class="fa fa-cog" aria-hidden="true"></i><span style="padding-left: 1.5em">Cập Nhật Thông Tin Cá Nhân</span></a>
		</li>

		<li><a href="logout"><i class="fa fa-sign-out" aria-hidden="true"></i><span style="padding-left: 1.5em">Đăng xuất</span></a></li>
	</ul>
</li>
{{-- Kiểm tra quản trị viên: role =1 --}}

@if($user->role == 1)
<li style="margin-top: 10px; margin-right: 5px"><button style="background-color: #39e600;" class="btn"><a href="{{url('admin/list_post')}}" style="color:white">Quản trị </a></button></li>
@endif
<li style="margin-top: 10px;"><button style="background-color: #317E8C;" class="btn"><a href="add_post" style="color:white">Đăng Bài</a></button></li>
@else
{{-- End thông tin user --}}
<li><a style="color:white" href="register_form">Đăng Ký</a></li>
<li><a style="color:white" href="login_form">Đăng Nhập</a></li>
@endif