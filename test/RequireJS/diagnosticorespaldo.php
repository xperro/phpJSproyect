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

$velocidad= $_GET["vel"];
$lat= $_GET["lat"];
$lng= $_GET["lng"];
$uspeed= $_GET["uspeed"];
$ping= $_GET["ping"];
$conex= $_GET["conex"];
$dispositivo= $_GET["dispositivo"];
$ip= $_SERVER['REMOTE_ADDR'];
$isp= gethostbyaddr($_SERVER['REMOTE_ADDR']);
$plan= $_GET["plan"];
$pos = strpos($isp, "vtr");
$pos2 = strpos($isp, "entel");
$pos3 = strpos($isp, "claro");
$pos4 = strpos($isp, "movistar");
$pos5 = strpos($isp, "nextel");

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




if($kmfinal<=5 && $row['conexion']==0 ){
//echo distance($lat, $lng, $row['latitud'], $row['longitud'], "K") . " Kilometers<br>";

    if($row['compania']=="VTR"){
        $countervtr++;
        $vtr=$row['velocidad']+$vtr;
             $uvtr=$row['uvelocidad']+$uvtr;
    }
     if($row['compania']=="MOVISTAR"){
        $countermovi++;
        $movi=$row['velocidad']+$movi;
         $umovi=$row['uvelocidad']+$umovi;
    }
     if($row['compania']=="CLARO"){
        $counterclaro++;
        $claro=$row['velocidad']+$claro;
             $uclaro=$row['uvelocidad']+$uclaro;
    }
     if($row['compania']=="ENTEL"){
        $counterentel++;
        $entel=$row['velocidad']+$entel;
              $uentel=$row['uvelocidad']+$uentel;
    }
         if($row['compania']=="WOM"){
        $counterwom++;
        $wom=$row['velocidad']+$wom;
             $uwom=$row['uvelocidad']+$uwom;
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
  <link href="css/metro.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-latest.js"></script>
      <link rel="stylesheet" href="css/style2.css">
          <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="../../build/css/metro.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-latest.js"></script>
  <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" >
 <script src="js/menu.js" type="text/javascript"></script> 
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


 <script>
            $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
              type: 'inline',
              fixedContentPos: false,
              fixedBgPos: true,
              overflowY: 'auto',
              closeBtnInside: true,
              preloader: false,
              midClick: true,
              removalDelay: 300,
              mainClass: 'my-mfp-zoom-in'
            });
                                            
            });
        </script> 



    <style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map {     height: 325px;
    width: 325px;
    margin: 0%; }

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

              
<nav class="navbar navbar-default" > <a class="navbar-brand" href="index.php" style="padding: 8px 0px !important;"><img src="images/logo.png"></a>
  <div class="container-fluid">
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



       
             <li class="active"><a href="speedtest.php"><strong  style="color:#16bd00;">DIAGNÓSTICO</strong></a></li>
               <li><a href="misresultados.php">MIS RESULTADOS</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">MAPAS <span class=""></span></a>
          <ul class="dropdown-menu">
          <li><a href="#">FILTROS DE MAPA:</a></li>
           <li role="separator" class="divider"></li>
            <li><a href="speedmap.php">VELOCIDAD</a></li>
              <li><a href="efmap.php">EFICIENCIA</a></li>
              <li><a href="ispmap.php">ISP</a></li>
<li><a href="heatmap.php">DISPONIBILIDAD DE INTERNET</a></li>


          </ul>
        </li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right"> <li><a href="vdi.html">FAQ Y CONDICIONES</a></li>
               <li  ><a href="tips.html">ESTADO DEL SISTEMA</a></li>
      <li><a target="_blank" href="https://www.informatica2017.cl/#contact">CONTACTO</a></li>
     
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>





<div style="max-width: 100%;margin: auto;float: left;margin-left: 1%;margin-right: 1%;box-shadow: 10px 10px 5px grey;/* margin: 2%; */">
<ul class="simple-list large-bullet dark-bullet">

<div class="panel">
    <div class="heading" style="background-color: white;">
     <span class="title" style="color: black;font-size: 13px;"><strong>RESUMEN ÚLTIMO DIAGNÓSTICO</strong></div>

       <div class="content">
     <div style="width:  325px;margin: auto;">




<table class="table border bordered hovered cell-hovered"style="background-color: #e8f1f4;border:0px" >
              
                <tbody style="background-color: #e8f1f4;border:0px">
              
                <tr class="success">
                           <td style="background-color: #e8f1f4;border:0px ;color:black;font-size: 15px">  <div class="c100 p<? echo round($velocidad,0);?> small green">
                    <span><? echo round($velocidad,1);?> </span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>      <div style="margin:auto;text-align: center;font-size: small;">Descarga Mpbs</div>
</td>   










                           <td style="background-color: #e8f1f4;border:0px;color:black;font-size: 18px"> <div class="c100 p<? echo round($uspeed,0);?> small green">
                    <span><? echo round($uspeed,1);?> </span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>      <div style="margin:auto;text-align: center;font-size: small;">Carga Mbps</div>
 </td>
                            <td style="background-color: #e8f1f4;border:0px;color:black;font-size: 15px">  <?
if($velocidad/$plan>=0.7){





 echo '<div class="c100 p';  round($velocidad/$plan,0)*100; echo 'small green">';
                   echo' <span>'; round($velocidad/$plan,2)*100;echo ' %</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
              
                </div>';










}else{

if($velocidad/$plan>=0.45){


 echo '<div class="c100 p';  round($velocidad/$plan,0)*100; echo 'small green">';
                   echo' <span>'; round($velocidad/$plan,2)*100;echo ' %</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>';


}else{

 echo '<div class="c100 p';echo round($velocidad/$plan,2)*100; echo ' small green">';
                   echo' <span>'; echo round($velocidad/$plan,2)*100;echo ' %</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>';
}

}

                    ?>Eficiencia</td>
                </tr>
                </tbody>
            </table>
            <div style="width: 100%;height: 140px;">
<div style="max-width:35%;float:left;">
 <? if($conex==0){
echo '<img src="img/lan.png">';
}
if($conex==2){
echo '<img src="img/g.png">';

  }else{

echo '<img src="img/wifi.png">';

    }  ?>
</div>
     <!-- row end

<!-<span style=" ;color:black;font-size: 15px">PAQUETES PERDIDOS: <? //echo $lost; ?></span>->! -->

<div style="max-width: 35%;float: left;">
 <? 

if($dispositivo==1){
echo '<img src="img/tablet.png">';
}
if($dispositivo==2){
echo '<img src="img/smartphone.png">';
}
if($dispositivo==3){
echo '<img src="img/desktop.png">';


}


 ?>

</div>
</div>

<p>*Eficiencia = Plan / Velocidad.</p>










</div>
    </div>
</div>




</ul>
</div>



<div style="max-width: 100%;margin: auto;float: left;margin-left: 3%;margin-right: 1%;box-shadow: 10px 10px 5px grey;/* margin: 2%; */">

<div class="panel">
    <div class="heading" style="background-color:white;">
     <span class="title" style="color: black;font-size: 13px;"><strong>VELOCIDADES MEDIAS Y EVALUACIÓN</strong></div>

  <div class="content">
       <div style="width:  320px;margin: auto;">


       <div style="width: 40%;float: left;margin-left: 10%;height: 150px;margin-top: 10%;">
         
<span style="color:black;font-size: 25px;   display: block; text-align: center;"><div style="float: inherit" class="c100 p<? echo round($speeduser/$speedcounter,0);?> small green">
                    <span><? echo round($speeduser/$speedcounter,1);?> </span></div><span style="color:black;font-size: 10px;display: flex;font-weight: bold;text-align: -webkit-center; ">DESCARGA (Mbps)</span><br>
</span>

       </div>
 <div style="width: 40%;float: left;margin-left: 10%;height: 150px;margin-top: 10%;">

<span style="color:black;font-size: 25px;   display: block; text-align: center;"><div style="float: inherit" class="c100 p<? echo round($uspeeduser/$speedcounter,0);?> small green">
                    <span><? echo round($uspeeduser/$speedcounter,1);?> </span></div><span style="color:black;font-size: 10px;display: flex;font-weight: bold;text-align: -webkit-center; ">CARGA (Mbps) </span><br>


</span>
         
       </div>








<h1 style="font-size:10px;color:black;display: inline-block;text-align: center;width: 100%;"><span style="color:black;font-size: 12px;font-weight: bold; ">VALOR DE TUS MEDICIONES (VELOCIDAD MEDIA): </span> <? 

$cof=18000+74*$velocidad;
echo '<br>';
$add=1000;
$less=-1000;
$less=$less+$cof;
$add=$add+$cof;
$rango="".round($less,0)."-".round($add,0);
echo '<br>';
echo '<p style="color:green;font-size: 20px;display: block; text-align: center;">';echo "$[";echo $rango;?>]<span style="color:black;font-size: 10px;"> CLP aprox.</span> <?echo '</p>';?></h1>



<? 
$max=0;
$nombremax="Sin Información";
$planvtr=$vtr/$countervtr;
$planclaro=$claro/$counterclaro;
$planentel=$entel/$counterentel;
$planmovi=$movi/$countermovi;
$planwom=$wom/$counterwom;
if($max<$planvtr){
  $max=$planvtr;
  $nombremax="VTR";
}
if($max<$planclaro){
 $max=$planclaro;
$nombremax="CLARO";
}
if($max<$planentel){
 $max=$planentel;
 $nombremax="ENTEL";
}
if($max<$planmovi){
 $max=$planmovi;
$nombremax="MOVISTAR";
}

if($max<$planwom){

   $max=$planwom;
   $nombremax="WOM";
}
?> 

<br>

 <div class="pricing-grids">
            <div class="pricing-grid1">
              <div class="price-value">
                  <h2><a href="#"> <? echo $nombremax;?></a></h2>
                  <h5><span> <? echo $max;?> </span><lable> / Mbps</lable></h5>
                  <div class="sale-box">
              <span class="on_sale title_shop">Recomendamos</span>
              </div>
  <p style="font-size: 11px;">*La recomendación varía de acuerdo a cada zona y mediciones registradas.</p>
              </div>
       
              <div class="cart1">
                <a target="_blank" class="popup-with-zoom-anim" href=<?
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





                 ?>>Planes de Internet</a>
              </div>
             
            </div></div>
<br>


</div>

 



  </div>

<?  
if($velocidad/$plan>=0.7){
$eficiencia= round($velocidad/$plan,2)*100;
}else{

if($velocidad/$plan>=0.45){
$eficiencia= round($velocidad/$plan,2)*100;
}else{
$eficiencia= round($velocidad/$plan,2)*100;

}

}
$titulo= 'Mi Velocidad Descarga: '.round($velocidad,1).' Mbps'.' Mi Velocidad Carga: '.round($uspeed,1).' Mbps'.'Eficiencia: '.$eficiencia.'%'.'Mi Compañía: '.$compania;
$titulo2= 'Mejor Compañia en mi zona: '.$nombremax;

$titulo=$titulo.$titulo2;


  ?> 




<div style="margin:auto;width:  100%;    text-align: center;" >
<div class="fb-share-button" data-href="https://www.velocidaddeinternet.cl" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.velocidaddeinternet.cl%2F&amp;src=sdkpreparse">Compartir</a></div></div>





</div>




</div>   


















<div style="max-width: 100%;float: left;margin-right: 2%;box-shadow: 10px 10px 5px grey;/* margin: 2%; */">
<ul class="simple-list large-bullet dark-bullet">

<div class="panel">
    <div class="heading" style="background-color: white">
     <span class="title" style="color: black;font-size: 13px;"><strong>RESUMEN ZONA Y REPORTES</strong></div>

  <div class="content">
     <div style="width:  325px;margin: auto;">




<a target="_blank"href="reporte.php?vel=<?echo $velocidad;?>+&lat=<? echo $lat;?>+&lng=<?echo $lng;?>+&uspeed=<? echo $uspeed;?>+&ping=<? echo $ping ;?>+&plan=<?echo$plan;?>+&conex=<?echo $conex;?>+&dispositivo=<?echo $dispositivo;?>"><button style="
    width: 100%;
    height: 30px;font-size: 15px;background-color: #c8cdce;color: black;
" data-toggle="" data-target="" class="btn btn-info active">IMPRIMIR REPORTE</button>
</a>
<br><br>





<button style="
    width: 100%;
    height: 30px;font-size: 15px;background-color:  #c8cdce;color: black;
" data-toggle="collapse" data-target="#demo" class="btn btn-info active">DETALLE PROVEEDORES (ISP)</button><br>
<div class="collapse" id="demo">
 <table class="table border bordered hovered cell-hovered"  >
                <thead>
                <tr style="background-color: #6d5975;color:white;">
                    <th style="background-color: #6d5975;color:white;">ISP</th>
                    <th style="background-color: #6d5975;color:white;">D.MEDIA</th>
                    <th style="background-color: #6d5975;color:white;">C.MEDIA</th>
                         <th style="background-color: #6d5975;color:white;">CANT.</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="background-color:#f5f5f5 ;color:black;">VTR</td>
                 <td style="background-color:#f5f5f5 ;color:black;"><?echo round($vtr/$countervtr,1);?> Mbps</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($uvtr/$countervtr,1);?> Mbps</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo $countervtr;?></td>
                </tr>
                <tr class="error">
                     <td style="color:black;background-color:#f5f5f5"> MOVISTAR</td>
                   <td style="color:black;background-color:#f5f5f5"><?echo round($movi/$counterentel,1);?> Mbps</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($umovi/$countermovi,1);?> Mbps</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo $countermovi;?></td>
                </tr>
                <tr class="warning">
                    <td style="color:black;background-color:#f5f5f5">ENTEL</td>
                  <td style="color:black;background-color:#f5f5f5"><?echo round($entel/$counterentel,1);?> Mbps</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($uentel/$counterentel,1);?> Mbps</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo $counterentel;?></td>
                </tr>
                <tr class="info">
                   <td style="color:black;background-color:#f5f5f5">CLARO</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($claro/$counterclaro,1);?> Mbps</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($uclaro/$counterclaro,1);?> Mbps</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo $counterclaro;?></td>
                </tr>
                <tr class="success">
                      <td style="color:black;background-color:#f5f5f5">WOM</td>
           <td style="color:black;background-color:#f5f5f5">  
           <?echo round($wom/$counterwom,1);?> Mbps</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($uwom/$counterwom,1);?> Mbps </td>
                 <td style="color:black;background-color:#f5f5f5"><?echo $counterwom;?></td>
                </tr>
                </tbody>
            </table><p>*(Sólo conexión por cable y a una distancia de 5 Km.)</p></div><br>







<button style="
    width: 100%;background-color: #c8cdce;color: black;
    height: 30px;font-size: 15px;
" data-toggle="collapse" data-target="#demo2" class="btn btn-info active">MEDICIONES ANTERIORES</button><br><br>
<div class="collapse" id="demo2">
 <table class="table border bordered hovered cell-hovered" >
                <thead>
                <tr style="background-color: #6d5975;color:white;">
                <th style="background-color: #6d5975;color:white;">      FECHA    </th>
                    <th style="background-color: #6d5975;color:white;">BAJADA</th>
                    <th style="background-color: #6d5975;color:white;">SUBIDA</th>
                </tr>
                </thead>
                <tbody>
             
                  
                <?

 $ip= $_SERVER['REMOTE_ADDR'];

//$query2 = mysql_query("SELECT velocidad,hora,uvelocidad FROM test WHERE ip='$ip'");
 //$query2 = "SELECT * FROM test where ip="+$_SERVER['REMOTE_ADDR'];

$query = "SELECT * FROM test WHERE ip='$ip' ORDER BY hora DESC LIMIT 0,5;";

$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
 

while ($fila =@mysql_fetch_assoc($result)){ 

echo    '<tr class="warning">';
 
   echo '<td style="background-color:#f5f5f5 ;color:black;">';
    echo $fila['hora'];
                    echo '</td>';

   echo '<td style="background-color:#f5f5f5 ;color:black;">';
    echo round($fila['velocidad'],1)."(Mbps)";
                    echo '</td>';

   echo '<td style="background-color:#f5f5f5 ;color:black;">';
    echo round($fila['uvelocidad'],1)."(Mbps)";
                    echo '</td>';


                    echo   '</tr>';
}



/*

while ($row2 = @mysql_fetch_assoc($query2)){


              //      echo '<td style="background-color:#f5f5f5 ;color:black;">';
              //      echo $row2['hora'];
                    /*echo '</td>';
                        echo '<td style="background-color:#f5f5f5 ;color:black;">'.$row2['velocidad'].'</td>';
                                        echo '<td style="background-color:#f5f5f5 ;color:black;">'.$row2['uvelocidad'].'</td>';*/

                
       

                 //?>
                </tr>
                
                </tbody>
            </table><br></div>





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

      infoWindow.setContent('Mi Ubicaci&oacute;n.');

      map.setCenter(pos);

function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
  var R = 6371;
  var dLat = (lat2-lat1) * (Math.PI/180);
  var dLon = (lon2-lon1) * (Math.PI/180);
  var a =
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(lat1 * (Math.PI/180)) * Math.cos(lat2 * (Math.PI/180)) *
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ;
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  var d = R * c;
  return d;
}


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


//var heatMapData = [
 // {location: point, weight: <? echo $velocidad/100;?>},];


var porcentaje=velocidad/10;
porcentaje = Math.ceil(porcentaje);
if(porcentaje==1){
var color='#DF0101';
}
if(porcentaje==2){
var color='#DF3A01';
}
if(porcentaje==3){
 var color='#FF0000';
}
if(porcentaje==4){
var color='#FF4000';
}
if(porcentaje==5){
 var color='#FF8000';
}
if(porcentaje==6){
  var color='#FFBF00';
}
if(porcentaje==7){
var color='#FFBF00';
}
if(porcentaje==8){
  var color='#9ce9a1';
}
if(porcentaje==8){
 var color='#6bde73';
}
if(porcentaje==9){
 var color='#3ad344';
}
if(porcentaje>=10){
  var color='#09c916';
}





 google.maps.event.trigger(map,'resize');
          
              var marker = new google.maps.Marker({
                map: map,
                position: point,
               icon: {
      path: google.maps.SymbolPath.CIRCLE,
      scale: 6,
      strokeColor:color,
      strokeWeight: 9,
    fillColor: '#F00'
    },
              });
              marker.addListener('click', function() {

                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });


// HERE THE COUNTERS




             });



//HERE ASSIGN VARS FOR GENERAL INFO

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
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=312027822463572";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


</div>   
 
  <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR1Ge7yrmN4PjbMcxAZuamClRWoiVhvZs&callback=initMap">
    </script>
              <!-- row end -->


                

        </div><!-- ./wrapper -->
   <script data-main="scripts/main" src="scripts/require.js"></script>
         <script src="js/bootstrap.min.js"></script>
  </body>
</html>