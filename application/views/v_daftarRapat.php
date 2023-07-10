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
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-plus"></i> New Entry</button>
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
                                        foreach($presensi as $row)
                                        {
                                    ?>
                                            <tr>
                                                <td align="center"><?php echo $row->id ?></td>
                                                <td>
                                                    <b><?php echo $row->judulRapat ?></b><br><hr>
                                                    Link : <?php echo $row->link ?><br>
                                                    id : <?php echo $row->idZoom ?>
                                                </td>
                                                <td align="center"><?php echo $row->tempat ?></td>
                                                <td align="center"><?php echo $row->tanggal,"  ", $row->waktu ?></td>
                                                <td class="col-md-0" align="center">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                    </div>
                                                    <!-- <input type="checkbox" class="" name="my-checkbox" role="switch" data-bootstrap-switch data-off-color="danger" data-on-color="success" unchecked onchange="getStatusChanged(this, $id);"> -->
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
        

        

    
    
    
    
    
    
    
    
    
