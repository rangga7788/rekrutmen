<div id="isi">
<h1>Hasil Seleksi</h1><br />

<table width="100%">
<?php
echo "<tr align='center'>
<td><strong>Nomor</strong></td>
<td><strong>Nomor Registrasi</strong></td>
<td><strong>Nama Lengkap</strong></td>
<td><strong>Alamat</strong></td>
<td><strong>Tanggal Lahir</strong></td>
<td><strong>Pilihan</strong></td>
<td><strong>Waktu Pendaftaran</strong></td>
<td colspan='2' width='10'><strong>Status</strong></td></tr>";
$no=$page+1;
foreach($pl->result_array() as $s)
{
if ($s['id_bidang']==='1'){$bid='Programmer';}else{$bid='Networking';}
if ($s['hasil']==='Lulus'){$hasil='<font color = green>Lulus</font>';}else{$hasil='<font color = red>Tidak Lulus</font>';}
	echo "<tr>
	<td>".$no."</td>
	<td>".$s['no_reg']."</td>
	<td>".$s['nama']."</td>
	<td>".$s['alamat']."</td>
	<td>".$s['tgl_lahir']."</td>
	<td>".$bid."</td>
	<td>".$s['time']."</td>
	<td><a href='".base_url()."index.php/master/lulus/".$s['no_reg']."'  ><div class='submitButton2'>$hasil</div></a></td></tr>";
	$no++;
}
?>

</table>
</div>