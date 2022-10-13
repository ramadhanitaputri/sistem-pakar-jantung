<?php 
//include "librari/inc.koneksidb.php";
include "koneksi.php";
# Baca variabel Form (If Register Global ON)
$RbPilih 	= $_REQUEST['RbPilih'];
$TxtKdGejala= $_REQUEST['TxtKdGejala'];

# Mendapatkan No IP
$NOIP 		= $_SERVER['REMOTE_ADDR'];

# Fungsi untuk menambah data ke tmp_analisa
function AddTmpAnalisa($kdgejala, $IP) {
	$sql_sakit = "SELECT relasi.* FROM relasi,tmp_penyakit 
				  WHERE relasi.kd_penyakit=tmp_penyakit.kd_penyakit 
				  AND noip='$IP' ORDER BY relasi.kd_penyakit,relasi.kd_gejala";
	$qry_sakit = mysqli_query($sql_sakit);
	while ($data_sakit = mysqli_fetch_array($qry_sakit)) {
		$sqltmp = "INSERT INTO tmp_analisa (noip, kd_penyakit,kd_gejala)
					VALUES ('$IP','$data_sakit[kd_penyakit]','$data_sakit[kd_gejala]')";
		mysqli_query($sqltmp);
	}
}

# Fungsi hapus tabel tmp_gejala
function AddTmpGejala($kdgejala, $IP) {
	$sql_gejala = "INSERT INTO tmp_gejala (noip,kd_gejala) VALUES ('$IP','$kdgejala')";
	mysqli_query($sql_gejala);
}

# Fungsi hapus tabel tmp_sakit
function DelTmpSakit($IP) {
	$sql_del = "DELETE FROM tmp_penyakit WHERE noip='$IP'";
	mysqli_query($sql_del);
}

# Fungsi hapus tabel tmp_analisa
function DelTmpAnlisa($IP) {
	$sql_del = "DELETE FROM tmp_analisa WHERE noip='$IP'";
	mysqli_query($sql_del);
}

# PEMERIKSAAN
if ($RbPilih == "YA") {
	$sql_analisa = "SELECT * FROM tmp_analisa ";
	$qry_analisa = mysqli_query($koneksi,$sql_analisa);
	$data_cek = mysqli_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		DelTmpSakit($NOIP);
		$sql_tmp = "SELECT * FROM tmp_analisa 
					WHERE kd_gejala='$TxtKdGejala' 
					AND noip='$NOIP'";
		$qry_tmp = mysqli_query($koneksi,$sql_tmp);
		while ($data_tmp = mysqli_fetch_array($qry_tmp)) {
			$sql_rsakit = "SELECT * FROM relasi 
							WHERE kd_penyakit='$data_tmp[kd_penyakit]' 
							GROUP BY kd_penyakit";
			$qry_rsakit = mysqli_query($koneksi,$sql_rsakit);
			while ($data_rsakit = mysqli_fetch_array($qry_rsakit)) {
				// Data penyakit yang mungkin dimasukkan ke tmp
				$sql_input = "INSERT INTO tmp_penyakit (noip,kd_penyakit)
							 VALUES ('$NOIP','$data_rsakit[kd_penyakit]')";
				mysqli_query($koneksi,$sql_input);
			}
		} 
		// Gunakan Fungsi
		DelTmpAnlisa($NOIP);
		AddTmpAnalisa($TxtKdGejala, $NOIP);
		AddTmpGejala($TxtKdGejala, $NOIP);
	}	
	else {
		# Kode saat tmp_analisa kosong
		$sql_rgejala = "SELECT * FROM relasi WHERE kd_gejala='$TxtKdGejala'";
		$qry_rgejala = mysqli_query($koneksi,$sql_rgejala);
		while ($data_rgejala = mysqli_fetch_array($qry_rgejala)) {
			$sql_rsakit = "SELECT * FROM relasi 
						   WHERE kd_penyakit='$data_rgejala[kd_penyakit]' 
						   GROUP BY kd_penyakit";
			$qry_rsakit = mysqli_query($koneksi,$sql_rsakit);
			while ($data_rsakit = mysqli_fetch_array($qry_rsakit)) {
				// Data penyakit yang mungkin dimasukkan ke tmp
				$sql_input = "INSERT INTO tmp_penyakit (noip,kd_penyakit)
							 VALUES ('$NOIP','$data_rsakit[kd_penyakit]')";
				mysqli_query($koneksi,$sql_input);
			}
		} 
		// Menggunakan Fungsi
		AddTmpAnalisa($TxtKdGejala, $NOIP);
		AddTmpGejala($TxtKdGejala, $NOIP);
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?top=konsultasiFm.php'>";
}

if ($RbPilih == "TIDAK") {
	$sql_analisa = "SELECT * FROM tmp_analisa ";
	$qry_analisa = mysqli_query($koneksi,$sql_analisa);
	$data_cek = mysqli_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		$sql_relasi = "SELECT * FROM tmp_analisa WHERE kd_gejala='$TxtKdGejala'";
		$qry_relasi = mysqli_query($koneksi,$sql_relasi);
		while($hsl_relasi = mysqli_fetch_array($qry_relasi)){
			// Hapus daftar relasi yang sudah tidak mungkin dari tabel tmp
			$sql_deltmp = "DELETE FROM tmp_analisa 
							WHERE kd_penyakit='$hsl_relasi[kd_penyakit]' 
							AND noip='$NOIP'";
			mysqli_query($koneksi,$sql_deltmp);
			
			// Hapus daftar penyakit yang sudah tidak ada kemungkinan
			$sql_deltmp2 = "DELETE FROM tmp_penyakit 
						    WHERE kd_penyakit='$hsl_relasi[kd_penyakit]' 
						    AND noip='$NOIP'";
			mysqli_query($koneksi,$sql_deltmp2);
		}		
	}
	else {
		# Pindahkan data relsi ke tmp_analisa
		$sql_relasi= "SELECT * FROM relasi ORDER BY kd_penyakit,kd_gejala";
		$qry_relasi= mysqli_query($koneksi,$sql_relasi);
		while($hsl_relasi=mysqli_fetch_array($qry_relasi)){
			$sql_intmp = "INSERT INTO tmp_analisa (noip, kd_penyakit,kd_gejala)
						  VALUES ('$NOIP','$hsl_relasi[kd_penyakit]',
						  '$hsl_relasi[kd_gejala]')";
			mysqli_query($koneksi,$sql_intmp);
			
			// Masukkan data penyakit yang mungkin terjangkit
			$sql_intmp2 = "INSERT INTO tmp_penyakit(noip,kd_penyakit)
						   VALUES ('$NOIP','$hsl_relasi[kd_penyakit]')";
			mysqli_query($koneksi,$sql_intmp2);				
		}
		
		# Hapus tmp_analisa yang tidak sesuai
		$sql_relasi2 = "SELECT * FROM relasi WHERE kd_gejala='$TxtKdGejala'";
		$qry_relasi2 = mysqli_query($koneksi,$sql_relasi2);
		while($hsl_relasi2 = mysqli_fetch_array($qry_relasi2)){
			$sql_deltmp = "DELETE FROM tmp_analisa 
						   WHERE kd_penyakit='$hsl_relasi2[kd_penyakit]' 
						   AND noip='$NOIP'";
			mysqli_query($koneksi,$sql_deltmp);
			
			// Hapus penyakit yang sudah tidak mungkin
			$sql_deltmp2 = "DELETE FROM tmp_penyakit 
							WHERE kd_penyakit='$hsl_relasi2[kd_penyakit]' 
							AND noip='$NOIP'";
			mysqli_query($koneksi,$sql_deltmp2);
		}
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?top=konsultasiFm.php'>";
}
?>
