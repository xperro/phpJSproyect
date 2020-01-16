
<?


include("config.php");



?>




<!DOCTYPE html>
<html>
  <head><meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="../../build/css/metro.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-latest.js"></script>
  <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" >
 <script src="js/menu.js" type="text/javascript"></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

</head>
  <body style="color:#f8f8f8;" >

<div class="grid">
    <div class="row">
        <div class="cell"><h1 style="
   color: black; text-align: center;font-size: 24px;
"><strong><img src="images/logo.png"></strong></h1><br>
<h2 style="font-size: 15px;color: black;">REPORTE DE DIAGNÓSTICO:</h2><br>

    </div>
</div>

<div style="max-width: 100%;margin: auto;float: left;margin-left: 1%;margin-right: 1%;/* margin: 2%; */">
<ul class="simple-list large-bullet dark-bullet">

<div class="panel">
    <div class="heading">
     <span class="title" style="color: black;">RESUMEN DE TU DIAGNÓSTICO</div>

       <div class="content">
     <div style="width:  100%;margin: auto;">




<table class="table border bordered hovered cell-hovered" >
                <thead>
                <tr style="background-color: #6d5975;color:white;">
                    <th style="background-color: #6d5975;color:white;font-size: 15px">DESCARGA</th>
                    <th style="background-color: #6d5975;color:white;font-size: 15px">CARGA</th>
                    <th style="background-color: #6d5975;color:white;font-size: 15px">EFICIENCIA</th>
                </tr>
                </thead>
                <tbody>
              
                <tr class="success">
                           <td style="background-color:#f5f5f5 ;color:black;font-size: 15px"><? echo round($velocidad,2); ?> Mbps</td>   
                           <td style="background-color:#f5f5f5 ;color:black;font-size: 15px"><? echo round($uspeed,2); ?> Mbps </td>
                            <td style="background-color:#f5f5f5 ;color:black;font-size: 15px">  <?
if($velocidad/$plan>=0.7){
echo '<p style="font-size:15px;color:green;">';echo round($velocidad/$plan,2)*100;echo '%</p>';
}else{

if($velocidad/$plan>=0.45){
echo '<p style="font-size:15px;color:yellow;">';echo round($velocidad/$plan,2)*100;echo'%</p>';
}else{
echo '<p style="font-size:15px;color:red;">';echo round($velocidad/$plan,2)*100;echo '%</p>';

}

}

                    ?></td>
                </tr>
                </tbody>
            </table>

<span style=" ;color:black;font-size: 15px">TIPO DE CONEXIÓN: <? if($conex==1){
echo '<p style="font-size:15px;color:red;">';echo "WIFI (NO ES UN DIAGNÓSTICO ÓPTIMO)"; echo '</p>';
}else{
echo '<p style="font-size:15px;color:green;">';echo "CABLE (DIAGNÓSTICO ÓPTIMO)"; echo '</p>';

  }  ?></span>

     <!-- row end

<!-<span style=" ;color:black;font-size: 15px">PAQUETES PERDIDOS: <? //echo $lost; ?></span>->! -->

<br>
<span style=" ;color:black;font-size: 15px">DISPOSITIVO: <? 

if($dispositivo==1){
echo '<img src="img/tablet.png">';
}
if($dispositivo==2){
echo '<img src="img/smartphone.png">';
}
if($dispositivo==3){
echo '<img src="img/desktop.png">';


}


 ?></span>

<p>*Eficiencia = Plan / Velocidad.</p>










</div>
    </div>
</div>




</ul>
</div>



<div style="max-width: 100%;margin: auto;float: left;margin-left: 3%;margin-right: 1%;/* margin: 2%; */">

<div class="panel">
    <div class="heading">
     <span class="title" style="color: black;">EVALUACIÓN</div>

  <div class="content">
       <div style="width:  100%;margin: auto;">

<span style="color:black;font-size: 15px;">Su velocidad media de descarga es : <? echo round($speeduser/$speedcounter,1);?> Mbps</span><br>
<span style="color:black;font-size: 15px;">Su velocidad media de subida es : <? echo round($uspeeduser/$speedcounter,1);?> Mbps</span><br>

<h1 style="font-size:15px;color:black;">Según tu velocidad media , el costo de tu plan de internet debería ser de (rango):  <? 

$cof=18000+74*$velocidad;

$add=1000;
$less=-1000;
$less=$less+$cof;
$add=$add+$cof;
$rango="".round($less,0)."-".round($add,0);
echo '<span style="font-size:15px;color:red;">';echo $rango." CLP aprox."; echo '</span>';?> </h1>

<h1 style="font-size:15px;color:black;">Según el plan que ingresaste:  <? 


if($plan==0){

echo '<span style="font-size:15px;color:red;">';echo "Plan no ingresado"; echo '</span>';
  
}else{
$cof=18000+74*$plan;
$add=1000;
$less=-1000;
$less=$less+$cof;
$add=$add+$cof;
$rango="".$less."-".$add;
echo '<span style="font-size:15px;color:red;">';echo $rango." CLP aprox."; echo '</span>';

}

?> </h1>


<h1 style="font-size:15px;color:black;">La velocidad media más alta en tu zona es de:  <? 
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
echo $max."Mbps Compañía: ".$nombremax;
?> </h1>




<br>

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

</div>


<br>


 <table class="table border bordered hovered cell-hovered" >
                <thead>
                <tr style="background-color: #6d5975;color:white;">
                    <th style="background-color: #6d5975;color:white;">ISP</th>
                    <th style="background-color: #6d5975;color:white;">DESCARGA MEDIA</th>
                    <th style="background-color: #6d5975;color:white;">CARGA MEDIA</th>
                         <th style="background-color: #6d5975;color:white;">CANTIDAD</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="background-color:#f5f5f5 ;color:black;">VTR</td>
                 <td style="background-color:#f5f5f5 ;color:black;"><?echo round($vtr/$countervtr,1);?></td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($uvtr/$countervtr,1);?></td>
                 <td style="color:black;background-color:#f5f5f5"><?echo $countervtr;?></td>
                </tr>
                <tr class="error">
                     <td style="color:black;background-color:#f5f5f5"> MOVISTAR</td>
                   <td style="color:black;background-color:#f5f5f5"><?echo round($movi/$counterentel,1);?></td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($umovi/$countermovi,1);?></td>
                 <td style="color:black;background-color:#f5f5f5"><?echo $countermovi;?></td>
                </tr>
                <tr class="warning">
                    <td style="color:black;background-color:#f5f5f5">ENTEL</td>
                  <td style="color:black;background-color:#f5f5f5"><?echo round($entel/$counterentel,1);?></td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($uentel/$counterentel,1);?></td>
                 <td style="color:black;background-color:#f5f5f5"><?echo $counterentel;?></td>
                </tr>
                <tr class="info">
                   <td style="color:black;background-color:#f5f5f5">CLARO</td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($claro/$counterclaro,1);?></td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($uclaro/$counterclaro,1);?></td>
                 <td style="color:black;background-color:#f5f5f5"><?echo $counterclaro;?></td>
                </tr>
                <tr class="success">
                      <td style="color:black;background-color:#f5f5f5">WOM</td>
           <td style="color:black;background-color:#f5f5f5">  
           <?echo round($wom/$counterwom,1);?></td>
                 <td style="color:black;background-color:#f5f5f5"><?echo round($uwom/$counterwom,1);?></td>
                 <td style="color:black;background-color:#f5f5f5"><?echo $counterwom;?></td>
                </tr>
                </tbody>
            </table><p>*(Sólo conexión por cable y a una distancia de 0.5 Km.)</p></div>




  <script src='js/jspdf.debug.js'></script>
  <script src='js/html2pdf.js'></script>


  <script>
    var pdf = new jsPDF('p', 'pt', 'letter');
    
pdf.addHTML($('grid')[0], function () {pdf.save('Test.Pdf');
});
 

setTimeout(function(){ window.close(); }, 2000);




  </script>
</body>



 
</html>




