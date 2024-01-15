<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>
<style>
    label{
        color: black;
    }
</style>
<div class="card">
    <div class="card-header py-3 d-flex">   
        <a href="/dashboard/produk" class="btn btn-create btn-icon-split">
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
        <form action="/dashboard/tambah_produk_proses" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-6 col-lg-6 mb-2">
                    <div class="col mr-2 mb-4">
                        <label for="">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Produk..." value="<?= set_value('nama') ?>">
                    </div>
                    
                    <div class="col mr-2 mb-4">
                        <label for="">Gambar Produk (<small>format gambar jpg atau png dengan ukuran 4x4</small>)</label>
                        <div class="form-group">
                            <input type="file" name="gambar" class="form-control" id="customFile">
                            <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                        </div>
                    </div>
                </div>
                
                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-12 col-lg-12 mb-2">
                    <div class="col mr-2 mb-4">
                        <label for="">Deskripsi Produk</label>
                        <textarea name="deskripsi" id="summernote" cols="5" rows="15" placeholder="Jelaskan secara singkat produk dijual..." value="<?= set_value('nama') ?>"></textarea>
                        
                    </div>
                </div>
                <a href="/dashboard/produk/" class="btn btn-delete text-white mr-auto">Batal</a>
                <button type="submit" class="btn btn-create text-white ml-auto">
                    <i class="fa fa-upload"></i> UPLOAD
                </button>
                    
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>