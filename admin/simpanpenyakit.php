<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Simpan Data Penyakit</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link href="../Image/icon.png" rel="shortcut icon">
</head>
<body>
</body>
</html>
<?php
//include "inc.connect/connect.php";
include "../koneksi.php";
$kd_penyakit=$_POST['kd_penyakit'];
$nama_penyakit=$_POST['nama_penyakit'];
$definisi=$_POST['definisi'];
$solusi=$_POST['solusi'];
//cek keberadaan data
$sql="SELECT kd_penyakit FROM penyakit_solusi WHERE kd_penyakit='$kd_penyakit'";
$sqlrs=mysqli_query($koneksi,$sql);
$rs=mysqli_num_rows($sqlrs);
if($rs==0){
	$perintah="INSERT INTO penyakit_solusi(kd_penyakit,nama_penyakit,definisi,solusi)VALUES('$kd_penyakit','$nama_penyakit','$definisi','$solusi')";
	$berhasil=mysqli_query($koneksi,$perintah);
	//jika data berhasil disimpan
	if($berhasil){
		echo"<center>Penyimpanan Berhasil</center><br>";
		echo "<center><a href='../admin/haladmin.php?top=penyakit_solusi.php'>OK</a></center>";
		}else{
		echo"<center><font color='#ff0000'><strong>Penyimpanan Gagal</strong></font></center><br>";
		echo "<center><a href='../admin/haladmin.php?top=penyakit_solusi.php'>Kembali</a></center>";
		}	
	}else{
	echo"<table style='margin-top:150px;' align='center'><tr><td>";
	echo"<div style='width:500px; height:50px auto; border:1px dashed #CCC; color:#F90; padding:3px 3px 3px 3px;'>";
	echo "<center><font>Kode Gejala $kd_gejala <strong>Telah ada di database, Masukkan Kode Unik..!</strong></font></center><br>";
	echo "<center><a href='../admin/haladmin.php?top=penyakit_solusi.php'>Kembali</a></center>";
	echo"</div>";
	echo"</td></tr></table>";
	}
//$perintah="INSERT INTO penyakit_solusi(kd_penyakit,nama_penyakit,definisi,solusi)VALUES('$kd_penyakit','$nama_penyakit','$definisi','$solusi')";
		
		//$berhasil=mysql_query($perintah) 
			//or die (" Data tidak masuk database / data telah ada ".mysql_error());
			//if ($berhasil)
		//{
			//echo " <center><b>Data Berhasil Disimpan </b></center>";
			//include "haladmin.php?top=penyakit_solusi.php";

		
?>