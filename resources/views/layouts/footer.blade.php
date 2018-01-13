<footer>
	<div class="row">
		<div class="col-md-12 footer">
			<div class="col-md-8 col-md-offset-2 no-padding">
				
				<section class="footer-contact">
					<div class="row">
						<div class="col-md-3">
							<div class="footer-help">
								<div class="footer-help-title" style="padding: 10px 0 0 10px;color: #666">
									<a href="#"><b>Liên Hệ</b></a>
									<hr style="border-top: 1px solid #d1c9c9;">
									<p>Làm việc từ 8:00 - 22:00</p>
									<p>Phone : <strong>0974755854</strong></p>
									<p>Email: <strong>help@tina.vn</strong></p>
								</div>


							</div>
						</div>
						<div class="col-md-3">

							<div class="footer-help-title" style="padding: 10px 0 0 10px;color: #666">
								<a href="#"><b>Hỗ Trợ Khách Hàng</b></a>
								<hr style="border-top: 1px solid #d1c9c9;">
								<a href="#">FAQ & Support Centre</a><br>
								<a href=""> Suggest a Product</a><br>
								<a href="#"> Price Guarantee</a><br>
								<a href=""> Security & privacy Policy</a><br>
								<a href="#">Terms of Use</a>
							</div>
						</div>
						<div class="col-md-6" style="border-left: 1px solid #555">
							<div class="footer-help-right">
								<div class="footer-help-right-title" style="font-size: 18px; text-align: justify;">
									<p>TINA Search là một ứng dụng hỗ trợ tìm kiếm thông tin về một địa điểm, giúp người dùng tiết kiệm thời gian, hơn nữa người dùng có thêm thông tin về địa điểm mà mình cần tìm kiếm.</p>
									<p style="color: #666">At TINA we have our very own fleet of delivery vans. Your order will be packed with care at our warehouse and delivered right to your door by our friendly TINA team.</p>
								</div>
						
				</div>
						</div>
					</div>

					<div class="row" style="margin: 15px;">
						<div class="col-md-4 col-md-offset-8">
							<img src="{{asset('images/price.png')}}">
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>


	<!-- Modal check permisstion-->
	<div class="modal fade bd-example-modal-sm" id="modelCheckPermission" role="dialog">
		<div class="modal-dialog modal-sm">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="padding: 10px; text-align: center;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<i style="color: #e74c3c; font-size: 20px;" class="fa fa-2x fa-exclamation-triangle" aria-hidden="true"> VUI LÒNG NHẬP LẠI</i>
				</div>
				<div class="modal-body" style="padding: 10px; text-align: center;">
					<p>Không được để trống vị trí hoặc từ khóa cần tìm kiếm</p>
				</div>
			</div>

		</div>
	</div>

	<!-- Modal check radius-->
	<div class="modal fade bd-example-modal-sm" id="modelCheckRadius" role="dialog">
		<div class="modal-dialog modal-sm">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header"  style="padding: 10px; text-align: center;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<i style="color: #e74c3c; font-size: 20px;" class="fa fa-2x fa-exclamation-triangle" aria-hidden="true"> VUI LÒNG NHẬP LẠI</i>
				</div>
				<div class="modal-body" style="padding: 10px; text-align: center;">
					<p>Bán kính phải nằm trong khoảng từ 0 đến 50 km</p>
				</div>
			</div>

		</div>
	</div>
</footer>
<div class="scroll-top-wrapper ">
	<span class="scroll-top-inner">
		<span class="glyphicon glyphicon-chevron-up
		glyphicon glyphicon-"></span>
	</span>
</div>

<!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD0FewE444l6H8yw3-XVMOxF_kS27xIcAg
	"></script> -->
	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADPy2r5pBe_4SAKaSW5hLQFua_CiPBMzk"></script> --}}

	<script>
		function initMap() {
			autoComplete();
			var geocoder = new google.maps.Geocoder();
			document.getElementById('keyword').addEventListener('focus', function() {
				if(document.getElementById('check_click').value == 0)
				{
					//  == 0 chưa nhấn nhấn lấy vị trí hiện tại
					var address = document.getElementById('tenvitri').value;
					geocoder.geocode({'address': address}, function(results, status) {
					// if (status == google.maps.GeocoderStatus.OK) {
						if (status == 'OK') {
					// geometry.location  => Lấy lat và long 
					$('#vitri').val(results[0].geometry.location);
					// alert(results[0].geometry.location);
				} else {
					// alert('Geocode was not successful for the following reason: ' + status);
				}
			});
				}
			});
		}
	</script>

	<script type="text/javascript"> 
		var geocoder = new google.maps.Geocoder();
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
		} 
	//Get the latitude and the longitude;
	function successFunction(position) {
		var lat = position.coords.latitude;
		var lng = position.coords.longitude;
		codeLatLng(lat, lng)
	}
	function errorFunction(){
		alert("Geocoder failed");
	}
	function initialize() {
		geocoder = new google.maps.Geocoder();
	}
	function codeLatLng(lat, lng) {
		var latlng = new google.maps.LatLng(lat, lng);
		geocoder.geocode({'latLng': latlng}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
	      // console.log(results)
	      if (results[1]) {
	         //formatted address
	         // alert(results[0].formatted_address)
	        //find country name
	        for (var i=0; i<results[0].address_components.length; i++) {
	        	for (var b=0;b<results[0].address_components[i].types.length;b++) {
	        		if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
	                    //this is the object you are looking for
	                    city= results[0].address_components[i];
	                    break;
	                }
	            }
	        }
	        $('#getPosition').click(function(){
	        	$('#tenvitri').val(results[0].formatted_address);
	        	// click_check = 1: đã click
	        	$("#check_click").val(1);
	        	$('#vitri').val(lat +','+lng);
	        	$("#tenvitri").keypress(function(){
	        		//click_check = 0;  đã nhập sửa vị trí rồi
	        		$("#check_click").val(0);
	        	});	
	        });

	        document.getElementById('search').addEventListener('click',function(){

	        	if(document.getElementById('tenvitri').value == '' || document.getElementById('keyword').value == ''){
	        		$(document).ready(function(){
	        			$("#modelCheckPermission").modal();
	        		});
	        	}else{
	        		if( testRadius( $("#radius_id").val() ) == 1)
	        		{
	        			document.getElementById('timkiem').submit();
	        		}
	        	}
	        });



	        //increment khi bam nut
	        document.getElementById('search_radius').addEventListener('click',function(){
	        	var value = parseFloat(document.getElementById('radius_id').value, 10);
	        	value = isNaN(value) ? 0 : value;
	        	value+=0.5;
	        	document.getElementById('radius_id').value = value;
	        });


	        document.getElementById('keyword').onkeydown = function(e){
	        	if(e.keyCode === 13){
	        		if(document.getElementById('tenvitri').value == '' || document.getElementById('keyword').value == ''){
	        			$(document).ready(function(){
	        				$("#modelCheckPermission").modal();
	        			});
	        		}else{
		        		if( testRadius( $("#radius_id").val() ) == 1)  //Đúng radius
		        		{
		        			document.getElementById('timkiem').submit();
		        		}
		        	}

		        }
		    }



		} else {
			alert("No results found");
		}
	} else {
		alert("Geocoder failed due to: " + status);
	}
});


	}


</script>

<script src="{{asset('js/Constellation.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#menu").click(function(){
			$("#menu-left").animate({width: 'toggle'});
		});
	});
	$(document).ready(function(){
		$(function(){
			$(document).on( 'scroll', function(){
				if ($(window).scrollTop() > 150) {
					//$(".navbar-transparent").animate("background-color", "#317E8C"});
					$(".navbar-transparent").css({"background-color": "#317E8C", "transition-duration": ".5s"});
					$('.scroll-top-wrapper').addClass('show');
					$( '.navbar-brand-index' ).css({"visibility": "visible"});
				} else {
					$(".navbar-transparent").css("background-color", "transparent");
					$('.scroll-top-wrapper').removeClass('show');		
					$('.navbar-brand-index').css({"visibility": "hidden"});
					
				}
			});
			$('.scroll-top-wrapper').on('click', scrollToTop);
		});
		function scrollToTop() {
			verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
			element = $('body');
			offset = element.offset();
			offsetTop = offset.top;
			$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
		}
	});
</script>
<script type="text/javascript">
	function autoComplete(){
		var options = {  componentRestrictions: { country: 'vn' }
	};
	var input = document.getElementById('tenvitri');
	var autocomplete = new google.maps.places.Autocomplete(input,options);
      	//End auto complete
      }
  </script>

  {{-- Kiểm tra bán kính  0<R<50 km  --}}
  <script>
  	$(document).ready(function() {
  		$("#radius_id").blur(function(){
  			if( $("#radius_id").val() != "")
  			{
  				testRadius( $("#radius_id").val() );
  			}
  		});
  	});
  	function testRadius(radius){
  		if(radius == "")
  		{
  			return 1;   //Đúng
  		}
  		else if( radius <= 0)
  		{
  			$(document).ready(function(){
  				$("#modelCheckRadius").modal();
  			});
  			return 0;
  		}
  		else if( radius > 50)
  		{
  			$(document).ready(function(){
  				$("#modelCheckRadius").modal();
  			});
  			return 0;
  		}
  		else
  		{
  			return 1; //đúng
  		}
  	}
  </script>

  