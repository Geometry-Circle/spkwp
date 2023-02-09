<?php

require_once "../_config/config.php";
require_once "../vendor/autoload.php";

$kelas = $_POST['req'];

$targetFile = '../tmp/' . basename($_FILES['excel']['name']);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$sizeFile = $_FILES['excel']['size'];
$pesanError = "wrong answer";

// cek apakah extensi excel atau tidak
if ($fileType == 'xlsx') {

    // cek jika file sudah ada
    if (file_exists($targetFile)) {
        notifError("File sudah ada, mohon masukkan file yang berbeda", $kelas);
    } else {

        // cek size file
        checkSize($sizeFile, $kelas);
        // pindahkan file ke folder tmp
        move_uploaded_file($_FILES['excel']['tmp_name'], $targetFile);
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($targetFile);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $key => $siswa) {
            /** 
             * Keterangan Index
             * [0] = nama
             * [1] = nisn
             * [2] = nama panggilan
             * [3] = tempat
             * [4] = jenis kelamin
             * [5] = agama
             * [7] = alamat
             **/
            mysqli_query($con, "INSERT INTO siswa(nama, jk, alamat, kelas) VALUES('$siswa[0]', '$siswa[4]', '$siswa[7]', 'Kelas $kelas')");
        }
        header("Location: kelas-$kelas/index.php");
    }
} else {
    notifError("File harus berekstensi xlsx", $kelas);
}




function notifError($pesan, $kelas): void
{
    echo "<script> alert('$pesan');
        window.location.href='kelas-$kelas/index.php';
        </script>";
};

function checkSize($sizeFile, $kelas): void
{
    if ($sizeFile > 500000)
        notifError("File terlalu besar", $kelas);
}
