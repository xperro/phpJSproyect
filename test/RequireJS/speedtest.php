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
        $countervtr++;     $validador=true;
        $vtr=$row['velocidad']+$vtr;
    }
     if($row['compania']=="MOVISTAR"){
        $countermovi++;     $validador=true;
        $movi=$row['velocidad']+$movi;
    }
     if($row['compania']=="CLARO"){
        $counterclaro++;     $validador=true;
        $claro=$row['velocidad']+$claro;
    }
     if($row['compania']=="ENTEL"){
        $counterentel++;     $validador=true;
        $entel=$row['velocidad']+$entel;
    }
     if($row['compania']=="GTD"){
        $countergtd++;     $validador=true;
        $gtd=$row['velocidad']+$gtd;
    }
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
if($counterotro==0){
    $counterotro=1;$ctgotro = 0;
}


?>
  <?php


$kb=4096;
    //echo "streaming $kb Kb...<!-";
    flush();
    $time = explode(" ",microtime());
    $start = $time[0] + $time[1];
    for($x=0;$x<$kb;$x++){
       echo  str_pad('', 4096, '');
        flush();
    }
    $time = explode(" ",microtime());
    $finish = $time[0] + $time[1];
    $deltat = $finish - $start;
    //echo "-> Test finished in $deltat seconds. Your speed is ". round($kb / $deltat, 3)."Kb/s";
   
   $uspeed=round($kb / $deltat, 3)/100000;


  $tB = microtime(true); 
  $fP = fSockOpen("www.google.cl",80, $errno, $errstr, 10); 
  if (!$fP) { 


  }else{
 $tA = microtime(true); 
  $ping= round((($tA - $tB) * 1000), 0); 


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
</script>


  <meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
  var w=new Worker("speedtest_worker.js"); //create new worker
  setInterval(function(){w.postMessage("status");}.bind(this),100); //ask for status every 100ms
  w.onmessage=function(event){ //when status is received, split the string and put the values in the appropriate fields
    var data=event.data.split(";"); //string format: status;download;upload;ping (speeds are in mbit/s) (status: 0=not started, 1=downloading, 2=uploading, 3=ping, 4=done, 5=aborted)
   
    document.getElementById("upload").innerHTML=data[2];
    
  }
  w.postMessage("start"); //start the speedtest (default params. keep garbage.php and empty.dat in the same directory as the js file)


</script>
    <style type="text/css">
     .navbar {
  -webkit-box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
-moz-box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
  }
      html, body { height: 100%; margin: 0; padding: 0; font-family: 'Work Sans', sans-serif;}
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
}
#myProgress {
    position: relative;
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 65%;
      width: 140px;
    height: 140px;
    animation: spin 4s linear infinite;
}
}
#myBar {
    position: absolute;
    width: 1%;
    height: 100%;
    background-color: green;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* If you want the label inside the progress bar */
#label {
    text-align: center; /* If you want to center it */
    line-height: 30px; /* Set the line-height to the same as the height of the progress bar container, to center it vertically */
    color: white;
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

  

  <body style="background-color: #efefef;font-family: 'Work Sans', sans-serif;" onLoad="geoFindMe()">
 
             
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


  </header>



  <p align="center" style="margin-top:60px;color:black;width: 100%;align-content: center;float: none; font-size: 20px;">Recuerda<br><strong>Dar permisos de geolocalizaci&oacute;n (Activar ubicaci&oacute;n en equipos m&oacute;viles) para tener &eacute;xito.</strong>

  </p>  <div id="upload" style="display: none;"></div> <div style="margin: auto;margin-top: 2%margin-left:2 max-width:50%;">
<div id="myBar">
    <div id="label" style="color:black;background-color: none;">0%</div>
  </div></div>
               <div style="margin-top: 5%;"> 
   <div class="loader" style="/* margin-left: 47%; *//* margin-top: 30%; */margin: auto;"> 

</div><br>
<p align="center" style="color:black;width: 100%;align-content: center;float: none; font-size: 15px;">Es necesario correr la prueba con un navegador como; IE, Chrome, Safari, Opera.</p>
    <p align="center" style="color:black;width: 100%;align-content: center;float: none; font-size: 15px;">Realizando pruebas de velocidad.<br>Espera un momento...</p><p align="center"><strong>EL DIAGNÓSTICO SIRVE PARA REDES HOGAR O REDES DE INTERNET MÓVIL</p></strong><br><br> 
</div>
  <script type="text/javascript">
        function geoFindMe() {
  var output = document.getElementById("out");

  if (!navigator.geolocation){
  
    return;
  }

  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;

InitiateSpeedDetection();


var imageAddr = "https://www.velocidaddeinternet.cl/10MB.jpg"; 
var downloadSize = 2097152; //bytes
var speedMbps=0;
function move() {
    var elem = document.getElementById("myBar"); 
    var width = 1;
    var id = setInterval(frame, 500);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
            if(speedMbps<=0){

window.alert("Ha ocurrido un error, su internet es muy deficiente o se encuentra fuera de Chile.");

            }else{
            window.location = "speedok.php?vel="+speedMbps*6+"+&lat="+latitude+"+&lng="+longitude+"+&uspeed="+document.getElementById("upload").innerHTML+"+&ping="+<? echo $ping;?>;}
        } else {
            width++; 
            //elem.style.width = width + '%'; 
            document.getElementById("label").innerHTML = width * 1 + '%';
        }
    }
}

function ShowProgressMessage(msg) {
    if (console) {
        if (typeof msg == "string") {
            console.log(msg);
        } else {
            for (var i = 0; i < msg.length; i++) {
                console.log(msg[i]);
            }
        }
    }
    
    var oProgress = document.getElementById("progress");
    if (oProgress) {
        var actualHTML = (typeof msg == "string") ? msg : msg.join("<br />");
        oProgress.innerHTML = actualHTML;
    }
}

function InitiateSpeedDetection() {
    ShowProgressMessage("Loading the image, please wait...");
    window.setTimeout(MeasureConnectionSpeed, 1);
};    

if (window.addEventListener) {
    window.addEventListener('load', InitiateSpeedDetection, false);
} else if (window.attachEvent) {
    window.attachEvent('onload', InitiateSpeedDetection);
}


function MeasureConnectionSpeed() {
    var startTime, endTime;
    var download = new Image();

    download.onload = function () {
        endTime = (new Date()).getTime();
        showResults();
    }
    
    download.onerror = function (err, msg) {
        ShowProgressMessage("Invalid image, or error downloading");
    }
    
    startTime = (new Date()).getTime();
    var cacheBuster = "?nnn=" + startTime;
    move();
    download.src = imageAddr + cacheBuster;
    
    function showResults() {
        var duration = (endTime - startTime) / 1000;
        var bitsLoaded = downloadSize * 8;
        var speedBps = (bitsLoaded / duration).toFixed(2);
        var speedKbps = (speedBps / 1024).toFixed(2);
         speedMbps = (speedKbps / 1024).toFixed(2);



        ShowProgressMessage([
           





            "Your connection speed is:", 
            speedBps + " bps", 
            speedKbps + " kbps", 
            speedMbps + " Mbps"






        ]);





 //window.location = "speedok.php?vel="+speedMbps*6+"+&lat="+latitude+"+&lng="+longitude+"+&uspeed="+<? echo $uspeed;?>+"+&ping="+<? echo $ping;?>;


 



    }
}



















  }

  function error() {
    window.location= "error.html";
  }

  

  navigator.geolocation.getCurrentPosition(success, error);
}

 </script>
          <style type="text/css">
.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 65%;
      width: 140px;
    height: 140px;
    animation: spin 4s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
          </style>


  



                <!-- Main content -->
           
               
 

              <!-- row end -->


                
        </div><!-- ./wrapper -->
       <script src="js/bootstrap.min.js"></script>
  </body>
</html>