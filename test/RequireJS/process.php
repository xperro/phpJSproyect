<?php
header("Access-Control-Allow-Origin: *");
include("config.php");


// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server


// Select all the rows in the markers table

$query = "SELECT *
FROM test
INNER JOIN (
 
SELECT MAX( hora ) FECH, ip
FROM test
GROUP BY ip
)t1 ON t1.ip = test.ip
AND t1.FECH = test.hora
ORDER BY test.hora DESC
";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");
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
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("velocidad",$row['velocidad']);
  //$newnode->setAttribute("ip", $row['ip']);
    $newnode->setAttribute("compania", $row['compania']);
  $newnode->setAttribute("hora", $row['hora']);
  $newnode->setAttribute("latitud", $row['latitud']);
  $newnode->setAttribute("longitud", $row['longitud']);
    $newnode->setAttribute("uspeed", $row['uvelocidad']);
        $newnode->setAttribute("plan", $row['plan']);


    if($row['compania']=="VTR"){
    	$countervtr++;
    	$vtr=$row['velocidad']+$vtr;
    }
     if($row['compania']=="MOVISTAR"){
    	$countermovi++;
    	$vtr=$row['velocidad']+$movi;
    }
     if($row['compania']=="CLARO"){
    	$counterclaro++;
    	$vtr=$row['velocidad']+$claro;
    }
     if($row['compania']=="ENTEL"){
    	$counterentel++;
    	$vtr=$row['velocidad']+$entel;
    }
}

echo $dom->saveXML();

?>
