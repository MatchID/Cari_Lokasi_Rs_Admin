 
<?php $gos=(empty($_REQUEST['gos']))? 'tabel' :$_REQUEST['gos'];
$gos();
function tambah(){
echo"
<div class='col-md-6 panel' >
<form method=post action='' class='panel panel-box' enctype='multipart/form-data' id=fom3>
<table class='table'>
<tr><td class=inp >Nama Kelurahan dan Kecamatan</td> <td class=ul >
<select class='form-control' required='required' name=Id_Kelurahan id='Id_Kelurahan' >";
												$tampil =mysql_query("select * from kelurahan left outer join kecamatan on kelurahan.Id_Kecamatan=kecamatan.Id_Kecamatan");
									
												echo"<option selected disabled >- Pilih Nama Kecamatan -</option>";
								 
												while($ww=mysql_fetch_array($tampil)){
													echo"<option value=$ww[Id_Kelurahan] >$ww[Nama_Kelurahan] - $ww[Nama_Kecamatan]</option>" ;   
												}
												echo"
												</select>
												</td></tr>
<tr><td class=inp >Nama Rumah Sakit</td> <td class=ul ><input id=Nama_Rs class='control-form' type=text size=40 name=Nama_Rs value='$w[Nama_Rs]'></td></tr>
<tr><td class=inp >Alamat Rumah Sakit</td> <td class=ul ><input id=Alamat_Rs class='control-form' type=text size=40 name=Alamat_Rs value='$w[Alamat_Rs]'></td></tr>
<tr><td class=inp >Kontak Rumah Sakit</td> <td class=ul ><input id=Kontak class='control-form' type=text size=40 name=Kontak value='$w[Kontak]'></td></tr>
<tr><td class=inp >Direktur Rumah Sakit</td> <td class=ul ><input id=Direktur_Rs class='control-form' type=text size=40 name=Direktur_Rs value='$w[Direktur_Rs]'></td></tr>
<tr><td class=inp >Tipe Rumah Sakit</td> <td class=ul ><input id=Type_Rs class='control-form' type=text size=40 name=Type_Rs value='$w[Type_Rs]'></td></tr>
<tr><td class=inp >Layanan Rumah Sakit</td> <td class=ul ><textarea id=Layanan_Rs class='control-form' type=text size=40 name=Layanan_Rs >$w[Layanan_Rs]</textarea></td></tr>
<tr><td class=inp >Latitude</td> <td class=ul ><input id=Lat class='control-form' type=text size=40 name=Lat value=$w[Lat]></td></tr>
<tr><td class=inp >Longitude</td> <td class=ul ><input id=Lon class='control-form' type=text size=40 name=Lon value=$w[Lon]></td></tr>
<tr><td class=inp >Gambar</td> <td class=ul ><input id=Gambar class='control-form' type=file size=40 name=Gambar value=$w[Gambar]></td></tr>

<tr><td><input type=submit class='btn btn-succes' name=simpan value='Simpan'></td></tr>
</table>
</form>
</div>
";
}

function tabel(){
echo"
<div align=center>
<a class='btn btn-warning'  id=tx href='?menu=rs&gos=tambah'>Tambah </a>
</div>
";
//< i class='fa fa-plus'>
echo"
<table id=example1 class=table>
<tr id=jd>
<th class=ttl width=20 align=center>No</th>
<th>Nama Rumah Sakit</th>
<th>Alamat</th>
<th>Kelurahan</th>
<th>Kecamatan</th>
<th>Kontak</th>
<th>Direktur</th>
<th>Tipe</th>
<th>Layanan</th>
<th>Gambar</th>
<th class=ttl width=60 >Action</th>
</tr>
";

$r=mysql_query("select * from rsakit left outer join kelurahan on rsakit.Id_Kelurahan=kelurahan.Id_Kelurahan left outer join kecamatan on kecamatan.Id_Kecamatan=kelurahan.Id_Kecamatan "); while($w=mysql_fetch_array($r)){
$n++;

if ($n % 2 == 0) $warna = '#f0f5f5';
else $warna = '#ffffff';


echo"
<tr bgcolor=$warna>
<td align=center >$n</td>
<td >$w[Nama_Rs]</td>
<td >$w[Alamat_Rs]</td>
<td >$w[Nama_Kelurahan]</td>
<td >$w[Nama_Kecamatan]</td>
<td >$w[Kontak]</td>
<td >$w[Direktur_Rs]</td>
<td >$w[Type_Rs]</td>
<td >$w[Layanan_Rs]</td>
<td >$w[Gambar]</td>

<td width=60 align=center ><a href='?menu=rs&gos=ubah&Kode=$w[Id_Rs]'>ubah</a>
<a href='?menu=rs&gos=hapus&Kode=$w[Id_Rs]' onclick=\"return confirm('Apakah anda yakin akan menghapus data ini?')\" '>hapus</a>
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
mysql_query("delete from rsakit where Id_Rs='$_REQUEST[Kode]'" );
BerhasilHapus("?menu=rs&gos=tabel",500);
}

if(isset($_POST['simpan'])){
	
	$g=masukGambar("Gambar");
	if($g != ''){
		mysql_query("insert into rsakit set
		Id_Kelurahan='$_POST[Id_Kelurahan]',
		Nama_Rs='$_POST[Nama_Rs]',
		Alamat_Rs='$_POST[Alamat_Rs]',
		Kontak='$_POST[Kontak]',
		Direktur_Rs='$_POST[Direktur_Rs]',
		Type_Rs='$_POST[Type_Rs]',
		Layanan_Rs='$_POST[Layanan_Rs]',
		Lat='$_POST[Lat]',
		Lon='$_POST[Lon]',
		Gambar='$g'
		");
	}else{
		mysql_query("insert into rsakit set
		Id_Kelurahan='$_POST[Id_Kelurahan]',
		Nama_Rs='$_POST[Nama_Rs]',
		Alamat_Rs='$_POST[Alamat_Rs]',
		Kontak='$_POST[Kontak]',
		Direktur_Rs='$_POST[Direktur_Rs]',
		Type_Rs='$_POST[Type_Rs]',
		Layanan_Rs='$_POST[Layanan_Rs]',
		Lat='$_POST[Lat]',
		Lon='$_POST[Lon]'
		");
	}


BerhasilSimpan("?menu=rs",500);

}

if(isset($_POST['ubah'])){
	$g=masukGambar("Gambar");
	if($g != ''){	
		mysql_query("update rsakit set
		Id_Kelurahan='$_POST[Id_Kelurahan]',
		Nama_Rs='$_POST[Nama_Rs]',
		Alamat_Rs='$_POST[Alamat_Rs]',
		Kontak='$_POST[Kontak]',
		Direktur_Rs='$_POST[Direktur_Rs]',
		Type_Rs='$_POST[Type_Rs]',
		Layanan_Rs='$_POST[Layanan_Rs]',
		Lat='$_POST[Lat]',
		Lon='$_POST[Lon]',
		Gambar='$g'
		where Id_Rs='$_POST[Kode]'
		");
	}else{	
		mysql_query("update rsakit set
		Id_Kelurahan='$_POST[Id_Kelurahan]',
		Nama_Rs='$_POST[Nama_Rs]',
		Alamat_Rs='$_POST[Alamat_Rs]',
		Kontak='$_POST[Kontak]',
		Direktur_Rs='$_POST[Direktur_Rs]',
		Type_Rs='$_POST[Type_Rs]',
		Layanan_Rs='$_POST[Layanan_Rs]',
		Lat='$_POST[Lat]',
		Lon='$_POST[Lon]'
		where Id_Rs='$_POST[Kode]'
		");
	}
BerhasilSimpan("?menu=rs&gos=tabel",500);
}

function ubah(){
$r=mysql_query("select * from rsakit where Id_Rs='$_REQUEST[Kode]'"); $w=mysql_fetch_array($r);

echo"
<div class='panel panel-box' >
<form method=post action='' enctype='multipart/form-data' id=fom3>
<table class=table>
<input class='form-control' type=hidden size=60 name=Kode value=$w[Id_Rs]>

<tr><td class=inp >Nama Kelurahan</td> <td class=ul >
<select class='form-control' required='required' name=Id_Kelurahan id='Id_Kelurahan' >";
												$tampil =mysql_query("select * from kelurahan left outer join kecamatan on kelurahan.Id_Kecamatan=kecamatan.Id_Kecamatan");
									
												echo"<option disabled >- Pilih Nama Kecamatan -</option>";
								 
												while($ww=mysql_fetch_array($tampil)){
													echo"<option value=$ww[Id_Kelurahan]"; if($ww[Id_Kelurahan] == $w[Id_Kelurahan]){echo "selected";}echo" >$ww[Nama_Kecamatan] - $ww[Nama_Kelurahan]</option>" ;   
												}
												echo"
												</select>
												</td></tr>
<tr><td class=inp >Nama Rumah Sakit</td> <td class=ul ><input id=Nama_Rs class='control-form' type=text size=40 name=Nama_Rs value='$w[Nama_Rs]'></td></tr>
<tr><td class=inp >Alamat Rumah Sakit</td> <td class=ul ><input id=Alamat_Rs class='control-form' type=text size=40 name=Alamat_Rs value='$w[Alamat_Rs]'></td></tr>
<tr><td class=inp >Kontak Rumah Sakit</td> <td class=ul ><input id=Kontak class='control-form' type=text size=40 name=Kontak value='$w[Kontak]'></td></tr>
<tr><td class=inp >Direktur Rumah Sakit</td> <td class=ul ><input id=Direktur_Rs class='control-form' type=text size=40 name=Direktur_Rs value='$w[Direktur_Rs]'></td></tr>
<tr><td class=inp >Tipe Rumah Sakit</td> <td class=ul ><input id=Type_Rs class='control-form' type=text size=40 name=Type_Rs value='$w[Type_Rs]'></td></tr>
<tr><td class=inp >Layanan Rumah Sakit</td> <td class=ul ><textarea id=Layanan_Rs class='control-form' type=text size=40 name=Layanan_Rs >$w[Layanan_Rs]</textarea></td></tr>
<tr><td class=inp >Latitude</td> <td class=ul ><input id=Lat class='control-form' type=text size=40 name=Lat value=$w[Lat]></td></tr>
<tr><td class=inp >Longitude</td> <td class=ul ><input id=Lon class='control-form' type=text size=40 name=Lon value=$w[Lon]></td></tr>
<tr><td class=inp >Gambar</td> <td class=ul ><input id=Gambar class='control-form' type=file size=40 name=Gambar value=$w[Gambar]></td></tr>

<tr><td><input type=submit name=ubah value='Simpan'></td></tr>
</table>
</form>
</div>
";
}
?>
