                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Pegawai</h1>

                    <?php
                        foreach($getPegawaiMaster as $row):
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

                                    <!-- LEAD -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Lead</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <select name="lead" class="form-control">
                                                    <option value="">- Pilih Lead -</option>

                                                    <?php foreach($getPegawai as $row_pegawai): ?>
                                                        <?php if($row_pegawai['id_pegawai'] != $row->id_pegawai): ?>
                                                            <option value="<?= $row_pegawai['id_pegawai'];?>" <?= $row->lead == $row_pegawai['id_pegawai'] ? "selected" : ""; ?>> <?= $row_pegawai['nama_pegawai'];?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- DIVISI -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Divisi</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <select name="id_divisi" class="form-control" required>
                                                    <option value="">- Pilih Divisi -</option>
                                                    <?php foreach($getDivisi as $row_divisi): ?>
                                                        <option value="<?= $row_divisi['id'];?>" <?= $row->id_divisi == $row_divisi['id'] ? "selected" : ""; ?>> <?= $row_divisi['nama_divisi'];?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- JABATAN -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Jabatan</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <select name="id_jabatan" class="form-control" required>
                                                    <option value="">- Pilih Jabatan -</option>
                                                    <?php foreach($getJabatan as $row_jabatan): ?>
                                                        <option value="<?= $row_jabatan['id'];?>" <?= $row->id_jabatan == $row_jabatan['id'] ? "selected" : ""; ?>> <?= $row_jabatan['nama_jabatan'];?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PENDIDIKAN -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Pendidikan</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <select name="pendidikan" class="form-control" required>
                                                    <option value="">- Pilih Pendidikan -</option>
                                                    <option value="Tidak Sekolah" <?= $row->pendidikan == "Tidak Sekolah" ? "selected" : ""; ?>> Tidak Sekolah</option>
                                                    <option value="TK / PAUD / Sederajat" <?= $row->pendidikan == "TK / PAUD / Sederajat" ? "selected" : ""; ?>>TK / PAUD / Sederajat</option>
                                                    <option value="SD / Sederajat" <?= $row->pendidikan == "SD / Sederajat" ? "selected" : ""; ?>>SD / Sederajat</option>
                                                    <option value="SMP / Sederajat" <?= $row->pendidikan == "SMP / Sederajat" ? "selected" : ""; ?>>SMP / Sederajat</option>
                                                    <option value="SMA / Sederajat" <?= $row->pendidikan == "SMA / Sederajat" ? "selected" : ""; ?>>SMA / Sederajat</option>
                                                    <option value="D1 / Sederajat" <?= $row->pendidikan == "D1 / Sederajat" ? "selected" : ""; ?>>D1 / Sederajat</option>
                                                    <option value="D2 / Sederajat" <?= $row->pendidikan == "D2 / Sederajat" ? "selected" : ""; ?>>D2 / Sederajat</option>
                                                    <option value="D3 / Sederajat" <?= $row->pendidikan == "D3 / Sederajat" ? "selected" : ""; ?>>D3 / Sederajat</option>
                                                    <option value="S1 / D4 / Sederajat" <?= $row->pendidikan == "S1 / D4 / Sederajat" ? "selected" : ""; ?>>S1 / D4 / Sederajat</option>
                                                    <option value="S2 / Sederajat" <?= $row->pendidikan == "S2 / Sederajat" ? "selected" : ""; ?>>S2 / Sederajat</option>
                                                    <option value="S3 / Sederajat" <?= $row->pendidikan == "S3 / Sederajat" ? "selected" : ""; ?>>S3 / Sederajat</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- GENDER -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Gender</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <select name="gender" class="form-control" required>
                                                    <option value="">- Pilih Gender -</option>
                                                    <option value="1" <?= $row->gender == "Laki - Laki" ? "selected" : ""; ?>>Laki - Laki</option>
                                                    <option value="0" <?= $row->gender == "Perempuan" ? "selected" : ""; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TANGGAL LAHIR -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Tanggal Lahir</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="tgl_lahir" id="tgl_lahir" value="<?= $row->tgl_lahir; ?>" type="date" class="form-control"  required/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TANGGAL MASUK -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Tanggal Masuk</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="tgl_masuk" id="tgl_masuk" value="<?= $row->tgl_masuk; ?>" type="date" class="form-control"  required/>
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