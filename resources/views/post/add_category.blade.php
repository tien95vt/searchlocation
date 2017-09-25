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
	<h2 class="text-center">Thêm thể loại</h2>
	
	{{-- Xuất thông báo về đăng bài --}}
			@if( count($errors)>0 )
			<div class="alert alert-danger">
				@foreach($errors->all() as $arr)
				<li>{{$arr}}</li>
				@endforeach
			</div>
			@endif
			@if(session('Success_Add_Cat'))
				<div class="alert alert-success">
					{{session('Success_Add_Cat')}}
				</div>
			@endif


		<form action="{{route('proccess_add_category')}}" method="post">
		{{csrf_field()}}
		<div class="col-md-10 col-md-offset-1">
			<div class="form-group">
				<label for="">Tên thể loại:</label>
				<input type="text" class="form-control" id="" placeholder="Nhập tên thể loại" name="n_category" value="{{old('n_category')}}">
			</div>
			<button  style="margin-bottom: 20px; " type="submit" class="btn btn-primary">Submit</button>
		</div>
		</form>
	</div>

	
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
@include('layouts.footer')

</body>