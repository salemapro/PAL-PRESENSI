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
                                    <li class="breadcrumb-item active">Daftar Rapat</li>
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
                                <div class="form-group">
                                    <button class="btn btn-sm btn-primary" id="tambahRapat"> <i class="fa fa-plus"></i> New Entry</button>
                                </div>
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead align="center">
                                        <tr>
                                            <th>ID Rapat</th>
                                            <th>Judul</th>
                                            <th>Tempat</th>
                                            <th>Tanggal dan Waktu</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($presensi as $row) {
                                            $status = ($row->status == 1) ? "checked" : "unchecked";
                                        ?>
                                            <tr>
                                                <td align="center"><?php echo $row->id ?></td>
                                                <td>
                                                    <b><?php echo $row->judulRapat ?></b><br>
                                                    <hr>
                                                    Link : <?php echo $row->link ?><br>
                                                    id : <?php echo $row->idZoom ?>
                                                </td>
                                                <td align="center"><?php echo $row->tempat ?></td>
                                                <td align="center"><?php echo $row->tanggal, "  ", $row->waktu ?></td>
                                                <td class="col-md-0" align="center">
                                                    <input type="checkbox" name="my-checkbox" data-bootstrap-switch data-off-color="danger" data-on-color="success" <?php echo $status ?> onchange="getStatusChanged(this, <?php echo $row->id; ?>);">
                                                </td>
                                                <td nowrap>
                                                    <button title="Update" onclick="getRapat($id)" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    &nbsp;
                                                    <button title="Delete" onclick="deleteConfirm($id)" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
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
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap 4 -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

        <!-- DataTables -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        <!--Export table buttons-->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>

        <!-- Bootstrap Switch -->
        <script src="<?php echo base_url('assets/template') ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

        <!-- AdminLTE App -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/dist/js/adminlte.min.js"></script>

        <!-- AdminLTE for demo purposes -->
        <script type="text/javascript" src="<?php echo base_url('assets/template') ?>/dist/js/demo.js"></script>

        <!-- Toastr -->
        <script type="text/javascript" src="<?php echo base_url('assets/template/plugins/toastr/toastr.min.js'); ?>"></script>


        <!-- SCRIPT -->
        <script type="text/javascript">
            $(document).ready(function() {

                $(function() {
                    $("#example1").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                    });

                });

                $("input[data-bootstrap-switch]").each(function() {
                    $(this).bootstrapSwitch('state');
                });

                $('#tambahRapat').click(function(e) {
                    $.ajax({
                        url: "<?php echo base_url('presensi/formTambahRapat') ?>",
                        dataType: "json",
                        success: function(response) {
                            if (response.sukses) {
                                $('.viewmodal').html(response.sukses).show();
                                $('#modalTambahRapat').on('shown.bs.modal', function(e) {
                                    $('#inputJudul').focus();
                                })
                                $('#modalTambahRapat').modal('show');
                            }
                        }
                    });
                });


            });

            function getStatusChanged(obj, id) {
                var status = 0;
                if ($(obj).is(":checked")) {
                    status = 1;
                }

                $.ajax({
                    type: "post",
                    url: "<?php echo base_url('presensi/change_status_rapat') ?>",
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(result) {
                        if (status === 1) {
                            toastr.success('Rapat berhasil di aktifkan');
                        } else {
                            toastr.success('Rapat berhasil di non-aktifkan');
                        }
                    },
                    error: function(xhr, status, e) {
                        toastr.warning('Change Data Failed! ' + status + e);

                    }
                });
            }
        </script>
        </body>

        </html>