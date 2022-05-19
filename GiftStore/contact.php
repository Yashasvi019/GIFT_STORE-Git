<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
	integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		
			 <link rel="stylesheet" type="text/css" href="stylecontact.css">

</head>

<body>

	<div class="container" style="margin-top:90px">
	<h1>Contact Us</h1>
	<hr>
	<div class="row">
	
	<table>
<tr>
	<td class="zoom"><h3><i class="fa fa-phone-square" aria-hidden="true"></i> Contact</h3>
	<p><b><a href="tel:+91 7896543218">+91 7896543218</a></b></p></td>
	
	<td class="zoom"><h3><i class="fa fa-envelope" aria-hidden="true"></i> Send Mail</h3>
	<p><b><a href="mailto:Agrwl906@gmail.com">Agrwl906@gmail.com</a></b></p></td>
	
	<td class="zoom"><h3><i class="fa fa-map-marker" aria-hidden="true"></i> Office Address</h3>
	<p><b><a href="http://maps.google.com/maps?q=Sadar+Jhansi">Sadar Jhansi</a></b></p></td>

	<td class="zoom"><h3><i class="fa fa-hourglass" aria-hidden="true"></i> Office Hours</h3>
	<p><b>9:00 A.M. to 8:00 P.M.</b></p></td>
</tr>
	</table>
	</div>	
	</div>
	
<div id="googleMap" style="width:100%;height:400px; margin-top:50px;"></div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(71.508742,-5.120890),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

</body>
</html>
