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
        <form action="/dashboard/edit_berita_proses/<?= $berita['id_berita']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-lg-12 mb-2">
                    <div class="col mr-2 mb-1">
                        <label for="">Judul Berita</label>
                        <input type="text" name="judul" class="form-control" value="<?= $berita['judul'] ?>">
                    </div>
                    <div class="form-group row">
                        <div class="col-6 ml-2 mb-2">
                            <label for="">Kategori</label>
                            <select name="kategori" id="" class="custom-select">
                                <option selected  value="<?= $berita['kategori'] ?>"><?= $berita['kategori'] ?></option>
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
                                <option selected  value="<?= $berita['publish'] ?>"><?= $berita['publish'] ?></option>
                                <option value="publish">Publish Sekarang</option>
                                <option value="pratinjau">Pratinjau</option>
                                <option value="edit">Editing</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6 ml-2 mb-2">
                            <label for="">Gambar Baru (<small>format gambar jpg atau png dengan ukuran 4x4</small>)</label>
                            <div class="form-group">
                                <input type="file" name="gambar" class="form-control" id="customFile" value="<?= $berita['gambar']; ?>">
                                <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                            </div>
                        </div>
                        <div class="col-4 ml-2 mb-2">
                            <label for="">Gambar Lama</label>
                            <div>
                            <?php if (!empty($berita['gambar'])) { ?>
                                <img src="<?= base_url('assets/berita'.'/'.$berita['gambar']) ?>" class="img-thumbnail" width="450" alt="<?= $berita['slug']; ?>">
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-12 col-lg-12 mb-1">
                    
                    <div class="col mr-2 mb-4">
                        <label for="">Nama Penulis Untuk Ditampilkan</label>
                        <input type="text" class="form-control" name="penulis" value="<?= $berita['penulis'] ?>">
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Pilih Tanggal Penulisan</label>
                        <input type="date" class="form-control" name="tanggal"  value="<?= $berita['tanggal'] ?>">
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Tulis Isi Berita</label>
                        <textarea name="isi" id="summernote" cols="5" rows="15">
                            <?= $berita['isi'] ?>
                        </textarea>
                    </div>
                    
                </div>
                <a href="/berita" class="btn btn-delete text-white mr-auto">Batal</a>
                <button type="submit" class="btn btn-create text-white ml-auto">
                    <i class="fa fa-upload"></i> UPDATE
                </button>
                    
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>