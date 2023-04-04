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
        <!-- Data Dokter start -->
        <section class="section">
            <div class="card">
                <!-- Data dokter header -->
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
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#FormTambah"><i class="fas fa-plus"></i> Tambah</button>
                            <a href="<?php echo site_url('dokter')?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>

                            <!-- Modal Tambah Dokter -->
                            <div class="modal fade text-start" id="FormTambah" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h4 class="modal-title" id="myModalLabel33">Form Tambah Dokter</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <?php echo form_open_multipart("dokter/create")?>
                                        <form>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="nama_dokter">Nama Dokter</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                        <?php echo csrf();?>
                                                            <input type="text" placeholder="Cnth. dr. John"
                                                                class="form-control" id="nama_dokter" name="nama_dokter" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="spesialis">Spesialis</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="text" placeholder="Cnth. Umum"
                                                                class="form-control" id="spesialis" name="spesialis" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="jenis_kelamin">Jenis Kelamin </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" checked>
                                                                    <label for="Laki-laki">Laki-laki</label>
                                                                </div>
                                                                <div class="col">
                                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan">
                                                                    <label for="Perempuan">Perempuan</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="ttd">tanda tangan</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="file" class="form-control" placeholder="Ttd Dokter" name="ttd_dokter" accept=".jpg, .jpeg, .png, .svg">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary ml-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block"><i class="bi bi-save2"></i> Simpan</span>
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block"><i class="bi bi-x-square"></i> Reset</span>
                                                </button>
                                            </div>
                                        </form>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- data tabel -->
                    <div class="row p-4">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Dokter</th>
                                            <th>Spesialis</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($dokter) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($dokter as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $key->nama_dokter; ?></td>
                                                    <td><?php echo $key->spesialis; ?></td>
                                                    <td><?php echo $key->jenis_kelamin; ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Lihat data" data-bs-target="#FormDetail<?php echo $key->dokter_id;?>"><i class="bi bi-eye"></i> Detail</button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormUbah<?php echo $key->dokter_id;?>"><i class="bi bi-pencil-square"></i> Ubah</button>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open_multipart("dokter/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item" title="Hapus data"><i class="bi bi-x-lg"></i> Hapus</button>
                                                                    <input type="hidden" class="form-control" name="dokter_id" required="required" value="<?php echo $key->dokter_id; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail Dokter -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->dokter_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Detail Dokter</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>Nama Dokter </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <?php echo csrf();?>
                                                                                <label>: <?php echo $key->nama_dokter;?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>Spesialis </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <label>: <?php echo $key->spesialis;?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>Jenis Kelamin </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <label>: <?php echo $key->jenis_kelamin;?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>tanda tangan</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            : <img src="<?php echo base_url();?>upload/ttd/<?php echo $key->ttd_dokter;?>" height="40" alt="Preview ttd dokter" name="ttd_dokter">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block"><i class="bi bi-x-circle"></i> Tutup</span>
                                                                    </button>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Ubah Dokter -->
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->dokter_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Ubah Dokter</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open_multipart("dokter/update")?>
                                                            <form>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="nama_dokter">Nama Dokter </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                            <?php echo csrf();?>
                                                                                <input type="hidden" class="form-control" name="dokter_id" value="<?php echo $key->dokter_id;?>" required>
                                                                                <input type="text" placeholder="Cnth. dr. John"
                                                                                    class="form-control" id="nama_dokter" name="nama_dokter" value="<?php echo $key->nama_dokter;?>" required="required">
                                                                                    <input type="hidden" class="form-control" name="ttd_dokter_old" required="required" value="<?php echo $key->ttd_dokter;?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="spesialis">Spesialis </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <input type="text" placeholder="Cnth. Umum"
                                                                                    class="form-control" id="spesialis" name="spesialis" value="<?php echo $key->spesialis;?>" required="required">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="jenis_kelamin">Jenis Kelamin </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <?php
                                                                                            $l='Laki-laki';
                                                                                                if($l == $key->jenis_kelamin){
                                                                                                    echo '<input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" checked>
                                                                                                    <label for="Laki-laki">Laki-laki</label>';
                                                                                                }else{
                                                                                                    echo '<input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki">
                                                                                                    <label for="Laki-laki">Laki-laki</label>';
                                                                                                }
                                                                                            
                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <?php
                                                                                            $p='Perempuan';
                                                                                                if($p == $key->jenis_kelamin){
                                                                                                    echo '<input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan" checked>
                                                                                                    <label for="Perempuan">Perempuan</label>';
                                                                                                }else{
                                                                                                    echo '<input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan">
                                                                                                    <label for="Perempuan">Perempuan</label>';
                                                                                                }
                                                                                            
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="ttd">tanda tangan</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <input type="file" class="form-control" placeholder="Ttd Dokter" name="ttd_dokter" accept=".jpg, .jpeg, .png, .svg">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="ttd">Preview</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <img src="<?php echo base_url();?>upload/ttd/<?php echo $key->ttd_dokter;?>" height="40" alt="Preview ttd dokter" name="ttd_dokter">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary ml-1">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block"><i class="bi bi-save2"></i> Simpan</span>
                                                                    </button>
                                                                    <button type="reset" class="btn btn-light-secondary">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block"><i class="bi bi-x-square"></i> Reset</span>
                                                                    </button>
                                                                </div>
                                                            </form>
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
                                                    <td colspan="5">Tidak ada data ditemukan</td>
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

                <div class="p-3">
                    <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                </div>
            </div>
    
        </section>
        <!-- Data Dokter end -->
    </div>