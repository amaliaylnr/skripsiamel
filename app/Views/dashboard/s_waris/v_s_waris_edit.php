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
        <form action="/surat/s_waris_edit_proses/<?= $s_waris['id']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-12 col-sm-12 mb-2">
                    <div class="card-header btn-create text-center mb-4">
                        <h2 class="text-white">Data Diri Ahli Waris</h2>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">NIK</label>
                            <input type="number" class="form-control" name="nik_ahli_waris" placeholder="NIK Ahli waris" value="<?= $s_waris['nik_ahli_waris']  ?>" required>
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Nama Ahli Waris</label>
                            <input type="text" name="nama_ahli_waris" class="form-control" placeholder="Nama ahli waris lengkap..." value="<?= $s_waris['nama_ahli_waris'] ?>" required>
                        </div>
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Hubungan Keluarga</label>
                        <input type="text" class="form-control" name="hubungan_keluarga" placeholder="Hubungan antara pemohon dengan ahli waris" value="<?= $s_waris['hubungan_keluarga']  ?>">
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Tempat Lahir</label>
                            <select name="kelamin_waris" id="" class="custom-select">
                                <option value="<?= $s_waris['kelamin_waris'] ?>" selected><?= $s_waris['kelamin_waris'] ?></option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12 mb-sm-2">
                            <label for="">Tahun Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir_ahli_waris" placeholder="Tanggal lahir ahli waris..." value="<?= $s_waris['tgl_lahir_ahli_waris']  ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 mb-2 mt-3">
                    <div class="card-header btn-edit text-center mb-4">
                        <h2 class="text-white">Data Diri Pemohon</h2>
                    </div>
                    <div class="col mr-2 mb-4">
                        <input type="text" disabled name="nama" class="form-control" value="<?= $warga['nik'] ?> - <?= $warga['nama'] ?>">
                        <input type="hidden" name="nik" class="form-control" value="<?= $warga['nik'] ?>">
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $warga['tempat_lahir']  ?>"> 
                        </div>
                        <div class="col-lg-5 col-sm-12 mb-sm-2">
                            <label for="">Tahun Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" value="<?= $warga['tgl_lahir']  ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Status Perkawinan</label>
                            <select name="status_perkawinan" id="" class="custom-select">
                                <option selected value="<?= $warga['status_perkawinan']  ?>"><?= $warga['status_perkawinan']  ?></option>
                                <option value="Lajang">Lajang</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Cerai">Cerai</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Kewarganegaraan</label>
                            <input type="text" class="form-control" name="kewarganegaraan" value="<?= $warga['kewarganegaraan']  ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="custom-select">
                                <option selected value="<?= $warga['jenis_kelamin']  ?>"><?= $warga['jenis_kelamin']  ?></option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Agama</label>
                            <select name="agama" id="" class="custom-select">
                                <option selected value="<?= $warga['agama']  ?>"><?= $warga['agama']  ?></option>
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
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan saat ini" value="<?= $warga['pekerjaan']  ?>">
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" class="form-control" cols="30" rows="5" placeholder="No. Rumah / Nama Jalan / Nama Gang / RT / RW / Dusun..." value="<?= $warga['alamat']  ?>"><?= $warga['alamat']  ?></textarea>
                    </div>
                    
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Keperluan Surat</label>
                        <textarea name="keperluan" id="" class="form-control" cols="30" rows="3" placeholder="Jelaskan keperluan surat..." value="<?= $s_waris['keperluan']  ?>"><?= $s_waris['keperluan']  ?></textarea>
                    </div>
                    
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Pengambilan Surat</label>
                        <select name="pengambilan" id="" class="custom-select">
                            <option selected value="<?= $s_waris['pengambilan'] ?>"><?= $s_waris['pengambilan']  ?></option>
                            <option value="kantor">Di Kantor</option>
                            <option value="email">Kirim Email</option>
                        </select>
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email pengiriman..." value="<?= $warga['email']  ?>">
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