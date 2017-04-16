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
			$mySql  = "UPDATE request SET keterangan='$txtKeterangan' WHERE id='".$_POST['txtKode']."'";
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){
				echo "<meta http-equiv='refresh' content='0; url=?page=Request-Data'>";
			}
			exit;
		 
	} // Penutup POST


		# TAMPILKAN DATA DARI DATABASE, Untuk ditampilkan kembali ke form edit
	$Kode= isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode']; 
	$mySql = "SELECT * FROM request WHERE id='$Kode'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query ambil data salah : ".mysql_error());
	while($kolomData = mysql_fetch_array($myQry)) {
		$dataKode		= $kolomData['id'];
		$dataKeterangan	= isset($kolomData['keterangan']) ?  $kolomData['keterangan'] : $_POST['txtKeterangan']; 
	}
} // Penutup GET
?>


<p>&nbsp;</p>
<form action="?page=Request-Edit" method="post" name="form1" target="_self">
  <table width="700" class="table-list" border="0" cellspacing="1" cellpadding="4">
   <tr>
       <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
      <th colspan="3"><b>[ UBAH ] REQUEST </b></th>
    </tr>
    <input name="txtKode" type="hidden" value="<?php echo $dataKode; ?>" />
 
		<tr>
      <td><b>Keterangan</b></td>
      <td><b>:</b></td>
      <td><textarea name="txtKeterangan" rows="4" cols="50"><?php echo $dataKeterangan; ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <input type="submit" name="btnSave" value=" Simpan " /> </td>
    </tr>
     
  </table>
</form>
