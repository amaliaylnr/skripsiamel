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
        <form action="/surat/s_kematian_edit_proses/<?= $s_kematian['id'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-lg-12 col-sm-12 mb-2">
                    <div class="card-header btn-edit text-center mb-4">
                        <h2 class="text-white">Data Diri Warga Meninggal</h2>
                    </div>
                    <div class="col mr-2 mb-4">
                        <input type="text" name="nama" disabled class="form-control" value="<?= $warga['nik']." - ".$warga['nama'] ?>">
                    </div>
                    <div class="col-lg-12 col-sm-12 mb-2">
                        <input type="hidden" name="nik" class="form-control" value="<?= $warga['nik'] ?>">
                    </div>
                    <div class="form-group row ml-lg-0">
                        <div class="col-lg-4 col-sm-12 ml-lg-0 mb-2">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $warga['tempat_lahir'] ?>"> 
                        </div>
                        <div class="col-lg-3 col-sm-12 mb-sm-2">
                            <label for="">Tanggal Kelahiran</label>
                            <input type="date" class="form-control" name="tgl_kelahiran" value="<?= $s_kematian['tgl_kelahiran'] ?>">
                        </div>
                        <div class="col-lg-3 col-sm-12 mr-lg-1 mb-sm-2">
                            <label for="">Tanggal Kematian</label>
                            <input type="date" class="form-control" name="tgl_meninggal" value="<?= $s_kematian['tgl_meninggal'] ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Status Perkawinan</label>
                            <select name="status_perkawinan" id="" class="custom-select">
                                <option selected value="<?= $warga['status_perkawinan'] ?>"><?= $warga['status_perkawinan'] ?></option>
                                <option value="Lajang">Lajang</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Cerai">Cerai</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Kewarganegaraan</label>
                            <input type="text" class="form-control" name="kewarganegaraan" value="<?= $warga['kewarganegaraan'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6 col-sm-12 ml-lg-2 mb-2">
                            <label for="">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="custom-select">
                                <option selected value="<?= $warga['jenis_kelamin'] ?>"><?= $warga['jenis_kelamin'] ?></option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-lg-5 col-sm-12 ml-lg-2 ml-sm-2 mb-sm-2">
                            <label for="">Agama</label>
                            <select name="agama" id="" class="custom-select">
                                <option selected value="<?= $warga['agama'] ?>"><?= $warga['agama'] ?></option>
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
                        <input type="text" name="pekerjaan" class="form-control" value="<?= $warga['pekerjaan'] ?>">
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" class="form-control" cols="30" rows="5" value="<?= $warga['alamat'] ?>"><?= $warga['alamat'] ?></textarea>
                    </div>
                    
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Pengambilan Surat</label>
                        <select name="pengambilan" id="" class="custom-select">
                            <option selected value="<?= $s_kematian['pengambilan'] ?>"><?= $s_kematian['pengambilan'] ?></option>
                            <option value="kantor">Di Kantor</option>
                            <option value="email">Kirim Email</option>
                        </select>
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $warga['email'] ?>">
                    </div>
                    <div class="col-lg-12 col-sm-12 ml-lg-0 mb-2">
                        <label for="">Keterangan Kematian</label>
                        <textarea name="keterangan" id="" class="form-control" cols="30" rows="5" value="<?= $s_kematian['keterangan'] ?>"><?= $s_kematian['keterangan'] ?></textarea>
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