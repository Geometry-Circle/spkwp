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

                        <?php foreach ($dataKriteria as $key => $value) : ?>

                            <!-- Input Kriteria -->
                            <?php if ($value['id'] != 1) : ?>
                                <!-- <div class="input-group">
                                    <label for="<?= $value['nama']; ?>" class="label-input"><?= $value['nama']; ?></label>
                                    <input type="text" name="<?= $value['nama']; ?>" id="<?= $value['nama']; ?>" class="form-input" placeholder="0" value="<?= isset($nilaiSiswa[$key]) ? number_format($nilaiSiswa[$key], 0) : 0; ?>" required>
                                </div> -->
                            <?php else : ?>
                                <!-- <div class="input-group">
                                    <label for="<?= $value['nama']; ?>" class="label-input"><?= $value['nama']; ?></label>
                                    <input type="text" name="<?= $value['nama']; ?>" id="<?= $value['nama']; ?>" class="form-input" placeholder="0" value="<?= $nilaiSiswa[$key] ?? 0; ?>" required>
                                </div> -->
                            <?php endif; ?>

                        <?php endforeach; ?>

                        <div class="input-group">
                            <label for="1" class="label-input">Nilai</label>
                            <input type="text" name="Nilai" id="nilai" class="form-input" placeholder="0" value="<?= $nilaiSiswa[0]; ?>" required>
                        </div>

                        <!-- Input Kehadiran -->
                        <div class="input-group">
                            <label for="kehadiran" class="label-input">Kehadiran</label>
                            <select name="Kehadiran" id="kehadiran" required>
                                <option value="1" <?php if ($nilaiSiswa[1] == '1.00') echo "selected"; ?>>
                                    <= 80%</option>
                                <option value="2" <?php if ($nilaiSiswa[1] == '2.00') echo "selected"; ?>>> 80% dan <= 88%</option>
                                <option value="3" <?php if ($nilaiSiswa[1] == '3.00') echo "selected"; ?>>> 88% dan <= 98%</option>
                                <option value="4" <?php if ($nilaiSiswa[1] == '4.00') echo "selected"; ?>>> 98% dan <= 100%</option>
                            </select>
                        </div>

                        <!-- Input Sikap Sosial -->
                        <div class="input-group">
                            <label for="sikap-sosial" class="label-input">Sikap Sosial</label>
                            <select name="Sikap_Sosial" id="sikap-sosial" required>
                                <option value="1" <?php if (isset($nilaiSiswa)) echo "selected"; ?>>Masukkan Nilai Sosial</option>
                                <option value="1" <?php if ($nilaiSiswa[2] == '1.00') echo "selected"; ?>>>= 1 dan < 2</option>
                                <option value="2" <?php if ($nilaiSiswa[2] == '2.00') echo "selected"; ?>>>= 2 dan < 3</option>
                                <option value="3" <?php if ($nilaiSiswa[2] == '3.00') echo "selected"; ?>>>= 3 dan <= 4</option>
                            </select>
                        </div>

                        <!-- Input Sertifikat Lomba -->
                        <div class="input-group">
                            <label for="sertif-lomba" class="label-input">Sertifikat Lomba</label>
                            <select name="Sertifikat_Lomba" id="sertif-lomba" required>
                                <option value="1" <?php if ($nilaiSiswa[3] == '1.00') echo "selected"; ?>>Tidak memiliki sertifikat</option>
                                <option value="2" <?php if ($nilaiSiswa[3] == '2.00') echo "selected"; ?>>Memiliki sertifikat tingkat regional</option>
                                <option value="3" <?php if ($nilaiSiswa[3] == '3.00') echo "selected"; ?>>Memiliki sertifikat tingkat kabupaten</option>
                                <option value="4" <?php if ($nilaiSiswa[3] == '4.00') echo "selected"; ?>>Memiliki sertifikat nasional</option>
                            </select>
                        </div>

                        <!-- Input Sikap Spiritual -->
                        <div class="input-group">
                            <label for="sikap-spiritual" class="label-input">Sikap Spiritual</label>
                            <select name="Sikap_Spiritual" id="sikap-spiritual" required>
                                <option value="1" <?php if (isset($nilaiSiswa)) echo "selected"; ?>>Masukkan Nilai Sosial</option>
                                <option value="1" <?php if ($nilaiSiswa[4] == '1.00') echo "selected"; ?>>>= 1 dan < 2</option>
                                <option value="2" <?php if ($nilaiSiswa[4] == '2.00') echo "selected"; ?>>>= 2 dan < 3</option>
                                <option value="3" <?php if ($nilaiSiswa[4] == '3.00') echo "selected"; ?>>>= 3 dan <= 4</option>
                            </select>
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
                            <a href="alternatif-<?= $kelas; ?>.php" class="btn-a btn-kembali">
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