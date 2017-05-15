<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Linde</title>
    <link rel="icon" href="assets/img/favicon.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/jquery-3.1.1.min.js" charset="utf-8"></script>
    <script src="assets/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">
  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="navbar-brand navbar-brand-centered">Scheduler</div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-brand-centered">
              <ul class="nav navbar-nav">
                <li><a href="/home">Home</a></li>
                <li><a href="/unidades_basicas">Unidades Basicas</a></li>
                <li><a href="/calendarios_laborales">Calendarios Laborales</a></li>
                <li><a href="/servicios_terapias">Servicios terapias</a></li>
                <li><a href="/tecnicos">Tecnicos</a></li>
                <li><a href="/albaranes">Albaranes</a></li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
         
        </nav>


    <div class="container">
        <?php
        date_default_timezone_set("Europe/Madrid");
        require_once('routes.php');
        ?>
    </div>
    <script src="assets/js/lib.js" charset="utf-8"></script>
  </body>
</html>
