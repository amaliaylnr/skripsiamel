<?= $this->extend('template/homepage') ?>
<?= $this->section('content-homepage') ?>

<section class="masthead berita" id="berita">
    <div class="container">
        <!-- berita Grid Items-->
        <div class="row justify-content-center">
            <h2 class="text-center m-4">FORMULIR PENGAJUAN SURAT PENGANTAR</h2>
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
                            <form action="/pengajuan/form_pengantar_proses" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <!-- Earnings (Monthly) Card Example -->
                                    <div class="col-lg-6 col-sm-12 mb-2">
                                        <div class="card-header bg-primary text-center mb-4">
                                            <h2 class="text-white">Data Diri Pemohon</h2>
                                        </div>
                                        <div class="col mr-2 mb-4">
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
                                                <select name="status_perkawinan" id="" class="form-select">
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
                                                <select name="jenis_kelamin" id="" class="form-select">
                                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                                                <label for="">Agama</label>
                                                <select name="agama" id="" class="form-select">
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
                                        
                                        
                                    </div>
                                    <!-- Earnings (Annual) Card Example -->
                                    
                                    <div class="col-lg-6 col-sm-12 mb-2">
                                        <div class="card-header bg-danger text-center mb-4">
                                            <h2 class="text-white">Data Permohonan</h2>
                                        </div>
                                        
                                        <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                                            <label for="">Keperluan Surat</label>
                                            <textarea name="keperluan" id="" class="form-control" cols="30" rows="3" placeholder="Jelaskan keperluan surat..." value="<?= set_value('keperluan') ?>"></textarea>
                                        </div>
                                        
                                        <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                                            <label for="">Pengambilan Surat</label>
                                            <select name="pengambilan" id="" class="form-select">
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
                                            <label for="">Scan Kartu Identitas (<small>silahkan scan KTP atau Kartu Keluarga</small>)</label>
                                            <div class="form-group">
                                                <input type="file" name="identitas" class="form-control" id="customFile">
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                                            <label for="">Keterangan Lainnya</label>
                                            <textarea name="keterangan" id="" class="form-control" cols="30" rows="6" value="<?= set_value('keterangan') ?>">Ybs. adalah warga Desa Plawikan yang berkelakuan baik</textarea>
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