<?php
	//cek load
	if(ereg("connect.php", $_SERVER['PHP_SELF']))
	{
		header('Location: index.php');
		exit;
	}
	
	/*Dibawah ini adalah deklarasi variable untuk Koneksi database*/
	$host="localhost";
	$user="root";
	$pass="";
	$dbName="sistempakargigi";
	
	//Jika koneksi gagal atau pemilihan database gagal, maka akan menampilkan informasi server die
	//Tapi jika kedua-duanya berhasil dilakukan, maka akan melakukan perinta-perintah selanjutnya.
	if((!$koneksi=@mysqli_pconnect($host, $user, $pass)) or (!@mysqli_select_db($koneksi,$dbName)))
	{
		//Variable Server Die, akan digunakan jika koneksi database gagal dilakukan
		include("gagal.php");
		exit;
	}
?>