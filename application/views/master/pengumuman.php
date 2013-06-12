<div id="isi">
<h1>Pengumuman</h1><br />

<form name="form" method="post" action="<?php echo base_url(); ?>index.php/master/simpan">

<table align="center" width="100%">
<tr><td>Pesan Pengumuman bagi yang Lulus :</td><td><textarea name="lulus"><?php echo "$lulus"; ?></textarea></td></tr>
<tr><td>Pesan Pengumuman bagi yang Gagal :</td><td><textarea name="tidaklulus"><?php echo "$tidaklulus"; ?></textarea></td></tr>
<tr><td>Pesan Pengumuman bagi umum :</td><td><textarea name="umum"><?php echo "$umum"; ?></textarea></td></tr>
<tr><td><input type="submit" value="Simpan" class="submitButton2"></td><td></td></tr>
</table>
</form>
</div>