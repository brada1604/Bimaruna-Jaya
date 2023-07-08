                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah Pegawai</h1>
                    
                    <form action="<?= base_url(); ?>/pegawai/save" method="post" enctype="multipart/form-data">

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
                                    
                                    <!-- ROLE -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Role User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="role" value="Pegawai" type="text" class="form-control" readonly/>
                                            </div>
                                        </div>
                                    </div>

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
                                                <input name="nomor_induk" value="<?= old('nomor_induk') ?>" type="number" class="form-control" placeholder="Masukan Nomor Induk" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ====================================================== -->
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
                                                        <option value="<?= $row_pegawai['id_pegawai'];?>"> <?= $row_pegawai['nama_pegawai'];?></option>
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
                                                        <option value="<?= $row_divisi['id'];?>"> <?= $row_divisi['nama_divisi'];?></option>
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
                                                        <option value="<?= $row_jabatan['id'];?>"> <?= $row_jabatan['nama_jabatan'];?></option>
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
                                                    <option value="Tidak Sekolah"> Tidak Sekolah</option>
                                                    <option value="TK / PAUD / Sederajat">TK / PAUD / Sederajat</option>
                                                    <option value="SD / Sederajat">SD / Sederajat</option>
                                                    <option value="SMP / Sederajat">SMP / Sederajat</option>
                                                    <option value="SMA / Sederajat">SMA / Sederajat</option>
                                                    <option value="D1 / Sederajat">D1 / Sederajat</option>
                                                    <option value="D2 / Sederajat">D2 / Sederajat</option>
                                                    <option value="D3 / Sederajat">D3 / Sederajat</option>
                                                    <option value="S1 / D4 / Sederajat">S1 / D4 / Sederajat</option>
                                                    <option value="S2 / Sederajat">S2 / Sederajat</option>
                                                    <option value="S3 / Sederajat">S3 / Sederajat</option>
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
                                                    <option value="1">Laki - Laki</option>
                                                    <option value="0">Perempuan</option>
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
                                                <input name="tgl_lahir" id="tgl_lahir" value="<?= old('tgl_lahir') ?>" type="date" class="form-control"  required/>
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
                                                <input name="tgl_masuk" id="tgl_masuk" value="<?= old('tgl_masuk') ?>" type="date" class="form-control"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ====================================================== -->

                                    <!-- NAMA -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Nama User / Pegawai </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="name" value="<?= old('name') ?>" type="text" class="form-control" placeholder="Masukan Nama User" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Email User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="email" value="<?= old('email') ?>" type="email" class="form-control" placeholder="Masukan Email User" required/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- PASSWORD -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Password User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="password" value="<?= old('password') ?>" type="password" class="form-control" placeholder="Masukan Password User" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- PASSWORD -->
                                    <div class="list-group-item p-3">
                                        <div class="row align-items-start">
                                            <div class="col-md-2 mb-8pt mb-md-0">
                                                <div class="media align-items-left">
                                                    <div class="d-flex flex-column media-body media-middle">
                                                        <span
                                                        class="card-title">Confirm Password User</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-8pt mb-md-0">
                                                <input name="confirm_password" value="<?= old('confirm_password') ?>" type="password" class="form-control" placeholder="Masukan Password User" required/>
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementById("tgl_lahir").setAttribute("max", today);
    document.getElementById("tgl_masuk").setAttribute("max", today);
</script>