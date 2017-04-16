<h2>&nbsp; </h2>
<h2>DAFTAR LEMBUR </h2>
<table class="table-list" width="700" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="32" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="70" bgcolor="#CCCCCC"><b>ID Lembur </b></td>
    <td width="141" bgcolor="#CCCCCC"><b>ID/Nama Karyawan</b></td>
    <td width="140" bgcolor="#CCCCCC"><b>Tanggal Absensi</b></td>
    <td width="85" bgcolor="#CCCCCC"><b>Keterangan</b></td>
  </tr>
	<?php
		$mySql 	= "SELECT * FROM lembur ORDER BY idlembur";
		$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
		$nomor  = 0; 
		while ($kolomData = mysql_fetch_array($myQry)) {
			$nomor++;
	?>
  <tr>
    <td align="center"><?php echo $nomor; ?></td>
    <td><?php echo $kolomData['idlembur']; ?></td>
    <td><?php echo $kolomData['idkaryawan']; ?></td>
    <td><?php echo $kolomData['tanggal']; ?></td>
    <td><?php echo $kolomData['keterangan']; ?></td>
  </tr>
  <?php } ?>
</table>
<a href="cetak/lembur.php" target="_blank"><img src="images/btn_print2.png" height="18" border="0" title="Cetak ke Format HTML"/></a>
