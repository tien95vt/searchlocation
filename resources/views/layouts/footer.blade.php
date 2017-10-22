<footer>
	<div class="row">
		<div class="col-md-12 footer">
			<div class="col-md-8 col-md-offset-2 no-padding">
				
				<section class="footer-contact">
					<div class="row">
						<div class="col-md-2">
							<div class="footer-help">
								<div class="footer-help-title" style="padding: 10px 0 0 10px;color: #666">
									<a href="#"><b>Giúp đỡ</b></a>
									<hr style="border-top: 1px solid #d1c9c9;">
									<p>Làm việc từ 8:00am - 10:00pm Phone : <strong>0974755854</strong> or Email <strong>help@gmail.com</strong></p>
								</div>


							</div>
						</div>
						<div class="col-md-2">

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
						<div class="col-md-2">
							<div class="footer-help-title" style="padding: 10px 0 0 10px;color: #666">
								<a href="#"><b>Giới Thiệu</b></a>
								<hr style="border-top: 1px solid #d1c9c9;">	
								<a href="#">RedMArt Team</a>
								<a href="#">Press</a>
								<a href="#">Careers</a>
								<a href="#">Contact Us</a>
								<a href="#">What is Marketplace</a>
							</div>

						</div>
						<div class="col-md-2">
							<div class="footer-help-title" style="padding: 10px 0 0 10px;color: #666">
								<a href="#"><b>Các Dịch Vụ</b></a>
								<hr style="border-top: 1px solid #d1c9c9;">
								<a href="#">Sell on RedMart</a>
								<a href="#">Marketing Enquires</a>
								<a href="#">Partner Portal</a>

							</div>
						</div>
						<div class="col-md-4" style="border-left: 1px solid #555">
							<div class="footer-help-right">
								<div class="footer-help-right-title" style="font-size: 18px;">
									Hãy Kết Nối Với ITFood 
									<br>Mọi lúc , Mọi Nơi
								</div>
								<br>
								<div class="footer-help-right-app">
									<div class="app-android">

									</div>
									<br>
									<br>

								</div>

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<img src="{{asset('images/card2.png')}}">
						</div>

						<div class="col-md-4">
							<p style="color: #666">At RedMart we have our very own fleet of delivery vans. Your order will be packed with care at our warehouse and delivered right to your door by our friendly RedMart team.</p>
						</div>

						<div class="col-md-4">
							<img src="{{asset('images/price.png')}}">
						</div>
					</div>
				</section>
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
	// alert(latlng);
	geocoder.geocode({'latLng': latlng}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
      // console.log(results)
      if (results[1]) {
         //formatted address
         // alert(results[0].formatted_address);
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
        	// $('#vitri').val(lat +','+lng);
        	// alert(lat +','+lng);
        });
        document.getElementById('search').addEventListener('click',function(){
        	if( testRadius( $("#radius_id").val() ) == 1)
        	{
        		document.getElementById('timkiem').submit();
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
        		if( testRadius( $("#radius_id").val() ) == 1)  //Đúng radius
        		{
        			document.getElementById('timkiem').submit();  			
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
				if ($(window).scrollTop() > 100) {
					$('.scroll-top-wrapper').addClass('show');
				} else {
					$('.scroll-top-wrapper').removeClass('show');
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
  			alert("R<0: Bán kính phải lớn hơn 0");
  			return 0;
  		}
  		else if( radius > 50)
  		{
  			alert("R>50: Bán kính phải nhỏ hơn 50 km");
  			return 0;
  		}
  		else
  		{
  			return 1; //đúng
  		}
  	}

  </script>