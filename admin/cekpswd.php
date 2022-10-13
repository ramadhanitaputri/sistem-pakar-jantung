<?php
session_start();
include "../koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

if (trim($username)=="") {
	echo "<div align=center><b>Nama Belum diisi !!</b><br>";
	echo "Harap diisi terlebih dahulu</div>";
	exit;
}
elseif (trim($password)=="") {
	echo "<div align=center><b>Password Belum diisi !!</b><br>";
	echo "Harap diisi terlebih dahulu</div>";
	exit;
}
$passwordhash = md5($password);  // mengenkripsikannya untuk dicocokan dengan database
$perintahnya = "select username, password from login where username = '$username' and PASSWORD = '$password'";
$jalankanperintahnya = mysqli_query($koneksi,$perintahnya);
$ada_apa_enggak = mysqli_num_rows($jalankanperintahnya);
if ($ada_apa_enggak >= 1 )
{
	$SES_USER = $username;
	//session_register ("SES_USER");
	$_SESSION['username'] = $username;
	echo "<meta http-equiv='refresh' content='0; url=haladmin.php?top=home.php'>";
}
else
echo "<div align=center>Username dan Password tidak sesuai</div>";
echo "<div align=center><a href='index.php'>Coba Lagi</a></div>";        
?>