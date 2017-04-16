<?php
include_once "library/inc.seslogin.php";

if($_GET) {
	if(isset($_POST['btnSave'])){
		# VALIDASI FORM, jika ada kotak yang kosong, buat pesan error ke dalam kotak $pesanError
		$pesanError = array();
 

 	
# BACA DATA DALAM FORM, masukkan datake variabel
	
		$txtStatus	= $_POST['txtStatus'];
		
	 
	 

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
			$mySql  = "UPDATE request SET status='$txtStatus' WHERE id='".$_POST['txtKode']."'";
			$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
			if($myQry){
				echo "<meta http-equiv='refresh' content='0; url=?page=CekRequest-Data'>";
			}
			exit;
		 
	} // Penutup POST


		# TAMPILKAN DATA DARI DATABASE, Untuk ditampilkan kembali ke form edit
	$Kode= isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode']; 
	$mySql = "SELECT * FROM request WHERE id='$Kode'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query ambil data salah : ".mysql_error());
	while($kolomData = mysql_fetch_array($myQry)) {
		$dataKode		= $kolomData['id'];
		$dataStatus	= isset($kolomData['status']) ?  $kolomData['status'] : $_POST['txtStatus']; 
	}
} // Penutup GET
?>


<p>&nbsp;</p>
<form action="?page=CekRequest-Edit" method="post" name="form1" target="_self">
  <table width="700" class="table-list" border="0" cellspacing="1" cellpadding="4">
   <tr>
       <td colspan="2" align="right">&nbsp;</td>
    </tr>
    <tr>
      <th colspan="3"><b>[ UBAH ] REQUEST </b></th>
    </tr>
    <input name="txtKode" type="hidden" value="<?php echo $dataKode; ?>" />
	
	<tr>
      <td><b>Status</b></td>
      <td><b>:</b></td>
      <td><b>
        <select name="txtStatus" style="width:200px"> 
           <?php
  	  $Kode= isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode']; 	   
	  $dataSql = "SELECT * FROM request WHERE id='$Kode'";
	  $dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query".mysql_error());
	  while ($dataRow = mysql_fetch_array($dataQry)) {
	  $status = $dataRow['status']; 
	  	if ($status == 'pending') { 
			echo "<option value='diterima'>Diterima</option>";
			echo "<option value='ditolak'>Ditolak</option>";
		}
		if ($status == 'diterima') { 
			echo "<option value='diterima'>Diterima</option>"; 
			echo "<option value='ditolak'>Ditolak</option>";
		} 
		if ($status == 'ditolak') { 
		    echo "<option value='ditolak'>Ditolak</option>";
			echo "<option value='diterima'>Diterima</option>"; 
		} 		
	  }
 
	  ?>
     </select>
      </b></td>
    </tr>
	
	
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <input type="submit" name="btnSave" value=" Simpan " /> </td>
    </tr>
     
  </table>
</form>
