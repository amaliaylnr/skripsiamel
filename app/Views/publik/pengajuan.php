<?= $this->extend('template/homepage') ?>
<?= $this->section('content-homepage') ?>
<!-- berita Section-->
<style>
    .berita-item{
        border: 3px solid whitesmoke;
        background-color: #ffeaa7; /* sour-lemon */
        border-radius: 5px;

    }
    .berita-item:hover {
       background-color: #F56505;
    }
    .img-content{
        height: 200px;
        margin-top: 14px;
        padding: 10px;
    }
</style>
<section class="masthead berita" id="berita">
    <div class="container">
        <!-- berita Grid Items-->
        <div class="row justify-content-center">
            <h2 class="text-center">MENU PENGAJUAN SURAT</h2>
            <?php
            if(session()->getFlashData('success')){
            ?>
            <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
                <b>Berhasil!! </b><?= session()->getFlashData('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <?php
            }
            ?>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="berita-item mx-auto border-2">
                    <a href="pengajuan/surat_pengantar" class="link">
                    <div class="berita-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="berita-item-caption-content text-center text-white">
                            <img class="img-fluid text-center img-content" src="<?= base_url('assets') ?>/img/logo_doc.png" alt="..." />
                        </div>
                    </div>
                    </a>
                    <h3 class="text-center text-black">Surat Pengantar</h3>
                </div>
            </div>
            <!-- Portfolio Item 2-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="berita-item mx-auto border-2">
                    <a href="pengajuan/surat_domisili" class="link">
                    <div class="berita-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="berita-item-caption-content text-center text-white">
                            <img class="img-fluid text-center img-content" src="<?= base_url('assets') ?>/img/logo_doc.png" alt="..." />
                        </div>
                    </div>
                    </a>
                    <h3 class="text-center text-black">Surat Keterangan Domisili</h3>
                </div>
            </div>
            <!-- Portfolio Item 3-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="berita-item mx-auto border-2">
                    <a href="/pengajuan/surat_keterangan_usaha" class="link">
                    <div class="berita-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="berita-item-caption-content text-center text-white">
                            <img class="img-fluid text-center img-content" src="<?= base_url('assets') ?>/img/logo_doc.png" alt="..." />
                        </div>
                    </div>
                    </a>
                    <h3 class="text-center text-black">Surat Keterangan Usaha</h3>
                </div>
            </div>
            <!-- Portfolio Item 4-->
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                <div class="berita-item mx-auto border-2">
                    <a href="/pengajuan/surat_tidak_mampu" class="link">
                    <div class="berita-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="berita-item-caption-content text-center text-white">
                            <img class="img-fluid text-center img-content" src="<?= base_url('assets') ?>/img/logo_doc.png" alt="..." />
                        </div>
                    </div>
                    </a>
                    <h3 class="text-center text-black">Surat Keterangan Tidak Mampu</h3>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                <div class="berita-item mx-auto border-2">
                    <a href="/pengajuan/surat_kematian" class="link">
                    <div class="berita-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="berita-item-caption-content text-center text-white">
                            <img class="img-fluid text-center img-content" src="<?= base_url('assets') ?>/img/logo_doc.png" alt="..." />
                        </div>
                    </div>
                    </a>
                    <h3 class="text-center text-black">Surat Keterangan Kematian</h3>
                </div>
            </div>
            <!-- Portfolio Item 5-->
            <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                <div class="berita-item mx-auto border-2">
                    <a href="/pengajuan/surat_waris" class="link">
                    <div class="berita-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="berita-item-caption-content text-center text-white">
                            <img class="img-fluid text-center img-content" src="<?= base_url('assets') ?>/img/logo_doc.png" alt="..." />
                        </div>
                    </div>
                    </a>
                    <h3 class="text-center text-black">Surat Keterangan Ahli Waris</h3>
                </div>
            </div>
            
        </div>
    </div>
</section>
<?= $this->endSection(); ?>