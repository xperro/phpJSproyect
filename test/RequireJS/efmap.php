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
        $wom=0;
    $counterwom=0;
    $uvtr=0;
    $uwom=0;
    $uentel=0;
    $uclaro=0;
    $uvtr=0;
    $umovi=0;
    $efivtr=0;
    $efimovi=0;
    $efientel=0;
    $eficlaro=0;
    $efiwom=0;
    $efigtd=0;
    $countergtd=0;
    $gtd=0;
    $ugtd=0;
     $maxentel=0;
     $maxvtr=0;
     $maxclaro=0;
     $maxwom=0;
     $maxgtd=0;
     $maxmovi=0;
     $countertelef=0;
     $telef=0;
     $efitelef=0;
     $maxtelef=0;
     $utelef=0;
// Iterate through the rows, adding XML nodes for each
$speeduser=0;
$speedcounter=0;
$uspeeduser=0; 
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
     if($row['compania']=="WOM"){
        $counterwom++;
        $wom=$row['velocidad']+$wom;
    }
     if($row['compania']=="GTD"){
        $countergtd++;
        $gtd=$row['velocidad']+$gtd;
            
    }
      if($row['compania']=="TELEFONICA SUR"){
        $countertelef++;
        $telef=$row['velocidad']+$telef;
            
    }
 if($row['compania']=="OTRO"){
        $counterotro++;
        $otro=$row['velocidad']+$otro;
            
    }
}




$ctentel=$counterentel;
$ctvtr=$countervtr;
$ctmovi = $countermovi;
$ctwom = $counterwom;
$ctgtd = $countergtd;
$ctclaro = $counterclaro;
$cttelef=$countertelef;
$ctotro= $counterotro;


if($counterentel==0){
    $counterentel=1;$ctentel=0;
}
if($countervtr==0){
    $countervtr=1;$ctvtr=0;
}
if($counterclaro==0){
    $counterclaro=1;$ctclaro =0;
}
if($countermovi==0){
    $countermovi=1;$ctrmovi = 0;
}
if($counterwom==0){
    $counterwom=1;$ctwom =0;
}
if($countergtd==0){
    $countergtd=1;$ctgtd = 0;
}
if($countertelef==0){
    $countertelef=1;$cttelef = 0;
}
if($counterotro==0){
   $counterotro=1;$ctotro = 0; 
}

?>
  
<!DOCTYPE html>
<html>
  <head>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5993462413070110",
    enable_page_level_ads: true
  });
</script><meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 
   <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500" rel="stylesheet">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
  .navbar {
  -webkit-box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
-moz-box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
  }
  @media (min-width: 768px){

.navbar-nav {
    float: right;
    margin: 0;
}
}


.mybutton4 {
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    background-color:   #4CAF50;
}

.mybutton4:hover {
    background-color: #b9b9b9;/* Green */
    color: white;
}
        html, body, #map{
        width: 100%;
        height: 100%;
        font-family: 'Work Sans', sans-serif;
    }
    #formContent{
        position: relative;
        top: -100px;
        width: 100%;
        margin: 0 auto;
    } #formContent2{
        position: relative;
        top: -30px;
        width: 100%;
        margin: 0 auto;
    }
    </style>


    <style type="text/css">
    header {
  width:100%; /* Establecemos que el header abarque el 100% del documento */
  overflow:hidden; /* Eliminamos errores de float */
  background:black;
}
 
.wrapper {
  width:100%; /* Establecemos que el ancho sera del 90% */
 /* Aqui le decimos que el ancho máximo sera de 1000px */
  margin:auto; /* Centramos los elementos */
  overflow:hidden; /* Eliminamos errores de float */
}
 
header .logo {
  color:#f2f2f2;
  font-size:50px;
  line-height: 50px;
  float:right;
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

 progress {
  background-color: #f3f3f3;
  border: 0;
  height: 18px;
  border-radius: 9px;
}


.myButton {
  -moz-box-shadow:inset 0px -3px 7px 0px #29bbff;
  -webkit-box-shadow:inset 0px -3px 7px 0px #29bbff;
  box-shadow:inset 0px -3px 7px 0px #29bbff;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #2dabf9), color-stop(1, #0688fa));
  background:-moz-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
  background:-webkit-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
  background:-o-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
  background:-ms-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
  background:linear-gradient(to bottom, #2dabf9 5%, #0688fa 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2dabf9', endColorstr='#0688fa',GradientType=0);
  background-color:#2dabf9;
  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  border-radius:3px;
  border:1px solid #0b0e07;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:15px;
  padding:9px 23px;
  text-decoration:none;
  text-shadow:0px 1px 0px #263666;
}
.myButton:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0688fa), color-stop(1, #2dabf9));
  background:-moz-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
  background:-webkit-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
  background:-o-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
  background:-ms-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
  background:linear-gradient(to bottom, #0688fa 5%, #2dabf9 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0688fa', endColorstr='#2dabf9',GradientType=0);
  background-color:#0688fa;
}
.myButton:active {
  position:relative;
  top:1px;
}

.myButton2 {
  -moz-box-shadow:inset 0px -3px 7px 0px #ff2b2b;
  -webkit-box-shadow:inset 0px -3px 7px 0px #ff2b2b;
  box-shadow:inset 0px -3px 7px 0px #ff2b2b;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c40000), color-stop(1, #fa0808));
  background:-moz-linear-gradient(top, #c40000 5%, #fa0808 100%);
  background:-webkit-linear-gradient(top, #c40000 5%, #fa0808 100%);
  background:-o-linear-gradient(top, #c40000 5%, #fa0808 100%);
  background:-ms-linear-gradient(top, #c40000 5%, #fa0808 100%);
  background:linear-gradient(to bottom, #c40000 5%, #fa0808 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c40000', endColorstr='#fa0808',GradientType=0);
  background-color:#c40000;
  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  border-radius:3px;
  border:1px solid #0b0e07;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:15px;
  padding:9px 23px;
  text-decoration:none;
  text-shadow:0px 1px 0px #263666;
}
.myButton2:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fa0808), color-stop(1, #c40000));
  background:-moz-linear-gradient(top, #fa0808 5%, #c40000 100%);
  background:-webkit-linear-gradient(top, #fa0808 5%, #c40000 100%);
  background:-o-linear-gradient(top, #fa0808 5%, #c40000 100%);
  background:-ms-linear-gradient(top, #fa0808 5%, #c40000 100%);
  background:linear-gradient(to bottom, #fa0808 5%, #c40000 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fa0808', endColorstr='#c40000',GradientType=0);
  background-color:#fa0808;
}
.myButton2:active {
  position:relative;
  top:1px;
}

.myButton3 {
  -moz-box-shadow:inset 0px -3px 7px 0px #1d8700;
  -webkit-box-shadow:inset 0px -3px 7px 0px #1d8700;
  box-shadow:inset 0px -3px 7px 0px #1d8700;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #00eb3f), color-stop(1, #5cbf2a));
  background:-moz-linear-gradient(top, #00eb3f 5%, #5cbf2a 100%);
  background:-webkit-linear-gradient(top, #00eb3f 5%, #5cbf2a 100%);
  background:-o-linear-gradient(top, #00eb3f 5%, #5cbf2a 100%);
  background:-ms-linear-gradient(top, #00eb3f 5%, #5cbf2a 100%);
  background:linear-gradient(to bottom, #00eb3f 5%, #5cbf2a 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00eb3f', endColorstr='#5cbf2a',GradientType=0);
  background-color:#00eb3f;
  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  border-radius:3px;
  border:1px solid #00c213;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:15px;
  padding:9px 23px;
  text-decoration:none;
  text-shadow:0px 1px 0px #2f6627;
}
.myButton3:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #5cbf2a), color-stop(1, #00eb3f));
  background:-moz-linear-gradient(top, #5cbf2a 5%, #00eb3f 100%);
  background:-webkit-linear-gradient(top, #5cbf2a 5%, #00eb3f 100%);
  background:-o-linear-gradient(top, #5cbf2a 5%, #00eb3f 100%);
  background:-ms-linear-gradient(top, #5cbf2a 5%, #00eb3f 100%);
  background:linear-gradient(to bottom, #5cbf2a 5%, #00eb3f 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5cbf2a', endColorstr='#00eb3f',GradientType=0);
  background-color:#5cbf2a;
}
.myButton3:active {
  position:relative;
  top:1px;
}

}
</style>

  </head>
  <body style="background-color: #efefef;">


<nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 0px;"> <a class="navbar-brand" href="index.php" style="padding: 8px 0px !important;"><img src="images/logo.png"></a>
  
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Navegación Menú</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav"> 



       
    
     
   <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">RESULTADOS <span class=""></span></a>
          <ul class="dropdown-menu">
       
          
            <li ><a href="misresultados.php"><strong style="color:#16bd00;">MIS RESULTADOS</strong></a></li>
            <li role="separator" class="divider"></li>
                <li style="background-color:rgba(22, 189, 0, 0.14);font-size:10px;text-align: center;"><strong>RESULTADOS NACIONALES</strong></li>
              <li><a href="estado1.php">INTERNET HOGAR</a></li>
                <li><a href="estado2.php">INTERNET MÓVIL</a></li>
              <li role="separator" class="divider"></li>
                  <li style="background-color:rgba(22, 189, 0, 0.14);font-size:10px;text-align: center;"><strong>BÚSQUEDA PERSONALIZADA</strong></li>
     <li><a href="elige.php">INTERNET HOGAR</a></li>
                <li><a href="elige2.php">INTERNET MÓVIL</a></li>


          </ul>
        </li>





        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">MAPAS <span class=""></span></a>
          <ul class="dropdown-menu">
               <li style="background-color:rgba(22, 189, 0, 0.14);font-size:10px;text-align: center;"><strong>FILTROS</strong></li>
           <li role="separator" class="divider"></li>
            <li><a href="speedmap.php">VELOCIDAD</a></li>
              <li class="active"><a href="efmap.php">EFICIENCIA</a></li>
          <li><a href="ispmap.php">ISP</a></li>
<li><a href="heatmap.php">DISPONIBILIDAD DE INTERNET</a></li>


          </ul>
        </li><li ><a href="vdi.html">FAQ</a></li>
                    <li  ><a href="condiciones.html">CONDICIONES</a></li>
      <li><a target="_blank" href="https://www.informatica2017.cl/#contact">CONTACTO</a></li>
       <li ><button class="mybutton4" style="
border: none;    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;

 "><a href="https://www.velocidaddeinternet.cl/speedtest.php"><strong  style="color:white;">DIAGNÓSTICO</strong></a></button></li>
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



    <div id="map"></div>



<div id="formContent2" style="max-width: 100%;"> 

   <div id="footer" style="
    background-color: #f8f8f8;
      text-align: -webkit-center;
    " class=""><a target="_blank" href="https://www.informatica2017.cl">INFORMATICA2017</a> - info@informatica2017.cl</div>

</div>





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
          downloadUrl('process.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var velocidad = markerElem.getAttribute('velocidad');
              var ip = markerElem.getAttribute('ip');
                  var compania = markerElem.getAttribute('compania');

                  
var bol=false;

if(compania=="VTR"){bol=true;
    var variable=<? echo $vtr/$countervtr;?>;
    var image="https://www.velocidaddeinternet.cl/images/vtr.png";
}
if(compania=="MOVISTAR"){bol=true;
     var variable= <? echo $movi/$countermovi;?>;
        var image="https://www.velocidaddeinternet.cl/images/movi.png";
}
if(compania=="CLARO"){bol=true;
     var variable=<? echo $claro/$counterclaro;?>;
        var image="https://www.velocidaddeinternet.cl/images/claro.png";
}
if(compania=="ENTEL"){bol=true;
    var variable=<? echo $entel/$counterentel ;?>;
       var image="https://www.velocidaddeinternet.cl/images/entel.png";
}
if(compania=="WOM"){bol=true;
    var variable=<? echo $wom/$counterwom ;?>;
       var image="https://www.velocidaddeinternet.cl/images/wom.png";
}
if(compania=="GTD"){bol=true;
    var variable=<? echo $gtd/$countergtd ;?>;
       var image="https://www.velocidaddeinternet.cl/images/gtd.png";
}
if(bol==false){
  compania="OTRO";
  var variable=<? echo $otro/$counterotro ;?>;
       var image="https://www.velocidaddeinternet.cl/images/otro.png";
}
//var heatMapData = [
 // {location: point, weight: <? echo $velocidad/100;?>},];


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
if(compania=="WOM"){
    var variable=<? echo $wom/$counterwom ;?>;
}
//var heatMapData = [
 // {location: point, weight: <? echo $velocidad/100;?>},];


var porcentaje=velocidad/10;
porcentaje = velocidad/plan;

if(plan!="S" && plan !=0){





if(porcentaje>=0){var color='#DF0101';
      var text4 = document.createElement('text');
        text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100) + "/100%";
              text4.fontcolor = color;
             


}


if(porcentaje>=0.1){var color='#DF0101';
      var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100) + "/100%";
              text4.fontcolor = color;
        

}
if(porcentaje>=0.2){
var color='#DF3A01';
      var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100) + "/100%";
             text4.fontcolor = color;
         

}
if(porcentaje>=0.3){
 var color='#FF0000';
       var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100) + "/100%";
                text4.fontcolor = color;
       

}
if(porcentaje>=0.4){
var color='#FF4000';
      var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100)+ "/100%";
              text4.fontcolor = color;
      

}
if(porcentaje>=0.5){
 var color='#FF8000';
       var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100) + "/100%";
                 text4.fontcolor = color;
          

}
if(porcentaje>=0.6){
  var color='#FFBF00';
        var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100) + "/100%";
            text4.fontcolor = color;
       

}
if(porcentaje>=0.7){
var color='#FFBF00';
      var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100) + "/100%";
              text4.fontcolor = color;
     

}
if(porcentaje>=0.8){
  var color='#9ce9a1';
        var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100) +"/100%";
               text4.fontcolor = color;
     

}

if(porcentaje>=0.9){
 var color='#3ad344';
       var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100) + "/100%";
              text4.fontcolor = color;
   
}
if(porcentaje>=1){
  var color='#09c916';
        var text4 = document.createElement('text');
              text4.textContent = "EFICIENCIA:"+Math.round(porcentaje*100) + "/100%";
   text4.fontcolor = color;


}
}else{

var color='#000000';
        var text4 = document.createElement('text');
              text4.textContent = "SIN INFORMACIÓN";
   text4.fontcolor = color;
     

}

if(color=="#000000"){

}else{
   infowincontent.appendChild(text4);
  infowincontent.appendChild(document.createElement('br'));



            
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
}


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
        <script src="js/bootstrap.min.js"></script>
  </body>
</html>