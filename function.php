<?php

include 'koneksi.php';

/* ===========================
   FUNCTION MENAMPILKAN DATA
=========================== */

function tampilData($query)
{
    global $koneksi;

    $data = mysqli_query($koneksi, $query);

    return $data;
}

/* ===========================
   FUNCTION TAMBAH DATA
=========================== */

function tambahData($data)
{
    global $koneksi;

    $nim = $data['nim'];
    $nama = $data['nama'];
    $prodi = $data['prodi'];
    $email = $data['email'];
    $no_hp = $data['no_hp'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $alamat = $data['alamat'];

    return mysqli_query($koneksi,

    "INSERT INTO mahasiswa
    (nim,nama,prodi,email,no_hp,jenis_kelamin,alamat)

    VALUES

    (
    '$nim',
    '$nama',
    '$prodi',
    '$email',
    '$no_hp',
    '$jenis_kelamin',
    '$alamat'
    )");

}

/* ===========================
   FUNCTION EDIT DATA
=========================== */

function editData($id,$data)
{
    global $koneksi;

    $nim = $data['nim'];
    $nama = $data['nama'];
    $prodi = $data['prodi'];
    $email = $data['email'];
    $no_hp = $data['no_hp'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $alamat = $data['alamat'];

    return mysqli_query($koneksi,

    "UPDATE mahasiswa SET

    nim='$nim',
    nama='$nama',
    prodi='$prodi',
    email='$email',
    no_hp='$no_hp',
    jenis_kelamin='$jenis_kelamin',
    alamat='$alamat'

    WHERE id='$id'

    ");

}

/* ===========================
   FUNCTION HAPUS DATA
=========================== */

function hapusData($id)
{
    global $koneksi;

    return mysqli_query($koneksi,

    "DELETE FROM mahasiswa

    WHERE id='$id'

    ");

}

?>
