<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PENGAJUAN SURAT - DESA PLAWIKAN</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('assets') ?>/vendor/bootstrap/css/styles.css" rel="stylesheet" />
        <link href="<?= base_url('bootstrap') ?>/css/bootstrap.min.css" rel="stylesheet" />
        
    </head>
    <style>
        .bg-navbar{
            background-color: #fdcb6e;
            border-bottom: 3px solid whitesmoke;
        }

    </style>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-navbar text-uppercase fixed-top" id="mainNav">
            <div class="container">
                
                <a class="navbar-brand" href="<?= base_url('/'); ?>">
                    <img src="<?= base_url('assets') ?>/img/logo_desa.png" alt="logo" style="width:40px;">
                    Desa Plawikan
                </a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-dark text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/">Beranda</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/berita">Berita</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/pengajuan">Pengajuan</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/produk">Produk</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/about">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- content -->
        <?= $this->renderSection('content-homepage') ?>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Alamat Kantor Desa</h4>
                        <p class="lead mb-0">
                            Jalan merdeka no 86
                            <br />
                            Desa Plawikan
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <!-- sosial media -->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Kunjungi Sosial Media</h4>
                        <!-- <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a> -->
                        <a class="btn btn-outline-light btn-social mx-1" href="#ganti url sosmed" target="_blank"><i class="fab fa-fw fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#ganti url sosmed" target="_blank"><i class="fab fa-fw fa-chrome"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Pengaduan & Pertanyaan</h4>
                        <p class="lead mb-0">
                            Mengenai pengaduan administrasi desa dan pertanyaan seputar <b>Pembuatan Surat Online</b> bisa anda ajukan via email dan Chat Whatsapp berikut:
                            <br>
                            <a href="http://wa.me/0812345678910" class="btn btn-info" target="_blank"><i class="fab fa-fw fa-whatsapp-f"></i>Whatsapp</a>
                            <a href="http://mailto:test@gmail.com" class="btn btn-primary" target="_blank"><i class="fab fa-fw fa-email"></i>Email</a>
                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Desa Plawikan <?= date('Y'); ?></small></div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
