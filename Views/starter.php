<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Genesis | Starter</title>

  <link rel="shortcut icon" href="views/assets/dist/img/AdminLTELogo.png" type="imagen/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/assets/dist/css/adminlte.min.css">

  <!-- jQuery -->
  <script src="views/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/assets/dist/js/adminlte.min.js"></script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php
    include "modulos/navbar.php";
    include "modulos/aside.php";

  ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
    include "views/dashboard.php";
    ?>
 
  </div>
  <!-- /.content-wrapper -->

    
<?php include "modulos/footer.php"; ?>


</div>
<!-- ./wrapper -->

<script>
  function cargarvista(pagina_php,contenedor){
    $("." + contenedor).load(pagina_php);
    console.log("haces clic");
  }
  
</script>

</body>
</html>
