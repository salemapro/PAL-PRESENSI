    <div class="modal fade" id="modalFormLogin" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 350px;">
            <div class="modal-content">
                <div class="card-body login-card-body">
                    <h4><b>Login as Administrator</b></h4>
                    <br>
                    
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <div class="input-group mb-3">
                                <input type="text" id="username" class="form-control" placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <div class="input-group mb-3">
                                <input type="password" id="password" class="form-control" placeholder="Password">
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
                                <button class="btn btn-login btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    <!-- </form> -->
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){

            $('.btn-login').click(function(e){

                var username = $("#username").val();
                var password = $("#password").val();

                if(username.length == ""){

                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Username Wajib diisi !'
                    });

                } else if (password.length == ""){

                    Swal.fire({

                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib diisi'
                    });

                } else {

                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('login/cek_login') ?>",
                        data: {
                            username: username,
                            password: password
                        },
                
                        success: function(response){

                            if (response == "success"){

                                Swal.fire({
                                    type: 'success',
                                    title: 'Login Berhasil',
                                    showCancelButton: false,
                                    showConfirmButton: false
                                })
    
                                .then (function(){
                                    window.location.href = "<?php echo base_url('presensi/daftarRapat') ?>";
                                });

                            } else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Login Gagal',
                                    text: 'silahkan coba lagi'
                                });
                            }

                            console.log(response);
                        },

                        error:function(response){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops',
                                text: 'server error!'
                            });

                            console.log(response);
                        }
                    });
                }
            });
        });
        
    </script>