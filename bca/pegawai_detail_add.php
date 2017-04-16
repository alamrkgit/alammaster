 <?php
include_once "library/inc.seslogin.php";

if($_GET) {
	if(isset($_POST['btnSave'])){
		# VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
		$pesanError = array();
	  
	 
		if (trim($_POST['txtIdPegawai'])=="") {
			$pesanError[] = "Data <b>Pegawai</b> Tidak Boleh Kosong !";		
		}
 
		# BACA DATA DALAM FORM, masukkan datake variabel
		 
	
		$txtIdPegawai	= $_POST['txtIdPegawai'];
		$txtKeterangan	= $_POST['txtKeterangan'];
		$txtIdPenjadwalan	= $_POST['txtIdPenjadwalan'];

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
			$mySql  	= "INSERT INTO penjadwalan_detail (id_penjadwalan, id_pegawai, keterangan)
							VALUES (
									'$txtIdPenjadwalan',  
									'$txtIdPegawai',
									'$txtKeterangan')";  
		 	 
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){				 
				echo "<meta http-equiv='refresh' content='0; url=?page=DetailJadwal-Data'>";
			}
			exit;
		}	
	} // Penutup POST
	
	# MASUKKAN DATA KE VARIABEL
	// Supaya saat ada pesan error, data di dalam form tidak hilang. Jadi, tinggal meneruskan/memperbaiki yg salah
	$Kode= isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode']; 
	$mySql = "SELECT * FROM penjadwalan WHERE id='$Kode'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query ambil data salah : ".mysql_error());
	while($kolomData = mysql_fetch_array($myQry)) {
	$dataKode		= $kolomData['id'];
 
	}
	$txtIdPenjadwalan	= isset($_POST['txtIdPenjadwalan']) ? $_POST['txtIdPenjadwalan'] : '';
	$txtIdPegawai	= isset($_POST['txtIdPegawai']) ? $_POST['txtIdPegawai'] : '';
	$txtKeterangan	= isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : '';	
 
} // Penutup GET
?>

<p>&nbsp;</p>
<form action="?page=PegawaiDetail-Add" method="post" name="form1" target="_self">
  <table width="700" class="table-list" border="0" cellspacing="1" cellpadding="4">
   <tr>
       <td colspan="2" align="right">&nbsp;</td>
    </tr> 
    <tr>
       <th colspan="3" align="left"><b>Detail Jadwal</b></th>
    </tr>
    
	<tr>
      <td><b>ID Penjadwalan</b></td>
      <td><b>:</b></td>
      <td><input name="txtIdPenjadwalan" type="text" value="<?php echo $dataKode; ?>" size="60" maxlength="100" readonly/></td>
    </tr>
	
	<tr>
      <td><b>Pegawai</b></td>
      <td><b>:</b></td>
      <td><b>
        <select name="txtIdPegawai">
		 <option value="BLANK">....</option>
           <?php
	  $dataSql = "SELECT * FROM pegawai ORDER BY id";
	  $dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query".mysql_error());
	  while ($dataRow = mysql_fetch_array($dataQry)) {
	  $idpegawai = $dataRow['id'];  
	  $nama_pegawai = $dataRow['nama'];  
	  echo "<option value='$idpegawai'>$nama_pegawai</option>";
	  }
 
	  ?>
     </select>
      </b></td>
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
