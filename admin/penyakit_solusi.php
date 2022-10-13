<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Penyakit dan solusi</title>
<script type="text/javascript">
$(document).ready(function(){
	$("#kd_penyakit").focus();
	})
function validasi(form){
	if(form.kd_penyakit.value==""){
		alert("Masukkan Kode Penyakit..!");
		form.kd_penyakit.focus(); return false;
		}else if(form.nama_penyakit.value==""){
		alert("Masukkan Nama Penyakit..!");
		form.nama_penyakit.focus(); return false;
		}else if(form.definisi.value==""){
		alert("Masukkan Definisi Penyakit..!");
		form.definisi.focus(); return false;
		}else if(form.solusi.value==""){
		alert("Masukkan Solusi Penyakit..!");
		form.solusi.focus();return false	
		}
	}
function konfirmasi(kd_penyakit){
	var kd_hapus=kd_penyakit;
	var url_str;
	url_str="hpspenyakit.php?kdhapus="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?"+kd_hapus);
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	}
</script>
</head>
<body>
<h2>Data Penyakit dan Solusi Penanganannya</h2><hr>
<form name="form3" method="post" onSubmit="return validasi(this);" action="simpanpenyakit.php">
<table class="tab" width="667" border="0" cellpadding="2" cellspacing="1" align="center">
  <tr align="center">
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="88">Kode Penyakit </td>
    <td width="10">:</td>
    <td width="180">
      <input name="kd_penyakit" type="text" id="kd_penyakit" size="4" maxlength="4">
</td>
  </tr>
  <tr valign="top">
    <td>Nama Penyakit</td>
    <td>:</td>
    <td>
      <input type="text" name="nama_penyakit" id="nama_penyakit" size="30" maxlength="30">
    </td>
  </tr>
  <tr valign="top">
    <td>Definisi</td>
    <td>:</td>
    <td>
      <textarea name="definisi" id="definisi" rows="2" cols="70"></textarea>
    </td>
  </tr>
  <tr valign="top">
    <td>Solusi</td>
    <td>:</td>
    <td>
<textarea name="solusi" id="solusi" rows="2" cols="70"></textarea>    
</td>
  </tr>
  <tr>
    <td height="23">&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input name="simpan" type="Submit" id="simpan" value="Simpan">
      <input type="submit" name="Submit" value="Reset">
    </td>
  </tr>
</table>
</form>
<br>
<div class="CSSTableGenerator">
<table id="tabel" width="100%" cellpadding="3" cellspacing="0" border="1" align="center">
  <tr valign="top" bgcolor="#CCCC99">
  	<td width="108"><strong>No.</strong></td>
    <td width="108"><strong>Kode Penyakit </strong></td>
    <td width="200"><strong>Nama Penyakit</strong></td>
	<td width="200"><strong>Definisi</strong></td>
    <td width="256"><strong>Solusi</strong></td>
    <td width="48"><strong>Edit</strong></td>
    <td width="53"><strong>Hapus</strong></td>
  </tr>
  <?php
	//include "inc.connect/connect.php";
	//include "../librari/inc.koneksidb.php";
	include "../koneksi.php";
	$sql = "SELECT * FROM penyakit_solusi ORDER BY kd_penyakit";
	$qry = mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_error());
	$no=0;
	while ($data = mysqli_fetch_array ($qry)) {
	$no++;
   ?>
  <tr valign="baseline">
 	<td><?php echo $no; ?> </td>
    <td><?php echo $data['kd_penyakit']; ?></td>
    <td><?php echo $data['nama_penyakit']; ?></td>
	<td><?php echo $data['definisi']; ?></td>
    <td><?php echo $data['solusi']; ?></td>
    <td><a title="Edit Penyakit" href="edpenyakit.php?kdubah=<?php echo $data['kd_penyakit'];?>"><img src="image/edit.jpeg" width="16" height="16" border="0"></a></td>
    <td><a title="Hapus Penyakit" style="cursor:pointer;" onclick="return konfirmasi('<?php echo $data['kd_penyakit'];?>');"><img src="image/hapus.jpeg" width="16" height="16" ></a>
    </td>
  </tr>
  <?php
  } ?>
</table></div>
</body>
</html>
