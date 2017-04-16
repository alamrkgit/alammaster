<h2>&nbsp; </h2>
<h2>DAFTAR COSTUMER </h2>
<table class="table-list" width="700" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="24" bgcolor="#CCCCCC"><b>No</b></th>
        <td width="60" bgcolor="#CCCCCC"><b>ID Costumer</b></td>
        <td width="120" bgcolor="#CCCCCC"><b>Nama Costumer</b></td>
        <td width="60" bgcolor="#CCCCCC"><b>Jenis Pekerjaan</b></td>
		<td width="60" bgcolor="#CCCCCC"><b>Tanggal Kunjungan</b></td>
		<td width="60" bgcolor="#CCCCCC"><b>Lama Pekerjaan</b></td>
        <td width="60" bgcolor="#CCCCCC"><b>Data Perangkat</b></td>
		 <td width="60" bgcolor="#CCCCCC"><b>Status</b></td>
  </tr>
	<?php
		$mySql 	= "SELECT * FROM costumer ORDER BY idcostumer";
		$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
		$nomor  = 0; 
		while ($kolomData = mysql_fetch_array($myQry)) {
			$nomor++;
	?>
  <tr>
    <td align="center"><?php echo $nomor; ?></td>
 
        <td><?php echo $kolomData['idcostumer']; ?></td>
        <td><?php echo $kolomData['nama_costumer']; ?></td>
        <td><?php echo $kolomData['jenis_pekerjaan']; ?></td>
		<td><?php echo $kolomData['tanggal']; ?></td>
        <td><?php echo $kolomData['lama_pekerjaan']; ?></td>
		<td><?php echo $kolomData['data_perangkat']; ?></td>
        <td><?php echo $kolomData['status_pekerjaan']; ?></td>
  </tr>
  <?php } ?>
</table>
<a href="cetak/costumer.php" target="_blank"><img src="images/btn_print2.png" height="18" border="0" title="Cetak ke Format HTML"/></a>
