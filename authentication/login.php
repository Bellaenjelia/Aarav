<!--
  login guru
  username : 1
  password : 1

  =====

  login siswa
  username : siswa
  password : siswa
-->
<?php
include 'koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $cek_pengelola = mysqli_query($koneksi, "SELECT*FROM pengelola WHERE username = '$username' AND password = '$password'");
  if (mysqli_num_rows($cek_pengelola) > 0) {
      $_SESSION['user'] = mysqli_fetch_array($cek_pengelola);
      echo '<script>alert("Login Berhasil, Selamat Datang!"); location.href="../admin-web/index.php"</script>';
  } else {
    $cek_guru = mysqli_query($koneksi, "SELECT*FROM guru WHERE id_guru = '$username' AND password = '$password'");

    if (mysqli_num_rows($cek_guru) > 0) {
      $_SESSION['user'] = mysqli_fetch_array($cek_guru);
      echo '<script>alert("Login Berhasil, Selamat Datang!"); location.href="../admin-web/index.php"</script>';
  } else {
      $cek_siswa = mysqli_query($koneksi, "SELECT*FROM siswa WHERE username = '$username' AND password = '$password'");

      if (mysqli_num_rows($cek_siswa) > 0) {
      $_SESSION['user'] = mysqli_fetch_array($cek_siswa);
      echo '<script>alert("Login Berhasil, Selamat Datang!"); location.href="../index.php"</script>';
      } else {
      echo '<script>alert("Maaf, Username/Password salah")</script>';
      }
  }
}
}

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $cek_siswa = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa WHERE username='$username'"));
  $cek_guru = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru='$username'"));

  if ($cek_siswa > 0 || $cek_guru > 0) {
      echo '<script>alert("Username sudah digunakan");</script>';
  } else {
      $query = mysqli_query($koneksi, "INSERT INTO siswa (username, password) VALUES ('$username', '$password')");
      if ($query) {
          echo '<script>alert("Register Berhasil, Silahkan Login!");</script>';
      } else {
          echo '<script>alert("Register Gagal!");</script>';
      }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/login.css"/>
    <link href="../assets/img/icon.png" rel="icon">
    <link href="../assets/img/icon.png" rel="apple-touch-icon">
    <title>Aarav - Bimbingan Konseling dan Aduan</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" class="sign-in-form">
            <h2 class="title">Log in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" autocomplete="off">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" autocomplete="off">
            </div>
            <button type="submit" value="Login" class="btn solid" name="login">Submit</button>
          </form>
          <form method="post" class="sign-up-form">
            <h2 class="title">Register</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" autocomplete="off">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" autocomplete="off">
            </div>
            <button type="submit" class="btn" value="Sign up" name="register">Submit</button>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Register
            </button>
          </div>
          <img src="../assets/img/login.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Log in
            </button>
          </div>
          <img src="../assets/img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../assets/js/app.js"></script>
  </body>
</html>
