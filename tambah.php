<?php

session_start();

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php");
    exit;
}

include 'function.php';

if(isset($_POST['simpan'])){

    if(tambahData($_POST)){

        header("location:index.php");
        exit;

    }else{

        echo "<script>
        alert('Data gagal ditambahkan!');
        </script>";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Tambah Data Mahasiswa</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="form-container">

<h2>Tambah Data Mahasiswa</h2>

<form method="POST">

<label>NIM</label>

<input
type="text"
name="nim"
placeholder="Masukkan NIM"
required>

<label>Nama</label>

<input
type="text"
name="nama"
placeholder="Masukkan Nama"
required>

<label>Program Studi</label>

<input
type="text"
name="prodi"
placeholder="Masukkan Program Studi"
required>

<label>Email</label>

<input
type="email"
name="email"
placeholder="Masukkan Email"
required>

<label>Nomor HP</label>

<input
type="text"
name="no_hp"
placeholder="Masukkan Nomor HP"
required>

<label>Jenis Kelamin</label>

<select
name="jenis_kelamin"
required>

<option value="">
-- Pilih Jenis Kelamin --
</option>

<option value="Laki-laki">
Laki-laki
</option>

<option value="Perempuan">
Perempuan
</option>

</select>

<label>Alamat</label>

<textarea
name="alamat"
placeholder="Masukkan Alamat"
required></textarea>

<div class="button-group">

<button
type="submit"
name="simpan">

Simpan

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
