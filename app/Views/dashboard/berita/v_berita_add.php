<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>
<div class="card">
    <div class="card-header py-3 d-flex">   
        <a href="/dashboard/berita" class="btn btn-create btn-icon-split">
            <span class="icon text-white btn-edit">
                <i class="fas fa-arrow-left"></i>
            </span>
        </a>
    </div>

    <div class="card-body">
        <div class="col-12">
            <?php if(isset($validation)):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> <?= $validation->listErrors() ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif;?>

        </div>
        <form action="/dashboard/tambah_berita_proses" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-lg-12 mb-2">
                    <div class="col mr-2 mb-1">
                        <label for="">Judul Berita</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul utama..." value="<?= set_value('nama') ?>">
                    </div>
                    <div class="form-group row">
                        <div class="col-6 ml-2 mb-2">
                            <label for="">Kategori</label>
                            <select name="kategori" id="" class="custom-select">
                                <option selected disabled>Pilih Kategori Berita</option>
                                <option value="Informasi">Informasi</option>
                                <option value="Pemerintahan">Pemerintahan</option>
                                <option value="Pelayanan">Pelayanan</option>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Politik">Politik</option>
                                <option value="Sosial">Sosial</option>
                                <option value="Hiburan">Hiburan</option>
                                <option value="Pendidikan">Pendidikan</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="">Publish</label>
                            <select name="publish" id="" class="custom-select">
                                <option selected disabled>Pilih Opsi Publish</option>
                                <option value="publish">Publish Sekarang</option>
                                <option value="pratinjau">Pratinjau</option>
                                <option value="edit">Editing</option>
                            </select>
                        </div>
                    </div>

                    <?php 
                    // File preview
                    if(session()->has('filepath')){ ?>

                    <?php 
                            if(!session()->getFlashdata('filepath')){
                    ?>
                                <img src="<?= session()->getFlashdata('filepath') ?>" with="200px" height="200px"><br>

                    <?php
                            }else{
                    ?>
                                <a href="<?= session()->getFlashdata('filepath') ?>">Click Here..</a>
                    <?php
                            }
                    }
                    ?>
                    
                    <div class="col mr-2 mb-1">
                        <label for="">Gambar Berita (<small>format gambar jpg atau png dengan ukuran 4x4</small>)</label>
                        <div class="form-group">
                            <input type="file" name="gambar" class="form-control" id="customFile">
                            <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                        </div>
                    </div>
                </div>
                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-12 col-lg-12 mb-1">
                    
                    <div class="col mr-2 mb-4">
                        <label for="">Nama Penulis Untuk Ditampilkan</label>
                        <input type="text" class="form-control" name="penulis" placeholder="Tuliskan dengan nama resmi...">
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Pilih Tanggal Penulisan</label>
                        <input type="date" class="form-control" name="tanggal" placeholder="Tuliskan dengan nama resmi...">
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Tulis Isi Berita</label>
                        <textarea name="isi" id="summernote" cols="5" rows="15" placeholder="Jelaskan secara singkat produk dijual..."></textarea>
                    </div>
                    
                </div>
                <a href="/berita" class="btn btn-delete text-white mr-auto">Batal</a>
                <button type="submit" class="btn btn-create text-white ml-auto">
                    <i class="fa fa-upload"></i> UPLOAD
                </button>
                    
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>