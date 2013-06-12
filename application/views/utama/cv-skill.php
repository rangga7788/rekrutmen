<link href="<?php echo base_url(); ?>jqueryui/development-bundle/themes/base/jquery-ui.css" rel="stylesheet"/>

	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/jquery-1.8.3.js"></script>


<div id="isi">
<h2>Daftar Keahlian / Kemampuan Khusus</h2>
	<p>Isikan satu per satu daftar kemampuan / kompetensi keahlian anda dalam bidang IT. keahlian yang dimaksud tidak harus berhubungan dengan Bidang Kerja yang anda pilih.<br>
<form method="post" action="<?php echo base_url(); ?>index.php/utama/updateskill" enctype="multipart/form-data">
<fieldset>
<legend><b>Daftar Keahlian</b></legend>
<form method="post" action="<?php echo base_url(); ?>index.php/utama/updateskill" enctype="multipart/form-data">
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<td width="150">Rincian Keahlian</td><td width="10" align="center">:</td><td><input type="text" class="input" name="skill" size="80" /></td></tr>
<td width="150"></td><td width="10" align="center"></td><td><input type="submit" value="Simpan / Tambah Data" class="input" onClick="return confirm('Tersimpan...!')"/> <input type="reset" value="Reset Form" class="input" /></td></tr>
</table>
</form> 
<br />
</fieldset>
</form> 
<br />
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>Nomor</strong></td><td><strong>Rincian Keahlian</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php 	foreach($skill->result_array() as $p); if(empty($p)){ $no = 0; ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo 'Belum ada data...'; ?></td>
<?php 
} else {
$no = 1;
foreach($skill->result_array() as $p){ ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo $p['skill']; ?></td>
<?php
echo"<td><a href='".base_url()."index.php/utama/hapusskill/".$p['id']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='button'>Hapus Data</div></a></td>";
?>
</tr>
<?php 
$no++;
 }
  }
?>
</table><br />
<tr><td></td><td><a href="<?php echo base_url(); ?>index.php/utama/berkas" class="button"/>Lanjut ke Upload Berkas</a></td></tr><br />
<?php// echo $paginator;?>
<!-- Batas content bawah -->
</div>