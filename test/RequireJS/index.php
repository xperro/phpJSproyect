<?
include("config.php");

$query = "select count(*) as ndiag from test";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

$data=mysql_fetch_assoc($result);
$ndiag=$data['ndiag'];


?>

<!DOCTYPE html>
<html>
<title>velocidaddeinternet</title>
  <head>
  <script>
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
<meta name="author" content="INFORMATICA2017">
<meta name="description" content="Una aplicación para medir, evaluar y comparar tu velocidad de internet en forma colaborativa, entre más mediciones, mejores estimaciones. Comparte!">
<meta name="keywords" content="test velocidad, velocidad internet, speedtest, mejor proveedor, mejor isp, vtr,movistar,claro,entel,telefonica,gtd,internet,diagnóstico,test,internet móvil,smartphone,2g,3g,4g">
  <meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
<link href="http://www.velocidaddeinternet.cl/assets/share2.jpg" rel="image_src" />
  <link rel="stylesheet" href="css/reset2.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/style3.css"> <!-- Resource style -->
  <script src="js/modernizr.js"></script> <!-- Modernizr -->
   <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
 <script src="js/menu.js" type="text/javascript"></script> 
  <style type="text/css">


.navbar {
  -webkit-box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
-moz-box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
box-shadow: -1px 2px 18px -1px rgba(0,0,0,1);
  }

/* Style the buttons that are used to open and close the accordion panel */
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
}

button.accordion2 {
    background-color: rgba(12, 12, 12, 0.02);
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
}


#boton:hover{background-color:rgb(26, 216, 0);}
/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}
/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
button.accordion2.active, button.accordion2:hover {
    background-color: #ddd;
}
/*--services--*/
.service-box {margin: auto;
       text-align: center;
    background: #f7f7f7;
    width: 100%;
    margin-bottom: 2%;
    float: left;
    margin-right:1%;
    padding: 2em 2em;
      border: 1px solid #ddd;
}
/* Float Shadow */
.hvr-float-shadow {
  vertical-align: middle;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  box-shadow: 0 0 1px rgba(0, 0, 0, 0);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -moz-osx-font-smoothing: grayscale;
  position: relative;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform;
  transition-property: transform;
}
.hvr-float-shadow:before {
  pointer-events: none;
  position: absolute;
  z-index: -1;
  content: '';
  top: 105%;
  left: 5%;
  height: 52px;
  width: 95%;
  opacity: 0.5;
  background: -webkit-radial-gradient(center, ellipse, rgba(0, 0, 0, 0.16) 0%, rgba(0, 0, 0, 0) 80%);
  background: radial-gradient(ellipse at center, rgba(0, 0, 0, 0.18) 0%, rgba(0, 0, 0, 0) 80%);
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform, opacity;
  transition-property: transform, opacity;
}
.hvr-float-shadow:hover, .hvr-float-shadow:focus, .hvr-float-shadow:active {
  -webkit-transform: translateY(-9px);
  transform: translateY(-9px);
  /* move the element up by 5px */
}
.hvr-float-shadow:hover:before, .hvr-float-shadow:focus:before, .hvr-float-shadow:active:before {
  opacity: 1;
  -webkit-transform: translateY(9px);
  transform: translateY(9px);
  /* move the element down by 5px (it will stay in place because it's attached to the element that also moves up 5px) */
}
#service {
    padding:2em 2em 0em 2em;
.serve-grids-top {
    margin-top:4em;
}
.service-box h5 {
  font-size: 1.3em;
    font-weight: 600;
    color: #1cb841;
        margin-top: 1.3em;
    text-transform: uppercase;
}
.service-box p {
    color: #637B8E;
    font-size: 1em;
    line-height: 1.8em;
    margin: 0.5em 0;
}
/*--portfolio--*/
#gallery {
     padding: 6em 0;
}
.top-gallery {
    margin-top: 3em;
}

.gallery-grid {
  padding: 0;
}
.gallery1 {
position:relative;
}
.gallery1 .textbox {
  width:100%;
  height:100%;
  position:absolute;
  top:0;
  left:0;
  -webkit-transform: scale(0);
  transform: scale(0);
      background-color:rgb(11, 149, 69);
}
.gallery1:hover .textbox {
  -webkit-transform: scale(1);
  transform: scale(1);
}
.gallery-grid img{
    width:100%;
}

.textbox {
-webkit-transition: all 0.7s ease;
transition: all 0.7s ease;
text-align:center;
}
.textbox h4 {
     font-size: 2.5em;
  color: #fff;
  margin-top:5em;
}
.textbox p {
  font-size: 15px !important;
  color: #fff;
  font-weight:500 !important;
  margin:6px 0 0 0!important;
}
.gallery-grids {
  margin-top: 50px;
}
  #shiva
{
width:50%;
    height: 100px;
    /* background: #1cb841; */
    text-align: center;
    -moz-border-radius: 50px;
    /* -webkit-border-radius: 50px; */
    /* border-radius: 50px; */
    float: left;
}
 #shiva2
{
width: 50%;
    height: 100px;
    /* background: #1cb841; */
    -moz-border-radius: 50px;
    text-align: center;
    /* -webkit-border-radius: 50px; */
    /* border-radius: 50px; */
    float: left;
}

.count
{
  line-height: 100px;
      color: #1cb841;
  margin-left:0px;
  font-size:15px;
}
.count1
{
  line-height: 100px;
  color:white;
  margin-left:0px;
  font-size:15px;
}
#talkbubble {
   width: 120px;
   height: 80px;
   background: red;
   position: relative;
   -moz-border-radius:    10px;
   -webkit-border-radius: 10px;
   border-radius:         10px;
  float:left;
  margin:20px;
}
#talkbubble:before {
   content:"";
   position: absolute;
   right: 100%;
   top: 26px;
   width: 0;
   height: 0;
   border-top: 13px solid transparent;
   border-right: 26px solid red;
   border-bottom: 13px solid transparent;
}

.linker
{
  font-size : 20px;
  font-color: black;
}
        html, body, #map{
        width: 100%;
        height: 100%;
    }
    #formContent{
        position: relative;
        top: -100px;
        width: 100%;
        margin: 0 auto;
    } #formContent2{
        position: relative;
        top: 0px;
        width: 100%;
        margin: 0 auto;
    }
    </style>


    <style type="text/css">
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



.myButton {

  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:15px;
  padding:9px 23px;
  text-decoration:none;
  text-shadow:0px 1px 0px #263666;
}
.myButton:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0688fa), color-stop(1, #2dabf9));
  background:-moz-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
  background:-webkit-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
  background:-o-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
  background:-ms-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
  background:linear-gradient(to bottom, #0688fa 5%, #2dabf9 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0688fa', endColorstr='#2dabf9',GradientType=0);
  background-color:#0688fa;
}
.myButton:active {
  position:relative;
  top:1px;
}

.myButton2 {

  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:15px;
  padding:9px 23px;
  text-decoration:none;
  text-shadow:0px 1px 0px #263666;
}
.myButton2:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fa0808), color-stop(1, #c40000));
  background:-moz-linear-gradient(top, #fa0808 5%, #c40000 100%);
  background:-webkit-linear-gradient(top, #fa0808 5%, #c40000 100%);
  background:-o-linear-gradient(top, #fa0808 5%, #c40000 100%);
  background:-ms-linear-gradient(top, #fa0808 5%, #c40000 100%);
  background:linear-gradient(to bottom, #fa0808 5%, #c40000 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fa0808', endColorstr='#c40000',GradientType=0);
  background-color:#fa0808;
}
.myButton2:active {
  position:relative;
  top:1px;
}

.myButton3 {
  
  width: 50%;
    height: 100px;
    /* background: #1cb841; */
    -moz-border-radius: 50px;
    text-align: center;
    /* -webkit-border-radius: 50px; */
    /* border-radius: 50px; */
    float: left;
}
.myButton3:hover {
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #5cbf2a), color-stop(1, #00eb3f));
  background:-moz-linear-gradient(top, #5cbf2a 5%, #00eb3f 100%);
  background:-webkit-linear-gradient(top, #5cbf2a 5%, #00eb3f 100%);
  background:-o-linear-gradient(top, #5cbf2a 5%, #00eb3f 100%);
  background:-ms-linear-gradient(top, #5cbf2a 5%, #00eb3f 100%);
  background:linear-gradient(to bottom, #5cbf2a 5%, #00eb3f 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5cbf2a', endColorstr='#00eb3f',GradientType=0);
  background-color:#5cbf2a;
}
.myButton3:active {
  position:relative;
  top:1px;
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
}


</style>


  <meta property="og:title" content="Velocidaddeinternet.cl" />
    <meta property="og:description" content="Una aplicación para medir, evaluar y comparar tu velocidad de internet en forma colaborativa, entre más mediciones, mejores estimaciones. Comparte!." />
    <meta property="og:image" content="https://www.velocidaddeinternet.cl/assets/share2.jpg" />      
    <meta property="og:url" content="https://www.velocidaddeinternet.cl" />
  </head>
   <body style="background-color: #efefef;font-family: 'Work Sans', sans-serif;" >
   
<nav class="navbar navbar-default navbar-fixed-top" style="display:block;margin-bottom: 0px;"> <a class="navbar-brand" href="index.php" style="padding: 8px 0px !important;"><img src="images/logo.png"></a>
  
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
        </li>

  <li ><a href="vdi.html">FAQ</a></li>
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
<section class="cd-hero" style="    margin-top: 0%;">
    <ul class="cd-hero-slider autoplay">
      <li class="selected">
        <div id="1" class="cd-full-width" style="background-color: #eee;padding-top:15%;">
          <h2 style="color:black;">VELOCIDAD<span style="color:#28c13b;">DE</span>INTERNET</h2>
          <p style="color:black;">Una aplicación web para medir, evaluar y comparar tu velocidad de internet en forma colaborativa, entre más mediciones, mejores estimaciones. Comparte!. <div class="fb-share-button" data-href="https://www.velocidaddeinternet.cl" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.velocidaddeinternet.cl%2F&amp;src=sdkpreparse">Compartir</a></div> <div class="fb-like" data-href="https://www.facebook.com/Velocidaddeinternet-155955678246375/?fref=ts" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div> </p>
          <a href="speedtest.php" class="cd-btn">Diagnóstico</a>
        </div> <!-- .cd-full-width -->
      </li>

      <li>
        <div id="2" class="cd-half-width" style="padding-top:15%;">
          <h2 style="color:#16bd00;">DIAGNÓSTICO</h2>
          <p style="color:black;">Ejecuta nuestro diagnóstico, espera a que finalice, ingresa los datos y obtiene tus resultados!</p>
          <a href="https://www.velocidaddeinternet.cl/speedtest.php" class="cd-btn">Diagnóstico</a>
          <a href="vdi.html" class="cd-btn secondary">Leer más</a>
        </div> <!-- .cd-half-width -->

        <div class="cd-half-width cd-img-container">
          <img src="assets/p1.png" alt="tech 1">
        </div> <!-- .cd-half-width.cd-img-container -->
      </li>

      <li>
        <div id="3" class="cd-half-width cd-img-container">
          <img src="assets/p3.png" alt="tech 2">
        </div> <!-- .cd-half-width.cd-img-container -->

        <div  class="cd-half-width" style="padding-top:15%;">
          <h2 style="color:#16bd00;">RESULTADOS</h2>
          <p style="color:black;">Revisa los resultados obtenidos y proporcionados por nuestro sistema, para medir su desempeño a nivel local y global.</p>
        
          <a href="misresultados.php" class="cd-btn secondary">Mis resultados</a>
        </div> <!-- .cd-half-width -->
        
      </li>

 <li style="background-color: #eee;">
        <div id="4" class="cd-half-width cd-img-container"  >
          <img src="assets/p2.png" alt="tech 2">
        </div> <!-- .cd-half-width.cd-img-container -->

        <div class="cd-half-width" style="padding-top:15%;">
          <h2 style="color:#16bd00;">EVALUACIÓN</h2>
          <p style="color:black;">Nuestro sistema compara tus resultados con nuestra base de datos y te entrega una estimación del mejor ISP disponible en tu zona.</p>
        
          <a href="misresultados.php#eval" class="cd-btn secondary">Evaluación</a>
        </div> <!-- .cd-half-width -->
        
      </li>
      
    </ul> <!-- .cd-hero-slider -->

    <div class="cd-slider-nav">
      <nav>
        <span class="cd-marker item 1" ></span>
        
        <ul>
          <li class="selected"><a href="#1"></a></li>
          <li><a href="#2"></a></li>
          <li><a href="#3"></a></li>
          <li><a href="#4"></a></li>
        </ul>
      </nav> 
    </div> <!-- .cd-slider-nav -->
  </section> <!-- .cd-hero -->





<div  class="col-xs-12 col-md-12" style="padding-left: 0px;padding-right: 0px; background-color: rgb(28, 184, 65);*/">


      <div class="col-xs-6" id="boton" style="height:50px;">


      <a href="https://www.velocidaddeinternet.cl/speedtest.php" style="text-decoration: none;color: white;"> <p style="  height: 100px;  position: relative;
    top: 15px;text-align: center;"><strong>DIAGNÓSTICO</strong></p></a></div>
      

          <div class="col-xs-6" style="background-color: rgb(255, 255, 255);height:50px;text-align: center;" >



          <span  style=" position: relative;
    top: 15px;text-align: center;font-size: 13px;"><strong>DIAGNÓSTICOS <span class="count"><? echo $ndiag;?></span></strong></span>

    </div>
      






      </div> 





</div>

 


<div class="" id="service" >

          
           
        <div class="col-xs-3 col-md-3 service-box hvr-float-shadow">
            <div class=" hi-icon-effect-6">
                <a href="#set-6" class=""><img src="images/5.png"></a>
               </div>
            <h5 style="color: #1cb841">Conexión</h5>
          <p>Debe realizar el test mediante conexión <strong>red 2G/3G/4G o Cable de red</strong> para obtener un resultado óptimo. *(Wifi no es óptimo)</p>
          </div>
            <!--w3layouts-->
          <!--agileits-->
          <div class="col-xs-3 col-md-3 service-box hvr-float-shadow">
            <div class=" hi-icon-effect-6">
               <a href="#set-6" class=""><img src="images/2.png"></a>
          </div>
            <h5 style="color: #1cb841">Utilizar un navegador</h5>
            <p>Para poder realizar el diagnóstico debe usar IE, Chrome, Firefox, Safari u Opera</p>
          </div>
        
          <div class="col-xs-3 col-md-3 service-box hvr-float-shadow">
            <div class=" hi-icon-effect-6">
          <a href="#set-6" class=""><img src="images/3.png"></a>
          </div>
            <h5 style="color: #1cb841">Evitar usar internet</h5>
          <p>Mientras se realice el diagnóstico, debe evitar descargar o navegar para no afectar la medición.</p>
          </div>
        <div class="col-xs-3 col-md-3 service-box hvr-float-shadow">
            <div class=" hi-icon-effect-6">
                 <a href="#set-6" class=""><img src="images/4.png"></a>
          </div>
            <h5 style="color: #1cb841;">Repetir</h5>
            <p>Debe repetir los diagnósticos durante varios días y a distintos horarios.<strong> Entre más diagnósticos hagas, más eficaz será la evaluación.</strong></p>
          </div>
          <div class="clearfix"> </div>
      
    
  </div>



     
    </div>



  </section><!-- end of slider section -->
 <div class="col-xs-12 col-md-12" style="display: block;width: 100%;float: left;position: relative;background-color:rgba(121, 121, 121, 0.08);;text-align: center;font-size: large;margin-top: 0%;" alt="">

    
     


<br>

<br>

<div class="fb-share-button" data-href="https://www.velocidaddeinternet.cl" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.velocidaddeinternet.cl%2F&amp;src=sdkpreparse">Compartir</a></div> <div class="fb-like" data-href="https://www.facebook.com/Velocidaddeinternet-155955678246375/?fref=ts" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div> 


<a target="_blank" href="https://www.informatica2017.cl"> </a> <span style="color:black;"> 
</span><span><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="J3BE3PNATA3L8">
<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
<span style="color: black; font-size: 12px;">© 2017  info@velocidaddeinternet.cl - <a target="_blank" href="https://www.informatica2017.cl">informatica2017</a> Todos los derechos reservados.</span>
</span>
</div>
</div>

<script type="text/javascript">$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 10000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});</script>
<script>

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '312027822463572',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=312027822463572";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


</div>   

        <script src="js/bootstrap.min.js"></script>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
  </body>
</html>