<? 
include("config.php");
$velocidad= $_GET["vel"];
$lat= $_GET["lat"];
$lng= $_GET["lng"];
$uspeed= $_GET["uspeed"];
$nowFormat= $_POST["nowFormat"];
$ping= $_GET["ping"];
$plan= $_POST["plan"];
$nowFormat = date('Y-m-d H:i:s');
$ip= $_SERVER['REMOTE_ADDR'];
$isp= gethostbyaddr($_SERVER['REMOTE_ADDR']);

$pos = strpos($isp, "vtr");
$pos2 = strpos($isp, "entel");
$pos3 = strpos($isp, "claro");
$pos4 = strpos($isp, "movistar");
$pos5 = strpos($isp, "wom");// El operador !== también puede ser usado. Puesto que != no funcionará como se espera
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
$phpdate = strtotime( $nowFormat );

$sql2= "INSERT INTO test (velocidad,ip,hora,compania,latitud,longitud,uvelocidad,ping,plan) VALUES('$velocidad','$ip','$nowFormat','$compania','$lat','$lng','$uspeed','$ping','$plan')";
mysql_query($sql2);
header('Location: https://www.kameforce.cl/prueba/test/RequireJS/index.php');
?>