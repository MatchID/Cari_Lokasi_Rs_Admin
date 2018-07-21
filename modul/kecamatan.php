 
<?php $gos=(empty($_REQUEST['gos']))? 'tabel' :$_REQUEST['gos'];
$gos();
function tambah(){
echo"
<div class='col-md-6 panel' >
<form method=post action='' class='panel panel-box' enctype='multipart/form-data' id=fom3>
<table class='table'>
<tr><td class=inp >Nama Kecamatan</td> <td class=ul ><input id=Nama_Kecamatan class='control-form' type=text size=40 name=Nama_Kecamatan value=$w[Nama_Kecamatan]></td></tr>

<tr><td><input type=submit class='btn btn-succes' name=simpan value='Simpan'></td></tr>
</table>
</form>
</div>
";
}

function tabel(){
echo"
<div align=center>
<a class='btn btn-warning'  id=tx href='?menu=kecamatan&gos=tambah'>Tambah </a>
</div>
";
//< i class='fa fa-plus'>
echo"
<table id=example1 class=table>
<tr id=jd>
<th class=ttl width=20 align=center>No</th>
<th>Nama Kecamatan</th>
<th class=ttl width=60 >Action</th>
</tr>
";


if (empty($_POST[kat])) $wh=""; else $wh="where $_POST[kat] like '$_POST[Cari]'";
$r=mysql_query("select * from kecamatan $wh "); while($w=mysql_fetch_array($r)){
$n++;

if ($n % 2 == 0) $warna = '#f0f5f5';
else $warna = '#ffffff';


echo"
<tr bgcolor=$warna>
<td align=center >$n</td>
<td >$w[Nama_Kecamatan]</td>


<td width=60 align=center ><a href='?menu=kecamatan&gos=ubah&Kode=$w[Id_Kecamatan]'>ubah</a>
<a href='?menu=kecamatan&gos=hapus&Kode=$w[Id_Kecamatan]' onclick=\"return confirm('Apakah anda yakin akan menghapus data ini?')\" '>hapus</a>
</td>
</tr>
";
}
echo"
<tr> <td colspan=3>Jumlah Data </td><td>$n </td> <td> </td></tr>
</table>
";
}

function hapus(){
mysql_query("delete from kecamatan where Id_Kecamatan='$_REQUEST[Kode]'" );
BerhasilHapus("?menu=kecamatan&gos=tabel",500);
}

if(isset($_POST['simpan'])){
mysql_query("insert into kecamatan set
Nama_Kecamatan='$_POST[Nama_Kecamatan]'
");


BerhasilSimpan("?menu=kecamatan",500);

}

if(isset($_POST['ubah'])){
mysql_query("update kecamatan set
Nama_Kecamatan='$_POST[Nama_Kecamatan]'
where Id_Kecamatan='$_POST[Kode]'
");
BerhasilSimpan("?menu=kecamatan&gos=tabel",500);
}

function ubah(){
$r=mysql_query("select * from kecamatan where Id_Kecamatan='$_REQUEST[Kode]'"); $w=mysql_fetch_array($r);

echo"
<div class='panel panel-box' >
<form method=post action='' enctype='multipart/form-data' id=fom3>
<table class=table>
<input class='form-control' type=hidden size=60 name=Kode value=$w[Id_Kecamatan]>
<tr><td class=inp >Nama Kecamatan</td> <td class=ul ><input class='form-control' type=text size=60 name=Nama_Kecamatan value='$w[Nama_Kecamatan]'></td></tr>

<tr><td><input type=submit name=ubah value='Simpan'></td></tr>
</table>
</form>
</div>
";
}
?>
