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
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard');?>"> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo site_url('pemeriksaan_odontogram');?>"> Rekam Medis Pemeriksaan Odontogram</a></li>
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
        } 
        ?>
    </div>

    <!-- Page content -->
    <div class="page-content">
        <!-- Data Pemeriksaan Odontogram start -->
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
                            <div class="row mt-1 me-2">
                                <div class="col-md-12 col-12 d-flex justify-content-end">
                                    <?php $target = array('target' => '_blank'); echo form_open('pemeriksaan_odontogram/print/'.$pemeriksaan_odontogram[0]->pemeriksaan_odontogram_id, $target); ?>
                                        <?php echo csrf();?>
                                        <input type="hidden" class="form-control" id="jns_key_id" placeholder="kunci..." name="jns_key_id" value="<?php echo $pemeriksaan_odontogram[0]->jns_key_id; ?>">
                                        <button type="submit" class="btn btn-secondary btn-sm me-2"><i class="bi bi-printer"></i> Cetak</button>
                                    <?php echo form_close(); ?>
                                    <a href="<?php echo site_url('pemeriksaan_odontogram')?>" class="btn btn-warning btn-sm" title="Kembali ke halaman sebelumya"><i class="bi bi-arrow-left"></i> kembali</a>
                                </div>
                            </div>
                            <div class="card-title">
                                <div class="row p-3">
                                    <div class="col-md-12 col-12 text-center">
                                        <h4>FORMULIR PEMRIKSAAN ODONTOGRAM</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                    <form class="form">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    Nama Lengkap
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                <?php echo csrf();?>
                                                    <input type="hidden" class="form-control" name="pemeriksaan_odontogram_id" required="required" value="<?php echo $pemeriksaan_odontogram[0]->pemeriksaan_odontogram_id; ?>">
                                                    <input type="hidden" class="form-control" name="pasien_id" required="required" value="<?php echo $pasien[0]->pasien_id; ?>">
                                                    <input type="hidden" class="form-control" name="dokter_id" required="required" value="<?php echo $dokter[0]->dokter_id; ?>">
                                                    : <?php echo $pasien[0]->nama_pasien; ?>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    Jenis Kelamin
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                : <?php echo $pasien[0]->jenis_kelamin; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    NIK/No. KTP
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                : <?php echo $nik_pasien; ?>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    TTL
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                : <?php echo $pasien[0]->tempat_lahir; ?>, <?php echo indonesiaDate($pasien[0]->tgl_lahir_pasien); ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-4 table-responsive">
                                            <table cellpadding="5" class="table-borderless border-start border-end border-top border-bottom text-center">
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            11 [51]
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_11_51; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_61_21; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            [61] 21
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            12 [52]
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_12_52; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_62_22; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            [62] 22
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            13 [53]
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_13_53; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_63_23; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            [63] 23
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            14 [54]
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_14_54; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_64_24; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            [64] 24
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            15 [55]
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_15_55; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_65_25; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            [65] 25
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            16
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_16; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_26; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            26
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            17
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_17; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_27; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            27
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            18
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_18; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_28; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            28
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="row mt-4 text-center">
                                            <div class="col-12">
                                                <img src="<?php echo base_url();?>assets/core-images/odontogram.svg" alt="Gambar Odontogram">
                                            </div>
                                        </div>

                                        <div class="row mt-4 table-responsive">
                                            <table cellpadding="5" class="table-borderless border-start border-end border-top border-bottom text-center">
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            48
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_48; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_38; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            38
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            47
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_47; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_37; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            37
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            46
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_46; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_36; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            36
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            45 [85]
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_45_85; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_75_35; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            [75] 35
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            44 [84]
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_44_84; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_74_34; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            [74] 34
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            43 [83]
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_43_83; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_73_33; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            [73] 33
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            42 [82]
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_42_82; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_72_32; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            [72] 32
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="border-bottom">
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            41 [81]
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <?php echo $pemeriksaan_odontogram[0]->odontogram_41_81; ?>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <?php echo $pemeriksaan_odontogram[0]->odontogram_71_31; ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            [71] 31
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="ket">Keterangan tambahan (occlusi, Torus, Crowding, dll) :</label>
                                                </div>
                                                <div class="form-group">
                                                    <?php echo $pemeriksaan_odontogram[0]->keterangan_tambahan; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="jml_p">Jumlah photo yang diambil</label> 
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="form-group">
                                                    <?php echo $pemeriksaan_odontogram[0]->jumlah_photo_diambil; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label for="jml_rp">Jumlah rongten photo yang diambil</label> 
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="form-group">
                                                    <?php echo $pemeriksaan_odontogram[0]->jumlah_rongten_photo_diambil; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-3 justify-content-center border-start border-top border-bottom border-end">
                                            <div class="col-4 text-center"><strong>Deperiksa Oleh :</strong><br><br>
                                                    <?php
                                                        foreach ($dokter as $do) {
                                                            if ($pemeriksaan_odontogram[0]->dokter_id == $do->dokter_id) {
                                                                echo "$do->nama_dokter";
                                                            }
                                                        }
                                                    ?> 
                                            </div>
                                            <div class="col-4 text-center"><strong>Tanggal Pemeriksaan :</strong><br><br> <?php echo indonesiaDate($pasien[0]->tgl_daftar); ?></div>
                                            <div class="col-4 text-center"><strong>Tanda tangan pemeriksa :</strong> <br><br>
                                                <?php foreach ($dokter as $do) {} ?> 
                                                    <img src="<?php echo base_url();?>upload/ttd/<?php echo $do->ttd_dokter;?>" height="60" alt="Preview ttd dokter" name="ttd_dokter">
                                            </div>
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
        <!-- Data Pemeriksaan Odontogram end -->
    </div>