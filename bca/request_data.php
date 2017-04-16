<?php
include_once "library/inc.seslogin.php";

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM request where row_status = '0' and id_user = '".$_SESSION['SES_LOGIN']."'";
$pageQry = mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<p>&nbsp;</p>
<table width="800" border="0" cellpadding="2" cellspacing="1" class="table-border">
  <tr>
    <td colspan="2" align="left"><h2><b>DATA REQUEST </b></h2></td>
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
        <th width="125"><b>Tanggal</b></th>
        <th width="125"><b>Keterangan </b></th> 
		<th width="125"><b>Status</b></th>
        <td width="38" align="center" bgcolor="#CCCCCC"><b>Edit</b></td>
        <td width="48" align="center" bgcolor="#CCCCCC"><b>Delete</b></td>
      </tr>
      <?php
	$mySql 	= "SELECT * FROM request where row_status = '0' and id_user = '".$_SESSION['SES_LOGIN']."' ORDER BY id ASC";
	$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query  salah : ".mysql_error());
	$nomor  = 0; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $kolomData['id'];
		
		// gradasi warna
		if($nomor%2==1) { $warna=""; } else {$warna="#F5F5F5";}
	?>
      <tr bgcolor="<?php echo $warna; ?>">
        <td><?php echo $nomor; ?></td> 
        <td><?php echo $kolomData['tanggal']; ?></td>
		<td><?php echo $kolomData['keterangan']; ?></td> 
		<td><?php echo $kolomData['status']; ?></td>
		<td align="center"><a href="?page=Request-Edit&Kode=<?php echo $Kode; ?>" target="_self" alt="Edit Data"><img src="images/btn_edit.png" width="20" height="20" border="0" /></a></td>
        <td align="center"><a href="?page=Request-Delete&Kode=<?php echo $Kode; ?>" target="_self" alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ?')"><img src="images/btn_delete.png" width="20" height="20"  border="0"  alt="Delete Data" /></a></td>
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

