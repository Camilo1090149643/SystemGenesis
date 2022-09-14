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
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="views/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="views/assets/dist/css/adminlte.min.css">

  <!-- jQuery -->
  <script src="views/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="views/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

  <!-- JS Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
    
  }
  
</script>

</body>
</html>
