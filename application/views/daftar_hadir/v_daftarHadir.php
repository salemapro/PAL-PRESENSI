        <div class="wrapper">
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <!-- <h3>Daftar Rapat</h3> -->
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Daftar Hadir</li>
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
                                <select class="form-control select text-sm" id="jenis_rapat" name="jenis_rapat" required="" onchange="cariPresensi()">
                                    <option value="0" selected="" disabled="">-- Pilih Rapat --</option>                                    
                                    <?php
                                        foreach ($presensi as $row) :
                                            echo "<option value='$row->id'>$row->judulRapat | " . date('d F Y', strtotime($row->tanggal)) . " Pukul $row->waktu</option>";
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div id="dataHadir" class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Hadir</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <button class="btn btn-sm btn-primary" id="tambahHadir" onclick="tambahHadir()"> <i class="fa fa-plus"></i> New Entry</button>
                                </div>
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead align="center">
                                        <tr>
                                            <th>ID</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Unit</th>
                                            <th>Instansi</th>
                                            <th>Email</th>
                                            <th>Attendance</th>
                                            <th class="col-md-1" nowrap="">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="container">
                    <div class="float-right d-none d-sm-block">
                    <b>Version</b> 1.0
                    </div>
                    <strong>Copyright &copy; 2023 <a href="#">Salema.io</a>.</strong> All rights
                    reserved.
                </div>
            </footer>
            <div class="viewmodal" style="display: none;">

            </div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap 4 -->
        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- DataTables -->
        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        
        <!--Export table buttons-->
        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>

        <!-- AdminLTE App -->
        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/dist/js/adminlte.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        <script type="text/javascript" src="<?php echo base_url('assets/template')?>/dist/js/demo.js"></script>

        <!-- Toastr -->
        <script type="text/javascript" src="<?php echo base_url('assets/template/plugins/toastr/toastr.min.js'); ?>"></script>

        <!-- SweetAlert2 -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

        <!-- Page Script -->
        <script type="text/javascript">
            $(function () {
                $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                });
            
            });
        </script>

        <!-- JQuery -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataHadir').hide();
            });

            function cariPresensi() {
                var id_rapat = $("#jenis_rapat").val();
                var base_url = "<?php echo base_url(); ?>";
                //$("#loading").html('<img src="' + base_url + 'dist/img/loading.gif" width="80">');
                $('#example1').DataTable().destroy();
                $.ajax({
                    type: "post",
                    url: "../presensi/get_presensi",
                    data: {
                        id_rapat: id_rapat
                    },
                    async: true,
                    success: function(dt, status, xhr) {
                        if (dt !== "" && dt !== null && dt !== undefined && dt !== '["ERR"]') {
                            var data = JSON.parse(dt);
                            try {
                                $('table tbody').empty();
                                $.each(data, function(index, item) {
                                    var row = create_data_table_row(index + 1, item);
                                    $('table tbody').append(row);
                                });
                                $('#filter').focus();
                                $('#example1').DataTable({
                                    "paging": true,
                                    "lengthChange": false
                                });
                            } catch (e) {
                                //toastr.warning('Error with message: ' + e.message);
                            }

                        } else {
                            $('#example1').DataTable().destroy();
                            $('table tbody').empty();
                            $('#example1').DataTable({
                                "paging": true,
                                "lengthChange": false
                            });
                        }
                    }
                });
                $("#loading").html('');
                $('#dataHadir').show();
            }

            function create_data_table_row(index, item) {
                var row = $('<tr><td>' + item.id + '</td> ' +
                    '<td>' + item.nip + '</td> ' +
                    '<td>' + item.namaLengkap + '</td> ' +
                    '<td>' + item.jabatan + '</td> ' +
                    '<td>' + item.unit + '</td> ' +
                    '<td>' + item.intansi + '</td> ' +
                    '<td>' + item.email + '</td> ' +
                    '<td>' + item.attendance + '</td> ' +
                    '<td nowrap><button title="Update" onclick="getRapat(' + item.id + ' )" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal"> <i class="fa fa-edit"></i> </button> &nbsp; <button title="Delete" onclick="deleteConfirm(' + item.id + ')" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>' +
                    '</td></tr>');

                return row;
            }

            function tambahHadir(){
                var id_rapat = $('#jenis_rapat').val();
                // $("#id_rapat").val($("#jenis_rapat").val());
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('presensi/formTambahHadir') ?>",
                    data: {
                        id_rapat: id_rapat
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            $('.viewmodal').html(response.sukses).show();
                            $('#modalTambahHadir').on('shown.bs.modal', function(e) {
                                $('#inputJudul').focus();
                            })
                            $('#modalTambahHadir').modal('show');
                        }
                    }
                });
            }

            function getRapat(id){
                var id_rapat = $('#jenis_rapat').val();
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('presensi/formEditHadir') ?>",
                    data: {
                        id: id,
                        id_rapat: id_rapat
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            $('.viewmodal').html(response.sukses).show();
                            $('#modalEditHadir').on('shown.bs.modal', function(e) {
                                $('#inputJudul').focus();
                            })
                            $('#modalEditHadir').modal('show');
                        }
                    }
                });                                                                                     
            }

            function deleteConfirm(id){
                Swal.fire({
                    title: 'Delete ',
                    text: 'Yakin menghapus Data Hadir?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.value){
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('presensi/deleteHadir') ?>",
                            data: {
                                id: id,
                            },
                            dataType: "json",
                            success: function(response){
                                if(response.sukses){
                                    Swal.fire ({
                                        icon: 'success',
                                        title: 'konfirmasi',
                                        text: response.sukses,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    });
                                    setTimeout(function(){
                                        location.reload();
                                    }, 1000);
                                }
                            }
                        });
                    }
                })
            }
            
        </script>
    </body>
</html>