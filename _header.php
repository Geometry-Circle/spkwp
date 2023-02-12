<?php
require_once "_config/config.php";
if (!isset($_SESSION['user'])) {
  echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--========== BOX ICONS==========-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->


  <!--========== CSS ==========-->
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/admin_layout.css'); ?>">
  <!-- <link rel="stylesheet" href="<?= base_url('assets/css/buttontheme.css'); ?>"> -->
  <!-- <link rel="stylesheet" href="<?= base_url('_assets/dist/css/table.css'); ?>"> -->
  <!-- <link rel="stylesheet" href="<?= base_url('assets/css/button.css'); ?>"> -->
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/base.css'); ?>">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<!--========== HEADER ==========-->
<header class="header" id="header">

  <div class="header__container">

    <h3 class="m-5">Sistem Pendukung Keputusan</h3>

    <!-- <div class="header__toggle">
                <input type="checkbox" id="switch" />
                <label for="switch" class="toggle">Toggle</label>
            </div>

            <span class="theme__text animate__animated">Light</span> -->

  </div>

</header>

<!--========== NAV ==========-->
<div class="nav" id="navbar">
  <nav class="nav__container">
    <div>
      <div class="nav__logo">
        <!-- <i class='bx bxl-flutter bx-sm nav__logo-icon'></i> -->
        <img src="<?= base_url('/_assets/img/logo.jpeg'); ?>" alt="">
        <span class="nav__logo-name">SuryaFinn</span>
      </div>

      <div class="nav__list">

        <!-- Menu Beranda -->
        <div class="nav__item">
          <a href="<?= base_url('dashboard'); ?>" class="nav__link">
            <i class='bx bxs-grid-alt bx-sm nav__icon'></i>
            <span class="nav__name">Beranda</span>
          </a>
        </div>

        <?php if ($_SESSION['level'] == 'wali') : ?>
          <!-- Menu Siswa -->
          <div class="nav__item">
            <a href="<?= base_url('siswa/' . $_SESSION['kelas'] . '/index.php'); ?>" class="nav__link">
              <i class='bx bxs-user-rectangle bx-sm nav__icon'></i>
              <span class="nav__name">Siswa</span>
            </a>
          </div>
        <?php endif; ?>
        <?php if ($_SESSION['level'] == 'admin') : ?>
          <!-- Menu Siswa -->
          <div class="nav__item">
            <a href="<?= base_url('siswa/kelas-1/index.php'); ?>" class="nav__link">
              <i class='bx bxs-user-rectangle bx-sm nav__icon'></i>
              <span class="nav__name">Siswa</span>
            </a>
          </div>
        <?php endif; ?>

        <?php if ($_SESSION['level'] == 'super admin' || $_SESSION['level'] == 'admin') : ?>
          <!-- Menu Kriteria -->
          <div class="nav__item">
            <a href="<?= base_url('kriteria/index.php'); ?>" class="nav__link">
              <i class='bx bx-list-check bx-sm nav__icon'></i>
              <span class="nav__name">Kriteria</span>
            </a>
          </div>
        <?php endif; ?>

        <!-- Menu Alternatif -->
        <?php if ($_SESSION['level'] == 'wali') : ?>
          <div class="nav__item">
            <?php if ($_SESSION['kelas'] == 'kelas-1') : ?>
              <a href="<?= base_url('alternatif/alternatif-1.php'); ?>" class="nav__link">

              <?php elseif ($_SESSION['kelas'] == 'kelas-2') : ?>
                <a href="<?= base_url('alternatif/alternatif-2.php'); ?>" class="nav__link">

                <?php elseif ($_SESSION['kelas'] == 'kelas-3') : ?>
                  <a href="<?= base_url('alternatif/alternatif-3.php'); ?>" class="nav__link">

                  <?php elseif ($_SESSION['kelas'] == 'kelas-4') : ?>
                    <a href="<?= base_url('alternatif/alternatif-4.php'); ?>" class="nav__link">

                    <?php elseif ($_SESSION['kelas'] == 'kelas-5') : ?>
                      <a href="<?= base_url('alternatif/alternatif-5.php'); ?>" class="nav__link">

                      <?php elseif ($_SESSION['kelas'] == 'kelas-6') : ?>
                        <a href="<?= base_url('alternatif/alternatif-6.php'); ?>" class="nav__link">
                        <?php endif; ?>

                        <i class='bx bxs-user-check bx-sm nav__icon'></i>
                        <span class="nav__name">Alternatif</span>
                        </a>
          </div>
        <?php endif; ?>


        <!-- Menu Hasil -->
        <?php if ($_SESSION['level'] == 'wali') : ?>
          <div class="nav__item">
            <?php if ($_SESSION['kelas'] == 'kelas-1') : ?>
              <a href="<?= base_url('hasil/hasil-1.php'); ?>" class="nav__link">

              <?php elseif ($_SESSION['kelas'] == 'kelas-2') : ?>
                <a href="<?= base_url('hasil/hasil-2.php'); ?>" class="nav__link">

                <?php elseif ($_SESSION['kelas'] == 'kelas-3') : ?>
                  <a href="<?= base_url('hasil/hasil-3.php'); ?>" class="nav__link">

                  <?php elseif ($_SESSION['kelas'] == 'kelas-4') : ?>
                    <a href="<?= base_url('hasil/hasil-4.php'); ?>" class="nav__link">

                    <?php elseif ($_SESSION['kelas'] == 'kelas-5') : ?>
                      <a href="<?= base_url('hasil/hasil-5.php'); ?>" class="nav__link">

                      <?php elseif ($_SESSION['kelas'] == 'kelas-6') : ?>
                        <a href="<?= base_url('hasil/hasil-6.php'); ?>" class="nav__link">
                        <?php endif; ?>

                        <i class='bx bxs-bar-chart-alt-2 bx-sm nav__icon'></i>
                        <span class="nav__name">Hasil</span>
                        </a>
          </div>
        <?php endif; ?>

        <a href="<?= base_url('auth/logout.php'); ?>" class="nav__link nav__logout">
          <i class='bx bx-log-out nav__icon'></i>
          <span class="nav__name">Log Out</span>
        </a>

      </div>
    </div>


  </nav>
</div>