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

            <?php //foreach ($dataKriteria as $key => $value) : 
            ?>
            <!-- Input Kriteria -->
            <!-- <div class="input-group">
                <label for="<?= $value['nama']; ?>" class="label-input"><?= $value['nama']; ?></label>
                <input type="text" name="<?= $value['id']; ?>" id="<?= $value['nama']; ?>" class="form-input" placeholder="0" required>
              </div> -->
            <?php //endforeach; 
            ?>

            <!-- Input Nilai -->
            <div class="input-group">
              <label for="Nilai" class="label-input">Nilai</label>
              <input type="text" name="1" id="Nilai" class="form-input" placeholder="0.0" required>
            </div>

            <!-- Input Kehadiran -->
            <div class="input-group">
              <label for="kehadiran" class="label-input">Kehadiran</label>
              <select name="2" id="kehadiran" required>
                <option selected="true" disabled="disabled">Pilih</option>
                <!-- <option value="1"><= 80%</option>
                <option value="2">> 80% dan <= 88%</option>
                <option value="3">> 88% dan <= 98%</option>
                <option value="4">> 98% dan <= 100%</option> -->

                <option value="1">Kurang</option>
                <option value="2">Cukup </option>
                <option value="3">Rajin</option>
                <option value="4">Sangat Rajin</option>
              </select>
            </div>

            <!-- Input Sikap Sosial -->
            <div class="input-group">
              <label for="sosial" class="label-input">Sikap Sosial</label>
              <select name="3" id="sosial" required>
                <option selected="true" disabled="disabled">Pilih</option>
                <!-- <option value="1">>= 1 dan < 2</option>
                <option value="2">>= 2 dan 3<</option>
                <option value="3">>=3 dan <=4</option> -->
                <option value="1">Kurang</option>
                <option value="2">Cukup</option>
                <option value="3">Baik</option>
              </select>
            </div>

            <!-- Input Sertifikat Lomba -->
            <div class="input-group">
              <label for="sertifikat-lomba" class="label-input">Sertifikat-Lomba</label>
              <select name="4" id="sertifikat-lomba" required>
                <option selected="true" disabled="disabled">Pilih</option>
                <option value="1">Tidak memiliki sertifikat</option>
                <option value="2">Memiliki sertifikat tingkat regional</option>
                <option value="3">Memiliki sertifikat tingkat kabupaten</option>
                <option value="4">Memiliki sertifikat nasional</option>
              </select>
            </div>

            <!-- Input Sikap Spiritual -->
            <div class="input-group">
              <label for="spiritual" class="label-input">Sikap Spiritual</label>
              <select name="5" id="spiritual" required>
                <option selected="true" disabled="disabled">Pilih</option>
                <!-- <option value="1">>= 1 dan < 2</option>
                <option value="2">>= 2 dan 3<</option>
                <option value="3">>=3 dan <=4</option> -->
                <option value="1">Kurang</option>
                <option value="2">Cukup</option>
                <option value="3">Baik</option>
              </select>
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