<?php

include_once('../_config/config.php');

$id = $_POST['id'];
$nilai = $_POST['Nilai'];
$kehadiran = $_POST['Kehadiran'];
$sikapSosial = $_POST['Sikap_Sosial'];
$sikapSpiritual = $_POST['Sikap_Spiritual'];
$prestasi = $_POST['Prestasi'];
$kelas = $_POST['kelas'];


$query = mysqli_query($con, "INSERT INTO alternatif(id_siswa, id_kriteria, nilai) 
VALUES($id, 1, $nilai), ($id, 2, $kehadiran), ($id, 3, $sikapSosial), ($id, 4, $prestasi), ($id, 5, $sikapSpiritual) 
ON DUPLICATE KEY UPDATE id_kriteria=VALUES(id_kriteria), nilai=VALUES(nilai)");

if ($query) {
    header("Location: alternatif-$kelas.php");
} else {
    echo var_dump($query);
}
