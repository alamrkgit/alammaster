<?php
if(isset($_SESSION['SES_ADMIN'])){
# JIKA YANG LOGIN LEVEL ADMIN, menu di bawah yang dijalankan
?>

	<div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
        </ul> 
		<li><a href='?page' title='Halaman Utama'> <i class="fa fa-desktop"></i> Home</a></li>
		<li><a href='?page=Request-Data' title='Request-Data'> <i class="fa fa-desktop"></i> Data Request</a></li> 
		<li><a href='?page=DetailJadwalPerAdmin-Data' title='DetailJadwalPerAdmin'> <i class="fa fa-desktop"></i> Data Jadwal</a></li>  
		<li><a href='?page=Logout' title='Logout (Exit)'> <i class="fa fa-desktop"></i> Logout</a></li>
<?php
}
elseif(isset($_SESSION['SES_SUPERADMIN'])){
# JIKA YANG LOGIN LEVEL SUPERADMIN, menu di bawah yang dijalankan
?>

 <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav"> 
	</ul> 
	<li><a href='?page' title='Halaman Utama'> <i class="fa fa-desktop"></i> Home</a></li>
	<li><a href='?page=User-Data' title='User Login'> <i class="fa fa-desktop"></i> Master Data User</a></li>
   	<li><a href='?page=UserPegawai-Data' title='User Login'> <i class="fa fa-desktop"></i> Master Data User (Pegawai)</a></li>
	<li><a href='?page=Pegawai-Data' title='User Login'> <i class="fa fa-desktop"></i> Master Data Pegawai</a></li>
	<li><a href='?page=CekRequest-Data' title='CekRequest-Data'> <i class="fa fa-desktop"></i> Data Cek Request</a></li>
	<li><a href='?page=PembuatanJadwal-Data' title='PembuatanJadwal-Data'> <i class="fa fa-desktop"></i> Data Pembuatan Jadwal</a></li>
	<li><a href='?page=PengeditanJadwal-Data' title='PengeditanJadwal-Data'> <i class="fa fa-desktop"></i> Data Pengeditan Jadwal</a></li>
	<li><a href='?page=DetailJadwal-Data' title='DetailJadwal-Data'> <i class="fa fa-desktop"></i> Data Detail Jadwal</a></li> 
	<li><a href='?page=TugasPerId-Data' title='Laporan-Pegawai'> <i class="fa fa-desktop"></i> Data Tugas Pegawai</a></li> 		
	<li><a href='?page=Laporan-User' title='Laporan-User'> <i class="fa fa-desktop"></i> Laporan Data User</a></li> 
	<li><a href='?page=Laporan-Pegawai' title='Laporan-Pegawai'> <i class="fa fa-desktop"></i> Laporan Data Pegawai</a></li> 
	<li><a href='?page=Logout' title='Logout (Exit)'> <i class="fa fa-desktop"></i> Logout</a></li>
 
<?php
}


elseif(isset($_SESSION['SES_PEGAWAI'])){
# JIKA YANG LOGIN LEVEL PEGAWAI, menu di bawah yang dijalankan
?>

	<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav">   
	</ul>
	<li><a href='?page' title='Halaman Utama'> <i class="fa fa-desktop"></i> Home</a></li>
    <li><a href='?page=Tugas-Data' title='Tugas-Data'> <i class="fa fa-desktop"></i> Data Tugas</a></li>  
	<li><a href='?page=DetailJadwalPerUser-Data' title='DetailJadwalPerUser'> <i class="fa fa-desktop"></i> Data Jadwal</a></li>  
	<li><a href='?page=Logout' title='Logout (Exit)'> <i class="fa fa-desktop"></i> Logout</a></li>
	</ul>

<?php
}

else {
# JIKA BELUM LOGIN (BELUM ADA SESION LEVEL YG DIBACA)
?>
<ul>
	<li><a href='?page=Login' title='Login System'>Login</a></li>	
</ul>
<?php
}
?>