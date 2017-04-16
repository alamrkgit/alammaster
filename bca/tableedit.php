<?php
include('db.php');
include_once "library/inc.library.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Live Table Edit</title>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');
$("#first_"+ID).hide();
$("#last_"+ID).hide();
$("#first_input_"+ID).show();
$("#last_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();
var last=$("#last_input_"+ID).val();
var dataString = 'id='+ ID +'&start='+first+'&kd_aktivitas='+last;
$("#first_"+ID).html('<img src="load.gif" />');


if(first.length && last.length>0)
{
$.ajax({
type: "POST",
url: "table_edit_ajax.php",
data: dataString,
cache: false,
success: function(html)
{

$("#first_"+ID).html(first);
$("#last_"+ID).html(last);
}
});
}
else
{
alert('Enter something.');
}

});

$(".editbox").mouseup(function() 
{
return false
});

$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
});

});
</script>
<style>
body
{
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
}
.editbox
{
display:none
}
td
{
padding:7px;
}
.editbox
{
font-size:14px;
width:270px;
background-color:#ffffcc;

border:solid 1px #000;
padding:4px;
}
.edit_tr:hover
{
background:url(edit.png) right no-repeat #80C8E5;
cursor:pointer;
}


th
{
font-weight:bold;
text-align:left;
padding:4px;
}
.head
{
background-color:#333;
color:#FFFFFF

}

</style>

</head>




<body bgcolor="#dedede">

 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <table width="1045" border="1" align="center">
                <tr>
                  <th width="168" bgcolor="#999999" scope="row"><strong>Code</strong></th>
                  <td width="232" bgcolor="#999999"><strong>Process</strong></td>
                  <td width="189" bgcolor="#999999"><strong>Code</strong></td>
                  <td width="211" bgcolor="#999999"><strong>Process</strong></td>
                  <td width="211" bgcolor="#999999">Code</td>
                  <td width="211" bgcolor="#999999"><strong>Process</strong></td>
                </tr>
                <tr>
                  <th scope="row"><strong>1</strong></th>
                  <td><strong>Input Data/Update to Lexy (TO)</strong></td>
                  <td><strong>10</strong></td>
                  <td><strong>Discussion</strong></td>
                  <td><strong>24</strong></td>
                  <td><strong>Controlling/Monitoring (by lexy)</strong></td>
                </tr>
                <tr>
                  <th scope="row"><strong>2</strong></th>
                  <td><strong>Input Data/Update to Lexy (TM)</strong></td>
                  <td><strong>11</strong></td>
                  <td><strong>Create Reports</strong></td>
                  <td><strong>30</strong></td>
                  <td><strong>Improvement</strong></td>
                </tr>
                <tr>
                  <th scope="row"><strong>3</strong></th>
                  <td><strong>POD Process</strong></td>
                  <td><strong>12</strong></td>
                  <td><strong>Phone calls</strong></td>
                  <td><strong>40</strong></td>
                  <td><strong>5s</strong></td>
                </tr>
                <tr>
                  <th scope="row"><strong>4</strong></th>
                  <td><strong>Self Billing Process</strong></td>
                  <td><strong>13</strong></td>
                  <td><strong>Email</strong></td>
                  <td><strong>99</strong></td>
                  <td><strong>Pulang</strong></td>
                </tr>
                <tr>
                  <th scope="row"><strong>5</strong></th>
                  <td><strong>Collect Invoice / create EA</strong></td>
                  <td><strong>14</strong></td>
                  <td><strong>Sick Leave (Sakit)</strong></td>
                  <td><strong>26</strong></td>
                  <td><strong>Scan/Photo copy</strong></td>
                </tr>
                <tr>
                  <th scope="row"><strong>6</strong></th>
                  <td><strong>Break/Lunch - Smoke - Coffee - Toilet</strong></td>
                  <td><strong>21</strong></td>
                  <td><strong>Annual Leave (Cuti)</strong></td>
                  <td><strong>27</strong></td>
                  <td><strong>Work out of the site</strong></td>
                </tr>
                <tr>
                  <th scope="row"><strong>8</strong></th>
                  <td><strong>Training</strong></td>
                  <td><strong>22</strong></td>
                  <td><strong>Waiting</strong></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <th scope="row"><strong>9</strong></th>
                  <td><strong>Preshift Meeting</strong></td>
                  <td><strong>23</strong></td>
                  <td><strong>Pergi ke BU</strong></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>

<p>&nbsp;</p>
<div align="center">
<table width="100%" border="1">
<tr> <th colspan="100%" scope="col"bgcolor="#666666">INPUT AKTIVITAS</th> </tr><tr><td>
<div style="font-family: arial; font-size: 12px; overflow: scroll; width: 100%; height: 300px;"><div style="text-align:left; width: 100%; padding: 0 px; overflow: hidden;">
<div style="margin:0 auto; width:850px; padding:10px; background-color:#fff; height:100%;">
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"  name="frmadd" id="frmadd">
    <input type="submit" name="btnSave" id="btnSave" value="Simpan Aktivitas" align="right" />
  </form>
  <p>&nbsp;</p>
  <table width="100%">
    <tr class="head">
<th align="center"><strong>No</strong></th><th align="center"><strong>Start</strong></th><th align="center"><strong>Kode Aktivitas</strong></th>
</tr>




<?php

# JIKA TOMBOL SIMPAN TRANSAKSI DIKLIK
if(isset($_POST['btnSave'])){
	$pesanError = array();
 
	
 
	$noTransaksi = buatKode("laporan_card", "C");
	$tgl=date('Y-m-d');		
 
	@$cmbTanggal 	= $_POST['cmbTanggal'];

			# …LANJUTAN, SIMPAN DATA
			# Ambil semua data barang yang dipilih, berdasarkan kasir yg login
			$tmpSql ="SELECT card.* 
						FROM card ";
			$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
			while ($tmpRow = mysql_fetch_array($tmpQry)) {
				// Baca data dari tabel barang dan jumlah yang dibeli dari TMP
				
				$dataStart 		= $tmpRow['start'];
				$dataKdAktivitas	= $tmpRow['kd_aktivitas'];
			 
				
				// MEMINDAH DATA, Masukkan semua data di atas dari tabel TMP ke tabel ITEM
				$itemSql = "INSERT INTO laporan_card SET 
						id='$noTransaksi', 
						start='$dataStart', 
						kd_aktivitas='$dataKdAktivitas',
						tanggal='$tgl'";
				mysql_query($itemSql, $koneksidb) or die ("Gagal Query ".mysql_error());
					
					
				$tmpSql = "UPDATE card SET kd_aktivitas=''";
				mysql_query($tmpSql, $koneksidb) or die ("Gagal Query : ".mysql_error());
							
			}
		}
	 
	
# TAMPILKAN DATA KE FORM
 
$tglTransaksi 	= isset($_POST['cmbTanggal']) ? $_POST['cmbTanggal'] : date('d-m-Y');
 
?>
















<?php
$sql=mysql_query("select * from card");
$i=1;
while($row=mysql_fetch_array($sql))
{
$id=$row['id'];
$start=$row['start'];
$kd_aktivitas=$row['kd_aktivitas'];

if($i%2)
{
?>
<tr id="<?php echo $id; ?>" class="edit_tr">
<?php } else { ?>
<tr id="<?php echo $id; ?>" bgcolor="#f2f2f2" class="edit_tr">
<?php } ?>

<td width="33%" class="edit_td">
  <strong><?php echo $i; ?>
  </strong></td> 

 
<input type="text" name="cmbTanggal" class="tcal" value="<?php echo $tglTransaksi; ?>" hidden/>
 

<td width="27%" class="edit_td">
  <strong><span id="last_<?php echo $id; ?>" class="text"><?php echo $start; ?></span> 
<input type="text"  value="<?php echo $start; ?>"  class="editbox" id="last_input_<?php echo $id; ?>"/>
  </strong></td>


<td width="40%" class="edit_td">
  <strong><span id="first_<?php echo $id; ?>" class="text"><?php echo $kd_aktivitas; ?></span>
<input type="text" value="<?php echo $kd_aktivitas; ?>" class="editbox" id="first_input_<?php echo $id; ?>" />
  </strong></td>

</tr>

<?php
$i++;
}
?>

</table>
</div>
</div>
</td></tr>
</tbody></table>
</div></div></div></td></tr>
</table></div>
</div>
</body>
</html>
