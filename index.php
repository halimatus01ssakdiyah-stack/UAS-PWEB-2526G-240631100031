<?php

session_start();

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php");
    exit;
}

include 'function.php';

if(isset($_GET['cari'])){

    $cari = $_GET['cari'];

    $data = tampilData("SELECT * FROM mahasiswa
    WHERE nama LIKE '%$cari%'
    OR nim LIKE '%$cari%'
    OR prodi LIKE '%$cari%'");

}else{

    $data = tampilData("SELECT * FROM mahasiswa");

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Data Mahasiswa</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="container">

<?php
if(isset($_SESSION['notif'])){
?>

<div class="notif-hapus">

<?php

echo $_SESSION['notif'];
unset($_SESSION['notif']);

?>

</div>

<?php
}
?>

<h2>Data Mahasiswa</h2>

<div class="top-bar">

<a href="tambah.php" class="btn tambah">
+ Tambah Data
</a>

<a href="logout.php" class="btn logout">
Logout
</a>

</div>

<form method="GET" class="search-box">

<input
type="text"
name="cari"
placeholder="Cari Nama / NIM / Prodi"
value="<?php
if(isset($_GET['cari'])){
    echo $_GET['cari'];
}
?>">

<button type="submit">

Cari

</button>

</form>

<div class="table-container">

<table>

<tr>

<th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Prodi</th>
<th>Email</th>
<th>No HP</th>
<th>Jenis Kelamin</th>
<th>Alamat</th>
<th>Aksi</th>

</tr>

<?php

$no = 1;

while($d = mysqli_fetch_array($data)){

?>

<tr>

<td><?php echo $no++; ?></td>

<td><?php echo $d['nim']; ?></td>

<td><?php echo $d['nama']; ?></td>

<td><?php echo $d['prodi']; ?></td>

<td><?php echo $d['email']; ?></td>

<td><?php echo $d['no_hp']; ?></td>

<td><?php echo $d['jenis_kelamin']; ?></td>

<td><?php echo $d['alamat']; ?></td>

<td>

<a
href="edit.php?id=<?php echo $d['id']; ?>"
class="edit-btn">

Edit

</a>

<a
href="hapus.php?id=<?php echo $d['id']; ?>"
class="hapus-btn"
onclick="return confirm('Yakin ingin menghapus data ini?')">

Hapus

</a>

</td>

</tr>

<?php
}
?>

</table>

</div>

</div>

</body>

</html>
