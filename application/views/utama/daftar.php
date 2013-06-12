
		<script type="text/javascript">
			$(document).ready(function(){
				$("#frm").validate({
					debug: false,
					rules: {
						nama: "required",
						ktp: "required",
						alamat: "required",
						tempat_lahir: "required",
						tanggal_lahir: "required",
						bidang: "required",
						password: "required",
					},
					messages: {
						nama: "* <font color=red>Jangan Kosong</font>",
						ktp: "* <font color=red>Jangan Kosong</font>",
						alamat: "* <font color=red>Jangan Kosong</font>",
						tempat_lahir: "* <font color=red>Jangan Kosong</font>",
						tanggal_lahir: "* <font color=red>Jangan Kosong</font>",
						bidang: "* <font color=red>Jangan Kosong</font>",
						password: "* <font color=red>Jangan Kosong</font>",
					},

				});
			});
			</script>
		<script type="text/javascript">
			$(function(){
                                $('#tanggal_lahir').datepicker({
								monthNames: ['Januari','Februari','Maret','April','Mei','Juni',
			'Juli','Agustus','September','Oktober','Nopember','Desember'],
								monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nop', 'Des'],
								dateFormat: 'd MM yy', 
								dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
								changeMonth: true,
								changeYear: true,
								yearRange: 'c-35:c+0',
								showOn: "focus",
								buttonImage: "<?php echo base_url(); ?>jqueryui/development-bundle/demos/images/calendar.gif",
								buttonImageOnly: false
								});
			});
		</script>


<h2>Form Pendaftaran Pelamar</h2>
	<p>Sebelumnya, pelamar diharuskan melakukan pendaftaran melalui form dibawah ini. setelah itu masing-masing pelamar akan mendapatkan no pendaftaran yang bisa digunakan untuk melakukan Login dan melengkapi data-data pelamar.</p>
	<div class="cleaner_h10"></div>
<form name="frm" method="post" action="<?php echo base_url(); ?>index.php/utama/simpandaftar"id="frm">
<fieldset>
<legend>Silahkan Isi Form Pendaftaran di Bawah Ini</legend>
<table>
<tr><td>Nama Lengkap</td><td>: <input type="text" name="nama" size="30" title="Isikan nama lengkap sesuai kartu identitas."></td></tr>
<tr><td>L/P</td><td>: <select name="gender" id="gender" title="Jenis Kelamin." >
<option value="L">Laki-Laki</option>
<option value="P">Perempuan</option>
</select></td></tr>
<tr><td>No. KTP</td><td>: <input type="text" name="ktp" size="30" ></td></tr>
<tr><td>Alamat</td><td>: <input type="text" name="alamat" size="30" title="Tempat tinggal sekarang."></td></tr>
<tr><td>Tempat Lahir</td><td>: <input type="text" name="tempat_lahir" size="30" title="Kecamatan kelahiran"></td></tr>
<tr><td>Tanggal Lahir</td><td>: <input type="text" name="tanggal_lahir" size="30" id="tanggal_lahir"></td></tr>
<tr><td>Mendaftar Sebagai</td><td>: <select name="bidang" id="bidang" title="Pilih bidang kerja yang diinginkan." >
<?php
foreach($bidang->result_array() as $k)
{
echo "<option value='".$k['id_bidang']."'>".$k['nama_bidang']."</option>";
}
?>
</select></td></tr>
<tr><td>Password</td><td>: <input type="password" name="password" size="30" title="Password untuk login"></td></tr>
<tr><td colspan="2">
</fieldset>
<tr><td></td><td><input type="submit" value="Kirim Pendaftaran" class="button"/></td></tr>
</table>
<div id="hasil" style=" background-color:#FF0000; color:#FFFFFF; text-align:center;"></div>
</fieldset>
</form>