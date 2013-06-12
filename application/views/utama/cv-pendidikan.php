<link href="<?php echo base_url(); ?>jqueryui/development-bundle/themes/base/jquery-ui.css" rel="stylesheet"/>

	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/jquery-1.8.3.js"></script>


<div id="isi">
<h2>Riwayat Pendidikan</h2><br />
	<p>Isikan riwayat pendidikan anda.<br></br></br>
<form method="post" action="<?php echo base_url(); ?>index.php/utama/updatepend" enctype="multipart/form-data">
<fieldset>
<legend><b>PENDIDIKAN</b></legend>
<form method="post" action="<?php echo base_url(); ?>index.php/utama/updatepend" enctype="multipart/form-data">
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr><td width="150">Kategori</td><td width="10" align="center">:</td><td><select name="kat"  class="input">
<option value="Formal" >Pendidikan Formal</option>
<option value="NonFormal" >Pendidikan Non-Formal / Kursus</option>
</select>
</td></tr>
<tr><td width="150">Tingkat</td><td width="10" align="center">:</td><td><select name="tingkat"  class="input">

<option value="SD" >SD</option>
<option value="SLTP" >SLTP</option>
<option value="SLTA" >SLTA</option>
<option value="PT" >Perguruan Tinggi</option>
<option value="NonFormal" ><i>NonFormal</i></option>
</select>
</td></tr>
<td width="50">Tahun Tamat</td><td width="10" align="center">:</td><td><input type="text" class="input" name="tahun" size="18" /></td></tr>
<td width="150">Sekolah/PT/Tempat Kursus/Training</td><td width="10" align="center">:</td><td><input type="text" class="input" name="sekolah" size="50" /></td></tr>
<td width="150"></td><td width="10" align="center"></td><td><input type="submit" value="Masukkan Data Pendidikan" class="input" onClick="return confirm('Tersimpan...!')"/> <input type="reset" value="Reset Form" class="input" /></td></tr>
</table>
</form> 
<br />
</fieldset>
</form> 
<br />
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>Nomor</strong></td><td><strong>Kategori</strong></td><td><strong>Tingkat</strong></td><td><strong>Tahun Tamat</strong></td><td><strong>Nama Sekolah / PT / Tempat Kursus / Training</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php 	foreach($pend->result_array() as $p); if(empty($p)){ $no = 0; ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo ''; ?></td>
<td><?php echo ''; ?></td>
<td><?php echo ''; ?></td>
<td><?php echo 'Belum ada data...'; ?></td>
<?php 
} else {
$no = 1;
foreach($pend->result_array() as $p){ ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo $p['kat']; ?></td>
<td><?php echo $p['tingkat']; ?></td>
<td><?php echo $p['thn_tamat']; ?></td>
<td><?php echo $p['sekolah']; ?></td>
<?php
echo"<td><a href='".base_url()."index.php/utama/hapuspend/".$p['id']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td>";
?>
</tr>
<?php 
$no++;
 }
  }
?>
</table><br /><tr><td></td><td><a href="<?php echo base_url(); ?>index.php/utama/cvpeng" class="button"/>Lanjut ke Data Pengalaman Kerja</a></td></tr>
<?php// echo $paginator;?>
<!-- Batas content bawah -->
</div>