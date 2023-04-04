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
                            <div class="row me-4 mt-1">
                                <div class="col-md-12 col-12 text-end">
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
                                <?php echo form_open_multipart("pemeriksaan_odontogram/create")?>
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
                                                    <input type="hidden" class="form-control" name="user_id" required="required" value="<?php echo $user[0]->user_id; ?>">
                                                    <input type="hidden" class="form-control" name="pasien_id" required="required" value="<?php echo $pasien[0]->pasien_id; ?>">
                                                    <input type="hidden" class="form-control" name="dokter_id" required="required" value="<?php echo $dokter[0]->dokter_id; ?>">
                                                    <input type="hidden" class="form-control" name="jns_key_id" required="required" value="<?php echo $jns_key[0]->jns_key_id; ?>">
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
                                                            <textarea class="form-control" name="odontogram_11_51" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_61_21" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_12_52" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_62_22" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_13_53" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_63_23" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_14_54" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_64_24" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_15_55" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_65_25" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_16" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_26" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_17" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_27" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_18" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_28" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_48" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_38" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_47" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_37" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_46" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_36" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_45_85" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_75_35" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_44_84" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_74_34" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_43_83" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_73_33" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_42_82" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_72_32" rows="1"></textarea>
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
                                                            <textarea class="form-control" name="odontogram_41_81" rows="1"></textarea>
                                                        </div>
                                                    </td>
                                                    <td class="border-end">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="odontogram_71_31" rows="1"></textarea>
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
                                                    <textarea class="form-control" id="ket" name="keterangan_tambahan" rows="5"></textarea>
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
                                                    <div class="input-group">
                                                        <input type="text" id="jml_p" class="form-control input-border-bottom" name="jumlah_photo_diambil" aria-label="x/mnt"><span class="input-group-text">(Dental/PA/OPG/ceph)</span>
                                                    </div>
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
                                                    <div class="input-group">
                                                        <input type="text" id="jml_rp" class="form-control input-border-bottom" name="jumlah_rongten_photo_diambil" aria-label="x/mnt"><span class="input-group-text">(Dental/PA/OPG/ceph)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row p-3 justify-content-center border-start border-top border-bottom border-end">
                                            <div class="col-4 text-center"><strong>Deperiksa Oleh :</strong><br><br> 
                                                <select class="form-select" name="dokter_id">
                                                    <option selected>- Pilih dokter - </option>
                                                    <?php
                                                        foreach($dokter as $d){
                                                            if($pemeriksaan_odontogram[0]->dokter_id == $d->dokter_id){
                                                                echo '<option value="'.$d->dokter_id.'">'.$d->nama_dokter.'</option>';
                                                            }else{
                                                                echo '<option value="'.$d->dokter_id.'">'.$d->nama_dokter.'</option>';
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-4 text-center"><strong>Tanggal Pemeriksaan :</strong><br><br> <?php echo indonesiaDate($pasien[0]->tgl_daftar); ?></div>
                                            <div class="col-4 text-center"><strong>Tanda tangan pemeriksa :</strong></div>
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
        <!-- Data Pemeriksaan Odontogram end -->
    </div>