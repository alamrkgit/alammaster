<?php
include_once "library/inc.seslogin.php";

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$id_penjadwalan= isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode'];
$pageSql = "SELECT pegawai.*, penjadwalan_detail.id AS id_penjadwalan_detail FROM pegawai
			LEFT JOIN penjadwalan_detail on penjadwalan_detail.id_pegawai = pegawai.id
			WHERE penjadwalan_detail.id_penjadwalan = '$id_penjadwalan'";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<p>&nbsp;</p>
<table width="800" border="0" cellpadding="2" cellspacing="1" class="table-border">
  <tr>
    <td colspan="2" align="left"><h2><b>DETAIL JADWAL PEGAWAI </b></h2></td>
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
        <th width="125"><b>ID Pegawai</b></th>
        <th width="125"><b>Nama </b></th> 
		<th width="125"><b>No. Telp 1 </b></th>
		<th width="125"><b>No. Telp 2 </b></th>
		<th width="125"><b>Posisi Pekerjaan </b></th>
		<th width="125"><b>Tanggal Masuk </b></th>  
        <td width="48" align="center" bgcolor="#CCCCCC"><b>Delete</b></td>
      </tr>
      <?php
	$id_penjadwalan= isset($_GET['Kode']) ?  $_GET['Kode'] : $_POST['txtKode'];  
	$mySql 	= "SELECT pegawai.*, penjadwalan_detail.id AS id_penjadwalan_detail FROM pegawai
				LEFT JOIN penjadwalan_detail on penjadwalan_detail.id_pegawai = pegawai.id
				WHERE penjadwalan_detail.id_penjadwalan = '$id_penjadwalan'";
	$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query  salah : ".mysql_error());
	$nomor  = 0; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
		$id_penjadwalan_detail = $kolomData['id_penjadwalan_detail'];
		
		// gradasi warna
		if($nomor%2==1) { $warna=""; } else {$warna="#F5F5F5";}
	?>
      <tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $nomor; ?></td> 
        <td><?php echo $kolomData['id_pegawai']; ?></td>
		<td><?php echo $kolomData['nama']; ?></td> 
		<td><?php echo $kolomData['no_telp1']; ?></td>
        <td><?php echo $kolomData['no_telp2']; ?></td> 
		<td><?php echo $kolomData['job']; ?></td>
		<td><?php echo $kolomData['tgl_masuk']; ?></td> 
		    <td align="center"><a href="?page=PegawaiJadwal-Delete&Kode=<?php echo $id_penjadwalan_detail; ?>" target="_self" alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ?')"><img src="images/btn_delete.png" width="20" height="20"  border="0"  alt="Delete Data" /></a></td>
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
		echo " <a href='?page=Absensi-Data&hal=$list[$h]'>$h</a> ";
	}
	?>
	</td>
  </tr>
</table>

