<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url(); ?>css/portal-style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/icon.png" />
<script type="text/javascript" src="<?php echo base_url(); ?>js/dropdown.js"></script>
<script language="javascript">
var popupWindow = null;
function centeredPopup(url,winName,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
popupWindow = window.open(url,winName,settings)
}
</script>
</head>

<div id="isi">
<h1>Daftar Pelamar</h1><br />

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
<td colspan='2' width='10'><strong>Aksi</strong></td></tr>";
$no=$page+1;
foreach($pl->result_array() as $s)
{
$bidang = $this->Mod_utama->Namabidang($s['no_reg']);
	echo "<tr>
	<td>".$no."</td>
	<td>".$s['no_reg']."</td>
	<td>".$s['nama']."</td>
	<td>".$s['alamat']."</td>
	<td>".$s['tgl_lahir']."</td>
	<td>".$bidang."</td>
	<td>".$s['time']."</td>
	<td>
	<a onclick=\"centeredPopup(this.href,'myWindow','670','500','yes');return false\" href='".base_url()."index.php/master/cetak/".$s['no_reg']."'><div class='submitButton2'>Cetak</div></a></td><td><a href='".base_url()."index.php/master/hapus/".$s['no_reg']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus</div></a></td></tr>";
	$no++;
}
?>
<table align="center" width="100%"><tr><td><?php echo $paginator; ?></td></tr></table>
<table align="center" width="100%">
<tr>
	<td width="20%"><form><select>
<?php
foreach($bids->result_array() as $k)
{
echo "<option value='".$k['id_bidang']."'>".$k['nama_bidang']."</option>";
}
?>
</select></form></td>
	<td width="80%"><a href='cetaktabel'  ><div class='submitButton2'>Cetak Tabel per bidang kerja</div></a></td>
</tr>
</table>
</table>
</div>