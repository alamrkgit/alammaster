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
		else {
			# SIMPAN DATA KE DATABASE. 
			// Jika tidak menemukan error, simpan data ke database 
			$mySql  	= "INSERT INTO pegawai (id_pegawai, nama, alamat, no_telp1, no_telp2, 
											 tgl_lahir,tpt_lahir,job,tgl_masuk,keterangan,row_status)
							VALUES (
									'$txtIdPegawai',  
									'$txtNama',
									'$txtAlamat', 
									'$txtNoTelp1',
									'$txtNoTelp2', 
									'".InggrisTgl($_POST['cmbTglLahir'])."',  
									'$txtTptLahir',
									'$txtJob',
									'".InggrisTgl($_POST['cmbTglMasuk'])."', 
									'$txtKeterangan', 
									'0')";
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){
				echo "<meta http-equiv='refresh' content='0; url=?page=Pegawai-Data'>";
			}
			exit;
		}	
	} // Penutup POST
	
	# MASUKKAN DATA KE VARIABEL
	// Supaya saat ada pesan error, data di dalam form tidak hilang. Jadi, tinggal meneruskan/memperbaiki yg salah
 
	$txtIdPegawai	= isset($_POST['txtIdPegawai']) ? $_POST['txtIdPegawai'] : '';
	$txtNama	= isset($_POST['txtNama']) ? $_POST['txtNama'] : ''; 
	$txtAlamat	= isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : '';
    $txtNoTelp1	= isset($_POST['txtNoTelp1']) ? $_POST['txtNoTelp1'] : '';
	$txtNoTelp2	= isset($_POST['txtNoTelp2']) ? $_POST['txtNoTelp2'] : ''; 
	$cmbTglLahir 	= isset($_POST['cmbTglLahir']) ? $_POST['cmbTglLahir'] : date('Y-m-d');
	$txtTptLahir	= isset($_POST['txtTptLahir']) ? $_POST['txtTptLahir'] : ''; 
	$cmbTglMasuk 	= isset($_POST['cmbTglMasuk']) ? $_POST['cmbTglMasuk'] : date('Y-m-d');
	$txtJob	= isset($_POST['txtJob']) ? $_POST['txtJob'] : '';
	$txtKeterangan	= isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : ''; 
 
} // Penutup GET
?>

<p>&nbsp;</p>
<form action="?page=Pegawai-Add" method="post" name="form1" target="_self">
  <table width="700" class="table-list" border="0" cellspacing="1" cellpadding="4">
   <tr>
       <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
    <tr>
       <th colspan="3" align="left"><b>ADD Pegawai</b></th>
    </tr>
    <tr>
      <td><b>ID Pegawai</b></td>
      <td><b>:</b></td>
      <td><input name="txtIdPegawai" type="text" value="<?php echo $txtIdPegawai; ?>" size="60" maxlength="100" /></td>
    </tr>	
	 <tr>
      <td><b>Nama</b></td>
      <td><b>:</b></td>
      <td><input name="txtNama" type="text" value="<?php echo $txtNama; ?>" size="60" maxlength="100" /></td>
    </tr>
	</tr> 	
	   <tr>
      <td><b>Alamat</b></td>
      <td><b>:</b></td>
      <td><input name="txtAlamat" type="text" value="<?php echo $txtAlamat; ?>" size="60" maxlength="100" /></td>
    </tr>
	</tr> 	
	<tr>
      <td><b>No. Telepon 1</b></td>
      <td><b>:</b></td>
      <td><input name="txtNoTelp1" type="text" value="<?php echo $txtNoTelp1; ?>" size="60" maxlength="100" /></td>
    </tr>
    <tr>
      <td><b>No. Telepon 2</b></td>
      <td><b>:</b></td>
      <td><input name="txtNoTelp2" type="text" value="<?php echo $txtNoTelp2; ?>" size="60" maxlength="100" /></td>
    </tr>
	<tr>
      <td><b>Tanggal Lahir</b></td>
      <td><b>:</b></td>
      <td><input name="cmbTglLahir" type="text" class="tcal" id="cmbTglLahir" value="<?php echo IndonesiaTgl($cmbTglLahir); ?>" /></td>
    </tr>
     <tr>
      <td><b>Tempat Lahir</b></td>
      <td><b>:</b></td>
      <td><input name="txtTptLahir" type="text" value="<?php echo $txtTptLahir; ?>" size="60" maxlength="100" /></td>
    </tr>
	 <tr>
      <td><b>Posisi Pekerjaan</b></td>
      <td><b>:</b></td>
      <td><input name="txtJob" type="text" value="<?php echo $txtJob; ?>" size="60" maxlength="100" /></td>
    </tr>
	<tr>
      <td><b>Tanggal Masuk</b></td>
      <td><b>:</b></td>
      <td><input name="cmbTglMasuk" type="text" class="tcal" id="cmbTglMasuk" value="<?php echo IndonesiaTgl($cmbTglMasuk); ?>" /></td>
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
