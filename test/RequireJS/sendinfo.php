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


$isp= gethostbyaddr($_SERVER['REMOTE_ADDR']);

$pos = strpos($isp, "vtr");
$pos2 = strpos($isp, "entel");
$pos3 = strpos($isp, "claro");
$pos4 = strpos($isp, "movistar");
$pos5 = strpos($isp, "nextel");
$pos6 = strpos($isp, "gtd");
$pos7 = strpos($isp, "telmex");


/* Listamos un rango de IPs. Usamos el comodin '*' para seleccionar un rango de IPs*/
$ban_ip_range = array('179.4.*.*', '179.3.*.*', '191.116.*.*','190.110.*.*','191.119.*.*');
//telefonica sur
$ban_ip_range2 = array('168.228.*.*','179.56.*.*','179.57.*.*','181.226.*.*','190.13.*.*','190.95.*.*','190.120.*.*','190.121.*.*','190.123.*.*','190.211.*.*','190.217.*.*','200.85.*.*','200.126.*.*','201.186.*.*','201.187.*.*','201.220.*.*','201.221.*.*','216.155.*.*');
$ban_ip_rangetelmex = array('181.72.*.*','181.73.*.*', '181.74.*.*','181.75.*.*','186.36.*.*','186.34.*.*','186.35.*.*', '190.208.*.*', '190.209.*.*', '200.27.*.*', '190.54.*.*');
$ban_ip_rangemovi = array('156.97.*.*','161.25.*.*','166.75.*.*','181.212.*.*','186.106.*.*','190.82.*.*','190.171.*.*','200.0.*.*','200.9.*.*','200.54.*.*','200.68.*.*','200.42.*.*');
$ban_ip_rangevtr = array('190.46.*.*');
$ban_ip_rangegtd = array('201.238.*.*','200.119.*.*','200.75.*.*','200.55.*.*','190.107.*.*','190.98.*.*','190.8.*.*','190.196.*.*','190.153.*.*','190.215.*.*','201.238.*.*');
$ban_ip_rangeentel = array('186.67.*.*','190.151.*.*','152.231.*.*','200.111.*.*');
$ban_ip_rangemundo = array('131.221.*.*','138.99.*.*','167.250.*.*','170.150.*.*','179.60.*.*','186.148.*.*','190.102.*.*','190.110.*.*','190.114.62.*',
'190.5.*.*','200.73.*.*','207.248.*.*');

/* Obtener dirección IP del visitante */

$bol=false;

$ip= $_SERVER['REMOTE_ADDR'];

if(!empty($ban_ip_rangemundo))
{
foreach($ban_ip_rangemundo as $range)
{
  $range = str_replace('*','(.*)', $range);

    if(preg_match('/'.$range.'/', $ip))
  {
    $pacifico=true;
$bol=true;
  }
}
}




if(!empty($ban_ip_rangeentel))
{
foreach($ban_ip_rangeentel as $range)
{
  $range = str_replace('*','(.*)', $range);

    if(preg_match('/'.$range.'/', $ip))
  {
    $pos2=true;
$bol=true;
  }
}
}




if(!empty($ban_ip_rangegtd))
{
foreach($ban_ip_rangegtd as $range)
{
  $range = str_replace('*','(.*)', $range);

    if(preg_match('/'.$range.'/', $ip))
  {
    $pos6=true;
$bol=true;
  }
}
}



if(!empty($ban_ip_rangevtr))
{
foreach($ban_ip_rangevtr as $range)
{
  $range = str_replace('*','(.*)', $range);

    if(preg_match('/'.$range.'/', $ip))
  {
    $pos=true;
$bol=true;
  }
}
}




if(!empty($ban_ip_rangemovi))
{
foreach($ban_ip_rangemovi as $range)
{
  $range = str_replace('*','(.*)', $range);

    if(preg_match('/'.$range.'/', $ip))
  {
    $pos4=true;
$bol=true;
  }
}
}



/* Chequeamos su la IP del visitante esta dentro del rango de IPs denegadas*/

if(!empty($ban_ip_range))
{
foreach($ban_ip_range as $range)
{
  $range = str_replace('*','(.*)', $range);

    if(preg_match('/'.$range.'/', $ip))
  {
    $pos3=true;

$bol=true;
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
foreach($ban_ip_rangetelmex as $range)
{
  $range = str_replace('*','(.*)', $range);

    if(preg_match('/'.$range.'/', $ip))
  {
    $telmex=true;
  }
}
}



$nowFormat = date('Y-m-d H:i:s');
// El operador !== también puede ser usado. Puesto que != no funcionará como se espera
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

      $bol2=false;
if($bol==false){

if ($pacifico==true){
$compania="PACIFICO CABLE";$bol2=true;
//función die(“mensaje”); detiene la ejecución de todo código y muestra un mensaje
}
if ($claroop==true){
$compania="CLARO";$bol2=true;
//función die(“mensaje”); detiene la ejecución de todo código y muestra un mensaje
}
if($telefonica==true){$bol2=true;
$compania="TELEFONICA SUR";
  }
    
if($telmex==true){$compania="TELMEX";
$bol2=true;
}
if($moviop==true){$compania="MOVISTAR";
$bol2=true;
}


if($bol2==false && $bol!=true){
   $compania= "OTRO";
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
