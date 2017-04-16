<?php
include_once "library/inc.seslogin.php";

if($_GET) {
	if(isset($_POST['btnSave'])){
		# VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
		$pesanError = array();
	  
	 
		if (trim($_POST['txtTptTugas'])=="") {
			$pesanError[] = "Data <b>Tempat Tugas</b> Tidak Boleh Kosong !";		
		}
		if (trim($_POST['txtStatus'])=="") {
			$pesanError[] = "Data <b>Status</b> Tidak Boleh Kosong !";		
		}
		if (trim($_POST['txtKeterangan'])=="") {
			$pesanError[] = "Data <b>Keterangan</b> Tidak Boleh Kosong !";		
		}
 	
				
		# BACA DATA DALAM FORM, masukkan datake variabel
		$cmbTanggal	= $_POST['cmbTanggal'];
		$txtTptTugas	= $_POST['txtTptTugas'];
		$txtStatus	= $_POST['txtStatus'];
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
			$id_user = $_SESSION['SES_LOGIN'];
			$id_master = $_SESSION['SES_MASTER'];
			# SIMPAN DATA KE DATABASE. 
			// Jika tidak menemukan error, simpan data ke database 
			$mySql  	= "INSERT INTO tugas (id_pegawai, id_master, tanggal, tpt_tugas, keterangan, status)
							VALUES (
									'$id_user',
									'$id_master',									
									'".InggrisTgl($_POST['cmbTanggal'])."',
									'$txtTptTugas',
									'$txtKeterangan',
									'$txtStatus')";
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){
				echo "<meta http-equiv='refresh' content='0; url=?page=Tugas-Data'>";
			}
			exit;
		}	
	} // Penutup POST
	
	# MASUKKAN DATA KE VARIABEL
	// Supaya saat ada pesan error, data di dalam form tidak hilang. Jadi, tinggal meneruskan/ 
	$cmbTanggal 	= isset($_POST['cmbTanggal']) ? $_POST['cmbTanggal'] : date('d-m-Y'); 
	$txtTptTugas	= isset($_POST['txtTptTugas']) ? $_POST['txtTptTugas'] : '';
	$txtKeterangan	= isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : ''; 
	$txtStatus	= isset($_POST['txtStatus']) ? $_POST['txtStatus'] : ''; 
 
} // Penutup GET
?>

<p>&nbsp;</p>
<form action="?page=Tugas-Add" method="post" name="form1" target="_self">
  <table width="700" class="table-list" border="0" cellspacing="1" cellpadding="4">
   <tr>
       <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
    <tr>
       <th colspan="3" align="left"><b>ADD Tugas</b></th>
    </tr>

	<tr>
      <td><b>Tanggal</b></td>
      <td><b>:</b></td>
      <td><input name="cmbTanggal" type="text" class="tcal" id="cmbTanggal" value="<?php echo $cmbTanggal; ?>" /></td>
    </tr> 
	 <tr>
      <td><b>Tempat Tugas</b></td>
      <td><b>:</b></td>
      <td><input name="txtTptTugas" type="text" value="<?php echo $txtTptTugas; ?>" size="60" maxlength="100" /></td>
    </tr>
	 <tr>
      <td><b>Status</b></td>
      <td><b>:</b></td>
      <td><input name="txtStatus" type="text" value="<?php echo $txtStatus; ?>" size="60" maxlength="100" /></td>
    </tr>
	<tr>
      <td><b>Keterangan</b></td>
      <td><b>:</b></td>
      <td><input name="txtKeterangan" type="text" value="<?php echo $txtKeterangan; ?>" size="60" maxlength="100" /></td>
    </tr>
	
   <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <input type="submit" name="btnSave" value=" Simpan " />      </td>
    </tr>
  </table>
</form>
