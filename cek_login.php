<?php 
// mengaktifkan session php


// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$nama = $_POST['Nama'];
$pass = $_POST['sandi'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from akun where Nama_Pengguna='$nama' and password='$pass'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	session_start();
	$_SESSION['Nama_Pengguna'] = $nama;
	$_SESSION['status'] = "login";
	
  
  	setcookie("message","delete",time()-1); // Kita delete cookie message
	header("location:homepage.php");
}else{
	header("location:login.php?pesan=gagal");
}
?>