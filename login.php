<?php
session_start();

include 'koneksi.php';

if(isset($_SESSION['status']) && $_SESSION['status']=="login"){
    header("location:index.php");
    exit;
}

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi,
    "SELECT * FROM user
    WHERE username='$username'
    AND password='$password'");

    if(mysqli_num_rows($cek) > 0){

        $_SESSION['status'] = "login";
        $_SESSION['username'] = $username;

        header("location:index.php");
        exit;

    }else{

        $error = "Username atau Password salah!";

    }

}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Login Sistem Pendataan Mahasiswa</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="login-container">

<div class="login-box">

<h2>Sistem Pendataan Mahasiswa</h2>

<p class="sub-title">
Silakan login terlebih dahulu
</p>

<?php
if(isset($error)){
?>

<div class="error">
<?php echo $error; ?>
</div>

<?php
}
?>

<form method="POST">

<input
type="text"
name="username"
placeholder="Masukkan Username"
required>

<input
type="password"
name="password"
placeholder="Masukkan Password"
required>

<button
type="submit"
name="login">

Login

</button>

</form>

</div>

</div>

</body>
</html>
