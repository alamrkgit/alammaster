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
  
		 
			# SIMPAN DATA KE DATABASE. 
			// Jika tidak menemukan error, simpan data ke database
			$mySql  = "UPDATE tugas SET tanggal='".InggrisTgl($_POST['cmbTanggal'])."', tpt_tugas='$txtTptTugas', keterangan='$txtKeterangan', status='$txtStatus' WHERE id='".$_POST['txtKode']."'";
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){
				echo "<meta http-equiv='refresh' content='0; url=?page=Tugas-Data'>";
			}
			exit;
		 
	} // Penutup POST


		# TAMPILKAN DATA DARI DATABASE, Untuk ditampilkan kembali ke form edit
	$Kode= isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode']; 
	$mySql = "SELECT * FROM tugas WHERE id='$Kode'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query ambil data salah : ".mysql_error());
	while($kolomData = mysql_fetch_array($myQry)) {
		$dataKode		= $kolomData['id'];
		$cmbTanggal	= isset($_POST['cmbTanggal']) ? $_POST['cmbTanggal'] : date('d-m-Y');
		$dataTptTugas	= isset($kolomData['tpt_tugas']) ?  $kolomData['tpt_tugas'] : $_POST['txtTptTugas']; 
		$dataCmbTgl	= isset($kolomData['tanggal']) ?  $kolomData['tanggal'] : $_POST['cmbTanggal'];
		$dataStatus	= isset($kolomData['status']) ?  $kolomData['status'] : $_POST['txtStatus']; 
		$dataKeterangan	= isset($kolomData['keterangan']) ?  $kolomData['keterangan'] : $_POST['txtKeterangan']; 
	}
} // Penutup GET
?>


<p>&nbsp;</p>
<form action="?page=Tugas-Edit" method="post" name="form1" target="_self">
  <table width="700" class="table-list" border="0" cellspacing="1" cellpadding="4">
   <tr>
       <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
      <th colspan="3"><b>[ UBAH ] TUGAS </b></th>
    </tr>
    <input name="txtKode" type="hidden" value="<?php echo $dataKode; ?>" />

	 <tr>
      <td><b>Tanggal</b></td>
      <td><b>:</b></td>
      <td><input name="cmbTanggal" type="text" class="tcal" id="cmbTanggal" value="<?php echo IndonesiaTgl($dataCmbTgl); ?>" /></td>
    </tr>
	<tr>
      <td><b>Tempat Tugas</b></td>
      <td><b>:</b></td>
      <td><input name="txtTptTugas" type="text" value="<?php echo $dataTptTugas; ?>" size="60" maxlength="100" /></td>
    </tr>  
	<tr>
      <td><b>Status</b></td>
      <td><b>:</b></td>
      <td><input name="txtStatus" type="text" value="<?php echo $dataStatus; ?>" size="60" maxlength="100" /></td>
    </tr> 
	<tr>
      <td><b>Keterangan</b></td>
      <td><b>:</b></td>
      <td><input name="txtKeterangan" type="text" value="<?php echo $dataKeterangan; ?>" size="60" maxlength="100" /></td>
    </tr>
	 
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <input type="submit" name="btnSave" value=" Simpan " /> </td>
    </tr>
     
  </table>
</form>
