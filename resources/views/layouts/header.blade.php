<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ITFood</title>
    <script src="{{asset('js/jquery.js')}}"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/rolltop.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"> -->
    
    
	<link href="https://fonts.googleapis.com/css?family=Monoton|Ubuntu" rel="stylesheet">  
    {{-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyD0FewE444l6H8yw3-XVMOxF_kS27xIcAg"></script>  --}}
    {{-- sua key --}}
    <?php
        $arrayKey = array("AIzaSyAjsicLOeEsQfdF-rcc9_QBrxP7PCZrz58", "AIzaSyDM4ohGC07gP8rsJPC3-BkPOfLqSKgaQvU", "AIzaSyDM59TDUtqoRyJ2sSdGXf97qCfLvfvB6uk", "AIzaSyD09hk8tNuDaJT7JdDu7NYLjSMdxdAt_6U", "AIzaSyBdG28rxjxq78b9162r9YpfINWyzGefSys", "AIzaSyA_cKC7YzUfwQvC7nVYMgB8Gcupt5BAE8k", "AIzaSyB_Ae2YS9wkPDGGA3YpYX5Q7Sxlv-9npp0", "AIzaSyCzQcMYA-9FZO4pBZAT7pw1d3U2Y75sMtE", "AIzaSyAzTaGh_nkps4V7mQ2GjFqdwRwU8Ypj3xs");   //8
        $key = $arrayKey[8];
        $source= "http://maps.googleapis.com/maps/api/js?libraries=places&language=vi&region=VN&key=".$key;
    ?>

    <script type="text/javascript" src= "<?php echo $source;?>"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Monoton|Ubuntu" rel="stylesheet">  
    <!-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyB1R-BXoJrqQYkjReXGvPsWo_FZv8bgF1w"></script>   -->
    <script type="text/javascript" language="javascript" src="{{asset('ckeditor/ckeditor.js')}}" ></script>

</head>
