function initMap() {
	var latlng = new google.maps.LatLng(20.593297, -100.395745);
	
	var myOptions =
	{
		zoom: 15,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	var map = new google.maps.Map(document.getElementById("map"), myOptions);
	
	var myMarker = new google.maps.Marker(
	{
		position: latlng,
		map: map,
		title:"Fomraci&oacute;n integral de la mujer"
	});
	
}