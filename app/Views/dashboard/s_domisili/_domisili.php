<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6> -->
        <a href="/surat/s_domisili" class="btn btn-create btn-icon-split text-white">
            <span class="icon text-white btn-edit">
                <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
            </span>
        </a>
        <a href="/surat/cetak_s_ket_domisili/<?= $surat_->id; ?>" class="btn btn-primary ml-2 btn-icon-split text-white" target="_blank">
            <span class="icon text-white btn-edit">
                <i class="fas fa-print fa-2x"></i>
            </span>
        </a>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4 mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">N I K</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->nik; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nama Lengkap</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->nama; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">TTL</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">
                            <?php 
                            $newDate = date("d-m-Y", strtotime($surat_->tgl_lahir));
                            ?>
                            <?= $surat_->tempat_lahir.', '.
                            $newDate;
                            ?>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Jenis Kelamin</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->jenis_kelamin; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Agama</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->agama; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Kewarganegaraan</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->kewarganegaraan; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Status Perkawinan</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->status_perkawinan; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Pekerjaan</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->pekerjaan; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Alamat</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->alamat; ?></p>
                    </div>
                </div>
                <hr>
                <!-- <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Telepon</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->telepon; ?></p>
                    </div>
                </div>
                <hr> -->
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Jenis Surat</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->jenis_surat; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Detail Surat</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_->keperluan; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Tanggal Pengajuan</p>
                    </div>
                    <div class="col-sm-9">
                        <?php 
                        $newDate2 = date("d-m-Y | h:m:s", strtotime($surat_->created_date));
                        ?>
                        <p class="text-muted mb-0"><?= $newDate2; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>