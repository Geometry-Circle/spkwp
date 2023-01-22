<?php
include_once('../_header.php');
include_once('../_config/config.php');

$kelas = $_GET['kelas'];
$idSiswa = $_GET['id'];
$kriteria = mysqli_query($con, "SELECT id, nama FROM kriteria");

$alternatif = mysqli_query($con, "SELECT siswa.nama, alternatif.id_siswa as id, GROUP_CONCAT(alternatif.nilai) as Nilai FROM alternatif INNER JOIN siswa ON siswa.id = alternatif.id_siswa WHERE id_siswa='$idSiswa'");
$siswa = mysqli_fetch_all($alternatif, MYSQLI_ASSOC);
$nilaiSiswa = explode(',', $siswa[0]['Nilai']);

$dataKriteria = [];
while ($row = mysqli_fetch_array($kriteria)) {
    array_push($dataKriteria, [
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

            <form action="update.php?page=1" method="POST" class="form-horizontal">
                <div class="container">
                    <div class="card">
                        <h2>Edit Data Alternatif</h2>
                        <p>Siswa Kelas <?= $kelas; ?></p>

                        <!-- Input Id Siswa -->
                        <input type="text" value="<?= $siswa[0]['id']; ?>" name="id" hidden>

                        <!-- Input Kelas -->
                        <input type="text" name="kelas" value="<?= $kelas; ?>" hidden>

                        <!-- Input Nama -->
                        <div class="input-group">
                            <label for="siswa" class="label-input">Nama Siswa</label>
                            <input type="text" name="nama" class="form-input" value="<?= $siswa[0]['nama']; ?>" disabled>
                        </div>

                        <?php foreach ($dataKriteria as $key => $value) :?>

                            <!-- Input Kriteria -->
                            <?php if($value['id'] != 1): ?>
                            <div class="input-group">
                                <label for="<?= $value['nama']; ?>" class="label-input"><?= $value['nama']; ?></label>
                                <input type="text" name="<?= $value['nama']; ?>" id="<?= $value['nama']; ?>" class="form-input" placeholder="0" value="<?= isset($nilaiSiswa[$key]) ? number_format($nilaiSiswa[$key], 0) : 0; ?>" required>
                            </div>
                            <?php else: ?>
                                <div class="input-group">
                                <label for="<?= $value['nama']; ?>" class="label-input"><?= $value['nama']; ?></label>
                                <input type="text" name="<?= $value['nama']; ?>" id="<?= $value['nama']; ?>" class="form-input" placeholder="0" value="<?= $nilaiSiswa[$key] ?? 0; ?>" required>
                            </div>
                            <?php endif; ?>





                        <?php endforeach; ?>

                        <div class="buttons2">

                            <!-- Button Edit -->
                            <button type="submit" class="btn2 btn-edit">
                                <i class='bx bxs-edit bx-sm'></i>
                                <span class="btn-text">
                                    Edit
                                </span>
                            </button>

                            <!-- Button Kembali -->
                            <a href="alternatif-1.php" class="btn-a btn-kembali">
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