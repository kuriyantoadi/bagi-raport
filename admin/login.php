<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title></title>
</head>

<body>
  <link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <!-- <script src="js/bootstrap.min.js"></script> -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <script src="../js/jquery-latest.js"></script>
  <link href='#' rel='shortcut icon' type='image/x-icon' />
  <script charset="utf-8"></script>
  <link rel="stylesheet" href="../css/login.css">
  <!-- Include the above in your HEAD tag ---------->

  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <?php
        if (isset($_GET['pesan'])) {
          if ($_GET['pesan'] == "gagal") {
            echo "
						<div class='alert alert-danger' role='alert'>
							<center>Maaf NISN anda salah!
              <br>Jika NISN anda tidak bisa hubungi Wali Kelas
						</div>";
          } elseif ($_GET['pesan'] == "logout") {
            echo "
						<div class='alert alert-warning' role='alert'>
							<center>Anda Berhasil Logout
						</div>
						";
          } elseif ($_GET['pesan'] == "belum_login") {
            echo "
						<div class='alert alert-danger' role='alert'>
							<center>Maaf anda harus login dulu
						</div>";
          }
        }
        ?>
        <h5 style="margin-top:  40px; margin-bottom: 40px;">Program Bagi Raport SMKN 1 Kragilan<br>Login Guru</h5>

      </div>

      <!-- Login Form -->

      <form method="post" action="cek_login.php">
        <input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
        <input type="text" id="login" class="fadeIn second" name="password" placeholder="Password">
        <input type="submit" class="fadeIn fourth">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>
</body>

</html>