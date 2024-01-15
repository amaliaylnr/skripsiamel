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
        <form action="/dashboard/tambah_penduduk_proses" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-12 col-sm-12 mb-2 mt-3">
                    <div class="card-header btn-edit text-center mb-4">
                        <h2 class="text-white">Data Diri Penduduk</h2>
                    </div>
                    <div class="col mr-2 mb-4">
                    <label for="">Nomor NIK</label>
                        <input type="number" name="nik" class="form-control" placeholder="Masukkan NIK">
                    </div>
                    <div class="col mr-2 mb-4">
                    <label for="">Nomer KK</label>
                        <input type="number" name="no_kk" class="form-control" placeholder="Masukkan Nomer KK">
                    </div>
                    <div class="col mr-2 mb-4">
                    <label for="">Nomer Urut KK</label>
                        <input type="number" name="no_urut_kk" class="form-control" placeholder="Masukkan Nomer Urut Dalam KK">
                    </div>
                    <div class="col mr-2 mb-4">
                    <label for="">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama lengkap">
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Nama kota tempat lahir"> 
                        </div>
                        <div class="col-lg-5 col-sm-12 mb-sm-2">
                            <label for="">Tahun Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Nama Ayah</label>
                            <input type="text" class="form-control" name="ayah" placeholder="Nama ayah">
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Nama Ibu</label>
                            <input type="text" class="form-control" name="ibu" placeholder="Nama ibu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan terakhir">
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Status Hubungan Dalam Keluarga (SHDK)</label>
                            <input type="text" class="form-control" name="shdk" placeholder="Status Hubungan Dalam Keluarga">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Status Perkawinan</label>
                            <select name="status_perkawinan" id="" class="custom-select">
                                <option selected disabled>Status Perkawinan</option>
                                <option value="Lajang">Lajang</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Cerai">Cerai</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Kewarganegaraan</label>
                            <input type="text" class="form-control" name="kewarganegaraan" placeholder="Kewarganegaraan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="custom-select">
                                <option selected disabled>Jenis Kelamin</option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Agama</label>
                            <select name="agama" id="" class="custom-select">
                                <option selected disabled>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Khatolik">Khatolik</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Lainnya">Kepercayaan Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan saat ini" >
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3 col-sm-12 ml-lg-2 mb-2">
                            <label for="">RT</label>
                            <input type="number" class="form-control" name="rt" placeholder="Nomer RT">
                        </div>
                        <div class="col-lg-3 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">RW</label>
                            <input type="number" class="form-control" name="rw" placeholder="Nomer RW">
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Dusun</label>
                            <input type="text" class="form-control" name="dusun" placeholder="Dusun">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" class="form-control" cols="30" rows="5" placeholder="No. Rumah / Nama Jalan / Nama Gang" ></textarea>
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Telepon</label>
                        <input type="number" name="telepon" class="form-control" placeholder="Nomer telepon aktif..." >
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email pengiriman..." >
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Upload Bukti Identitas</label>
                        <input type="file" name="identitas" class="form-control" placeholder="Uplaod bukti identitas kependudukan..." >
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 mb-2 ml-2 justify-content-between d-flex">
                    <a href="/dashboard/penduduk" class="btn btn-delete text-white ml-2">Batal</a>
                    <button type="submit" class="btn btn-primary text-white mr-4">
                        <i class="fa fa-update"></i> UPLOAD
                    </button>
                </div>
                    
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>