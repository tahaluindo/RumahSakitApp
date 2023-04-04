    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Alert -->
        <?php
        if ($this->session->flashdata('alert')) {
            echo $this->session->flashdata('alert');
            unset($_SESSION['alert']);
        } ?>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Data Pasien start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-2 text-center">
                            <img src="<?php echo base_url(); ?>assets/core-images/kota_kendari.png" alt="Logo Kota Kendari" height="120">
                        </div>
                        <div class="col-8 text-center">
                            <h4>DINAS KESEHATAN KOTA KENDARI</h4>
                            <h2>UPTD PUSKESMAS MEKAR</h2>
                            <p><small><?php echo $setting[0]->setting_address; ?> Telp <?php echo $setting[0]->setting_phone; ?> <br> Email : <?php echo $setting[0]->setting_email; ?></small></p>
                        </div>
                        <div class="col-2 text-center">
                            <img src="<?php echo base_url(); ?>assets/core-images/puskesmas.png" alt="Logo Puskesmas" height="120">
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="card-content">
                    <div class="row me-4">
                        <div class="col-md-12 col-12 text-end">
                            <a href="<?= site_url('pasien/create_page'); ?>" class="btn btn-sm btn-primary" title="Tambah data"><i class="fas fa-plus"></i> Tambah</a>
                            <a href="<?php echo site_url('pasien') ?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>
                        </div>
                    </div>

                    <!-- data tabel -->
                    <div class="row p-4" id="table-hover-row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Rekam Medis</th>
                                            <th>Nama Pasien</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tanggal Kunjungan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($pasien) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($pasien as $key) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $key->no_rekam_medis; ?></td>
                                                    <td><?php echo $key->nama_pasien; ?></td>
                                                    <td><?php echo $key->jenis_kelamin; ?></td>
                                                    <td><?php echo indonesiaDate($key->tgl_lahir_pasien); ?></td>
                                                    <td><?php echo indonesiaDate($key->tgl_daftar); ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Lihat data" data-bs-target="#FormDetail<?php echo $key->pasien_id; ?>"><i class="bi bi-eye"></i> Detail</button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormUbah<?php echo $key->pasien_id; ?>"><i class="bi bi-pencil-square"></i> Ubah</button>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open("pasien/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item" title="Hapus data"><i class="bi bi-x-lg"></i> Hapus</button>
                                                                    <input type="hidden" class="form-control" name="pasien_id" required="required" value="<?php echo $key->pasien_id; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal key Detail Pasien -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->pasien_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <?php echo form_open("pasien/detail_page/" . $key->pasien_id); ?>
                                                            <div class="modal-header text-center">
                                                                <h4 class="modal-title" id="myModalLabel33">Masukkan Kunci <?php if ($key->jns_key_id == 1) {
                                                                                                                                echo "(AES-128)";
                                                                                                                            } else if ($key->jns_key_id == 2) {
                                                                                                                                echo "(SPECK-128)";
                                                                                                                            } else echo ""; ?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php echo csrf(); ?>
                                                                        <input type="password" class="form-control" id="key" placeholder="kunci..." name="key" required="required">
                                                                        <input type="hidden" class="form-control" id="jns_key_id" placeholder="kunci..." name="jns_key_id" value="<?php echo $key->jns_key_id; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Masuk</span>
                                                                </button>
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Batal</span>
                                                                </button>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal key Ubah Pasien -->
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->pasien_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <?php echo form_open("pasien/update_page/" . $key->pasien_id); ?>
                                                            <div class="modal-header text-center">
                                                                <h4 class="modal-title" id="myModalLabel33">Masukkan Kunci <?php if ($key->jns_key_id == 1) {
                                                                                                                                echo "(AES-128)";
                                                                                                                            } else echo "(SPECK-128)"; ?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <?php echo csrf(); ?>
                                                                        <input type="password" class="form-control" id="key" placeholder="kunci..." name="key" required="required">
                                                                        <input type="hidden" class="form-control" id="jns_key_id" placeholder="kunci..." name="jns_key_id" value="<?php echo $key->jns_key_id; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary ml-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Ok</span>
                                                                </button>
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Batal</span>
                                                                </button>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php
                                                $no++;
                                            }
                                        } else {
                                            echo '
                                                <tr class="text-center">
                                                    <td colspan="7">Tidak ada data ditemukan</td>
                                                </tr>
                                                ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-3">
                    <div class="p-3">
                        <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                    </div>
                </div>

        </section>
        <!-- Data Pasien end -->

        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-12">
                                <p class="card-text">
                                    Klik tombol untuk melihat hasil data enkripsi dan menghitung nilai avalenche effect
                                </p>
                            </div>
                            <div class="col-12">
                                <a class="btn btn-info btn-sm mb-2" data-bs-toggle="collapse" href="#multiCollapseCreatePasien" role="button" aria-expanded="false" aria-controls="multiCollapseCreatePasien">Lihat data</a>
                                <button type="submit" class="btn btn-info btn-sm mb-2" data-bs-toggle="modal" title="Lihat data" data-bs-target="#FormHitung">Avalenche effect</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="nik-tab" data-bs-toggle="tab" href="#nik" role="tab" aria-controls="nik" aria-selected="true">nik</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="nomor_kk-tab" data-bs-toggle="tab" href="#nomor_kk" role="tab" aria-controls="nomor_kk" aria-selected="false">nomor kk</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="nomor_telpon-tab" data-bs-toggle="tab" href="#nomor_telpon" role="tab" aria-controls="nomor_telpon" aria-selected="false">nomor telpon</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="alamat-tab" data-bs-toggle="tab" href="#alamat" role="tab" aria-controls="alamat" aria-selected="false">alamat</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="collapse multi-collapse" id="multiCollapseCreatePasien">
                                    <div class="card card-body">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="nik" role="tabpanel" aria-labelledby="nik-tab">
                                                <strong>No. Rekam Medis : <?= $pasien_new[0]->no_rekam_medis ?></strong> <br>
                                                <strong>DATA PASIEN : <?= $pasien_new[0]->nama_pasien ?></strong> <br>
                                                <strong>TOTAL KARAKTER <?= $total_string ?> KARAKTER</strong> <br> <br>
                                                <strong>KARAKTER : <?= $pasien_new[0]->nik_pasien ?></strong> <br>

                                                <!-- tabel -->
                                                <div class="row p-4">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead class="text-center">
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Karakter</th>
                                                                        <th>Jumlah Karakter</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-center">
                                                                    <?php
                                                                    if ($strArray) {
                                                                        $nox = 1;
                                                                        $no = 1;
                                                                        foreach ($strArray as $s => $key) {
                                                                    ?>
                                                                            <tr>
                                                                                <td><?php echo $no; ?></td>
                                                                                <td><?php echo chr($s); ?></td>
                                                                                <td><?php echo $key; ?></td>
                                                                            </tr>

                                                                    <?php
                                                                            $no++;
                                                                        }
                                                                    } else {
                                                                        echo '
                                                                            <tr class="text-center">
                                                                                <td colspan="3">Tidak ada data ditemukan</td>
                                                                            </tr>
                                                                            ';
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nomor_kk" role="tabpanel" aria-labelledby="nomor_kk-tab">
                                                <strong>No. Rekam Medis : <?= $pasien_new[0]->no_rekam_medis ?></strong> <br>
                                                <strong>DATA PASIEN : <?= $pasien_new[0]->nama_pasien ?></strong> <br>
                                                <strong>TOTAL KARAKTER <?= $total_string ?> KARAKTER</strong> <br> <br>
                                                <strong>KARAKTER : <?= $pasien_new[0]->no_kk ?></strong> <br>

                                                <!-- tabel -->
                                                <div class="row p-4">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead class="text-center">
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Karakter</th>
                                                                        <th>Jumlah Karakter</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-center">
                                                                    <?php
                                                                    if ($strArray2) {
                                                                        $nox = 1;
                                                                        $no = 1;
                                                                        foreach ($strArray2 as $s => $key) {
                                                                    ?>
                                                                            <tr>
                                                                                <td><?php echo $no; ?></td>
                                                                                <td><?php echo chr($s); ?></td>
                                                                                <td><?php echo $key; ?></td>
                                                                            </tr>

                                                                    <?php
                                                                            $no++;
                                                                        }
                                                                    } else {
                                                                        echo '
                                                                            <tr class="text-center">
                                                                                <td colspan="3">Tidak ada data ditemukan</td>
                                                                            </tr>
                                                                            ';
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nomor_telpon" role="tabpanel" aria-labelledby="nomor_telpon-tab">
                                                <strong>No. Rekam Medis : <?= $pasien_new[0]->no_rekam_medis ?></strong> <br>
                                                <strong>DATA PASIEN : <?= $pasien_new[0]->nama_pasien ?></strong> <br>
                                                <strong>TOTAL KARAKTER <?= $total_string ?> KARAKTER</strong> <br> <br>
                                                <strong>KARAKTER : <?= $pasien_new[0]->no_telp_pasien ?></strong> <br>

                                                <!-- tabel -->
                                                <div class="row p-4">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead class="text-center">
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Karakter</th>
                                                                        <th>Jumlah Karakter</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-center">
                                                                    <?php
                                                                    if ($strArray3) {
                                                                        $nox = 1;
                                                                        $no = 1;
                                                                        foreach ($strArray3 as $s => $key) {
                                                                    ?>
                                                                            <tr>
                                                                                <td><?php echo $no; ?></td>
                                                                                <td><?php echo chr($s); ?></td>
                                                                                <td><?php echo $key; ?></td>
                                                                            </tr>

                                                                    <?php
                                                                            $no++;
                                                                        }
                                                                    } else {
                                                                        echo '
                                                                            <tr class="text-center">
                                                                                <td colspan="3">Tidak ada data ditemukan</td>
                                                                            </tr>
                                                                            ';
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="alamat" role="tabpanel" aria-labelledby="alamat-tab">
                                                <strong>NO. REKAM MEDIS : <?= $pasien_new[0]->no_rekam_medis ?></strong> <br>
                                                <strong>DATA PASIEN : <?= $pasien_new[0]->nama_pasien ?></strong> <br>
                                                <strong>TOTAL KARAKTER : <?= $total_string ?> KARAKTER</strong> <br> <br>
                                                <strong>KARAKTER : <?= $pasien_new[0]->alamat_pasien ?></strong> <br>

                                                <!-- tabel -->
                                                <div class="row p-4">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead class="text-center">
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Karakter</th>
                                                                        <th>Jumlah Karakter</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="text-center">
                                                                    <?php
                                                                    if ($strArray4) {
                                                                        $nox = 1;
                                                                        $no = 1;
                                                                        foreach ($strArray4 as $s => $key) {
                                                                    ?>
                                                                            <tr>
                                                                                <td><?php echo $no; ?></td>
                                                                                <td><?php echo chr($s); ?></td>
                                                                                <td><?php echo $key; ?></td>
                                                                            </tr>

                                                                    <?php
                                                                            $no++;
                                                                        }
                                                                    } else {
                                                                        echo '
                                                                            <tr class="text-center">
                                                                                <td colspan="3">Tidak ada data ditemukan</td>
                                                                            </tr>
                                                                            ';
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Hitung avalenche effect -->
            <div class="modal fade text-start" id="FormHitung" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h4 class="modal-title" id="myModalLabel33">Hitung Avalenche effect</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <?php echo form_open("pasien/avalen") ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <?php echo csrf(); ?>
                                <input type="text" placeholder="Masukan besar perubahan bit" class="form-control" name="value_perubahan_bit" required="required">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="masukan jumlah keseluruhan bit" class="form-control" name="jumlah_keseluruhan_bit" required="required">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Hitung</span>
                            </button>
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Batal</span>
                            </button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

        </section>
    </div>