<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Data Relasi</title>
</head>

<body>
<h3>Edit Data Relasi</h3><hr />
<form id="form1" name="form1" method="post" action="update_relasi.php" enctype="multipart/form-data"><div>
  <table width="359" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#DBEAF5">
      <tr>
        <td colspan="2"><div align="center"><b>&nbsp;</b></div></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>Kode</td>
        <td><label>
        <select name="TxtKdPenyakit" id="TxtKdPenyakit">
          <option value="NULL">[ Daftar Penyakit ]</option>
          <?php 
	$sqlp = "SELECT * FROM penyakit_solusi ORDER BY kd_penyakit";
	$qryp = mysqli_query($koneksi,$sqlp) 
		    or die ("SQL Error: ".mysqli_error());
	while ($datap=mysqli_fetch_array($qryp)) {
		if ($datap['kd_penyakit']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[kd_penyakit]' $cek>$datap[kd_penyakit]&nbsp;|&nbsp;$datap[nama_penyakit]</option>";
	}
  ?>
        </select><?php $id_relasi=$_GET['id_relasi'];?>
        </label><input name="textrelasi" type="hidden" value="<?php echo $id_relasi?>" /></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td width="124">Gejala</td>
        <td width="224">
          <select name="TxtKdGejala" id="TxtKdGejala">
            <option value="NULL">[ Daftar Gejala]</option>
            <?php 
	$sqlp = "SELECT * FROM gejala ORDER BY kd_gejala";
	$qryg = mysqli_query($koneksi,$sqlp) 
		    or die ("SQL Error: ".mysqli_error());
	while ($datag=mysqli_fetch_array($qryg)) {
		if ($datag['kd_gejala']==$kdgejala) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datag[kd_gejala]' $cek>$datag[kd_gejala]&nbsp;|&nbsp;$datag[gejala]</option>";
	}
  ?>
          </select>
         </td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>Bobot</td>
        <td><select name="txtbobot" id="txtbobot">
        <option value="0">[ Bobot Penyakit ]</option>
        <option value="5">5 | Gejala Dominan</option>
        <option value="3">3 | Gejala Sedang</option>
        <option value="1">1 | Gejala Biasa</option>
        </select></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="Update" /><input type="button" value="Kembali" onclick="self.history.back();" /></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>