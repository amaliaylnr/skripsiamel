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
        <form action="/dashboard/edit_produk_proses/<?= $produk['id_produk'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
            <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>" />
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-6 col-lg-6 mb-2">
                    <div class="col mr-2 mb-4">
                        <label for="">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Produk..." value="<?= $produk['nama'] ?>">
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Gambar Lama</label>
                        <div class="form-group">
                            
                            <?php 
                            // File preview
                            if(!empty($produk['gambar'])){ ?>
                                <img src="<?= base_url('assets/produk/').$produk['gambar']; ?>"  class="img-fluid" width="200" alt="...">
                            <?php
                                    }
                            
                            ?>
                        </div>
                    </div>
                    
                    <div class="col mr-2 mb-4">
                        <label for="">Gambar Produk Baru <small><i>*Silahkan upload ulang jika ingin diperbarui</i></small><br>(<small>format gambar jpg atau png dengan ukuran 4x4</small>)</label>
                        <div class="form-group">
                            <input type="file" name="gambar" class="form-control" id="customFile" value="<?= $produk['gambar']; ?>">
                            <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                        </div>
                        
                        
                    </div>
                </div>

                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-12 col-lg-12 mb-2">
                    
                    <div class="col mr-2 mb-4">
                        <label for="">Deskripsi Produk</label>
                        <textarea name="deskripsi" id="summernote" cols="5" rows="15" value="<?= set_value('deskripsi') ?>"><?= $produk['deskripsi']; ?></textarea>
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-edit ml-auto text-white">
                <i class="fa fa-spinner"></i> UPDATE
                </button>
                    
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>