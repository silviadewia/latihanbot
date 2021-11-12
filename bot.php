<?php

require("koneksi.php");

$tujuan = $_POST['tujuan'];
$pesan = $_POST['pesan'];
$pengirim = $_POST['pengirim'];
$bot = (string) $_POST['is_bot'];
$tanggal = date('Y-m-d H:i:s');


// jika is_bot == 0 kirim semua pesan
// selebihnya kiim pesan 1
if ($bot == 0) {
    $simpanpesan = mysqli_query($conn, "INSERT into pesan (tujuan, isi, pengirim, tanggal, is_bot) VALUES ('$tujuan', '$pesan', '$pengirim', '$tanggal', '$bot')");
    $simpanpesan_bot = mysqli_query($conn, "INSERT into pesan (tujuan, isi, pengirim, tanggal, is_bot) VALUES ('$pengirim', 'mohon tunggu cs kami akan melayani anda', 'robot', '$tanggal', '1')");
    if ($simpanpesan && $simpanpesan_bot) {
        header('location:index.php');
    } else {
        echo "Data gagal disimpan " . mysqli_errno($conn);
    }
} else{
    $simpanpesan = mysqli_query($conn, "INSERT into pesan (tujuan, isi, pengirim, tanggal, is_bot) VALUES ('$tujuan', '$pesan', '$pengirim', '$tanggal', '$bot')");
    if($simpanpesan){
        header('location:admin.php');
    }else{
        echo "Data gagal disimpan " . mysqli_errno($conn);
    }
}