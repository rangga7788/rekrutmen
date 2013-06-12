<?php 
$attributes = array('name' => 'log', 'id' => 'log');
echo form_open('utama/masuk', $attributes);
 ?>
			<h2>Login</h2>
			<label>No. Regristrasi</label>
<?php		$data = array(
               'name'        => 'username',
               'id'          => 'username',
             );
			//$js = 'onblur="if(this.value=='') this.value='No. Regristrasi'"';
		echo form_input($data);
?>
		<label>Password:</label>
		<?php		$data = array(
               'type'        => 'password',
               'name'        => 'password',
               'id'          => 'password',
               );
				echo form_input($data);
				$sub = array(
               'class'        => 'button',
               'name'        => '',
               'value'          => 'Login',
               );
				echo form_submit($sub);
				echo form_close();
?>

		  </div>
</div>
  <div id="rightPan">
  	<h1>Sistem Online Pendaftaran Tenaga IT<br /><p>Bagian Pengolahan Data Elektronik dan Sandi Telekomunikasi <br>(PDE SANTEL) <br>Sekretariat Daerah Kabupaten Langkat</p> </h1>
<div id="ambil">