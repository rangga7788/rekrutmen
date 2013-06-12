		<script type="text/javascript">
			$(document).ready(function(){
				$("#frm").validate({
					debug: false,
					rules: {
						nama: "required",

					},
					messages: {
						nama: "* Kosong",

					},
					submitHandler: function(form) {
						// do other stuff for a valid form
						$.post('<?php echo base_url(); ?>index.php/utama/update', $("#frm").serialize(), function(data) {
							$('#hasil').html(data);
						alert ('Tersimpan...!');
						});
					}
				});
			});
			</script>
		<script type="text/javascript">
			$(function(){
                                $('#tanggal_lahir').datepicker({dateFormat: 'd MM yy'});
			});
		</script>

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/sunny/jquery-ui.css" type="text/css" rel="stylesheet"/>
<h2>Form Kelengkapan Data Pelamar</h2>
	<p>Isi data-data lengkap anda disini. jika ada data yang belum anda miliki, anda bisa kembali lagi lain waktu untuk melengkapi data-data ini selama masa pendaftaran masih dibuka.</p>
	<div class="cleaner_h10"></div>
<form name="frm" method="post" id="frm">
<fieldset>
<legend><b>DATA PRIBADI</b></legend>
<table>
<tr><td>Nama Lengkap</td><td>: <input type="text" name="nama" size="30" value="<?php echo "$nama"; ?>" readonly="readonly"></td></tr>
<tr><td>Jenis Kelamin</td><td>: <input type="text" name="gender" size="30" value="<?php if ($gender==='L'){$kel='Laki-laki';}else{$kel='Perempuan';}echo "$kel"; ?>" readonly="readonly"></td></tr>
<tr><td>No. KTP</td><td>: <input type="text" name="ktp" size="30" value="<?php echo "$ktp"; ?>" readonly="readonly"></td></tr>
<tr><td>Alamat</td><td>: <input type="text" name="alamat" size="30" value="<?php echo "$alamat"; ?>" readonly="readonly"></td></tr>
<tr><td>Tempat Lahir</td><td>: <input type="text" name="tempat_lahir" size="30" value="<?php echo "$tplahir"; ?>" readonly="readonly"></td></tr>
<tr><td>Tanggal Lahir</td><td>: <input type="text" name="tanggal_lahir" size="30" value="<?php echo "$tgllahir"; ?>" readonly="readonly"></td></tr>
<tr><td>Status Perkawinan</td><td>: <select name="status" >
<option value="<?php if ($status===''){$s='Belum Kawin';}else{$s=$status;}echo "$s"; ?>"><?php if ($status===''){$s='Belum Kawin';}else{$s=$status;}echo "$s"; ?></option>
<option value="<?php if ($status==='Kawin'){$s='Belum Kawin';}else{$s='Kawin';}echo "$s"; ?>"><?php if ($status==='Kawin'){$s='Belum Kawin';}else{$s='Kawin';}echo "$s"; ?></option>
</select>
</td></tr>
<tr><td>Agama</td><td>: <input type="text" name="agama" size="30" value="<?php echo "$agama"; ?>"></td></tr>
<tr><td>Tlp/HP</td><td>: <input type="text" name="tlp" size="30" value="<?php echo "$tlp"; ?>"></td></tr>
<tr><td>E-mail</td><td>: <input type="text" name="email" size="30" value="<?php echo "$email"; ?>"></td></tr>
<tr><td></td><td><input type="submit" value="Update Informasi Umum" class="input"/> <input type="reset" value="Reset Form" class="input" /></td></tr>
<tr><td colspan="2">
</table>
</fieldset>
<tr><td></td><td><a href="<?php echo base_url(); ?>index.php/utama/cvpend" class="button"/>Lanjut ke Data Pendidikan</a></td></tr>
<div style="position: relative; left: 377px; top: -410px; width: 114px; height: 158px;">  <p><span><img width=114 height=158
  src="<?php echo base_url(); ?>berkas/<?php echo "$gambar";?>" alt="Foto akan muncul pada bagian ini jika telah di upload"></span></p></div>
<div id="hasil" style=" background-color:#FF0000; color:#FFFFFF; text-align:center;"></div>
</fieldset></form>