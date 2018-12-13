<?php
 session_start() ;
 require_once("db.php");
 $companies = $conn->getCompaniesList();
 $streets = $conn->getStreetsList();
 $areas = $conn->getAreasList();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="./images/favicon.ico" type="image/x-icon">
    <title>According to US!</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/leaflet.css" />
	<script src="js/leaflet.js"></script>
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
        	/* color:#F0FFFF;
        	background-color: #F0FFFF ; */
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
	  @keyframes ticker {
    0% { transform: translate3d(0, 0, 0); }
    100% { transform: translate3d(-100%, 0, 0); }
  }
  .tcontainer{
    width: 100%;
    overflow: hidden;
  }
  .ticker-wrap {
    width: 100%;
    padding-left: 100%;
    background-color: #D6598A;
  }
  .ticker-move {
    display: inline-block;
    white-space: nowrap;
    padding-right: 100%;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
    animation-name: ticker;
    animation-duration: 10s;
  }
  .ticker-move:hover{
    animation-play-state: paused;
  }
  .ticker-item{
    display: inline-block;
    padding: 0 2rem;
  }
  
    </style>
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">

 </head>
<body>
    <center>

	 <p align='center' id="debug" style='font-size:28px;color:maroon;overflow: auto;'><img src="./images/victory.png" align="center" > You joined this event!
	 <table border="0">
	 <tr><td align="center"> 
	 <div style="font-size:18px;">Current #participants around: 22<br/>
	 Total #participants since start: 62</div></p>
	 </td>
	 <td>&nbsp;&nbsp;&nbsp;</td>
	 <td><img src="./images/in-out.jpg"  ></td>
	 </table>

 <div id="map" style="width: 600px; height: 400px"></div>

<script>
var greenIcon = L.icon({
    iconUrl: 'js/images/marker-icon-2x-green.png',
    shadowUrl: 'js/images/marker-shadow.png',

    iconSize:     [50, 82], // size of the icon
    shadowSize:   [41, 41], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
</script>
<script>

  var map = L.map('map').setView([<?php echo $_REQUEST['latitude']; ?> , <?php echo $_REQUEST['longitude']; ?>], 13);

  L.marker([<?php echo $_REQUEST['latitude']; ?> , <?php echo $_REQUEST['longitude']; ?>], {icon: greenIcon}).addTo(map);
  
  L.tileLayer( 'https://api.mapbox.com/styles/v1/mapbox/streets-v10/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWxraWEiLCJhIjoiY2pwYmN4cnRxMnV3NTNwbzE3YjI2ZXZ5NiJ9.Jk8FwtzyVy7_79AgZQdBXA', {
   maxZoom: 18,
   attribution: 'Map data &copy; <a href="http://openstreetmap.org/"> OpenStreetMap </a> contributors, ' +
    '<a href="http://creativecommons.org/"> CC-BY-SA </a>, ' +
    'Imagery © <a href="http://mapbox.com">Mapbox</a>',
   id: 'examples.map-i875mjb7'
  }).addTo(map);
  
  $( document ).ready(function() {
	$('#searchBtn').click(function() {
	  $.ajax({
		type: "GET",
		url: "ajax.php?keyword="+$("#search").val()
	  }).done(function( data )
	  {
		var jsonData = JSON.parse(data);
		var jsonLength = jsonData.results.length;
		var html = "<ul>";
		for (var i = 0; i < jsonLength; i++) {
		  var result = jsonData.results[i];
		  html += '<li data-lat="' + result.latitude + '" data-lng="' + result.longitude + '" class="searchResultElement">' + result.name + '</li>';
		}
		html += '</ul>';
		$('#searchresult').html(html);  		
		$( 'li.searchResultElement' ).click( function() {
		  var lat = $(this).attr( "data-lat" );
		  var lng = $(this).attr( "data-lng" );
		  map.panTo( [lat,lng] );
		});
	  });
	});
   addCompanies();   
   addStreets();   
   addAreas();   
  });
  
  function addCompanies() {
   for(var i=0; i<companies.length; i++) {
    var marker = L.marker( [companies[i]['latitude'], companies[i]['longitude']]).addTo(map);
    marker.bindPopup( "<b>" + companies[i]['company']+"</b><br>Details:" + companies[i]['details'] + "<br />Telephone: " + companies[i]['telephone']);
   }
  }
  
  function stringToGeoPoints( geo ) {
   var linesPin = geo.split(",");

   var linesLat = new Array();
   var linesLng = new Array();

   for(i=0; i < linesPin.length; i++) {
    if(i % 2) {
     linesLat.push(linesPin[i]);
    }else{
     linesLng.push(linesPin[i]);
    }
   }

   var latLngLine = new Array();

   for(i=0; i<linesLng.length;i++) {
    latLngLine.push( L.latLng( linesLat[i], linesLng[i]));
   }
   
   return latLngLine;
  }
  
  function addAreas() {
   for(var i=0; i < areas.length; i++) {
	   console.log(areas[i]['geolocations']);
    var polygon = L.polygon( stringToGeoPoints(areas[i]['geolocations']), { color: 'blue'}).addTo(map);
    polygon.bindPopup( "<b>" + areas[i]['name']);   
   }
  }
  
  function addStreets() {
   for(var i=0; i < streets.length; i++) {
    var polyline = L.polyline( stringToGeoPoints(streets[i]['geolocations']), { color: 'red'}).addTo(map);
    polyline.bindPopup( "<b>" + streets[i]['name']);   
   }
  }
  
  var companies = JSON.parse( '<?php echo json_encode($companies) ?>' );
  var streets = JSON.parse( '<?php echo json_encode($streets) ?>' );
  var areas = JSON.parse( '<?php echo json_encode($areas) ?>' );
 </script>
</body>
</html>