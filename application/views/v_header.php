<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SS | Presensi Rapat</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/dist/css/adminlte.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/plugins/toastr/toastr.min.css'); ?>">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="layout-top-nav light-mode">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <div class="container">
                <!-- Left navbar links -->
                <ul class="navbar-nav">

                    <a href="#" class="navbar-brand">
                        <!-- <img src="<?php echo base_url('image/miLogo.png') ?>" alt="A" class="brand-image"style="opacity: .8;margin: 30px 0 0 0 0; width:27px;height:27px"> -->
                        <span class="brand-text">SS</span>
                        <span class="brand-text font-weight-light">Presensi Rapat</span>
                    </a>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="<?php echo base_url() . 'index.php/Presensi/daftarHadir' ?>" class="nav-link">Daftar Hadir</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="<?php echo base_url() . 'index.php/Presensi/daftarRapat' ?>" class="nav-link">Daftar Rapat</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class=" btn btn-primary" href="<?php echo base_url('login/logout'); ?>" role="button">
                            <i class="fas fa-sign-out-alt"></i>
                            Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>