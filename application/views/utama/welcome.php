<form action="<?php echo base_url(); ?>index.php/utama/keluar" method="post">
		<h2>Selamat Datang</h2>
		<label>No. Regristasi:</label>
		<input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" readonly="readonly"  />
		<label>Pilihan:</label>
		<input type="text" id="username" name="username" value='<?php echo $bidang; ?>' readonly="readonly"  />
		
		<input name="" type="submit" class="button" value="Keluar" />
		</form>
		  </div>
</div>
  <div id="rightPan">
  	<h1>Sistem Online Pendaftaran Tenaga IT<br /><p>Bagian Pengolahan Data Elektronik dan Sandi Telekomunikasi <br>(PDE SANTEL) <br>Sekretariat Daerah Kabupaten Langkat</p> </h1>
<div id="ambil">