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


$ip= $_SERVER['REMOTE_ADDR'];
$isp= gethostbyaddr($_SERVER['REMOTE_ADDR']);
$plan= $_GET["plan"];
$pos = strpos($isp, "vtr");
$pos2 = strpos($isp, "entel");
$pos3 = strpos($isp, "claro");
$pos4 = strpos($isp, "movistar");
$pos5 = strpos($isp, "nextel");
$pos6 = strpos($isp, "gtd");

if($conex==0){
$query2 = "SELECT * FROM test where ip='$ip' and plan!=0 ORDER BY id DESC LIMIT 0,1";
}

$result2 = mysql_query($query2);
if (!$result2) {
  die('Invalid query: ' . mysql_error());
}
while ($row2 = @mysql_fetch_assoc($result2)){

$conex=$row2['conexion'];
$lat=$row2['latitud'];
$lng=$row2['longitud'];
$plan=$row2['plan'];
  }

if($conex==0){
$query = "SELECT * FROM test where conexion=0 and plan!=0";
}
if($conex==1){
$query = "SELECT * FROM test where conexion=1 and plan!=0";
}
if($conex==2){
$query = "SELECT * FROM test where conexion=2 and plan!=0";
}


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
// Iterate through the rows, adding XML nodes for each
$speeduser=0;
$speedcounter=0;
$uspeeduser=0; 
//$lost=checkPacketLoss($ip, 5);
while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node


//la otra prueba





if($row['ip']==$ip){

$speeduser=$speeduser+$row['velocidad'];
$uspeeduser=$uspeeduser+$row['uvelocidad'];
$speedcounter=$speedcounter+1;
}




//echo distance($lat, $lng, $row['latitud'], $row['longitud'], "K") . " Kilometers<br>";

    if($row['compania']=="VTR"){
        $countervtr++;

        $vtr=$row['velocidad']+$vtr;
if($row['velocidad']>$maxvtr){
  $maxvtr=$row['velocidad'];
}
        $efivtr=$efivtr+$row['velocidad']/$row['plan'];

             $uvtr=$row['uvelocidad']+$uvtr;
    }
     if($row['compania']=="MOVISTAR"){
        $countermovi++;
        $movi=$row['velocidad']+$movi;
        if($row['velocidad']>$maxmovi){
  $maxmovi=$row['velocidad'];
  }
         $umovi=$row['uvelocidad']+$umovi;
         $efimovi=$efimovi+$row['velocidad']/$row['plan'];
    }
     if($row['compania']=="CLARO"){
        $counterclaro++;
        $claro=$row['velocidad']+$claro;
               if($row['velocidad']>$maxclaro){
  $maxclaro=$row['velocidad'];
  }
             $uclaro=$row['uvelocidad']+$uclaro;
              $eficlaro=$eficlaro+$row['velocidad']/$row['plan'];
    }
     if($row['compania']=="ENTEL"){
        $counterentel++;
        $entel=$row['velocidad']+$entel;
                     if($row['velocidad']>$maxentel){
  $maxentel=$row['velocidad'];
}
              $uentel=$row['uvelocidad']+$uentel;
                $efientel=$efientel+$row['velocidad']/$row['plan'];
    }
         if($row['compania']=="WOM"){
        $counterwom++;
        $wom=$row['velocidad']+$wom;
                 if($row['velocidad']>$maxwom){
  $maxwom=$row['velocidad'];
}
             $uwom=$row['uvelocidad']+$uwom;
               $efiwom=$efiwom+$row['velocidad']/$row['plan'];
    }
      if($row['compania']=="GTD"){
        $countergtd++;
        $gtd=$row['velocidad']+$gtd;
                if($row['velocidad']>$maxgtd){
  $maxgtd=$row['velocidad'];
}
             $ugtd=$row['uvelocidad']+$ugtd;
               $efigtd=$efigtd+$row['velocidad']/$row['plan'];
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
if($counterwom==0){
    $counterwom=1;
}
if($countergtd==0){
    $countergtd=1;
}

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
if ($pos6 !== false) {
    $compania="GTD";
} else {
    
}

$nowFormat = date('Y-m-d H:i:s');
$phpdate = strtotime( $nowFormat );
}




?>




<!DOCTYPE html>
<html>
<head><meta charset="utf-8" /> 
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
          ['', <? echo round($speeduser/$speedcounter,1);?>],
          
        ]);

        var options = {
          width: 150, height: 150,
          redFrom: 0, redTo: <? echo round($plan*2/4,0);?>,
          yellowFrom:<? echo round($plan*2/4,0);?>, yellowTo: <? echo round($plan*3/4,0);?>,
          greenFrom:<? echo round($plan*3/4,0);?> , greenTo: <? echo round($plan,0);?> ,
          max:<? echo round($plan,0);?> ,
          minorTicks: 2
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div4'));

        chart.draw(data, options);

       
        
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

<script type="text/javascript">
  
if(<? echo $speeduser?>==0){

  window.alert("No ha realizado diagnósticos aún, la información no está disponible.")
}




</script>


    <style type="text/css">
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
  </style>
  
  </head>
  <body style="background-color: #efefef;" >
<header>
    <div class="wrapper">
      
 
    </div>
  </header>

<nav class="navbar navbar-default" style="margin-bottom: 0px;"> <a class="navbar-brand" href="index.php" style="padding: 8px 0px !important;"><img src="images/logo.png"></a>
  
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



       
             <li ><a href="speedtest.php"><strong  style="color:#16bd00;">DIAGNÓSTICO</strong></a></li>
    
     
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
     <li><a href="estado3.php">INTERNET HOGAR</a></li>
                <li><a href="estado4.php">INTERNET MÓVIL</a></li>


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
        </li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right"> <li class="active"><a href="vdi.html">FAQ Y CONDICIONES</a></li>
               <li  ><a href="tips.html">ESTADO DEL SISTEMA</a></li>
      <li><a target="_blank" href="https://www.informatica2017.cl/#contact">CONTACTO</a></li>
     
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div style="width: 100%;float: left;margin-bottom: 2%;margin-top:2%;text-align: center;">

<div class="panel-primary">
    <div class="heading" style="background-color: white;text-align: center;">
     <span class="title" style="color: black;font-size: 20px;"><strong>EVALUACIÓN</strong></div>

       <div class="content" style="margin-top:2%;">






<br>
<div class="col-xs-12 col-md-12"   >
<canvas id="Medias" style="max-width: 600px;display :-webkit-inline-box;"  ></canvas>
<script>
var ctx = document.getElementById("Medias");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [,"VTR", "MOVISTAR", "ENTEL", "CLARO", "WOM","GTD"],
        datasets: [{
            label: '# Velocidad Media Nacional Mbps',
            data: [<?echo round($vtr/$countervtr,1);?> , <?echo round($movi/$countermovi,1);?>, <?echo round($entel/$counterentel,1);?>, <?echo round($claro/$counterclaro,1);?>, <?echo round($wom/$counterwom,1);?>,<?echo round($gtd/$countergtd,1);?>],
            backgroundColor: [
             'rgba(0, 210, 25, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
              'rgba(78, 75, 52, 0.2)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
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
<p>*El gráfico de eficiencia varía de acuerdo a cada zona y mediciones registradas.</p>
</div>

<br>
</div>
<div id="eval" style=" width: 100%;float: left;text-align: center;">

<div class="panel-primary">
    <div class="heading" style="background-color: white;text-align: center;">
     <span class="title" style="color: black;font-size: 20px;"><strong>RECOMENDACIÓN</strong></div></span>

       <div class="content">


 <div class="pricing-grids" style="margin-top: 0;">
            <div class="pricing-grid1">
              <div class="price-value">
                  <h2><? 



                  echo $nombremax;?></h2>
                  <h5><span> <? 

if($best==1){

if($velocidad/$plan>=0.7){
echo '<p>Su velocidad media es la mejor disponible en su zona y es eficiente respecto a su plan.<p>';
   

}else{

echo '<p>Su velocidad media es la mejor disponible en su zona, pero no es eficiente respecto a su plan.<p>';
echo '<a href="vdi.html#conexion"><p>Revisar recomendaciones sobre conexión para mejorar eficiencia aquí.<p></a>';
  
}




}else{
   echo round($max,2).'/ Mbps (Velocidad Media)';
}

if($conex==1){
echo '<p>Debe realizar el diagnóstico mediante cable de red o red 2G/3G/4G, para obtener un resultado óptimo.<p>';

}

                 ?> </span><lable> </lable></h5>
                  <div class="sale-box">
              <span class="on_sale title_shop">Recomendamos</span>
              </div>
  <p style="font-size: 11px;">*La recomendación varía de acuerdo a cada zona y mediciones registradas.</p>
              </div>
       
              <div class="cart1">
                <a target="_blank" class="" href=<?
if($nombremax=="ENTEL"){
echo '"http://www.entel.cl/hogar/internet.iws"';
}
if($nombremax=="VTR"){
  echo '"https://vtr.com/productos/hogar/product.clasificacion/BandaAncha"';
}
if($nombremax=="WOM"){
  echo '"http://www.wom.cl/internet/"';
}
if($nombremax=="MOVISTAR"){
  echo '"http://www.movistar.cl/web/movistar/tienda/servicios-hogar/banda-ancha-hogar"';
}
if($nombremax=="CLARO"){
  echo '"http://www.clarochile.cl/portal/cl/pc/personas/internet/"';
}
if($nombremax=="GTD"){
  echo '"https://nuevo.gtdmanquehue.com/internet/planes-de-internet"';
}





                 ?>>Planes de Internet</a>
              </div>
             
            </div></div>
      </div>
</div>
</div>
</div>





     
    </div>
</div>





<div style="width: 100%;float: left;margin-bottom: 2%;margin-top:2%;text-align: center;">

<div class="panel-primary">
    <div class="heading" style="background-color: white;text-align: center;">
     <span class="title" style="color: black;font-size: 20px;"><strong>EFICIENCIA POR PROVEEDOR</strong></div></span>

       <div class="content">
<canvas id="myChart2"  style="margin:auto;max-width: 500px;margin-left: "></canvas>
<script>
var ctx = document.getElementById("myChart2");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["VTR", "MOVISTAR", "ENTEL", "CLARO", "WOM","GTD"],
        datasets: [{
            label: '# EFICIENCIA  %',
            data: [<?echo round($efivtr/$countervtr,1)*10;?> , <?echo round($efimovi/$countermovi,1)*10;?>, <?echo round($efientel/$counterentel,1)*10;?>, <?echo round($eficlaro/$counterclaro,1)*10;?>, <?echo round($efiwom/$counterwom,1)*10;?>,<?echo round($efigtd/$countergtd,1)*10;?>],
            backgroundColor: [
                  'rgba(0, 210, 25, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
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
<p>*El gráfico de eficiencia varía de acuerdo a cada zona y mediciones registradas.</p>
</div>
</div>
</div>
</div>




</div>

<br>





<div style="width: 100%;float: left;margin-bottom: 2%;margin-top:2%;text-align: center;">

<div class="panel-primary">
    <div class="heading" style="background-color: white;text-align: center;">
     <span class="title" style="color: black;font-size: 20px;"><strong>VELOCIDADES MÁXIMAS EN TU ZONA</strong></div></span>

       <div class="content">
<canvas id="myChartmax"  style="margin:auto;max-width: 500px;margin-left: "></canvas>
<script>
var ctx = document.getElementById("myChartmax");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["TÚ","VTR", "MOVISTAR", "ENTEL", "CLARO", "WOM","GTD"],
        datasets: [{
            label: '# VELOCIDADES  Mbps',
            data: [<?echo round($speeduser/$speedcounter,1);?>,<?echo round($maxvtr,1);?> , <?echo round($maxmovi,1);?>, <?echo round($maxentel,1);?>, <?echo round($maxclaro,1);?>, <?echo round($maxwom,1);?>,<?echo round($maxgtd,1);?>],
            backgroundColor: [
                  'rgba(0, 210, 25, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
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
<p>*El gráfico de eficiencia varía de acuerdo a cada zona y mediciones registradas.</p>
</div>
</div>
</div>
</div>




</div>

<br>


<div style="width: 100%;float: left;margin-bottom: 2%;margin-top:2%;text-align: center;">

<div class="panel-primary">
    <div class="heading" style="background-color: white;text-align: center;">
     <span class="title" style="color: black;font-size: 20px;"><strong>MEDICIONES ANTERIORES</strong></div></span>

       <div class="content">
<canvas id="myChart3"  style="margin:auto;max-width: 500px;margin-left: "></canvas>


<?

 $ip= $_SERVER['REMOTE_ADDR'];

//$query2 = mysql_query("SELECT velocidad,hora,uvelocidad FROM test WHERE ip='$ip'");
 //$query2 = "SELECT * FROM test where ip="+$_SERVER['REMOTE_ADDR'];

$query = "SELECT * FROM test WHERE ip='$ip' ORDER BY hora DESC LIMIT 0,5;";

$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

 $var=1;
while ($fila =@mysql_fetch_assoc($result)){ 

if($var==1){
 
 $fecha1=$fila['hora'];
 $velocidad1=$fila['velocidad'];
}
if($var==2){
  $fecha2=$fila['hora'];;
 $velocidad2=$fila['velocidad'];;
}

if($var==3){
 $fecha3=$fila['hora'];;
 $velocidad3=$fila['velocidad'];;
}

if($var==4){
 $fecha4=$fila['hora'];;
 $velocidad4=$fila['velocidad'];;
}

if($var==5){
  $fecha5=$fila['hora'];;
 $velocidad5=$fila['velocidad'];;
}
 $var++;


}



/*

while ($row2 = @mysql_fetch_assoc($query2)){


              //      echo '<td style="background-color:#f5f5f5 ;color:black;">';
              //      echo $row2['hora'];
                    /*echo '</td>';
                        echo '<td style="background-color:#f5f5f5 ;color:black;">'.$row2['velocidad'].'</td>';
                                        echo '<td style="background-color:#f5f5f5 ;color:black;">'.$row2['uvelocidad'].'</td>';*/

                
       

                 //?> 




<script>
var ctx = document.getElementById("myChart3");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["<? echo $fecha5;?>", "<? echo $fecha4;?>", "<? echo $fecha3;?>","<? echo $fecha2;?>", "<? echo $fecha1;?>"],
        datasets: [{
            label: 'Fecha Medición',
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: ["<? echo $velocidad5;?>"," <? echo $velocidad4;?>", "<? echo $velocidad3;?>","<? echo $velocidad2;?>", "<? echo $velocidad1;?>"],
            backgroundColor: [
                'rgba(0, 210, 25, 0.2)',
                 'rgba(0, 210, 25, 0.2)',
                 'rgba(0, 210, 25, 0.2)',
                 'rgba(0, 210, 25, 0.2)',
                 'rgba(0, 210, 25, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
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

</div>
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
</div>
</div>
</div>




</div>

<br>




</div>





     
    </div>
</div>








<div style="width: 100%;float: left;margin-bottom: 2%;margin-top:2%;">

<div class="panel-primary">
    <div class="heading" style="background-color: white;text-align: center;">
     <span class="title" style="color: black;font-size: 20px;"><strong>REPORTE</strong>
     </div></span>

       <div class="content">


<a target="_blank"href="reporte.php?vel=<?echo $velocidad;?>+&lat=<? echo $lat;?>+&lng=<?echo $lng;?>+&uspeed=<? echo $uspeed;?>+&ping=<? echo $ping ;?>+&plan=<?echo$plan;?>+&conex=<?echo $conex;?>+&dispositivo=<?echo $dispositivo;?>"><button class="myButton3" style="
    width: 100%;
    height: 30px;font-size: 15px;background-color: #c8cdce;color: black;
" data-toggle="" data-target="" class="btn btn-info active">IMPRIMIR REPORTE</button>
</a>


      </div>
</div></div>





      <div style="display: block;width: 100%;float: left;position: relative;background-image:url('img/back.png');text-align: center;font-size: large;margin-top: 0%;" alt="">

    
     


<br>


<div class="fb-share-button" data-href="https://www.velocidaddeinternet.cl" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.velocidaddeinternet.cl%2F&amp;src=sdkpreparse">Compartir</a></div> <div class="fb-like" data-href="https://www.facebook.com/Velocidaddeinternet-155955678246375/?fref=ts" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div> 


<a target="_blank" href="https://www.informatica2017.cl"><img src="images/foo.png">  <img src="images/foo2.png"> </a> <span style="color:black;"> 
</span>
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