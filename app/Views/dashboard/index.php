<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Jumlah Pengajuan Surat Tahun <?= date('Y'); ?></div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800">
                                    Jumlah Data Pengajuan Surat = <b><?= $jumlah_s_domisili+$jumlah_s_kematian+$jumlah_s_keterangan_usaha+$jumlah_s_pengantar+$jumlah_s_tidak_mampu+$jumlah_s_waris; ?></b>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><?= strftime("%A, %d %B %Y") ?></div>
                                <i class="fas fa-address-book fa-4x text-gray-300">
                                    
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Surat Keterangan Domisili</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_s_domisili; ?> Data Pengajuan
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Surat Keterangan Usaha</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_s_keterangan_usaha; ?> Data Pengajuan
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Surat Pengantar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_s_pengantar; ?> Data Pengajuan
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Surat Keterangan Tidak Mampu</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?= $jumlah_s_tidak_mampu; ?> Data Pengajuan
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Surat Kematian</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_s_kematian; ?> Data Pengajuan
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Surat Keterangan Ahli Waris</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_s_waris; ?> Data Pengajuan
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Jumlah Warga</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_warga; ?> Data Warga
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>