<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SS | Presensi Rapat</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template')?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template')?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template')?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template')?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template')?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template')?>/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template')?>/dist/css/adminlte.min.css">
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
        
                    <!-- Login Button -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <!-- <a class=" btn btn-primary" href="<?php echo base_url('Auth/logout'); ?>" role="button">
                                <i class="fas fa-user"></i>
                                Sign In
                            </a> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formLogin">
                                <i class="fas fa-user"></i>
                                Sign In
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- LOGIN FORM-->
            <div class="modal fade" id="formLogin" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 350px;">
                    <!-- <form role="form" action="<?php echo base_url('presensi/login')?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Login as Administrator</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username:</label>
                                    <input type="text" class="form-control" id="exampleInputUser" name="username" placeholder="Username">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password:</label>
                                    <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password">
                                </div>
                            </div>     
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form> -->
                    <div class="modal-content">
                        <div class="card-body login-card-body">
                            <h4><b>Login as Administrator</b></h4>
                            <br>
                            <form action="<?php echo base_url('auth/login')?>" method="post">
                                <div class="form-group">
                                    <label for="inputUser">Username:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="username" id="inputUser" class="form-control" placeholder="Username" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPass">Password:</label>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password" id="inputPass" class="form-control " placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="reset" class="btn btn-danger btn-block" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h3>Presensi</h3>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Presensi</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="content">
                    <div class="container">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Rapat</h3>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Silakan pilih rapat yang Anda ikuti :</p>
                                <select class="form-control select text-sm" id="jenis_rapat" name="jenis_rapat" required="" onchange="openForm()">
                                    <option value="0" selected="" disabled="">-- Pilih Rapat --</option>
                                    <?php
                                    foreach ($presensi as $row) :
                                        echo "<option value='$row->id'>$row->judulRapat | $row->tanggal, $row->waktu</option>";
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div id="divInput" class="card card-danger card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Lengkapi data berikut ini</h3>
                            </div>
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputNIP" name="nip" placeholder="NIP">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck">
                                                <label for="exampleCheck" class="form-check-label">Saya tidak memiliki NIP</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputJabatan" name="jabatan" placeholder="Jabatan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputUnit" class="col-sm-2 col-form-label">Unit</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputUnit" name="unit" placeholder="Unit">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputInstansi" class="col-sm-2 col-form-label">Instansi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputInstansi" name="instansi" placeholder="Instansi">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

            

            <!-- Footer -->
            <footer class="main-footer">
                <div class="container">
                    <div class="float-right d-none d-sm-block">
                        <b>Version</b> 1.0
                    </div>
                    <strong>Copyright &copy; 2023 <a href="#">Salema.io</a>.</strong> All rights
                    reserved.
                </div>
            </footer>
        </div>
        
        <!-- jQuery -->
        <script src="<?php echo base_url('assets/template')?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url('assets/template')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- jsGrid -->
        <script src="<?php echo base_url('assets/template')?>/plugins/jsgrid/demos/db.js"></script>
        <script src="<?php echo base_url('assets/template')?>/plugins/jsgrid/jsgrid.min.js"></script>
        <!-- SweetAlert2 -->
        <script src="<?php echo base_url('assets/template')?>/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="<?php echo base_url('assets/template')?>/plugins/toastr/toastr.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/template')?>/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('assets/template')?>/dist/js/demo.js"></script>

        <!-- SCRIPT -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#divInput').hide();
            });

            function openForm(){
                $('#divInput').show();
            }
        </script>
    </body>
</html>