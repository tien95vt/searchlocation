<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button id="menu" type="button" class="navbar-toggle" data-toggle="collapse"><span class="glyphicon glyphicon-align-justify"></span></button>

      <button type="button" id="hide-toggle" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" style="font-family: 'Monoton', cursive;font-size: 30px;" href="{{route('getPosition')}}">ITFood</a> -->
      <a class="navbar-brand" style="font-family: 'Monoton', cursive;font-size: 30px;" href="{{url('index')}}">ITFood</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <!-- <li><a href="#">Link</a></li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        {{-- Begin thông tin user --}}
            @if(Auth::check())
            {{-- biến $user --}}
            @php
            $user = App\User::find(Auth::user()->id);
            @endphp
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img width="25em" height="20em"  src="{{asset('upload/picture/profile/').'/'.$user->profile->avatar}}" alt=""><span style="padding-left: 0.5em"></span>{{Auth::user()->name}} <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                <a href="{{asset('profile')}}/{{Auth::user()->id}}"><i class="fa fa-user" aria-hidden="true"></i><span style="padding-left: 1.5em">Thông Tin Cá Nhân</span></a>
                </li>

                <li>
                <a href="{{asset('profile')}}/{{Auth::user()->id}}"><i class="fa fa-cog" aria-hidden="true"></i><span style="padding-left: 1.5em">Cập Nhật Thông Tin Cá Nhân</span></a>
                </li>

                <li><a href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i><span style="padding-left: 1.5em">Logout</span></a></li>
              </ul>
            </li>
            <li style="margin-top: 10px;"><button class="btn btn-success"><a href="{{url('add_post')}}" style="color:white">Đăng Bài</a></button></li>
            @else
            {{-- End thông tin user --}}
            <li><a href="{{url('register_form')}}">Đăng Ký</a></li>
            <li><a href="{{url('login_form')}}">Đăng Nhập</a></li>
            <li style="margin-top: 10px;"><button class="btn btn-success"><a href="{{url('add_post')}}" style="color:white">Đăng Bài</a></button></li>
            @endif
            @if(session('No_Category'))
              <p id="123"></p>
            @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>