<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>
<div class="card">
    <div class="card-header py-3 d-flex">   
        <a href="/dashboard/laporan" class="btn btn-create btn-icon-split">
            <span class="icon text-white btn-edit">
                <i class="fas fa-arrow-left"></i>
            </span>
        </a>
    </div>

    <div class="card-body">
        <div class="col-12">
            <?php if(isset($validation)):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> <?= $validation->listErrors() ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif;?>

        </div>
        <form action="/surat/s_pengantar_edit_proses/<?= $s_pengantar['id'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-12 col-lg-12 mb-2">
                    <div class="col mr-2 mb-4">
                        <input type="text" disabled name="nama" class="form-control" placeholder="Nama lengkap..." value="<?= $warga['nik'] ?> - <?= $warga['nama'] ?>">
                    </div>
                    <div class="col mr-2 mb-4">
                        <input type="hidden" name="nik" class="form-control" placeholder="NIK" value="<?= $warga['nik'] ?>">
                    </div>
                    <div class="form-group row">
                        <div class="col-6 ml-2 mb-2">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Kabupaten/Kota kelahiran..." value="<?= $warga['tempat_lahir'] ?>"> 
                        </div>
                        <div class="col-5">
                            <label for="">Tahun Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" placeholder="Pilih tanggal lahir..." value="<?= $warga['tgl_lahir'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6 ml-2 mb-2">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="custom-select">
                                <option selected value="<?= $warga['jenis_kelamin'] ?>"><?= $warga['jenis_kelamin'] ?></option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="">Agama</label>
                            <select name="agama" id="" class="custom-select">
                                <option selected <?= $warga['agama'] ?>><?= $warga['agama'] ?></option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="khatolik">Khatolik</option>
                                <option value="buddha">Buddha</option>
                                <option value="hindu">Hindu</option>
                                <option value="konghucu">Konghucu</option>
                                <option value="lainnya">Kepercayaan Lainnya</option>
                            </select>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-12 col-lg-12 mb-1">
                    <div class="col mr-2 mb-4">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" class="form-control" cols="30" rows="5"  value="<?= $warga['alamat'] ?>"><?= $warga['alamat'] ?></textarea>
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Keperluan Surat</label>
                        <textarea name="keperluan" id="" class="form-control" cols="30" rows="3"  value="<?= $s_pengantar['keperluan'] ?>"><?= $s_pengantar['keperluan'] ?></textarea>
                    </div>
                    
                    <div class="col mr-2 mb-4">
                        <label for="">Pengambilan Surat</label>
                        <select name="pengambilan" id="" class="custom-select">
                            <option selected value="<?= $s_pengantar['pengambilan'] ?>"><?= $s_pengantar['pengambilan'] ?></option>
                            <option value="kantor">Di Kantor</option>
                            <option value="email">Kirim Email</option>
                        </select>
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email pengiriman..." value="<?= $warga['email'] ?>">
                    </div>
                    
                </div>
                <div class="col-lg-12 col-sm-12 mb-2 ml-2 justify-content-between d-flex">
                    <a href="/dashboard/laporan" class="btn btn-delete text-white ml-2">Batal</a>
                    <button type="submit" class="btn btn-primary text-white mr-4">
                        <i class="fa fa-update"></i> UPDATE
                    </button>
                </div>
                    
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>