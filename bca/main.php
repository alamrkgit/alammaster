<?php
if(isset($_SESSION['SES_ADMIN'])) {
	echo "<h2 style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat datang</h2></p>";
	echo "<b> Anda login sebagai Admin";
	include "login_info.php";
	exit;
}
else if(isset($_SESSION['SES_PEGAWAI'])) {
	echo "<h2 style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat datang</h2></p>";
	echo "<b> Anda login sebagai Pegawai";
	include "login_info.php";
	exit;
}
else if(isset($_SESSION['SES_SUPERADMIN'])) {
	echo "<h2 style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat datang</h2></p>";
	echo "<b> Anda login sebagai Superadmin";
	include "login_info.php";
	exit;
}
else {
	echo "<h2 style='margin:-5px 0px 5px 0px; padding:0px;'>Selamat datang</h2></p>";
	echo "<b>Anda belum login, silahkan <a href='?page=Login' alt='Login'>login</a> untuk mengakses sistem ini ";	
}
?>