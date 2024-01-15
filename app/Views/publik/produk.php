<?= $this->extend('template/homepage') ?>
<?= $this->section('content-homepage') ?>
<style>
    .produk-item{
        padding: 5px;

    }
    .produk-item:hover {
       background-color: #1abc9c;
       color: white;
    }
    img{
        max-height: 200px;
    }
</style>
<section class="masthead produk" id="produk">
    <main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">PRODUK LOKAL DESA</h1>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php 
                foreach ($produk as $item):
                ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="<?= base_url('assets/produk/').$item['gambar']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title text-center">
                            <?= $item['nama']; ?>
                        </h4>
                        <p class="card-text">
                            <?= $item['deskripsi']; ?>
                        </p>
                    </div>
                    </div>
                </div>
                <?php 
                endforeach;
                ?>
            </div>
        </div>
    </div>

    </main>
</section>
<?= $this->endSection(); ?>