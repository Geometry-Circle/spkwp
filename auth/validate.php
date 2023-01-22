<?php
require_once '../_config/config.php';

if (isset($_POST['submit'])) {
    $username = htmlspecialchars(mysqli_real_escape_string($con, $_POST['username']));
    $password = trim(mysqli_real_escape_string($con, $_POST['password']));

    // $sqlLogin = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'") or die(mysqli_error($con));
    $sqlLogin = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$username'") or die(mysqli_error($con));
    $result = mysqli_fetch_row($sqlLogin);
    $hash = $result[3];
    $level = $result[4];
    $kelas = $result[5];

    if (mysqli_num_rows($sqlLogin) > 0) {
        if (password_verify($password, $hash)) {
            $_SESSION['user'] = $username;
            $_SESSION['level'] = $level;
            $_SESSION['kelas'] = $kelas;
            header("location:../index.php");
        }else{
            echo password_hash('kelas1', PASSWORD_BCRYPT);
        }
    } else {
        $feedback = 'is-invalid';
        header("location: login.php?feedback=is-invalid");
    }
}
