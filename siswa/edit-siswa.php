<?php
include_once('../_header.php');
include_once('../_config/config.php');

$id = $_GET['id'];
$kelas = $_GET['req'];
$query = mysqli_query($con, "SELECT * FROM siswa WHERE id = $id");
$siswa = mysqli_fetch_assoc($query);
?>

<html>

<head>
    <!-- CSS Alternatif -->
    <link rel="stylesheet" href="<?= base_url('_assets/dist/css/alternatif.css'); ?>">

    <!-- CSS Insert Siswa -->
    <link rel="stylesheet" href="<?= base_url('_assets/dist/css/insert-siswa.css'); ?>">

    <!-- CSS Button -->
    <link rel="stylesheet" href="<?= base_url('_assets/dist/css/buttons.css'); ?>">

    <title>Edit Data Siswa</title>
</head>

<body>

    <section>
        <main>

            <form action="update.php" method="POST" class="form-horizontal">
                <input type="hidden" name="req" value="<?= $kelas; ?>">
                <div class="container">
                    <div class="card">
                        <h2>Edit Data Siswa</h2>
                        <p>Siswa SD Negeri 1 Salakan Yogyakarta</p>
                        <input type="hidden" name="id" value="<?= $siswa['id']; ?>">

                        <!-- Input Nama -->
                        <div class="input-group">
                            <label for="nama" class="label-input">Nama Siswa</label>
                            <input type="text" class="form-input" name="nama" id="nama" value="<?= $siswa['nama']; ?>">
                        </div>

                        <!-- Input Jenis Kelamin -->
                        <div class="input-group">
                            <p class="label-input">Jenis Kelamin</p>
                            <div class="gender">
                                <!-- Laki-laki -->
                                <input type="radio" name="jk" value="Laki-laki" id="laki" <?= ($siswa['jk'] == 'Laki-laki') ? "checked='checked'" : '' ?>>
                                <label for="laki">Laki-laki</label>

                                <!-- Perempuan -->
                                <input type="radio" name="jk" value="Perempuan" id="perempuan" <?= ($siswa['jk'] == 'Perempuan') ? "checked='checked'" : '' ?>>
                                <label for="perempuan">Perempuan</label>
                            </div>
                        </div>

                        <!-- Input Kelas -->
                        <div class="input-group">
                            <label for="kelas" class="label-input">Kelas</label>
                            <select name="kelas" id="kelas">
                                <option value="Kelas 1" <?= ($siswa['kelas'] == 'Kelas 1') ? 'selected' : '' ?>>Kelas 1</option>
                                <option value="Kelas 2" <?= ($siswa['kelas'] == 'Kelas 2') ? 'selected' : '' ?>>Kelas 2</option>
                                <option value="Kelas 3" <?= ($siswa['kelas'] == 'Kelas 3') ? 'selected' : '' ?>>Kelas 3</option>
                                <option value="Kelas 4" <?= ($siswa['kelas'] == 'Kelas 4') ? 'selected' : '' ?>>Kelas 4</option>
                                <option value="Kelas 5" <?= ($siswa['kelas'] == 'Kelas 5') ? 'selected' : '' ?>>Kelas 5</option>
                                <option value="Kelas 6" <?= ($siswa['kelas'] == 'Kelas 6') ? 'selected' : '' ?>>Kelas 6</option>
                            </select>
                        </div>

                        <!-- Input Alamat -->
                        <div class="input-group">
                            <label for="alamat" class="label-input">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-alamat" rows="3"><?= $siswa['alamat']; ?></textarea>
                        </div>

                        <div class="buttons2">
                            <!-- Button Tambah -->
                            <button type="submit" class="btn2 btn-edit">
                                <i class='bx bxs-edit bx-sm'></i>
                                <span class="btn-text">
                                    Edit
                                </span>
                            </button>

                            <!-- Button Kembali -->
                            <a href="<?= base_url("siswa/kelas-$kelas/index.php"); ?>" class="btn-a btn-kembali">
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