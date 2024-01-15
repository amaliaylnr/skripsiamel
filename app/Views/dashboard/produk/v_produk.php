<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>



<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <!-- <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6> -->
        <a href="/dashboard/tambah_produk" class="btn btn-create btn-icon-split">
            <span class="icon text-white btn-edit">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text text-white">Tambah Produk</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Produk</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;  
                    foreach ($produk as $item):
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td><?= $item['deskripsi']; ?></td>
                        <td>
                            <?php if (!empty($item['gambar'])) { ?>
                                <img src="<?= base_url('assets/produk'.'/'.$item['gambar']) ?>" class="img-fluid" width="100" alt="...">
                            <?php } ?>
                        </td>
                        <td class="d-flex">
                            <a href="<?= base_url('dashboard/produk/edit/'.$item['id_produk']); ?>" class="btn btn-edit btn-rounded text-white">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?= base_url('dashboard/produk/delete/' . $item['id_produk']); ?>" class="btn btn-delete btn-rounded text-white" onclick="return confirm('Apakah anda yakin ?');">
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