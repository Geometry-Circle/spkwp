<?php
error_reporting(0);
require_once "../_config/config.php";

$idSiswa = trim(mysqli_real_escape_string($con, $_POST['id-siswa']));
$kelas = $_POST['kelas'];

array_shift($_POST); // menghapus index kelas
array_shift($_POST); // menghapus index id siswa

$data = $_POST;
echo var_dump($data);
foreach ($data as $key => $value) {
	$key += 1;
	$query = mysqli_query($con, "INSERT INTO alternatif(id_siswa, id_kriteria, nilai) VALUES('$idSiswa', '$key', '$value')");
}
mysqli_close($con);
header("Location: alternatif-$kelas.php");
