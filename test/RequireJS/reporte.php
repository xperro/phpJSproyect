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



$nowFormat = date('Y-m-d');
$phpdate = strtotime( $nowFormat );
}






?>

<!DOCTYPE html>
<!-- Created by pdf2htmlEX (https://github.com/coolwanglu/pdf2htmlex) -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<meta name="generator" content="pdf2htmlEX"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<style type="text/css">
/*! 
 * Base CSS for pdf2htmlEX
 * Copyright 2012,2013 Lu Wang <coolwanglu@gmail.com> 
 * https://github.com/coolwanglu/pdf2htmlEX/blob/master/share/LICENSE
 */#sidebar{position:absolute;top:0;left:0;bottom:0;width:250px;padding:0;margin:0;overflow:auto}#page-container{position:absolute;top:0;left:0;margin:0;padding:0;border:0}@media screen{#sidebar.opened+#page-container{left:250px}#page-container{bottom:0;right:0;overflow:auto}.loading-indicator{display:none}.loading-indicator.active{display:block;position:absolute;width:64px;height:64px;top:50%;left:50%;margin-top:-32px;margin-left:-32px}.loading-indicator img{position:absolute;top:0;left:0;bottom:0;right:0}}@media print{@page{margin:0}html{margin:0}body{margin:0;-webkit-print-color-adjust:exact}#sidebar{display:none}#page-container{width:auto;height:auto;overflow:visible;background-color:transparent}.d{display:none}}.pf{position:relative;background-color:white;overflow:hidden;margin:0;border:0}.pc{position:absolute;border:0;padding:0;margin:0;top:0;left:0;width:100%;height:100%;overflow:hidden;display:block;transform-origin:0 0;-ms-transform-origin:0 0;-webkit-transform-origin:0 0}.pc.opened{display:block}.bf{position:absolute;border:0;margin:0;top:0;bottom:0;width:100%;height:100%;-ms-user-select:none;-moz-user-select:none;-webkit-user-select:none;user-select:none}.bi{position:absolute;border:0;margin:0;-ms-user-select:none;-moz-user-select:none;-webkit-user-select:none;user-select:none}@media print{.pf{margin:0;box-shadow:none;page-break-after:always;page-break-inside:avoid}@-moz-document url-prefix(){.pf{overflow:visible;border:1px solid #fff}.pc{overflow:visible}}}.c{position:absolute;border:0;padding:0;margin:0;overflow:hidden;display:block}.t{position:absolute;white-space:pre;font-size:1px;transform-origin:0 100%;-ms-transform-origin:0 100%;-webkit-transform-origin:0 100%;unicode-bidi:bidi-override;-moz-font-feature-settings:"liga" 0}.t:after{content:''}.t:before{content:'';display:inline-block}.t span{position:relative;unicode-bidi:bidi-override}._{display:inline-block;color:transparent;z-index:-1}::selection{background:rgba(127,255,255,0.4)}::-moz-selection{background:rgba(127,255,255,0.4)}.pi{display:none}.d{position:absolute;transform-origin:0 100%;-ms-transform-origin:0 100%;-webkit-transform-origin:0 100%}.it{border:0;background-color:rgba(255,255,255,0.0)}.ir:hover{cursor:pointer}</style>
<style type="text/css">
/*! 
 * Fancy styles for pdf2htmlEX
 * Copyright 2012,2013 Lu Wang <coolwanglu@gmail.com> 
 * https://github.com/coolwanglu/pdf2htmlEX/blob/master/share/LICENSE
 */@keyframes fadein{from{opacity:0}to{opacity:1}}@-webkit-keyframes fadein{from{opacity:0}to{opacity:1}}@keyframes swing{0{transform:rotate(0)}10%{transform:rotate(0)}90%{transform:rotate(720deg)}100%{transform:rotate(720deg)}}@-webkit-keyframes swing{0{-webkit-transform:rotate(0)}10%{-webkit-transform:rotate(0)}90%{-webkit-transform:rotate(720deg)}100%{-webkit-transform:rotate(720deg)}}@media screen{#sidebar{background-color:#2f3236;background-image:url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjNDAzYzNmIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDBMNCA0Wk00IDBMMCA0WiIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2U9IiMxZTI5MmQiPjwvcGF0aD4KPC9zdmc+")}#outline{font-family:Georgia,Times,"Times New Roman",serif;font-size:13px;margin:2em 1em}#outline ul{padding:0}#outline li{list-style-type:none;margin:1em 0}#outline li>ul{margin-left:1em}#outline a,#outline a:visited,#outline a:hover,#outline a:active{line-height:1.2;color:#e8e8e8;text-overflow:ellipsis;white-space:nowrap;text-decoration:none;display:block;overflow:hidden;outline:0}#outline a:hover{color:#0cf}#page-container{background-color:#9e9e9e;background-image:url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1IiBoZWlnaHQ9IjUiPgo8cmVjdCB3aWR0aD0iNSIgaGVpZ2h0PSI1IiBmaWxsPSIjOWU5ZTllIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDVMNSAwWk02IDRMNCA2Wk0tMSAxTDEgLTFaIiBzdHJva2U9IiM4ODgiIHN0cm9rZS13aWR0aD0iMSI+PC9wYXRoPgo8L3N2Zz4=");-webkit-transition:left 500ms;transition:left 500ms}.pf{margin:13px auto;box-shadow:1px 1px 3px 1px #333;border-collapse:separate}.pc.opened{-webkit-animation:fadein 100ms;animation:fadein 100ms}.loading-indicator.active{-webkit-animation:swing 1.5s ease-in-out .01s infinite alternate none;animation:swing 1.5s ease-in-out .01s infinite alternate none}.checked{background:no-repeat url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3goQDSYgDiGofgAAAslJREFUOMvtlM9LFGEYx7/vvOPM6ywuuyPFihWFBUsdNnA6KLIh+QPx4KWExULdHQ/9A9EfUodYmATDYg/iRewQzklFWxcEBcGgEplDkDtI6sw4PzrIbrOuedBb9MALD7zv+3m+z4/3Bf7bZS2bzQIAcrmcMDExcTeXy10DAFVVAQDksgFUVZ1ljD3yfd+0LOuFpmnvVVW9GHhkZAQcxwkNDQ2FSCQyRMgJxnVdy7KstKZpn7nwha6urqqfTqfPBAJAuVymlNLXoigOhfd5nmeiKL5TVTV+lmIKwAOA7u5u6Lped2BsbOwjY6yf4zgQQkAIAcedaPR9H67r3uYBQFEUFItFtLe332lpaVkUBOHK3t5eRtf1DwAwODiIubk5DA8PM8bYW1EU+wEgCIJqsCAIQAiB7/u253k2BQDDMJBKpa4mEon5eDx+UxAESJL0uK2t7XosFlvSdf0QAEmlUnlRFJ9Waho2Qghc1/U9z3uWz+eX+Wr+lL6SZfleEAQIggA8z6OpqSknimIvYyybSCReMsZ6TislhCAIAti2Dc/zejVNWwCAavN8339j27YbTg0AGGM3WltbP4WhlRWq6Q/btrs1TVsYHx+vNgqKoqBUKn2NRqPFxsbGJzzP05puUlpt0ukyOI6z7zjOwNTU1OLo6CgmJyf/gA3DgKIoWF1d/cIY24/FYgOU0pp0z/Ityzo8Pj5OTk9PbwHA+vp6zWghDC+VSiuRSOQgGo32UErJ38CO42wdHR09LBQK3zKZDDY2NupmFmF4R0cHVlZWlmRZ/iVJUn9FeWWcCCE4ODjYtG27Z2Zm5juAOmgdGAB2d3cBADs7O8uSJN2SZfl+WKlpmpumaT6Yn58vn/fs6XmbhmHMNjc3tzDGFI7jYJrm5vb29sDa2trPC/9aiqJUy5pOp4f6+vqeJ5PJBAB0dnZe/t8NBajx/z37Df5OGX8d13xzAAAAAElFTkSuQmCC)}}</style>
<style type="text/css">
.ff0{font-family:sans-serif;visibility:hidden;}
@font-face{font-family:ff1;src:url('data:application/font-woff;base64,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')format("woff");}.ff1{font-family:ff1;line-height:1.109375;font-style:normal;font-weight:normal;visibility:visible;}
@font-face{font-family:ff2;src:url('data:application/font-woff;base64,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')format("woff");}.ff2{font-family:ff2;line-height:0.959961;font-style:normal;font-weight:normal;visibility:visible;}
.m0{transform:matrix(0.250000,0.000000,0.000000,0.250000,0,0);-ms-transform:matrix(0.250000,0.000000,0.000000,0.250000,0,0);-webkit-transform:matrix(0.250000,0.000000,0.000000,0.250000,0,0);}
.m1{transform:none;-ms-transform:none;-webkit-transform:none;}
.v0{vertical-align:0.000000px;}
.ls0{letter-spacing:0.000000px;}
.sc_{text-shadow:none;}
.sc0{text-shadow:-0.015em 0 transparent,0 0.015em transparent,0.015em 0 transparent,0 -0.015em  transparent;}
@media screen and (-webkit-min-device-pixel-ratio:0){
.sc_{-webkit-text-stroke:0px transparent;}
.sc0{-webkit-text-stroke:0.015em transparent;text-shadow:none;}
}
.ws0{word-spacing:0.000000px;}
.fc4{color:rgb(0,176,240);}
.fc1{color:rgb(0,0,0);}
.fc0{color:rgb(5,99,193);}
.fc3{color:rgb(255,0,0);}
.fc2{color:rgb(0,176,80);}
.fs3{font-size:32.000000px;}
.fs0{font-size:40.000000px;}
.fs4{font-size:52.000000px;}
.fs2{font-size:80.000000px;}
.fs1{font-size:96.000000px;}
.y1a{bottom:2.844000px;}
.y24{bottom:6.119000px;}
.yf{bottom:7.223015px;}
.yc{bottom:12.973000px;}
.y3{bottom:16.738001px;}
.y6{bottom:17.483999px;}
.y23{bottom:20.617998px;}
.y22{bottom:32.116998px;}
.yb{bottom:32.998999px;}
.y0{bottom:41.000000px;}
.y16{bottom:41.438011px;}
.y2{bottom:41.768002px;}
.ye{bottom:46.849998px;}
.y5{bottom:54.605000px;}
.ya{bottom:70.119999px;}
.y21{bottom:73.685999px;}
.y9{bottom:82.634998px;}
.y15{bottom:88.204010px;}
.y14{bottom:122.526016px;}
.y18{bottom:135.508003px;}
.yd{bottom:172.073990px;}
.y13{bottom:173.778015px;}
.y20{bottom:177.827003px;}
.y12{bottom:208.100014px;}
.y8{bottom:240.731018px;}
.y11{bottom:248.615013px;}
.y17{bottom:270.592987px;}
.y1f{bottom:315.216007px;}
.y1e{bottom:324.993004px;}
.y1d{bottom:334.770006px;}
.y1c{bottom:344.547005px;}
.y7{bottom:351.358002px;}
.y1b{bottom:354.324005px;}
.y19{bottom:364.101006px;}
.y10{bottom:422.392990px;}
.y4{bottom:433.955002px;}
.y1{bottom:516.552002px;}
.hc{height:11.277000px;}
.hd{height:24.000000px;}
.h9{height:30.000000px;}
.h3{height:35.156250px;}
.h10{height:35.859375px;}
.hf{height:45.703125px;}
.h2{height:57.810001px;}
.ha{height:70.312500px;}
.h4{height:83.597000px;}
.h5{height:84.375000px;}
.he{height:94.765999px;}
.h6{height:111.626999px;}
.hb{height:153.800003px;}
.h8{height:266.907013px;}
.h7{height:517.226013px;}
.h1{height:717.000000px;}
.h0{height:792.000000px;}
.w4{width:77.550003px;}
.w5{width:77.599998px;}
.w2{width:153.149994px;}
.w3{width:318.850006px;}
.w1{width:535.500000px;}
.w0{width:612.000000px;}
.x4{left:5.874000px;}
.x2{left:9.802000px;}
.x6{left:14.414000px;}
.x7{left:16.941000px;}
.x14{left:24.281001px;}
.xa{left:29.101999px;}
.x18{left:31.322001px;}
.x9{left:34.077000px;}
.x0{left:37.500000px;}
.x5{left:41.453999px;}
.x3{left:55.168999px;}
.x1{left:56.599998px;}
.x1a{left:60.241000px;}
.x8{left:61.990002px;}
.x11{left:71.324997px;}
.x1b{left:77.179999px;}
.xd{left:97.058998px;}
.x12{left:104.653999px;}
.xf{left:107.262001px;}
.xe{left:112.467003px;}
.x19{left:119.136000px;}
.xc{left:125.152000px;}
.x10{left:126.202003px;}
.xb{left:244.025002px;}
.x13{left:250.275002px;}
.x15{left:326.325005px;}
.x16{left:402.424995px;}
.x17{left:478.525002px;}
@media print{
.v0{vertical-align:0.000000pt;}
.ls0{letter-spacing:0.000000pt;}
.ws0{word-spacing:0.000000pt;}
.fs3{font-size:42.666667pt;}
.fs0{font-size:53.333333pt;}
.fs4{font-size:69.333333pt;}
.fs2{font-size:106.666667pt;}
.fs1{font-size:128.000000pt;}
.y1a{bottom:3.792000pt;}
.y24{bottom:8.158667pt;}
.yf{bottom:9.630686pt;}
.yc{bottom:17.297333pt;}
.y3{bottom:22.317334pt;}
.y6{bottom:23.311999pt;}
.y23{bottom:27.490664pt;}
.y22{bottom:42.822664pt;}
.yb{bottom:43.998665pt;}
.y0{bottom:54.666667pt;}
.y16{bottom:55.250682pt;}
.y2{bottom:55.690669pt;}
.ye{bottom:62.466665pt;}
.y5{bottom:72.806666pt;}
.ya{bottom:93.493332pt;}
.y21{bottom:98.247999pt;}
.y9{bottom:110.179998pt;}
.y15{bottom:117.605347pt;}
.y14{bottom:163.368022pt;}
.y18{bottom:180.677338pt;}
.yd{bottom:229.431986pt;}
.y13{bottom:231.704020pt;}
.y20{bottom:237.102671pt;}
.y12{bottom:277.466685pt;}
.y8{bottom:320.974691pt;}
.y11{bottom:331.486684pt;}
.y17{bottom:360.790649pt;}
.y1f{bottom:420.288010pt;}
.y1e{bottom:433.324005pt;}
.y1d{bottom:446.360008pt;}
.y1c{bottom:459.396006pt;}
.y7{bottom:468.477336pt;}
.y1b{bottom:472.432007pt;}
.y19{bottom:485.468007pt;}
.y10{bottom:563.190653pt;}
.y4{bottom:578.606669pt;}
.y1{bottom:688.736003pt;}
.hc{height:15.036001pt;}
.hd{height:32.000000pt;}
.h9{height:40.000000pt;}
.h3{height:46.875000pt;}
.h10{height:47.812500pt;}
.hf{height:60.937500pt;}
.h2{height:77.080002pt;}
.ha{height:93.750000pt;}
.h4{height:111.462667pt;}
.h5{height:112.500000pt;}
.he{height:126.354665pt;}
.h6{height:148.835999pt;}
.hb{height:205.066671pt;}
.h8{height:355.876017pt;}
.h7{height:689.634684pt;}
.h1{height:956.000000pt;}
.h0{height:1056.000000pt;}
.w4{width:103.400004pt;}
.w5{width:103.466665pt;}
.w2{width:204.199992pt;}
.w3{width:425.133341pt;}
.w1{width:714.000000pt;}
.w0{width:816.000000pt;}
.x4{left:7.832000pt;}
.x2{left:13.069333pt;}
.x6{left:19.218666pt;}
.x7{left:22.588000pt;}
.x14{left:32.374667pt;}
.xa{left:38.802666pt;}
.x18{left:41.762668pt;}
.x9{left:45.436000pt;}
.x0{left:50.000000pt;}
.x5{left:55.271998pt;}
.x3{left:73.558665pt;}
.x1{left:75.466665pt;}
.x1a{left:80.321333pt;}
.x8{left:82.653336pt;}
.x11{left:95.099996pt;}
.x1b{left:102.906665pt;}
.xd{left:129.411997pt;}
.x12{left:139.538666pt;}
.xf{left:143.016001pt;}
.xe{left:149.956004pt;}
.x19{left:158.848000pt;}
.xc{left:166.869334pt;}
.x10{left:168.269338pt;}
.xb{left:325.366669pt;}
.x13{left:333.700002pt;}
.x15{left:435.100006pt;}
.x16{left:536.566661pt;}
.x17{left:638.033335pt;}
}
</style>
<script>
/*
 Copyright 2012 Mozilla Foundation 
 Copyright 2013 Lu Wang <coolwanglu@gmail.com>
 Apachine License Version 2.0 
*/
(function(){function b(a,b,e,f){var c=(a.className||"").split(/\s+/g);""===c[0]&&c.shift();var d=c.indexOf(b);0>d&&e&&c.push(b);0<=d&&f&&c.splice(d,1);a.className=c.join(" ");return 0<=d}if(!("classList"in document.createElement("div"))){var e={add:function(a){b(this.element,a,!0,!1)},contains:function(a){return b(this.element,a,!1,!1)},remove:function(a){b(this.element,a,!1,!0)},toggle:function(a){b(this.element,a,!0,!0)}};Object.defineProperty(HTMLElement.prototype,"classList",{get:function(){if(this._classList)return this._classList;
var a=Object.create(e,{element:{value:this,writable:!1,enumerable:!0}});Object.defineProperty(this,"_classList",{value:a,writable:!1,enumerable:!1});return a},enumerable:!0})}})();
</script>
<script>
(function(){/*
 pdf2htmlEX.js: Core UI functions for pdf2htmlEX 
 Copyright 2012,2013 Lu Wang <coolwanglu@gmail.com> and other contributors 
 https://github.com/coolwanglu/pdf2htmlEX/blob/master/share/LICENSE 
*/
var pdf2htmlEX=window.pdf2htmlEX=window.pdf2htmlEX||{},CSS_CLASS_NAMES={page_frame:"pf",page_content_box:"pc",page_data:"pi",background_image:"bi",link:"l",input_radio:"ir",__dummy__:"no comma"},DEFAULT_CONFIG={container_id:"page-container",sidebar_id:"sidebar",outline_id:"outline",loading_indicator_cls:"loading-indicator",preload_pages:3,render_timeout:100,scale_step:0.9,key_handler:!0,hashchange_handler:!0,view_history_handler:!0,__dummy__:"no comma"},EPS=1E-6;
function invert(a){var b=a[0]*a[3]-a[1]*a[2];return[a[3]/b,-a[1]/b,-a[2]/b,a[0]/b,(a[2]*a[5]-a[3]*a[4])/b,(a[1]*a[4]-a[0]*a[5])/b]}function transform(a,b){return[a[0]*b[0]+a[2]*b[1]+a[4],a[1]*b[0]+a[3]*b[1]+a[5]]}function get_page_number(a){return parseInt(a.getAttribute("data-page-no"),16)}function disable_dragstart(a){for(var b=0,c=a.length;b<c;++b)a[b].addEventListener("dragstart",function(){return!1},!1)}
function clone_and_extend_objs(a){for(var b={},c=0,e=arguments.length;c<e;++c){var h=arguments[c],d;for(d in h)h.hasOwnProperty(d)&&(b[d]=h[d])}return b}
function Page(a){if(a){this.shown=this.loaded=!1;this.page=a;this.num=get_page_number(a);this.original_height=a.clientHeight;this.original_width=a.clientWidth;var b=a.getElementsByClassName(CSS_CLASS_NAMES.page_content_box)[0];b&&(this.content_box=b,this.original_scale=this.cur_scale=this.original_height/b.clientHeight,this.page_data=JSON.parse(a.getElementsByClassName(CSS_CLASS_NAMES.page_data)[0].getAttribute("data-data")),this.ctm=this.page_data.ctm,this.ictm=invert(this.ctm),this.loaded=!0)}}
Page.prototype={hide:function(){this.loaded&&this.shown&&(this.content_box.classList.remove("opened"),this.shown=!1)},show:function(){this.loaded&&!this.shown&&(this.content_box.classList.add("opened"),this.shown=!0)},rescale:function(a){this.cur_scale=0===a?this.original_scale:a;this.loaded&&(a=this.content_box.style,a.msTransform=a.webkitTransform=a.transform="scale("+this.cur_scale.toFixed(3)+")");a=this.page.style;a.height=this.original_height*this.cur_scale+"px";a.width=this.original_width*this.cur_scale+
"px"},view_position:function(){var a=this.page,b=a.parentNode;return[b.scrollLeft-a.offsetLeft-a.clientLeft,b.scrollTop-a.offsetTop-a.clientTop]},height:function(){return this.page.clientHeight},width:function(){return this.page.clientWidth}};function Viewer(a){this.config=clone_and_extend_objs(DEFAULT_CONFIG,0<arguments.length?a:{});this.pages_loading=[];this.init_before_loading_content();var b=this;document.addEventListener("DOMContentLoaded",function(){b.init_after_loading_content()},!1)}
Viewer.prototype={scale:1,cur_page_idx:0,first_page_idx:0,init_before_loading_content:function(){this.pre_hide_pages()},initialize_radio_button:function(){for(var a=document.getElementsByClassName(CSS_CLASS_NAMES.input_radio),b=0;b<a.length;b++)a[b].addEventListener("click",function(){this.classList.toggle("checked")})},init_after_loading_content:function(){this.sidebar=document.getElementById(this.config.sidebar_id);this.outline=document.getElementById(this.config.outline_id);this.container=document.getElementById(this.config.container_id);
this.loading_indicator=document.getElementsByClassName(this.config.loading_indicator_cls)[0];for(var a=!0,b=this.outline.childNodes,c=0,e=b.length;c<e;++c)if("ul"===b[c].nodeName.toLowerCase()){a=!1;break}a||this.sidebar.classList.add("opened");this.find_pages();if(0!=this.pages.length){disable_dragstart(document.getElementsByClassName(CSS_CLASS_NAMES.background_image));this.config.key_handler&&this.register_key_handler();var h=this;this.config.hashchange_handler&&window.addEventListener("hashchange",
function(a){h.navigate_to_dest(document.location.hash.substring(1))},!1);this.config.view_history_handler&&window.addEventListener("popstate",function(a){a.state&&h.navigate_to_dest(a.state)},!1);this.container.addEventListener("scroll",function(){h.update_page_idx();h.schedule_render(!0)},!1);[this.container,this.outline].forEach(function(a){a.addEventListener("click",h.link_handler.bind(h),!1)});this.initialize_radio_button();this.render()}},find_pages:function(){for(var a=[],b={},c=this.container.childNodes,
e=0,h=c.length;e<h;++e){var d=c[e];d.nodeType===Node.ELEMENT_NODE&&d.classList.contains(CSS_CLASS_NAMES.page_frame)&&(d=new Page(d),a.push(d),b[d.num]=a.length-1)}this.pages=a;this.page_map=b},load_page:function(a,b,c){var e=this.pages;if(!(a>=e.length||(e=e[a],e.loaded||this.pages_loading[a]))){var e=e.page,h=e.getAttribute("data-page-url");if(h){this.pages_loading[a]=!0;var d=e.getElementsByClassName(this.config.loading_indicator_cls)[0];"undefined"===typeof d&&(d=this.loading_indicator.cloneNode(!0),
d.classList.add("active"),e.appendChild(d));var f=this,g=new XMLHttpRequest;g.open("GET",h,!0);g.onload=function(){if(200===g.status||0===g.status){var b=document.createElement("div");b.innerHTML=g.responseText;for(var d=null,b=b.childNodes,e=0,h=b.length;e<h;++e){var p=b[e];if(p.nodeType===Node.ELEMENT_NODE&&p.classList.contains(CSS_CLASS_NAMES.page_frame)){d=p;break}}b=f.pages[a];f.container.replaceChild(d,b.page);b=new Page(d);f.pages[a]=b;b.hide();b.rescale(f.scale);disable_dragstart(d.getElementsByClassName(CSS_CLASS_NAMES.background_image));
f.schedule_render(!1);c&&c(b)}delete f.pages_loading[a]};g.send(null)}void 0===b&&(b=this.config.preload_pages);0<--b&&(f=this,setTimeout(function(){f.load_page(a+1,b)},0))}},pre_hide_pages:function(){var a="@media screen{."+CSS_CLASS_NAMES.page_content_box+"{display:none;}}",b=document.createElement("style");b.styleSheet?b.styleSheet.cssText=a:b.appendChild(document.createTextNode(a));document.head.appendChild(b)},render:function(){for(var a=this.container,b=a.scrollTop,c=a.clientHeight,a=b-c,b=
b+c+c,c=this.pages,e=0,h=c.length;e<h;++e){var d=c[e],f=d.page,g=f.offsetTop+f.clientTop,f=g+f.clientHeight;g<=b&&f>=a?d.loaded?d.show():this.load_page(e):d.hide()}},update_page_idx:function(){var a=this.pages,b=a.length;if(!(2>b)){for(var c=this.container,e=c.scrollTop,c=e+c.clientHeight,h=-1,d=b,f=d-h;1<f;){var g=h+Math.floor(f/2),f=a[g].page;f.offsetTop+f.clientTop+f.clientHeight>=e?d=g:h=g;f=d-h}this.first_page_idx=d;for(var g=h=this.cur_page_idx,k=0;d<b;++d){var f=a[d].page,l=f.offsetTop+f.clientTop,
f=f.clientHeight;if(l>c)break;f=(Math.min(c,l+f)-Math.max(e,l))/f;if(d===h&&Math.abs(f-1)<=EPS){g=h;break}f>k&&(k=f,g=d)}this.cur_page_idx=g}},schedule_render:function(a){if(void 0!==this.render_timer){if(!a)return;clearTimeout(this.render_timer)}var b=this;this.render_timer=setTimeout(function(){delete b.render_timer;b.render()},this.config.render_timeout)},register_key_handler:function(){var a=this;window.addEventListener("DOMMouseScroll",function(b){if(b.ctrlKey){b.preventDefault();var c=a.container,
e=c.getBoundingClientRect(),c=[b.clientX-e.left-c.clientLeft,b.clientY-e.top-c.clientTop];a.rescale(Math.pow(a.config.scale_step,b.detail),!0,c)}},!1);window.addEventListener("keydown",function(b){var c=!1,e=b.ctrlKey||b.metaKey,h=b.altKey;switch(b.keyCode){case 61:case 107:case 187:e&&(a.rescale(1/a.config.scale_step,!0),c=!0);break;case 173:case 109:case 189:e&&(a.rescale(a.config.scale_step,!0),c=!0);break;case 48:e&&(a.rescale(0,!1),c=!0);break;case 33:h?a.scroll_to(a.cur_page_idx-1):a.container.scrollTop-=
a.container.clientHeight;c=!0;break;case 34:h?a.scroll_to(a.cur_page_idx+1):a.container.scrollTop+=a.container.clientHeight;c=!0;break;case 35:a.container.scrollTop=a.container.scrollHeight;c=!0;break;case 36:a.container.scrollTop=0,c=!0}c&&b.preventDefault()},!1)},rescale:function(a,b,c){var e=this.scale;this.scale=a=0===a?1:b?e*a:a;c||(c=[0,0]);b=this.container;c[0]+=b.scrollLeft;c[1]+=b.scrollTop;for(var h=this.pages,d=h.length,f=this.first_page_idx;f<d;++f){var g=h[f].page;if(g.offsetTop+g.clientTop>=
c[1])break}g=f-1;0>g&&(g=0);var g=h[g].page,k=g.clientWidth,f=g.clientHeight,l=g.offsetLeft+g.clientLeft,m=c[0]-l;0>m?m=0:m>k&&(m=k);k=g.offsetTop+g.clientTop;c=c[1]-k;0>c?c=0:c>f&&(c=f);for(f=0;f<d;++f)h[f].rescale(a);b.scrollLeft+=m/e*a+g.offsetLeft+g.clientLeft-m-l;b.scrollTop+=c/e*a+g.offsetTop+g.clientTop-c-k;this.schedule_render(!0)},fit_width:function(){var a=this.cur_page_idx;this.rescale(this.container.clientWidth/this.pages[a].width(),!0);this.scroll_to(a)},fit_height:function(){var a=this.cur_page_idx;
this.rescale(this.container.clientHeight/this.pages[a].height(),!0);this.scroll_to(a)},get_containing_page:function(a){for(;a;){if(a.nodeType===Node.ELEMENT_NODE&&a.classList.contains(CSS_CLASS_NAMES.page_frame)){a=get_page_number(a);var b=this.page_map;return a in b?this.pages[b[a]]:null}a=a.parentNode}return null},link_handler:function(a){var b=a.target,c=b.getAttribute("data-dest-detail");if(c){if(this.config.view_history_handler)try{var e=this.get_current_view_hash();window.history.replaceState(e,
"","#"+e);window.history.pushState(c,"","#"+c)}catch(h){}this.navigate_to_dest(c,this.get_containing_page(b));a.preventDefault()}},navigate_to_dest:function(a,b){try{var c=JSON.parse(a)}catch(e){return}if(c instanceof Array){var h=c[0],d=this.page_map;if(h in d){for(var f=d[h],h=this.pages[f],d=2,g=c.length;d<g;++d){var k=c[d];if(null!==k&&"number"!==typeof k)return}for(;6>c.length;)c.push(null);var g=b||this.pages[this.cur_page_idx],d=g.view_position(),d=transform(g.ictm,[d[0],g.height()-d[1]]),
g=this.scale,l=[0,0],m=!0,k=!1,n=this.scale;switch(c[1]){case "XYZ":l=[null===c[2]?d[0]:c[2]*n,null===c[3]?d[1]:c[3]*n];g=c[4];if(null===g||0===g)g=this.scale;k=!0;break;case "Fit":case "FitB":l=[0,0];k=!0;break;case "FitH":case "FitBH":l=[0,null===c[2]?d[1]:c[2]*n];k=!0;break;case "FitV":case "FitBV":l=[null===c[2]?d[0]:c[2]*n,0];k=!0;break;case "FitR":l=[c[2]*n,c[5]*n],m=!1,k=!0}if(k){this.rescale(g,!1);var p=this,c=function(a){l=transform(a.ctm,l);m&&(l[1]=a.height()-l[1]);p.scroll_to(f,l)};h.loaded?
c(h):(this.load_page(f,void 0,c),this.scroll_to(f))}}}},scroll_to:function(a,b){var c=this.pages;if(!(0>a||a>=c.length)){c=c[a].view_position();void 0===b&&(b=[0,0]);var e=this.container;e.scrollLeft+=b[0]-c[0];e.scrollTop+=b[1]-c[1]}},get_current_view_hash:function(){var a=[],b=this.pages[this.cur_page_idx];a.push(b.num);a.push("XYZ");var c=b.view_position(),c=transform(b.ictm,[c[0],b.height()-c[1]]);a.push(c[0]/this.scale);a.push(c[1]/this.scale);a.push(this.scale);return JSON.stringify(a)}};
pdf2htmlEX.Viewer=Viewer;})();
</script>
<script>
try{
pdf2htmlEX.defaultViewer = new pdf2htmlEX.Viewer({});
}catch(e){}
</script>
<title></title>
</head>
<body>
<div id="sidebar">
<div id="outline">
</div>
</div>
<div id="page-container">
<div id="pf1" class="pf w0 h0" data-page-no="1"><div class="pc pc1 w0 h0"><img class="bi x0 y0 w1 h1" alt="" src="data:image/png;base64,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AFAjAACAGgEAAFAjAACAGgEAAFAjAACAGgEAAFAjAACAGgEAANQIAACAGgEAANQIAACAGgEAANQIAACAGgEAANQIAACAGgEAANQIAACAGgEAANQIAACgRgAAANQIAACgRgAAANQIAACgRgAAANQIAACgRgAAANQIAACgRgAAANQIAACgRgAAANQIAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACoEQAAADUCAACoEQAAADUCAACoEQAAADUCAACoEQAAADUCAACoEQAAADUCAACoEQAAQI0AAACoEQAAQI0AAACoEQAAQI0AAACoEQAAQI0AAACoEQAAQI0AAACoEQAAQI0AAAAEQRCkyn+XW7Zvs9+hqvyHm999/7KVM+xBhWEYRZFPIQCYml0PPlyGezE2Aswuw/m8nQAAVeKS3x0C1PanW+jzDQCqnbERAABAjQAAAGoEAABAjQAAAGoEAABAjQAAAGoEAABAjQAAAGoEAABAjQAAAGoEAABAjQAAAGoEAABQIwAAAGoEAABQIwAAAGoEAABQIwAAAGoEAABQIwAAAGoEAABQIwAAAGoEAABQIwAAgBoBAABQIwAAgBoBAABQIwAAgBoBAAAohlSl7jiTydj7UA3q6+vtBACgIoyNAAAAagQAAFAjAAAAagQAAFAjAAAAagQAAFAjAAAAU5GquS3O5wuFQiEMK3PvURQkEmEikQgrtQUAAKBGKuXEiRNHj72dqEAMRHGNpOvTS1uXrFy50qsHAABmV438wzf+25/97/9HIlGZOWZRobBw4YJH/sdf/U//8c+9egAAYHbVSCqVbGxsCIJKTZSKgiDM5XJeOgAAMOtqJJFIJJPJn8dBIYqCKP7zsm2A1w0AAMzGGvkFURCfUB5F7zRJEATh9IZNoigqFApRFMXNc/HZ6mEYOoUdAABmcY1EQRAEhUKhtbV18eJF2Wz24MFDQfjO/11QF/H/juXKz7siCMPwF/5NFEWFKEokEolkIp/Lj+WHFwoAAKiRX5DNZt+/9Z5f+dhHT50+9Vv/y+8kkj+/8O477RG9M9aRzWWzQS4YFyRhENaF6bq61DspEr5TI/l8fuGSxcuWtb/xxpvxIEkicD1fAABQI78okUi8ffztnT99vmfgzITBkMllokLU1Nrc9p7lDTc2v7Xm7ZHG0SAImgYartm3bOj586c7T42cH6lL1KXqUkEQZHPZVXdec/dH73z3une99aOD3/j7/7evry8KozBQIwAAoEZiYRAEQSqVeuPNfcdPdWUKo+NXJIyiqBAVRgujje+bm90YDa8MzywfqWvN5+aHQVwdo9Hp5f2j6zOp03ObXmmJXho9d/JcfbI+KkRBW3j8mu7C0teWrVsY1HmFAACAGrkwRsIgCMJE2NPde+rU6TAM03Xpn6dIoZBL5VN3Nwb31xduLBRaCrnzUXBoNP1ykMwEQSKoa0zkF+eSG9KFzVHhmiDVmmx5ORx87XwYhueOnO18ofPYsuMrdi8eGRnxEgEAADVyiQeQSqXGPYooivKFfFQfJNfVN/yv80cWZwtnC+k3knOP1Tf+MBw8mM0MZMNk2LAwOXdDU/RLqdOrzp5bPtL0yca2je2Z/zuTP5Hr/9e+Qlc2Wr1g5wv7CoVCIkwkQpf0BQAANXI5haiQL+Tr1jcs+c+rjzZ1LR1eGP5/o+e+2d01fLIuqEulUolEIsgGw8eGTx8+nf/h6JLlS9P/U1P/v8scvu3UDS03HvxPr48ezgy8PXDuSH99Oj1+9hcAAKBGJpPNZRtvn9v0yQUnG3pW9Lf1/c2J0Z1DiVzYXN/8zvV8gyAIgjAMk6lUEKQHTg8EXx9MHq1P/fac/WsPt97Xdv77Z84f7a9Pp3UIAACokSsSX5y3oakxvDbVf8PwSGa4/yvd2eeHg3NRIpG8YAH1fyuNRJDP50/nE89kU3Oz5x8ZPbM1UTiUT7498bqHFdTT0/Paa6+9+uqr99xzT0dHx9y5c6d5g0ePHt25c+epU6c+8YlPtLe3X/wDx48ff/bZZ0+ePPmxj31sxYoVV3v758+fP3DgwI4dOzZt2rRp06aFCxde8AND+aFjIyde6H95Q+O165s7FtTNv+xtHj9+/PHHHw+C4P7771+zZs0sfLsODg7+7Gc/e/LJJ2+88cZNmza1trb6CAMA1Ei1yBVyc26cn70xkYlGWl5uPP+D3tRgmEqmxlKkEBXixRAT4TtTsOIF16NThdz24cVbF51dPtB0Y339/tTg8YF0oopOF+nr63v++ee/+c1vtra2trW1Tb9GTpw48Z3vfGfv3r1bt26dsEZOnjz53e9+9/XXX3/f+943hRoZHBzcu3fv17/+9Y9//OOrVq26uEaGC5m3ho/88+nvPbBwa1v9kiupkRMnTnz1q18NgmDjxo1XWCMDAwPbtm1rbm7evHlzR0dHZZ/E4eHho0eP7tixY/Hixe9973vb2tqmcAudnZ1f/epXP/axjy1fvlyNTNmW7dvsBACY3K4HHy7DvcyQ87OjKIqiKB/l87cnonclUycTCx5rSI4EiUQiTpH4QltRFIXJMEyEcZbEZZJMJqMgypwdaXt+fvpcqvmmuU2b5uTy2SiYYPn2Sslms93d3YcOHTp37lw+ny/WzU4y/jMyMnLs2LFDhw5N7cJi+Xz+3Llzhw4d6unpyWazF/9AISoM5IeOjhzvy53NRrkrfJYzmczw8HChULiSny8UCj09PV/4whf+4i/+4uWXX674k9jf379jx47f/d3f/dKXvnTo0KGp7dXz588fPHjw9OnTmUzGp+QUs7B47yAAYJpm1EytVJDqm99fmJsK38if2HG2Ll03liJREOXyubq69JzWOYV84fyp/nyUjy+WFYZhMkwmhhMn/+5Y5sb88Ib6xHWjhccLURSFQXGWPYyzZ3wDXPZPLtsMk/z8ldzg+vXr//AP/3BgYGD16tUT3lr0b6Z2d+P/7YS3cNkfuHgPbNy48e/+7u8GBgauv/76K9mkXC43MDAQV2hs/Io0k9zR5Lc8tX8YhmE2mx0eHo7GmcIzy/Q1JpPl+bIHAJhFNVKICnPmzxmoD8Jcum40Goz66/5t8cIoioIwmN+2oO+3Mz1rMul8uuGNBbn/83w+n3+nNsIgiIKz/Wej3JzzdQOJdDaVKOaeOXfu3PPPP/9nf/Znixcv/sIXvnDnnXeeOXPmueeee/TRR9vb23/jN37jvvvuGxgY2L179ze+8Y2DBw8ODw/PmTPnpptueuSRRzZs2DBnzpyLb7Orq+sb3/jGD37wg4GBgXeey1Rq1apVv//7v3/TTTfV19dnMpkjR478wz/8w+7du8+cORP/wIYNG37v937vxhtv7OzsfPTRR/fu3fuNb3xj06ZN2Wx23759f/M3f7Nv377R0dEgCAYGBo4fPz42CtHb2/vss89+8YtfHNuAdDq9Zs2aP/qjP1qzZk1DQ0NfX9+LL774la98pbu7O5vNZrPZvr6+8Rvckz3zwrnd/73nBwO5wUJQyEW58/nB8T+QD/J92XP/vfsH/9q/52zuXBAETcmmW+fe9O+XPrQkvSgIgjfffPM3f/M3C4XCX//1X99zzz0nT5588sknv/KVr4yNvTQ0NHR0dHz+859ft25dY2PjCy+88Du/8zsDAwMHDx78kz/5kzfffPNP//RP4598+umnv/e977300kvDw8NBEHR0dDz44INbt25dtmxZEATHjh372te+9uMf/3h0dDSdTv/xH//xbbfddvjw4X/+539+8sknxzZ44cKFt99+++c///mmpqZ4yt/x48cfe+yxJ554oq+vL5/PL1u2bOvWrY888sicOXNSqdTTTz/96KOPFgqFN95447d+67c+//nPf/azn52wRl566aVvfetbu3fvHntyH3jggYcffnjp0qU+swAANVJ1oiCKoqihpWE4nW0839DcnRoIT4VhGIZhFET5KB+1hC2fXNx3y+nswmyhkEul65feu+zYM0eiTJBKJsMwjMIoW8iFQT5KhKlkVJ+qiwpRmCjOiewNDQ0NDQ2HDx8+cODA/v37b7rppjNnzjzzzDO7d+/+8Ic/3NjYeObMmRdffPGv//qvX3vttbq6ujAMjx49evjw4b6+vj/4gz+46aabLrjB8+fP79279x//8R8PHjy4aNGiOXPmDA4Onjx58sCBA+vXr29ubt64cWN3d/ejjz767LPPvv322w0NDYsXL06lUsPDw/FEr+Hh4WPHjh08eDCe8NPV1fX0009v3769t7e3sbFx3rx5hUJhaGho/CFyNps9f/58/J/Dw8MDAwNHjhy59dZbP/rRj65YsSI+n+Hpp58eGhpavHhxU1PTBVOJjo90bTv9L68N7huNRhek5jclGzOF0fE/cCJz6jvdTzzdt/NM7mxdWFcICoMjx7tHe5Y3tN/e8u7W+sVDQ0P79+8PgmBwcDDeCfv27du9e/eCBQuam5tzudzg4ODBgwfb2tp+7dd+7brrrstms2fPni0UCoVCYWRkJA6PKIpefPHFb37zmz/5yU/Onz/f0tJy7ty5t99+O/7JT33qU0EQ7Ny58+mnn3755ZcbGxtXrFiRzWajKDpy5Mhzzz336quvtra2NjY2xieB9Pb2tre3P/zwwwsXLty3b9/jjz/+T//0T8eOHZs7d+7w8PCRI0e6u7tTqdRHP/rRJUuW5PP5eNpbPp8fGhqKq+8C2Wy2t7f3y1/+8jPPPNPd3Z1OpxcvXhwEwcjISN78IgBAjVStRCKRG82lXoqSh3PR3qgumR5/JB2lg8Zb5iSaeoMgm0/kRxZnMw9EuZ9m6zKpIEi+83NhkC7U5QuJMCwkEsl8Pv/OnJlpT9hqaGhYvnz5bbfd9uyzz7722mubN28eGhrasWNHNpt917vetWrVqq6urieffPKpp5667rrrbr755nnz5h05cmTnzp3bt29/+OGH169ff8ENDg0NHTt2bN++fddee4wGVyAAACAASURBVO199923evXq7u7uF198cdeuXbt27dqyZcvatWtPnDjx2GOPDQ0Nvetd77r11luXL1+eSCTa2tomPPX52LFjzz33XE9Pz6ZNm2655ZaVK1fGp7n39PTEP9DY2Lhu3bpPfOITQ0NDhULh5MmTr7/++sGDB5977rl77713wYIFnZ2dzz77bBRFH/rQh66//vpEIvH666//8Ic/jP/5YG7oyMjbrw/uS4aJu+ZtWdt0TTJIHRo+/JO+nfEP5KP8icyp7/f+6Gzu3M1zblhe356Nsj8bPvrKwN7nz710TcPq1vrFF2xzfEwfBMHtt99+ww03pFKpffv2ffvb3961a9cDDzxw3XXXrVq16pOf/OTf/u3fzps3b+vWrXfffXf8D5999tmdO3eGYXjvvfe2tbWdO3fuJz/5ye7duzs6OuIaef3110+cONHe3v6+973vlltuufbaaxsaGgYGBvr6+hoaGj74wQ+uWbNmaGjoX//1X19++eUnn3zyAx/4wMKFC994443HHnvs0KFDd9xxx5o1a4aHh/fu3fv6668/9thj995775IlS1avXr1ly5bvfe97ra2tH/rQh2655ZaLn4iRkZHOzs446t7znvds3rw5Ptl948aNBkYAADVSpcIwTCaTQ31DyW3J0SA7UijU16V/4QdGg9z+THpRcjSdyCcKmTnZozedql+cDM4HhXwhDMMgCsIoaCjUZ6IoF43GM5TiKV5FOXdkwYIFDz300J49e1588cUNGzY0NTXt2bNn7ty51113XWtr68GDB/fs2RMEwYYNG66//vpFixbNnTt39+7dvb29p06dGpuuM/5AfHR0NJlM3nHHHZ/5zGc2bdp06tSp7du3v/zyyz09PQMDA0NDQydPnuzr62ttbf3Upz71K7/yKy0tLZNsXm9v76FDh+rq6j75yU9+9KMfXbVq1c6dO1955ZV4ilccVO3t7bfccktPT08ul2toaOjq6urs7Ozq6spkMn19fcePHx8aGlq5cuUXvvCFzZs3d3d3b9u2baxGzub6T41256P80vrW31j2iZuaN57N9f+k77mxGhnJZ3qzvScyJ+en5q1r7FjZsGykkEkFyVcG9h4Zebs/f36Sjd+6detDDz20ePHiHTt2fPvb3x4ZGYmfvrVr1/72b//23//93y9ZsuSXf/mX77///vjn9+zZ093dfcMNN9x2222NjY1BEOzdu7erq2tsall/f38mk7n55ps/+9nP3nHHHePvq7m5+SMf+cgdd9wRhuHXv/71n/70p2fOnMnn89ls9ujRo2+++WZzc/Ntt90Wj4Rks9lXX331jTfeiIdl1q5de++9927fvr2tre3jH//47bfffvFjGR4efuONNzKZzPXXX//pT3/6oYceampqGvvbU6dO+cwCANRI9dVIEMbXv8rmskEUhIkwPkP9nQeZTEX90bEvHVz8xZXRzWF//fkgCMNUYtUt157sfTvTM5JOpqMgSkbJc6mBIJFK5Au5bDadTgfjzk6e5vIjLS0td955Z1NT0759+5555pkVK1bU19dv2bJl2bJl9fX18SyjIAi+853vfOc73xn/D/v6+uK/mlBTU1MqlQqCIJlMNjc3jz+o7e3tDYLguuuuu+aaayZPkTHJZPLuu++e8Dv4s2fP/vjHP/70pz89/g/r6t45M2d0dDSTySSTyaVLl86bNy/edRPcfphcWb98XrKlLlF3wV/158+fHu2Ngqgvd/a/nvzmFPZwOp0evwcmsX///r6+vh07duzYsWPyGxxfAheYN2/e/Pk/vyrxuXPnent7BwcHBwcH//zP/3z8T546dSqXy13ho8jlcqdOncrn85s3b77pppsm2QAAADVSdRJhYsKRjDAI8/l81xcPZxqzc1qbm2+be+rj549+smdhckHdj873H+9Pp9KLVy7ubcjOG5yfGMjkW/rvv+9Dv/w/PPjtbz/2zDPPDg0NxQf9U1ZXV9fe3r5ly5annnpq586dDQ0N9fX19913X3xWwJgPfOAD7e3tY0f5QRC8973vXbBgwcXDI7GhoaH4SHesZxobG+vq6hobG+NbPnLkyNjJHpdVKBT27t074UIWp06dikdvbr311o6OjkQicejQoVdeeWXswL2hoSGXy508eXKSI+9clD828vYFp4tc8DTNT83bPOfGhXXzxv6wPb20Lb2k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FEUXz9yIF2KPV2SPgmj8JKUJFQqFy/4MAAAwA2ukUCjksrkKbkAimcjmsl46AAAw62rkmmuuuf+D901zZfQpy+ZyK1etfP/We710AABg1tXIbbe9u21pa1EWAJmCfKHQ0tLS3t7mpQMAANNUe1f4BYrLFX4BgEqZadfUmvA89as9ggl+8dx3AABAjVxefMGr6QRJvIqFGgEAADVypaIoOnLk6H/9+394ftcLwyMjU4uJQhTNm9fywQ+8/zc+9WsTrqMHAACokQlqpPPAwRd2Pb/r+V25fBSEU7uRoD6dWrRg3oP3369GAABAjVypuXPnrl+/bjSbDcJEGEzloluFqJBKhtd2dKTr014cAACgRq5IGIbvvvWW+nTd8eMnClEhESancCO5fL6pqWHN6jWrVq704gAAgNIew8+YK/wW94E4i53ZwxV+AYBKmVFjI55OAACoIQm7AAAAUCMAAIAaAQAAUCMAAIAaAQAAUCMAAIAaAQAAUCMAAEDNsFYxMEM/3azFDgBVz9gIAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACoEQAAADUCAACoEQAAADUCAACoEQAAADUCAACoEQAAADUCAACoEQAAADUCAACoEQAAQI0AAACoEQAAQI0AAACoEQAAQI0AAACoEQAAQI0AAACoEQAAQI0AAACoEQAAQI0AAACoEQAAQI0AAABqBAAAQI0AAABqBAAAQI0AAABqBAAAQI0AAAC1JFX+u9yyfZv9DlXlP9z87vuXrbQfAIAyMzYCAABURhhFkb0AzMBPt9DnGwBUO2MjAACAGgEAANQIAACAGgEAANQIAACAGgEAANQIAACAGgEAANQIAACAGgEAANQIAACAGgEAANQIAACgRgAAANQIAACgRgAAANQIAACgRgAAANQIAACgRgAAANQIAACgRgAAANQIAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAACgRgAAADUCAAAQBCm7gCuRj6L3ff+xSX7g++//0Px0vR0FAMCVC6Moshe4lEPn+x/Z8dTV/qsff/ChxmTS3qPCn26hzzcAUCPUoItHQnY9+PBl/9WW7dvG/+e2e+5vb2yyM1EjAIAa4Uo9ceLY//bKT688QibPEjO4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AIA0AgAAII0AAADSCAAAgDQCAABIIwAAANIIAAAgjQAAAEgjAACANAIAAEgjAAAA0ggAACCNAAAASCMAAIA0AgAAII0AAADSCAAAgDQCAABIIwAAANIIAAAgjQAAAEgjAACANAIAAEgjAAAA0ggAACCNAAAASCMAAIA0AgAAII0AAADSCAAAgDQCAABIIwAAANIIAAAgjQAAANIIAACANAIAAEgjAAAA0ggAACCNAAAASCMAAIA0AgAAII0AAADSCAAAgDQCAABIIwAAgDQCAAAgjQAAANIIAACANAIAAEgjAAAA0ggAACCNAAAASCMAAIA0AgAAII0AAADSCAAAgDQCAABIIwAAgDQCAAAgjQAAANIIAACANAIAAEgjAAAA0ggAACCNAAAASCMAAIA0AgAAII0AAADSCAAAII0AAABIIwAAgDQCAAAgjQAAANIIAACANAIAAEgjAAAA0ggAACCNAAAASCMAAIA0AgAASCMAAADSCAAAII0AAABIIwAAgDQCAAAgjQAAANIIAACANAIAAEgjAAAA0ggAACCNAAAASCMAAIA0AgAASCMAAADSCAAAII0AAABIIwAAgDQCAAAgjQAAANIIAACANAIAAEgjAAAA0ggAACCNAAAA0ggAAIA0AgAASCMAAADSCAAAII0AAABIIwAAgDQCAAAgjQAAANIIAACANAIAAEgjAAAA0ggAACCNAAAA0ggAAIA0AgAASCMAAADSCAAAII0AAABIIwAAgDQCAAAgjQAAANIIAACANAIAAEgjAACANAIAACCNAAAA0ggAAIA0AgAASCMAAADSCAAAII0AAABIIwAAgDQCAAAgjQAAANIIAAAgjQAAAEgjAACANAIAACCNAAAA0ggAAIA0AgAASCMAAADSCAAAII0AAABIIwAAgDQCAAAgjQAAANIIAAAgjQAAAEgjAACANAIAACCNAAAA0ggAAIA0AgAASCMAAADSCAAAII0AAABIIwAAgDQCAABIIwAAANIIAAAgjQAAAEgjAACANAIAACCNAAAA0ggAAIA0AgAASCMAAADSCAAAII0AAADSCAAAgDQCAABIIwAAANIIAAAgjQAAAEgjAABAzc4Wi8Vp/8uLi4vT/ocnf+LJH5ryiSEf2k7blnTMH5j+55x87YZqzNgv0PKnE+vXX3998eJF+c9N/+W8e/duPp+33G9ogQJf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"/><div class="c x1 y1 w2 h2"><div class="t m0 x2 h3 y2 ff1 fs0 fc0 sc0 ls0 ws0">INFO@INFORMATICA2017.CL</div><div class="t m0 x3 h3 y3 ff1 fs0 fc1 sc0 ls0 ws0"><?echo $nowFormat;?></div></div><div class="c x1 y4 w2 h4"><div class="t m0 x4 h3 y5 ff1 fs0 fc1 sc0 ls0 ws0">VELOCIDAD DESCARGA MEDIA</div><div class="t m0 x5 h5 y6 ff1 fs1 fc2 sc0 ls0 ws0"><? echo round($speeduser/$speedcounter,1);?> Mbps</div></div><div class="c x1 y7 w2 h4"><div class="t m0 x6 h3 y5 ff1 fs0 fc1 sc0 ls0 ws0">VELOCIDAD CARGA MEDIA</div><div class="t m0 x5 h5 y6 ff1 fs1 fc3 sc0 ls0 ws0"> <? echo round($uspeeduser/$speedcounter,1);?> Mbps</div></div><div class="c x1 y8 w2 h6"><div class="t m0 x7 h3 y9 ff1 fs0 fc1 sc0 ls0 ws0">MEJOR VELOCIDAD EN TU </div><div class="t m0 x8 h3 ya ff1 fs0 fc1 sc0 ls0 ws0">ZONA</div><div class="t m0 x9 h5 yb ff1 fs1 fc4 sc0 ls0 ws0"><? 
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
echo $max."Mbps";
?></div><div class="t m0 x1 h3 yc ff1 fs0 fc1 sc0 ls0 ws0"><?echo $nombremax;?></div></div><div class="c x1 yd w2 h7"><div class="t m0 xa h3 ye ff1 fs0 fc1 sc0 ls0 ws0">ESTIMACION PRECIO</div><div class="t m0 x7 h3 yf ff1 fs0 fc1 sc0 ls0 ws0"> <? 

$cof=18000+74*$velocidad;

$add=1000;
$less=-1000;
$less=$less+$cof;
$add=$add+$cof;
$rango="".round($less,0)."-".round($add,0);
echo '<span style="font-size:60px;color:red;">| ';echo $rango." | CLP."; echo '</span>';?> </h1>

<h1 style="font-size:15px;color:black;"><? 


if($plan==0){

echo '<span style="font-size:50px;color:red;">| ';echo "Plan no ingresado"; echo '</span>';
  
}else{
$cof=18000+74*$plan;
$add=1000;
$less=-1000;
$less=$less+$cof;
$add=$add+$cof;
$rango="".$less."-".$add;
echo '<span style="font-size:60px;color:red;">| ';echo $rango." | CLP."; echo '</span>';

}

?>| CLP.</div></div><div class="c xb y10 w3 h8"><div class="t m0 xc h3 y11 ff1 fs0 fc1 sc0 ls0 ws0">DIAGNÓSTICO</div><div class="t m0 xd h9 y12 ff2 fs0 fc1 sc0 ls0 ws0">VELOCIDAD DESCARGA</div><div class="t m0 xe ha y13 ff1 fs2 fc2 sc0 ls0 ws0"><? echo round($velocidad,1);?> Mbps</div><div class="t m0 xf h9 y14 ff2 fs0 fc1 sc0 ls0 ws0">VELOCIDAD CARGA</div><div class="t m0 x10 ha y15 ff1 fs2 fc3 sc0 ls0 ws0"><? echo round($uspeed,1);?> Mbps</div><div class="t m0 x11 h3 y16 ff1 fs0 fc1 sc0 ls0 ws0">     <? if($conex==0){
echo 'Conexión Lan';
}
if($conex==2){
echo 'Conexión Móvil';

  }

  if($conex==1){

echo 'Conexión Wifi';

    }  ?>  –   <? 

if($dispositivo==1){
echo 'Tablet';
}
if($dispositivo==2){
echo 'Smartphone';
}
if($dispositivo==3){
echo 'PC / Notebook';


}


 ?> –  <? echo $compania;?>    </div></div>




   <?

 $ip= $_SERVER['REMOTE_ADDR'];

//$query2 = mysql_query("SELECT velocidad,hora,uvelocidad FROM test WHERE ip='$ip'");
 //$query2 = "SELECT * FROM test where ip="+$_SERVER['REMOTE_ADDR'];

$query = "SELECT * FROM test WHERE ip='$ip' ORDER BY hora DESC LIMIT 0,5;";

$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
 $novalida=0;
 $distinto=0;
$i=0;
while ($fila =@mysql_fetch_assoc($result)){ 

  if($conex==0){
$tipoconex='Conexión Lan';
}
if($conex==2){
$tipoconex= 'Conexión Móvil';
$distinto=1;
  }else{
$novalida=1;
$tipoconex= 'Conexión Wifi';

    }

 $pila[$i] = substr($fila['hora'],0,-8);
 $pila[$i+1]=round($fila['velocidad'],1);
 $pila[$i+2]=round($fila['uvelocidad'],1);
 $pila[$i+3]=$tipoconex;

$i=$i+4;

}


       

                 //?>





 <div class="c xb y17 w3 hb"><div class="t m0 x12 h3 y18 ff1 fs0 fc1 sc0 ls0 ws0">HISTORIAL MEDICIONES</div></div><div class="c x13 y19 w4 hc"><div class="t m0 x14 hd y1a ff2 fs3 fc1 sc0 ls0 ws0">FECHA</div></div><div class="c x15 y19 w5 hc"><div class="t m0 x6 hd y1a ff2 fs3 fc1 sc0 ls0 ws0">DESCARGA</div></div><div class="c x16 y19 w5 hc"><div class="t m0 x14 hd y1a ff2 fs3 fc1 sc0 ls0 ws0">CARGA</div></div><div class="c x17 y19 w5 hc"><div class="t m0 x6 hd y1a ff2 fs3 fc1 sc0 ls0 ws0">CONEXION</div></div><div class="c x13 y1b w4 hc"><div class="t m0 x18 hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[0];?></div></div><div class="c x15 y1b w5 hc"><div class="t m0 x18 hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[1];?></div></div><div class="c x16 y1b w5 hc"><div class="t m0 x18 hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[2];?></div></div><div class="c x17 y1b w5 hc"><div class="t m0 x18 hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[3];?></div></div><div class="c x13 y1c w4 hc"><div class="t m0 x18 hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[4];?></div></div><div class="c x15 y1c w5 hc"><div class="t m0 x18 hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[5];?></div></div><div class="c x16 y1c w5 hc"><div class="t m0 x18 hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[6];?></div></div><div class="c x17 y1c w5 hc"><div class="t m0 x18 hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[7];?></div></div><div class="c x13 y1d w4 hc"><div class="t m0 x18 hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[8];?></div></div><div class="c x15 y1d w5 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[9];?></div></div><div class="c x16 y1d w5 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[10];?></div></div><div class="c x17 y1d w5 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[11];?></div></div><div class="c x13 y1e w4 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[12];?></div></div><div class="c x15 y1e w5 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[13];?></div></div><div class="c x16 y1e w5 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[14];?></div></div><div class="c x17 y1e w5 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[15];?></div></div><div class="c x13 y1f w4 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[16];?></div></div><div class="c x15 y1f w5 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[17];?></div></div><div class="c x16 y1f w5 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[18];?></div></div><div class="c x17 y1f w5 hc"><div class="t m0 xa hd y1a ff2 fs3 fc1 sc0 ls0 ws0"><? echo $pila[19];?></div> </div><div class="t m0 x1 h3 yc ff1 fs0 fc1 sc0 ls0 ws0"><? if($novalida==1 && $distinto!=1){
echo 'No es una estimación óptima';
echo '<br>';
echo 'Realizar mediciones sólo mediante cable ó sólo banda ancha móvil , para estimar correctamente su internet';
  };?></div><div class="c xb y20 w3 he"><div class="t m0 x19 hf y21 ff1 fs4 fc1 sc0 ls0 ws0">EVALUACIÓN</div><br><div class="t m0 x1a h10 y22 ff3 fs0 fc1 sc0 ls0 ws0" style="
    font-size: 55px;
">SU EFICIENCIA DE INTERNET ES: <?
if($velocidad/$plan>=0.7){
echo '<span style="font-size:40px;color:green;">';echo round($velocidad/$plan,2)*100;echo '%</span>';
}else{

if($velocidad/$plan>=0.45){
echo '<span style="font-size:40px;color:yellow;">';echo round($velocidad/$plan,2)*100;echo'%</span>';
}else{
echo '<span style="font-size:40px;color:red;">';echo round($velocidad/$plan,2)*100;echo '%</span>';

}

}

                    ?></div><br><div class="t m0 x1b h10 y23 ff3 fs0 fc1 sc0 ls0 ws0" style="
    font-size: 55px;
">MEJOR ISP EN TU ZONA: <? echo $nombremax;?></div><br><div class="t m0 x11 h10 y24 ff3 fs0 fc1 sc0 ls0 ws0" style="
    font-size: 55px;
">PRECIO ESTIMADO PLAN: <? 


if($plan==0){

echo '<span style="font-size:45px;color:red;">';echo "Plan no ingresado"; echo '</span>';
  
}else{
$cof=18000+74*$plan;
$add=1000;
$less=-1000;
$less=$less+$cof;
$add=$add+$cof;
$rango="".$less."-".$add;
echo '<span style="font-size:45px;color:red;">';echo $rango." CLP aprox."; echo '</span>';

}

?></div></div><a class="l" href="mailto:info@informatica2017.cl"><div class="d m1" style="border-style:none;position:absolute;left:66.402000px;bottom:556.015015px;width:133.544991px;height:11.596985px;background-color:rgba(255,255,255,0.000001);"></div></a></div><div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div></div>
</div>
<div class="loading-indicator">
<img alt="" src="data:image/png;base64,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"/>
</div>


<script type="text/javascript"> window.print();</script>
</body>

</html>
