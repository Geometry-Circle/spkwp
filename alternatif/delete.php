<?php

include_once('../_config/config.php');

$id = $_GET['id'];
$page = $_GET['page'];

$query = mysqli_query($con, "DELETE FROM alternatif WHERE id_siswa='$id'");
if ($query) {
    header("Location: alternatif-$page.php");
} else {
    echo var_dump($query);
}
