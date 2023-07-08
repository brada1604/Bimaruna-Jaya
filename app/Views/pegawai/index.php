                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Master Pegawai</h1>
                    <p class="mb-4">Data untuk memanage pegawai.</p>
                    <a class="edit" href="/pegawai/add"><button type="button" class="btn btn-primary">Tambah</button></a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Lead</th>
                                            <th>Divisi</th>
                                            <th>Jabatan</th>
                                            <th>Pendidikan</th>
                                            <th>Gender</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Usia</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Lead</th>
                                            <th>Divisi</th>
                                            <th>Jabatan</th>
                                            <th>Pendidikan</th>
                                            <th>Gender</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Usia</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getPegawai as $row):
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->nomor_induk;?></td>
                                                <td><?= $row->nama_pegawai;?></td>
                                                <td>
                                                    <?= $row->email;?> 
                                                    <?php if ($row->status == 0) : ?>
                                                        <span class="badge bg-warning text-light">Tidak Aktif</span>
                                                    <?php elseif ($row->status == 1) : ?>
                                                        <span class="badge bg-success text-light">Aktif</span>
                                                    <?php elseif ($row->status == 2) : ?>
                                                        <span class="badge bg-danger text-light">Banned</span>
                                                    <?php endif ?>
                                                </td>
                                                <td><?= $row->leader;?></td>
                                                <td><?= $row->nama_divisi;?></td>
                                                <td><?= $row->nama_jabatan;?></td>
                                                <td><?= $row->pendidikan;?></td>
                                                <td><?= $row->gender;?></td>
                                                <td><?= $row->tgl_lahir;?></td>
                                                <td><?= $row->usia;?> Tahun</td>
                                                <td><?= $row->tgl_masuk;?></td>
                                                <td>
                                                    <a class="edit" class="btn btn-warning" href="/pegawai/edit/<?= $row->id_pegawai;?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                                    <a class="hapus" class="btn btn-danger" href="/pegawai/delete/<?= $row->id_user;?>"><button type="button" class="btn btn-danger">Hapus</button></a> 
                                                </td>
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