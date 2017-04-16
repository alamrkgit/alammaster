<?php
include_once "library/inc.seslogin.php";

if($_GET) {
	if(isset($_POST['btnSave'])){
		# VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
		$pesanError = array();
		if (trim($_POST['txtIdPegawai'])=="") {
			$pesanError[] = "Data <b>ID Pegawai</b> Tidak Boleh Kosong !";		
		}
		if (trim($_POST['txtNama'])=="") {
			$pesanError[] = "Data <b>Nama</b> Tidak Boleh Kosong !";		
		}
		if (trim($_POST['txtAlamat'])=="") {
			$pesanError[] = "Data <b>Alamat</b> Tidak Boleh Kosong !";		
		}
		if (trim($_POST['txtTptLahir'])=="") {
			$pesanError[] = "Data <b>No. Telp</b> Tidak Boleh Kosong !";		
		}
		if (trim($_POST['txtJob'])=="") {
			$pesanError[] = "Data <b>Posisi Pekerjaan</b> Tidak Boleh Kosong !";		
		}
 
				
				
# BACA DATA DALAM FORM, masukkan datake variabel
		$txtIdPegawai	= $_POST['txtIdPegawai'];
		$txtNama	= $_POST['txtNama'];
		$txtAlamat= $_POST['txtAlamat'];
		$txtNoTelp1	= $_POST['txtNoTelp1'];
		$txtNoTelp2	= $_POST['txtNoTelp2'];
		$cmbTglLahir	= $_POST['cmbTglLahir'];
		$txtTptLahir	= $_POST['txtTptLahir'];
		$cmbTglMasuk	= $_POST['cmbTglMasuk'];
		$txtJob	= $_POST['txtJob'];
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
			$mySql  = "UPDATE pegawai SET id_pegawai='$txtIdPegawai', nama='$txtNama', alamat='$txtAlamat', no_telp1='$txtNoTelp1', no_telp2='$txtNoTelp2',
					 	tgl_lahir='".InggrisTgl($_POST['cmbTglLahir'])."',tpt_lahir='$txtTptLahir',tgl_masuk='".InggrisTgl($_POST['cmbTglMasuk'])."',job='$txtJob',keterangan='$txtKeterangan' WHERE id='".$_POST['txtKode']."'";
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){
				echo "<meta http-equiv='refresh' content='0; url=?page=Pegawai-Data'>";
			}
			exit;
		 
	} // Penutup POST


		# TAMPILKAN DATA DARI DATABASE, Untuk ditampilkan kembali ke form edit
	$Kode= isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode']; 
	$mySql = "SELECT * FROM pegawai WHERE id='$Kode'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query ambil data salah : ".mysql_error());
	while($kolomData = mysql_fetch_array($myQry)) {
		$dataKode		= $kolomData['id'];
		$dataIdPegawai	= isset($kolomData['id_pegawai']) ?  $kolomData['id_pegawai'] : $_POST['txtIdPegawai']; 
		$dataNama	= isset($kolomData['nama']) ?  $kolomData['nama'] : $_POST['txtNama']; 
		$dataAlamat	= isset($kolomData['alamat']) ?  $kolomData['alamat'] : $_POST['txtALamat'];
		$dataNoTelp1	= isset($kolomData['no_telp1']) ?  $kolomData['no_telp1'] : $_POST['txtNoTelp1']; 
		$dataNoTelp2	= isset($kolomData['no_telp2']) ?  $kolomData['no_telp2'] : $_POST['txtNoTelp2'];  
		$cmbTglLahir	= isset($_POST['cmbTglLahir']) ? $_POST['cmbTglLahir'] : date('Y-m-d'); 
		$dataCmbTglLahir	= isset($kolomData['tgl_lahir']) ?  $kolomData['tgl_lahir'] : $_POST['cmbTglLahir']; 
		$dataTptLahir	= isset($kolomData['tpt_lahir']) ?  $kolomData['tpt_lahir'] : $_POST['txtTptLahir']; 
		$cmbTglMasuk	= isset($_POST['cmbTglMasuk']) ? $_POST['cmbTglMasuk'] : date('Y-m-d'); 
		$datacmbTglMasuk	= isset($kolomData['tgl_masuk']) ?  $kolomData['tgl_masuk'] : $_POST['cmbTglMasuk'];
		$dataJob	= isset($kolomData['job']) ?  $kolomData['job'] : $_POST['txtJob']; 
		$dataKeterangan	= isset($kolomData['keterangan']) ?  $kolomData['keterangan'] : $_POST['txtKeterangan']; 
	}
} // Penutup GET
?>


<p>&nbsp;</p>
<form action="?page=Pegawai-Edit" method="post" name="form1" target="_self">
  <table width="700" class="table-list" border="0" cellspacing="1" cellpadding="4">
   <tr>
       <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
      <th colspan="3"><b>[ UBAH ] PEGAWAI </b></th>
    </tr>
    <input name="txtKode" type="hidden" value="<?php echo $dataKode; ?>" />
	<tr>
      <td><b>ID Pegawai</b></td>
      <td><b>:</b></td>
      <td><input name="txtIdPegawai" type="text" value="<?php echo $dataIdPegawai; ?>" size="60" maxlength="100" /></td>
    </tr>
     <tr>
      <td><b>Nama</b></td>
      <td><b>:</b></td>
      <td><input name="txtNama" type="text" value="<?php echo $dataNama; ?>" size="60" maxlength="100" /></td>
    </tr>
	<tr>
      <td><b>Alamat</b></td>
      <td><b>:</b></td>
      <td><input name="txtAlamat" type="text" value="<?php echo $dataAlamat; ?>" size="60" maxlength="100" /></td>
    </tr>
	<tr>
      <td><b>No. Telp 1</b></td>
      <td><b>:</b></td>
      <td><input name="txtNoTelp1" type="text" value="<?php echo $dataNoTelp1; ?>" size="60" maxlength="100" /></td>
    </tr>
	<tr>
      <td><b>No. Telp 2</b></td>
      <td><b>:</b></td>
      <td><input name="txtNoTelp2" type="text" value="<?php echo $dataNoTelp2; ?>" size="60" maxlength="100" /></td>
    </tr>
	<tr>
      <td><b>Tanggal Lahir</b></td>
      <td><b>:</b></td>
      <td><input name="cmbTglLahir" type="text" class="tcal" id="cmbTglLahir" value="<?php echo IndonesiaTgl($dataCmbTglLahir); ?>" /></td>
    </tr>
	<tr>
      <td><b>Tempat Lahir</b></td>
      <td><b>:</b></td>
      <td><input name="txtTptLahir" type="text" value="<?php echo $dataTptLahir; ?>" size="60" maxlength="100" /></td>
    </tr>
	<tr>
      <td><b>Posisi Pekerjaan</b></td>
      <td><b>:</b></td>
      <td><input name="txtJob" type="text" value="<?php echo $dataJob; ?>" size="60" maxlength="100" /></td>
    </tr> 
	<tr>
      <td><b>Tanggal Masuk</b></td>
      <td><b>:</b></td>
      <td><input name="cmbTglMasuk" type="text" class="tcal" id="cmbTglMasuk" value="<?php echo IndonesiaTgl($datacmbTglMasuk); ?>" /></td>
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
