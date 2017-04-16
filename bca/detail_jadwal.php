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
    <td colspan="2" align="left"><h2><b>DATA DETAIL JADWAL </b></h2></td>
  </tr>
  <tr>
    
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table class="table-list" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr>
        <th width="24"><b>No</b></th>
        <th width="100"><b>Tanggal Request</b></th>
		<th width="100"><b>User</b></th>
        <th width="125"><b>Keterangan Request</b></th> 
		<th width="90"><b>Tanggal Penjadwalan</b></th>
		<th width="90"><b>Tanggal Mulai</b></th>
		<th width="90"><b>Tanggal Selesai</b></th>
		<th width="125"><b>Keterangan Penjadwalan</b></th> 
        <td width="60" align="center" bgcolor="#CCCCCC"><b>Aksi</b></td> 
		<td width="60" align="center" bgcolor="#CCCCCC"><b>View Pegawai</b></td> 
      </tr>
      <?php
	$mySql 	= "SELECT r.*, u.nm_user, p.id AS id_penjadwalan, p.tanggal AS tgl_penjadwalan, p.tgl_mulai AS tgl_mulai, p.tgl_selesai AS tgl_selesai, p.keterangan AS ket_penjadwalan FROM REQUEST as r
		       JOIN user AS u ON 
			   u.kd_user = r.id_user
			   JOIN penjadwalan AS p ON 
			   p.id_request = r.id
			   where row_status = '0' AND status='diterima'";
	$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query  salah : ".mysql_error());
	$nomor  = 0; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $kolomData['id_penjadwalan'];
		$status_jadwal = $kolomData['status_jadwal'];
		 // gradasi warna
		if($nomor%2==1) { $warna=""; } else {$warna="#F5F5F5";}
	?>
        <tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $nomor; ?></td> 
        <td><?php echo $kolomData['tanggal']; ?></td>
		<td><?php echo $kolomData['nm_user']; ?></td>
		<td><?php echo $kolomData['keterangan']; ?></td> 
		<td><?php echo $kolomData['tgl_penjadwalan']; ?></td>
		<td><?php echo $kolomData['tgl_mulai']; ?></td>
		<td><?php echo $kolomData['tgl_selesai']; ?></td>
		<td><?php echo $kolomData['ket_penjadwalan']; ?></td>

	 <td align="center"><a href="?page=PegawaiDetail-Add&Kode=<?php echo $Kode; ?>" target="_self" alt="Edit Data"><img src="images/btn_edit.png" width="20" height="20" border="0" /></a></td>
     <td align="center"><a href="?page=PegawaiJadwal-Data&Kode=<?php echo $Kode; ?>" target="_self" alt="Edit Data">View</a></td>
       
 

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

