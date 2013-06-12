<div id="isi">
<h1>Statistik Pendaftaran</h1>
<p>&nbsp;</p>

<table border="0" width="593" height="41">
<tbody>
<tr>
<td><span style="font-size: large;"></span></td>
<td><span style="font-size: x-large;"><u>Total Pelamar Terdaftar</u></span></td>
<td style="background-color: #96f30b;"><span style="font-size: x-large;">: <span style="color: #ff6600;"><?php echo "$total";?></span> Orang</span></td>
<td align="center"><span align="center" style="font-size: large;">hapus?</span></td>
</tr>
<?php
$no = 1;
foreach($bidang->result_array() as $p){ ?>
<tr>
<td><span style="font-size: large;">-</span></td>
<td><span style="font-size: large;"><?php echo $p['nama_bidang']; ?></span></td>
<td><span style="font-size: large;">: <span style="color: #ff6600;"><?php 
$id = $p['id_bidang'];
$total = $this->Mod_master->Totalbid($id);
echo $total;?></span> Orang</span></td>
<td><span style="font-size: large;"><a href='<?php echo base_url().'index.php/master/hapusbid/'.$p['id_bidang']?>' ><div class='submitButton2'>hapus!</div></a></span></td>
</tr>
<?php 
$no++;
 }
?>
</tbody>
</table>

<a href="<?php echo base_url(); ?>index.php/master/rekap"><div class="submitButton">Lihat Semua Daftar</div></a>
<?php 
if ($tutup==='0'){$hasil='<div class="submitButton"><font color = "green">PENDAFTARAN DIBUKA</font></div>';}else{$hasil='<div class="submitButton"><font color = "red">PENDAFTARAN DITUTUP</font></div>';}
echo "<a href='".base_url()."index.php/master/tutup'>$hasil</a>";
?>
<div style="position: relative; left: 8px; top: 32px; width: 100px; height: 100px;">Tes Div</div>
<p>&nbsp;</p>
<p>Klik menu di panel atas untuk mengelola aplikasi serta data pelamar.</p>
</div>