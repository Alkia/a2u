<?php

require_once("db.php");

$eventname = strip_tags($_POST['eventname']);
$details = strip_tags($_POST['details']);
$eventday  = strip_tags($_POST['eventday']);
$latitude = strip_tags($_POST['latitude']);
$longitude = strip_tags($_POST['longitude']);
$telephone = strip_tags($_POST['telephone']);
$keywords = strip_tags($_POST['keywords']);
$AuthorizationKey = strip_tags($_POST['AuthorizationKey']);
$guid = strip_tags($_POST['guid']);
$devicedate = strip_tags($_POST['date']);

//print_r($_POST);
//echo "var:" . $keywords . $eventday;
$conn->addEvent($eventname, $details, $latitude, $longitude, $telephone, $keywords, $eventday, $AuthorizationKey, $guid, $devicedate );

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>According to US!!!</title>
    <style>
        @font-face {
            font-family: 'Roboto';
            src: url('Roboto-ThinItalic-webfont.eot');
            src: url('Roboto-ThinItalic-webfont.eot?#iefix') format('embedded-opentype'),
                 url('Roboto-ThinItalic-webfont.woff') format('woff'),
                 url('Roboto-ThinItalic-webfont.ttf') format('truetype'),
                 url('Roboto-ThinItalic-webfont.svg#RobotoThinItalic') format('svg'); (under the Apache Software License). 
            font-weight: 200;
            font-style: italic;
        }
        
        body { 
            background-image: url('./images/background1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center bottom; 
        	font-family: Arial, Helvetica, sans-serif;
        	color:#F0FFFF;
        	background-color: #F0FFFF ;
        	align: center;
        }
        
        
        .formRight select {
            background: none repeat scroll 0 0 #FFFFFF;
            border: 1px solid #E5E5E5;
            border-radius: 10px 10px 10px 10px;
            box-shadow: 0 0 10px #E8E8E8 inset;
            height: 40px;
            margin: 0 0 0 25px;
            padding: 10px;
            width: 110px;
        }
        
        .myButton {
        	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24537), color-stop(1, #c62d1f));
        	background:-moz-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        	background:-webkit-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        	background:-o-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        	background:-ms-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        	background:linear-gradient(to bottom, #f24537 5%, #c62d1f 100%);
        	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24537', endColorstr='#c62d1f',GradientType=0);
        	background-color:#f24537;
        	-moz-border-radius:28px;
        	-webkit-border-radius:28px;
        	border-radius:28px;
        	border:1px solid #d02718;
        	display:inline-block;
        	cursor:pointer;
        	color:#ffffff;
        	font-family:Arial;
        	font-size:17px;
        	padding:16px 31px;
        	text-decoration:none;
        	text-shadow:0px 1px 0px #810e05;
        }
        .myButton:hover {
        	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24537));
        	background:-moz-linear-gradient(top, #c62d1f 5%, #f24537 100%);
        	background:-webkit-linear-gradient(top, #c62d1f 5%, #f24537 100%);
        	background:-o-linear-gradient(top, #c62d1f 5%, #f24537 100%);
        	background:-ms-linear-gradient(top, #c62d1f 5%, #f24537 100%);
        	background:linear-gradient(to bottom, #c62d1f 5%, #f24537 100%);
        	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24537',GradientType=0);
        	background-color:#c62d1f;
        }
        .myButton:active {
        	position:relative;
        	top:1px;
        }
        
        box2 {
         height: 150px;
         width: 150px;
        }
		
		.ChoseEvent {
		    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24537), color-stop(1, #c62d1f));
        	background:-moz-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        	background:-webkit-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        	background:-o-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        	background:-ms-linear-gradient(top, #f24537 5%, #c62d1f 100%);
        	background:linear-gradient(to bottom, #f24537 5%, #c62d1f 100%);
        	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24537', endColorstr='#c62d1f',GradientType=0);
        	background-color:#f24537;
        	-moz-border-radius:28px;
        	-webkit-border-radius:28px;
        	border-radius:28px;
        	border:1px solid #d02718;
        	display:inline-block;
        	cursor:pointer;
        	color:#ffffff;
        	font-family:Arial;
        	font-size:17px;
        	padding:16px 31px;
        	text-decoration:none;
        	text-shadow:0px 1px 0px #810e05;
		}
		.ChoseEventOption {
		    font-family:Arial;
        	font-size:17px;
        	padding:10px 20px;
			text-decoration:none;
        	text-shadow:0px 1px 0px #810e05;
			height:40px;
			width:150px;
			color:maroon;
		}
    </style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
 <body>
  <p align='center' id="debug" style='font-size:28px;color:maroon'><img src="./images/victory.png" id="responsive-image" >Event has been added ! </p>
 </body>
</html>