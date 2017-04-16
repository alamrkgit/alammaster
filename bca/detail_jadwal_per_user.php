<?php
include_once "library/inc.seslogin.php";

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$id_master = $_SESSION['SES_MASTER'];
$pageSql = "SELECT r.*, u.nm_user, p.id AS id_pjdwl, p.tanggal AS tgl_penjadwalan, p.tgl_mulai AS tgl_mulai, p.tgl_selesai AS tgl_selesai, p.keterangan AS ket_penjadwalan FROM REQUEST as r
		        JOIN user AS u ON 
			   u.kd_user = r.id_user
			    JOIN penjadwalan AS p ON 
			   p.id_request = r.id 
			    JOIN penjadwalan_detail AS pd ON
			   pd.id_penjadwalan = p.id
			   where r.row_status = '0' AND r.status='diterima' AND pd.id_pegawai = '$id_master'";
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
        </tr>
      <?php	
	$id_master = $_SESSION['SES_MASTER'];
	$mySql 	= "SELECT r.*, u.nm_user, p.id AS id_pjdwl, p.tanggal AS tgl_penjadwalan, p.tgl_mulai AS tgl_mulai, p.tgl_selesai AS tgl_selesai, p.keterangan AS ket_penjadwalan FROM REQUEST as r
		        JOIN user AS u ON 
			   u.kd_user = r.id_user
			    JOIN penjadwalan AS p ON 
			   p.id_request = r.id 
			    JOIN penjadwalan_detail AS pd ON
			   pd.id_penjadwalan = p.id
			   where r.row_status = '0' AND r.status='diterima' AND pd.id_pegawai = '$id_master'";
	$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query  salah : ".mysql_error());
	$nomor  = 0; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $kolomData['id_pjdwl'];
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

