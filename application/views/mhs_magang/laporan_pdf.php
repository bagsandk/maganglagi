<?php
$rs = base_url('./assets/img/runsystem.png');
$type1 = pathinfo($rs, PATHINFO_EXTENSION);
$data1 = file_get_contents($rs);
if (isset($user['photourl'])) {
    $pathprofil = base_url('./assets/img/profil/' . $user['photourl']);
} else {
    $pathprofil = base_url('./assets/img/profil/default.png');
}
$type2 = pathinfo($pathprofil, PATHINFO_EXTENSION);
$data2 = file_get_contents($pathprofil);

$rnsy = 'data:image/' . $type1 . ';base64,' . base64_encode($data1);
$profil = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);
// var_dump($form);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak data magang</title>
</head>

<body>
    <table style="border-bottom: 3px solid #bbb; padding-bottom:10px; width:100%">
        <td><img src="<?= $rnsy ?>" width="150" height="60" /></td>
        <td>
            <p style="font-size: 18; margin-top:0px; margin-bottom:0px">PT. Global Sukses Solusi</p>
            <p style="font-size: 14 ;margin-top:0px; margin-bottom:0px">Run System</p>
        </td>
    </table>
    <center>
        <p style="font-size: 15; margin-top:30px; margin-bottom:0px">Keterangan Magang</p>
        <img src="<?= $profil ?>" width="200" height="200" style="margin-top: 15px;" />
    </center>
    <br>
    <table style=" width:70%">
        <tr>
            <td>1</td>
            <td>Nama</td>
            <td>:</td>
            <td style="text-transform: capitalize;"><?= $form['mhs_name']; ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><?= $form['birth_dt']; ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?= $form['gender'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Education</td>
            <td>:</td>
            <td><?= $form['religion']; ?></td>
        </tr>
    </table>
    <p>Telah dinyatakan lulus magang pada PT. Global Sukses Solusi, Run System pada bagian <?= $form['bagian_name'] ?> dengan mendapatkan nilai magang <?= $form['nilai'] ?></p>
    <br>
    <br>
    <br>
    <br>
    <center>
        <p>Yogyakarta, <?= date('d-m-Y'); ?></p>
        <br>
        <br>
        <br>
        <p><?= $form['karyawan_name']; ?></p>
        <p>----------------------------</p>
    </center>
</body>

</html>