<?php
require_once '../_config/config.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK Metode WP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 5.2.2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/_assets/dist/css/bootstrap-5.2.2/css/bootstrap.min.css">
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/_assets/dist/css/AdminLTE.min.css"> -->
  <!-- Style css -->
  <link rel="stylesheet" href="<?= base_url() ?>/_assets/dist/css/style.css">
</head>

<body>

  <div class="bg-img d-flex justify-content-center align-items-center">
    <div class="card col-lg-3 col-10 p-4">
      <h4 class="mb-4 text-success fw-bold">Selamat Datang</h4>

      <!-- Feedback Validation -->
      <?php if (isset($_GET['feedback'])) : ?>
        <div class="<?= $_GET['feedback']; ?>">
          <p class="text-danger fw-semibold">Username atau Password salah!</p>
        </div>
      <?php endif; ?>

      <form action="validate.php" method="POST" class="requires-validation" novalidate>

        <!-- Input Username -->
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" name="username" class="form-control w-100" required>
          <div class="invalid-feedback">
            Masukkan username
          </div>

        </div>

        <div class="mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" name="password" class="form-control w-100" required>
          <div class="invalid-feedback">
            Masukkan password
          </div>
        </div>

        <div class="d-flex flex-row-reverse mb-3">
          <button type="submit" name="submit" class="btn btn-success p-2 px-2 mt-3 w-25">Masuk</button>
        </div>
      </form>

    </div>
  </div>


  <script src="<?= base_url() ?>/_assets/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/_assets/dist/css/bootstrap-5.2.2/js/bootstrap.min.js"></script>
  <script>
    (function() {
      'use strict'
      const forms = document.querySelectorAll('.requires-validation')
      Array.from(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>
</body>

</html>