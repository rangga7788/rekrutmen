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
<body lang=IN style='tab-interval:36.0pt' onload='javascript:window.print()'>

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
<td><strong>Waktu Pendaftaran</strong></td></tr>";
$no=1;
foreach($pl->result_array() as $s)
{
if ($s['id_bidang']==='1'){$bid='Programmer';}else{$bid='Networking';}
	echo "<tr>
	<td>".$no."</td>
	<td>".$s['no_reg']."</td>
	<td>".$s['nama']."</td>
	<td>".$s['alamat']."</td>
	<td>".$s['tgl_lahir']."</td>
	<td>".$bid."</td>
	<td>".$s['time']."</td></tr>";
	$no++;
}
?>
</table>
</div>
</body>