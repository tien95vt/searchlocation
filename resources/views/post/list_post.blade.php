@include('layouts.header')
<body style="background-color: white">
	<ul>
		@foreach($post as $valuePost)
		<li class="text-center"><a href="comment/{{$valuePost->id}}">{{$valuePost->title}}</a></li>
		@endforeach
	</ul>
</body>
</html>