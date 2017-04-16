 2<?php
include_once "library/inc.seslogin.php";

if($_GET) {
	if(isset($_POST['btnSave'])){
		# VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
		$pesanError = array();
	  
	 
		if (trim($_POST['txtKeterangan'])=="") {
			$pesanError[] = "Data <b>Keterangan</b> Tidak Boleh Kosong !";		
		}
 
		# BACA DATA DALAM FORM, masukkan datake variabel
		 
	
		$txtKeterangan	= $_POST['txtKeterangan'];

		# JIKA ADA PESAN ERROR DARI VALIDASI
		if (count($pesanError)>=1 ){
            echo "<div class='mssgBox'>";
			echo "<img src='images/attention.png'> <br><hr>";
				$noPesan=0;
				foreach ($pesanError as $indeks=>$pesan_tampil) { 
				$noPesan++;
					echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
				} 
			echo "</div> <br>"; 
		}
		else {
		$tgl_now=date('Y-m-d');
		$id_user = $_SESSION['SES_LOGIN'];
			# SIMPAN DATA KE DATABASE. 
			// Jika tidak menemukan error, simpan data ke database 
			$mySql  	= "INSERT INTO request (id_user, tanggal, keterangan, status, status_jadwal
												,row_status)
							VALUES (
									'$id_user',  
									'$tgl_now',
									'$txtKeterangan', 
									'pending',
									'0',
									'0')";
		 	 
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){				 
				echo "<meta http-equiv='refresh' content='0; url=?page=Request-Data'>";
			}
			exit;
		}	
	} // Penutup POST
	
	# MASUKKAN DATA KE VARIABEL
	// Supaya saat ada pesan error, data di dalam form tidak hilang. Jadi, tinggal meneruskan/memperbaiki yg salah

	$txtKeterangan	= isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : ''; 
 
} // Penutup GET
?>

<p>&nbsp;</p>
<form action="?page=Request-Add" method="post" name="form1" target="_self">
  <table width="700" class="table-list" border="0" cellspacing="1" cellpadding="4">
   <tr>
       <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
    <tr>
       <th colspan="3" align="left"><b>ADD Request</b></th>
    </tr>
    <tr>
 
	<tr>
      <td><b>Keterangan</b></td>
      <td><b>:</b></td>
      <td><textarea name="txtKeterangan" rows="4" cols="50" value="<?php echo $txtKeterangan; ?>"></textarea></td>
    </tr>
	
   <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <input type="submit" name="btnSave" value=" Kirim Request " />      </td>
    </tr>
  </table>
</form>
