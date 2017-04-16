<?php
include_once "library/inc.seslogin.php";

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT r.*, u.nm_user FROM REQUEST as r
		    JOIN user AS u ON 
			u.kd_user = r.id_user
			where row_status = '0' AND status='diterima'";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<p>&nbsp;</p>
<table width="800" border="0" cellpadding="2" cellspacing="1" class="table-border">
  <tr>
    <td colspan="2" align="left"><h2><b>DATA PEMBUATAN JADWAL </b></h2></td>
  </tr>
  <tr>
    <td colspan="2"><a href="?page=Request-Add" target="_self"><img src="images/btn_add_data.png" height="30" border="0" /></a></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table class="table-list" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr>
        <th width="24"><b>No</b></th>
        <th width="100"><b>Tanggal</b></th>
		<th width="100"><b>User</b></th>
        <th width="125"><b>Keterangan </b></th> 
		<th width="100"><b>Status</b></th>
        <td width="60" align="center" bgcolor="#CCCCCC"><b>Aksi</b></td> 
      </tr>
      <?php
	$mySql 	= "SELECT r.*, u.nm_user FROM REQUEST as r
		       JOIN user AS u ON 
			   u.kd_user = r.id_user
			   where row_status = '0' AND status='diterima'";
	$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query  salah : ".mysql_error());
	$nomor  = 0; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $kolomData['id'];
		$status_jadwal = $kolomData['status_jadwal'];
		 // gradasi warna
		if($nomor%2==1) { $warna=""; } else {$warna="#F5F5F5";}
	?>
        <tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $nomor; ?></td> 
        <td><?php echo $kolomData['tanggal']; ?></td>
		<td><?php echo $kolomData['nm_user']; ?></td>
		<td><?php echo $kolomData['keterangan']; ?></td> 
		<td><?php echo $kolomData['status']; ?></td>

		
		<?php 
		if ($status_jadwal == '0') {
	 	echo "<td align='center'><a href='?page=Jadwal-Add&Kode=$Kode' target='_self' alt='Buat Jadwal'>(Buat Jadwal)</a></td>"; 
								 }
		else if ($status_jadwal == '1') {
	 	echo "<td align='center'>Jadwal Telah Dibuat</td>"; 
								 }
						 
								 
		?>
        

		</tr>
      <?php } ?>
    </table>
    </td>
  </tr>
  <tr class="selKecil">
    <td><b>Jumlah Data :</b> <?php echo $jml; ?> </td>
    <td align="right"><b>Halaman ke :</b> 
	<?php
	for ($h = 1; $h <= $max; $h++) {
		$list[$h] = $row * $h - $row;
		echo " <a href='?page=Request-Data&hal=$list[$h]'>$h</a> ";
	}
	?>
	</td>
  </tr>
</table>

