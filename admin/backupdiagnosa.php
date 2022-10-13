<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proses Diagnosa</title>
<style type="text/css">
p{ padding-left:30px;}
</style>
</head>

<body>
<?php
include "/koneksi.php";
$sqlpenyakit="SELECT * FROM relasi GROUP BY kd_penyakit ";
$querypenyakit=mysqli_query($sqlpenyakit);
while($rowpenyakit=mysqli_fetch_array($querypenyakit)){
// data penyakit di tabel relasi
echo $rowpenyakit['kd_penyakit']. "<br>";
$kd_pen=$rowpenyakit['kd_penyakit'];
// cari tabel tmp_gejala
$sql = "SELECT relasi.kd_penyakit,relasi.kd_gejala,relasi.bobot, tmp_gejala.bobot AS bobotTMP FROM relasi,tmp_gejala WHERE relasi.kd_gejala=tmp_gejala.kd_gejala AND  kd_penyakit='$kd_pen'";
$querygejalaTEMP=mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_error());
	while($rowTEMP=mysqli_fetch_array($querygejalaTEMP)){
		$bobotRelasi=$rowTEMP['bobot'];
		$bobotTMP=$rowTEMP['bobotTMP'];
		$querycari=mysqli_query("");
		
		echo "<p>";
		echo $rowTEMP['kd_gejala']. "<br>";
		echo "Bobot tabel relasi" .$bobotRelasi. "<br>" ;
		echo "Bobot tabel TMP" .$bobotTMP. "<br>";
		echo "</p>";
		$kd_gej=$rowTEMP['kd_gejala'];
		$queryRelasi=mysqli_query("SELECT * FROM relasi WHERE");
		}
}
?>
</body>
</html>