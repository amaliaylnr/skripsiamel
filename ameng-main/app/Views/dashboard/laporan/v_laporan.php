<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>

<style>
    table {
        table-layout: fixed;
        word-wrap: break-word;
    }
    .dropdown-toggle::after {
        display: none;
    }

    .dropdown-toggle::before {
        display: block;
    }
</style>
<div class="card shadow mb-4">
    
    <div class="card-header py-3 d-flex">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6> -->
        <span class="rounded btn-create btn-icon-split text-white">
            <span class="icon text-white btn-edit">
                <i class="fas fa-chart-line"></i>
            </span>
            <span class="text">Data Laporan Pengajuan Surat</span>
        </span>
    </div>
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
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIK Pemohon</th>
                        <th>Jenis Surat</th>
                        <th>Keperluan</th>
                        <th>Dibuat</th>
                        <th colspan="1">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- surat kelahiran -->
                    <?php
                    $no=1;  
                    foreach ($s_tidak_mampu as $item):
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item['nik']; ?></td>
                        <td><?= $item['jenis_surat']; ?></td>
                        <td><?= $item['keperluan']; ?></td>
                        <td><?= $item['created_date']; ?></td>
                        <td>
                            <a href="/surat/s_tidak_mampu_edit/<?=$item['id'];?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('/surat/s_tidak_mampu_delete/' . $item['id']); ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Apakah anda yakin hapus data?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <!-- surat pengantar -->
                    <?php
                    foreach ($s_pengantar as $pntr):
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pntr['nik']; ?></td>
                        <td><?= $pntr['jenis_surat']; ?></td>
                        <td><?= $pntr['keperluan']; ?></td>
                        <td><?= $pntr['created_date']; ?></td>
                        <td class="d-block">
                            <a href="/surat/s_pengantar_edit/<?=$pntr['id'];?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('/surat/s_kelahiran_delete/' . $pntr['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin hapus data?');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <!-- surat permohonan -->
                    <?php
                    foreach ($s_domisili as $prhn):
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $prhn['nik']; ?></td>
                        <td><?= $prhn['jenis_surat']; ?></td>
                        <td><?= $prhn['keperluan']; ?></td>
                        <td><?= $prhn['created_date']; ?></td>
                        <td>
                            <a href="/surat/s_domisili_edit/<?=$prhn['id'];?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Apakah anda yakin hapus data?');"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <!-- surat keterangan -->
                    <?php
                    foreach ($s_keterangan as $ktrn):
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $ktrn['nik']; ?></td>
                        <td><?= $ktrn['jenis_surat']; ?></td>
                        <td><?= $ktrn['keperluan']; ?></td>
                        <td><?= $ktrn['created_date']; ?></td>
                        <td>
                            <a href="/surat/s_keterangan_edit/<?=$ktrn['id'];?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Apakah anda yakin hapus data?');"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <!-- surat kematian -->
                    <?php
                    foreach ($s_kematian as $kmtn):
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $kmtn['nik']; ?></td>
                        <td><?= $kmtn['jenis_surat']; ?></td>
                        <td><?= $kmtn['keperluan']; ?></td>
                        <td><?= $kmtn['created_date']; ?></td>
                        <td>
                            <a href="/surat/s_kematian_edit/<?=$kmtn['id'];?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Apakah anda yakin hapus data?');"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <!-- surat waris -->
                    <?php
                    foreach ($s_waris as $waris):
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                <?= $waris['nik']; ?> <span class="fa fa-plus-circle"></span>
                                </button>
                                <div class="dropdown-menu bg-dark text-white">
                                    <?php 
                                    foreach ($data_waris as $value) {
                                        echo "<a class='dropdown-item text-white' href='/surat/s_waris_edit/".$value['id']."'>".$value['nik_ahli_waris']."</a>";
                                        # code...
                                    }
                                    ?>
                                </div>
                            </div>
                        </td>
                        <td><?= $waris['jenis_surat']; ?></td>
                        <td><?= $waris['keperluan']; ?></td>
                        <td><?= $waris['created_date']; ?></td>
                        <td>
                            <a href="/surat/s_waris_edit/<?=$waris['id'];?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="/surat/s_waris_delete/<?=$waris['ns_waris'];?>" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Apakah anda yakin hapus data?');"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>