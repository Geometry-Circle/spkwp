<?php

include_once('../_header.php');
$no = 1;
$kelas = 6;
$query = "SELECT siswa.id, siswa.nama, GROUP_CONCAT(alternatif.nilai) FROM alternatif JOIN siswa ON (siswa.id= alternatif.id_siswa) WHERE siswa.kelas = 'Kelas $kelas' GROUP BY siswa.id";

$sql_a = mysqli_query($con, $query) or die(mysqli_error($con));

?>

<head>
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/table_alternatif.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/alternatif.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/buttons.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/base.css'); ?>">

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css">
  <title>Alternatif | Siswa Kelas <?= $kelas; ?></title>
</head>

<body>
  <section class="content">
    <main>

      <div>
        <label for="kelas">
          <h4>Lihat data alternatif: </h4>
        </label>
        <select name="kelas" id="kelas" onchange="location = this.value;">
          <option value="<?= base_url('alternatif/alternatif-1.php'); ?>">Kelas 1</option>
          <option value="<?= base_url('alternatif/alternatif-2.php'); ?>">Kelas 2</option>
          <option value="<?= base_url('alternatif/alternatif-3.php'); ?>">Kelas 3</option>
          <option value="<?= base_url('alternatif/alternatif-4.php'); ?>">Kelas 4</option>
          <option value="<?= base_url('alternatif/alternatif-5.php'); ?>">Kelas 5</option>
          <option value="<?= base_url('alternatif/alternatif-6.php'); ?>" selected>Kelas 6</option>
        </select>
      </div>

      <div class="flex">
        <h2>Data Alternatif Siswa Kelas <?= $kelas; ?> </h2>

        <!-- Button Tambah -->
        <a href="tambah-alternatif.php?kelas=<?= $kelas; ?>" class="btn2 btn-tambah">
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
                <th>Nilai</th>
                <th>Kehadiran</th>
                <th>Sikap Spiritual</th>
                <th>Sikap Sosial</th>
                <th>Sertifikat Lomba</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php

              if (mysqli_num_rows($sql_a) > 0) {
                $data = mysqli_fetch_all($sql_a);
                foreach ($data as $key => $value) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value[1]; ?></td>
                    <!-- Nilai -->
                    <td><?= explode(',', $value[2])[0]; ?></td>
                    <!-- Kehadiran -->
                    <td><?= number_format(explode(',', $value[2])[1], 0); ?></td>
                    <!-- Nilai Spiritual -->
                    <td><?= number_format(explode(',', $value[2])[4] ?? '0', 0); ?></td>
                    <!-- Nilai Sosial -->
                    <td><?= number_format(explode(',', $value[2])[2], 0); ?></td>
                    <!-- Sertifikat Lomba -->
                    <td><?= number_format(explode(',', $value[2])[3], 0); ?></td>
                    <td class="aksi">
                      <div class="buttons">
                        <!-- Button Edit -->
                        <a href="<?= base_url("alternatif/edit-alternatif.php?id=$value[0]&kelas=$kelas"); ?>" class="btn-a btn-edit btn-sm">
                          <i class='bx bxs-edit bx-xs'></i>
                          <span class="btn-text">
                            Edit
                          </span>
                        </a>

                        <!-- Button Hapus -->
                        <a href="<?= base_url("alternatif/delete.php?id=$value[0]&page=$kelas"); ?>" class="btn-a btn-hapus btn-sm">
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

      <div class="buttons">



      </div>
    </main>
  </section>
  <?php include_once('../_footer.php'); ?>
</body>