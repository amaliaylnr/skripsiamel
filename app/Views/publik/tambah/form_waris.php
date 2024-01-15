<?= $this->extend('template/homepage') ?>
<?= $this->section('content-homepage') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<section class="masthead berita" id="berita">
    <div class="container">
        <!-- berita Grid Items-->
        <div class="row justify-content-center">
            <h2 class="text-center m-4">FORMULIR PENGAJUAN SURAT AHLI WARIS</h2>
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
                            <form action="/pengajuan/form_waris_proses" method="post" enctype="multipart/form-data">
                                <div>
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 mb-2">
                                            <div class="card-header bg-primary text-center mb-4">
                                                <h2 class="text-white">Data Diri Pemohon 1</h2>
                                            </div>
                                            <div class="col mr-2 mb-4">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" name="nama[]" class="form-control" placeholder="Nama lengkap..." value="<?= set_value('nama') ?>">
                                            </div>
                                            <div class="col-lg-12 col-sm-12 mb-2">
                                                <label for="">NIK</label>
                                                <input type="text" name="nik[]" class="form-control" placeholder="NIK" value="<?= set_value('nik') ?>">
                                            </div>
                                            <div class="col-lg-12 col-sm-12 mb-2">
                                                <label for="">Nomer KK</label>
                                                <input type="text" name="no_kk[]" class="form-control" placeholder="NIK" value="<?= set_value('no_kk') ?>">
                                            </div>

                                            <!-- new -->
                                            <div class="form-group row">
                                                <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                                                    <label for="">Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir[]" class="form-control" placeholder="Kabupaten/Kota kelahiran..." value="<?= set_value('tempat_lahir') ?>"> 
                                                </div>
                                                <div class="col-lg-5 col-sm-12 mb-sm-2">
                                                    <label for="">Tahun Lahir</label>
                                                    <input type="date" class="form-control" name="tgl_lahir[]" placeholder="Pilih tanggal lahir..." value="<?= set_value('tgl_lahir') ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                                                    <label for="">Status Perkawinan</label>
                                                    <select name="status_perkawinan[]" id="" class="custom-select">
                                                        <option selected disabled>Pilih Status Perkawinan</option>
                                                        <option value="Lajang">Lajang</option>
                                                        <option value="Menikah">Menikah</option>
                                                        <option value="Cerai">Cerai</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                                                    <label for="">Kewarganegaraan</label>
                                                    <input type="text" class="form-control" name="kewarganegaraan[]" placeholder="Masukkan kewarganegaraan" value="<?= set_value('kewarganegaraan') ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                                                    <label for="">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin[]" id="" class="custom-select">
                                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                                                    <label for="">Agama</label>
                                                    <select name="agama[]" id="" class="custom-select">
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
                                                <input type="text" name="pekerjaan[]" class="form-control" placeholder="Pekerjaan saat ini" value="<?= set_value('pekerjaan') ?>">
                                            </div>
                                            <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                                                <label for="">Alamat</label>
                                                <textarea name="alamat[]" id="" class="form-control" cols="30" rows="5" placeholder="No. Rumah / Nama Jalan / Nama Gang / RT / RW / Dusun..." value="<?= set_value('alamat') ?>"></textarea>
                                            </div>
                                            
                                            <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                                                <label for="">Pengambilan Surat</label>
                                                <select name="pengambilan[]" id="" class="custom-select">
                                                    <option selected disabled>Pilih pengambilan surat</option>
                                                    <option value="kantor">Di Kantor</option>
                                                    <option value="email">Kirim Email</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                                                <label for="">Email</label>
                                                <input type="email" name="email[]" class="form-control" placeholder="Email pengiriman..." value="<?= set_value('email') ?>">
                                            </div>
                                            <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                                                <label for="">Scan Kartu Identitas Milik Orangtua(<small>silahkan scan KTP atau Kartu Keluarga</small>)</label>
                                                <div class="form-group">
                                                    <input type="file" name="identitas" class="form-control" id="customFile">
                                                    
                                                </div>
                                            </div> 
                                        </div>
                                        <!-- form data diri ahli waris -->
                                        <div class="col-lg-12 col-sm-12 mb-2"  id="dynamic_field">
                                            <div class="card-header bg-danger text-center mb-4">
                                                <h2 class="text-white">Data Diri Ahli Waris</h2>
                                            </div>
                                            <div class="col mr-2 mb-4">
                                                <label for="">Nama Ahli Waris</label>
                                                <input type="text" name="nama_ahli_waris[]" class="form-control" placeholder="Nama ahli waris lengkap..." value="<?= set_value('nama_ahli_waris') ?>">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                                                    <label for="">Jenis Kelamin</label>
                                                    <select class="form-select" name="kelamin_waris[]" id="">
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                    <!-- <input type="text" name="kelamin_waris[]" class="form-control" placeholder="Kabupaten/Kota kelahiran anak..." value="<?= set_value('kelamin_waris') ?>">  -->
                                                </div>
                                                <div class="col-lg-5 col-sm-12 mb-sm-2">
                                                    <label for="">Tahun Lahir</label>
                                                    <input type="date" class="form-control" name="tgl_lahir_ahli_waris[]" placeholder="Tanggal lahir ahli waris..." value="<?= set_value('tgl_lahir_ahli_waris') ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                                                    <label for="">NIK</label>
                                                    <input type="number" class="form-control" name="nik_ahli_waris[]" placeholder="NIK Ahli waris" value="<?= set_value('nik_ahli_waris') ?>">
                                                </div>
                                                <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                                                    <label for="">Hubungan Keluarga</label>
                                                    <input type="text" class="form-control" name="hubungan_keluarga[]" placeholder="Hubungan antara pemohon dengan ahli waris" value="<?= set_value('hubungan_keluarga') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                        $(document).ready(function(){      
                                        var i=1;  
                                    
                                        $('#add').click(function(){  
                                            i++;
                                            // $('#dynamic_field').append('<hr><div class="col-lg-12 col-sm-12 mb-2" id="row'+i+'> <div class="col mr-2 mb-4"><label for="">Nama Ahli Waris</label><input type="text" name="nama_ahli_waris[]" class="form-control" placeholder="Nama ahli waris lengkap..." value="<?= set_value('nama_ahli_waris') ?>"></div><div class="form-group row"><div class="col-lg-6 col-sm-12 ml-lg-2 mb-2"><label for="">Tempat Lahir</label><input type="text" name="kelamin_waris[]" class="form-control" placeholder="Kabupaten/Kota kelahiran anak..." value="<?= set_value('kelamin_waris') ?>"> </div><div class="col-lg-5 col-sm-12 mb-sm-2"><label for="">Tahun Lahir</label><input type="date" class="form-control" name="tgl_lahir_ahli_waris[]" placeholder="Tanggal lahir ahli waris..." value="<?= set_value('tgl_lahir_ahli_waris') ?>"></div></div><div class="form-group row"><div class="col-lg-6 col-sm-12 ml-lg-2 mb-2"><label for="">NIK</label><input type="number" class="form-control" name="nik_ahli_waris" placeholder="NIK Ahli waris" value="<?= set_value('nik_ahli_waris') ?>"></div><div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2"> <label for="">Hubungan Keluarga</label><input type="text" class="form-control" name="hubungan_keluarga" placeholder="Hubungan antara pemohon dengan ahli waris" value="<?= set_value('hubungan_keluarga') ?>"></div></div></div>');
                                            $('#dynamic_field').append('<div class="col ml-0 mb-4" id="row'+i+'"><div class="divider py-1 my-2 bg-dark"></div> <div class="col mr-2 mb-4"><label for="">Nama Ahli Waris</label><input type="text" name="nama_ahli_waris[]" class="form-control" placeholder="Nama ahli waris lengkap..." value="<?= set_value('nama_ahli_waris') ?>"></div><div class="form-group row"><div class="col-lg-6 col-sm-12 ml-lg-2 mb-2"><label for="">Jenis Kelamin</label>  <input type="text" name="kelamin_waris[]" class="form-control" placeholder="Jenis Kelamin" value="L">  </div><div class="col-lg-5 col-sm-12 mb-sm-2"><label for="">Tahun Lahir</label><input type="date" class="form-control" name="tgl_lahir_ahli_waris[]" placeholder="Tanggal lahir ahli waris..." value="<?= set_value('tgl_lahir_ahli_waris') ?>"></div></div><div class="form-group row"><div class="col-lg-6 col-sm-12 ml-lg-2 mb-2"><label for="">NIK</label><input type="number" class="form-control" name="nik_ahli_waris[]" placeholder="NIK Ahli waris" value="<?= set_value('nik_ahli_waris') ?>"></div><div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2"> <label for="">Hubungan Keluarga</label><input type="text" class="form-control" name="hubungan_keluarga[]" placeholder="Hubungan antara pemohon dengan ahli waris" value="<?= set_value('hubungan_keluarga') ?>"></div></div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">- Hapus Form</button></div>');
                                        });
                                        
                                        $(document).on('click', '.btn_remove', function(){  
                                            var button_id = $(this).attr("id"); 
                                            var res = confirm('Are You Sure You Want To Delete This?');
                                            if(res==true){
                                            $('#row'+button_id+'').remove();  
                                            $('#'+button_id+'').remove();  
                                            }
                                        });  
                                    
                                        });  
                                        </script>
                                            
                                    </div>
                                    <div class="row">
                                        <div class="form-group">        
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" name="add" id="add" class="btn btn-success">Tambah Ahli Waris</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 text-center mt-4">
                                            <button class="btn btn-primary text-white text-bold"><i class="fa fa-upload"></i> AJUKAN SURAT</button>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 text-center mt-4">
                                            <a href="/pengajuan" class="btn btn-danger text-white  mr-auto">Batal</a>
                                        </div>
                                        
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