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
                        <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard/index'); ?>"> Dashboard</a></li>
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
        <!-- Data Poliklinik start -->
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
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" title="Tambah data" data-bs-target="#FormTambah"><i class="fas fa-plus"></i> Tambah</button>
                        <a href="<?php echo site_url('poliklinik')?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>
                            <!-- Modal Tambah Poliklinik -->
                            <div class="modal fade text-start" id="FormTambah" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h4 class="modal-title" id="myModalLabel33">Form Tambah Poliklinik</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <?php echo form_open("poliklinik/create")?>
                                        <form>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="nama_poliklinik">Nama Poliklinik </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                        <?php echo csrf();?>
                                                            <input type="text" placeholder="Conth. Poli Anak"
                                                                class="form-control" id="nama_poliklinik" name="nama_poliklinik" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="gedung">Gedung </label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="gedung" name="gedung" required="required">
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
                    <div class="row p-4" id="table-hover-row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Poliklinik</th>
                                            <th>Gedung</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($poliklinik) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($poliklinik as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $key->nama_poliklinik; ?></td>
                                                    <td><?php echo $key->gedung; ?></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Lihat data" data-bs-target="#FormDetail<?php echo $key->poliklinik_id;?>"><i class="bi bi-eye"></i> Detail</button>
                                                                </li>
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormUbah<?php echo $key->poliklinik_id;?>"><i class="bi bi-pencil-square"></i> Ubah</button>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open("poliklinik/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item" title="Hapus data"><i class="bi bi-x-lg"></i> Hapus</button>
                                                                    <input type="hidden" class="form-control" name="poliklinik_id" required="required" value="<?php echo $key->poliklinik_id; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail Poliklinik -->
                                                <div class="modal fade text-start" id="FormDetail<?php echo $key->poliklinik_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Detail Poliklinik</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>Nama Poliklinik </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <?php echo csrf();?>
                                                                                <label>: <?php echo $key->nama_poliklinik;?></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label>Gedung</label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <label>: <?php echo $key->gedung;?></label>
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

                                                <!-- Modal Ubah Poliklinik -->
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->poliklinik_id;?>" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Ubah Poliklinik</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open("poliklinik/update")?>
                                                            <form>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="nama_poliklinik">Nama Poliklinik </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                            <?php echo csrf();?>
                                                                                <input type="hidden" class="form-control" name="poliklinik_id" value="<?php echo $key->poliklinik_id;?>" required>
                                                                                <input type="text" placeholder="Conth. Poli Anak" class="form-control" id="nama_poliklinik" name="nama_poliklinik" value="<?php echo $key->nama_poliklinik;?>" required="required">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3">
                                                                            <label for="gedung">Gedung </label>
                                                                        </div>
                                                                        <div class="col-9">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="gedung" name="gedung" value="<?php echo $key->gedung;?>" required="required">
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
                                                    <td colspan="4">Tidak ada data ditemukan</td>
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
        <!-- Data Poliklinik end -->
    </div>