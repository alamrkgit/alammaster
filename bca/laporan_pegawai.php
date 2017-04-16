<h2>&nbsp; </h2>
<h2>DAFTAR PEGAWAI </h2>
<table class="table-list" width="700" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="32" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="70" bgcolor="#CCCCCC"><b>ID Pegawai </b></td>
    <td width="141" bgcolor="#CCCCCC"><b>Nama </b></td>
    <td width="140" bgcolor="#CCCCCC"><b>Alamat</b></td>
    <td width="85" bgcolor="#CCCCCC"><b>No. Telp 1</b></td>
    <td width="85" bgcolor="#CCCCCC"><b>No. Telp 2</b></td>
	<td width="85" bgcolor="#CCCCCC"><b>Tanggal Lahir</b></td>
	<td width="85" bgcolor="#CCCCCC"><b>Tempat Lahir</b></td>
    <td width="85" bgcolor="#CCCCCC"><b>Posisi Pekerjaan</b></td> 
    <td width="100" bgcolor="#CCCCCC"><b>Tanggal Masuk</b></td>
  </tr>
	<?php
		$mySql 	= "SELECT * FROM pegawai ORDER BY id";
		$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
		$nomor  = 0; 
		while ($kolomData = mysql_fetch_array($myQry)) {
			$nomor++;
	?>
  <tr>
    <td align="center"><?php echo $nomor; ?></td>
    <td><?php echo $kolomData['id_pegawai']; ?></td>
    <td><?php echo $kolomData['nama']; ?></td>
    <td><?php echo $kolomData['alamat']; ?></td>
    <td><?php echo $kolomData['no_telp1']; ?></td>
	<td><?php echo $kolomData['no_telp2']; ?></td>
	<td><?php echo $kolomData['tgl_lahir']; ?></td>
	<td><?php echo $kolomData['tpt_lahir']; ?></td>
	<td><?php echo $kolomData['job']; ?></td>
	<td><?php echo $kolomData['tgl_masuk']; ?></td>
  </tr>
  <?php } ?>
</table>
<a href="cetak/pegawai.php" target="_blank"><img src="images/btn_print2.png" height="18" border="0" title="Cetak ke Format HTML"/></a>
