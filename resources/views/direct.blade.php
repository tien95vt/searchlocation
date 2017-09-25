<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Chỉ Đường</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/rolltop.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Monoton|Ubuntu" rel="stylesheet"> 
   
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
       .navbar-default{
        background: #00979C;
       }
     #map {
        height: 600px;
        width: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      #right-panel {
        height: 100%;
        float: right;
        overflow: auto;
      }
      #map {
        margin-right: 400px;
        margin-bottom: 50px;
      }
      /*#floating-panel {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }*/
      .label{
        font-size: 15px;
      }
      
      @media print {
        #map {
          height: 500px;
          margin: 0;
        }
        #right-panel {
          float: none;
          width: auto;
        }
      }
    </style>
  </head>
  <body>
    <!-- <div id="floating-panel">
    </div> -->
    @include('layouts.menu')
    <div class="row">
      <div class="col-md-12">
        <div class="start">
          <button class="btn btn-success">Vị trí xuất phát :</button><span> {{$ogrigin}}</span>
        </div>
        
        <div class="end" style="margin-top: 10px;">
          <button class="btn btn-danger" style="margin-bottom: 20px;">Vị trí đích :</button> 
          <span> {{$destination}}</span>
        </div>

        <div class="end">
          <a href="{{url('move/'.$endposition.'')}}" class="btn btn-info">
            <span class="glyphicon glyphicon-search"></span> Chỉ Đường
          </a>
          
          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div id="map"></div>
      </div>

      <div class="col-md-4">
        <div id="right-panel"></div>
    
      </div>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script>
      $( window ).load(function() {
    if (window.location.href.indexOf('reload')==-1) {
         window.location.replace(window.location.href+'?reload');
          }
      });

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi-oPYdlnMKX_sG7qB-eFhmLh9vHE41n4&callback=initMap">
    </script>
    <script>

      function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          // center: {lat: 10.885053899999999, lng: 106.7817232}
        });
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));

        // var control = document.getElementById('floating-panel');
        // control.style.display = 'block';
        // map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        window.onload = onChangeHandler;
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: '<?php echo $position; ?>',
          destination: '<?php echo $endposition; ?>',
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

    </script>
    
    @include('layouts.footer')
  </body>
</html>