<link href="<?php echo base_url(); ?>jqueryui/development-bundle/themes/base/jquery-ui.css" rel="stylesheet"/>

	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/jquery-1.8.3.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.datepicker.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/external/jquery.bgiframe-2.1.2.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.mouse.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.button.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.draggable.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.position.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.resizable.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.dialog.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.effect.js"></script>


<div id="isi">
<h2>Upload Berkas</h2><br />
	<p>Silahkan upload berkas-berkas lamaran anda melalui form dibawah ini.<br>Berkas yang kami butuhkan adalah:</p>
	<div class="cleaner_h20"></div>
	<ul>
	<li><b>Scan KTP</b>: Hasil scan KTP asli berwarna, baik KTP lama maupun e-KTP.</li>
	<li><b>Foto Diri</b>: Pas Foto Diri berdimensi 3x4 cm dengan ukuran tidak lebih dari 500KB.</li>
	<li><b>Referensi Keahlian</b>: Berupa dokumen penguat kompetensi yang dimiliki, seperti Sertifikat Keahlian, Seminar IT, Workshop, Training, dll. (jika ada)</li>
	</ul></br></br>
<form method="post" action="<?php echo base_url(); ?>index.php/utama/simpanberkas" enctype="multipart/form-data">
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<td width="150">Jenis Berkas</td><td width="10" align="center">:</td><td><select name="judul"  class="input">
<option value="Scan KTP" >Scan KTP (harus ada)</option>
<option value="Foto Diri" >Foto Diri (harus ada)</option>
<option value="Referensi Keahlian" >Referensi Keahlian (opsional)</option>
</select>
</td></tr>
<td width="150">Berkas</td><td width="10" align="center">:</td><td><input type="file" class="input" name="userfile" size="50" /></td></tr>
<td width="150"></td><td width="10" align="center"></td><td><input type="submit" value="Upload Berkas" class="input" /> <input type="reset" value="Reset Form" class="input" /></td></tr>
</table>
</form> 
<br />
<table width="100%" cellpadding="2" cellspacing="1" class="widget-small">
<tr bgcolor="#FFF" align="center"><td><strong>Nomor</strong></td><td><strong>Jenis Berkas</strong></td><td><strong>Tgl Upload</strong></td><td><strong>Pemilik</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php 	foreach($download->result_array() as $down); if(empty($down)){ $no = 0; ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo 'Belum ada berkas...'; ?></td>
<td><?php echo ''; ?></td>
<td><?php echo ''; ?></td>
<?php 
} else {
$no = 1+$page;
foreach($download->result_array() as $down){ ?>
<tr bgcolor='#D6F3FF'>
<td><?php echo $no; ?></td>
<td><?php echo $down['judul_file']; ?></td>
<td><?php echo $down['tgl_posting']; ?></td>
<td><?php echo $down['author']; ?></td>
<?php
echo"<td><a href='".base_url()."index.php/utama/hapusupload/".$down['id_download']."' onClick=\"return confirm('Anda yakin ingin menghapus data ini?')\" ><div class='submitButton2'>Hapus Data</div></a></td>";
?>
</tr>
<?php 
$no++;
 }
  }
?>
</table><br />
<tr><td></td><td><a href="<?php echo base_url(); ?>index.php/utama/selesai" class="button"/>PENDAFTARAN SELESAI</a></td></tr><br />
<?php// echo $paginator;?>
<!-- Batas content bawah -->
</div>