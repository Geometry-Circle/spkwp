<?php
include_once('../_header.php');

$query = mysqli_query($con, "SELECT * FROM kriteria");
$kriteria = mysqli_fetch_all($query, MYSQLI_ASSOC);

$queryNilai = mysqli_query($con, "SELECT SUM(nilai) FROM kriteria");
$totalNilai = (float) mysqli_fetch_row($queryNilai)[0];
$totalBobotW = 0;
$no = 1;
?>

<html>

<head>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css">
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/kriteria.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/buttons.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/base.css'); ?>">


  <title>Data Kriteria</title>
</head>

<body>
  <section class="content">
    <main>
      <div>
        <h2 class="box-title">Data Kriteria</h2>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="styled-table ui celled table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kriteria</th>
              <th>Nilai (%)</th>
              <th>Bobot W</th>
              <?php if($_SESSION['level'] == 'admin'): ?>
              <th>Aksi</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kriteria as $key => $value) : ?>
              <tr>
                <td><?= $no; ?></td>
                <td><?= $value['nama']; ?></td>
                <td><?= $value['nilai']; ?></td>
                <td>
                  <?= number_format($value['nilai'] / $totalNilai, 1); ?>
                </td>

              <?php if($_SESSION['level'] == 'admin'): ?>
                <td class="aksi">
                  <a href="edit-kriteria.php?id=<?= $value['id'] ?>" class="btn-a btn-sm btn-edit">
                    <i class='bx bxs-edit bx-xs'></i>
                    Edit
                  </a>
                </td>
              <?php endif; ?>

              </tr>
            <?php $no++;
              $bobotW = number_format($value['nilai'] / $totalNilai, 3);
              $totalBobotW += $bobotW;
            endforeach; ?>
            <tr>
              <td style="width: 10px">Jumlah</td>
              <td></td>
              <td><?= $totalNilai; ?></td>
              <td><?= number_format($totalBobotW, 1); ?></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </section>
  </div>
  <?php include_once('../_footer.php'); ?>
</body>

</html>