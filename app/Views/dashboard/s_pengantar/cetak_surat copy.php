<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- modified style css -->
    <link href="<?= base_url('assets') ?>/css/modif-style.css" rel="stylesheet">
</head>
<style>
    h3{
        position: relative;
        text-align: center;
        margin-top: 15px;
    }
    table{
        padding: 10px;
        border: 5px;
    }
    tr{
        margin-top: 10px;
    }
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<body>
<div class="controller">
    <div class="card col-9 offset-1 border-0" style="width: 100%;">
        <div class="card header border-0">
            <div class="row">
                <div class="col-3 text-center">
                <img src="data:image/png;base64, base64_encode(file_get_contents(<?= base_url('assets/img') ?>/logo_desa.png))" class="image img-thumbnail" height="100px" width="100px" />
                    <img src="<?= base_url('assets/img') ?>/logo_desa.png"  class="img-fluid mx-2" width="100" alt="Logo Desa Plawikan Klaten">
                </div>
                <div class="col-12">
                    <h3 class="text-center text-black">PEMERINTAH DESA PLAWIKAN</h3>
                    <h3 class="text-center">KECAMATAN JOGONALAN</h3>
                    <h3 class="text-center">KABUPATEN KLATEN, JAWA TENGAH</h3>
                </div>
                <div class="col-3 text-center">
                    
                    <!-- <img src="<?= base_url('assets/img') ?>/logo_desa.png"  class="img-fluid mx-2" width="100" alt="Logo Desa Plawikan Klaten"> -->
                </div>
            </div>
        </div>
        <div class="card-body">
            <hr>
            <p>
            Yang bertanda tangan di bawah ini Kepala Desa Plawikan Kecamatan Jogonalan Kabupaten Klaten menerangkan bahwa :
            </p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $surat_pengantar->nama; ?></td>
                </tr>
                <br>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>:</td>
                    <td>  <?= $surat_pengantar->tempat_lahir.', '.$surat_pengantar->tgl_lahir; ?></td>
                </tr>
                <br>
                <tr>
                    <td>Kewarganegaraan / Agama</td>
                    <td>:</td>
                    <td>  <?= $surat_pengantar->kewarganegaraan.', '.$surat_pengantar->agama; ?></td>
                </tr>
                <br>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>  <?= $surat_pengantar->pekerjaan; ?></td>
                </tr>
                <br>
                <tr>
                    <td>No. KTP</td>
                    <td>:</td>
                    <td><?= $surat_pengantar->nik; ?></td>
                </tr>
                <br>
                <tr>
                    <td>No. KK</td>
                    <td>:</td>
                    <td>  <?= $surat_pengantar->tempat_lahir.', '.$surat_pengantar->tgl_lahir; ?></td>
                </tr>
                <br>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $surat_pengantar->alamat; ?></td>
                </tr>
                <br>
                <tr>
                    <td>Keperluan</td>
                    <td>:</td>
                    <td><?= $surat_pengantar->keperluan; ?></td>
                </tr>
                <br>
                <tr>
                    <td>Berlaku Mulai</td>
                    <td>:</td>
                    <td><b>15 Desember 2023 s/d 16 Februari 2023</b></td>
                </tr>
                <br>
                <tr>
                    <td>Keterangan Lainnya</td>
                    <td>:</td>
                    <td>Ybs adalah warga Desa Plawikan yang berkelakuan Baik</td>
                </tr>
                
                <!-- <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <?php 
                        if ($surat_pengantar->jenis_kelamin=='L') {
                            echo 'Laki-Laki';
                        }else {
                            echo 'Perempuan';
                        }
                        ?>
                    </td>
                </tr> -->
                
                
                
            </table>
            
            <br>
            <p>
                Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.
            </p>
            <p style="margin-top: 15%; text-align: end;">
                Plawikan, <?= date('d-m-Y'); ?>
                <br>
                <b class="mb-2">Kepala Desa Plawikan</b>
                <br>
                <b class="mt-4"><u>LILIK RATNAWATI, S.Pd., M.I.P.</u></b>
            </p>
        </div>
    </div>
</div>

</body>
</html>