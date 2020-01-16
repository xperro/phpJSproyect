<?php
include("config.php");
$velocidad= $_GET["vel"];
$lat= $_GET["lat"];
$lng= $_GET["lng"];
$uspeed= $_GET["uspeed"];
$ping= $_GET["ping"];
$ip= $_SERVER['REMOTE_ADDR'];
$isp= gethostbyaddr($_SERVER['REMOTE_ADDR']);

$pos = strpos($isp, "vtr");
$pos2 = strpos($isp, "entel");
$pos3 = strpos($isp, "claro");
$pos4 = strpos($isp, "movistar");

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
$nowFormat = date('Y-m-d H:i:s');
$phpdate = strtotime( $nowFormat );



?>



<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="../../build/css/metro.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-latest.js"></script>
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

 progress {
  background-color: #f3f3f3;
  border: 0;
  height: 18px;
  border-radius: 9px;
}
}</style>
<script>
    $(function() {
      $(".meter > span").each(function() {
        $(this)
          .data("origWidth", $(this).width())
          .width(0)
          .animate({
            width: $(this).data("origWidth")
          }, 300);
      });
    });
  </script>
  
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
  <body >
<header>





      <div class="wrapper"><a href="index.php">
      <div class="logo">Social Speed</div>
      </a>
      
        
    <nav>
    <ul class="menu">
   <li><a href="#"><i class="icon-home"></i>HOME</a>
   <ul class="sub-menu">
   <li><a href="#">Sub-Menu 1</a></li>
   <li><a href="#">Sub-Menu 2</a></li>
   <li><a href="#">Sub-Menu 3</a></li>
   </ul>
   </li>
  <li><a  href="#"><i class="icon-user"></i>ABOUT</a></li>
  <li><a  href="#"><i class="icon-camera"></i>PORTFOLIO</a>
  <ul class="sub-menu">
   <li><a href="#">Sub-Menu 1</a></li>
   <li><a href="#">Level 3 Menu</a>
    <ul>
    <li><a href="#">Sub-Menu 4</a></li>
    <li><a href="#">Sub-Menu 5</a></li>
    <li><a href="#">Sub-Menu 6</a></li>
    </ul>
   </li>
   </ul>
  </li>
  <li><a  href="#"><i class="icon-bullhorn"></i>BLOG</a></li>
  <li><a  href="#"><i class="icon-envelope-alt"></i>CONTACT</a></li>
  </ul>
  </nav>
  
    </div>
  </header>
   <form class="form" method="post" action="sendinfo.php?vel=<? echo round($velocidad,2)?>+&lat=<? echo $lat?>+&lng=<? echo $lng?>+&uspeed=<? echo round($uspeed,2);?>+&ping=<? echo $ping?>" >

<br>
<br>
<div style="width:  400px;margin: auto;">
<ul class="numeric-list large-bullet dark-bullet square-bullet">


<li><Strong>TU VELOCIDAD (DESCARGA/CARGA)</Strong></li>

<div style="width:  400px;margin: auto;">
<h1 style="
    font-size: initial;
">Su velocidad de descarga es de: <? echo round($velocidad,2); ?> Mbps / 100Mbps</h1>

<div class="progress"
    data-value="<?echo round($velocidad,2);?>"
    data-color="bg-red"
    data-role="progress"></div>
 </div>

<h1 style="
    font-size: initial;
">Su velocidad de subida es de: <? echo round($uspeed,2); ?> Mbps / 100Mbps</h1>

<div class="progress"
    data-value="<?echo round($uspeed,2);?>"
    data-color="bg-red"
    data-role="progress"></div>




<li><Strong>DIAGN&Oacute;STICO</Strong></li>
<h3 style="font-size: 15;">Seleccione su plan de internet:  </h3>
<select style="width:100%;" name="plan" id="ddlViewBy">
  <option value="10">Plan 10 MB</option>
 <option value="20">Plan 20 MB</option>
 <option value="30">Plan 30 MB</option>
  <option value="40">Plan 40 MB</option>
  <option value="50">Plan 50 MB</option>
  <option value="60">Plan 60 MB</option>
  <option value="70">Plan 70 MB</option>
  <option value="80">Plan 80 MB</option>
  <option value="90">Plan 90 MB</option>
  <option value="100">Plan +100 MB</option>
  <option value="3">2G</option>
  <option value="20">3G</option>
  <option value="40">4G</option>
    <option value="S">NO SABE INFORMACI&Oacute;N</option>
</select><script type="text/javascript">var x = document.getElementById("ddlViewBy").selectedIndex;
<? echo $plan."=";?>document.getElementsByTagName("option")[x].value;
</script><BR>

<input style="width: 100%" class="submit-btn" type="submit" value="Enviar">


</form>
</ul>
</div>





                <!-- Main content -->
           
               
 

              <!-- row end -->


                

        </div><!-- ./wrapper -->
   <script data-main="scripts/main" src="scripts/require.js"></script>
  </body>
</html>