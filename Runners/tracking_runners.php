<?php
session_start();
$start_time = date("Y-m-d H:i:s");
$_SESSION['fud_fill']['page_parent']="Runners";
$_SESSION['fud_fill']['page_title']="Runner Tracking";

$_SESSION['fud_fill']['page_name']="tracking_runners.php";

$menu_active = array('','','','','','');

$menu_active[1] = "active"; 
?>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<link type="text/css" rel="stylesheet" href="../css/map.css">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<script src="../js/markerwithlabel.js" type="text/javascript"></script>
<style>
	#loading_image{
		position: absolute;
  		left: 50%;
  		top: 50%;
	}
	
	.marker_label {
		color: red;
     	font-family: "Lucida Grande", "Arial", sans-serif;
     	font-size: 15px;
		font-weight : bold;
     	text-align: center;
     	white-space: nowrap;
   	}
	
	#infowindow_div{
		padding-radius : 5px;
		font-size : 12px;
		font-weight : bold;
		min-height : 30px;
		overflow: auto;
	}
	
	/** FIX for Bootstrap and Google Maps Info window styes problem **/
img[src*="gstatic.com/"], img[src*="googleapis.com/"] {
max-width: none;
}
	
</style>

<script>
var geocoder;
var map;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

function initialize()
{
	directionsDisplay = new google.maps.DirectionsRenderer();
		
	var mapOptions = {
		zoom: 12,
		mapTypeId: google.maps.MapTypeId.TERRAIN
  	}
  	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  	directionsDisplay.setMap(map);
  
  	// Try HTML5 geolocation
  	if(navigator.geolocation)
	{
    	navigator.geolocation.getCurrentPosition(function(position) {
      		var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);

      		var infowindow = new google.maps.InfoWindow({
        		map: map,
        		position: pos,
        		content: "Hi <?=ucfirst($_SESSION['fud_fill']['user_name'])?> <br> You are here"
      		});

      		map.setCenter(pos);
    	}, function() {	handleNoGeolocation(true); });
	} 
	else 
	{
		// Browser doesn't support Geolocation
		handleNoGeolocation(false);
	}
}
	
function locate_runners() 
{
	document.getElementById('map-canvas').innerHTML = "<center><img src='../images/loading.GIF' id='loading_image'></center>";
	
	$.ajax({ 
		url        : 'runners_location_ajax.php',
        type       : 'POST',
        success    : function(data){
			
			var markers = jQuery.parseJSON(data);
			
			var centerMap = new google.maps.LatLng(markers[0]['runner_latest_latt'], markers[0]['runner_latest_lng']);
			
			var myOptions = {
				zoom: 13,
				center: centerMap,
				mapTypeId: google.maps.MapTypeId.TERRAIN
			}

    		var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
	
			infowindow = new google.maps.InfoWindow({
    			content: "loading...",
				maxWidth: 300,
				
    		});

    		for (var i = 0; i < markers.length; i++)
			{
    			var sites = markers[i];
				var image = '../images/icons/Icon_bike.png';
        		var siteLatLng = new google.maps.LatLng(sites['runner_latest_latt'], sites['runner_latest_lng']);
				
				var html_content = '<div id="infowindow_div">'+
				'<table><tr><td>Name </td><td>: '+ sites['runner_name'] + 
				'</td></tr>'+
				'<tr><td>Contact </td><td>: '+ sites['runner_contact'] + 
				'</td></tr>'+
				'<tr><td>Updated </td><td>: '+ sites['location_updated_at'] + 
				'</td></tr>	</table>' +
				'</div>';
				
				var marker = new MarkerWithLabel({
					position: siteLatLng,
       				map: map,
	   				icon : image,
       				labelContent: sites['runner_name'],
					html: html_content,
       				labelAnchor: new google.maps.Point(22, 0),
       				labelClass: "marker_label", // the CSS class for the label
       				labelInBackground: false,
					animation: google.maps.Animation.DROP
     			});

       			google.maps.event.addListener(marker, "click", function () {
                	infowindow.setContent(this.html);
                	infowindow.open(map, this);
       			});
			}
		},
		error      : function(){
			alert("error");
		}
    });	
}
</script>
<body onload="initialize()">
<?php
include("../includes/header.php");
//include("includes/menu.php");
include("../includes/bread_crumb.php");
?>

<div class="row-fluid">
	<div class="span6">
		<button onclick="locate_runners()" id="button_style">Locate All Runners</button>
	</div>
	<div class="span6">
		<div id="map-canvas" style="background-color: #ffffff;"></div>
	</div>
	<div id="test"></div>
</div>

</div>
<!--/span ends-->
</body>
<?php
include("../includes/footer.php");
?>