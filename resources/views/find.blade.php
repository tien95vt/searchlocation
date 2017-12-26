@extends('layouts.master')
@section('content')
<!-- END PHẦN HEADER -->
<!-- BẮT ĐẦU PHẦN CONTENT -->
<?php
	 $arrayKey = array("AIzaSyDM4ohGC07gP8rsJPC3-BkPOfLqSKgaQvU", "AIzaSyAjsicLOeEsQfdF-rcc9_QBrxP7PCZrz58","AIzaSyD09hk8tNuDaJT7JdDu7NYLjSMdxdAt_6U", "AIzaSyDM59TDUtqoRyJ2sSdGXf97qCfLvfvB6uk",  "AIzaSyBdG28rxjxq78b9162r9YpfINWyzGefSys", "AIzaSyA_cKC7YzUfwQvC7nVYMgB8Gcupt5BAE8k", "AIzaSyB_Ae2YS9wkPDGGA3YpYX5Q7Sxlv-9npp0","AIzaSyCzQcMYA-9FZO4pBZAT7pw1d3U2Y75sMtE","AIzaSyAzTaGh_nkps4V7mQ2GjFqdwRwU8Ypj3xs");   //9
       
        	$key = $arrayKey[5];

?>


 

<header class="header" style="position: fixed; box-shadow: none;">
	<style>
	.navbar-default{
			/*background-color: transparent;
			border-color: transparent;*/
			margin-bottom: -10px;
		}
		
	</style>

	

	<div class="row" style="background-color: #ECF0F1;background-size: cover;background-repeat: no-repeat;">
		<div class="col-md-12" style="z-index: 200">
			<div style=" position: absolute;height: 100%;width: 100%;opacity: 0.4;"></div>
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
						<a class="navbar-brand" href="{{url('index')}}" style="font-family: 'Monoton', cursive;font-size: 30px;" href="#"><img src="./images/logo-small-single.png" alt="logo"></a>
					</div>
					
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<!-- <li><a href="#">Link</a></li> -->
					</ul>
					<ul class="nav navbar-nav navbar-right">
						{{-- Authen --}}
						@include('layouts.authen')
						@if(session('No_Category'))


						<p id="123"></p>
						@endif
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>

			<div class="row">
				<form action="{{route('getFind')}}" method="get" id="timkiem">
					<div class="col-md-12 hide-search row">
						<div class="search col-md-10 col-md-offset-1">
							<div class="col-sm-5 col-xs-12 col-md-5">
								<div style="border: 3px solid rgba(0, 0, 0, .1);" class="input-group">
									<input type="text" class="customtextbox form-control" value="{{old('positionName')}}" name="positionName" id="tenvitri" placeholder="<?php if($ogrigin != null) echo $ogrigin; else echo "Tìm kiếm..."; ?>"">
									<input type="hidden" id="vitri"  name="vitri">
									{{-- check click lấy vị trí hiện tại --}}
									<input type="hidden" id="check_click"  name="check_click">
									<input type="hidden" id="checkType"  name="checkType">
									<span class="input-group-btn">
										<button style="background-color: #317E8C" class="btn btn-secondary custombtn" id="getPosition" type="button"><span class="glyphicon glyphicon-map-marker"  style="color: #fff"></span></button>
									</span>
								</div>
							</div>

							<div class="search_radius col-sm-3 col-xs-12 col-md-3">
								<div style="border: 3px solid rgba(0, 0, 0, .1);" class="input-group">
									<input type="number" class="customtextbox form-control" value="" name="radius_name" placeholder="<?php if($ogrigin != null) echo $radius/1000; else echo "Bán kính cần tìm (km)..."; ?>" min="0.5" max="50" step="0.5" id="radius_id">
									<span class="input-group-btn">
										<button style="background-color: #317E8C" class="btn btn-secondary custombtn" type="button" id="search_radius"><span class="glyphicon glyphicon-transfer" style="color: #fff"></span></button>
									</span>
								</div>
							</div>


							<div class="search-icon col-sm-4 col-xs-12 col-md-4">
								<div style="border: 3px solid rgba(0, 0, 0, .1);" class="input-group">
									<input type="text" class="customtextbox form-control" value="{{old('keyword')}}" name="keyword" placeholder="<?php if($keyword != null) echo $keyword; else echo "Vị trí..."; ?>" id="keyword">
									<span class="input-group-btn">
										<button style="background-color: #317E8C" class="btn btn-secondary custombtn" type="button" id="search"><span class="glyphicon glyphicon-search" style="color: #fff"></span></button>
									</span>
								</div>
							</div>
							
						</div>
					</div>
				</form>

				<!-- END SEACH -->


				<!-- END PHẦN FOUR BANNER -->	
			</div>
		</div>
	</div>
</header>
<section class="content-container">
	<div class="small-gap row">
		<div class="col-md-12">
			<div id="menu-right" class="col-md-7 sidebar-right paddingHeader">
				<div class="col-md-12 realdata">
					<div class="col-md-4 col-md-offset-8" style="padding-bottom: 10px;">
						<select class="form-control" name="slType" style="box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); border-radius: 2px;">
							<option value="prioritize" <?php if ($checkType == 'prominence') {echo 'selected="selected"';} ?> >Xếp theo địa điểm nổi bật nhất</option>
							<option value="near" <?php if ($checkType == 'distance') {echo 'selected="selected"';} ?> >Xếp theo địa điểm gần nhất</option>
						</select>
					</div>
					<div class="col-md-12 no-padding detail">
					<?php
					//check type select box
					if ($checkType == 'distance') {
						$web = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$vitri.'&rankby=distance'.'&keyword='.$keyword.'&key='.$key;	
					}else{						
						$web = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$vitri.'&radius='.$radius.'&rankby=prominence'.'&keyword='.$keyword.'&key='.$key;	
					}//echo $web;
					
						$web = str_replace(' ','-',$web);
						error_reporting(0);
						  // thực thi file_get_contents
						$url = file_get_contents($web);
						// print_r($url);
						$xml = json_decode($url,true);
						// $latLongArray = mảng Lat Lng sau khi tìm kiếm
						// 0:lat, 1:lng, 2:photo, 3:name, 4:address
						$latLongArray = [[[[[]]]]];
						array_shift($latLongArray); //Xóa phần tử đầu
						$countRequest = 0;
						foreach ($xml['results'] as $value) {
							$countRequest +=1;
 // Xóa thử phần khoảng cách và time
							$lat = $value['geometry']['location']['lat'];
							$long = $value['geometry']['location']['lng'];
							$end = $lat.','.$long;
							// kiểm tra xem có photo ko;
							if(array_key_exists('photos', $value))	//có photo
							{
								foreach($value['photos'] as $arrPhoto)
								{
									$photo = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=".$arrPhoto['photo_reference']."&key=".$key;
									$countRequest +=1;
								}
							}
							else
							{
								$photo = "../public/images/pic_result_default.jpg";
							}

							$arr = array($lat, $long, $photo, $value['name'], $value['vicinity']);
							array_push($latLongArray, $arr);
							?>
							
							<div class="col-md-4 size-product">
								<div class="product-item" id="{{$end}}" >
									<div class="pi-img-wrapper">
										<img src="<?php echo $photo; ?>" width="100%" height="150px" alt="Không thể hiện thị hình" style="overflow: hidden;">
										<div>
											<a href="direct/{{$vitri}}/{{$end}}/{{$ogrigin}}/{{$value['name']}}" class="btn">Chỉ đường</a>
											<a class="btn btn_detail" id="{{$value['place_id']}}" ref_photo="{{$photo}}" name_place="{{$value['name']}}">Chi tiết</a>
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="textOverFlow" style="margin-top: 5px ;text-align: center;"> <a style="font-size: 18px;font-style: bold;" href="#"><?php echo $value['name']; ?></a></div>

										<div class="textOverFlow" style="margin-top: 5px;"><i class="fa fa-map-marker icon-color-coffee"></i> <a href="direct/{{$vitri}}/{{$end}}/{{$ogrigin}}/{{$value['name']}}"><?php echo $value['vicinity']; ?></a></div>

									</div>

								</div>
							</div>
							<?php
							
						}
						//echo $countRequest;
						?>
						<!-- END PHẦN LIST ITEM -->

					</div>
					<!-- LIST 2 -->
				</div>
				<!-- LIST 2 -->
			</div>
			<div id="menu-left" class="col-md-5 no-padding sidebar-left" style="background-color: blue">
				{{-- Map và danh sách marker --}}
				<div id="map_index" style="background-color: blue; width: 100%; height: 100%">

				</div>

				<!-- End phan side -->
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
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<p>Some text in the modal.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
</section>

{{-- Load map sau khi tìm kiếm --}}
<script>

	// json_encode => string Lat, Long => 102, 231
	var centerLatLng = <?php echo (json_encode($vitri)); ?>;

	if(centerLatLng != "")
	{
		var splitCenter = centerLatLng.split(',');
		var centerLat = Number(splitCenter[0]);
		var centerLong = Number(splitCenter[1]);
 		// alert(centerLong);
 		// biến thành mảng javascript [][] 
 		var latLongArrayJs = <?php echo json_encode($latLongArray); ?>;
 		// Load map 	
 		var uluru = {lat: centerLat, lng: centerLong};
 		var map = new google.maps.Map(document.getElementById('map_index'), {
 			zoom: 16,
 			center: uluru
        // gestureHandling: 'greedy'
        
    });
 		var bounds = new google.maps.LatLngBounds();
        // danh sách marker
        for(var i=0; i<latLongArrayJs.length; i++)
        {
        	
        	var iconBase = '../public/images/green.png';
        	var marker = new google.maps.Marker({
        		position: new google.maps.LatLng(latLongArrayJs[i][0], latLongArrayJs[i][1]),
        		// animation: google.maps.Animation.DROP,
        		map: map,
        		icon: iconBase,
        		zIndex:100000,
        		latDes: latLongArrayJs[i][0], 
        		longDes: latLongArrayJs[i][1],
        		photoMk: latLongArrayJs[i][2] ,
        		nameMk: latLongArrayJs[i][3],
        		addressMk: latLongArrayJs[i][4]
        	});
        	bounds.extend(marker.position);
        	var at = latLongArrayJs[i][2];

        	google.maps.event.addListener(marker, 'click', function () {
        		infowindow.setContent( '<div class="product-item" style="border:none;padding:0px;margin:0px;"><div class="pi-img-wrapper crop"> <img width="100%" height="100px" src=" ' + this.photoMk + ' "> <div><a href="direct/{{$vitri}}/'+ this.latDes +','+this.longDes +'/{{$ogrigin}}/'+this.nameMk+ '" class="btn">Chỉ đường</a></div></div>'+ '<div class="textOverFlow" style="margin-top: 5px ;text-align: center; font-size: 20px;font-style: bold;">'+this.nameMk+ '</div>'+'<div class="textOverFlow" style="margin: 5px; text-align: center;"><i class="fa fa-map-marker"></i> '+this.addressMk +'</div></div>');
        		infowindow.setOptions({maxWidth:200});
        		infowindow.open(map, this);
        	});

        	infowindow = new google.maps.InfoWindow();

        	google.maps.event.addListener(marker, 'mouseover', function () {
        		 this.setIcon('../public/images/red.png');
        	});
        	google.maps.event.addListener(marker, 'mouseout', function () {
        		this.setIcon('../public/images/green.png');
        	});


        	//style cho infowindow
        	google.maps.event.addListener(infowindow, 'domready', function() {
			    // Reference to the DIV that wraps the bottom of infowindow
			    var iwOuter = $('.gm-style-iw');

			    /* Since this div is in a position prior to .gm-div style-iw.
			     * We use jQuery and create a iwBackground variable,
			     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
			     */
			     var iwBackground = iwOuter.prev();

			    // Removes background shadow DIV
			    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

			    // Removes white background DIV
			    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

			    // // Moves the infowindow 115px to the right.
			    // iwOuter.parent().parent().css({left: '115px'});

			    // // Moves the shadow of the arrow 76px to the left margin.
			    // iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

			    // // Moves the arrow 76px to the left margin.
			    // iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

			    // Changes the desired tail shadow color.
			    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

			    // Reference to the div that groups the close button elements.
			    var iwCloseBtn = iwOuter.next();

			    // Apply the desired effect to the close button
			    iwCloseBtn.css({opacity: '0.8', right: '26px', top: '17px', 'border-radius': '0px', 'box-shadow': '0 0 5px #3990B9'});

			    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
			    if($('.iw-content').height() < 140){
			    	$('.iw-bottom-gradient').css({display: 'none'});
			    }

			    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
			    iwCloseBtn.mouseout(function(){
			    	$(this).css({opacity: '1'});
			    });
			});

        }
        map.fitBounds(bounds);
        //close infowindow
        google.maps.event.addListener(map, 'click', function() {
        	infowindow.close();
        });
        // marker center
        var iconBase = '../public/images/blue.png';
        var markerCenter = new google.maps.Marker({
        	position: uluru,
        	zIndex: 10000000000,
        	map: map,
        	icon: iconBase
        });
        //set infowindow markercenter
        google.maps.event.addListener(markerCenter, 'click', function () {
        		infowindow.setContent('<div class="changeclose"><div class="gm-style-iw" style="border:none;padding:10px;">'+ '{{$ogrigin}}' +'</div></div>');
        		infowindow.setOptions({maxWidth:250});
        		infowindow.open(map, this);
        	});
        	

        // Array Marker
        var markerArray ={};
        // Rê chuột vào kết quả tìm kiếm hiển thị marker
        $(document).ready(function(){
        	$(".product-item").mouseover(function(){
        		var mouseLatLng = $(this).attr('id');
        		mouseLatLng = mouseLatLng.split(',');
        		var mouseLat = Number(mouseLatLng[0]);
        		var mouseLng = Number(mouseLatLng[1]); 
        		// Tạo marker
        		addNewmaker(mouseLat, mouseLng);
        	});
        });
        function addNewmaker(lat, lng){
        	var iconBase = '../public/images/red.png';
        	var posNew = {lat: lat, lng: lng};
        	var markerNew = new google.maps.Marker({
        		position: posNew,
        		map: map,
        		zIndex: 10000000,
        		icon :iconBase
        	});
        	// delete marker khi rê chuột ra
        	$(".product-item").mouseout(function(){
        		markerNew.setMap(null);
        	});   	

        }

        


    }


//change item select box
		$('select').on('change', function() {
			if(this.value == 'near'){	
				document.getElementById('tenvitri').value = '<?php echo $ogrigin; ?>';	
				document.getElementById('vitri').value = '<?php echo $vitri; ?>';
				document.getElementById('keyword').value = '<?php echo $keyword; ?>';
				document.getElementById('radius_id').value = '<?php echo $radius/1000; ?>';
				document.getElementById('checkType').value = 'distance';		  	
				document.getElementById('timkiem').submit(); 	
			}if(this.value == 'prioritize'){

				document.getElementById('tenvitri').value = '<?php echo $ogrigin; ?>';
				document.getElementById('vitri').value = '<?php echo $vitri; ?>';
				document.getElementById('keyword').value = '<?php echo $keyword; ?>';
				document.getElementById('radius_id').value = '<?php echo $radius/1000; ?>';
				document.getElementById('checkType').value = 'prominence';	
				document.getElementById('timkiem').submit(); 
			}
		});


		// place detail
	$(document).ready(function() {
		$(".btn_detail").click(function(){
			var place_id = $(this).attr('id');
			var ref_photo = $(this).attr('ref_photo');
			var name_place = $(this).attr('name_place');
			// alert(ref_photo);
			var request = {
				placeId: place_id
			};
			var service = new google.maps.places.PlacesService(map);
			service.getDetails(request, callback);
			function callback(place, status){
				if (status == google.maps.places.PlacesServiceStatus.OK) {
					// open_hour gio mở cửa
					if(typeof place.opening_hours == 'undefined')
					{
						// giờ trong tuần
						var hour_daily = "";
						// Giờ hnay
						var day_hour_current = "";
						// nút collapse
						var detail_hour_collapse = "";
						// chữ hôm nay
						var today_text ="";
					}
					else
					{
						var d = new Date();
						var n = d.getDay(); //n = thứ trong tuần . 0 -> sunday
						if(n == 0)
						{
							n = 6; //sunday ->array
						}
						else
						{
							n = n - 1;
						}
						var open_hour = place.opening_hours.weekday_text;
						var hour_daily = "";
						for(var i=0; i<open_hour.length; i++)
						{
							var temp_day = place.opening_hours.weekday_text[i];
							// thứ
							var day = temp_day.slice(0, temp_day.indexOf(":"));
							// giờ
							var hour = temp_day.slice(temp_day.indexOf(":")+1, temp_day.length+1 );
							// thứ + giờ hoàn chỉnh
							hour_daily = hour_daily + '<span style=" width:95px; display:block; float:left;">'+ day + '</span> <span>'+ hour + ''+ '</span>' + '<br>';
							if(i == n)	//Lấy thời gian của thú hiện tại
							{
								var temp_day_current = place.opening_hours.weekday_text[n];
								var day_current = temp_day_current.slice(0, temp_day_current.indexOf(":"));
								// giờ
								var hour_current = temp_day_current.slice(temp_day_current.indexOf(":")+1, temp_day_current.length+1 );
								var day_hour_current = '<strong>'+ '<span style=" width:95px; display:block; float:left;">'+ day_current + '</span> <span>'+ hour_current + ''+ '</span>'+ '</strong>';
								// nút collapse
								var detail_hour_collapse = '<a  style="margin-left: 93px;" data-toggle="collapse" data-target="#demo">Chi tiết trong tuần</a>'
									+'<span class="caret"></span>';
								var today_text = '<span style=" margin-right: 10px;; float:left"> Hôm nay: </span>';
							}
						}						
				}
					// var detail = place.opening_hours.weekday_text.Monday;
					// sdt
					if(typeof place.international_phone_number == 'undefined')
					{
						phone_number = "";
					}
					else
					{
						var phone_number = place.international_phone_number;
					}
					// địa chỉ
					if(typeof place.formatted_address == 'undefined')
					{
						adress = "";
					}
					else
					{
						var adress = place.formatted_address;
					}	
					// đánh giá trung bình
					if(typeof place.rating == 'undefined')
					{
						rate_image = "";
					}
					else
					{
						var rate_average = place.rating;
						// Làm tròn
						var round_rate = Math.round(rate_average);
						var rate_image = "";
						for(var r=0; r<round_rate; r++)
						{
							rate_image = rate_image+ '<span class="fa fa-star checked" style="color: orange"></span>'
						}
						for(var r=5; r>round_rate; r--)
						{
							rate_image = rate_image+ '<span class="fa fa-star checked"></span>'
						}
					}
					
					// review
					if(typeof place.reviews == 'undefined')
					{
						var review = "Không có bất cứ nhận xét nào";
					}
					else
					{
						var reviewCount = Object.keys(place.reviews).length;
						// alert(typeof reviewCount)
						var review = "Có "+ reviewCount.toString() +" nhận xét từ google. "+ '<img src="./images/google.jpg" alt="GG" style="width: 20px; height: 20px;">'
							+'<div class="row">'
							+ "<div class='col-md-12'>"
							+'<a data-toggle="collapse" data-target="#comment_collase">Xem Chi tiết</a>'
							+'<span class="caret"></span>'
							+'<div id="comment_collase" class="collapse">'
			
							// Phần bình luận
							var name = [];
							var avatar = [];
							var rate = [];
							var relative_time_description = [];
							var text_comment = [];
							for(var i=0; i<reviewCount; i++)
							{
								name[i] = place.reviews[i].author_name;
								avatar[i] = place.reviews[i].profile_photo_url;
								rate[i] = place.reviews[i].rating;
								relative_time_description[i] = place.reviews[i].relative_time_description;
								text_comment[i] = place.reviews[i].text;
								// Phần bình luận 1
								review = review + "" 
								+'<div class="col-sm-12">'
				+'<div class="panel panel-white post panel-shadow">'
						+'<div class="post-heading">'
						+'<div class="pull-left image">'
							+'<img src="'+ avatar[i]+'" width="60px" height="60px" alt="no_pic">'
						+'</div>'
						+'<div class="pull-left meta">'
							+'<div class="title h5">'
								+'<a href="#"><b>'+ name[i]+ '</b></a>'
							+'</div>'
							+'<h6 class="text-muted time">'+ relative_time_description[i]+'</h6>'
						+'</div>'
					+'</div> '
					+'<div class="post-description"> '
						for(var tmp_r = 0; tmp_r<rate[i]; tmp_r++)
						{
							review = review +'<span class="fa fa-star checked" style="color: orange"></span>'
						}
						for(var tmp_r = 5; tmp_r>rate[i]; tmp_r--)
						{
							review = review +'<span class="fa fa-star checked" ></span>'
						}
						review = review 
						+'<p>'+ text_comment[i]+ '</p>'
					+'</div>'

					+'</div>'
				+'</div>'
			// End Phần bình luận 1
							}
							// collapse
							review = review+'</div>'
							+ "</div>"
							+ "</div>";
				}
			}
				$("#myModal").on("shown.bs.modal", function () {  //Tell what to do on modal open
					var content_header = ""
					+ "<div class='row'>"
					+ "<div class='col-md-12'>"
					+ "<img height='200px' width='100%' src='" + ref_photo+ "'" + ">" 
					+ "</div>"
					+ "</div>"
					+ "<div class='row'>"
					+ "<div class=' col-md-12'>"
					+ "<h3 class='text-center'>" +name_place +"</h3>"
					+ "</div"
					+ "</div"
					+ "<div class='row'>"
					+ "<div class=' col-md-12'>"
					+ "<h3 style='margin-top: 0px;' class='text-center'>" +rate_image +"</h3>"
					+ "</div"
					+ "</div";
					var content_body = ""
					+ "<div class='row'>"
					+ "<div class='col-md-12'>"
					+ '<i class="fa fa-phone" aria-hidden="true" style="margin-right: 10px"></i>'+ phone_number
					+ "</div>"
					+ "</div>"
					+ "<div class='row'>"
					+ "<div class='col-md-12'>"
					+ '<i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 10px; "></i>'+ adress
					+ "</div>"
					+ "</div>"
					+ "<div class='row'>"
					+ "<div class='col-md-12'>"
					+ '<i class="fa fa-clock-o" aria-hidden="true" style="margin-right: 10px; float:left"></i>' 
					+ today_text
					+ day_hour_current
					+ "</div>"
					+ "</div>"
					+"<div class='row'>"
					+ "<div class='col-md-12'>"
					+detail_hour_collapse
					+'<div id="demo" class="collapse" style="margin-left: 93px;">'
					+ hour_daily
					+'</div>'
					+ "</div>"
					+ "</div>"
					+ "<div class='row'>"
					+ "<div class='col-md-12'>"
					+ '<i class="fa fa-commenting-o" aria-hidden="true" style="margin-right: 10px"></i>'+ review
					+ "</div>"
					+ "</div>"
					$(this).find('.modal-title').html(content_header);
					$(this).find('.modal-body').html(content_body);
        		}).modal('show'); //open the modal once done

			}
			// alert(123);

		});
	});
	
	

    
</script>
<!-- XONG PHẦN CONTENT -->
@endsection

