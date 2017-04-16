<?php
# Konek ke Web Server Lokal
$myHost	= "127.0.0.1";
$myUser	= "root";
$myPass	= "";
$myDbs	= "bca";

# Konek ke Web Server Lokal
$koneksidb	= mysql_connect($myHost, $myUser, $myPass);
if (! $koneksidb) {
  echo "Failed Connection !";
}

# Memilih database pd MySQL Server
mysql_select_db($myDbs) or die ("Database not Found !");
?>