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
        <form action="/surat/s_kelahiran_edit_proses/<?= $s_lahir['id'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-12 col-sm-12 mb-2">
                    <div class="card-header btn-create text-center mb-4">
                        <h2 class="text-white">Data Diri Anak</h2>
                    </div>
                    
                    <input type="hidden" name="nik" class="form-control"  value="<?= $s_lahir['nik'] ?>" >
                    <input type="hidden" name="identitas" class="form-control"  value="<?= $s_lahir['identitas'] ?>" >
                    <div class="col mr-2 mb-4">
                        <input type="text" disabled name="nama" class="form-control" placeholder="Nama lengkap..." value="<?= $warga['nik'] ?> - <?= $warga['nama'] ?>">
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Nama Anak</label>
                        <input type="text" name="nama_anak" class="form-control" placeholder="Nama Anak lengkap..." value="<?= $s_lahir['nama_anak'] ?>" >
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Tempat Lahir Anak</label>
                            <input type="text" name="tempat_lahir_anak" class="form-control" placeholder="Kabupaten/Kota kelahiran anak..." value="<?= $s_lahir['tempat_lahir_anak'] ?>"> 
                        </div>
                        <div class="col-lg-5 col-sm-12 mb-sm-2">
                            <label for="">Tahun Lahir Anak</label>
                            <input type="date" class="form-control" name="tgl_lahir_anak" placeholder="Pilih tanggal lahir anak..." value="<?= $s_lahir['tgl_lahir_anak'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Nama Ayah Kandung</label>
                            <input type="text" class="form-control" name="nama_ayah" placeholder="Nama ayah" value="<?= $s_lahir['nama_ayah'] ?>">
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Nama Ibu Kandung</label>
                            <input type="text" class="form-control" name="nama_ibu" placeholder="Nama ibu" value="<?= $s_lahir['nama_ibu'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Jenis Kelamin Anak</label>
                            <select name="jk_anak" id="" class="custom-select">
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="<?= $s_lahir['jk_anak'] ?>" selected><?= $s_lahir['jk_anak'] ?></option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Anak Ke-</label>
                            <select name="urutan_anak" id="" class="custom-select">
                                <option selected disabled>Pilih Urutan Lahir Anak</option>
                                <option value="<?= $s_lahir['urutan_anak'] ?>" selected><?= $s_lahir['urutan_anak'] ?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Keperluan</label>
                            <input type="text" class="form-control" name="keperluan" value="<?= $s_lahir['keperluan'] ?>">
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Pengambilan Surat</label>
                            <select name="pengambilan" class="custom    -select" id="">
                                <option value="<?= $s_lahir['pengambilan'] ?>" selected><?= $s_lahir['pengambilan'] ?></option>
                                <option value="kantor">Di Kantor</option>
                                <option value="email">Via Email</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-lg-12 col-sm-12 mb-2 mt-3">
                    <div class="card-header btn-edit text-center mb-4">
                        <h2 class="text-white">Data Diri Pemohon</h2>
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama lengkap..." value="<?= set_value('nama') ?>">
                    </div>
                    <div class="col-lg-12 col-sm-12 mb-2">
                        <label for="">NIK</label>
                        <input type="text" name="nik" class="form-control" placeholder="NIK" value="<?= set_value('nik') ?>">
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Kabupaten/Kota kelahiran..." value="<?= set_value('tempat_lahir') ?>"> 
                        </div>
                        <div class="col-lg-5 col-sm-12 mb-sm-2">
                            <label for="">Tahun Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" placeholder="Pilih tanggal lahir..." value="<?= set_value('tgl_lahir') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Status Perkawinan</label>
                            <select name="status_perkawinan" id="" class="custom-select">
                                <option selected disabled>Pilih Status Perkawinan</option>
                                <option value="Lajang">Lajang</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Cerai">Cerai</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Kewarganegaraan</label>
                            <input type="text" class="form-control" name="kewarganegaraan" placeholder="Masukkan kewarganegaraan" value="<?= set_value('kewarganegaraan') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="custom-select">
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Agama</label>
                            <select name="agama" id="" class="custom-select">
                                <option selected disabled>Pilih Agama</option>
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
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan saat ini" value="<?= set_value('pekerjaan') ?>">
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" class="form-control" cols="30" rows="5" placeholder="No. Rumah / Nama Jalan / Nama Gang / RT / RW / Dusun..." value="<?= set_value('alamat') ?>"></textarea>
                    </div>
                    
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Pengambilan Surat</label>
                        <select name="pengambilan" id="" class="custom-select">
                            <option selected disabled>Pilih pengambilan surat</option>
                            <option value="kantor">Di Kantor</option>
                            <option value="email">Kirim Email</option>
                        </select>
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email pengiriman..." value="<?= set_value('email') ?>">
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Scan Kartu Identitas Milik Orangtua(<small>silahkan scan KTP atau Kartu Keluarga</small>)</label>
                        <div class="form-group">
                            <input type="file" name="identitas" class="form-control" id="customFile">
                            
                        </div>
                    </div> 
                </div> -->

                <div class="col-lg-12 col-sm-12 mb-2 ml-2 justify-content-between d-flex">
                    <a href="/dashboard/laporan" class="btn btn-delete text-white">Batal</a>
                    <button type="submit" class="btn btn-primary text-white">
                        <i class="fa fa-update"></i> UPDATE
                    </button>
                </div>
                    
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>