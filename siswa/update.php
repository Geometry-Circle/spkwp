<?php

include_once('../_config/config.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$jenisKelamin = $_POST['jk'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$req = $_POST['req'];

$query = mysqli_query($con, "UPDATE siswa SET nama='$nama', jk='$jenisKelamin', alamat='$alamat', kelas='$kelas' WHERE id='$id'");
if ($query) {
    header("Location: kelas-$req/index.php");
} else {
    echo var_dump($query);
}
