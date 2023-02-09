<?php
include_once('../_header.php');
if ($_GET['req'] > 0) {
  $req = $_GET['req'];
} else {
  $req = null;
}
?>

<html>

<head>
  <!-- CSS Alternatif -->
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/alternatif.css'); ?>">

  <!-- CSS Insert Siswa -->
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/insert-siswa.css'); ?>">

  <!-- CSS Button -->
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/buttons.css'); ?>">

  <!-- BASE -->
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/base.css'); ?>">

  <title>Tambah Data Excel Siswa</title>
</head>

<body>

  <section>
    <main>

      <form action="insert-excel.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
        <div class="container">
          <div class="card">
            <h2>Tambah Data Siswa menggunakan Excel</h2>
            <p>Siswa SD Negeri 1 Salakan Yogyakarta</p>
            <input type="hidden" name="req" value="<?= $req; ?>">

            <!-- Input File Excel -->
            <div class="input-group">
              <label for="excel" class="label-input">Masukkan file excel</label>
              <input type="file" class="form-input" name="excel" id="excel" required>
            </div>
            <p><strong>Note:</strong></p>
            <p class="fs-12">*File harus berekstensi xlsx</p>
            <p class="fs-12">*Ukuran file harus dibawah 5mb</p>

            <div class="buttons2">
              <!-- Button Tambah -->
              <button type="submit" class="btn2 btn-tambah-excel">
                <i class='bx bxs-user-plus bx-sm'></i>
                <span class="btn-text">
                  Tambah
                </span>
              </button>

              <!-- Button Kembali -->
              <a href="<?= base_url("siswa/kelas-$req/index.php"); ?>" class="btn-a btn-kembali">
                <span class="btn-text">
                  Kembali
                </span>
              </a>
            </div>

          </div>
        </div>

      </form>
    </main>
  </section>
  </div>
  <?php include_once('../_footer.php'); ?>
</body>

</html>