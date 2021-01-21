<?php
    include('controler/login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Campamento PdVB</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Popper JS -->
    <script src="vendor/popper/popper.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/new-age.css" rel="stylesheet">

    <!-- Custom javaScript for alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Inicio</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#campamento">Campamento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#detalles">Detalles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contacto">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="btn btn-outline" role="button" aria-pressed="true" data-toggle="modal"
                            data-target="#ingresar">Ingresar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal login -->
    <form class="form-signin" action="#" method="post">
        <div class="modal fade" id="ingresar" tabindex="-1" role="dialog" aria-labelledby="ingresarLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="ingresarLabel">Iniciar sesion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input name="username" type="user" id="userName" class="form-control input-sm chat-input"
                            placeholder="Nombres de usuario" />
                        </br>
                        <input name="password" type="password" id="userPassword"
                            class="form-control input-sm chat-input" placeholder="contraseña" />
                        </br>
                        <a class="example-popover" data-toggle="popover"
                            title="Habla con nosotros al"
                            data-content="WhatsApp +591 68490649">Olvidaste tu contraseña?</a>
                        </br>
                        </br>
                        <div class="wrapper">
                            <span class="group-btn">
                                <input name="submit" class="btn btn-primary btn-md" type="submit" value="Ingresar">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-5 my-auto">
                    <div class="header-content">
                        <img src="images/logos/pv_blanco.png" class="pdvblogo" alt="">
                        <br />
                        <h1 class="mb-5" style="font-family: 'Helvetica LT Std';">Bolivia</h1>
                        <!-- <a href="registro.php" class="btn btn-info btn-xl js-scroll-trigger">Registrate ahora!</a> -->
                        <a href="#" class="btn btn-outline btn-success btn-xl" role="button" aria-pressed="true" data-toggle="modal"
                            data-target="#ingresar">Ingresar</a>
                    </div>
                </div>
                <div class="col-lg-7 my-auto">
                    <div class="screen">
                        <img src="images/logos/logo_completo.png" class="img-fluid" alt="">
                        <br />
                        <br />
                        <h2 class="mb-5" style="text-align: center">Lo bueno esta por comenzar !!!</h2>
                        <div class="portada" id="portada">
                            <div id="cuenta"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="download bg-primary text-center" id="campamento">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 my-auto">
                    <div class="screen">
                        <img src="images/fotos/c.png" class="img-fluid" alt="">
                    </div>
                </div>
                <br />
                <div class="col-md-7 mx-auto">
                    <h2 class="section-heading">Campamento Virtual</h2>
                    <p>Una experiencia única, el primer campamento virtual de Bolivia.
                        Apto para adolescentes y jovenes.
                        ¡Inscríbete gratis ahora y no dejes pasar esta gran oportunidad!</p>
                    <div class="badges">
                        <a class="badge-link" href="#"><img src="images/logos/pv_blanco.png" alt=""></a>
                    </div>
                </div>
                <br />
                <div class="col-lg-2 my-auto">
                    <div class="screen">
                        <img src="images/fotos/d.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features bg-secundary" id="detalles">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Sin limites para la diversión</h2>
                <p class="text-white-50">Mira lo que podras hacer durante este campamento</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-4 my-auto">
                    <div class="screen">
                        <img src="images/fotos/e.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-8 my-auto">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <img src="images/MINIATURAS/3 MINIATURA EXPOSITORES.png"
                                        style="width: 100%;height: 115px;" alt="">
                                    <br />
                                    <br />
                                    <p class="text-white-50">Podras compartir devocionales junto a tu conserejo!</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <img src="images/MINIATURAS/5 MINIATURA JUEGOS.png"
                                        style="width: 100%;height: 115px;" alt="">
                                    <br />
                                    <br />
                                    <p class="text-white-50">Juegos y competencias durante todo el campamento!</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <img src="images/MINIATURAS/2 MINIATURA MUSICA.png"
                                        style="width: 100%;height: 115px;" alt="">
                                    <br />
                                    <br />
                                    <p class="text-white-50">Talleres especiales solo para ti y las dudas que tengas!
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="feature-item">
                                    <img src="images/MINIATURAS/4 MINIATURA TALLERES.png"
                                        style="width: 100%;height: 115px;" alt="">
                                    <br />
                                    <br />
                                    <p class="text-white-50">Participa de las transmisiones en vivo!</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="feature-item">
                                <img src="images/MINIATURAS/1 MINIATURA AMIGOS.png" style="width: 100%;height: 115px;"
                                    alt="">
                                <br />
                                <br />
                                <p class="text-white-50">Podrás tener una gran oportunidad de hacer grandes amigos!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <h2>La Angostura<br>Bolivia.</h2>
                <!-- <a href="registro.php" class="btn btn-info btn-xl js-scroll-trigger">Registrate ahora!</a> -->
                <a href="#" class="btn btn-outline btn-success btn-xl" role="button" aria-pressed="true" data-toggle="modal"
                    data-target="#ingresar">Ingresar</a>
            </div>
        </div>
        <div class="overlay"></div>
    </section>

    <section class="contact bg-primary" id="contacto">
        <div class="container">
            <h2>Siguenos <i class="far fa-thumbs-up"></i> en nuestras redes sociales!
            </h2>
            <ul class="list-inline list-social">
                <li class="list-inline-item social-youtube">
                    <a href="https://www.youtube.com/channel/UCkWg8_h4xmv21YqfIiBHR-A" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </li>
                <li class="list-inline-item social-facebook">
                    <a href="https://www.facebook.com/Palabra-de-Vida-Bolivia-101117892019" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="list-inline-item social-instagram">
                    <a href="https://www.instagram.com/pdvbolivia/" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; Campavirtualtiemporeal.com 2020. All Rights Reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#">Privacy</a>
                </li>
                <li class="list-inline-item">
                    <a href="#">Terms</a>
                </li>
                <li class="list-inline-item">
                    <a href="#">FAQ</a>
                </li>
            </ul>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.js"></script>

    <!-- Custom scripts for this counter -->
    <script src="js/simplyCountdown.min.js"></script>
    <script src="js/countdown.js"></script>

    <?php
    if (!empty($error)) {
        include("config/alertas.php");
        popUpWarning($error);
    }
    ?>
    <script>
    $(function() {
        $('.example-popover').popover({
            container: 'body'
        })
    })
    </script>

</body>

</html>