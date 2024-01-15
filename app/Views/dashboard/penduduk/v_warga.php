<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>

<style>
    table {
        table-layout: fixed;
        word-wrap: break-word;
    }
</style>
<div class="card shadow mb-4">
    
    <div class="card-header py-3 d-flex">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6> -->
        <span class="rounded btn-create btn-icon-split text-white mr-2">
            <span class="icon text-white btn-edit">
                <i class="fas fa-user-friends"></i>
            </span>
            <span class="text">Data Penduduk</span>
        </span>
        <a href="/dashboard/tambah_penduduk" class="rounded btn-success btn-icon-split text-white">
            <span class="icon text-white btn-success">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Penduduk</span>
        </a>
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
        <div class="">
        <table class="table table-bordered table-responsive small " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>DUSUN</th>
                        <th>NO KK</th>
                        <th>NO.</th>
                        <th>Nama</th>
                        <th>TEMPAT LAHIR</th>
                        <th>TANGGAL LAHIR</th>
                        <th>UMUR</th>
                        <th>JK</th>
                        <th>SHDK</th>
                        <th>Agama</th>
                        <th>PENDIDIKAN</th>
                        <th>PEKERJAAN</th>
                        <th>AYAH</th>
                        <th>IBU</th>
                        <th>STATUS PERKAWINAN</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;  
                    foreach ($penduduk as $item):
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item['nik']; ?></td>
                        <td><?= $item['rt']; ?></td>
                        <td><?= $item['rw']; ?></td>
                        <td><?= $item['dusun']; ?></td>
                        <td><?= $item['no_kk']; ?></td>
                        <td><?= $item['no_urut_kk']; ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td><?= $item['tempat_lahir']; ?></td>
                        <td><?= $item['tgl_lahir']; ?></td>
                        <td><?= $item['umur']; ?></td>
                        <td><?= $item['jenis_kelamin']; ?></td>
                        <td><?= $item['shdk']; ?></td>
                        <td><?= $item['agama']; ?></td>
                        <td><?= $item['pendidikan']; ?></td>
                        <td><?= $item['pekerjaan']; ?></td>
                        <td><?= $item['ayah']; ?></td>
                        <td><?= $item['ibu']; ?></td>
                        <td><?= $item['status_perkawinan']; ?></td>
                        
                        <td>
                            <a href="/dashboard/penduduk_edit/<?=$item['nik'];?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="/dashboard/penduduk_delete/<?=$item['nik'];?>" class="btn btn-sm btn-danger"><i class="fas fa-trash" onclick="return confirm('Apakah anda yakin hapus data?');"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>