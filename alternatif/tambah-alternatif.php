<?php
include_once('../_header.php');
include_once('../_config/config.php');

$kelas = $_GET['kelas'];
$kriteria = mysqli_query($con, "SELECT id, nama FROM kriteria");
$siswa = mysqli_query($con, "SELECT * FROM `alternatif` RIGHT JOIN siswa ON siswa.id = alternatif.id_siswa WHERE alternatif.id_siswa IS NULL AND siswa.kelas = 'Kelas $kelas'");

$dataKriteria = [];
while ($row = mysqli_fetch_array($kriteria)) {
  array_push($dataKriteria, [
    'id' => $row['id'],
    'nama' => $row['nama']
  ]);
}

$dataSiswa = [];
while ($row = mysqli_fetch_array($siswa)) {
  array_push($dataSiswa, [
    'id' => $row['id'],
    'nama' => $row['nama']
  ]);
}

?>

<html>

<head>
  <!-- CSS Alternatif -->
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/alternatif.css'); ?>">

  <!-- CSS Button -->
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/buttons.css'); ?>">

  <title>Kelas <?= $kelas; ?> | Tambah Alternatif</title>
</head>

<body>

  <section>
    <main>

      <form action="insert.php" method="POST" class="form-horizontal">
        <div class="container">
          <div class="card">
            <h2>Tambah Data Alternatif</h2>
            <p>Siswa Kelas <?= $kelas; ?></p>

            <!-- Input Kelas -->
            <input type="text" name="kelas" value="<?= $kelas; ?>" hidden>

            <!-- Input Nama -->
            <div class="input-group">
              <label for="siswa" class="label-input">Nama Siswa</label>
              <select name="id-siswa" id="id-siswa" required>
                <option value="" selected hidden>Pilih siswa</option>
                <?php foreach ($dataSiswa as $key => $value) : ?>
                  <option value="<?= $value['id']; ?>">
                    <?= $value['nama']; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <?php foreach ($dataKriteria as $key => $value) : ?>
              <!-- Input Kriteria -->
              <div class="input-group">
                <label for="<?= $value['nama']; ?>" class="label-input"><?= $value['nama']; ?></label>
                <input type="text" name="<?= $value['id']; ?>" id="<?= $value['nama']; ?>" class="form-input" placeholder="0" required>
              </div>
            <?php endforeach; ?>

            <div class="buttons2">

              <!-- Button Tambah -->
              <button type="submit" class="btn2 btn-tambah">
                <i class='bx bxs-user-plus bx-sm'></i>
                <span class="btn-text">
                  Tambah
                </span>
              </button>

              <!-- Button Kembali -->
              <a href="./alternatif-1.php" class="btn-a btn-kembali">
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