<link href="<?php echo base_url(); ?>jqueryui/development-bundle/themes/base/jquery-ui.css" rel="stylesheet"/>

	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/jquery-1.8.3.js"></script>

<div id="isi">
<h2>Pengalaman Kerja</h2>
	<p><br>
<form method="post" action="<?php echo base_url(); ?>index.php/utama/updatepeng" enctype="multipart/form-data">
<fieldset>
<legend><b>PENGALAMAN KERJA</b></legend>
<form method="post" action="<?php echo base_url(); ?>index.php/utama/updatepeng" enctype="multipart/form-data">
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<td width="50">Tahun</td><td width="10" align="center">:</td><td><input type="text" class="input" name="tahunawal" size="10" />s/d<input type="text" class="input" name="tahunakhir" size="10" /></td></tr>
<td width="150">Rincian Pekerjaan</td><td width="10" align="center">:</td><td><input type="text" class="input" name="rincian" size="50" /></td></tr>
<td width="150"></td><td width="10" align="center"></td><td><input type="submit" value="Masukkan Data Pengalaman Kerja" class="input" onClick="return confirm('Tersimpan...!')"/> <input type="reset" value="Reset Form" class="input" /></td></tr>
</table>
</form> 
<br />
</fieldset>
</form> 
<br />
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>Nomor</strong></td><td><strong>Tahun</strong></td><td><strong>Rincian Pekerjaan</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php 	foreach($peng->result_array() as $p); if(empty($p)){ $no = 0; ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo ''; ?></td>
<td><?php echo 'Belum ada data...'; ?></td>
<?php 
} else {
$no = 1;
foreach($peng->result_array() as $p){ ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo $p['tahun']; ?></td>
<td><?php echo $p['tempat']; ?></td>
<?php
echo"<td><a href='".base_url()."index.php/utama/hapuspeng/".$p['id']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td>";
?>
</tr>
<?php 
$no++;
 }
  }
?>
</table><br />
<tr><td></td><td><a href="<?php echo base_url(); ?>index.php/utama/cvskill" class="button"/>Lanjut ke Data Kompetensi Keahlian</a></td></tr><br />
<?php// echo $paginator;?>
<!-- Batas content bawah -->
</div>