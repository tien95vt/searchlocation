@include('layouts.header')
<body style="background: white">
	@include('layouts.menu')
	<div class="container-fluid">  
		<div class="col-md-3">
			<ul class="nav nav-pills nav-stacked" role="tablist" style="width: 200px;">
				<li class="active"><a href="{{ url('admin') }}">Admin</a></li>
				<li><a href="{{ url('admin/list_post') }}">Quản trị bài post</a></li>
				<li><a href="{{ url('admin/list_user') }}">Quản lý user</a></li>
				<li><a href="#">About</a></li>        
			</ul>
		</div>     
		<div class="col-md-9">
			{{-- ......................... --}}
		</div>     
		
	</div>

	@include('layouts.footer_new')

</body>
</html>