	<h2>Selamat Datang di Sistem Online Pendaftaran Tenaga IT <br>Bag. PDE SANTEL Sekretariat Daerah Kabupaten Langkat</h2>
	<p>Aplikasi ini merupakan media perekrutan Tenaga IT di Bagian Pengolahan Data Elektronik dan Sandi Telekomunikasi Sekretariat Daerah Kabupaten Langkat.</p>
	<div class="cleaner_h20"></div>
	<ul>
	<li>Silahkan klik tombol dibawah halaman ini untuk melihat rincian atas bidang profesi yang kami sediakan.</li>
	<li>Sebelumnya, pelamar diharuskan melakukan registrasi online melalui web ini dengan mengklik menu <?php echo anchor("utama/daftarbaru","Pendaftaran");?></li>
	<li>Setelah melakukan pendaftaran, silahkan lakukan login melalui form login di sebelah kiri.</li>
	<li>Setelah itu lengkapilah data-data yang kami butuhkan dalam proses seleksi administrasi pada menu "Kelengkapan Data"</li>
	<li>Selanjutnya upload semua berkas-berkas yang dibutuhkan pada menu "Upload Berkas".</li>
	<li>Jika telah selesai, tunggu pengumuman dari web ini untuk informasi selanjutnya atau hubungi nomor kontak yang telah kami sediakan untuk bantuan lebih lanjut.</li>
	</ul>
	</br>
	<p>Silahkan klik tombol dibawah ini untuk melihat info Bidang Profesi :</p></br>
	
	<p><table style="border: 1px solid #000000;" border="1">
<tbody>
<tr>
<td>No.</td>
<td>Nama Bidang</td>
<td>Rincian dan Persyaratan</td>
<td>Daftar</td>
</tr>
<?php
$no = 1;
foreach($bidang->result_array() as $p){ ?>
<tr>
<td><?php echo $no; ?></td>
<td><b><?php echo $p['nama_bidang']; ?></b></td>
<td><?php echo $p['rincian']; ?></td>
<?php
echo"<td><a href='".base_url()."index.php/utama/daftarbaru'><div class='submitButton2'>DAFTAR</div></a></td>";
?>
</tr>
<?php 
$no++;
 }
?>
</tbody>
</table></p>