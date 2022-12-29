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

  <title>Tambah Data Siswa</title>
</head>

<body>

  <section>
    <main>

      <form action="insert.php" method="POST" class="form-horizontal">
        <div class="container">
          <div class="card">
            <h2>Tambah Data Siswa</h2>
            <p>Siswa SD Negeri 1 Salakan Yogyakarta</p>
            <input type="hidden" name="req" value="<?= $req; ?>">

            <!-- Input Nama -->
            <div class="input-group">
              <label for="nama" class="label-input">Nama Siswa</label>
              <input type="text" class="form-input" name="nama" id="nama">
            </div>

            <!-- Input Jenis Kelamin -->
            <div class="input-group">
              <p class="label-input">Jenis Kelamin</p>
              <div class="gender">
                <!-- Laki-laki -->
                <input type="radio" name="jk" value="Laki-laki" id="laki">
                <label for="laki">Laki-laki</label>

                <!-- Perempuan -->
                <input type="radio" name="jk" value="Perempuan" id="perempuan">
                <label for="perempuan">Perempuan</label>
              </div>
            </div>

            <!-- Input Kelas -->
            <div class="input-group">
              <label for="kelas" class="label-input">Kelas</label>
              <select name="kelas" id="kelas">
                <option value="" selected hidden>Pilih Kelas</option>
                <option value="Kelas 1">Kelas 1</option>
                <option value="Kelas 2">Kelas 2</option>
                <option value="Kelas 3">Kelas 3</option>
                <option value="Kelas 4">Kelas 4</option>
                <option value="Kelas 5">Kelas 5</option>
                <option value="Kelas 6">Kelas 6</option>
              </select>
            </div>

            <!-- Input Alamat -->
            <div class="input-group">
              <label for="alamat" class="label-input">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-alamat" rows="3"></textarea>
            </div>

            <div class="buttons2">
              <!-- Button Tambah -->
              <button type="submit" class="btn2 btn-tambah">
                <i class='bx bxs-user-plus bx-sm'></i>
                <span class="btn-text">
                  Tambah
                </span>
              </button>

              <!-- Button Kembali -->
              <a href="<?= base_url("siswa/kelas-1/index.php"); ?>" class="btn-a btn-kembali">
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