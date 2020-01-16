
  
<!DOCTYPE html>
<html>
  <head><meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href="css/metro.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500" rel="stylesheet">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css" >
 <script src="js/menu.js" type="text/javascript"></script> 
  <style type="text/css">
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
  -moz-box-shadow:inset 0px -3px 7px 0px #29bbff;
  -webkit-box-shadow:inset 0px -3px 7px 0px #29bbff;
  box-shadow:inset 0px -3px 7px 0px #29bbff;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #2dabf9), color-stop(1, #0688fa));
  background:-moz-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
  background:-webkit-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
  background:-o-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
  background:-ms-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
  background:linear-gradient(to bottom, #2dabf9 5%, #0688fa 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2dabf9', endColorstr='#0688fa',GradientType=0);
  background-color:#2dabf9;
  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  border-radius:3px;
  border:1px solid #0b0e07;
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
  -moz-box-shadow:inset 0px -3px 7px 0px #ff2b2b;
  -webkit-box-shadow:inset 0px -3px 7px 0px #ff2b2b;
  box-shadow:inset 0px -3px 7px 0px #ff2b2b;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c40000), color-stop(1, #fa0808));
  background:-moz-linear-gradient(top, #c40000 5%, #fa0808 100%);
  background:-webkit-linear-gradient(top, #c40000 5%, #fa0808 100%);
  background:-o-linear-gradient(top, #c40000 5%, #fa0808 100%);
  background:-ms-linear-gradient(top, #c40000 5%, #fa0808 100%);
  background:linear-gradient(to bottom, #c40000 5%, #fa0808 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c40000', endColorstr='#fa0808',GradientType=0);
  background-color:#c40000;
  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  border-radius:3px;
  border:1px solid #0b0e07;
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
  -moz-box-shadow:inset 0px -3px 7px 0px #1d8700;
  -webkit-box-shadow:inset 0px -3px 7px 0px #1d8700;
  box-shadow:inset 0px -3px 7px 0px #1d8700;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #00eb3f), color-stop(1, #5cbf2a));
  background:-moz-linear-gradient(top, #00eb3f 5%, #5cbf2a 100%);
  background:-webkit-linear-gradient(top, #00eb3f 5%, #5cbf2a 100%);
  background:-o-linear-gradient(top, #00eb3f 5%, #5cbf2a 100%);
  background:-ms-linear-gradient(top, #00eb3f 5%, #5cbf2a 100%);
  background:linear-gradient(to bottom, #00eb3f 5%, #5cbf2a 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#00eb3f', endColorstr='#5cbf2a',GradientType=0);
  background-color:#00eb3f;
  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  border-radius:3px;
  border:1px solid #00c213;
  display:inline-block;
  cursor:pointer;
  color:#ffffff;
  font-family:Arial;
  font-size:15px;
  padding:9px 23px;
  text-decoration:none;
  text-shadow:0px 1px 0px #2f6627;
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

}</style>

  </head>
  <body style="background-color: black;">


       
<nav class="navbar navbar-default" style="
    margin-bottom: 00px;
"> <a class="navbar-brand" href="#" style="padding: 0px 0px !important;"><img src="images/logo.png"></a>
  <div class="container-fluid">
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


        <li class="active"><a href="#">HOME <span class="sr-only">(current)</span></a></li>
        <li><a href="vdi.html">PROPÓSITO</a></li>
           <li><a href="tips.html">RECOMENDACIONES</a></li>
             <li><a href="speedtest.php"><strong>DIAGNÓSTICO</strong></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">SERVICIOS <span class=""></span></a>
          <ul class="dropdown-menu">
          <li><a href="#">FILTROS (PRÓXIMAMENTE):</a></li>
           <li role="separator" class="divider"></li>
            <li><a href="#">EFICIENCIA</a></li>
           <li><a href="#">HORARIOS</a></li>
           <li><a href="#">ISP</a></li>
           <li><a href="#">DESCARGA</a></li>
             <li><a href="#">CARGA</a></li>



          </ul>
        </li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
    <li><a target="_blank" href="https://www.informatica2017.cl/#contact">CONTACTO</a></li>
     
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="slider" style="max-width: 100%;display: block;">
   <section class="slider" id="home">
    <div class="container-fluid">
      <div class="row">
          <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="header-backup"></div>
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="images/sl.jpg" alt="">
                      <div class="carousel-caption">
                        <!--  <h1 style="font-size: 70px">Cirugía Plástica Estética</h1>
                        <!--  <p>Experiencia</p> -->
                      </div>
                  </div>
                  <div class="item">
                  <img src="images/paso.jpg" alt="">
                      <div class="carousel-caption">
                        <!--    <h1 style="font-size: 70px">Cirugía Plástica Estética</h1>
                        <p>Calidad</p> -->
                      </div>
                  </div>
                  <div class="item">
                 <img src="images/paso2.jpg" alt="">
                      <div class="carousel-caption">
                        <!--    <h1 style="font-size: 70px">Cirugía Plástica Estética</h1>
                        <p>Altos Estándares</p> -->
                      </div>
                  </div>
                      <div class="item">
                 <img src="images/paso3.jpg" alt="">
                      <div class="carousel-caption">
                        <!--    <h1 style="font-size: 70px">Cirugía Plástica Estética</h1>
                        <p>Altos Estándares</p> -->
                      </div>
                  </div>
               
              </div>
              <!-- Controls -->
              <a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
              </a>
          </div>
      </div>
      <div style="display: block;width: 100%;height: 50px;float: left;position: relative;background-color: black;text-align: center;font-size: x-large;margin-top: 0%;">
<span style="margin-top: 2%;color: white;"><br>
<a target="_blank" href="https://www.informatica2017.cl">INFORMATICA2017</a> - info@informatica2017.cl
</span>
</div>
    </div>



  </section><!-- end of slider section -->

</div>



        <script src="js/bootstrap.min.js"></script>
     <script data-main="scripts/main" src="scripts/require.js"></script>
  </body>
</html>