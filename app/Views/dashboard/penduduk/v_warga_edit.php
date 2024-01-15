<?= $this->extend('template/dashboard') ?>
<?= $this->section('content-dashboard') ?>
<div class="card">
    <div class="card-header py-3 d-flex">   
        <a href="/dashboard/penduduk" class="btn btn-create btn-icon-split">
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
        <form action="/dashboard/penduduk_edit_proses/<?= $warga['nik']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-12 col-sm-12 mb-2 mt-3">
                    <div class="card-header btn-edit text-center mb-4">
                        <h2 class="text-white">Data Diri Penduduk</h2>
                    </div>
                    <div class="col mr-2 mb-4">
                        <input type="text" disabled name="nama" class="form-control" value="<?= $warga['nik'] ?>">
                        <input type="hidden" name="nik" class="form-control" value="<?= $warga['nik'] ?>">
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Nomer KK</label>
                        <input type="number" name="no_kk" class="form-control" placeholder="Masukkan Nomer KK"  value="<?= $warga['no_kk'] ?>">
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Nomer Urut KK</label>
                        <input type="number" name="no_urut_kk" class="form-control" placeholder="Masukkan Nomer Urut Dalam KK"  value="<?= $warga['no_urut_kk'] ?>">
                    </div>
                    <div class="col mr-2 mb-4">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= $warga['nama'] ?>">
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
                            <label for="">Nama Ayah</label>
                            <input type="text" class="form-control" name="ayah" placeholder="Nama ayah" value="<?= $warga['ayah'] ?>">
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Nama Ibu</label>
                            <input type="text" class="form-control" name="ibu" placeholder="Nama ibu" value="<?= $warga['ibu'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan terakhir" value="<?= $warga['pendidikan'] ?>">
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Status Hubungan Dalam Keluarga (SHDK)</label>
                            <input type="text" class="form-control" name="shdk" placeholder="Status Hubungan Dalam Keluarga" value="<?= $warga['shdk'] ?>">
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
                    <div class="form-group row">
                        <div class="col-lg-3 col-sm-12 ml-lg-3 mb-2">
                            <label for="">RT</label>
                            <input type="number" class="form-control" name="rt" placeholder="Nomer RT" value="<?= $warga['rt'] ?>">
                        </div>
                        <div class="col-lg-3 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">RW</label>
                            <input type="number" class="form-control" name="rw" placeholder="Nomer RW" value="<?= $warga['rw'] ?>">
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Dusun</label>
                            <input type="text" class="form-control" name="dusun" placeholder="Dusun" value="<?= $warga['dusun'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" class="form-control" cols="30" rows="5" placeholder="No. Rumah / Nama Jalan / Nama Gang / RT / RW / Dusun..." value="<?= $warga['alamat']  ?>"><?= $warga['alamat']  ?></textarea>
                    </div>
                    
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email pengiriman..." value="<?= $warga['email']  ?>">
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Telepon</label>
                        <input type="number" name="telepon" class="form-control" placeholder="Nomer telepon aktif..." value="<?= $warga['telepon']  ?>" >
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 mb-2 ml-2 justify-content-between d-flex">
                    <a href="/dashboard/penduduk" class="btn btn-delete text-white ml-2">Batal</a>
                    <button type="submit" class="btn btn-primary text-white mr-4">
                        <i class="fa fa-update"></i> UPDATE
                    </button>
                </div>
                    
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>