<?= $this->extend('template/homepage') ?>
<?= $this->section('content-homepage') ?>
<style>
    .berita-item{
        border: 3px solid whitesmoke;
        border-radius: 5px;
        padding: 5px;

    }
    .berita-item:hover {
       background-color: #1abc9c;
       color: white;
    }
    img{
        max-height: 300px;
    }
</style>
<section class="masthead berita" id="berita">
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            #KabarDesaPlawikan
          </h3>

          <div class="blog-post">
            <div class="text-center mx-2 mb-sm-3">
                <img src="<?= base_url('assets/berita/').$berita['gambar']; ?>" class="img-fluid" alt="<?= $berita['judul']; ?>">
            </div>
            <h2 class="blog-post-title"><?= $berita['judul']; ?></h2>
            <p class="blog-post-meta">
                <?php
                $source = $berita['tanggal'];
                $date = new DateTime($source);
                echo $date->format('l, F Y');
                ?> by 
                <a href="#"><?= $berita['penulis']; ?></a></p>
            <div>
                <?= 
                $berita['isi'];
                ?>
            </div>
          </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-1 bg-light rounded">
            
          </div>

          <div class="p-3">
            <h4 class="font-italic">Kabar Pilihan</h4>
            <ol class="list-unstyled mb-0">
                <?php 
                foreach ($berita_list as $item):
                ?>

                <li>
                    <div class="row mb-2 berita-item">
                        <div class="col-4">
                            <img src="<?= base_url('assets/berita/').$item['gambar']; ?>" class="img-fluid mx-auto d-block" alt="...">

                        </div>
                        <div class="col-8 ml-n4">
                            <h5 class="card-title"><?= $item['judul']; ?></h5>
                            <a href="/berita/baca-berita/<?= $item['slug']; ?>" class="link stretched-link"></a>
                        </div>
                        
                    </div>
                </li>
                <?php 
                endforeach;
                ?>
            </ol>
          </div>

        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->
</section>
<?= $this->endSection(); ?>