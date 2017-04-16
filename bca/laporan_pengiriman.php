<h2>&nbsp; </h2>
<h2>DAFTAR PENGIRIMAN </h2>
<table class="table-list" width="700" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="32" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="100" bgcolor="#CCCCCC"><b>ID Pengiriman </b></td>
	<td width="100" bgcolor="#CCCCCC"><b>Tanggal</b></td>
    <td width="100" bgcolor="#CCCCCC"><b>Pengirim</b></td>
	<td width="100" bgcolor="#CCCCCC"><b>Nama</b></td>
	<td width="100" bgcolor="#CCCCCC"><b>Alamat</b></td>
	<td width="100" bgcolor="#CCCCCC"><b>Kota</b></td>
	<td width="100" bgcolor="#CCCCCC"><b>Provinsi</b></td>
	<td width="100" bgcolor="#CCCCCC"><b>Kode Pos</b></td>
	<td width="100" bgcolor="#CCCCCC"><b>Jenis Pengiriman</b></td>
	<td width="100" bgcolor="#CCCCCC"><b>Service</b></td>
	<td width="100" bgcolor="#CCCCCC"><b>Harga</b></td>
	<td width="100" bgcolor="#CCCCCC"><b>Ongkos Kirim</b></td>
  <td width="100" bgcolor="#CCCCCC"><b>Total</b></td>
  </tr>
	<?php
		$mySql 	= "SELECT * FROM transaksi ORDER BY idtransaksi";
		$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
		$nomor  = 0; 
		while ($kolomData = mysql_fetch_array($myQry)) {
			$nomor++;
	?>
  <tr>
    <td align="center"><?php echo $nomor; ?></td>
    <td><?php echo $kolomData['idtransaksi']; ?></td>
	<td><?php echo $kolomData['tanggal']; ?></td>
	<td><?php echo $kolomData['pengirim']; ?></td>
    <td><?php echo $kolomData['nama']; ?></td>
    <td><?php echo $kolomData['alamat']; ?></td>
    <td><?php echo $kolomData['kota']; ?></td>
	    <td><?php echo $kolomData['provinsi']; ?></td>
	<td><?php echo $kolomData['kodepos']; ?></td>
    <td><?php echo $kolomData['jenispengiriman']; ?></td>
    <td><?php echo $kolomData['service']; ?></td>
	    <td><?php echo $kolomData['harga']; ?></td>
	<td><?php echo $kolomData['ongkoskirim']; ?></td>
	<td><?php echo "Rp "?><?php echo $kolomData['ongkoskirim'] + $kolomData['ongkoskirim']; ?></td>
 
  </tr>
  <?php } ?>
</table>
<a href="cetak/pengiriman.php" target="_blank"><img src="images/btn_print2.png" height="18" border="0" title="Cetak ke Format HTML"/></a>
