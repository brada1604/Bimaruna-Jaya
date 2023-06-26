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
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Induk</th>
                                            <th>Nama Pegawai</th>
                                            <th>Role Petugas</th>
                                            <th>Email Petugas</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Induk</th>
                                            <th>Nama Pegawai</th>
                                            <th>Role Petugas</th>
                                            <th>Email Petugas</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $nomor = 1; 
                                            foreach($getAbsen as $row):
                                        ?>
                                            <tr>
                                                <td><?= $nomor++; ?></td>
                                                <td><?= $row->nomor_induk;?></td>
                                                <td><?= $row->nama_pegawai;?></td>
                                                <td>
                                                    <?php if ($row->role == 1) : ?>
                                                        <span class="badge bg-danger text-light">Administrator</span>
                   
                                                    <?php elseif ($row->role == 2) : ?>
                                                        <span class="badge bg-info text-light">Operator</span>
                                                    <?php endif ?>
                                                </td>
                                                <td><?= $row->email;?></td>
                                                <td><?= $row->created_at;?></td>
                                                <td>
                                                    <?php if ($row->status == 1) : ?>
                                                        <span class="badge bg-success text-light">Masuk</span>
                   
                                                    <?php elseif ($row->status == 0) : ?>
                                                        <span class="badge bg-danger text-light">Keluar</span>
                                                    <?php endif ?>
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