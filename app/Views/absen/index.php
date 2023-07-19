                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Absen</h1>
                    <p class="mb-4">Data untuk memanage absen.</p>
                    <!-- <a class="edit" href="/pegawai/add"><button type="button" class="btn btn-primary">Tambah</button></a> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Absen</h6>
                        </div>
                        <div class="card-body">
                            <?php if ($session->role == 3) : ?>
                                <?php if ($getTotalAbsenHariIni == 0) : ?>
                                    <form action="<?= base_url(); ?>/absen/upload_surat_absen" method="post" enctype="multipart/form-data">
                                        <div class="row card-group-row">
                                            <div class="col-md-12">
                                                <div class="list-group list-group-flush">

                                                    <!-- NOMOR INDUK -->
                                                    <div class="list-group-item p-3">
                                                        <div class="row align-items-start">
                                                            <div class="col-md-3">
                                                                <select name="status_kehadiran" class="form-control" required>
                                                                    <option value="">- Pilih Alasan -</option>
                                                                    <option value="SAKIT">SAKIT</option>
                                                                    <option value="IZIN">IZIN</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="file" id="file_surat" name="file_surat" class="form-control" accept=".pdf" required/>
                                                            </div>
                                                            <div class="col mb-8pt mb-md-0">
                                                                <button type="submit" class="btn btn-dark">Ajukan Tidak Bekerja Hari Ini</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php endif ?>
                            <?php endif ?>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Induk</th>
                                            <th>Nama Pegawai</th>
                                            <th>Divisi</th>
                                            <th>Jabatan</th>
                                            <th>Role Petugas</th>
                                            <th>Email Petugas</th>
                                            <th>Waktu Masuk</th>
                                            <th>Waktu Keluar</th>
                                            <th>Status Kehadiran</th>
                                            <th>File Surat</th>
                                            <th>Konfirmasi Petugas</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Induk</th>
                                            <th>Nama Pegawai</th>
                                            <th>Divisi</th>
                                            <th>Jabatan</th>
                                            <th>Role Petugas</th>
                                            <th>Email Petugas</th>
                                            <th>Waktu Masuk</th>
                                            <th>Waktu Keluar</th>
                                            <th>Status Kehadiran</th>
                                            <th>File Surat</th>
                                            <th>Konfirmasi Petugas</th>
                                            <th>Waktu</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getAbsen as $row):
                                        ?>
                                            <tr>
                                                <td align="center"><?= $nomor++; ?></td>
                                                <td><?= $row->nomor_induk;?></td>
                                                <td><?= $row->nama_pegawai;?></td>
                                                <td><?= $row->nama_divisi;?></td>
                                                <td><?= $row->nama_jabatan;?></td>
                                                <td align="center">
                                                    <?php if ($row->role == 1) : ?>
                                                        <span class="badge bg-danger text-light">Administrator</span>
                   
                                                    <?php elseif ($row->role == 2) : ?>
                                                        <span class="badge bg-info text-light">Operator</span>
                                                    <?php endif ?>
                                                </td>
                                                <td><?= $row->email;?></td>
                                                <td><?= $row->in;?></td>
                                                <td><?= $row->out;?></td>
                                                <td align="center">
                                                    <?php if ($row->status_kehadiran == 'HADIR') : ?>
                                                        <span class="badge bg-success text-light"><?= $row->status_kehadiran; ?></span>
                   
                                                    <?php elseif ($row->status_kehadiran == 'SAKIT') : ?>
                                                        <span class="badge bg-info text-light"><?= $row->status_kehadiran; ?></span>
                                                        <?php if ($session->role != 3) : ?>
                                                            <?php if ($row->konfirmasi_petugas != 1) : ?>
                                                                <hr>
                                                                <a href="/absen/update_status_kehadiran/<?= $row->id_absen?>/ALPHA" class="btn btn-sm btn-dark">ALPHA</a>
                                                            <?php endif ?>
                                                        <?php endif ?>

                                                    <?php elseif ($row->status_kehadiran == 'IZIN') : ?>
                                                        <span class="badge bg-warning text-light"><?= $row->status_kehadiran; ?></span>
                                                        <?php if ($session->role != 3) : ?>
                                                            <?php if ($row->konfirmasi_petugas != 1) : ?>
                                                                <hr>
                                                                <a href="/absen/update_status_kehadiran/<?= $row->id_absen?>/ALPHA" class="btn btn-sm btn-dark">ALPHA</a>
                                                            <?php endif ?>
                                                        <?php endif ?>

                                                    <?php elseif ($row->status_kehadiran == 'ALPHA') : ?>
                                                        <span class="badge bg-danger text-light"><?= $row->status_kehadiran; ?></span>
                                                        <?php if ($session->role != 3) : ?>
                                                            <hr>
                                                            <a href="/absen/update_status_kehadiran/<?= $row->id_absen?>/SAKIT" class="btn btn-sm btn-dark">SAKIT</a> | <a href="/absen/update_status_kehadiran/<?= $row->id_absen?>/IZIN" class="btn btn-sm btn-dark">IZIN</a>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                </td>
                                                <td align="center">
                                                    <?php if ($row->status_kehadiran == 'HADIR') : ?>
                                                        -
                   
                                                    <?php else : ?>
                                                        <?php if ($row->file) : ?>
                                                            <a href="<?= base_url().$row->file;?>" target="_blank">Lihat Surat</a>
                                                        <?php else : ?>
                                                            -
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                </td>
                                                <td align="center">
                                                    <?php if ($row->status_kehadiran == 'HADIR') : ?>
                                                        -
                   
                                                    <?php elseif ($row->konfirmasi_petugas == 0) : ?>
                                                        <span class="badge bg-danger text-light">Belum dikonfirmasi</span>
                                                        <?php if ($session->role != 3) : ?>
                                                            <?php if ($row->status_kehadiran != 'ALPHA') : ?>
                                                                <hr>
                                                                <a href="/absen/update_konfirmasi_petugas/<?= $row->id_absen?>/1" class="btn btn-sm btn-dark">ACC</a>
                                                            <?php endif ?>
                                                        <?php endif ?>

                                                    <?php elseif ($row->konfirmasi_petugas == 1) : ?>
                                                        <span class="badge bg-success text-light">Sudah Acc</span>
                                                        <?php if ($session->role != 3) : ?>
                                                            <hr>
                                                            <a href="/absen/update_konfirmasi_petugas/<?= $row->id_absen?>/0" class="btn btn-sm btn-dark">Batal ACC</a>
                                                        <?php endif ?>
                                                    <?php endif ?>
                                                </td>
                                                <td><?= $row->created_at;?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->