<?php 
//include "inc.connect/connect.php";
include "../koneksi.php";
$kdsakit = $_REQUEST['CmbPenyakit'];
$sqlp = "SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kdsakit' ";
$qryp = mysqli_query($koneksi,$sqlp);
$datap= mysqli_fetch_array($qryp);
$sakit = $datap['nama_penyakit'];
?>
<html>
<head>
<title>Tampilan Data Gejala Penyakit</title>
<link href="../images/favicon.png" rel="shortcut icon" />
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
</head>
<body>
<div align="left" style="background-color:#CCCC99; width:650;"><b>Nama Penyakit : 
  </b>
</div>
<br>
<div class="CSSTableGenerator">
<table width="650" border="0" align="left" cellpadding="2" cellspacing="1" bgcolor="#99CC99">
  <tr bgcolor="#CCCC99"> 
    <td colspan="3"><b>Daftar Gejala Per Penyakit</b> <br>
      <br></td>
  </tr>
  <tr bgcolor="#CCCC99"> 
    <td width="39" align="center"><b>No</b></td>
    <td width="84"><b>Kode</b></td>
    <td width="361"><b>Nama Gejala</b></td>
  </tr>
  <?php 
	$sqlg  = "SELECT gejala.* FROM gejala,relasi ";
	$sqlg .= "WHERE gejala.kd_gejala=relasi.kd_gejala ";
	$sqlg .= "AND  relasi.kd_penyakit='$kdsakit' ";
	$sqlg .= "ORDER BY gejala.kd_gejala";
	$qryg = mysqli_query($koneksi,$sqlg,)or die ("SQL Error".mysqli_error());
	$no=0;
	while ($datag=mysqli_fetch_array($qryg)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td align="center"><?php echo $no; ?></td>
    <td><?php echo $datag['kd_gejala']; ?></td>
    <td><?php echo $datag['gejala']; ?></td>
  </tr>
  <?php
  }
  ?>
   <tr>
  <td colspan="3" bgcolor="#CCCC99"><div align="right"><a href="haladmin.php?top=LapGejala.php">Kembali</a></div> </td>
</tr>
</table>
</body>
</html>
