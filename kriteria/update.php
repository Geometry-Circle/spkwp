<?php
require_once "../_config/config.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$nilai = $_POST['nilai'];
$query = mysqli_query($con, "UPDATE kriteria SET nama='$nama', nilai='$nilai' WHERE id='$id'");
if ($query) {
  header('Location: index.php');
} else {
  echo var_dump($query);
}
