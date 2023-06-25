                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Pegawai</h1>

                    <?php
                        foreach($getPegawai as $row):
                    ?>

                    <form action="<?= base_url(); ?>/pegawai/update" method="post" enctype="multipart/form-data">

                        <div class="row card-group-row">

                            <?php if (isset($validation)) { ?>
                                <div class="col-md-12">
                                    <?php foreach ($validation->getErrors() as $error) : ?>
                                        <div class="alert alert-warning" role="alert">
                                            <i class="mdi mdi-alert-outline me-2"></i>
                                            <?= esc($error) ?>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            <?php } ?>

                            <div class="col-md-12">
                                <div class="list-group list-group-flush">
    
                                    <input name="id_user" type="hidden" class="form-control" value="<?= $row->id_user; ?>" readonly/>
                                    <input name="id_pegawai" type="hidden" class="form-control" value="<?= $row->id_pegawai; ?>" readonly/>

                                    <!-- NOMOR INDUK -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Nomor Induk</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="nomor_induk" value="<?= $row->nomor_induk; ?>" type="text" class="form-control" readonly/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- NAMA -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Nama Pegawai</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="nama_pegawai" value="<?= $row->nama_pegawai; ?>" type="text" class="form-control" placeholder="Masukan Nama Pegawai" required/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col align-items-right">
                                <button type="submit" class="btn btn-dark">Simpan</button>
                            </div>
                        </div>

                    </form>

                    <?php endforeach;?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->