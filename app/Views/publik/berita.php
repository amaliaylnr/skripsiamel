<?= $this->extend('template/homepage') ?>
<?= $this->section('content-homepage') ?>
<style>
    .berita-item{
        padding: 5px;

    }
    .berita-item:hover {
       background-color: #fdcb6e;
       color: white;
    }
    img{
        max-height: 200px;
    }
</style>
<section class="masthead berita" id="berita">
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
            <h1 class="text-center mx-4 my-3"><b>KABAR DESA</b></h1>
            </div>
        </header>

        <div class="row mb-2">
            <?php 
            foreach ($berita as $item):
            ?>
                
            <div class="col-lg-12">
                <div class="card mb-4 berita-item">
                    <div class="row no-gutters">
                        <div class="col-lg-3 text-center">
                            <img class="img-fluid h-100" src="<?= base_url('assets/berita/').$item['gambar']; ?>" alt="...">
                            <a href="/berita/baca-berita/<?= $item['slug']; ?>" class="link stretched-link"></a>
                        </div>
                        <div class="col-lg-9">
                            <div class="card-body mb-1 ml-lg-2">
                                <h5 class="card-title"><b><?= substr($item['judul'], 0, 150) ?></b></h5>
                                
                                <a href="/berita/baca-berita/<?= $item['slug']; ?>" class="link stretched-link"></a>
                            </div>
                            <div class="row ml-lg-2">
                                <div class="col-sm-12 justify-content-lg-start justify-content-sm-end d-flex">
                                <div class="badge badge-danger fs-12 font-weight-bold mb-1 ml-2">
                                    <i class="fa fa-tags"></i> <?= $item['kategori'] ?>
                                </div>
                                <div class="badge badge-dark fs-12 font-weight-bold mb-1">
                                    <i class="fa fa-user"></i> <?= $item['penulis'] ?>
                                </div>
                                <div class="badge badge-secondary fs-12 font-weight-bold mb-1">
                                    <i class="fa fa-calendar-day"></i> <?= $item['tanggal'] ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <?php
            endforeach;
            ?>
            
        </div>
    </div>
</section>
<?= $this->endSection(); ?>