    <div class="modal fade" id="modalTambahRapat" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Rapat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php echo form_open('presensi/simpanDataRapat', ['class' => 'formSimpanRapat']) ?>
                <div class="pesan" style="display: none;">

                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputJudul" class="col-sm-3 col-form-label">Judul Rapat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputJudul" name="judul">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTempat" class="col-sm-3 col-form-label">Tempat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputTempat" name="tempat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputTanggal" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputTanggal" name="tanggal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputWaktu" class="col-sm-3 col-form-label">Waktu</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" id="inputWaktu" name="waktu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputLink" class="col-sm-3 col-form-label">Link Zoom/Gmeet</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputLink" name="link">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputId" class="col-sm-3 col-form-label">Id Zoom/Gmeet</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputId" name="idZoom">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputStatus" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control select text-sm" id="inputStatus" name="status" required="">
                                <option value="9" selected="" disabled="">-- Pilih Status --</option>
                                <option value="1">[1] Aktif </option>
                                <option value="0"> [0] Non-Aktif </option>
                            </select>
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
            $('.formSimpanRapat').submit(function(e){
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
                            $('#modalTambahRapat').modal('hide');
                            setTimeout(function(){
                                location.reload();
                            }, 2000);
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