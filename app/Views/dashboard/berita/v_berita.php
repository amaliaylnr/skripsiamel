<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>



<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6> -->
        <a href="/dashboard/tambah_berita" class="btn btn-create btn-icon-split text-white">
            <span class="icon text-white btn-edit">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Berita</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Tgl Dibuat</th>
                        <th>Isi Berita</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;  
                    foreach ($berita as $item):
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item['judul']; ?></td>
                        <td><?= $item['kategori']; ?></td>
                        <td><?= $item['penulis']; ?></td>
                        <td><?= $item['publish']; ?></td>
                        <td><?= $item['tanggal']; ?></td>
                        <td>
                            <?php 
                            $teks = strip_tags($item['isi']);
                            echo (substr($teks,0,60).'....');
                            ?>
                        </td>
                        <td>
                            <?php if (!empty($item['gambar'])) { ?>
                                <img src="<?= base_url('assets/berita'.'/'.$item['gambar']) ?>" class="img-fluid" width="100" alt="...">
                            <?php } ?>
                        </td>
                        <td class="d-flex">
                            <a href="<?= base_url('/dashboard/berita/view/'.$item['slug']); ?>" class="btn btn-create btn-rounded text-white">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= base_url('/dashboard/berita/edit/'.$item['id_berita']); ?>" class="btn btn-edit btn-rounded text-white">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= base_url('/dashboard/berita/delete/' . $item['id_berita']); ?>" class="btn btn-delete btn-rounded text-white" onclick="return confirm('Apakah anda yakin ?');">
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