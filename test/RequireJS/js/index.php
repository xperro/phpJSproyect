<?php
include("config.php");


// Start XML file, create parent node

// Opens a connection to a MySQL server


// Select all the rows in the markers table

$query = "SELECT * FROM test";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

$vtr=0;
    $countervtr=0;
    $entel=0;
    $counterentel=0;
    $movi=0;
    $countermovi=0;
    $claro=0;
    $counterclaro=0;
// Iterate through the rows, adding XML nodes for each

while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node



    if($row['compania']=="VTR"){
        $countervtr++;
        $vtr=$row['velocidad']+$vtr;
    }
     if($row['compania']=="MOVISTAR"){
        $countermovi++;
        $movi=$row['velocidad']+$movi;
    }
     if($row['compania']=="CLARO"){
        $counterclaro++;
        $claro=$row['velocidad']+$claro;
    }
     if($row['compania']=="ENTEL"){
        $counterentel++;
        $entel=$row['velocidad']+$entel;
    }
}



if($counterentel==0){
    $counterentel=1;
}
if($countervtr==0){
    $countervtr=1;
}
if($counterclaro==0){
    $counterclaro=1;
}
if($countermovi==0){
    $countermovi=1;
}


?>
  
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  
    <style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 92%; }

    </style><style type="text/css">
    header {
  width:100%; /* Establecemos que el header abarque el 100% del documento */
  overflow:hidden; /* Eliminamos errores de float */
  background:black;
}
 
.wrapper {
  width:90%; /* Establecemos que el ancho sera del 90% */
  max-width:100%; /* Aqui le decimos que el ancho máximo sera de 1000px */
  margin:auto; /* Centramos los elementos */
  overflow:hidden; /* Eliminamos errores de float */
}
 
header .logo {
  color:#f2f2f2;
  font-size:50px;
  line-height: 50px;
  float:left;
}
 
header nav {
  float:right;
  line-height:50px;
}
 
header nav a {
  display:inline-block;
  color:#fff;
  text-decoration:none;
  padding:10px 20px;
  line-height:normal;
  font-size:15px;
  font-weight:bold;
  -webkit-transition:all 500ms ease;
  -o-transition:all 500ms ease;
  transition:all 500ms ease;
}
 
header nav a:hover {
  background:#f56f3a;
  border-radius:23px;
}


.header2 {
  position: fixed;
  height:100px;
}
 
.header2 .logo {
  line-height:100px;
  font-size:30px;
}
 
.header2 nav {
  line-height:50px;
}


@media screen and (max-width: 950px) {
  header .logo,
  header nav {
    width:100%;
    text-align:center; /*Centramos el menu y el logotipo*/
    line-height:50px;
  }
 
  .header2 {
    height:auto;
  }
 
  .header2 .logo,
  .header2 nav {
    line-height:50px;
  }
}
}</style>

  </head>
  <body>
<header>
    <div class="wrapper"><a href="index.php">
      <div class="logo">Social Speed</div>
      </a>
      <nav>
   <a href="speedtest.php">Test Velocidad</a>
        <a href="#">Estad&iacute;sticas</a>
        <a href="#">Contacto</a>
      </nav>
    </div>
  </header>
    <div id="map"></div>
    <script type="text/javascript">




 function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: La Geolocalización ha fallado.' :
                        'Error: El Dispositivo no soporta\'t Geolocalización (Comprobar permisos).');
}

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 15,
      styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]

  });
   google.maps.event.trigger(map,'resize');
  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);

      infoWindow.setContent('Mi Ubicación.');

      map.setCenter(pos);



          // Change this depending on the name of your PHP or XML file
          downloadUrl('https://www.kameforce.cl/prueba/test/RequireJS/ki.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var velocidad = markerElem.getAttribute('velocidad');
              var ip = markerElem.getAttribute('ip');
                  var compania = markerElem.getAttribute('compania');
                            var uspeed = markerElem.getAttribute('uspeed');
              var hora = markerElem.getAttribute('hora');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('latitud')),
                  parseFloat(markerElem.getAttribute('longitud')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = "COMPAÑIA: "+compania;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = "VELOCIDAD DESCARGA: "+velocidad;
              infowincontent.appendChild(text);
 infowincontent.appendChild(document.createElement('br'));

              var text2 = document.createElement('text');
              text2.textContent = "VELOCIDAD SUBIDA: "+uspeed;
              infowincontent.appendChild(text2);
  infowincontent.appendChild(document.createElement('br'));

if(compania=="VTR"){
    var variable=<? echo $vtr/$countervtr;?>;
}
if(compania=="MOVISTAR"){
     var variable= <? echo $movi/$countermovi;?>;
}
if(compania=="CLARO"){
     var variable=<? echo $claro/$counterclaro;?>
}
if(compania=="ENTEL"){
    var variable=<? echo $entel/$counterentel ;?>;
}
//var heatMapData = [
 // {location: point, weight: <? echo $velocidad/100;?>},];


var porcentaje=velocidad/10;
porcentaje = Math.ceil(porcentaje);
if(porcentaje==1){
var color='#FDEDEC';
}
if(porcentaje==2){
var color='#FADBD8';
}
if(porcentaje==3){
 var color='#F5B7B1';
}
if(porcentaje==4){
var color='#F1948A';
}
if(porcentaje==5){
 var color='#EC7063';
}
if(porcentaje==6){
  var color='#E74C3C';
}
if(porcentaje==7){
var color='#CB4335';
}
if(porcentaje==8){
  var color='#B03A2E';
}
if(porcentaje==8){
 var color='#943126';
}
if(porcentaje==9){
 var color='#78281F';
}
if(porcentaje>=10){
  var color='#641E16';
}


if(velocidad>=variable){



var image = {
    url: 'https://www.kameforce.cl/prueba/green.png',
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(20, 32),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32)
  };
  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  var shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: 'poly'
  };

}else{


 var image = {
 
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(20, 32),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32)
  };
  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  var shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: 'poly'
  };


}

            
 google.maps.event.trigger(map,'resize');
          
              var marker = new google.maps.Marker({
                map: map,
                position: point,
               icon: {
      path: google.maps.SymbolPath.CIRCLE,
      scale: 1,
      strokeColor:color,
      strokeWeight: 2,
    fillColor: '#F00'
    },
              });
              marker.addListener('click', function() {

                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });

/* Data points defined as a mixture of WeightedLocation and LatLng objects */


    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }








 function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}


}




</script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR1Ge7yrmN4PjbMcxAZuamClRWoiVhvZs&callback=initMap">
    </script>
     <script data-main="scripts/main" src="scripts/require.js"></script>
  </body>
</html>