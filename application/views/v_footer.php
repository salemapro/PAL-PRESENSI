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
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/template')?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/template')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/template')?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/template')?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('assets/template')?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url('assets/template')?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/template')?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/template')?>/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
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
            
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
        
      });

    </script>
  </body>
</html>