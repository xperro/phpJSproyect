<?php
include("config.php");








function checkPacketLoss($address, $count) {
    $command = 'ping -c %d %s';
    $output = shell_exec(sprintf($command, $count, $address));

    if (preg_match('/([0-9]*\.?[0-9]+)%(?:\s+packet)?\s+loss/', $output, $match) === 1) {
        $packetLoss = (float)$match[1]; 
    } else {
        throw new \Exception('Packet loss not found.');
    }

    return $packetLoss;
}


function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
  
  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}

$km= $_GET["d"];
$lat= $_GET["lat"];
$lng= $_GET["lng"];
$ip= $_SERVER['REMOTE_ADDR'];
$isp= gethostbyaddr($_SERVER['REMOTE_ADDR']);

$pos = strpos($isp, "vtr");
$pos2 = strpos($isp, "entel");
$pos3 = strpos($isp, "claro");
$pos4 = strpos($isp, "movistar");
$pos5 = strpos($isp, "nextel");
$pos6 = strpos($isp, "gtd");




$query = "SELECT * FROM test where conexion=0 and plan!=0";

$conex=0;


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
//$lost=checkPacketLoss($ip, 5);
while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node


//la otra prueba



$kmfinal=distance($lat, $lng, $row['latitud'], $row['longitud'], "K")  ;


if($row['ip']==$ip){

$speeduser=$speeduser+$row['velocidad'];
$uspeeduser=$uspeeduser+$row['uvelocidad'];
$speedcounter=$speedcounter+1;
}
$validador=false;
if($kmfinal<=$km ){


//echo distance($lat, $lng, $row['latitud'], $row['longitud'], "K") . " Kilometers<br>";

    if($row['compania']=="VTR"){
        $countervtr++;
     $validador=true;
        $vtr=$row['velocidad']+$vtr;
if($row['velocidad']>$maxvtr){
  $maxvtr=$row['velocidad'];
}
        $efivtr=$efivtr+$row['velocidad']/$row['plan'];

             $uvtr=$row['uvelocidad']+$uvtr;
    }
     if($row['compania']=="MOVISTAR"){
        $countermovi++;     $validador=true;
        $movi=$row['velocidad']+$movi;
        if($row['velocidad']>$maxmovi){
  $maxmovi=$row['velocidad'];
  }
         $umovi=$row['uvelocidad']+$umovi;
         $efimovi=$efimovi+$row['velocidad']/$row['plan'];
    }
     if($row['compania']=="CLARO"){
        $counterclaro++;     $validador=true;
        $claro=$row['velocidad']+$claro;
               if($row['velocidad']>$maxclaro){
  $maxclaro=$row['velocidad'];
  }
             $uclaro=$row['uvelocidad']+$uclaro;
              $eficlaro=$eficlaro+$row['velocidad']/$row['plan'];
    }
     if($row['compania']=="ENTEL"){
        $counterentel++;     $validador=true;
        $entel=$row['velocidad']+$entel;
                     if($row['velocidad']>$maxentel){
  $maxentel=$row['velocidad'];
}
              $uentel=$row['uvelocidad']+$uentel;
                $efientel=$efientel+$row['velocidad']/$row['plan'];
    }
         if($row['compania']=="WOM"){
        $counterwom++;     $validador=true;
        $wom=$row['velocidad']+$wom;
                 if($row['velocidad']>$maxwom){
  $maxwom=$row['velocidad'];
}
             $uwom=$row['uvelocidad']+$uwom;
               $efiwom=$efiwom+$row['velocidad']/$row['plan'];
    }
      if($row['compania']=="GTD"){
        $countergtd++;     $validador=true;
        $gtd=$row['velocidad']+$gtd;
                if($row['velocidad']>$maxgtd){
  $maxgtd=$row['velocidad'];
}
             $ugtd=$row['uvelocidad']+$ugtd;
               $efigtd=$efigtd+$row['velocidad']/$row['plan'];
    }
     if($row['compania']=="TELEFONICA SUR"){
        $countertelef++;     $validador=true;
        $telef=$row['velocidad']+$telef;
                if($row['velocidad']>$maxtelef){
  $maxtelef=$row['velocidad'];
}

             $utelef=$row['uvelocidad']+$utelef;
               $efitelef=$efitelef+$row['velocidad']/$row['plan'];
    }

if($validador==false){
 $counterotro++;
       
        $otro=$row['velocidad']+$otro;
                if($row['velocidad']>$maxotro){
  $maxotro=$row['velocidad'];
}
             $uotro=$row['uvelocidad']+$uotro;
               $efiotro=$efiotro+$row['velocidad']/$row['plan'];
}



$ctentel=$counterentel;
$ctvtr=$countervtr;
$ctmovi = $countermovi;
$ctwom = $counterwom;
$ctgtd = $countergtd;
$ctclaro = $counterclaro;
$cttelef=$countertelef;
$ctotro= $counterotro;



  }
$nowFormat = date('Y-m-d H:i:s');
$phpdate = strtotime( $nowFormat );
}


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
<head><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93917192-1', 'auto');
  ga('send', 'pageview');

</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- vdi -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5993462413070110"
     data-ad-slot="3106285983"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5993462413070110",
    enable_page_level_ads: true
  });
</script><meta charset="utf-8" /> 
     <link rel="stylesheet" href="css/circle.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
<script src="https://code.jquery.com/jquery-latest.js"></script>
      <link rel="stylesheet" href="css/style2.css">
          <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-latest.js"></script>
 <script src="js/menu.js" type="text/javascript"></script> 
  <script src="js/Chart.js" type="text/javascript"></script> 
   <script type="text/javascript" src="js/loader.js"></script>
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






<script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['', <? echo round($uspeeduser/$speedcounter,1);?>],
          
        ]);

        var options = {
          width: 150, height: 150,
          redFrom: 0, redTo: 2,
          yellowFrom:2, yellowTo: 4,
          greenFrom:4 , greenTo: <? echo round(15);?> ,
          max:<? 

if($plan>100){
  echo 15;
}else{
  if($plan>30){
    echo 10;
  }else{
    echo 6;
  }
}?>,
          minorTicks: 2
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div5'));

        chart.draw(data, options);

       
        
      }


    </script>



    <style type="text/css">
    .navbar {
  -webkit-box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
-moz-box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
  }
      html, body { height: 100%; margin: 0; padding: 0;font-family: 'Work Sans', sans-serif; }
      #map {     height: 325px;
    width: 100%;
    margin: 0%; }

    </style><style type="text/css">
.myButton3 {
  
  width: 50%;
    height: 100px;
    /* background: #1cb841; */
    -moz-border-radius: 50px;
    text-align: center;
    /* -webkit-border-radius: 50px; */
    /* border-radius: 50px; */
    float: left;
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
      #shiva
{
width:50%;
    height: 100px;
    /* background: #1cb841; */
    text-align: center;
    -moz-border-radius: 50px;
    /* -webkit-border-radius: 50px; */
    /* border-radius: 50px; */
    float: left;
}
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
  
  </head>
  <body  style="background-color: #efefef;" >
<header>
    <div class="wrapper">
      
 
    </div>
  </header>

         
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
              <li class="active"><a href="estado1.php">INTERNET HOGAR</a></li>
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





<div style="width: 100%;float: left;margin-bottom: 2%;margin-top:2%;text-align: center;">

<div class="panel-primary">
    <div class="heading" style="background-color: white;text-align: center;">
     <span class="title" style="color: black;font-size: 20px;"><strong>VELOCIDAD MEDIA POR PROVEEDOR</strong></div>

       <div class="content" style="margin-top:2%;">






<br>
<div class="col-xs-12 col-md-12"   >
<canvas id="Medias" style="max-width: 600px;display :-webkit-inline-box;"  ></canvas>
<script>
var ctx = document.getElementById("Medias");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["VTR", "MOVISTAR", "ENTEL", "CLARO","GTD","TELEFONICA SUR","OTRO"],
        datasets: [{
            label: '# Velocidad Media Nacional Mbps',
            data: [<?echo round($vtr/$countervtr,1);?> , <?echo round($movi/$countermovi,1);?>, <?echo round($entel/$counterentel,1);?>, <?echo round($claro/$counterclaro,1);?>,<?echo round($gtd/$countergtd,1);?>,<?echo round($telef/$countertelef,1);?>,<?echo round($otro/$counterotro,1);?>],
            backgroundColor: [
             'rgba(0, 210, 25, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                  'rgba(15, 66, 99, 0.2)',
                    'rgba(33, 90, 192, 0.2)',
                     'rgba(80, 50, 255, 0.2)',
                'rgba(90, 70, 255, 0.2)',
            ],
            borderColor: [
              'rgba(78, 75, 52, 0.2)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                  'rgba(15, 66, 99, 0.2)',
                    'rgba(33, 90, 192, 0.2)',
                     'rgba(80, 50, 255, 0.2)',
                'rgba(90, 70, 255, 0.2)',
            ],
            borderWidth: 1
        }]
    },
    options: {
      defaultFontSize:9,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
<?
if($conex==0){
echo '<p>Solo mediciones cable de red</p>';
}
if($conex==1){
echo '<p>Solo mediciones wifi</p>';
}
if($conex==2){
echo '<p>Solo mediciones móvil</p>';
}
?>
<p>*Cálculo a <? echo $km;?> Km. de distancia.</p>
</div>

<br>
</div>


</div>
</div>
</div>





<div style="width: 100%;float: left;margin-bottom: 2%;margin-top:2%;text-align: center;">

<div class="panel-primary">
    <div class="heading" style="background-color: white;text-align: center;">
     <span class="title" style="color: black;font-size: 20px;"><strong>EFICIENCIA POR PROVEEDOR</strong></div></span>

<br>
       <div class="content">
<div class="col-xs-12 col-md-12"   >
<canvas id="myChart2"  style="margin:auto;max-width: 600px;margin-left: "></canvas>
<script>
var ctx = document.getElementById("myChart2");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["VTR", "MOVISTAR", "ENTEL", "CLARO","GTD","TELEFONICA SUR","OTRO"],
        datasets: [{
            label: '# EFICIENCIA  %',
            data: [<?echo round($efivtr/$countervtr,2)*100;?> , <?echo round($efimovi/$countermovi,2)*100;?>, <?echo round($efientel/$counterentel,2)*100;?>, <?echo round($eficlaro/$counterclaro,2)*100;?>,<?echo round($efigtd/$countergtd,2)*100;?>,<?echo round($efitelef/$countertelef,2)*100;?>,<?echo round($efiotro/$counterotro,2)*100;?>],
            backgroundColor: [
                  'rgba(0, 210, 25, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                  'rgba(15, 66, 99, 0.2)',
                    'rgba(33, 90, 192, 0.2)',
                     'rgba(80, 50, 255, 0.2)',
                'rgba(90, 70, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                  'rgba(15, 66, 99, 0.2)',
                    'rgba(33, 90, 192, 0.2)',
                     'rgba(80, 50, 255, 0.2)',
                'rgba(90, 70, 255, 0.2)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
<?
if($conex==0){
echo '<p>Solo mediciones cable de red</p>';
}
if($conex==1){
echo '<p>Solo mediciones wifi</p>';
}
if($conex==2){
echo '<p>Solo mediciones móvil</p>';
}
?>
<p>*Cálculo a <? echo $km;?> Km. de distancia.</p>
</div>
</div>
</div>
</div>




</div>

<br>





<div style="width: 100%;float: left;margin-bottom: 2%;margin-top:2%;text-align: center;">

<div class="panel-primary" style="text-align: center;">
    <div class="heading" style="background-color: white;text-align: center;">
     <span class="title" style="color: black;font-size: 20px;"><strong>CANTIDAD MEDICIONES POR PROVEEDOR</strong></div></span>

<br>
       <div class="content">
       <div class="col-xs-12 col-md-12"   >
<canvas id="myChartmax2"  style="margin:auto;max-width: 300px;margin-left: "></canvas>
<script>
var ctx = document.getElementById("myChartmax2");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["VTR", "MOVISTAR", "ENTEL", "CLARO","GTD","TELEFONICA SUR","OTRO"],
        datasets: [{
            label: '# N° MEDICIONES',
            data: [<?echo $ctvtr;?> , <?echo $ctmovi;?>, <?echo $ctentel;?>, <?echo $ctclaro;?>,<?echo $ctgtd;?>,<?echo $cttelef;?>,<?echo $ctotro;?>],
              backgroundColor: [
            "#FF6384",
            "#4BC0C0",
            "#FFCE56",
            "#E7E9ED",
            "#36A2EB",
            "#0DD800",
               "#a100bd",
                'rgba(33, 90, 192, 0.2)',
                 'rgba(80, 50, 255, 0.2)',
                'rgba(90, 70, 255, 0.2)',
        ],
        }]
    },

});
</script>
<?
if($conex==0){
echo '<p>Solo mediciones cable de red</p>';
}
if($conex==1){
echo '<p>Solo mediciones wifi</p>';
}
if($conex==2){
echo '<p>Solo mediciones móvil</p>';
}
?>
<p>*Cálculo a <? echo $km;?> Km. de distancia.</p>
</div>
</div>
</div>
</div>




</div>

<br>



<div style="width: 100%;float: left;margin-bottom: 2%;margin-top:2%;text-align: center;">

<div class="panel-primary" style="text-align: center;">
    <div class="heading" style="background-color: white;text-align: center;">
     <span class="title" style="color: black;font-size: 20px;"><strong>VELOCIDADES MÁXIMAS</strong></div></span>

<br>
       <div class="content">
       <div class="col-xs-12 col-md-12"   >
<canvas id="myChartmax"  style="margin:auto;max-width: 600px;margin-left: "></canvas>
<script>
var ctx = document.getElementById("myChartmax");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["VTR", "MOVISTAR", "ENTEL", "CLARO","GTD","TELEFONICA SUR","OTRO"],
        datasets: [{
            label: '# VELOCIDADES  Mbps',
            data: [<?echo round($maxvtr,1);?> , <?echo round($maxmovi,1);?>, <?echo round($maxentel,1);?>, <?echo round($maxclaro,1);?>,<?echo round($maxgtd,1);?>,<?echo round($maxtelef,1);?>,<?echo round($maxotro,1);?>],
            backgroundColor: [
                  'rgba(0, 210, 25, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                  'rgba(15, 66, 99, 0.2)',
                    'rgba(33, 90, 192, 0.2)',
                     'rgba(80, 50, 255, 0.2)',
                'rgba(90, 70, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                  'rgba(15, 66, 99, 0.2)',
                    'rgba(33, 90, 192, 0.2)',
                     'rgba(80, 50, 255, 0.2)',
                'rgba(90, 70, 255, 0.2)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
<?
if($conex==0){
echo '<p>Solo mediciones cable de red</p>';
}
if($conex==1){
echo '<p>Solo mediciones wifi</p>';
}
if($conex==2){
echo '<p>Solo mediciones móvil</p>';
}
?>
<p>*Cálculo a <? echo $km;?> Km. de distancia.</p>
</div>
</div>
</div>
</div>




</div>

<br>









<div class="col-xs-12 col-md-12" style="display: block;width: 100%;float: left;position: relative;background-color:rgba(121, 121, 121, 0.08);;text-align: center;font-size: large;margin-top: 0%;" alt="">

    
     


<br>

<br>

<div class="fb-share-button" data-href="https://www.velocidaddeinternet.cl" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.velocidaddeinternet.cl%2F&amp;src=sdkpreparse">Compartir</a></div> <div class="fb-like" data-href="https://www.facebook.com/Velocidaddeinternet-155955678246375/?fref=ts" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div> 


<a target="_blank" href="https://www.informatica2017.cl"> </a> <span style="color:black;"> 
</span><span><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="J3BE3PNATA3L8">
<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
<span style="color: black; font-size: 12px;">© 2017  info@velocidaddeinternet.cl - <a target="_blank" href="https://www.informatica2017.cl">informatica2017</a> Todos los derechos reservados.</span>
</span>
</div>
</div>





<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=312027822463572";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 500,
        easing: 'linear',
        step: function (now) {
            $(this).text(now);
        }
    });
});</script>
</div>   
 
 
              <!-- row end -->


                

        </div><!-- ./wrapper -->
         <script src="js/bootstrap.min.js"></script>

  </body>
</html>