<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Simpan Relasi</title>
<style type="text/css">
body { margin:50px;background-image:url(../Image/Bottom_texture.jpg);}
div { border:1px dashed #666; background-color:#CCC; padding:10px;}
</style>
</head>
<body>
<div>
<?php 
//include "inc.connect/connect.php"; 
include "../koneksi.php";
# Baca variabel Form (If Register Global ON)
$TxtKdPenyakit=$_POST['TxtKdPenyakit'];
$TxtKdGejala=$_POST['TxtKdGejala'];
$bobot=$_POST['txtbobot'];
# Validasi Form
if (trim($TxtKdPenyakit)=="") {	echo "Kode Penyakit masih kosong, ulangi kembali";	include "relasi.php";}
elseif (trim($TxtKdGejala)=="") { echo "Kode Gejala masih kosong, ulangi kembali";	include "relasi.php";}

$sql_cek = "SELECT * FROM relasi WHERE kd_penyakit='$TxtKdPenyakit' AND kd_gejala='$TxtKdGejala'";
$qry_cek = mysqli_query($koneksi,$sql_cek) 
		   or die ("Gagal Cek".mysqli_error());
$ada_cek = mysqli_num_rows($qry_cek);
if ($ada_cek >=1) {
echo"RELASI TELAH ADA";
include "relasi.php";
	exit;
}
else {
$sqltes = "SELECT * FROM gejala WHERE kd_gejala='$TxtKdGejala'";
$qrytes = mysqli_query($koneksi,$sqltes);
while ($data_tmp = mysqli_fetch_array($qrytes)){

$sql  = " INSERT INTO relasi (kd_penyakit,kd_gejala,bobot) VALUES ('$TxtKdPenyakit','$TxtKdGejala','$bobot')"; 
}
	mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_error());
 
	echo "<center><strong>DATA TELAH BERHASIL DIRELASIKAN..!</strong></center>";
	echo "<center><a href='../admin/haladmin.php?top=relasi.php'>OK</a></center>";
	//header("location: haladmin.php?top=relasi.php");
	//include "relasi.php";
}
?>
</div>
</body>
</html>
