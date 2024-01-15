<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>
<style>
    .row{
        border-bottom: 1px solid #34495e;
        margin-bottom: 5px;
    }
    .text-muted{
        color: black;
        font-weight: bold;
    }

</style>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6> -->
        <a href="/surat/s_waris" class="btn btn-create btn-icon-split text-white">
            <span class="icon text-white btn-edit">
                <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
            </span>
        </a>
        <a href="/surat/cetak_s_waris/<?= $surat_[0]->ns_waris; ?>" class="btn btn-primary ml-2 btn-icon-split text-white" target="_blank">
            <span class="icon text-white btn-edit">
                <i class="fas fa-print fa-2x"></i>
            </span>
        </a>
    </div>
    <div class="col-lg-12">
        <div class="card mb-4 mt-4 mx">
            <div class="card-body small mx-4 border-0">
                <h2>Data Diri Pewaris</h2>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">No. Surat</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_[0]->ns_waris; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">N I K</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_[0]->nik; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nama Lengkap</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_[0]->nama; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">TTL</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">
                            <?php 
                            $newDate = date("d-m-Y", strtotime($surat_[0]->tgl_lahir));
                            ?>
                            <?= $surat_[0]->tempat_lahir.', '.
                            $newDate;
                            ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Jenis Kelamin</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_[0]->jenis_kelamin; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Agama</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_[0]->agama; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Kewarganegaraan</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_[0]->kewarganegaraan; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Status Perkawinan</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_[0]->status_perkawinan; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Pekerjaan</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_[0]->pekerjaan; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Alamat</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_[0]->alamat; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Jenis Surat</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $surat_[0]->jenis_surat; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Tanggal Pengajuan</p>
                    </div>
                    <div class="col-sm-9">
                        <?php 
                        $newDate2 = date("d-m-Y | h:m:s", strtotime($surat_[0]->created_date));
                        ?>
                        <p class="text-muted mb-0"><?= $newDate2; ?></p>
                    </div>
                </div>
                
            </div>

            <?php 
            $no_s = 1;
            foreach ($surat_ as $values) {
            ?>
            <div class="card-body small mx-4 border-0">
                
            <h2>Ahli Waris <?= $no_s++; ?></h2>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">NIK Ahli Waris</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">
                            <?= $values->nik_ahli_waris; ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nama Ahli Waris</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $values->nama_ahli_waris; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">TTL Ahli Waris</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0">
                            <?php 
                            $newDate = date("d-m-Y", strtotime($values->tgl_lahir_ahli_waris));
                            ?>
                            <?=$newDate;
                            ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Hubungan Keluarga</p>
                    </div>
                    <div class="col-sm-9">
                        <p class="text-muted mb-0"><?= $values->hubungan_keluarga; ?></p>
                    </div>
                </div>
                
            </div>
            <?php
            } ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>