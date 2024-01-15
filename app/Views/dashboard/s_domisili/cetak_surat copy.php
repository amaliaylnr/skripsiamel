<style>
    p, span, table { 
        font-size: 12px
    }
    table { 
        width: 100%; 
        border: 1px solid #dee2e6; 
        margin-top: 10px;
        vertical-align: middle;
        padding: 5px;
    }
    table#tb-item tr th, table#tb-item tr td {
        border:1px solid #000;
        margin-top: 8px;
        line-height: 3px;
    }

    table tr th{
        line-height: 22px;
    }

    .garis1{
        margin-top: -15px;
        border-top:3px solid black;
        height: 2px;
        border-bottom:1px solid black;
    }
    .header{
        top: -50px;
        margin-top: 100px;
    }
    .text-header{
        font-size:14pt;
        font-weight: bold;
        text-align:center;
        margin-top: 100px;
    }
    .text-header span{
        font-size:12pt;
        text-align:center;
        font-weight: normal;
    }
    .uppercase-text {
        text-transform: uppercase;
    }
    .keterangan, .table{
        text-align: justify;
        line-height: 18px;
    }

</style>
<div class="container">
    <br>
    <hr class="garis1"/>
    <div class="row mt-n5 header">
        <p class="text-header uppercase-text"><?= $surat_->jenis_surat ?><br>
        <span>No: _______ /_______/ ______</span></p>
    </div>

    <div class="">
    <span class="keterangan">Yang bertanda tangan di bawah ini Kepala Desa Plawikan Kecamatan Jogonalan Kabupaten Klaten menerangkan bahwa :</span><br/><br>
    <table cellpadding="0" class="table">
        <tr>
            <th width="30%">Nama</th>
            <th width="5%">:</th>
            <th width="55%"><?= $surat_->nama ?></th>
        </tr>
        <tr>
            <th width="30%">Tempat, Tanggal Lahir</th>
            <th width="5%">:</th>
            <th width="55%"><?= $surat_->tempat_lahir.", ".date("d F Y", strtotime($surat_->tgl_lahir)); ?></th>
        </tr>
        <tr>
            <th width="30%">Kewarganegaraan / Agama</th>
            <th width="5%">:</th>
            <th width="55%"><?= $surat_->kewarganegaraan." / ".$surat_->agama; ?></th>
        </tr>
        <tr>
            <th width="30%">Pekerjaan</th>
            <th width="5%">:</th>
            <th width="55%"><?= $surat_->pekerjaan ?></th>
        </tr>
        <tr>
            <th width="30%">Nomer KTP / NIK</th>
            <th width="5%">:</th>
            <th width="55%"><?= $surat_->nik ?></th>
        </tr>
        <tr>
            <th width="30%">Nomer KK</th>
            <th width="5%">:</th>
            <th width="55%"><?= $surat_->no_kk ?></th>
        </tr>
        <tr>
            <th width="30%">Alamat</th>
            <th width="5%">:</th>
            <th width="55%"><?= $surat_->alamat ?></th>
        </tr>
        <tr>
            <th width="30%">Keperluan</th>
            <th width="5%">:</th>
            <th width="55%"><?= $surat_->keperluan ?></th>
        </tr>
        <tr>
            <th width="30%">Berlaku Mulai</th>
            <th width="5%">:</th>
            <th width="55%"><?= date("d F Y", strtotime($surat_->mulai))." s/d ". date("d F Y", strtotime($surat_->selesai)); ?>
            </th>
        </tr>
        <tr>
            <th width="30%">Keterangan Lainnya</th>
            <th width="5%">:</th>
            <th width="55%"><?= $surat_->keterangan ?></th>
        </tr>
    </table>
    </div>

    <span class="keterangan">Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</span>
</div>
<p>&nbsp;</p>
<table cellpadding="4" >
    <tr>
        <td width="50%" style="height: 20px;text-align:center">
            <p>&nbsp;</p>
        </td>
        <td width="50%" style="height: 20px;text-align:center">
            <p>Plawikan, <?= date('d F Y'); ?><br>Hormat kami,</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p><b><u>LILIK RATNAWATI, S.Pd., M.I.P.</u></b></p>
        </td>
    </tr>
</table>