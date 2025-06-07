<?php 
include 'config/app.php'
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <!-- DataTables -->
  <link rel="stylesheet" href="assets-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets-template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets-template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets-template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets-template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets-template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets-template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets-template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets-template/plugins/summernote/summernote-bs4.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>


  <!-- jQuery -->
  <script src="assets-template/plugins/jquery/jquery.min.js"></script>
<style>

  @keyframes rotate-scale {
  0% {
    transform: scale(1) rotate(0deg);
    opacity: 0.7;
  }
  50% {
    transform: scale(1.2) rotate(180deg);
    opacity: 1;
  }
  100% {
    transform: scale(1) rotate(360deg);
    opacity: 0.7;
  }
}

@keyframes fadein {
  0% {
    opacity: 0;
    transform: translateY(10px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.animated-logo {
  animation: rotate-scale 2s infinite ease-in-out;
}

.animate-fadein {
  animation: fadein 1.5s ease-in-out;
}

</style>
  
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center h-screen bg-white">
  <img class="animated-logo" src="assets/img/logobbr.png" alt="AdminLTELogo" height="150" width="150">
  <p class="text-lg font-semibold mt-4 animate-fadein text-green-700">Memuat Konten...</p>
</div> -->


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #065f46;">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="dokumentasi.php" class="nav-link text-white">Home</a>
    </li>
  </ul>
</nav>

  <!-- /.navbar -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #065f46;"> 
  <!-- Brand Logo with image -->
  <a href="dokumentasi.php" class="brand-link text-center d-flex flex-row align-items-center">
  <img src="assets/img/logobbr.png" alt="Majelis Logo" class="img-circle elevation-3" style="width: 50px; height: 50px; object-fit: cover;">
  <span class="brand-text font-weight-bold text-white ml-2" style="font-size: 16px;">Majelis Baburrahman</span>
</a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
      <div class="image">
        <img src="assets/img/user.jpg" class="img-circle elevation-2" alt="User Image" style="width: 30px; height: 30px;">
      </div>
      <div class="info ml-2">
        <span class="text-white" style="font-size: 16px;">
          <?= htmlspecialchars($_SESSION['nama']); ?>
        </span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Header -->
        <li class="nav-header text-white">DAFTAR MENU</li>

        <!-- Dokumentasi -->
        <li class="nav-item">
          <a href="dokumentasi.php" class="nav-link">
            <i class="nav-icon fas fa-photo-video text-white"></i>
            <p class="text-white">Dokumentasi</p>
          </a>
        </li>

        <!-- Akun -->
        <li class="nav-item">
          <a href="akun.php" class="nav-link">
            <i class="nav-icon fas fa-users-cog text-white"></i>
            <p class="text-white">Data Akun</p>
          </a>
        </li>

        <!-- Logout -->
        <li class="nav-item">
          <a href="logout.php" class="nav-link" onclick="return confirm('Yakin Anda Ingin Keluar?');">
            <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
            <p class="text-danger">Logout</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
