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
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('pengkajian_awal');?>"> Rekam Medis Pengkajian Awal</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
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
        <!-- Data Rekam Medis Pengkajian Awal start -->
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <img src="<?php echo base_url();?>assets/core-images/kota_kendari.png" alt="Logo Kota Kendari" height="120">
                                </div>
                                <div class="col-8 text-center">
                                    <h4>DINAS KESEHATAN KOTA KENDARI</h4>
                                    <h2>UPTD PUSKESMAS MEKAR</h2>
                                    <p><small><?php echo $setting[0]->setting_address;?> Telp <?php echo $setting[0]->setting_phone;?> <br> Email : <?php echo $setting[0]->setting_email;?></small></p>
                                </div>
                                <div class="col-2 text-center">
                                    <img src="<?php echo base_url();?>assets/core-images/puskesmas.png" alt="Logo Puskesmas" height="120">
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="row mt-1 me-2">
                                <div class="col-md-12 col-12 d-flex justify-content-end">
                                    <?php $target = array('target' => '_blank'); echo form_open('pengkajian_awal/print/'.$pengkajian_awal[0]->pengkajian_awal_id, $target); ?>
                                        <?php echo csrf();?>
                                        <input type="hidden" class="form-control" id="jns_key_id" placeholder="kunci..." name="jns_key_id" value="<?php echo $pengkajian_awal[0]->jns_key_id; ?>">
                                        <button type="submit" class="btn btn-secondary btn-sm me-2"><i class="bi bi-printer"></i> Cetak</button>
                                    <?php echo form_close(); ?>
                                    <a href="<?php echo site_url('pengkajian_awal')?>" class="btn btn-warning btn-sm" title="Kembali ke halaman sebelumya"><i class="bi bi-arrow-left"></i> kembali</a>
                                </div>
                            </div>
                            <div class="card-title">
                                <div class="row p-4">
                                    <div class="col-md-6 col-12 text-center">
                                        <h4>REKAM MEDIS KLIEN RAWAT JALAN PENGKAJIAN AWAL</h4>
                                    </div>
                                    <div class="col-md-6 col-12 border text-center">
                                        <h4>NO. REKAM MEDIS <br> <?php echo $pasien[0]->no_rekam_medis; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form class="form">
                                        <div class="row table-responsive">
                                            <table cellpadding="6" class="table-borderless border-start border-end border-top border-bottom">
                                                <tr>
                                                    <td><label for="nama_pasien">Nama Lengkap</label></td>
                                                    <td>
                                                        <?php echo csrf();?>
                                                        <input type="hidden" class="form-control" name="user_id" required="required" value="<?php echo $user[0]->user_id; ?>">
                                                        <input type="hidden" class="form-control" name="pegawai_id" required="required" value="<?php echo $pegawai[0]->pegawai_id; ?>">
                                                        <input type="hidden" class="form-control" name="jns_key_id" required="required" value="<?php echo $jns_key[0]->jns_key_id; ?>">
                                                        <input type="hidden" id="pasien_id" class="form-control" name="pasien_id" required="required" value="<?php echo $pasien[0]->pasien_id; ?>">
                                                        : <?php echo $pasien[0]->nama_pasien; ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"><label for="nama_petugas">Nama Petugas</label></td>
                                                    <td>
                                                        : <?php echo $pegawai[0]->nama_pegawai; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label for="tgl_lahir_pasien">Tanggal Lahir</label></td>
                                                    <td>
                                                        : <?php echo indonesiaDate($pasien[0]->tgl_lahir_pasien); ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        $l = 'Laki-laki';
                                                        if ($l == $pasien[0]->jenis_kelamin) {
                                                            echo '<input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" checked>
                                                                    <label for="Laki-laki">L </label>';
                                                        } else {
                                                            echo '<input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki">
                                                                    <label for="Laki-laki">L </label>';
                                                        }

                                                        ?>
                                                        <?php
                                                        $p = 'Perempuan';
                                                        if ($p == $pasien[0]->jenis_kelamin) {
                                                            echo '/ <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan" checked>
                                                                    <label for="Perempuan">P</label>';
                                                        } else {
                                                            echo '/ <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan">
                                                                    <label for="Perempuan">P</label>';
                                                        }

                                                        ?>
                                                    </td>
                                                    <td class="border-start"><label for="tgl_periksa">Tanggal Periksa</label></td>
                                                    <td>
                                                        : <?php echo indonesiaDate($pasien[0]->tgl_daftar); ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-7">
                                                <label><strong>RIWAYAT KESEHATAN</strong></label>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="alerrgi"><strong>ALERGI</strong></label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="alerrgi" readonly="readonly" class="form-control input-border-bottom" name="alergi" value="<?php echo $pengkajian_awal[0]->alergi; ?>">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <label for="riwayat_penyakit">Riwayat Penyakit Dahulu</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="riwayat_penyakit" readonly="readonly" class="form-control input-border-bottom" name="riwayat_penyakit" value="<?php echo $pengkajian_awal[0]->riwayat_penyakit; ?>">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <label for="riwayat_pengobatan">Riwayat Pengobatan Terdahulu</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="riwayat_pengobatan" readonly="readonly" class="form-control input-border-bottom" name="riwayat_pengobatan" value="<?php echo $pengkajian_awal[0]->riwayat_pengobatan; ?>">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <label for="riwayat_penyakit_keluarga">Riwayat Penyakit di Keluarga</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="riwayat_penyakit_keluarga" readonly="readonly" class="form-control input-border-bottom" name="riwayat_penyakit_keluarga" value="<?php echo $pengkajian_awal[0]->riwayat_penyakit_keluarga; ?>">
                                            </div>
                                        </div>
                                        <div class="row mt-4 table-responsive">
                                            <table cellpadding="5" class="table-borderless border-start border-end border-top border-bottom">
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>PEMERIKSAAN FISIK</strong></label>
                                                    </td>
                                                    <td>
                                                        <label><strong>MASALAH</strong></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="kesadaran_fisik">Kesadaran</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="kesadaran_fisik" readonly="readonly" class="form-control input-border-bottom" name="kesadaran_fisik" value="<?php echo $pengkajian_awal[0]->kesadaran_fisik; ?>">
                                                    </td>
                                                    <td>
                                                        <label for="gcs">GCS</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="gcs" readonly="readonly" class="form-control input-border-bottom" name="gcs" value="<?php echo $pengkajian_awal[0]->gcs; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_fisik[]" value="hipotermi" id="hipotermi" <?php if(str_contains($pengkajian_awal[0]->masalah_fisik, 'hipotermi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="hipotermi">hipotermi</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="tekanan_darah">Tekanan Darah</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="tekanan_darah" readonly="readonly" class="form-control input-border-bottom" name="tekanan_darah" value="<?php echo $pengkajian_awal[0]->tekanan_darah; ?>" aria-label="mmHg"><span class="input-group-text">mmHg</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="frekuensi_nadi">Frekuensi Nadi</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="frekuensi_nadi" readonly="readonly" class="form-control input-border-bottom" name="frekuensi_nadi" value="<?php echo $pengkajian_awal[0]->frekuensi_nadi; ?>" aria-label="x/mnt"><span class="input-group-text">x/mnt</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_fisik[]" value="hipetermi" id="hipetermi" <?php if(str_contains($pengkajian_awal[0]->masalah_fisik, 'hipetermi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="hipetermi">hipetermi</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label for="frekuensi_nafas">Frekuensi Nafas</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="frekuensi_nafas" readonly="readonly" class="form-control input-border-bottom" name="frekuensi_nafas" value="<?php echo $pengkajian_awal[0]->frekuensi_nafas; ?>" aria-label="x/mnt"><span class="input-group-text">x/mnt</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        
                                                        <label for="suhu_tubuh">Suhu Tubuh</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $st1 = 'febris';
                                                            $st2 = 'afebris';
                                                            if ($st1 == $pengkajian_awal[0]->suhu_tubuh) {
                                                                echo '<input class="form-check-input" type="radio" name="suhu_tubuh" id="febris" value="febris" checked>
                                                                <label for="febris">febris</label>  / 
                                                                <input class="form-check-input" type="radio" name="suhu_tubuh" value="afebris" id="afebris">
                                                                <label for="afebris">afebris</label>';
                                                            } elseif ($st2 == $pengkajian_awal[0]->suhu_tubuh) {
                                                                echo '<input class="form-check-input" type="radio" name="suhu_tubuh" id="febris" value="febris">
                                                                <label for="febris">febris</label>  / 
                                                                <input class="form-check-input" type="radio" name="suhu_tubuh" value="afebris" id="afebris" checked>
                                                                <label for="afebris">afebris</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="suhu_tubuh" id="febris" value="febris">
                                                                <label for="febris">febris</label>  / 
                                                                <input class="form-check-input" type="radio" name="suhu_tubuh" value="afebris" id="afebris">
                                                                <label for="afebris">afebris</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM PERNAFASAN</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Keluhan</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_pernafasan[]" value="sesak" id="sesak" <?php if(str_contains($pengkajian_awal[0]->keluhan_pernafasan, 'sesak')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="sesak">sesak</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_pernafasan[]" value="nyeri" id="nyeri" <?php if(str_contains($pengkajian_awal[0]->keluhan_pernafasan, 'nyeri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="nyeri">nyeri</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_pernafasan[]" value="batuk" id="batuk" <?php if(str_contains($pengkajian_awal[0]->keluhan_pernafasan, 'batuk')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="batuk">batuk</label>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pernafasan[]" value="Gangguan pola nafas" id="gangguan_pola_nafas" <?php if(str_contains($pengkajian_awal[0]->masalah_pernafasan, 'Gangguan pola nafas')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="gangguan_pola_nafas">Gangguan pola nafas</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. Irama Nafas</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $in1 = 'regular';
                                                            if ($in1 == $pengkajian_awal[0]->irama_nafas) {
                                                                echo '<input class="form-check-input" type="radio" name="irama_nafas" id="regular" value="regular" checked>
                                                                <label for="regular">regular</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="irama_nafas" id="regular" value="regular">
                                                                <label for="regular">regular</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $in2 = 'irregular';
                                                            if ($in2 == $pengkajian_awal[0]->irama_nafas) {
                                                                echo '<input class="form-check-input" type="radio" name="irama_nafas" id="irregular" value="irregular" checked>
                                                                <label for="irregular">irregular</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="irama_nafas" id="irregular" value="irregular">
                                                                <label for="irregular">irregular</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pernafasan[]" value="Gangguan Pertukaran Gas" id="gangguan_pertukaran_gas" <?php if(str_contains($pengkajian_awal[0]->masalah_pernafasan, 'Gangguan Pertukaran Gas')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="gangguan_pertukaran_gas">Gangguan Pertukaran Gas</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>c. Suara Nafas</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="suara_nafas[]" value="ronchi" id="ronchi" <?php if(str_contains($pengkajian_awal[0]->suara_nafas, 'ronchi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="ronchi">ronchi</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="suara_nafas[]" value="wheezing" id="wheezing" <?php if(str_contains($pengkajian_awal[0]->suara_nafas, 'wheezing')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="wheezing">wheezing</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pernafasan[]" value="Ketidak efektifan jalan napas" id="ketidak_efektifan" <?php if(str_contains($pengkajian_awal[0]->masalah_pernafasan, 'Ketidak efektifan jalan napas')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="ketidak_efektifan">Ketidak efektifan jalan napas</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="suara_nafas[]" value="vesikuler" id="vesikuler" <?php if(str_contains($pengkajian_awal[0]->suara_nafas, 'vesikuler')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="vesikuler">vesikuler</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="suara_nafas[]" value="bronchovesikuler" id="bronchovesikuler" <?php if(str_contains($pengkajian_awal[0]->suara_nafas, 'bronchovesikuler')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="bronchovesikuler">bronchovesikuler</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM KARDIOVASKULAR</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Nyeri Dada</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $nd1 = 'ya';
                                                            if ($nd1 == $pengkajian_awal[0]->nyeri_dada) {
                                                                echo '<input class="form-check-input" type="radio" name="nyeri_dada" id="nyeri_dada_ya" value="ya" checked>
                                                                <label for="nyeri_dada_ya">ya</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="nyeri_dada" id="nyeri_dada_ya" value="ya">
                                                                <label for="nyeri_dada_ya">ya</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $nd2 = 'tidak';
                                                            if ($nd2 == $pengkajian_awal[0]->nyeri_dada) {
                                                                echo '<input class="form-check-input" type="radio" name="nyeri_dada" id="nyeri_dada_tidak" value="tidak" checked>
                                                                <label for="nyeri_dada_tidak">tidak</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="nyeri_dada" id="nyeri_dada_tidak" value="tidak">
                                                                <label for="nyeri_dada_tidak">tidak</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_kardiovaskular[]" value="Gangguan Tidur" id="gangguan_tidur" <?php if(str_contains($pengkajian_awal[0]->masalah_kardiovaskular, 'Gangguan Tidur')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="gangguan_tidur">Gangguan Tidur</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. Suara Jantung</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $sj1 = 'normal';
                                                            if ($sj1 == $pengkajian_awal[0]->suara_jantung) {
                                                                echo '<input class="form-check-input" type="radio" name="suara_jantung" id="normal" value="normal" checked>
                                                                <label for="normal">normal</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="suara_jantung" id="normal" value="normal">
                                                                <label for="normal">normal</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $sj2 = 'tidak normal';
                                                            if ($sj2 == $pengkajian_awal[0]->suara_jantung) {
                                                                echo '<input class="form-check-input" type="radio" name="suara_jantung" id="tidak_normal" value="tidak normal" checked>
                                                                <label for="tidak_normal">tidak normal</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="suara_jantung" id="tidak_normal" value="tidak normal">
                                                                <label for="tidak_normal">tidak normal</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_kardiovaskular[]" value="Nyeri" id="Nyeri" <?php if(str_contains($pengkajian_awal[0]->masalah_kardiovaskular, 'Nyeri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Nyeri">Nyeri</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>c. CRT</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cr1 = '< 3 detik';
                                                            if ($cr1 == $pengkajian_awal[0]->crt) {
                                                                echo '<input class="form-check-input" type="radio" name="crt" id="<_3_detik" value="< 3 detik" checked>
                                                                <label for="<_3_detik">< 3 detik</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="crt" id="<_3_detik" value="< 3 detik">
                                                                <label for="<_3_detik">< 3 detik</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $cr2 = '> 3 detik';
                                                            if ($cr2 == $pengkajian_awal[0]->crt) {
                                                                echo '<input class="form-check-input" type="radio" name="crt" id=">_3_detik" value="> 3 detik" checked>
                                                                <label for=">_3_detik">> 3 detik</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="crt" id=">_3_detik" value="> 3 detik">
                                                                <label for=">_3_detik">> 3 detik</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_kardiovaskular[]" value="Penurunan Curah Jantung" id="Penurunan_curah_jantung" <?php if(str_contains($pengkajian_awal[0]->masalah_kardiovaskular, 'Penurunan Curah Jantung')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Penurunan_curah_jantung">Penurunan Curah Jantung</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>d. JVP</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $jv1 = 'normal';
                                                            if ($jv1 == $pengkajian_awal[0]->jvp) {
                                                                echo '<input class="form-check-input" type="radio" name="jvp" id="jvp_normal" value="normal" checked>
                                                                <label for="jvp_normal">normal</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="jvp" id="jvp_normal" value="normal">
                                                                <label for="jvp_normal">normal</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $jv2 = 'meningkat';
                                                            if ($jv2 == $pengkajian_awal[0]->jvp) {
                                                                echo '<input class="form-check-input" type="radio" name="jvp" id=">jvp_meningkat" value="meningkat" checked>
                                                                <label for=">jvp_meningkat">meningkat</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="jvp" id=">jvp_meningkat" value="meningkat">
                                                                <label for=">jvp_meningkat">meningkat</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_kardiovaskular[]" value="Gangguan Perfusi Jaringan" id="Gangguan_Perfusi_Jaringan" <?php if(str_contains($pengkajian_awal[0]->masalah_kardiovaskular, 'Gangguan Perfusi Jaringan')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gangguan_Perfusi_Jaringan">Gangguan Perfusi Jaringan</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_kardiovaskular[]" value="Intoleransi Aktivitas" id="Intoleransi_Aktivitas" <?php if(str_contains($pengkajian_awal[0]->masalah_kardiovaskular, 'Intoleransi Aktivitas')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Intoleransi_Aktivitas">Intoleransi Aktivitas</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM PERSYARAFAN</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Keluhan Pusing</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $kp1 = 'ya';
                                                            if ($kp1 == $pengkajian_awal[0]->keluhan_pusing) {
                                                                echo '<input class="form-check-input" type="radio" name="keluhan_pusing" id="pusing_ya" value="ya" checked>
                                                                <label for="pusing_ya">ya</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="keluhan_pusing" id="pusing_ya" value="ya">
                                                                <label for="pusing_ya">ya</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $kp2 = 'tidak';
                                                            if ($kp2 == $pengkajian_awal[0]->keluhan_pusing) {
                                                                echo '<input class="form-check-input" type="radio" name="keluhan_pusing" id="pusing_tidak" value="tidak" checked>
                                                                <label for="pusing_tidak">tidak</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="keluhan_pusing" id="pusing_tidak" value="tidak">
                                                                <label for="pusing_tidak">tidak</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan[]" value="Gangguan Perfusi Jaringan Cerebral" id="Gangguan_Perfusi_Jaringan_Cerebral" <?php if(str_contains($pengkajian_awal[0]->masalah_persyarafan, 'Gangguan Perfusi Jaringan Cerebral')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gangguan_Perfusi_Jaringan_Cerebral">Gangguan Perfusi Jaringan Cerebral</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. Kesadaran</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="kesadaran_persyarafan[]" value="composmentis" id="composmentis" <?php if(str_contains($pengkajian_awal[0]->kesadaran_persyarafan, 'composmentis')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="composmentis">composmentis</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="kesadaran_persyarafan[]" value="somnolent" id="somnolent" <?php if(str_contains($pengkajian_awal[0]->kesadaran_persyarafan, 'somnolent')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="somnolent">somnolent</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan[]" value="Resiko TIK meningkat" id="Resiko_TIK_meningkat" <?php if(str_contains($pengkajian_awal[0]->masalah_persyarafan, 'Resiko TIK meningkat')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Resiko_TIK_meningkat">Resiko TIK meningkat</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="kesadaran_persyarafan[]" value="apatis" id="apatis" <?php if(str_contains($pengkajian_awal[0]->kesadaran_persyarafan, 'apatis')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="apatis">apatis</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="kesadaran_persyarafan[]" value="sopor" id="sopor" <?php if(str_contains($pengkajian_awal[0]->kesadaran_persyarafan, 'sopor')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="sopor">sopor</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="kesadaran_persyarafan[]" value="coma" id="coma" <?php if(str_contains($pengkajian_awal[0]->kesadaran_persyarafan, 'coma')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="coma">coma</label>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan[]" value="Resiko Cedera" id="Resiko_Cedera" <?php if(str_contains($pengkajian_awal[0]->masalah_persyarafan, 'Resiko Cedera')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Resiko_Cedera">Resiko Cedera</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>c. Pupil</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $p1 = 'isokor';
                                                            if ($p1 == $pengkajian_awal[0]->pupil) {
                                                                echo '<input class="form-check-input" type="radio" name="pupil" id="isokor" value="isokor" checked>
                                                                <label for="isokor">isokor</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="pupil" id="isokor" value="isokor">
                                                                <label for="isokor">isokor</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $p2 = 'anisokor';
                                                            if ($p2 == $pengkajian_awal[0]->pupil) {
                                                                echo '<input class="form-check-input" type="radio" name="pupil" id="anisokor" value="anisokor" checked>
                                                                <label for="anisokor">anisokor</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="pupil" id="anisokor" value="anisokor">
                                                                <label for="anisokor">anisokor</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>d. Sklera</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="sklera[]" value="ikterik" id="ikterik" <?php if(str_contains($pengkajian_awal[0]->sklera, 'ikterik')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="ikterik">ikterik</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="sklera[]" value="Non-ikterik" id="Non-ikterik" <?php if(str_contains($pengkajian_awal[0]->sklera, 'Non-ikterik')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Non-ikterik">Non-ikterik</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="sklera[]" value="perdarahan" id="perdarahan" <?php if(str_contains($pengkajian_awal[0]->sklera, 'perdarahan')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="perdarahan">perdarahan</label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>e. Kaku Kuduk</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $kk1 = 'ya';
                                                            if ($kk1 == $pengkajian_awal[0]->kaku_kuduk) {
                                                                echo '<input class="form-check-input" type="radio" name="kaku_kuduk" id="kaku_kuduk_ya" value="ya" checked>
                                                                <label for="kaku_kuduk_ya">ya</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="kaku_kuduk" id="kaku_kuduk_ya" value="ya">
                                                                <label for="kaku_kuduk_ya">ya</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $kk2 = 'tidak';
                                                            if ($kk2 == $pengkajian_awal[0]->kaku_kuduk) {
                                                                echo '<input class="form-check-input" type="radio" name="kaku_kuduk" id="kaku_kuduk_tidak" value="tidak" checked>
                                                                <label for="kaku_kuduk_tidak">tidak</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="kaku_kuduk" id="kaku_kuduk_tidak" value="tidak">
                                                                <label for="kaku_kuduk_tidak">tidak</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan[]" value="Gang. Komks. Verbal" id="Gang_Komks_Verbal" <?php if(str_contains($pengkajian_awal[0]->masalah_persyarafan, 'Gang. Komks. Verbal')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gang_Komks_Verbal">Gang. Komks. Verbal</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>f. Kelumpuhan</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $kl1 = 'ya';
                                                            if ($kl1 == $pengkajian_awal[0]->kelumpuhan) {
                                                                echo '<input class="form-check-input" type="radio" name="kelumpuhan" id="kelumpuhan_ya" value="ya" checked>
                                                                <label for="kelumpuhan_ya">ya</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="kelumpuhan" id="kelumpuhan_ya" value="ya">
                                                                <label for="kelumpuhan_ya">ya</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $kl2 = 'tidak';
                                                            if ($kl2 == $pengkajian_awal[0]->kelumpuhan) {
                                                                echo '<input class="form-check-input" type="radio" name="kelumpuhan" id="kelumpuhan_tidak" value="tidak" checked>
                                                                <label for="kelumpuhan_tidak">tidak</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="kelumpuhan" id="kelumpuhan_tidak" value="tidak">
                                                                <label for="kelumpuhan_tidak">tidak</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan[]" value="Keterbt. mobilitas fisik" id="Keterbt_mobilitas" <?php if(str_contains($pengkajian_awal[0]->masalah_persyarafan, 'Keterbt. mobilitas fisik')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Keterbt_mobilitas">Keterbt. mobilitas fisik</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label>g. Gangguan Persepsi Sensorik</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $gp1 = 'ya';
                                                            if ($gp1 == $pengkajian_awal[0]->gangg_persepsi_sensorik) {
                                                                echo '<input class="form-check-input" type="radio" name="gangg_persepsi_sensorik" id="gangg_persepsi_sensorik_ya" value="ya" checked>
                                                                <label for="gangg_persepsi_sensorik_ya">ya</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="gangg_persepsi_sensorik" id="gangg_persepsi_sensorik_ya" value="ya">
                                                                <label for="gangg_persepsi_sensorik_ya">ya</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $gp2 = 'tidak';
                                                            if ($gp2 == $pengkajian_awal[0]->gangg_persepsi_sensorik) {
                                                                echo '<input class="form-check-input" type="radio" name="gangg_persepsi_sensorik" id="gangg_persepsi_sensorik_tidak" value="tidak" checked>
                                                                <label for="gangg_persepsi_sensorik_tidak">tidak</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="gangg_persepsi_sensorik" id="gangg_persepsi_sensorik_tidak" value="tidak">
                                                                <label for="gangg_persepsi_sensorik_tidak">tidak</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_persyarafan[]" value="Gangg. Persepsi Sensorik" id="Gangg_Persepsi" <?php if(str_contains($pengkajian_awal[0]->masalah_persyarafan, 'Gangg. Persepsi Sensorik')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gangg_Persepsi">Gangg. Persepsi Sensorik</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM EKSKRESI</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Keluhan</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Kencing menetes" id="Kencing_menetes" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Kencing menetes')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Kencing_menetes">Kencing menetes</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Anuri" id="Anuri" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Anuri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Anuri">Anuri</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Disuri" id="Disuri" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Disuri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Disuri">Disuri</label>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi[]" value="Perub. pola eliminasi" id="Perub_pola" <?php if(str_contains($pengkajian_awal[0]->masalah_ekskresi, 'Perub. pola eliminasi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Perub_pola">Perub. pola eliminasi</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Oliguria" id="Oliguria" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Oliguria')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Oliguria">Oliguria</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Poliuria" id="Poliuria" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Poliuria')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Poliuria">Poliuria</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi[]" value="Incontinensia uri/alvi" id="Incontinensia" <?php if(str_contains($pengkajian_awal[0]->masalah_ekskresi, 'Incontinensia uri/alvi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Incontinensia">Incontinensia uri/alvi</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Retensi uri" id="Retensi" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Retensi uri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Retensi">Retensi uri</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Gross Hematuria" id="Gross_Hematuria" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Gross Hematuria')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gross_Hematuria">Gross Hematuria</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi[]" value="Pola BAB/BAK" id="pola_bab" <?php if(str_contains($pengkajian_awal[0]->masalah_ekskresi, 'Pola BAB/BAK')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="pola_bab">Pola BAB/BAK</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Nokturia" id="Nokturia" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Nokturia')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Nokturia">Nokturia</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Incontinensia uri" id="Incontinensia_uri" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Incontinensia uri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Incontinensia_uri">Incontinensia uri</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi[]" value="Resiko Retensio uri" id="Resiko_Retensio" <?php if(str_contains($pengkajian_awal[0]->masalah_ekskresi, 'Resiko Retensio uri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Resiko_Retensio">Resiko Retensio uri</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Kateter" id="Kateter" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Kateter')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Kateter">Kateter</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="keluhan_sistem_ekskresi[]" value="Cystostomi" id="Cystostotomi" <?php if(str_contains($pengkajian_awal[0]->keluhan_sistem_ekskresi, 'Cystostomi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Cystostotomi">Cystostotomi</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi[]" value="Resiko infeksi" id="Resiko_infeksi" <?php if(str_contains($pengkajian_awal[0]->masalah_ekskresi, 'Resiko infeksi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Resiko_infeksi">Resiko infeksi</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="produksi_urin">b. Produksi Urin</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="produksi_urin" readonly="readonly" class="form-control input-border-bottom" name="produksi_urin" value="<?php echo $pengkajian_awal[0]->produksi_urin; ?>" aria-label="cc/hr"><span class="input-group-text">cc/hr</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="bak">BAK : </label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="bak" readonly="readonly" class="form-control input-border-bottom" name="bak" value="<?php echo $pengkajian_awal[0]->bak; ?>" aria-label="x/hr"><span class="input-group-text">x/hr</span>
                                                        </div>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_ekskresi[]" value="Nyeri" id="Nyeri_ekskresi" <?php if(str_contains($pengkajian_awal[0]->masalah_ekskresi, 'Nyeri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Nyeri_ekskresi">Nyeri</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label for="produksi_urin">c. Warna</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="warna_urin" readonly="readonly" class="form-control input-border-bottom" name="warna_urin" value="<?php echo $pengkajian_awal[0]->warna_urin; ?>">
                                                    </td>
                                                    <td>
                                                        <label for="bau_urin">Bau : </label>
                                                    </td>
                                                    <td>
                                                            <input type="text" id="bau_urin" readonly="readonly" class="form-control input-border-bottom" name="bau_urin" value="<?php echo $pengkajian_awal[0]->bau_urin; ?>">
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM PENCERNAAN</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Mulut</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="mulut[]" value="Nyeri telan" id="Nyeri_telan" <?php if(str_contains($pengkajian_awal[0]->mulut, 'Nyeri telan')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Nyeri_telan">Nyeri telan</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="mulut[]" value="Nyeri rongga mulut" id="Nyeri_rongga_mulut" <?php if(str_contains($pengkajian_awal[0]->mulut, 'Nyeri rongga mulut')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Nyeri_rongga_mulut">Nyeri rongga mulut</label>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pencernaan[]" value="Gangguan menelan" id="Gangguan_menelan" <?php if(str_contains($pengkajian_awal[0]->masalah_pencernaan, 'Gangguan menelan')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gangguan_menelan">Gangguan menelan</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. Abdomen</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="abdomen[]" value="Nyeri tekan" id="Nyeri_tekan" <?php if(str_contains($pengkajian_awal[0]->abdomen, 'Nyeri tekan')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Nyeri_tekan">Nyeri tekan</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="abdomen[]" value="Distensi" id="Distensi" <?php if(str_contains($pengkajian_awal[0]->abdomen, 'Distensi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Distensi">Distensi</label>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pencernaan[]" value="Diare" id="Diare" <?php if(str_contains($pengkajian_awal[0]->masalah_pencernaan, 'Diare')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Diare">Diare</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="abdomen[]" value="Ascites" id="Ascites" <?php if(str_contains($pengkajian_awal[0]->abdomen, 'Ascites')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Ascites">Ascites</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="abdomen[]" value="Pembengkakan" id="Pembengkakan" <?php if(str_contains($pengkajian_awal[0]->abdomen, 'Pembengkakan')) echo 'checked' ?>>
                                                            <label class="form-check-label" for="Pembengkakan">Pembengkakan</label>
                                                            <input type="text" class="form-control input-border-bottom" readonly="readonly" name="abdomen_tambahan" value="<?php echo $pengkajian_awal[0]->abdomen_tambahan; ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pencernaan[]" value="Kekurangan/kelebihan cairan" id="Ke_cairan" <?php if(str_contains($pengkajian_awal[0]->masalah_pencernaan, 'Kekurangan/kelebihan cairan')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Ke_cairan">Kekurangan/kelebihan cairan</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="bab">c. BAB</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="bab" readonly="readonly" class="form-control input-border-bottom" name="bab" value="<?php echo $pengkajian_awal[0]->bab; ?>" aria-label="x/hr"><span class="input-group-text">x/hr</span>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pencernaan[]" value="Kekurangan/kelebihan nutrisi" id="Ke_nutrisi" <?php if(str_contains($pengkajian_awal[0]->masalah_pencernaan, 'Kekurangan/kelebihan nutrisi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Ke_nutrisi">Kekurangan/kelebihan nutrisi</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Konsistensi</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="konsistensi_bab[]" value="Keras" id="Keras" <?php if(str_contains($pengkajian_awal[0]->konsistensi_bab, 'Keras')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Keras">Keras</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="konsistensi_bab[]" value="Lunak" id="Lunak" <?php if(str_contains($pengkajian_awal[0]->konsistensi_bab, 'Lunak')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Lunak">Lunak</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="konsistensi_bab[]" value="Cair" id="Cair" <?php if(str_contains($pengkajian_awal[0]->konsistensi_bab, 'Lunak')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Cair">Cair</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="konsistensi_bab[]" value="Darah" id="Darah" <?php if(str_contains($pengkajian_awal[0]->konsistensi_bab, 'Darah')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Darah">Darah</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="konsistensi_bab[]" value="Hitam" id="Hitam" <?php if(str_contains($pengkajian_awal[0]->konsistensi_bab, 'Hitam')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Hitam">Hitam</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_pencernaan[]" value="Resiko keganasan" id="Resiko_keganasan" <?php if(str_contains($pengkajian_awal[0]->masalah_pencernaan, 'Resiko keganasan')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Resiko_keganasan">Resiko keganasan</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>d. Diet</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="diet[]" value="Padat" id="Padat" <?php if(str_contains($pengkajian_awal[0]->diet, 'Padat')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Padat">Padat</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="diet[]" value="Lunak" id="Lunak_d" <?php if(str_contains($pengkajian_awal[0]->diet, 'Lunak')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Lunak_d">Lunak</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="diet[]" value="Cair" id="Cair_d" <?php if(str_contains($pengkajian_awal[0]->diet, 'Cair')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Cair_d">Cair</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label for="frekuensi_diet">Frekuensi</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="frekuensi_diet" readonly="readonly" class="form-control input-border-bottom" name="frekuensi_diet" value="<?php echo $pengkajian_awal[0]->frekuensi_diet; ?>" aria-label="x/hr"><span class="input-group-text">x/hr</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label for="jml_frekuensi_diet">Jumlah</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" id="jml_frekuensi_diet" readonly="readonly" class="form-control input-border-bottom" name="jml_frekuensi_diet" value="<?php echo $pengkajian_awal[0]->jml_frekuensi_diet; ?>" aria-label="Kal."><span class="input-group-text">Kal.</span>
                                                        </div>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM MUSKULOSKELETAL (tulang-otot-integumen)</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Pergerakan sendi</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $ps1 = 'bebas';
                                                            if ($ps1 == $pengkajian_awal[0]->pergerak_sendi) {
                                                                echo '<input class="form-check-input" type="radio" name="pergerak_sendi" id="bebas" value="bebas" checked>
                                                                <label for="bebas">bebas</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="pergerak_sendi" id="bebas" value="bebas">
                                                                <label for="bebas">bebas</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $ps2 = 'terbatas';
                                                            if ($ps2 == $pengkajian_awal[0]->pergerak_sendi) {
                                                                echo '<input class="form-check-input" type="radio" name="pergerak_sendi" id="terbatas" value="terbatas" checked>
                                                                <label for="terbatas">terbatas</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="pergerak_sendi" id="terbatas" value="terbatas">
                                                                <label for="terbatas">terbatas</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_muskuloskeletal[]" value="Gangguan mobilitas" id="Gangguan_mobilitas" <?php if(str_contains($pengkajian_awal[0]->masalah_muskuloskeletal, 'Gangguan mobilitas')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gangguan_mobilitas">Gangguan mobilitas</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. akral</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="akral[]" value="Hangat" id="Hangat" <?php if(str_contains($pengkajian_awal[0]->akral, 'Hangat')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Hangat">Hangat</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="akral[]" value="Panas" id="Panas" <?php if(str_contains($pengkajian_awal[0]->akral, 'Panas')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Panas">Panas</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="akral[]" value="Dingin" id="Dingin" <?php if(str_contains($pengkajian_awal[0]->akral, 'Dingin')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Dingin">Dingin</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_muskuloskeletal[]" value="Gangguan integritas kulit" id="Gangguan_integritas_kulit" <?php if(str_contains($pengkajian_awal[0]->masalah_muskuloskeletal, 'Gangguan integritas kulit')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gangguan_integritas_kulit">Gangguan integritas kulit</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="patah">c. Patah tulang di</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="patah" readonly="readonly" class="form-control input-border-bottom" name="patah_tulang" value="<?php echo $pengkajian_awal[0]->patah_tulang; ?>">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_muskuloskeletal[]" value="Gangguan citra tubuh" id="Gangguan_citra_tubuh" <?php if(str_contains($pengkajian_awal[0]->masalah_muskuloskeletal, 'Gangguan citra tubuh')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gangguan_citra_tubuh">Gangguan citra tubuh</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="eks">d. Eksternal Fiksasi di</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="eks" readonly="readonly" class="form-control input-border-bottom" name="eks_fiksasi[]" value="<?php echo $pengkajian_awal[0]->eks_fiksasi; ?>">
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_muskuloskeletal[]" value="Kurangnya perawatan diri" id="perawatan_diri" <?php if(str_contains($pengkajian_awal[0]->masalah_muskuloskeletal, 'Kurangnya perawatan diri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="perawatan_diri">Kurangnya perawatan diri</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="eks_fiksasi[]" value="Peradangan" id="Peradangan" <?php if(str_contains($pengkajian_awal[0]->eks_fiksasi, 'Peradangan')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Peradangan">Peradangan</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="eks_fiksasi[]" value="luka" id="luka" <?php if(str_contains($pengkajian_awal[0]->eks_fiksasi, 'luka')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="luka">luka</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="luka" readonly="readonly" class="form-control input-border-bottom" name="eks_fiksasi_tambahan" value="<?php echo $pengkajian_awal[0]->eks_fiksasi_tambahan; ?>">
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_muskuloskeletal[]" value="Nyeri" id="Nyeri_m" <?php if(str_contains($pengkajian_awal[0]->masalah_muskuloskeletal, 'Nyeri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Nyeri_m">Nyeri</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="eks_fiksasi[]" value="deformitas" id="deformitas" <?php if(str_contains($pengkajian_awal[0]->eks_fiksasi, 'deformitas')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="deformitas">deformitas</label>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="eks_fiksasi[]" value="nyeri" id="nyeri_e" <?php if(str_contains($pengkajian_awal[0]->eks_fiksasi, 'nyeri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="nyeri_e">nyeri</label>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="nyeri_e" readonly="readonly" class="form-control input-border-bottom" name="eks_fiksasi_tambahan" value="<?php echo $pengkajian_awal[0]->eks_fiksasi_tambahan; ?>">
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <div class="input-group">
                                                            <input type="checkbox" class="form-check-input form-check-primary form-check-glow">
                                                            <input type="text" readonly="readonly" class="form-control input-border-bottom" name="masalah_muskuloskeletal_tambahan" value="<?php echo $pengkajian_awal[0]->masalah_muskuloskeletal_tambahan; ?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>e. Kekuatan otot</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $ko1 = 'kuat';
                                                            if ($ko1 == $pengkajian_awal[0]->kekuatan_otot) {
                                                                echo '<input class="form-check-input" type="radio" name="kekuatan_otot" id="kuat" value="kuat" checked>
                                                                <label for="kuat">kuat</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="kekuatan_otot" id="kuat" value="kuat">
                                                                <label for="kuat">kuat</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $ko2 = 'lemah';
                                                            if ($ko2 == $pengkajian_awal[0]->kekuatan_otot) {
                                                                echo '<input class="form-check-input" type="radio" name="kekuatan_otot" id="lemah" value="lemah" checked>
                                                                <label for="lemah">lemah</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="kekuatan_otot" id="lemah" value="lemah">
                                                                <label for="lemah">lemah</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label>e. Turgor</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $tu1 = 'baik';
                                                            if ($tu1 == $pengkajian_awal[0]->turgor) {
                                                                echo '<input class="form-check-input" type="radio" name="turgor" id="baik" value="baik" checked>
                                                                <label for="baik">baik</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="turgor" id="baik" value="baik">
                                                                <label for="baik">baik</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $tu2 = 'buruk';
                                                            if ($tu2 == $pengkajian_awal[0]->turgor) {
                                                                echo '<input class="form-check-input" type="radio" name="turgor" id="buruk" value="buruk" checked>
                                                                <label for="buruk">buruk</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="turgor" id="buruk" value="buruk">
                                                                <label for="buruk">buruk</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>SISTEM REPRODUKSI</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Laki-laki</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="penis">: Penis</label>
                                                            <input type="text" id="penis" readonly="readonly" class="form-control input-border-bottom" name="penis" value="<?php echo $pengkajian_awal[0]->penis; ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="Scrotum">Scrotum</label>
                                                            <input type="text" id="Scrotum" readonly="readonly" class="form-control input-border-bottom" name="scrotum" value="<?php echo $pengkajian_awal[0]->scrotum; ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="Testis">Testis</label>
                                                            <input type="text" id="Testis" readonly="readonly" class="form-control input-border-bottom" name="testis" value="<?php echo $pengkajian_awal[0]->testis; ?>">
                                                        </div>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_reproduksi[]" value="Perubahan pola seksual" id="Perubahan_pola_seksual" <?php if(str_contains($pengkajian_awal[0]->masalah_reproduksi, 'Perubahan pola seksual')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Perubahan_pola_seksual">Perubahan pola seksual</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Perempuan</label>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="Vagina">: Vagina</label>
                                                            <input type="text" id="Vagina" readonly="readonly" class="form-control input-border-bottom" name="vagina" value="<?php echo $pengkajian_awal[0]->vagina; ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="Pendarahan">Pendarahan</label>
                                                            <input type="text" id="Pendarahan" readonly="readonly" class="form-control input-border-bottom" name="pendarahan" value="<?php echo $pengkajian_awal[0]->pendarahan; ?>">
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_reproduksi[]" value="Pendarahan" id="msl_Pendarahan" <?php if(str_contains($pengkajian_awal[0]->masalah_reproduksi, 'Pendarahan')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="msl_Pendarahan">Pendarahan</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <label for="Payudara">Payudara</label>
                                                            <input type="text" id="Payudara" readonly="readonly" class="form-control input-border-bottom" name="payudara" value="<?php echo $pengkajian_awal[0]->payudara; ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <label>Siklus Haid :</label>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $sh1 = 'Teratur';
                                                            $sh2 = 'Tidak teratur';
                                                            if ($sh1 == $pengkajian_awal[0]->siklus_haid) {
                                                                echo '<input class="form-check-input" type="radio" name="siklus_haid" id="Teratur" value="Teratur" checked>
                                                                <label for="Teratur">Teratur</label>
                                                                <input class="form-check-input" type="radio" name="siklus_haid" id="Tidak_Teratur" value="Tidak teratur">
                                                                <label for="Tidak_Teratur">Tidak Teratur</label>';
                                                            } elseif ($sh2 == $pengkajian_awal[0]->siklus_haid) {
                                                                echo '<input class="form-check-input" type="radio" name="siklus_haid" id="Teratur" value="Teratur">
                                                                <label for="Teratur">Teratur</label>
                                                                <input class="form-check-input" type="radio" name="siklus_haid" id="Tidak_Teratur" value="Tidak teratur" checked>
                                                                <label for="Tidak_Teratur">Tidak Teratur</label>';
                                                            } else {
                                                                echo '<input class="form-check-input" type="radio" name="siklus_haid" id="Teratur" value="Teratur">
                                                                <label for="Teratur">Teratur</label>
                                                                <input class="form-check-input" type="radio" name="siklus_haid" id="Tidak_Teratur" value="Tidak teratur">
                                                                <label for="Tidak_Teratur">Tidak Teratur</label>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_reproduksi[]" value="Gangguan Konsepsi" id="Gangguan_Konsepsi" <?php if(str_contains($pengkajian_awal[0]->masalah_reproduksi, 'Gangguan Konsepsi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gangguan_Konsepsi">Gangguan Konsepsi</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_reproduksi[]" value="Gangguan rasa nyaman" id="Gangguan_rasa_nyaman" <?php if(str_contains($pengkajian_awal[0]->masalah_reproduksi, 'Gangguan rasa nyaman')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gangguan_rasa_nyaman">Gangguan rasa nyaman</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <label><strong>DATA PSIKOLOGIS, SOSIOLOGIS, DAN SPIRITUAL</strong></label>
                                                    </td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>a. Psikologis</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="psikologis[]" value="takut" id="takut" <?php if(str_contains($pengkajian_awal[0]->psikologis, 'takut')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="takut">takut</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="psikologis[]" value="rendah diri" id="rendah_diri" <?php if(str_contains($pengkajian_awal[0]->psikologis, 'rendah diri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="rendah_diri">rendah diri</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_psikologis[]" value="Cemas" id="Cemas" <?php if(str_contains($pengkajian_awal[0]->masalah_psikologis, 'Cemas')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Cemas">Cemas</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="psikologis[]" value="sedih" id="sedih" <?php if(str_contains($pengkajian_awal[0]->psikologis, 'sedih')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="sedih">sedih</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="psikologis[]" value="marah" id="marah" <?php if(str_contains($pengkajian_awal[0]->psikologis, 'marah')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="marah">marah</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_psikologis[]" value="Gangguan interaksi sosial" id="Gangguan_interaksi_sosial" <?php if(str_contains($pengkajian_awal[0]->masalah_psikologis, 'Gangguan interaksi sosial')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Gangguan_interaksi_sosial">Gangguan interaksi sosial</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="psikologis[]" value="sedih" id="sedih" <?php if(str_contains($pengkajian_awal[0]->psikologis, 'sedih')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="sedih">sedih</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_psikologis[]" value="Menarik diri" id="msl_Menarik_diri" <?php if(str_contains($pengkajian_awal[0]->masalah_psikologis, 'Menarik diri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="msl_Menarik_diri">Menarik diri</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>b. Sosiologis</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="sosiologis[]" value="Menarik diri" id="Menarik_diri" <?php if(str_contains($pengkajian_awal[0]->sosiologis, 'Menarik diri')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Menarik_diri">Menarik diri</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="sosiologis[]" value="Komunikasi baik" id="Komunikasi_baik" <?php if(str_contains($pengkajian_awal[0]->sosiologis, 'Komunikasi baik')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Komunikasi_baik">Komunikasi baik</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start">
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="masalah_psikologis[]" value="Keterbatasan dalam inspirasi" id="Keterbatasan_dalam_inspirasi" <?php if(str_contains($pengkajian_awal[0]->masalah_psikologis, 'Keterbatasan dalam inspirasi')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Keterbatasan_dalam_inspirasi">Keterbatasan dalam inspirasi</label>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <label>c. Spiritual</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="spiritual[]" value="perlu dibantu" id="perlu_dibantu" <?php if(str_contains($pengkajian_awal[0]->spiritual, 'perlu dibantu')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="perlu_dibantu">perlu dibantu</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="spiritual[]" value="Lain-lain" id="Lain-lain" <?php if(str_contains($pengkajian_awal[0]->spiritual, 'Lain-lain')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Lain-lain">Lain-lain</label>
                                                    </td>
                                                    <td></td>
                                                    <td class="border-start"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <label><strong>HAMBATAN DIRI</strong></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label>Jika ada :</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri[]" value="Bahasa" id="Bahasa" <?php if(str_contains($pengkajian_awal[0]->hambatan_diri, 'Bahasa')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Bahasa">Bahasa</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri[]" value="Tuna rungu" id="Tuna_rungu" <?php if(str_contains($pengkajian_awal[0]->hambatan_diri, 'Tuna rungu')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Tuna_rungu">Tuna rungu</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri[]" value="Budaya" id="Budaya" <?php if(str_contains($pengkajian_awal[0]->hambatan_diri, 'Budaya')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Budaya">Budaya</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri[]" value="Tuna wicara" id="Tuna_wicara" <?php if(str_contains($pengkajian_awal[0]->hambatan_diri, 'Tuna wicara')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Tuna_wicara">Tuna wicara</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td></td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri[]" value="Cacat fisik" id="Cacat_fisik" <?php if(str_contains($pengkajian_awal[0]->hambatan_diri, 'Cacat fisik')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Cacat_fisik">Cacat fisik</label>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="hambatan_diri[]" value="Tuna netra" id="Tuna_netra" <?php if(str_contains($pengkajian_awal[0]->hambatan_diri, 'Tuna netra')) echo 'checked' ?>>
                                                        <label class="form-check-label" for="Tuna_netra">Tuna netra</label>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <label for="data_penunjang"><strong>DATA PEMERIKSAAN PENUNJANG / LABORATORIUM YANG PENTING</strong></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <?php echo $pengkajian_awal[0]->data_penunjang; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="p-3">
                                <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Data Rekam Medis Pengkajian awal end -->
    </div>