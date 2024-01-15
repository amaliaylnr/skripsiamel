<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>

<div class="card shadow mb-4">
    
    <div class="card-header py-3 d-flex">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6> -->
        <span class="rounded btn-create btn-icon-split text-white">
            <span class="icon text-white btn-edit">
                <i class="fas fa-info"></i>
            </span>
            <span class="text">Surat Kematian</span>
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
        <table class="table table-bordered d-sm-table-cell small" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tempat/Tgl Lahir</th>
                        <th>Usia Meninggal</th>
                        <th>Jenis Kelamin</th>
                        <th>Keperluan</th>
                        <th>Pengambilan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;  
                    foreach ($surat_kematian as $item):
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td><?= $item['nik']; ?></td>
                        <td><?= $item['tempat_lahir'].', '.date("d-m-Y", strtotime($item['tgl_kelahiran'])); ?></td>
                        <td><?= $item['umur']; ?> Tahun</td>
                        
                        <td><?php
                        if ($item['jenis_kelamin']=='L') {
                            echo "Laki-Laki";
                        }elseif ($item['jenis_kelamin']=='P') {
                            echo "Perempuan";
                        }
                        ?></td>
                        <td><?= $item['jenis_surat']; ?></td>
                        <td><?= $item['pengambilan']; ?></td>
                        <td><?= $item['status']; ?></td>
                        
                        <td class="d-flex">
                            <?php 
                            if ($item['pengambilan']=='email') {
                            ?>
                                <a href="mailto:<?= $item['email']; ?>?subject=<?= $item['jenis_surat'].' - '.$item['nik'] ?>" class="btn btn-create btn-rounded text-white">
                                    <i class="fa fa-paper-plane"></i>
                                </a>
                                <a href="<?= base_url('/surat/s_kematian/view/'.$item['id']); ?>" class="btn btn-edit btn-rounded text-white ml-2">
                                    <i class="fas fa-eye"></i>
                                </a>
                            <?php
                            }
                            ?>
                            <?php 
                            if ($item['pengambilan']=='kantor') {
                            ?>
                                <a href="<?= base_url('/surat/s_kematian/view/'.$item['id']); ?>" class="btn btn-edit btn-rounded text-white">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                            <?php
                            }
                            ?>
                            

                            <a href="<?= base_url('/surat/s_kematian_delete/' . $item['id']); ?>" class="btn btn-delete btn-rounded text-white ml-2" onclick="return confirm('Apakah anda yakin ?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>