<div class="modal fade" id="modalTambahHadir" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Hadir</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('presensi/simpanDataHadir', ['class' => 'formSimpanHadir']) ?>
                <div class="pesan" style="display: none;">

                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_rapat" id="id_rapat" value="<?= $id_rapat; ?>">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="inputNip" class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputNip" name="nip">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputNama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputNama" name="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputJabatan" class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputJabatan" name="jabatan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUnit" class="col-sm-3 col-form-label">Unit</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputUnit" name="unit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputIntansi" class="col-sm-3 col-form-label">Instansi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputIntansi" name="intansi">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputAttend" class="col-sm-3 col-form-label">Attendance</label>
                        <div class="col-sm-9">
                            <input type="datetime-local" class="form-control" id="inputAttend" name="attendance">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script>
        $(document).ready(function(){
            $('.formSimpanHadir').submit(function(e){
                
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response){
                        if(response.error){
                            // $('.pesan').html(response.error).show();
                            toastr.error(response.error);
                        }

                        if (response.sukses){
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                            // $('#modalTambahHadir').modal('hide');
                            // setTimeout(function(){
                            //     location.reload();
                            // }, 2000);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>