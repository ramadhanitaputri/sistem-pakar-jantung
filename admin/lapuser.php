<?php 
//include "inc.connect/connect.php";
include "../koneksi.php";
?>
<html>
<head>
<title>Tampilan Data Penyakit</title>
<script type="text/javascript">
function konfirmasi(id_user){
	var kd_hapus=id_user;
	var url_str;
	url_str="hapus_user.php?id_user="+kd_hapus;
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
<h2>Daftar Pengguna</h2>
<div class="CSSTableGenerator">
<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#22B5DD">
  <tr bordercolor="#CCFFFF" bgcolor="#DBEAF5"> 
    <td width="29"><div align="center"><strong>No</strong></div></td>
    <td width="147"><div align="center"><b>Nama</b></div></td>
    <td width="74"><div align="center"><strong>Kelamin</strong></div></td>
    <td width="73" align="center"><div align="center"><strong>Umur</strong></div></td>
    <td width="166" align="center"><div align="center"><strong>Alamat</strong></div></td>
    <td width="235" align="center"><div align="center"><strong>Penyakit Yang diderita </strong></div></td>
    <td width="150" align="center"><strong>Tanggal Diagnosa</strong> </td>
  </tr>
  <?php 
  #    <td width="96" align="center"><div align="center	"><strong>Pilih</strong></div></td>
	$sql = "SELECT * FROM analisa_hasil,penyakit_solusi WHERE analisa_hasil.kd_penyakit=penyakit_solusi.kd_penyakit order by id";
	//$sql="SELECT * FROM analisa_hasil";
	$qry = mysqli_query($koneksi,$sql)  or die ("SQL Error".mysqli_error());
	$no=0;
	while ($data=mysqli_fetch_array($qry)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td><?php echo $no; ?></td>
    <td><?php echo $data['nama']; ?></td>
    <td><?php echo $data['kelamin']; ?></td>
    <td><?php echo $data['umur']; ?></td>
    <td><?php echo $data['alamat']; ?></td>
    <td><?php echo $data['nama_penyakit']; ?> ( <?php echo $data['kd_penyakit']; ?> )</td>
    <td><?php echo $data['tanggal']; ?>&nbsp;|<a title="hapus pengguna" style="cursor:pointer;" onClick="return konfirmasi('<?php echo $data['id'];?>')"><img src="image/hapus.jpeg" width="16" height="16" ></a></td>
  </tr>
  <?php
  }
  ?>
</table>
</div>
</body>
</html>
