    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $title;?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('pasien'); ?>"> Data Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title;?></li>
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
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <!-- Data Pasien Header -->
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
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h3>Data Pasien</h3>
                                </div>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="row me-4 mt-1">
                                <div class="col-md-12 col-12 text-end">
                                    <a href="<?php echo site_url('pasien')?>" class="btn btn-warning btn-sm" title="Kembali ke halaman sebelumya"><i class="bi bi-arrow-left"></i> Kembali</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Form Detail Data Pasien -->
                                <?php echo form_open_multipart("pasien/detail_page") ?>
                                <form class="form">
                                    <div class="row mb-3">
                                        <div class="col-9"></div>
                                        <div class="col-3 text-center border">
                                            <strong>
                                                <h4>No. Rekam Medis : <?php echo $pasien[0]->no_rekam_medis; ?></h4>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <label>Nama Pasien</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <?php echo csrf(); ?>
                                            <p>: <?php echo $pasien[0]->nama_pasien; ?></p>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label>Nama Kepala Keluarga</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>: <?php echo $pasien[0]->nama_kepala_keluarga; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <label for="nik_pasien">NIK/Nomor KTP </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>: <?php echo $nik_pasien; ?></p>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label>Nomor Kartu Keluarga</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>: <?php echo $no_kk; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <label>Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>: <?php echo $pasien[0]->jenis_kelamin; ?></p>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label>Nomor Telpon</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>: <?php echo $no_telp_pasien; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <label>Tempat/Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>: <?php echo $pasien[0]->tempat_lahir; ?>, <?php echo indonesiaDate($pasien[0]->tgl_lahir_pasien); ?></p>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label>Nomor BPJS</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>: <?php echo $pasien[0]->no_bpjs_pasien; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <label>Status Pasien</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>:
                                                <?php
                                                foreach ($status_pasien as $sp) {
                                                    if ($pasien[0]->status_pasien_id == $sp->status_pasien_id) {
                                                        echo "$sp->nama_status_pasien";
                                                    }
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label>dw</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>: <?php echo $pasien[0]->dw; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <label>Jenis Kepesertaan</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>:
                                                <?php
                                                foreach ($kepesertaan_pasien as $kp) {
                                                    if ($pasien[0]->kepesertaan_pasien_id == $kp->kepesertaan_pasien_id) {
                                                        echo "$kp->nama_kepesertaan_pasien";
                                                    }
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <label>lw</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>: <?php echo $pasien[0]->lw; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-12">
                                            <label>Alamat</label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <p>: <?php echo $alamat_pasien; ?></p>
                                        </div>
                                    </div>
                                </form>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <div class="p-3">
                            <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Data Pasien end -->
    </div>