					<?php
					echo " 
					<form method=post action='' enctype='multipart/form-data'>
						 
						 Tabel <input type=text name=tabel value='$_POST[tabel]'><br>
						 Kode <textarea style='width:500px; height:50px;' name=Isi>". $_POST[Isi]."</textarea> <br>
						 
	 
						 <input type=submit name=ok value='ok'><br>
				 </form>
				
				 ";
				  $tb=$_POST[tabel];
				  $tb2=$_POST[tabel2];
				 ?> 
 
 &lt;?php
 $gos=(empty($_REQUEST['gos']))? 'tabel' :$_REQUEST['gos']; <br>
  $gos(); <br>
 function tambah(){ <br>
//&lt;input type=file name=Foto &gt; <br> 
      <?php
	$k=split(" ",$_POST[Isi]);
	$j=count($k);
	for($i=0; $i<=$j-1; $i++){
	$rk=$k[$i];
	echo"
  // \$$rk= GetOption2('kategori', &quot;concat($k[0], ' - ', $rk)&quot;, '$rk', \$w['$rk'], '', '$rk'); <br>";}
  ?>
        <?php
	$k=split(" ",$_POST[Isi]);
	$j=count($k);
	for($i=0; $i<=$j-1; $i++){
	$rk=$k[$i];
	echo"
  //  \$m$i=_selek(&quot;select * from $tb where $rk='\$_POST[$rk]'&quot;);  <br>";}
  ?>
  <br>
   
  echo" <br>
&lt;div   class='col-md-6 panel' &gt; <br>
&lt;form method=post action='' class='panel panel-box' enctype='multipart/form-data' id=fom3&gt; <br>
&lt;table class='table'&gt; <br>
<?php
$k=split(" ",$_POST[Isi]);
$j=count($k);
for($i=0; $i<=$j-1; $i++){
$rk=$k[$i];
echo"
&lt;tr&gt;&lt;td class=inp &gt;$rk&lt;/td&gt; &lt;td class=ul &gt;&lt;input id=$k[$i] class='control-form' type=text size=60 name=$k[$i] value=\$w[$rk]&gt;&lt;/td&gt;&lt;/tr&gt; <br>
";}
?>
<br>
  <br>
&lt;tr&gt;&lt;td&gt;&lt;input type=submit class='btn btn-succes' name=simpan value='Simpan'&gt;&lt;/td&gt;&lt;/tr&gt; <br>
&lt;/table&gt; <br>
&lt;/form&gt; <br>
&lt;/div&gt; <br>
"; <br>
  } </p>
<p>function tabel(){ <br>
  $c<?php echo "$tb"; ?>=c<?php echo "$tb"; ?>($_POST[kat]); <br>
</p>
<p><br>
  echo" </p>
<p>&lt;table class=table&gt; <br>
&lt;form id=fom method=post action=''&gt; <br>
&lt;tr&gt; &lt;td class=inp&gt;Kata Kunci &lt;/td&gt; &lt;td class=ul&gt; &lt;select name=kat&gt; $c<?php echo "$tb"; ?>&lt;/select&gt; &lt;/td&gt;&lt;/tr&gt; <br>
&lt;tr&gt; &lt;td class=inp&gt;Cari File &lt;/td&gt; &lt;td class=ul &gt; &lt;input style='float:left;' type=text name=Cari value='$_POST[Cari]'&gt; &lt;input style='float:left;' type=image src='img/cari.png' alt=submit name=xx value =..&gt; &lt;/td&gt;&lt;/tr&gt; <br>
&lt;/form&gt; </p>
<p>&lt;/table&gt; </p>
<p><br>
    <br>
&lt;a id=tx href='?menu=<?php echo $tb; ?>&amp;gos=tambah'&gt;Tambah  &lt;/a&gt; <br>
&lt;a id=tx href='?menu=<?php echo $tb; ?>&amp;gos=Cetak'&gt;Cetak&lt;/a&gt; <br>
  <br>
"; <br>
//< i class='fa fa-plus'></ i> <br> Tambah 
  echo" <br>
&lt;table id=example1 class=table&gt; <br>
&lt;tr id=jd&gt; <br>
&lt;th class=ttl width=20 align=center&gt;No&lt;/th&gt; <br>
<?php
$k=split(" ",$_POST[Isi]);
$j=count($k);
for($i=0; $i<=$j-1; $i++){
$rk=$k[$i];
echo"
&lt;th&gt;$rk&lt;/th&gt; <br>";
}
?>
 
&lt;th class=ttl   width=60 &gt;Action&lt;/th&gt; <br>
&lt;/tr&gt; <br>
"; <br>
  <br>
  <br>
</p>
<p>if (empty($_POST[kat])) $wh=""; else $wh="where $_POST[kat] like '$_POST[Cari]'"; </p>
$r=mysql_query("select * from <?php echo $tb;  ?> $wh "); while($w=mysql_fetch_array($r)){ <br>
$n++; <br>
<br>
if ($n % 2 == 0) $warna = '#f0f5f5'; <br>
else $warna = '#ffffff'; <br>
<br>
<br>
echo" <br>
&lt;tr bgcolor=$warna&gt; <br>
&lt;td align=center &gt;$n&lt;/td&gt; <br>
<?php
$k=split(" ",$_POST[Isi]);
$j=count($k);
for($i=0; $i<=$j-1; $i++){
$rk=$k[$i];
echo"
&lt;td &gt;\$w[$rk]&lt;/td&gt; <br>";}
$kd=$k[0];
 echo"
<br>
<br>
&lt;td width=60 align=center &gt;&lt;a href='?menu=$tb&amp;gos=ubah&amp;$k[0]=\$w[$kd]'&gt;ubah&lt;/a&gt; <br>
&lt;a href='?menu=$tb&amp;gos=hapus&amp;$k[0]=\$w[$kd]' onclick=\&quot;return confirm('Apakah anda yakin akan menghapus data ini?')\&quot; '&gt;hapus&lt;/a&gt; <br>";

?>
&lt;/td&gt; <br>
&lt;/tr&gt; <br>
"; <br>
} <br>
echo" <br>
&lt;tr&gt; &lt;td colspan=3&gt;Jumlah Data &lt;/td&gt;&lt;td&gt;$n &lt;/td&gt; &lt;td&gt; &lt;/td&gt;&lt;/tr&gt; <br>
&lt;/table&gt; <br>
"; <br>
}
<p>function lap(){ <br>
  include_once "../dwo.lib.php"; <br>
  include_once "../db.mysql.php"; <br>
  include_once "../connectdb.php"; <br>
  include_once "../ClassRC.php"; <br>
  <br>
  echo" <br>
</p>
<p>&lt;h2&gt;&lt;/h2&gt; </p>
&lt;table class=tb border=1 style='border-collapse:collapse; border:1px solid black; font-family:verdana; width:100%; font-size:12px; padding:4px;'&gt; <br>
&lt;tr id=jd&gt; <br>
&lt;td&gt;No&lt;/td&gt; <br>
<?php
$k=split(" ",$_POST[Isi]);
$j=count($k);
for($i=0; $i<=$j-1; $i++){
$rk=$k[$i];
echo"
&lt;td&gt;$rk&lt;/td&gt; <br>";}
?>
 
&lt;/tr&gt; <br>
"; <br>
<br>
<br>
<p>if (empty($_POST[kat])) $wh=""; else $wh="where $_POST[kat] like '$_POST[Cari]'"; </p>
<?php
echo"
\$r=mysql_query(&quot;select * from $tb \$wh &quot;); while(\$w=mysql_fetch_array(\$r)){ <br>";
?>
$n++; <br>
<br>
if ($n % 2 == 0) $warna = '#F0EFED'; <br>
else $warna = '#F3EFA6'; <br>
<br>
<br>
echo" <br>
&lt;tr bgcolor=$warna&gt; <br>
&lt;td&gt;$n&lt;/td&gt; <br>
<?php
$k=split(" ",$_POST[Isi]);
$j=count($k);
for($i=0; $i<=$j-1; $i++){
$rk=$k[$i];
echo"
&lt;td&gt;\$w[$rk]&lt;/td&gt; <br>";
}
?>
 
<br>
<br>
&lt;/tr&gt; <br>
"; <br>
} <br>
echo" <br>
&lt;tr&gt; &lt;td colspan=3&gt;Jumlah Data &lt;/td&gt;&lt;td&gt;$n &lt;/td&gt; &lt;td&gt; &lt;/td&gt;&lt;/tr&gt; <br>
&lt;/table&gt; <br>
"; <br>
}
<p>function hapus(){ <br>
<?php
$k=split(" ",$_POST[Isi]);
echo"
  mysql_query(&quot;delete from $tb  where $k[0]='\$_REQUEST[$k[0]]'&quot;  ); <br>";
  ?>
  BerhasilHapus("?menu=<?php echo "$tb"; ?>&amp;gos=tabel",500); <br>
  } </p>
<p>if(isset($_POST['simpan'])){ <br>
<?php
echo"
  \$w=GetFields('$tb','$k[0]',\$_POST['$k[0]'],'*'); <br>";
  ?>
  <br>
  if (empty($w)) <br>
  { <br>
//if($k[0]){<br>
//hasil<br>
//}elseif($k[1]){<br>
//hasil<br>
//}elseif($k[2]){<br>
//hasil<br>
//}<br>
<?php
echo"
  mysql_query(&quot;insert into $tb set  <br>";
  ?>
<?php
	$k=split(" ",$_POST[Isi]);
	$j=count($k);
	for($i=0; $i<=$j-1; $i++){
	$rk=$k[$i];
	echo"  $rk='\$_POST[$rk]', <br>";}
	?>
"); <br>
  <br>
  <br>
  
  BerhasilSimpan("?menu=<?php echo $tb ; ?>",500); <br>
  } <br>
  else <br>
  { <br>
  echo" <br>
&lt;script&gt; <br>
  alert('Maaf data Sudah ada'); <br>
&lt;/script&gt; <br>
"; </p>
<p>} <br>
  } </p>
<p>if(isset($_POST['ubah'])){ <br>
  mysql_query("update <?php echo $tb ; ?> set <br>
  <?php
	$k=split(" ",$_POST[Isi]);
	$j=count($k);
	for($i=0; $i<=$j-1; $i++){
	$rk=$k[$i];
	echo"
  		$rk='\$_POST[$rk]', <br>"; }
		$k=split(" ",$_POST[Isi]);
 echo"
  where $k[0]='\$_POST[$k[0]]' <br>";
?>
"); <br>
  BerhasilSimpan("?menu=<?php echo $tb; ?>&amp;gos=tabel",500); <br>
  } </p> 
   
<p>function ubah(){ <br>
  $r=mysql_query("select * from <?php echo "$tb where $k[0]='\$_REQUEST[$k[0]]'";?>"); $w=mysql_fetch_array($r); <br>
    <?php
	$k=split(" ",$_POST[Isi]);
	$j=count($k);
	for($i=0; $i<=$j-1; $i++){
	$rk=$k[$i];
	echo"
  // \$$rk= GetOption2('kategori', &quot;concat($k[0], ' - ', $rk)&quot;, '$rk', \$w['$rk'], '', '$rk'); <br>";}
  ?>
  //include "combo.php"; <br>
  
  <br>
  <br>
  <br>
  
  <br>
  echo" <br>
&lt;div  class='panel panel-box' &gt; <br>
&lt;form method=post action=''  enctype='multipart/form-data' id=fom3&gt; <br>
&lt;table class=table&gt; <br>
//&lt;input type=file name=Foto &gt; <br>
<?php
$k=split(" ",$_POST[Isi]);
$j=count($k);
for($i=0; $i<=$j-1; $i++){
$rk=$k[$i];
echo"
&lt;tr&gt;&lt;td class=inp &gt;$rk&lt;/td&gt; &lt;td class=ul &gt;&lt;input class='form-control' type=text size=60 name=$k[$i] value=\$w[$rk]&gt;&lt;/td&gt;&lt;/tr&gt; <br>
";}
?><br>
 
&lt;tr&gt;&lt;td&gt;&lt;input type=submit name=ubah value='Simpan'&gt;&lt;/td&gt;&lt;/tr&gt; <br>
&lt;/table&gt; <br>
&lt;/form&gt; <br>
&lt;/div&gt; <br>
"; <br>
  } <br>
</p>
<p>function cetak(){ <br>
  $kat=c<?php echo "$tb"; ?>($_POST[kat]); <br>
  echo" <br>
  <?php
  echo"
&lt;form method=post action='modul/$tb.php?gos=lap'&gt; <br>";
?>
&lt;table style='width:50%;'&gt; <br>
&lt;tr&gt;&lt;td&gt;Kata Kunci&lt;/td&gt;&lt;td&gt;&lt;select name=kat&gt;$kat&lt;/select&gt;&lt;/td&gt;&lt;/tr&gt; <br>
&lt;tr&gt;&lt;td&gt;Cari&lt;/td&gt; &lt;td&gt;&lt;input type=text name=Cari values=$_POST[Cari]&gt;&lt;/td&gt; &lt;/tr&gt; <br>
&lt;tr&gt;&lt;td&gt;&lt;/td&gt; &lt;td&gt;&lt;input type=submit name=ok value=Cari&gt;&lt;/td&gt; &lt;/tr&gt; </p>
<p> &lt;/table&gt; <br>
    <br>
&lt;/form&gt; <br>
"; </p>
<p>} <br>
</p>
<p>function c<?php echo "$tb"; ?>($minta){ </p>
<br>
$cb="cb <br>
&lt;option value='$minta'&gt; $minta &lt;/option&gt; <br>
<?php
$k=split(" ",$_POST[Isi]);
$j=count($k);
for($i=0; $i<=$j-1; $i++){
$rk=$k[$i];
echo"
&lt;option value='$rk'&gt; $rk &lt;/option&gt; <br>";}
?>
 
";
<p><br>
  return $cb ; <br>
  } </p>
?&gt; <br>
 
  