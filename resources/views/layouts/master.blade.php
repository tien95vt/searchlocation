@include('layouts.header')
<body onLoad="initialize();initMap();">
	@yield('content')
</body>
@include('layouts.footer')