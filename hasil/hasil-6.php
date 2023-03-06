<!-- Memasukan Header -->
<?php include_once('../_header.php');

// Mengambil data kriteria
$query = mysqli_query($con, "SELECT * FROM kriteria");
$kriteria = mysqli_fetch_all($query, MYSQLI_ASSOC);

// Mengambil data total nilai kriteria
$queryNilai = mysqli_query($con, "SELECT SUM(nilai) FROM kriteria");
$totalNilai = (float) mysqli_fetch_row($queryNilai)[0];

// mengambil data alternatif
$queryAlternatif = "SELECT siswa.nama as nama, GROUP_CONCAT(alternatif.nilai) as nilai FROM alternatif JOIN siswa ON (siswa.id= alternatif.id_siswa) WHERE siswa.kelas = 'Kelas 6' GROUP BY siswa.id";
$alternatif = mysqli_query($con, $queryAlternatif) or die(mysqli_error($con));
$alternatif = mysqli_fetch_all($alternatif);

// Mencari nilai W
$w = [];
foreach ($kriteria as $key => $value) {
  array_push($w, number_format($value['nilai'] / $totalNilai, 3));
}

// Mencari nilai S

$siswa = [];
foreach ($alternatif as $key => $value) {
  $siswa[$key] = [
    'nama' => $value[0],
    'nilai' => explode(',', $value[1])
  ];
}

$nilaiS = []; // menampung nilai S
$siswaS = 1; // menampung hasil perhitungan nilai S, n^w
$totalS = 0; // menampung total nilai S
foreach ($siswa as $key => $value) {
  $siswaS = 1;
  foreach ($value['nilai'] as $k => $v) {
    $siswaS *= pow($v, $w[$k]);
  }
  $nilaiS[$key] = [
    'siswa' => $value['nama'],
    'nilaiS' => $siswaS
  ];

  $totalS += $siswaS;
}

// Mencari nilai V
foreach ($nilaiS as $key => $value) {
  $nilaiS[$key]['nilaiV'] = $value['nilaiS'] / $totalS;
}

array_multisort(array_map(function ($element) {
  return $element['nilaiV'];
}, $nilaiS), SORT_DESC, $nilaiS);

$no = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/buttons.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/base.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('_assets/dist/css/hasil.css'); ?>">

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css">

  <title>Hasil Sistem Pendukung Keputusan</title>
</head>

<body>
  <section class="content">
    <main>
      <div class="header-text">
        <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'super admin') : ?>
          <label for="kelas">
            <h3>Hasil Sistem Pendukung Keputusan: </h3>
          </label>
          <select name="kelas" id="kelas" onchange="location = this.value;">
            <option value="<?= base_url('hasil/hasil-1.php'); ?>">Kelas 1</option>
            <option value="<?= base_url('hasil/hasil-2.php'); ?>">Kelas 2</option>
            <option value="<?= base_url('hasil/hasil-3.php'); ?>">Kelas 3</option>
            <option value="<?= base_url('hasil/hasil-4.php'); ?>">Kelas 4</option>
            <option value="<?= base_url('hasil/hasil-5.php'); ?>">Kelas 5</option>
            <option value="<?= base_url('hasil/hasil-6.php'); ?>" selected>Kelas 6</option>
          </select>
        <?php endif; ?>
      </div>
      <table id="example1" class="styled-table ui celled table">
        <thead>
          <tr>
            <td>No</td>
            <td>Nama Siswa</td>
            <td>Nilai S</td>
            <td>Nilai V</td>
            <td>Ranking <i class='bx bxs-bar-chart-alt-2'></i></td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($nilaiS as $key => $value) : ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $value['siswa']; ?></td>
              <td><?= number_format($value['nilaiS'], 6); ?></td>
              <td><?= number_format($value['nilaiV'], 6); ?></td>
              <td>#<?= $no; ?></td>
            </tr>
          <?php $no++;
          endforeach; ?>
        </tbody>
      </table>
      <div class="kesimpulan">
        <h4>Kesimpulan</h4>
        <p>Berikut ini merupakan 5 siswa berprestasi berdasarkan perhitungan Weight Product:</p>
        <p>1. <?= $nilaiS[0]['siswa']; ?></p>
        <p>2. <?= $nilaiS[1]['siswa']; ?></p>
        <p>3. <?= $nilaiS[2]['siswa']; ?></p>
        <p>4. <?= $nilaiS[3]['siswa']; ?></p>
        <p>5. <?= $nilaiS[4]['siswa']; ?></p>
      </div>
    </main>
  </section>
  <?php include_once('../_footer.php'); ?>

</body>

</html>