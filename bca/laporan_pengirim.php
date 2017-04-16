<h2>&nbsp; </h2>
<h2>DAFTAR PENGIRIM </h2>
<table class="table-list" width="700" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="32" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="125" bgcolor="#CCCCCC"><b>ID Pengirim </b></td>
    <td width="125" bgcolor="#CCCCCC"><b>Nama</b></td>
    <td width="125" bgcolor="#CCCCCC"><b>Alamat</b></td>
 
	 <td width="125" bgcolor="#CCCCCC"><b>Kota</b></td>
    <td width="125" bgcolor="#CCCCCC"><b>Provinsi</b></td>
    <td width="125" bgcolor="#CCCCCC"><b>Kode Pos</b></td>
	    <td width="125" bgcolor="#CCCCCC"><b>Telepon</b></td>
  </tr>
	<?php
		$mySql 	= "SELECT * FROM pengirim ORDER BY idpengirim";
		$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
		$nomor  = 0; 
		while ($kolomData = mysql_fetch_array($myQry)) {
			$nomor++;
	?>
  <tr>
    <td align="center"><?php echo $nomor; ?></td>
    <td><?php echo $kolomData['idpengirim']; ?></td>
    <td><?php echo $kolomData['nama']; ?></td>
    <td><?php echo $kolomData['alamat']; ?></td>
    <td><?php echo $kolomData['kota']; ?></td>
	    <td><?php echo $kolomData['provinsi']; ?></td>
	<td><?php echo $kolomData['kodepos']; ?></td>
    <td><?php echo $kolomData['telepon']; ?></td>
 
  </tr>
  <?php } ?>
</table>
<a href="cetak/pengirim.php" target="_blank"><img src="images/btn_print2.png" height="18" border="0" title="Cetak ke Format HTML"/></a>
