<?php
include_once('../_header.php');
include_once('../_config/config.php');
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM kriteria WHERE id = $id");
$kriteria = mysqli_fetch_assoc($query);
?>

<html>

<head>
  <!-- CSS Alternatif -->
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/alternatif.css'); ?>">

  <!-- CSS Button -->
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/buttons.css'); ?>">

  <title>Kelas | Edit Kriteria</title>
</head>

<body>

  <section>
    <main>

      <form action="update.php" method="POST" class="form-horizontal">
        <div class="container">
          <div class="card">
            <h2>Edit Kriteria</h2>

            <!-- Input Id Siswa -->
            <input type="text" value="<?= $kriteria['id']; ?>" name="id" hidden>

            <!-- Input Nama -->
            <div class="input-group">
              <label for="nama" class="label-input">Nama Kriteria</label>
              <input type="text" name="nama" class="form-input" value="<?= $kriteria['nama']; ?>" required>
            </div>

            <!-- Input Kriteria -->
            <div class="input-group">
              <label for="nilai" class="label-input">Nilai Kriteria</label>
              <input type="text" name="nilai" id="nilai" class="form-input" placeholder="0" value="<?= $kriteria['nilai']; ?>" required>
            </div>

            <div class="buttons2">

              <!-- Button Edit -->
              <button type="submit" class="btn2 btn-edit">
                <i class='bx bxs-edit bx-sm'></i>
                <span class="btn-text">
                  Edit
                </span>
              </button>

              <!-- Button Kembali -->
              <a href="index.php" class="btn-a btn-kembali">
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