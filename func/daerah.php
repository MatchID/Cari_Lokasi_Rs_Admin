<?php
session_start();
//error_reporting(0);
include_once "../dwo.lib.php";
include_once "../db.mysql.php";
include_once "../connectdb.php";
include_once "../ClassRC.php";

 echo"
<table id=example1 class=table>
<tr id=jd>
<th class=ttl width=20 align=center>No</th>
<th>KD</th>
<th>KabKota</th>
<th>Kecamatan</th>
<th>KelurahanDesa</th>
 
</tr>
";


if (empty($_POST[kat])) $wh=""; else $wh="where $_POST[kat] like '$_POST[Cari]'";
$r=mysql_query("select * from mas_daerah $wh "); while($w=mysql_fetch_array($r)){
$n++;

if ($n % 2 == 0) $warna = '#f0f5f5';
else $warna = '#ffffff';


echo"
<tr bgcolor=$warna>
<td align=center >$n</td>
<td ><a href='#' onclick='kirim(\"$w[KD]\")' >$w[KD]</a></td>
<td >$w[KabKota]</td>
<td >$w[Kecamatan]</td>
<td >$w[KelurahanDesa]</td>
 
</tr>
";
}
echo"
<tr> <td colspan=3>Jumlah Data </td><td>$n </td> <td> </td></tr>
</table>
"; 


?>

								
<script>
	function kirim(a){
		window.opener.document.getElementById("KodeDaerah").value=a;
		 
		
		window.close();
		
	}

</script>	