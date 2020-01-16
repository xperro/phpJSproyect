<?php include("config.php");


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

      infoWindow.setContent('Mi Ubicaci&oacute;n.');

      map.setCenter(pos);



          // Change this depending on the name of your PHP or XML file
          downloadUrl('https://www.kameforce.cl/prueba/test/RequireJS/process.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var velocidad = markerElem.getAttribute('velocidad');
              var ip = markerElem.getAttribute('ip');
                  var compania = markerElem.getAttribute('compania');
                            var uspeed = markerElem.getAttribute('uspeed');
                                   var plan = markerElem.getAttribute('plan');
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

      var text3 = document.createElement('text');
              text3.textContent = "PLAN: "+plan + " Mbps";
              infowincontent.appendChild(text3);
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




if(porcentaje==1){var color='#DF0101';
      var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
              text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));


}
if(porcentaje==2){
var color='#DF3A01';
      var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
             text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));

}
if(porcentaje==3){
 var color='#FF0000';
       var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
                text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));

}
if(porcentaje==4){
var color='#FF4000';
      var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
              text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));

}
if(porcentaje==5){
 var color='#FF8000';
       var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
                 text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));

}
if(porcentaje==6){
  var color='#FFBF00';
        var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
            text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));

}
if(porcentaje==7){
var color='#FFBF00';
      var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
              text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));

}
if(porcentaje==8){
  var color='#9ce9a1';
        var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
               text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));

}
if(porcentaje==8){
 var color='#6bde73';
       var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
              text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));

}
if(porcentaje==9){
 var color='#3ad344';
       var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
              text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));

}
if(porcentaje>=10){
  var color='#09c916';
        var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA: "+porcentaje*10 + " %";
   text4.fontcolor = color;
              infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));

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
      scale: 2,
      strokeColor:color,
      strokeWeight: 4,
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
    
</script>

<!DOCTYPE html>
<html>

<meta charset="utf-8" /> 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://code.jquery.com/jquery-latest.js"></script>

     <style type="text/css">
      html, body { height: 300px; margin: 0; padding: 0; }
      #map { height: 100%; }

    </style>

    <body>
        
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>







<div class="grid">
<div class="cell"> 
<div class="panel" style="float: left;max-width: 32%;min-width: 350px; margin-left: 0.5%;margin-right: 0.5%;" >
    <div class="heading">
        <span class="title">Diagnóstico</span>
    </div>
    <div class="content" align="justify" style="margin-top:1%;min-height:200px;margin-left: 1%;margin-right: 1%;">
       <br> <strong>VelocidadDeInternet</strong> porporciona un completo diagnóstico para tu red de internet. A través de la información que te entregamos podrás hacer una evaluación eficiente de como se comporta tu red en tu sector. Para poder realizar un diagnóstico con éxito, sólo debes dar permisos de geolocalización a nuestra aplicación. <strong>En ningún momento pediremos tu identidad! , sólo datos generales de tu red para realizar las pruebas.</strong>
    </div>
</div>
</div>
<div class="cell"> 

<div class="panel" style="float: left; max-width: 32%;min-width: 350px;margin-left: 0.5%;margin-right: 0.5%;" >
    <div class="heading">
        <span class="title">Recomendaciones</span>
    </div>
    <div class="content" align="justify" style="margin-top:1%;min-height:200px;margin-left: 1%;margin-right: 1%;">
       <br> <strong>VelocidadDeInternet</strong> recomienda <strong>realizar las pruebas al menos 3 veces al día (mañana,tarde,noche)</strong>. Además realizar las pruebas en lo posible conectados a través de <strong>cable de red</strong> (Sobre todo si tu velocidad debiese superar los 40 Mbps). También es aconsejable no hacer uso de la red mientras se realiza la prueba (Duración aproximada 2 min.) ,<strong> desconectar todos los equipos de internet </strong>para no interferir con el diagnóstico.
    </div>
</div>
</div>

<div class="cell"> 
<div class="panel" style="float: left;max-width: 32%;min-width: 350px;margin-left: 0.5%;margin-right:0.5%;" >
    <div class="heading">
        <span class="title">Objetivo</span>
    </div>
    <div class="content" align="justify" style="margin-top:1%;min-height:200px;margin-left: 1%;margin-right: 1%;">
    <br>  <strong> VelocidadDeInternet</strong> tiene como objetivo proporcionar información útil tanto como para el usuario como para la red global, con el fin de que se puedan <strong>tomar las medidas necesarias para obtener el máximo rendimiento de la red y conocer los mejores proveedores de internet en nuestra zona</strong>.
    </div>


</div>
</div>



</div>



    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR1Ge7yrmN4PjbMcxAZuamClRWoiVhvZs&callback=initMap">
    </script>
    <script src="js/bootstrap.min.js"></script>
    </body>

</html>