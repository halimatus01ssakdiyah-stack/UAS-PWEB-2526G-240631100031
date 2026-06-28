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

if(hapusData($id)){

    $_SESSION['notif'] = "Data berhasil dihapus!";

}else{

    $_SESSION['notif'] = "Data gagal dihapus!";

}

header("location:index.php");
exit;

?>
