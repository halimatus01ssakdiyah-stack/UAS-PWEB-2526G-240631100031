<?php

session_start();

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php");
    exit;
}

include 'function.php';

if(!isset($_GET['id'])){
    header("location:index.php");
    exit;
}

$id = $_GET['id'];

$data = tampilData("SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(!$d){
    header("location:index.php");
    exit;
}

if(isset($_POST['update'])){

    if(editData($id,$_POST)){

        header("location:index.php");
        exit;

    }else{

        echo "<script>
        alert('Data gagal diupdate!');
        </script>";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Data Mahasiswa</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="form-container">

<h2>Edit Data Mahasiswa</h2>

<form method="POST">

<label>NIM</label>

<input
type="text"
name="nim"
value="<?php echo $d['nim']; ?>"
required>

<label>Nama</label>

<input
type="text"
name="nama"
value="<?php echo $d['nama']; ?>"
required>

<label>Program Studi</label>

<input
type="text"
name="prodi"
value="<?php echo $d['prodi']; ?>"
required>

<label>Email</label>

<input
type="email"
name="email"
value="<?php echo $d['email']; ?>"
required>

<label>Nomor HP</label>

<input
type="text"
name="no_hp"
value="<?php echo $d['no_hp']; ?>"
required>

<label>Jenis Kelamin</label>

<select
name="jenis_kelamin"
required>

<option value="Laki-laki"
<?php
if($d['jenis_kelamin']=="Laki-laki"){
    echo "selected";
}
?>>

Laki-laki

</option>

<option value="Perempuan"
<?php
if($d['jenis_kelamin']=="Perempuan"){
    echo "selected";
}
?>>

Perempuan

</option>

</select>

<label>Alamat</label>

<textarea
name="alamat"
required><?php echo $d['alamat']; ?></textarea>

<div class="button-group">

<button
type="submit"
name="update">

Update

</button>

<a
href="index.php"
class="kembali">

Kembali

</a>

</div>

</form>

</div>

</body>

</html>
