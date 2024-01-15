<?= $this->extend('template/homepage') ?>
<?= $this->section('content-homepage') ?>
<!-- Masthead-->
<style>
    .bg-steal{
        background-color: #2d3436;
    }


    .gradient-bg{
    display: inline-block;
    background: -moz-linear-gradient(bottom, rgba(0,0,0,0) 0%, rgba(249, 249, 249, 0.89) 100%);
    background: -webkit-gradient(linear, left bottom, left bottom, color-stop(0%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0)));
    background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(249, 249, 249, 0.89) 100%);
    background: -o-linear-gradient(bottom, rgba(0,0,0,0) 0%,rgba(249, 249, 249, 0.89) 100%);
    background: -ms-linear-gradient(bottom, rgba(0,0,0,0) 0%,rgba(249, 249, 249, 0.89) 100%);
    background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(249, 249, 249, 0.89) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 );
    }
    .title{
        position: absolute;
        top: 413px;
        color: black;
        font-weight: 700;
    }
    .img-content{
    position:relative;
    z-index:-1;
    display:block;
    height:500px; width:auto;
    }
    hr{
        color: white;
    }
    .konten-berita:hover{
        background-color: #fdcb6e;
        color: white;
        
    }
    .text-slider{
        padding: 10px;
        border: 3px solid #95a5a6;
        background-color: #95a5a6;
        width: 100%;
        border-radius: 10px;
    }
    .text-slider:hover{
        padding: 10px;
        border: 3px solid #fdcb6e;
        background-color: #fdcb6e;
        width: 100%;
        border-radius: 10px;
    }
</style>
<header class="masthead bg-steal text-white text-center">
    <div class="container d-flex align-items-center flex-column mt-4">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="<?= base_url('assets') ?>/img/logo_home.png" alt="..." />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0">PUSAT PENGAJUAN SURAT KETERANGAN DESA</h1>
        
    </div>
</header>
<!-- berita Section-->
<section class="page-section berita mt-4 mb-4" id="berita">
    <div class="container"> 
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
            <h1 class="text-center mx-4 my-3"><b>KABAR DESA</b></h1>
            </div>
        </header>

        <div class="row mb-4 p-lg-3">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                    <?php if (!(empty($berita_1))) {
                    ?>
                    
                    <div class="carousel-item active">
                    <img src="<?= base_url('assets/berita/').$berita_1->gambar; ?>" alt="Los Angeles" width="1100" height="500">
                    <div class="carousel-caption">
                        <h2 class="text-slider"><b><?= $berita_1->judul; ?></b></h2>
                        <p><a href="/berita/baca-berita/<?= $berita_1->slug; ?>" class="link stretched-link"></a></p>
                    </div>   
                    </div>
                    <div class="carousel-item">
                    <img src="<?= base_url('assets/berita/').$berita_2->gambar; ?>" alt="Chicago" width="1100" height="500">
                    <div class="carousel-caption">
                        <h2 class="text-slider"><b><?= $berita_2->judul; ?></b></h2>
                        <p><a href="/berita/baca-berita/<?= $berita_2->slug; ?>" class="link stretched-link"></a></p>
                    </div>   
                    </div>
                    <div class="carousel-item">
                    <img src="<?= base_url('assets/berita/').$berita_3->gambar; ?>" alt="New York" width="1100" height="500">
                    <div class="carousel-caption">
                        <h2 class="text-slider"><b><?= $berita_3->judul; ?></b></h2>
                        <p><a href="/berita/baca-berita/<?= $berita_3->slug; ?>" class="link stretched-link"></a></p>
                    </div>   
                    </div>
                    <?php
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                </div>
      </div>

      <div class="row mb-2">
        <?php 
        foreach ($berita as $item):
        ?>
            
        <div class="col-md-6">
            <div class="card mb-4 konten-berita" style="max-width: 500px;">
                <div class="row no-gutters">
                    <div class="col-sm-5" style="background: #868e96;">
                        <img src="<?= base_url('assets/berita/').$item['gambar']; ?>" class="card-img-top h-100" alt="...">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body mb-1 ml-2">
                            <h5 class="card-title"><a class="text-dark bold" href="#"><b><?= substr($item['judul'], 0, 150) ?></b></a></h5>
                            
                            <a href="/berita/baca-berita/<?= $item['slug']; ?>" class="link stretched-link"></a>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 justify-content-end d-flex">
                            <div class="badge badge-danger fs-12 font-weight-bold mb-1 ml-2">
                                <i class="fa fa-tags"></i> <?= $item['kategori'] ?>
                            </div>
                            <div class="badge badge-secondary fs-12 font-weight-bold mb-1">
                                <i class="fa fa-calendar-day"></i> <?= $item['tanggal'] ?>
                            </div>
                            <div class="badge badge-dark fs-12 font-weight-bold mb-1">
                                <i class="fa fa-user"></i> <?= $item['penulis'] ?>
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