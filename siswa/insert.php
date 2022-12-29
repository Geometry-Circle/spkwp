<?php

require_once "../_config/config.php";

$nama = $_POST['nama'];
$jenisKelamin = $_POST['jk'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$req = $_POST['req'];

$query = mysqli_query($con, "INSERT INTO siswa(nama, jk, alamat, kelas) VALUES('$nama', '$jenisKelamin', '$alamat', '$kelas')");
if ($query) {
    header("Location: kelas-$req/index.php");
} else {
    echo var_dump($query);
}
