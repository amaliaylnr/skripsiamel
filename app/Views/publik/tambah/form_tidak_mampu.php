<?= $this->extend('template/homepage') ?>
<?= $this->section('content-homepage') ?>

<section class="masthead berita" id="berita">
    <div class="container">
        <!-- berita Grid Items-->
        <div class="row justify-content-center">
            <h2 class="text-center m-4">FORMULIR PENGAJUAN SURAT KETERANGAN TIDAK MAMPU</h2>
            <!-- berita Item 1-->
            <div class="col-md-12 col-lg-12 mb-5">
                <div class="berita-item mx-auto border-2">
                    <div class="card">

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
                            <form action="/pengajuan/form_tidak_mampu_proses" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12 mb-2">
                                        <div class="card-header bg-primary text-center mb-4">
                                            <h2 class="text-white">Data Diri Orang Tua</h2>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                                                <label for="">Nama Ayah Kandung</label>
                                                <input type="text" class="form-control" name="nama_ayah" placeholder="Nama ayah" value="<?= set_value('nama_ayah') ?>">
                                            </div>
                                            <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                                                <label for="">Nama Ibu Kandung</label>
                                                <input type="text" class="form-control" name="nama_ibu" placeholder="Nama ibu" value="<?= set_value('nama_ibu') ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-sm-12 ml-lg-2 mb-2">
                                                <label for="">Keterangan Lainnya <small>*silahkan edit keterangan dibawah sesuai dengan kebutuhan</small></label>
                                                <textarea class="form-control" name="keterangan" id="" cols="30" rows="10" value="<?= set_value('keterangan') ?>">Adalah benar-benar warga kami, anak dari pasangan Bpk. [nama ayah] dan Ibu [nama ibu] yang tidak mempunyai pekerjaan tetap / tidak mampu dan keterangan ini akan dipergunakan untuk persyaratan melengkapi administrasi KIP Kuliah untuk mendaftar di Univeritas.</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mb-2">
                                        <div class="card-header bg-danger text-center mb-4">
                                            <h2 class="text-white">Data Diri Pemohon</h2>
                                        </div>
                                        <div class="col mr-2 mb-2">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama lengkap..." value="<?= set_value('nama') ?>">
                                        </div>
                                        <div class="col-lg-12 col-sm-12 mb-2">
                                            <label for="">Nomer KTP / NIK</label>
                                            <input type="text" name="nik" class="form-control" placeholder="Nomer NIK" value="<?= set_value('nik') ?>">
                                        </div>
                                        <div class="col-lg-12 col-sm-12 mb-2">
                                            <label for="">Nomer Kartu Keluarga</label>
                                            <input type="text" name="no_kk" class="form-control" placeholder="Nomer KK" value="<?= set_value('no_kk') ?>">
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
                                            <label for="">Telepon Aktif</label>
                                            <input type="number" name="telepon" class="form-control" placeholder="Telepon aktif..." value="<?= set_value('telepon') ?>">
                                        </div>
                                        <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                                            <label for="">Scan Kartu Identitas Milik Orangtua(<small>silahkan scan KTP atau Kartu Keluarga</small>)</label>
                                            <div class="form-group">
                                                <input type="file" name="identitas" class="form-control" id="customFile">
                                                
                                            </div>
                                        </div> 
                                    </div>
                                        
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 text-center mt-4">
                                        <button class="btn btn-primary text-white text-bold"><i class="fa fa-upload"></i> AJUKAN SURAT</button>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 text-center mt-4">
                                        <a href="/pengajuan" class="btn btn-danger text-white  mr-auto">Batal</a>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>