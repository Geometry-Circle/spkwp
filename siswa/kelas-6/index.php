<?php

include_once('../../_header.php');
$no = 1;
$query = "SELECT * FROM siswa WHERE kelas = 'Kelas 6'";
$sql_a = mysqli_query($con, $query) or die(mysqli_error($con));

?>

<head>
    <link rel="stylesheet" href="<?= base_url('_assets/dist/css/table_alternatif.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/dist/css/alternatif.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/dist/css/siswa/siswa.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('_assets/dist/css/buttons.css'); ?>">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css">
    <title>Alternatif | Siswa Kelas 6</title>
</head>

<body>
    <section class="content">
        <main>
            <div>
                <label for="kelas">
                    <h4>Lihat data siswa kelas : </h4>
                </label>
                <select name="kelas" id="kelas" onchange="location = this.value;">
                    <option value="<?= base_url('siswa/kelas-1/index.php'); ?>">Kelas 1</option>
                    <option value="<?= base_url('siswa/kelas-2/index.php'); ?>">Kelas 2</option>
                    <option value="<?= base_url('siswa/kelas-3/index.php'); ?>">Kelas 3</option>
                    <option value="<?= base_url('siswa/kelas-4/index.php'); ?>">Kelas 4</option>
                    <option value="<?= base_url('siswa/kelas-5/index.php'); ?>">Kelas 5</option>
                    <option value="<?= base_url('siswa/kelas-6/index.php'); ?>" selected>Kelas 6</option>
                </select>
            </div>
            <div class="flex">
                <h2>Data Siswa Kelas 6</h2>

                <!-- Button Tambah -->
                <a href="../tambah-siswa.php?req=6" class="btn2 btn-tambah">
                    <i class='bx bxs-user-plus bx-sm'></i>
                    <span class="btn-text">
                        Tambah
                    </span>
                </a>
            </div>

            <!-- /.box-header -->
            <form method="post" name="proses">
                <div class="box-body">
                    <table id="example1" class="styled-table ui celled table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (mysqli_num_rows($sql_a) > 0) {
                                $data = mysqli_fetch_all($sql_a, MYSQLI_ASSOC);
                                foreach ($data as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['jk']; ?></td>
                                        <td><?= $value['kelas']; ?></td>
                                        <td><?= $value['alamat']; ?></td>
                                        <td class="aksi">
                                            <div class="buttons">
                                                <!-- Button Edit -->
                                                <a href="../edit-siswa.php?id=<?= $value['id']; ?>&req=6" class="btn-a btn-edit btn-sm">
                                                    <i class='bx bxs-edit bx-xs'></i>
                                                    <span class="btn-text">
                                                        Edit
                                                    </span>
                                                </a>

                                                <!-- Button Hapus -->
                                                <a href="../delete.php?id=<?= $value['id']; ?>&req=6" class="btn-a btn-hapus btn-sm">
                                                    <i class='bx bxs-user-x bx-xs'></i>
                                                    <span class="btn-text">
                                                        Hapus
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                endforeach;
                            } else {
                                echo "<tr> <td colspan=\"4\" align=\"center\">Data Tidak Ditemukan</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </main>
    </section>
    <?php include_once('../../_footer.php'); ?>
</body>