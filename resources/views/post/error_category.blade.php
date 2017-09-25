{{-- Lỗi khi chưa có category --}}
@include('layouts.header')
<h1 class="text-center">Lỗi</h1>
<div class=" alert alert-danger text-center">
	<h3>Hiện chưa có bất kỳ thể loại nào. Bạn không thể đăng bài được.</h3>
	<a href="{{ url()->previous() }}"><strong><h1><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>Quay lại</strong></h1></a>
	<h3>Hoặc nhấn vào đây để thêm thể loại.</h3>
	<a href="{{url('add_category')}}"><strong><h1><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm thể loại</strong></h1></a>
</div>
