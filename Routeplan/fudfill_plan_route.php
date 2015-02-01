<?php
session_start();
$start_time = date("Y-m-d H:i:s");
$_SESSION['fud_fill']['page_parent']="Route Planner";
$_SESSION['fud_fill']['page_title']="Plan New Routes";
$_SESSION['fud_fill']['page_name']="fudfill_plan_route.php";

$menu_active = array('','','','','','');

$menu_active[0] = "active"; 
?>
	<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
	<link type="text/css" rel="stylesheet" href="../css/map.css">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
	
	<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
	<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
</head>
    <script>

	var placeSearch, autocomplete;
	var componentForm = {
  	street_number: 'short_name',
  	route: 'long_name',
  	locality: 'long_name',
  	administrative_area_level_1: 'short_name',
  	country: 'long_name',
  	postal_code: 'short_name'
	};
	
	var geocoder;
	var map;
	var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();

	function initialize()
	{
		// Create the autocomplete object, restricting the search
		// to geographical location types.
		geocoder = new google.maps.Geocoder();
		autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
	  	{ types: ['geocode'] });
		
		directionsDisplay = new google.maps.DirectionsRenderer();
		
		var mapOptions = {
			zoom: 12,
			mapTypeId: google.maps.MapTypeId.TERRAIN
  		}
  		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  		directionsDisplay.setMap(map);
  
  		// Try HTML5 geolocation
  		if(navigator.geolocation) {
    		navigator.geolocation.getCurrentPosition(function(position) {
      		var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      		var infowindow = new google.maps.InfoWindow({
        		map: map,
        		position: pos,
        		content: 'You are here'
      		});

      		map.setCenter(pos);
    	}, function() {
			handleNoGeolocation(true);
			});
		} else {
			// Browser doesn't support Geolocation
			handleNoGeolocation(false);
		}
	}

	// [START region_geolocation]
	// Bias the autocomplete object to the user's geographical location,
	// as supplied by the browser's 'navigator.geolocation' object.

	function geolocate()
	{
  		if (navigator.geolocation)
		{
			navigator.geolocation.getCurrentPosition(function(position) {
				var geolocation = new google.maps.LatLng(
				position.coords.latitude, position.coords.longitude);
				var circle = new google.maps.Circle({
					center: geolocation,
					radius: position.coords.accuracy
				});
				autocomplete.setBounds(circle.getBounds());
    		});
  		}
	}
	// [END region_geolocation]
var max_fields      = 10; //maximum input boxes allowed
    	var x = 1; //initlal text box count
		
	$(document).ready(function() {    	
	
    	$(".add_field_button").click(function(e){ //on add input button click
			e.preventDefault();
		
        if(x < max_fields) //max input box allowed
		{
			var address = document.getElementById('autocomplete').value;	//getting the address
			var alias_name = document.getElementById('alias_name').value;	//getting alias name
			
			if(address.length == 0 || alias_name == 0)
			{
				alert('Please fill all details')
			}
			else
			{
			geocoder.geocode( { 'address': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					map.setCenter(results[0].geometry.location);
					var marker = new google.maps.Marker({
						map: map,
						position: results[0].geometry.location
					});
			//add input box
			
            $(".input_fields_wrap").append('<div><input type="text" id="plan_address_'+x+'" class="address_text" readonly="readonly" value="'+address+'"/><input type="text" id="address_alais_'+x+'" readonly="readonly" class="text_field" value="'+alias_name+'"/><a href="javascript:void(0)" class="remove_field">Remove</a></div>');
			document.getElementById('autocomplete').value = "";
			document.getElementById('alias_name').value = "";
			
			document.getElementById('total_address').value = x;
			x++; //text box increment
    	} 
		else 
		{
			alert('Please enter Address');
		}
  	});
	}		
   }
   });
    
	$("#alias_name").autocomplete("user_list_ajax.php", {
		selectFirst: true
	});
	
   $(".input_fields_wrap").on("click",".remove_field", function(e)
	{ //user click on remove text
        $(this).parent('div').remove(); x--;
    })
	
	
});

function calcRoute() 
{
	var checkboxArray = document.getElementById('total_address').value;
	var waypts = [];
	
	for (var i = 2; i < checkboxArray; i++) 
	{
		var map_address = document.getElementById('plan_address_'+i).value;
		waypts.push({
          location:map_address,
          stopover:true});
	}
	
	var start = document.getElementById('plan_address_1').value;
  	var end = document.getElementById('plan_address_'+checkboxArray).value;
  	var request = {
      origin: start,
      destination: end,
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING
  	};
  	
	directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      var route = response.routes[0];
    }
  });
}

function save_routes() 
{
	directionsDisplay.setDirections({routes: []});
	var checkboxArray = document.getElementById('total_address').value;
	var waypts = [];
	
	for (var i = 2; i < checkboxArray; i++) 
	{
		var map_address = document.getElementById('plan_address_'+i).value;
		waypts.push({
          location:map_address,
          stopover:true});
	}
	
	var start = document.getElementById('plan_address_1').value;
  	var end = document.getElementById('plan_address_'+checkboxArray).value;
  	var request = {
      origin: start,
      destination: end,
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING
  	};
  	
	directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      var route = response.routes[0];
	 // alert(route.legs.length);
	  var summaryPanel = document.getElementById('directions_panel');
      summaryPanel.innerHTML = '';
	  
	  var address_list = [];
      // For each route, display summary information.
      for (var i = 0; i < route.legs.length; i++) {
	  	
		var cust_detail = [];
		
		cust_detail['address'] = route.legs[i].start_address;
		cust_detail['latitude'] = route.legs[i].start_location.lat();
		cust_detail['longitude'] = route.legs[i].start_location.lng();
		cust_detail['customer_name'] = document.getElementById('address_alais_'+(i+1)).value;
		
		address_list.push(cust_detail);
      }
	  
		var routes = [];
	  
	  	for(var i in address_list) 
	  	{
			var items = address_list[i];
			
			routes.push({
				"address" : items.address,
				"latitude"  : items.latitude,
				"longitude"  : items.longitude,
				"customer_name" : items.customer_name 
			});
		}
		
		$.ajax({ 
			url        : 'save_address_ajax.php',
         	type       : 'POST',                                              
         	data       : {'data':JSON.stringify(routes)},
         	success    : function(data){
				document.getElementById('input_fields_wrap').innerHTML = data;
		 	}
       });
    }
});
  x = 1;
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
		<div id="locationField">
				<input id="autocomplete" placeholder="Enter the address" onFocus="geolocate()" class="text_field" type="text">
				<input id="alias_name" placeholder="Alias" name="alias_name" class="text_field" type="text"/>
				<input id="total_address" name="total_address" type="hidden" value=""/>
		</div>
		<div style="width:100%;padding: 10px;">
			<button class="add_field_button" id="button_style">Add address</button>
    		<button onclick="calcRoute()" id="button_style">Plan route</button>
			<button onclick="save_routes()" id="button_style">Save route</button>
		</div>
		<form id="plan_route" style="padding: 5px;">
			<div class="input_fields_wrap" id="input_fields_wrap"></div>
		</form>
		<div id="directions_panel" style="margin:20px;background-color:#FFEE77;"></div>
	</div>
	<div class="span6">
			<div id="map-canvas"></div>
	</div>
</div>

</div>
<!--/span ends-->
</body>
<?php
include("../includes/footer.php");
?>