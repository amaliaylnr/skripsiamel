
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | Administrator</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- modified style css -->
    <link href="<?= base_url('assets') ?>/css/modif-style.css" rel="stylesheet">

    <!-- modified style css -->
    <link href="<?= base_url('assets') ?>/plugin/summernote/summernote-bs4.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<style>
    .bg-sidebar{
        background-color: #d35400; /* pumpkin color */
    }
    .bg-header{
        background-color: #e67e22; /* carrot color */
        color: #e67e22;
        font-weight: bold;
        font-size: 20px;
    }
</style>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-0">
                    <img src="<?= base_url('assets') ?>/img/logo_desa.png" alt="logo" style="width:40px;">
                </div>
                <div class="sidebar-brand-text mx-3">DASHBOARD<sup>v1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">


            <!-- Heading -->
            <div class="sidebar-heading">
                Pelayanan
            </div>
            
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-book-reader"></i>
                    <span>Data Pengajuan Surat</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 px-n2 collapse-inner rounded">
                        <h6 class="collapse-header">Melayani Pengajuan:</h6>
                        <a class="collapse-item" href="/surat/s_pengantar">Surat Pengantar</a>
                        <a class="collapse-item" href="/surat/s_domisili">Surat Ket. Domisili</a>
                        <a class="collapse-item" href="/surat/s_keterangan_usaha">Surat Ket. Usaha</a>
                        <a class="collapse-item" href="/surat/s_tidak_mampu">Surat Ket. Tidak Mampu</a>
                        <a class="collapse-item" href="/surat/s_kematian">Surat Ket. Kematian</a>
                        <a class="collapse-item" href="/surat/s_waris">Surat Ket. Ahli Waris</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <div class="sidebar-heading">
                Data Manajemen
            </div>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/produk">
                    <i class="fas fa-fw fa-synagogue"></i>
                    <span>Produk Desa</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/berita">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Berita</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/penduduk">
                    <i class="fas fa-user-friends"></i>
                    <span>Penduduk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dashboard/laporan">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Laporan Pelayanan</span></a>
            </li>            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand bg-header topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small text-white"><?= session()->get('email'); ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('assets') ?>/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?= $this->renderSection('content-dashboard') ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/demo/datatables-demo.js"></script>

    <script src="<?= base_url('assets') ?>/plugin/pdfmake/pdfmake.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url('assets') ?>/plugin/summernote/summernote-bs4.min.js"></script>  
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote(
                {
                    height: 450,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    }
                }
            )
        })
    </script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: [
                'heading', '|', 'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ]
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
    </script>
</body>

</html>