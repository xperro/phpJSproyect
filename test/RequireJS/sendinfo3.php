<? 
include("config.php");
$velocidad= $_POST["velocidad"];
$lat= $_POST["lat"];
$lng= $_POST["lng"];
$uspeed= $_POST["uspeed"];
$ping= $_POST["ping"];
$plan= $_POST["plan"];
$conex= $_POST["conex"];
$dispositivo= $_POST["dis"];





/* Listamos un rango de IPs. Usamos el comodin '*' para seleccionar un rango de IPs*/
$ban_ip_range = array('179.4.*.*', '179.3.*.*', '191.116.*.*','190.110.*.*','191.119.*.*');
$ban_ip_range2 = array('168.228.*.*','179.56.*.*','179.57.*.*','181.226.*.*','190.13.*.*','190.95.*.*','190.120.*.*','190.121.*.*','190.123.*.*','190.211.*.*','190.217.*.*','200.85.*.*','200.126.*.*','201.186.*.*','201.187.*.*','201.220.*.*','201.221.*.*','216.155.*.*');
$ban_ip_rangetelmex = array('181.72.*.*', '181.74.*.*');


/* Obtener dirección IP del visitante */
$ip= $_SERVER['REMOTE_ADDR'];





/* Chequeamos su la IP del visitante esta dentro del rango de IPs denegadas*/

if(!empty($ban_ip_range))
{
foreach($ban_ip_range as $range)
{
  $range = str_replace('*','(.*)', $range);

    if(preg_match('/'.$range.'/', $ip))
  {
    $claroop=true;
  }
}
}


if(!empty($ban_ip_range2))
{
foreach($ban_ip_range2 as $range)
{
  $range = str_replace('*','(.*)', $range);

    if(preg_match('/'.$range.'/', $ip))
  {
    $telefonica=true;
  }
}
}

if(!empty($ban_ip_rangetelmex))
{
foreach($ban_ip_range2 as $range)
{
  $range = str_replace('*','(.*)', $range);

    if(preg_match('/'.$range.'/', $ip))
  {
    $telmex=true;
  }
}
}

$bol=false;


$nowFormat = date('Y-m-d H:i:s');
$isp= gethostbyaddr($_SERVER['REMOTE_ADDR']);

$pos = strpos($isp, "vtr");
$pos2 = strpos($isp, "entel");
$pos3 = strpos($isp, "claro");
$pos4 = strpos($isp, "movistar");
$pos5 = strpos($isp, "nextel");
$pos6 = strpos($isp, "gtd");
$pos7 = strpos($isp, "telmex");// El operador !== también puede ser usado. Puesto que != no funcionará como se espera
// porque la posición de 'a' es 0. La declaración (0 != false) se evalúa a 
// false.echo $ping;

// El operador !== también puede ser usado. Puesto que != no funcionará como se espera
// porque la posición de 'a' es 0. La declaración (0 != false) se evalúa a 
// false.
if ($pos != false) {
    $compania="VTR";$bol=true;
} else {
    
}

if ($pos2 != false) {
    $compania="ENTEL";$bol=true;
} else {
    
}

if ($pos3 != false || $pos7 !=false) {
    $compania="CLARO";$bol=true;
} else {
    
}

if ($pos4 != false) {
    $compania="MOVISTAR";$bol=true;
} else {
    
}
if ($pos5 != false) {
    $compania="WOM";$bol=true;
} else {
    
}
if ($pos6 != false) {
    $compania="GTD";$bol=true;
} else {
      
if($bol==false){


if ($claroop==true){
$compania="CLARO";
echo $compania;
//función die(“mensaje”); detiene la ejecución de todo código y muestra un mensaje
}else{
  if($telefonica==true){
$compania="TELEFONICA SUR";
  }else{
    if($telmex==true){$compania="TELMEX"}else{$compania= "OTRO";}
    
  }
  
}





}

}


$phpdate = strtotime( $nowFormat );
$sql2= "INSERT INTO test (velocidad,ip,hora,compania,latitud,longitud,uvelocidad,ping,plan,conexion,dispositivo) VALUES('$velocidad','$ip','$nowFormat','$compania','$lat','$lng','$uspeed','$ping','$plan','$conex','$dispositivo')";
mysql_query($sql2);
header("Location: diagnostico.php?vel=$velocidad+&lat=$lat+&lng=$lng+&uspeed=$uspeed+&ping=$ping+&plan=$plan+&conex=$conex+&dispositivo=$dispositivo+&compania=$compania");
//header("Location: https://www.kameforce.cl/prueba/test/RequireJS/index.php");
die();
//header('Location: https://www.kameforce.cl/prueba/test/RequireJS/index.php');
//header('Location: diagnostico.php?vel='$velocidad'+&lat='$lat'+&lng='$lng'+&uspeed='$uspeed'+&ping='$ping);
?>
