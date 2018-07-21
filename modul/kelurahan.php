 
<?php $gos=(empty($_REQUEST['gos']))? 'tabel' :$_REQUEST['gos'];
$gos();
function tambah(){
echo"
<div class='col-md-6 panel' >
<form method=post action='' class='panel panel-box' enctype='multipart/form-data' id=fom3>
<table class='table'>
<tr><td class=inp >Nama Kecamatan</td> <td class=ul >
<select class='form-control' required='required' name=Id_Kecamatan id='Id_Kecamatan' >";
												$tampil =mysql_query("select * from kecamatan");
									
												echo"<option selected disabled >- Pilih Nama Kecamatan -</option>";
								 
												while($ww=mysql_fetch_array($tampil)){
													echo"<option value=$ww[Id_Kecamatan] >$ww[Nama_Kecamatan]</option>" ;   
												}
												echo"
												</select>
												</td></tr>
<tr><td class=inp >Nama Kelurahan</td> <td class=ul ><input id=Nama_Kelurahan class='control-form' type=text size=40 name=Nama_Kelurahan value=$w[Nama_Kelurahan]></td></tr>

<tr><td><input type=submit class='btn btn-succes' name=simpan value='Simpan'></td></tr>
</table>
</form>
</div>
";
}

function tabel(){
echo"
<div align=center>
<a class='btn btn-warning'  id=tx href='?menu=kelurahan&gos=tambah'>Tambah </a>
</div>
";
//< i class='fa fa-plus'>
echo"
<table id=example1 class=table>
<tr id=jd>
<th class=ttl width=20 align=center>No</th>
<th>Nama Kelurahan</th>
<th>Nama Kecamatan</th>
<th class=ttl width=60 >Action</th>
</tr>
";

$r=mysql_query("select * from kelurahan left outer join kecamatan on kecamatan.Id_Kecamatan=kelurahan.Id_Kecamatan "); while($w=mysql_fetch_array($r)){
$n++;

if ($n % 2 == 0) $warna = '#f0f5f5';
else $warna = '#ffffff';


echo"
<tr bgcolor=$warna>
<td align=center >$n</td>
<td >$w[Nama_Kelurahan]</td>
<td >$w[Nama_Kecamatan]</td>

<td width=60 align=center ><a href='?menu=kelurahan&gos=ubah&Kode=$w[Id_Kelurahan]'>ubah</a>
<a href='?menu=kelurahan&gos=hapus&Kode=$w[Id_Kelurahan]' onclick=\"return confirm('Apakah anda yakin akan menghapus data ini?')\" '>hapus</a>
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
mysql_query("delete from kelurahan where Id_Kelurahan='$_REQUEST[Kode]'" );
BerhasilHapus("?menu=kelurahan&gos=tabel",500);
}

if(isset($_POST['simpan'])){
	
mysql_query("insert into kelurahan set
Id_Kecamatan='$_POST[Id_Kecamatan]',
Nama_Kelurahan='$_POST[Nama_Kelurahan]'
");


BerhasilSimpan("?menu=kelurahan",500);

}

if(isset($_POST['ubah'])){	
mysql_query("update kelurahan set
Id_Kecamatan='$_POST[Id_Kecamatan]',
Nama_Kelurahan='$_POST[Nama_Kelurahan]'
where Id_Kelurahan='$_POST[Kode]'
");
BerhasilSimpan("?menu=kelurahan&gos=tabel",500);
}

function ubah(){
$r=mysql_query("select * from kelurahan where Id_Kelurahan='$_REQUEST[Kode]'"); $w=mysql_fetch_array($r);

echo"
<div class='panel panel-box' >
<form method=post action='' enctype='multipart/form-data' id=fom3>
<table class=table>
<input class='form-control' type=hidden size=60 name=Kode value=$w[Id_Kelurahan]>

<tr><td class=inp >Nama Kelurahan</td> <td class=ul >
<select class='form-control' required='required' name=Id_Kecamatan id='Id_Kecamatan' >";
												$tampil =mysql_query("select * from kecamatan");
									
												echo"<option disabled >- Pilih Nama Kecamatan -</option>";
								 
												while($ww=mysql_fetch_array($tampil)){
													echo"<option value=$ww[Id_Kecamatan]"; if($ww[Id_Kecamatan] == $w[Id_Kecamatan]){echo "selected";}echo" >$ww[Nama_Kecamatan]</option>" ;   
												}
												echo"
												</select>
												</td></tr>
<tr><td class=inp >Nama Kelurahan</td> <td class=ul ><input id=Nama_Kelurahan class='control-form' type=text size=40 name=Nama_Kelurahan value=$w[Nama_Kelurahan]></td></tr>

<tr><td><input type=submit name=ubah value='Simpan'></td></tr>
</table>
</form>
</div>
";
}
?>
