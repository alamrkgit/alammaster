TES2
<?php
# KONTROL MENU PROGRAM
if($_GET) {
	// Jika mendapatkan variabel URL ?page
	switch ($_GET['page']){				
		case '' :				
			if(!file_exists ("main.php")) die ("Empty Main Page!"); 
			include "main.php";	break;
			
		case 'HalamanUtama' :				
			if(!file_exists ("main.php")) die ("Sorry Empty Page!"); 
			include "main.php";	break;
			
		case 'Login' :				
			if(!file_exists ("login.php")) die ("Sorry Empty Page!"); 
			include "login.php"; break;
			
		case 'Login-Validasi' :				
			if(!file_exists ("login_validasi.php")) die ("Sorry Empty Page!"); 
			include "login_validasi.php"; break;
			
		case 'Logout' :				
			if(!file_exists ("login_out.php")) die ("Sorry Empty Page!"); 
			include "login_out.php"; break;		

		# USER LOGIN
		case 'User-Data' :
			if(!file_exists ("user_data.php")) die ("Sorry Empty Page!"); 
			include "user_data.php";	 break;		
		case 'User-Add' :
			if(!file_exists ("user_add.php")) die ("Sorry Empty Page!"); 
			include "user_add.php";	 break;		
		case 'User-Delete' :
			if(!file_exists ("user_delete.php")) die ("Sorry Empty Page!"); 
			include "user_delete.php"; break;		
		case 'User-Edit' :				
			if(!file_exists ("user_edit.php")) die ("Sorry Empty Page!"); 
			include "user_edit.php"; break;	
		
		# USER PEGAWAI
		case 'UserPegawai-Data' :
			if(!file_exists ("user_pegawai_data.php")) die ("Sorry Empty Page!"); 
			include "user_pegawai_data.php";	 break;		
		case 'UserPegawai-Add' :
			if(!file_exists ("user_pegawai_add.php")) die ("Sorry Empty Page!"); 
			include "user_pegawai_add.php";	 break;		
		case 'UserPegawai-Delete' :
			if(!file_exists ("user_pegawai_delete.php")) die ("Sorry Empty Page!"); 
			include "user_pegawai_delete.php"; break;		
		case 'UserPegawai-Edit' :				
			if(!file_exists ("user_pegawai_edit.php")) die ("Sorry Empty Page!"); 
			include "user_pegawai_edit.php"; break;	
			
		# PEGAWAI
		case 'Pegawai-Data' :
			if(!file_exists ("pegawai_data.php")) die ("Sorry Empty Page!"); 
			include "pegawai_data.php";	 break;		
		case 'Pegawai-Add' :
			if(!file_exists ("pegawai_add.php")) die ("Sorry Empty Page!"); 
			include "pegawai_add.php";	 break;		
		case 'Pegawai-Delete' :
			if(!file_exists ("pegawai_delete.php")) die ("Sorry Empty Page!"); 
			include "pegawai_delete.php"; break;		
		case 'Pegawai-Edit' :				
			if(!file_exists ("pegawai_edit.php")) die ("Sorry Empty Page!"); 
			include "pegawai_edit.php"; break;	

		# REQUEST
		case 'Request-Data' :
			if(!file_exists ("request_data.php")) die ("Sorry Empty Page!"); 
			include "request_data.php";	 break;		
		case 'Request-Add' :
			if(!file_exists ("request_add.php")) die ("Sorry Empty Page!"); 
			include "request_add.php";	 break;		
		case 'Request-Delete' :
			if(!file_exists ("request_delete.php")) die ("Sorry Empty Page!"); 
			include "request_delete.php"; break;		
		case 'Request-Edit' :				
			if(!file_exists ("request_edit.php")) die ("Sorry Empty Page!"); 
			include "request_edit.php"; break;		
		case 'CekRequest-Data' :				
			if(!file_exists ("cek_request.php")) die ("Sorry Empty Page!"); 
			include "cek_request.php"; break;	
		case 'CekRequest-Edit' :				
			if(!file_exists ("cek_request_edit .php")) die ("Sorry Empty Page!"); 
			include "cek_request_edit .php"; break;	
		case 'PembuatanJadwal-Data' :				
			if(!file_exists ("pembuatan_jadwal.php")) die ("Sorry Empty Page!"); 
			include "pembuatan_jadwal.php"; break;		
		case 'PengeditanJadwal-Data' :
			if(!file_exists ("pengeditan_jadwal.php")) die ("Sorry Empty Page!"); 
			include "pengeditan_jadwal.php";	 break;		
			
		
		# PENJADWALAN
		case 'Jadwal-Add' :
			if(!file_exists ("jadwal_add.php")) die ("Sorry Empty Page!"); 
			include "jadwal_add.php";	 break;		
		case 'Jadwal-Edit' :
			if(!file_exists ("jadwal_edit.php")) die ("Sorry Empty Page!"); 
			include "jadwal_edit.php";	 break;		
		case 'DetailJadwal-Data' :
			if(!file_exists ("detail_jadwal.php")) die ("Sorry Empty Page!"); 
			include "detail_jadwal.php";	 break;	
		case 'PegawaiDetail-Add' :
			if(!file_exists ("pegawai_detail_add.php")) die ("Sorry Empty Page!"); 
			include "pegawai_detail_add.php";	 break;	
		case 'PegawaiJadwal-Data' :
			if(!file_exists ("pegawai_jadwal_data.php")) die ("Sorry Empty Page!"); 
			include "pegawai_jadwal_data.php";	 break;
		case 'PegawaiJadwal-Delete' :
			if(!file_exists ("pegawai_jadwal_delete.php")) die ("Sorry Empty Page!"); 
			include "pegawai_jadwal_delete.php";	 break;	
		case 'DetailJadwalPerUser-Data' :
			if(!file_exists ("detail_jadwal_per_user.php")) die ("Sorry Empty Page!"); 
			include "detail_jadwal_per_user.php";	 break;
			
		case 'DetailJadwalPerAdmin-Data' :
			if(!file_exists ("detail_jadwal_per_admin.php")) die ("Sorry Empty Page!"); 
			include "detail_jadwal_per_admin.php";	 break;		
		case 'PegawaiJadwalPerAdmin-Data' :
			if(!file_exists ("pegawai_jadwal_peradmin_data.php")) die ("Sorry Empty Page!"); 
			include "pegawai_jadwal_peradmin_data.php";	 break;			
			
		# TUGAS
		case 'Tugas-Data' :
			if(!file_exists ("tugas_data.php")) die ("Sorry Empty Page!"); 
			include "tugas_data.php";	 break;		
		case 'Tugas-Add' :
			if(!file_exists ("tugas_add.php")) die ("Sorry Empty Page!"); 
			include "tugas_add.php";	 break;		
		case 'Tugas-Delete' :
			if(!file_exists ("tugas_delete.php")) die ("Sorry Empty Page!"); 
			include "tugas_delete.php"; break;		
		case 'Tugas-Edit' :				
			if(!file_exists ("tugas_edit.php")) die ("Sorry Empty Page!"); 
			include "tugas_edit.php"; break;				 
		case 'TugasPerId-Data' :
			if(!file_exists ("tugas_perid_data.php")) die ("Sorry Empty Page!"); 
			include "tugas_perid_data.php";	 break;			
		 
						
			# REPORT INFORMASI / LAPORAN DATA
	 

			// INFORMASI DAN LAPORAN
			case 'Laporan-User' :				
				if(!file_exists ("laporan_user.php")) die ("Sorry Empty Page!"); 
				include "laporan_user.php"; break;
			case 'Laporan-Pegawai' :				
				if(!file_exists ("laporan_pegawai.php")) die ("Sorry Empty Page!"); 
				include "laporan_pegawai.php"; break;
			case 'LaporanTugasPerId' :				
				if(!file_exists ("laporan_tugas_perid.php")) die ("Sorry Empty Page!"); 
				include "laporan_tugas_perid.php"; break;	
		 
				
		default:
			if(!file_exists ("main.php")) die ("Empty Main Page!"); 
			include "main.php";						
		break;
	}



}

else {
	// Jika tidak mendapatkan variabel URL : ?page
	if(!file_exists ("main.php")) die ("Empty Main Page!"); 
	include "main.php";	
}
?>