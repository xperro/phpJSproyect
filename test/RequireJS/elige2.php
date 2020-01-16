<?php
include("config.php");


  $dispositivo=0;
$tablet_browser = 0;
$mobile_browser = 0;
$body_class = 'desktop';
 
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
    $body_class = "tablet";
}
 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
    $body_class = "mobile";
}
 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
    $body_class = "mobile";
}
 
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    //Check for tablets on opera mini alternative headers
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
      $tablet_browser++;
    }
}
if ($tablet_browser > 0) {
// Si es tablet has lo que necesites
  $dispositivo=1;
}
else if ($mobile_browser > 0) {
// Si es dispositivo mobil has lo que necesites
   $dispositivo=2;
}
else {
// Si es ordenador de escritorio has lo que necesites
  $dispositivo=3;
}  







$velocidad= $_GET["vel"];
$lat= $_GET["lat"];
$lng= $_GET["lng"];
$uspeed= $_GET["uspeed"];
$ping= $_GET["ping"];
$ip= $_SERVER['REMOTE_ADDR'];
$isp= gethostbyaddr($_SERVER['REMOTE_ADDR']);
$plan=0;
$pos = strpos($isp, "vtr");
$pos2 = strpos($isp, "entel");
$pos3 = strpos($isp, "claro");
$pos4 = strpos($isp, "movistar");
$pos5 = strpos($isp, "nextel");
// El operador !== también puede ser usado. Puesto que != no funcionará como se espera
// porque la posición de 'a' es 0. La declaración (0 != false) se evalúa a 
// false.
if ($pos !== false) {
    $compania="VTR";
} else {
    
}

if ($pos2 !== false) {
    $compania="ENTEL";
} else {
    
}

if ($pos3 !== false) {
    $compania="CLARO";
} else {
    
}

if ($pos4 !== false) {
    $compania="MOVISTAR";
} else {
    
}
if ($pos5 !== false) {
    $compania="WOM";
} else {
    
}
$nowFormat = date('Y-m-d H:i:s');
$phpdate = strtotime( $nowFormat );



?>



<!DOCTYPE html>
<html>
  <head><meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
 <script src="js/menu.js" type="text/javascript"></script> 
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script>
    var interval1;
    function runPB1(){
        clearInterval(interval1);
        var pb = $("#pb1").data('progress');
        var val = 0;
        interval1 = setInterval(function(){
            val += 1;
            pb.set(val);
            if (val >= 100) {
                val = 0;
                clearInterval(interval1);
            }
        }, 100);
    }
    function flashPB1(){
        clearInterval(interval1);
        var pb = $("#pb1").data('progress');
        pb.set(0);
    }
    function stopPB1(){
        clearInterval(interval1);
    }
</script>
    <style type="text/css">
     .navbar {
  -webkit-box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
-moz-box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
  }
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; }

    </style><style type="text/css">
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
}</style>
<script>
    $(function() {
      $(".meter > span").each(function() {
        $(this)
          .data("origWidth", $(this).width())
          .width(0)
          .animate({
            width: $(this).data("origWidth")
          }, 300);
      });
    });
  </script>
  
  <style>
    .meter { 
      height: 20px;  /* Can be anything */
      position: relative;
      margin: 60px 0 20px 0; /* Just for demo spacing */
      background: #555;
      -moz-border-radius: 25px;
      -webkit-border-radius: 25px;
      border-radius: 25px;
      padding: 10px;
      -webkit-box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
      -moz-box-shadow   : inset 0 -1px 1px rgba(255,255,255,0.3);
      box-shadow        : inset 0 -1px 1px rgba(255,255,255,0.3);
    }
    .meter > span {
      display: block;
      height: 100%;
         -webkit-border-top-right-radius: 8px;
      -webkit-border-bottom-right-radius: 8px;
             -moz-border-radius-topright: 8px;
          -moz-border-radius-bottomright: 8px;
                 border-top-right-radius: 8px;
              border-bottom-right-radius: 8px;
          -webkit-border-top-left-radius: 20px;
       -webkit-border-bottom-left-radius: 20px;
              -moz-border-radius-topleft: 20px;
           -moz-border-radius-bottomleft: 20px;
                  border-top-left-radius: 20px;
               border-bottom-left-radius: 20px;
      background-color: rgb(43,194,83);
      background-image: -webkit-gradient(
        linear,
        left bottom,
        left top,
        color-stop(0, rgb(43,194,83)),
        color-stop(1, rgb(84,240,84))
       );
      background-image: -moz-linear-gradient(
        center bottom,
        rgb(43,194,83) 37%,
        rgb(84,240,84) 69%
       );
      -webkit-box-shadow: 
        inset 0 2px 9px  rgba(255,255,255,0.3),
        inset 0 -2px 6px rgba(0,0,0,0.4);
      -moz-box-shadow: 
        inset 0 2px 9px  rgba(255,255,255,0.3),
        inset 0 -2px 6px rgba(0,0,0,0.4);
      box-shadow: 
        inset 0 2px 9px  rgba(255,255,255,0.3),
        inset 0 -2px 6px rgba(0,0,0,0.4);
      position: relative;
      overflow: hidden;
    }
    .meter > span:after, .animate > span > span {
      content: "";
      position: absolute;
      top: 0; left: 0; bottom: 0; right: 0;
      background-image: 
         -webkit-gradient(linear, 0 0, 100% 100%, 
            color-stop(.25, rgba(255, 255, 255, .2)), 
            color-stop(.25, transparent), color-stop(.5, transparent), 
            color-stop(.5, rgba(255, 255, 255, .2)), 
            color-stop(.75, rgba(255, 255, 255, .2)), 
            color-stop(.75, transparent), to(transparent)
         );
      background-image: 
        -moz-linear-gradient(
          -45deg, 
            rgba(255, 255, 255, .2) 25%, 
            transparent 25%, 
            transparent 50%, 
            rgba(255, 255, 255, .2) 50%, 
            rgba(255, 255, 255, .2) 75%, 
            transparent 75%, 
            transparent
         );
      z-index: 1;
      -webkit-background-size: 50px 50px;
      -moz-background-size: 50px 50px;
      -webkit-animation: move 2s linear infinite;
         -webkit-border-top-right-radius: 8px;
      -webkit-border-bottom-right-radius: 8px;
             -moz-border-radius-topright: 8px;
          -moz-border-radius-bottomright: 8px;
                 border-top-right-radius: 8px;
              border-bottom-right-radius: 8px;
          -webkit-border-top-left-radius: 20px;
       -webkit-border-bottom-left-radius: 20px;
              -moz-border-radius-topleft: 20px;
           -moz-border-radius-bottomleft: 20px;
                  border-top-left-radius: 20px;
               border-bottom-left-radius: 20px;
      overflow: hidden;
    }
    
    .animate > span:after {
      display: none;
    }
    
    @-webkit-keyframes move {
        0% {
           background-position: 0 0;
        }
        100% {
           background-position: 50px 50px;
        }
    }
    
    .orange > span {
      background-color: #f1a165;
      background-image: -moz-linear-gradient(top, #f1a165, #f36d0a);
      background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f1a165),color-stop(1, #f36d0a));
      background-image: -webkit-linear-gradient(#f1a165, #f36d0a); 
    }
    
    .red > span {
      background-color: #f0a3a3;
      background-image: -moz-linear-gradient(top, #f0a3a3, #f42323);
      background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f0a3a3),color-stop(1, #f42323));
      background-image: -webkit-linear-gradient(#f0a3a3, #f42323);
    }
    
    .nostripes > span > span, .nostripes > span:after {
      -webkit-animation: none;
      background-image: none;
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
  </style>
  <script type="text/javascript" src="https://maps.google.com/maps/api/js"></script>
<script>

mapa = {
 map : false, 
 marker : false,

 

 initMap : function() {
 
 // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
 
 mapa.map = new google.maps.Map(document.getElementById('mapa'), {
   center: {lat: -33.4488897, lng: -70.6692655},
   scrollwheel: false,
   zoom: 14,
   zoomControl: true,
   rotateControl : false,
   mapTypeControl: true,
   streetViewControl: false,
 });
 
 // Creamos el marcador
 mapa.marker = new google.maps.Marker({
 position: {lat: -33.4488897, lng: -70.6692655},
 draggable: true 
 });
 
 // Le asignamos el mapa a los marcadores.
  mapa.marker.setMap(mapa.map);

 
 },

// función que se ejecuta al pulsar el botón buscar dirección
getCoords : function()
{
  // Creamos el objeto geodecoder
 var geocoder = new google.maps.Geocoder();
 
 address = document.getElementById('search').value;
 if(address!='')
 {
  // Llamamos a la función geodecode pasandole la dirección que hemos introducido en la caja de texto.
 geocoder.geocode({ 'address': address}, function(results, status)  
 {
   if (status == 'OK')
   {
// Mostramos las coordenadas obtenidas en el p con id coordenadas

   document.getElementById("lat").value=results[0].geometry.location.lat();
   document.getElementById("lng").value=results[0].geometry.location.lng();
   var point = [results[0].geometry.location.lat(), results[0].geometry.location.lng()];
// Posicionamos el marcador en las coordenadas obtenidas
   mapa.marker.setPosition(results[0].geometry.location);
// Centramos el mapa en las coordenadas obtenidas
   mapa.map.setCenter(mapa.marker.getPosition());
   agendaForm.showMapaEventForm();
  
   }
  });
 }
 }
}
</script>
  </head>
  <body onload="mapa.initMap()" style="background-color: #efefef;" >

   
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
              <li><a href="efmap.php">EFICIENCIA</a></li>
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



<header>

  </header>


<div class="col-xs-12 col-md-12" style="margin-top: 4%;"> 




</div>



   <form class="form" method="get" action="estado4.php" >



<div class="col-xs-12 col-md-12" style=""> 


<br><br>


<Strong>BÚSQUEDA PERSONALIZADA POR INTERNET HOGAR</Strong>

<h3 style="font-size: 14px;color:black;">SELECCIONAR DIÁMETRO DE BÚSQUEDA </h3>
<select style="height: 30px;" name="d" id="ddlViewBy" value="S">
 
 
 <option value="1">1 Km</option>
  <option value="2">2 Km</option>
   <option value="3">3 Km</option>
  <option value="4">4 Km</option>
   <option value="5">5 Km</option>
    <option value="10">10 Km</option>
      <option value="20">20 Km</option>
       <option value="100">100 Km</option>

  
</select><BR>
<h3 style="font-size: 14px;color:black;">BUSCAR DIRECCIÓN:  </h3>
<input type="text" id="search" style="width:100%;height: 30px;"> <br>
<input type="button" value="BUSCAR" onClick="mapa.getCoords()"><br>
<div id="mapa" style="width: 100%; height: 150px;"> </div>
 <div>

 <input  type='hidden' name="lat" id="lat" >
 <input  type='hidden' name="lng" id="lng"></div>
 


<BR>

<input style="font-size: large;width: 100%;min-height: 50px;" class="submit-btn" type="submit" value="Enviar"/>


</form>

</div>





                <!-- Main content -->
           
               
 

              <!-- row end -->




        </div><!-- ./wrapper -->
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR1Ge7yrmN4PjbMcxAZuamClRWoiVhvZs&callback=mapa.initMap">
    </script>
         <script src="js/bootstrap.min.js"></script>
  </body>

</html>