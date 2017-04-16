<?php
session_start();
include_once "../library/inc.seslogin.php";
include_once "../library/inc.connection.php";
include_once "../library/inc.library.php";
?>
<html>
<head>
<title></title>
<style type="text/css">
<!--
body{
	margin:0px auto 0px;
	padding:3px;
	font-family:"Arial";
	font-size:12px;
	color:#333;
	width:95%;
	background-position:top;
	background-color:#fff;
}
.table-list {
	clear: both;
	text-align: left;
	border-collapse: collapse;
	margin: 0px 0px 10px 0px;
	background:#fff;	
}
.table-list td {
	color: #333;
	font-size:12px;
	border-color: #fff;
	border-collapse: collapse;
	vertical-align: center;
	padding: 3px 5px;
	border-bottom:1px #CCCCCC solid;
}

 .result{ visibility: hidden;}

 @media print{ .result{ visibility: visible;} } 
-->
</style>
</head>
<body>
<h2> LAPORAN DATA USER </h2>
<table class="table-list" width="700" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td width="32" align="center" bgcolor="#CCCCCC"><b>No</b></td>
    <td width="276" bgcolor="#CCCCCC"><b>Nama User </b></td>
    <td width="141" bgcolor="#CCCCCC"><b>No Telepon </b></td>
    <td width="140" bgcolor="#CCCCCC"><b>Username</b></td>
    <td width="85" bgcolor="#CCCCCC"><b>Level</b></td>
  </tr>
  <?php
	$mySql 	= "SELECT * FROM user ORDER BY kd_user";
		$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
	$nomor  = 0; 
	while ($kolomData = mysql_fetch_array($myQry)) {
		$nomor++;
	?>
  <tr>
  <td align="center"><?php echo $nomor; ?></td> 
    <td><?php echo $kolomData['nm_user']; ?></td>
    <td><?php echo $kolomData['no_telepon']; ?></td>
    <td><?php echo $kolomData['username']; ?></td>
    <td><?php echo $kolomData['level']; ?></td>
  </tr>
  <?php } ?>
</table>






<?php


#setting judul laporan dan header tabel   
//mengambil data bulan dari komputer
$tanggal        =date("d");
$angka_bulan = date("m")-1; 
Switch ($angka_bulan){
    case 1 : $angka_bulan="Januari";
        Break;
    case 2 : $angka_bulan="Februari";
        Break;
    case 3 : $angka_bulan="Maret";
        Break;
    case 4 : $angka_bulan="April";
        Break;
    case 5 : $angka_bulan="Mei";
        Break;
    case 6 : $angka_bulan="Juni";
        Break;
    case 7 : $angka_bulan="Juli";
        Break;
    case 8 : $angka_bulan="Agustus";
        Break;
    case 9 : $angka_bulan="September";
        Break;
    case 10 : $angka_bulan="Oktober";
        Break;
    case 11 : $angka_bulan="November";
        Break;
    case 12 : $angka_bulan="Desember";
	Break; }

$nama_user = '';
$query  = "SELECT * FROM user WHERE kd_user='".$_SESSION['SES_LOGIN']."'";
$sql 	= mysql_query ($query);
while ($kolomData = mysql_fetch_array($sql)) {
$nama_user = $kolomData['nm_user']."																																										";
}		

$tahun          =date("Y");
$date = 'Jakarta, '.$tanggal.' '.$angka_bulan.' '.$tahun."																";
$admin = "Admin																																																		";
 ?> 
 
 <div class ="result">
<table align="right">
 
    <tr>
    <th></th>
    <th></th>
    <th></th>
	<th><?php echo $date ?></th>
  </tr>
    <tr>
    <th></th>
    <th></th>
    <th></th>
	<th><?php echo $admin ?></th>
  </tr> 
  
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
    
  <tr>
    <th></th>
    <th></th>
    <th></th>
	<th> </th>
  </tr> 
  
     <tr>
    <th></th>
    <th></th>
    <th></th>
	<th><?php echo $nama_user ?></th>
  </tr> 
  
  </table>
  </div>





<img src="../images/btn_print.png" height="20" onClick="javascript:window.print()" />
</body>
</html>