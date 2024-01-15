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
    .keterangan{
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
        <span class="keterangan">Yang bertanda tangan di bawah ini :</span><br>
        <table cellpadding="0" class="table">
            <tr>
                <th width="30%">Nama</th>
                <th width="5%">:</th>
                <th width="55%"><b>H. SUTIMAN</b></th>
            </tr>
            <tr>
                <th width="30%">Jabatan</th>
                <th width="5%">:</th>
                <th width="55%">Kepala Desa</th>
            </tr>
            <tr>
                <th width="30%">Alamat</th>
                <th width="5%">:</th>
                <th width="55%">Dk. Ngaglik  RT. 002 RW. 009, Ds. Plawikan, Kec. Jogonalan, Kab. Klaten</th>
            </tr>
        </table>
        <br>
        <br>
        <span class="keterangan">Menerangkan dengan sebenarnya bahwa :</span><br>
        <table cellpadding="0" class="table">
            <tr>
                <th width="30%">Nama</th>
                <th width="5%">:</th>
                <th width="55%"><?= $surat_->nama ?></th>
            </tr>
            <tr>
                <th width="30%">Tempat, Tgl Lahir</th>
                <th width="5%">:</th>
                <th width="55%"><?= $surat_->tempat_lahir.", ". strftime("%d %B %Y", strtotime($surat_->tgl_lahir))?></th>
            </tr>
            <tr>
                <th width="30%">Kewarganegaraan / Agama</th>
                <th width="5%">:</th>
                <th width="55%"><?= $surat_->kewarganegaraan." / ".$surat_->agama; ?></th>
            </tr>
            <tr>
                <th width="30%">Jenis Kelamin</th>
                <th width="5%">:</th>
                <th width="55%"><?php
                            if ($surat_->jenis_kelamin=='L') {
                                echo "Laki-Laki";
                            }elseif ($surat_->jenis_kelamin=='P') {
                                echo "Perempuan";
                            }
                            ?></th>
            </tr>
            <tr>
                <th width="30%">Pekerjaan</th>
                <th width="5%">:</th>
                <th width="55%"><?= $surat_->pekerjaan ?></th>
            </tr>
            <tr>
                <th width="30%">Alamat</th>
                <th width="5%">:</th>
                <th width="55%"><?= $surat_->alamat ?></th>
            </tr>
        </table>
        <br><br>
        <span class="keterangan">Nama di atas benar-benar sudah Meninggal dunia pada hari Rabu, tanggal  30 Agustus 2023 di Rumah Sakit Soeradji Tirtonegoro dan mempunyai ahli waris sebagai berikut :</span><br/><br>
        <table cellpadding="2" border="1px" class="table-waris">
            <tr>
                <th style="text-align: center; vertical-align: justify;">No</th>
                <th style="text-align: center; vertical-align: justify;">Nama</th>
                <th style="text-align: center; vertical-align: justify;">L/P</th>
                <th style="text-align: center; vertical-align: justify;">Umur</th>
                <th style="text-align: center;">Hubungan Dalam Keluarga</th>
            </tr>
            <?php 
            $no_s = 1;
            foreach ($surat_waris as $values) {
            ?>
            <tr>
                <td style="text-align: center; vertical-align: justify;"><?= $no_s++ ?></td>
                <td style="text-align: center; vertical-align: justify;"><?= $values->nama_ahli_waris; ?></td>
                <td style="text-align: center; vertical-align: justify;"><?= $values->kelamin_waris; ?></td>
                <td style="text-align: center; vertical-align: justify;"><?= $values->umur; ?></td>
                <td style="text-align: center; vertical-align: justify;"><?= $values->hubungan_keluarga; ?></td>
            </tr>
            <?php
            } ?>
        </table>
    </div>

    
</div>

<table cellpadding="4" >
    <tr>
        <td width="50%" style="height: 20px;text-align:center">
            <p>&nbsp;</p>
        </td>
        <td width="50%" style="height: 20px;text-align:center">
            <p>Plawikan, <?= strftime("%d %B %Y") ?><br>Hormat kami,</p>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <p><b><u>H. SUTIMAN</u></b></p>
        </td>
    </tr>
</table>