<?php

include_once('../_config/config.php');

$id = $_GET['id'];
$req = $_GET['req'];

$query = mysqli_query($con, "DELETE FROM siswa WHERE id='$id'");
if ($query) {
    header("Location: kelas-$req/index.php");
} else {
    echo var_dump($query);
}
