<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM juegos where idjuego = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Steam Balbe</title>
    <link href="img/steam.ico" rel="shortcut icon" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" type="text/css" href="/css/custom.css" media="screen"/>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<style>
.descripcion {
border-radius: 0px 64px 0px 87px;
-moz-border-radius: 0px 64px 0px 87px;
-webkit-border-radius: 0px 64px 0px 87px;
border: 5px solid #000000;
width:460px;
height:280px;
float:right;
color: black;
background-color: #EDFDFC;
}
.imagen {
border: 5px solid #000000;
width:460px;
height:280px;
float:right;
}
ul{
       list-style:none;
       color: white;
       size: 20px;
       padding: 10px;
       }
.titulo {
    color: #FF683B;
    font-size: 20px;
}
.caracteristicas {
    font-size: 26px;
}
.datos { 
    font-size: 20px;
}
.divdatos {
    margin-top: 290px;
}
</style>

<body>
    <header class="header mb-5">
        <nav class="navbar navbar-expand-lg">
            <div class="container"><a href="index.php" class="navbar-brand home"><img src="img/logo.png" alt="Obaju logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
                <div class="navbar-buttons">
                    <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                    <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
                </div>
                <div id="navigation" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                        <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">JUEGOS<b class="caret"></b></a>
                            <ul class="dropdown-menu megamenu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Genero</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="category.html" class="nav-link">Accion</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link disabled">Aventura</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link disabled">Carreras</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link disabled">Casual</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Deportes</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link disabled">Estrategia</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link disabled">Indie</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Multijugador Masivo</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link">Rol</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link disabled">Simuladores</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Tipos</h5>
                                            <ul class="list-unstyled mb-3">
                                                <li class="nav-item"><a href="category.html" class="nav-link">Free To Play</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link disabled">Acceso anticipado</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link disabled">Demos</a></li>
                                                <li class="nav-item"><a href="category.html" class="nav-link disabled">Realidad Virtual</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown menu-large"><a href="contact.html" class="nav-link">Contacto</a></li>
                    </ul>
                    <div class="navbar-buttons d-flex justify-content-end">
                        <!-- /.nav-collapse-->
                        <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
                        <div id="login" class="navbar-collapse collapse d-none d-lg-block"><a href="register.html" class="btn btn-primary navbar-btn"><span>Registrarse</span></a></div>
                        <div id="register" class="navbar-collapse collapse d-none d-lg-block"><a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-primary navbar-btn"><span>login</span></a></div>
                        <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Customer login</h5>
                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="customer-orders.html" method="post">
                                            <div class="form-group">
                                                <input id="email-modal" type="text" placeholder="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input id="password-modal" type="password" placeholder="password" class="form-control">
                                            </div>
                                            <p class="text-center">
                                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                                            </p>
                                        </form>
                                        <p class="text-center text-muted">Not registered yet?</p>
                                        <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1 minute and gives you access to special discounts and much more!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>carrito</span></a></div>
                    </div>
                </div>
            </div>
        </nav>
        <div id="search" class="collapse">
            <div class="container">
                <form role="search" class="ml-auto">
                    <div class="input-group">
                        <input type="text" placeholder="Search" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- breadcrumb-->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb fondo">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Juegos</a></li>
                            </ol>
                        </nav>
                    </div>
                    <!-- *** MENUS AND FILTERS END ***-->
</div>

<div style="width:1000px; padding:3px;">
<h1 style="color: white;"><?php echo $data['nombre'];?></h1>
<div style=" width:460px; float:left;"><img class="imagen" src=<?php echo $data['imagen'];?> width="460px" height="280px"></div>
<div class="descripcion" style="margin-right: 50px";><h3 style="margin: 20px;">Descripción</h3>
<p style="color: black; margin: 20px;"><?php echo $data['descripcion'];?></p><br></div>
</div>

<div class="divdatos">

<ul>
    <strong class="caracteristicas">ACERCA DE ESTE CONTENIDO</strong>
    <li class="datos"><strong class="titulo">Nombre: </strong><?php echo $data['nombre'];?></li>
    <li class="datos"><strong class="titulo">Género: </strong><?php echo $data['categoria'];?></li>
    <li class="datos"><strong class="titulo">Precio: </strong><?php echo $data['precio'];?>€</li>

</ul>
</div>

  </body>
</html>