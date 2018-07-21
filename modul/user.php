 
<?php $gos=(empty($_REQUEST['gos']))? 'tabel' :$_REQUEST['gos'];
$gos();
function tambah(){
//<input type=file name=Foto >
// $Kode= GetOption2('kategori', "concat(Kode, ' - ', Kode)", 'Kode', $w['Kode'], '', 'Kode');
// $Username= GetOption2('kategori', "concat(Kode, ' - ', Username)", 'Username', $w['Username'], '', 'Username');
// $Password= GetOption2('kategori', "concat(Kode, ' - ', Password)", 'Password', $w['Password'], '', 'Password');
// $Level= GetOption2('kategori', "concat(Kode, ' - ', Level)", 'Level', $w['Level'], '', 'Level');
// $m0=_selek("select * from user where Kode='$_POST[Kode]'");
// $m1=_selek("select * from user where Username='$_POST[Username]'");
// $m2=_selek("select * from user where Password='$_POST[Password]'");
// $m3=_selek("select * from user where Level='$_POST[Level]'");

echo"
<div class='col-md-6 panel' >
<form method=post action='' class='panel panel-box' enctype='multipart/form-data' id=fom3>
<table class='table'>
<input id=Kode class='control-form' type=hidden size=60 name=Kode value=$w[Kode]>
<tr><td class=inp >Nama User</td> <td class=ul ><input id=Nama_User class='control-form' type=text size=40 name=Nama_User value=$w[Nama_User]></td></tr>
<tr><td class=inp >Username</td> <td class=ul ><input id=Username class='control-form' type=text size=40 name=Username value=$w[Username]></td></tr>
<tr><td class=inp >Password</td> <td class=ul ><input id=Password class='control-form' type=text size=40 name=Password value=$w[Password]></td></tr>
<!-- <tr><td class=inp >Level</td> <td class=ul >
<select class='form-control' required='required' name=Level id='Level' >
<option disabled selected  >- Pilih Level -</option>
<option value=1 >Admin</option>
<option value=2 >Admin Gudang</option>
<option value=3 >Pimpinan</option>
</select>
</td></tr> -->


<tr><td><input type=submit class='btn btn-succes' name=simpan value='Simpan'></td></tr>
</table>
</form>
</div>
";
}

function tabel(){

echo"


<div align=center>
<a class='btn btn-warning'  id=tx href='?menu=user&gos=tambah'>Tambah </a>
</div>
";
//< i class='fa fa-plus'>
echo"
<table id=example1 class=table>
<tr id=jd>
<th class=ttl width=20 align=center>No</th>
<th>Nama User</th>
<th>Username</th>
<th>Password</th>
<th class=ttl width=60 >Action</th>
</tr>
";


if (empty($_POST[kat])) $wh=""; else $wh="where $_POST[kat] like '$_POST[Cari]'";
$r=mysql_query("select * from user $wh "); while($w=mysql_fetch_array($r)){
$n++;

if ($n % 2 == 0) $warna = '#f0f5f5';
else $warna = '#ffffff';


echo"
<tr bgcolor=$warna>
<td align=center >$n</td>
<td >$w[Nama_User]</td>
<td >$w[Username]</td>
<td >$w[Password]</td>


<td width=60 align=center ><a href='?menu=user&gos=ubah&Kode=$w[Id_User]'>ubah</a>
<a href='?menu=user&gos=hapus&Kode=$w[Id_User]' onclick=\"return confirm('Apakah anda yakin akan menghapus data ini?')\" '>hapus</a>
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
mysql_query("delete from user where Id_User='$_REQUEST[Kode]'" );
BerhasilHapus("?menu=user&gos=tabel",500);
}

if(isset($_POST['simpan'])){
$w=GetFields('user','Id_User',$_POST['Kode'],'*');

if (empty($w))
{
//if($k[0]){
//hasil
//}elseif($k[1]){
//hasil
//}elseif($k[2]){
//hasil
//}
mysql_query("insert into user set
Nama_User='$_POST[Nama_User]',
Username='$_POST[Username]',
Password='$_POST[Password]'
");


BerhasilSimpan("?menu=user",500);
}
else
{
echo"
<script>
alert('Maaf data Sudah ada');
</script>
";

}
}

if(isset($_POST['ubah'])){
mysql_query("update user set
Nama_User='$_POST[Nama_User]',
Username='$_POST[Username]',
Password='$_POST[Password]'
where Id_User='$_POST[Kode]'
");
BerhasilSimpan("?menu=user&gos=tabel",500);
}

function ubah(){
$r=mysql_query("select * from user where Id_User='$_REQUEST[Kode]'"); $w=mysql_fetch_array($r);
// $Kode= GetOption2('kategori', "concat(Kode, ' - ', Kode)", 'Kode', $w['Kode'], '', 'Kode');
// $Username= GetOption2('kategori', "concat(Kode, ' - ', Username)", 'Username', $w['Username'], '', 'Username');
// $Password= GetOption2('kategori', "concat(Kode, ' - ', Password)", 'Password', $w['Password'], '', 'Password');
// $Level= GetOption2('kategori', "concat(Kode, ' - ', Level)", 'Level', $w['Level'], '', 'Level');
//include "combo.php";




echo"
<div class='panel panel-box' >
<form method=post action='' enctype='multipart/form-data' id=fom3>
<table class=table>
<input class='form-control' type=hidden size=60 name=Kode value=$w[Id_User]>
<tr><td class=inp >Nama User</td> <td class=ul ><input class='form-control' type=text size=60 name=Nama_User value=$w[Nama_User]></td></tr>
<tr><td class=inp >Username</td> <td class=ul ><input class='form-control' type=text size=60 name=Username value=$w[Username]></td></tr>
<tr><td class=inp >Password</td> <td class=ul ><input class='form-control' type=text size=60 name=Password value=$w[Password]></td></tr>
<!-- <tr><td class=inp >Level</td> <td class=ul ><select class='form-control' required='required' name=Level id='Level' >
<option disabled >- Pilih Level -</option>";
if($w[Level] == '1'){
	echo"
<option selected value=1 >Admin</option>
<option value=2 >Admin Gudang</option>
<option value=3 >Pimpinan</option>";
}else if($w[Level] == '2'){
	echo"
<option value=1 >Admin</option>
<option selected value=2 >Admin Gudang</option>
<option value=3 >Pimpinan</option>";
}else if($w[Level] == '3'){
	echo"
<option value=1 >Admin</option>
<option value=2 >Admin Gudang</option>
<option selected value=3 >Pimpinan</option>";
}
echo"
</select>
</td></tr> -->

<tr><td><input type=submit name=ubah value='Simpan'></td></tr>
</table>
</form>
</div>
";
}


?>
