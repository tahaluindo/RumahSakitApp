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
        <!-- Galeri Video start -->
        <section class="section">
            <div class="card">
                <div class="card-content">
                    <div class="row me-4 mt-4">
                        <div class="col-md-12 col-12 text-end">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" title="Tambah data" data-bs-target="#FormTambah"><i class="fas fa-plus"></i> Tambah
                            </button>
                            <a href="<?php echo site_url('gallery/data/video')?>" class="btn btn-success btn-sm" title="Refresh halaman"><i class="bi bi-arrow-clockwise"></i> refresh</a>
                        </div>
                            <!-- Modal Tambah Galeri -->
                            <div class="modal fade text-start" id="FormTambah" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <h4 class="modal-title" id="myModalLabel33">Form Tambah Galeri Video</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <?php echo form_open_multipart("gallery/create")?>
                                        <form>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="gallery_name">Judul video <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <?php echo csrf();?>
                                                            <input type="text" class="form-control" id="gallery_name" name="gallery_name">
                                                            <input type="hidden" class="form-control" name="gallery_type" required="required" value="<?php echo $this->uri->segment(3);?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="gallery_date">Tanggal Galeri <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" id="gallery_date" name="gallery_date" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="gallery_description">Deskripsi Galeri <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="3" name="gallery_description" placeholder="Deskripsi Galeri"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label for="gallery_url">Link Video (youtube) <span style="color:red">(Opsional)</span></label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="gallery_url" name="gallery_url">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label>File Video <span style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="file" class="form-control" placeholder="File Video" name="gallery_cover" accept=".mp4, .mpeg, .mkv, .avi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary ml-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Simpan</span>
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Reset</span>
                                                </button>
                                            </div>
                                        </form>
                                        <?php echo form_close(); ?>
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
                                            <th>Judul Video</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal</th>
                                            <th>Link Video</th>
                                            <th>File Video</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($gallery) {
                                            $nox = 1;
                                            $no = 1;
                                            foreach ($gallery as $key) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $key->gallery_name;?></td>
                                                    <td><?php echo $key->gallery_description;?></td>
                                                    <td><?php echo indonesiaDate($key->gallery_date);?></td>
                                                    <td><?php echo $key->gallery_url;?></td>
                                                    <td><a href="<?php echo base_url()."upload/gallery/video/".$key->gallery_cover;?>" target="_blank" ><?php echo $key->gallery_cover;?></a></td>
                                                    <td>
                                                        <div class="btn-group dropstart mb-1">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" title="Pilih Aksi" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="submit" class="dropdown-item" data-bs-toggle="modal" title="Ubah data" data-bs-target="#FormUbah<?php echo $key->gallery_id;?>"><i class="bi bi-pencil-square"></i> Ubah
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <?php echo form_open_multipart("gallery/delete") ?>
                                                                    <?php echo csrf(); ?>
                                                                    <button type="submit" class="dropdown-item" title="Hapus data"><i class="bi bi-x-lg"></i> Hapus</button>
                                                                    <input type="hidden" class="form-control" name="gallery_id" required="required" value="<?php echo $key->gallery_id; ?>">
                                                                    <?php echo form_close(); ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Ubah Galeri Video -->
                                                <div class="modal fade text-start" id="FormUbah<?php echo $key->gallery_id?>" tabindex="-1" role="dialog"
                                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-info">
                                                                <h4 class="modal-title" id="myModalLabel33">Form Ubah Galeri Video</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <?php echo form_open_multipart("gallery/update")?>
                                                            <form>
                                                                 <div class="modal-body">
                                                                 <div class="row">
                                                                            <div class="col-3">
                                                                                <label for="gallery_name">Judul Galeri <span style="color:red">*</span></label>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="form-group">
                                                                                    <?php echo csrf();?>
                                                                                    <input type="hidden" class="form-control" name="gallery_id" required="required" value="<?php echo $key->gallery_id;?>">
                                                                                    <input type="text" class="form-control" id="gallery_name" name="gallery_name" value="<?php echo $key->gallery_name;?>">
                                                                                    <input type="hidden" class="form-control" name="gallery_type" required="required" value="<?php echo $this->uri->segment(3);?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <label for="gallery_date">Tanggal Galeri <span style="color:red">*</span></label>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="form-group">
                                                                                    <input type="date" class="form-control" id="gallery_date" name="gallery_date" value="<?php echo $key->gallery_date;?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <label for="gallery_description">Deskripsi Galeri <span style="color:red">*</span></label>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="form-group">
                                                                                    <textarea class="form-control" rows="3" name="gallery_description" placeholder="Deskripsi Galeri"><?php echo $key->gallery_description;?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <label for="gallery_url">Link Video (youtube) <span style="color:red">(Opsional)</span></label>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" id="gallery_url" name="gallery_url" value="<?php echo $key->gallery_url;?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <label>File Video <span style="color:red">*</span></label>
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <div class="form-group">
                                                                                    <span class="text-red">file sebelumnya: </span><a href="<?php echo base_url()."upload/gallery/video/".$key->gallery_cover;?>" target="_blank" ><?php echo $key->gallery_cover;?></a>
                                                                                    <input type="file" class="form-control" placeholder="File Video" name="gallery_cover" accept=".mp4, .mpeg, .mkv, .avi">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                        
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary ml-1">
                                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Simpan</span>
                                                                            </button>
                                                                            <button type="reset" class="btn btn-light-secondary">
                                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                                <span class="d-none d-sm-block">Reset</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
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

                <div class="p-3">
                    <p><small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small></p>
                </div>
            </div>
    
        </section>
        <!-- Galeri foto end -->
    </div>