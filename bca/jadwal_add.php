 <?php
include_once "library/inc.seslogin.php";

if($_GET) {
	if(isset($_POST['btnSave'])){
		# VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
		$pesanError = array();
	  
	 
		if (trim($_POST['txtKeterangan'])=="") {
			$pesanError[] = "Data <b>Keterangan</b> Tidak Boleh Kosong !";		
		}
 
				
				
		# BACA DATA DALAM FORM, masukkan datake variabel
		 
		$txtIdRequest	= $_POST['txtIdRequest']; 
		$cmbTglMulai	= $_POST['cmbTglMulai']; 
		$cmbTglSelesai	= $_POST['cmbTglSelesai'];
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
			# SIMPAN DATA KE DATABASE. 
			// Jika tidak menemukan error, simpan data ke database 
			$tgl_now=date('Y-m-d');
			$mySql  	= "INSERT INTO penjadwalan (tanggal, tgl_mulai, tgl_selesai, id_request, keterangan)
							VALUES ('$tgl_now',   
									'".InggrisTgl($_POST['cmbTglMulai'])."',   
									'".InggrisTgl($_POST['cmbTglSelesai'])."', 
									'$txtIdRequest', 
									'$txtKeterangan')";
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){
			//UPDATE STATUS JADWAL
			$mySql  = "UPDATE request SET status_jadwal='1' WHERE id='$txtIdRequest'";
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());	
				echo "<meta http-equiv='refresh' content='0; url=?page=PembuatanJadwal-Data'>";
			}
			exit;
		}	
	} // Penutup POST
	
	# MASUKKAN DATA KE VARIABEL
	// Supaya saat ada pesan error, data di dalam form tidak hilang. Jadi, tinggal meneruskan/memperbaiki yg salah
	$Kode= isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode']; 
	$mySql = "SELECT * FROM request WHERE id='$Kode'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query ambil data salah : ".mysql_error());
	while($kolomData = mysql_fetch_array($myQry)) {
	$dataKode		= $kolomData['id'];
 
	}
  
	$cmbTglMulai 	= isset($_POST['cmbTglMulai']) ? $_POST['cmbTglMulai'] : date('Y-m-d'); 
	$cmbTglSelesai 	= isset($_POST['cmbTglSelesai']) ? $_POST['cmbTglSelesai'] : date('Y-m-d'); 	
	$txtKeterangan	= isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : ''; 
 
} // Penutup GET
?>

<p>&nbsp;</p>
<form action="?page=Jadwal-Add" method="post" name="form1" target="_self">
  <table width="700" class="table-list" border="0" cellspacing="1" cellpadding="4">
   <tr>
       <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
    <tr>
       <th colspan="3" align="left"><b>ADD Jadwal</b></th>
    </tr>
    <tr>
      <td><b>ID Request</b></td>
      <td><b>:</b></td>
      <td><input name="txtIdRequest" type="text" value="<?php echo $dataKode; ?>" size="60" maxlength="100" readonly/></td>
    </tr>	
	<tr>
      <td><b>Tanggal Mulai</b></td>
      <td><b>:</b></td>
      <td><input name="cmbTglMulai" type="text" class="tcal" id="cmbTglMulai" value="<?php echo IndonesiaTgl($cmbTglMulai); ?>" /></td>
    </tr>
	<tr>
      <td><b>Tanggal Selesai</b></td>
      <td><b>:</b></td>
      <td><input name="cmbTglSelesai" type="text" class="tcal" id="cmbTglSelesai" value="<?php echo IndonesiaTgl($cmbTglSelesai); ?>" /></td>
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
