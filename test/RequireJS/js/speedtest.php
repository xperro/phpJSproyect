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
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="../../build/css/metro.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-latest.js"></script>
    <style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; }

    </style><style type="text/css">
    header {
  width:100%; /* Establecemos que el header abarque el 100% del documento */
  overflow:hidden; /* Eliminamos errores de float */
  background:black;
}
 
.wrapper {
  width:90%; /* Establecemos que el ancho sera del 90% */
  max-width:1000px; /* Aqui le decimos que el ancho máximo sera de 1000px */
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
  <body  onLoad="geoFindMe()">
<header>
    <div class="wrapper">
      <div class="logo">Social Speed</div>
      
      <nav>
       <a href="speedtest.php">Test Velocidad</a>
        <a href="#">Estad&iacute;sticas</a>
        <a href="#">Contacto</a>
      </nav>
    </div>
  </header>
               <div style="margin-top: 10%;"> 
   <div class="loader" style="/* margin-left: 47%; *//* margin-top: 30%; */margin: auto;"> 
</div>
    <p align="center" style="width: 100%;align-content: center;float: none; font-size: 30px;">Realizando pruebas de Velocidad<br>Espera un momento...</p><br><br> 
</div>
   <script type="text/javascript">
        function geoFindMe() {
  var output = document.getElementById("out");

  if (!navigator.geolocation){
    output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
    return;
  }

  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;

InitiateSpeedDetection();


var imageAddr = "https://www.kameforce.cl/prueba/test/RequireJS/prueba.jpg"; 
var downloadSize = 3378081; //bytes


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
    download.src = imageAddr + cacheBuster;
    
    function showResults() {
        var duration = (endTime - startTime) / 1000;
        var bitsLoaded = downloadSize * 8;
        var speedBps = (bitsLoaded / duration).toFixed(2);
        var speedKbps = (speedBps / 1024).toFixed(2);
        var speedMbps = (speedKbps / 1024).toFixed(2);



        ShowProgressMessage([
           





            "Your connection speed is:", 
            speedBps + " bps", 
            speedKbps + " kbps", 
            speedMbps + " Mbps"






        ]);





 window.location = "speedok.php?vel="+speedMbps*10+"+&lat="+latitude+"+&lng="+longitude+"+&uspeed="+<? echo $uspeed;?>+"+&ping="+<? echo $ping;?>;


 



    }
}



















  }

  function error() {
    output.innerHTML = "Unable to retrieve your location";
  }

  

  navigator.geolocation.getCurrentPosition(success, error);
}

 </script>
          <style type="text/css">
.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 65%;
      width: 180px;
    height: 180px;
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
 <script data-main="scripts/main" src="scripts/require.js"></script>
  </body>
</html>