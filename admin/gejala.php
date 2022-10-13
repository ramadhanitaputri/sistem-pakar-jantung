<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function validasi(form){
	if(form.kd_gejala.value==""){
		alert("Masukkan kode gejala..!");
		form.kd_gejala.focus(); return false;
		}else if(form.gejala.value==""){
		alert("Masukkan gejala..!");
		form.gejala.focus(); return false;	
		}
		form.submit();
	}
function konfirmasi(kd_gejala){
	var kd_hapus=kd_gejala;
	var url_str;
	url_str="hpsgejala.php?kdhapus="+kd_hapus;
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
<h2>Data Gejala-gejala</h2>
<form name="form3" onSubmit="return validasi(this);" method="post" action="simpangejala.php">
<table class="tab" width="477" border="0" align="center">
  <tr>
    <td colspan="3"><div align="center"></div></td>
  </tr>
  <tr>
    <td width="95">Kode gejala </td>
    <td width="8">:</td>
    <td width="224">
      <input name="kd_gejala" type="text" id="kd_gejala" size="4" maxlength="4">
    </td>
  </tr>
  <tr>
    <td> Gejala </td>
    <td>:</td>
    <td>
      <textarea name="gejala" rows="2" cols="40" id="gejala"></textarea>
    </td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input name="simpan" type="submit" id="simpan" value="Simpan">
      <input type="reset" name="reset" value="Reset">
    </td>
  </tr>
</table>
</form>
<div class="CSSTableGenerator">          
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr bgcolor="#CCCC99" align="center">
    <td width="85"><strong>Kode Gejala</strong></td>
    <td width="505"><strong>Gejala</strong></td>
    <td width="50"><strong>Edit</strong></td>
    <td width="50"><strong>Hapus</strong></td>
  </tr>
  <tr>
    <?php
	//include("inc.connect/connect.php");
	include "../koneksi.php";
	$sql = "SELECT * FROM gejala ORDER BY kd_gejala";
	$qry = mysqli_query($koneksi,$sql) or die ("SQL Error".mysqli_error());
	$no=0;
	while ($data = mysqli_fetch_array ($qry)) {
	$no++;
   ?>

  <tr>
    <td><?php echo $data['kd_gejala']; ?></td>
    <td><?php echo $data['gejala']; ?></td>
    <td><a title="Edit Penyakit" href="edgejala.php?kdubah=<?php echo $data['kd_gejala'];?>"><img src="image/edit.jpeg" width="16" height="16" border="0"></a></td>
    <td><a title="Hapus Gejala" style="cursor:pointer;" onclick="return konfirmasi('<?php echo $data['kd_gejala'];?>');"><img src="image/hapus.jpeg" width="16" height="16" ></a></td>
  </tr>
  <?php
  } ?>
</table></div>
<p>&nbsp; </p>
</body>
</html>