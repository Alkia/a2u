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
        	color:#F0FFFF;
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
        	color:#000000;
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/leaflet.css" />
	<script src="js/leaflet.js"></script>
</head>

<body onload="getLocation()">
    <center>
        <h1 style='color:maroon'>Add an event</h1>

        <p align='center' id="demo" style='font-size:8px;color:maroon'></p>
 
<form action="addeventdb.php" method="post" id="ChoseEvent" class="ChoseEvent">
<input type="hidden" name="guid"  id="guid" value="<?php echo $_REQUEST['guid']; ?>">
<input type="hidden" name="date"  id="date" value="<?php echo $_REQUEST['date']; ?>">
   <table cellpadding="5" cellspacing="0" border="0">
    <tbody>
     <tr align="left" valign="top">
      <td align="left" valign="top">Event name</td>
      <td align="left" valign="top"><input type="text" name="eventname" /></td>
     </tr>
     <tr align="left" valign="top">
      <td align="left" valign="top">Description</td>
      <td align="left" valign="top"><textarea name="details"></textarea></td>
     </tr>
	 <tr align="left" valign="top">
      <td align="left" valign="top">Event start date</td>
      <td align="left" valign="top"><input type="date" name="eventstartday" onchange="updateDateEnd()"></td>
     </tr>
	 <tr align="left" valign="top">
      <td align="left" valign="top">Event start time</td>
      <td align="left" valign="top"><input <input type="time" name="eventstarttime" value="09:00"></td>
     </tr>	
	 <tr align="left" valign="top">
      <td align="left" valign="top">Event end date</td>
      <td align="left" valign="top"><input type="date" name="eventendday"></td>
     </tr>
	 <tr align="left" valign="top">
      <td align="left" valign="top">Event end time</td>
      <td align="left" valign="top"><input <input type="time" name="eventendtime" value="22:00"></td>
     </tr>		 
     <tr align="left" valign="top">
      <td align="left" valign="top">Latitude (Drag on the map under) </td>
      <td align="left" valign="top"><input id="lat" type="text" name="latitude" /></td>
     </tr>
     <tr align="left" valign="top">
      <td align="left" valign="top">Longitude (Drag on the map under) </</td>
      <td align="left" valign="top"><input id="lng" type="text" name="longitude" /></td>
     </tr>
     <tr align="left" valign="top">
      <td align="left" valign="top">Authorization Key (Get it by SMS) </td>
      <td align="left" valign="top"><input type="text" name="AuthorizationKey" /></td>
    </tr>
	<tr align="left" valign="top">
	  <td align="left" valign="top">Keywords / #tags </td>
	  <td align="left" valign="top"><textarea name="keywords"></textarea></td>
	</tr>
    <tr align="left" valign="top">
     <td align="left" valign="top"></td>
     <td align="left" valign="top"><input type="submit" value="Save Event!"></td>
    </tr>
   </tbody>
  </table>
 </form><br/>
 <div id="map" style="width: 500px; height: 300px"></div>
 <script>
  var map = L.map('map').setView([<?php echo $_REQUEST['latitude']; ?> , <?php echo $_REQUEST['longitude']; ?>], 13);
  
  L.tileLayer( 'https://api.mapbox.com/styles/v1/mapbox/streets-v10/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWxraWEiLCJhIjoiY2pwYmN4cnRxMnV3NTNwbzE3YjI2ZXZ5NiJ9.Jk8FwtzyVy7_79AgZQdBXA', {
   maxZoom: 18,
   attribution: 'Map data &copy; <a href="http://openstreetmap.org/"> OpenStreetMap </a> contributors, ' +
    '<a href="http://creativecommons.org/"> CC-BY-SA </a>, ' +
    'Imagery © <a href="http://mapbox.com">Mapbox</a>',
   id: 'examples.map-i875mjb7'
  }).addTo(map);
   
  function putDraggable() {
   /* create a draggable marker in the center of the map */
   draggableMarker = L.marker([ map.getCenter().lat, map.getCenter().lng], {draggable:true, zIndexOffset:900}).addTo(map);
   
   /* collect Lat,Lng values */
   draggableMarker.on('dragend', function(e) {
    $("#lat").val(this.getLatLng().lat);
    $("#lng").val(this.getLatLng().lng);
   });
  }
   
  $( document ).ready(function() {
   putDraggable();
  });

  
window.onload= function(){
		oFormObject = document.forms['ChoseEvent'];
		oFormObject.elements["eventstartday"].value =(new Date()).toISOString().substr(0,10));
		oFormObject.elements["eventendday"].value=(new Date()).toISOString().substr(0,10));
}

function updateDateEnd(){
	oFormObject = document.forms['ChoseEvent'];
	oFormObject.elements["eventendday"].value = oFormObject.elements["eventstartday"].value;
}


</script>
 </script>
 </center>
</body>
</html>