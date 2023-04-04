    <!-- Page content Header -->
    <div class="page-heading">
        <div class="row">
            <!-- Page Title -->
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Rekam Medis Riwayat Kunjungan Pasien</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('pengkajian_awal');?>"> Rekam Medis Riwayat Kunjungan Pasien</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
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
        <!-- Data Rekam Medis Riwayat Kunjungan Pasien start -->
        <section class="section">
            <div class="row">
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
                            <div class="row me-4 mt-1">
                                <div class="col-md-12 col-12 text-end">
                                    <a href="<?php echo site_url('riwayat_kunjungan_pasien')?>" class="btn btn-warning btn-sm" title="Kembali ke halaman sebelumya"><i class="bi bi-arrow-left"></i> kembali</a>
                                </div>
                            </div>
                            <div class="card-title">
                                <div class="row p-3">
                                    <div class="col-md-12 col-12 text-center">
                                        <h4>RIWAYAT KUNJUNGAN PASIEN</h4>
                                    </div>
                                    <div class="col-md-9 col-12"></div>
                                    <div class="col-md-3 col-12 border text-center">
                                        <h6>NO. REKAM MEDIS : <?php echo $pasien[0]->no_rekam_medis; ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php echo form_open_multipart("riwayat_kunjungan_pasien/create")?>
                                    <form class="form">
                                        <div class="row table-responsive">
                                            <table cellpadding="5" class="table-borderless border-start border-end border-top border-bottom">
                                                <tr class="border-bottom">
                                                    <td>
                                                        <div class="form-group">
                                                            Nama Lengkap
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                        <?php echo csrf();?>
                                                        <input type="hidden" class="form-control" name="user_id" required="required" value="<?php echo $user[0]->user_id; ?>">
                                                        <input type="hidden" class="form-control" name="pasien_id" required="required" value="<?php echo $pasien[0]->pasien_id; ?>">
                                                        <input type="hidden" class="form-control" name="poliklinik_id" required="required" value="<?php echo $poliklinik[0]->poliklinik_id; ?>">
                                                        <input type="hidden" class="form-control" name="jns_key_id" required="required" value="<?php echo $jns_key[0]->jns_key_id; ?>">
                                                        : <?php echo $pasien[0]->nama_pasien; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <div class="form-group">
                                                            Tanggal Lahir
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">: <?php echo $pasien[0]->tgl_lahir_pasien; ?></div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <div class="form-group">
                                                            Jenis Kelamin
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">: <?php echo $pasien[0]->jenis_kelamin; ?></div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <div class="form-group">
                                                            Status Pasien
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">:
                                                            <?php
                                                            foreach ($status_pasien as $sp) {
                                                                if ($pasien[0]->status_pasien_id == $sp->status_pasien_id) {
                                                                    echo "$sp->nama_status_pasien";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <div class="form-group">
                                                            No. BPJS / KTP
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">: <?php echo $pasien[0]->no_bpjs_pasien; ?> / <?php echo $nik_pasien; ?></div>
                                                    </td>
                                                    <td class="border-start">
                                                        <div class="form-group">
                                                            DW
                                                        </div>
                                                    </td>
                                                    <td class="border-start">
                                                        <div class="form-group"><?php echo $pasien[0]->dw; ?></div>
                                                    </td>
                                                    <td class="border-start">
                                                        <div class="form-group">
                                                            LW
                                                        </div>
                                                    </td>
                                                    <td class="border-start">
                                                        <div class="form-group"><?php echo $pasien[0]->lw; ?></div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td>
                                                        <div class="form-group">
                                                            Jenis Kepesertaan
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">:
                                                            <?php
                                                            foreach ($kepesertaan_pasien as $kp) {
                                                                if ($pasien[0]->kepesertaan_pasien_id == $kp->kepesertaan_pasien_id) {
                                                                    echo "$kp->nama_kepesertaan_pasien";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                        <div class="row mt-4 table-responsive">
                                            <table cellpadding="5" class="table-borderless border-start border-end border-top border-bottom text-center">
                                                <tr class="border-bottom">
                                                    <td class="border-end"><strong>Tanggal Kunjungan</strong></td>
                                                    <td class="border-end"><strong>Poli yang dikunjungi</strong></td>
                                                    <td class="border-end"><strong>Subjektif <br>(Anamnesis)</strong></td>
                                                    <td class="border-end"><strong>Objektif <br>(Pemeriksaan Fisik)</strong></td>
                                                    <td class="border-end"><strong>Assesment <br>(ICD X)</strong></td>
                                                    <td class="border-end"><strong>Planning <br> (Tindakan, terapi, instruksi)</strong></td>
                                                    <td><strong>Paraf</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="border-end">
                                                        <div class="form-group"><?php echo indonesiaDate($pasien[0]->tgl_daftar); ?></div>
                                                    </td>
                                                    <td class="border-end">
                                                        <fieldset class="form-group">
                                                            <select class="form-select" name="poliklinik_id">
                                                                <option selected>- Pilih Poliklinik - </option>
                                                                <?php
                                                                    foreach($poliklinik as $po){
                                                                        if($riwayat_kunjungan_pasien[0]->poliklinik_id == $po->poliklinik_id){
                                                                            echo '<option value="'.$po->poliklinik_id.'">'.$po->nama_poliklinik.'</option>';
                                                                        }else{
                                                                            echo '<option value="'.$po->poliklinik_id.'">'.$po->nama_poliklinik.'</option>';
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </fieldset>
                                                    </td>
                                                    <td class="border-end">
                                                        <textarea class="form-control" name="subjektif" placeholder="Ketikkan sesuatu atau beri tanda '-' jika tidak ada data" rows="12"></textarea>
                                                    </td>
                                                    <td class="border-end">
                                                        <textarea class="form-control" name="objektif" placeholder="Ketikkan sesuatu atau beri tanda '-' jika tidak ada data" rows="12"></textarea></td>
                                                    <td class="border-end">
                                                        <textarea class="form-control" name="assesment" placeholder="Ketikkan sesuatu atau beri tanda '-' jika tidak ada data" rows="12"></textarea></td>
                                                    <td class="border-end">
                                                        <textarea class="form-control" name="planning" placeholder="Ketikkan sesuatu atau beri tanda '-' jika tidak ada data" rows="12"></textarea>
                                                    </td>
                                                    <td>
                                                        <select class="form-select" name="dokter_id">
                                                            <option selected>- Pilih dokter - </option>
                                                            <?php
                                                                foreach($dokter as $d){
                                                                    if($riwayat_kunjungan_pasien[0]->dokter_id == $d->dokter_id){
                                                                        echo '<option value="'.$d->dokter_id.'">'.$d->nama_dokter.'</option>';
                                                                    }else{
                                                                        echo '<option value="'.$d->dokter_id.'">'.$d->nama_dokter.'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12 d-flex justify-content-end mt-2">
                                                <button type="submit" class="btn btn-primary btn-sm me-1 mb-1" title="tambah"><i class="bi bi-save2"></i> Simpan</button>
                                                <button type="reset" class="btn btn-light-secondary btn-sm me-1 mb-1" title="reset"><i class="bi bi-x-square"></i> Reset</button>    
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
        <!-- Data Rekam Medis Riwayat Kunjungan Pasien end -->
    </div>