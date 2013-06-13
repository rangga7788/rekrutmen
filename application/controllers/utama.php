<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utama extends CI_Controller {

function __construct()
{

session_start();
parent::__construct();
} 

	function index()
	{
	    if ( isset($_SESSION['username']) ) 
		{ 
			$siapa=$_SESSION['username'];
			if ($siapa == 'admin')
			{
				redirect('master'); 
			}
			else
			{
				$q = $this->db->select('pesan')->where('id', 'tutup')->get('pengumuman');
				foreach($q->result_array() as $t){ $tutup = $t['pesan']; }
				if ($tutup == '1')
				{
				redirect('utama/pengumuman'); 
				}
				else {
				redirect('utama/biodata'); 
				}
			}
        } 
		else 
		{
		$q = $this->db->select('pesan')->where('id', 'tutup')->get('pengumuman');
		foreach($q->result_array() as $t){ $tutup = $t['pesan']; }
		if ($tutup == '1')
		{
		redirect('utama/tutup');
		}
		else {
		$data["bidang"]=$this->Mod_utama->Bidang();
		$this->load->view('utama/meta');
		$this->load->view('utama/atas-umum');
		$this->load->view('utama/logform');
		$this->load->view('utama/muka', $data);
		$this->load->view('utama/bawah');
			}
		}
	}	
	
	function selesai()
	{
	    if ( isset($_SESSION['username']) ) 
		{ 
			$siapa=$_SESSION['username'];
			if ($siapa == 'admin')
			{
				redirect('master'); 
			}
			else
			{
				$user = $_SESSION['username'];
				$data = array( 'finish' => '1' );
				$this->db->trans_start();
				$this
					->db
					->where('no_reg', $user)
					->update('data_user', $data); 
				$this->db->trans_complete();
				$data["bidang"]=$this->Mod_utama->Namabidang($user);
				$this->load->view('utama/meta');
				$this->load->view('utama/atas');
				$this->load->view('utama/welcome', $data);
				$this->load->view('utama/finish', $data);
				$this->load->view('utama/bawah');
			}
		}
	}

	function tutup()
	{
	    if ( isset($_SESSION['username']) ) 
		{ 
			$siapa=$_SESSION['username'];
			if ($siapa == 'admin')
			{
				redirect('master'); 
			}
			else
			{
			$data["bidang"]=$this->Mod_utama->Namabidang($siapa);
			$this->load->view('utama/meta');
			$this->load->view('utama/atas-tutup');
			$this->load->view('utama/welcome', $data);
			$this->load->view('utama/tutup');
			$this->load->view('utama/bawah');
			}
		}
		else
		{
			$this->load->view('utama/meta');
			$this->load->view('utama/atas-tutup');
			$this->load->view('utama/logform');
			$this->load->view('utama/tutup');
			$this->load->view('utama/bawah');
		}
	}
	
	function masuk()
	{
		$username = $this->input->post('username');
		$pwd = $this->input->post('password');
		$hasil = $this->Mod_utama->Datalog($username,$pwd);
		if ($this->Mod_utama->Datalog($username,$pwd) == TRUE)
		{
			$_SESSION['username']=$username;
			?>
			<script type="text/javascript">
			alert ('Berhasil Login...!');
			</script>
			<?php
			if ($username === 'admin'){ redirect('master'); }	else {
			### Jika pendaftaran ditutup, login akan diarahkan ke pengumuman ###
				$q = $this->db->select('pesan')->where('id', 'tutup')->get('pengumuman');
				foreach($q->result_array() as $t){ $tutup = $t['pesan']; }
				if ($tutup == '1'){ echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/pengumuman'>"; }
				else { $query = $this->db->select('finish')->where('no_reg', $username)->get('data_user');
					foreach($query->result_array() as $f){ $finish = $f['finish']; }
					if ($finish == '1'){ echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/selesai'>"; }
					else { echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php'>"; }
					}
																	}
		}
		else{
			?>
			<script type="text/javascript">
			alert("Username atau Password Yang Anda Masukkan Salah..!!!");			
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php'>";
		}
		
	}
	
	public function keluar() 
    {
			$this->load->library('session');
            session_destroy(); 
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php'>";
    }
	
	
	function daftarbaru()
	{
		$this->load->library('session');
		if ( isset($_SESSION['username']) ) //cek apakah session ada
		{ 
		?><script type="text/javascript" language="javascript">
			alert("Anda sudah terdaftar...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php'>";
		} else {
		$q = $this->db->select('pesan')->where('id', 'tutup')->get('pengumuman');
		foreach($q->result_array() as $t){ $tutup = $t['pesan']; }
		if ($tutup == '1')
		{ 
		?><script type="text/javascript" language="javascript">
			alert("Pendaftaran sudah ditutup...!");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php'>";
		} else {
		$this->load->view('utama/meta');
		$this->load->view('utama/atas-umum');
		$this->load->view('utama/logform');
		$data["bidang"]=$this->Mod_utama->Bidang();
		$this->load->view('utama/daftar', $data);
		$this->load->view('utama/bawah');
		}
		}
	}
	
	function hapusupload()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$this->load->library('session');
		if ( isset($_SESSION['username']) ) //cek apakah session ada
		{ 
			
			$gambar=$this->Mod_utama->Ambil($id,"nama_file","id_download","tbl_download");
			unlink('./berkas/'.$gambar);
			$this->Mod_utama->Hapus_Sesuatu($id,"id_download","tbl_download");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
		} else {
		?><script type="text/javascript" language="javascript">
			alert("Anda harus Login/Daftar dahulu...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
		}
	}
	
	function hapuspend()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$this->load->library('session');
		if ( isset($_SESSION['username']) ) //cek apakah session ada
		{ 
			
			$this->Mod_utama->Hapus_Sesuatu($id,"id","data_pendidikan");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
		} else {
		?><script type="text/javascript" language="javascript">
			alert("Anda harus Login/Daftar dahulu...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
		}
	}

	function hapuspeng()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$this->load->library('session');
		if ( isset($_SESSION['username']) ) //cek apakah session ada
		{ 
			
			$this->Mod_utama->Hapus_Sesuatu($id,"id","data_pengalaman");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
		} else {
		?><script type="text/javascript" language="javascript">
			alert("Anda harus Login/Daftar dahulu...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
		}
	}	
	
	function hapusskill()
	{
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$this->load->library('session');
		if ( isset($_SESSION['username']) ) //cek apakah session ada
		{ 
			
			$this->Mod_utama->Hapus_Sesuatu($id,"id","data_skill");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
		} else {
		?><script type="text/javascript" language="javascript">
			alert("Anda harus Login/Daftar dahulu...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
		}
	}
	
	function berkas()
	{
	
			$q = $this->db->select('pesan')->where('id', 'tutup')->get('pengumuman');
		foreach($q->result_array() as $t){ $tutup = $t['pesan']; }
		if ($tutup == '1')
		{ 
		?><script type="text/javascript" language="javascript">
			alert("Pendaftaran sudah ditutup...! anda tidak bisa merubah data lagi.");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/pengumuman'>";
		} else {
		$page=$this->uri->segment(3);
      	//$limit=2;
		//if(!$page):
		//$offset = 0;
		//else:
		//$offset = $page;
		//endif;
		$data = array();
		$this->load->library('session');
		if ( isset($_SESSION['username']) ) //cek apakah session ada
		{
			$user = $_SESSION['username'];
			//$tot_hal = $this->Mod_utama->Tampil_Daftar($user, "tbl_download","author");
			//$config['base_url'] = base_url() . '/index.php/utama/berkas/';
			//$config['total_rows'] = $tot_hal->num_rows();
			//$config['per_page'] = $limit;
			//$config['uri_segment'] = 3;
			//$config['first_link'] = 'Awal';
			//$config['last_link'] = 'Akhir';
			//$config['next_link'] = 'Selanjutnya';
			//$config['prev_link'] = 'Sebelumnya';
			//$this->pagination->initialize($config);
			//$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$data["download"]=$this->Mod_utama->Tampil_Daftar($user, "tbl_download","author");
			$this->load->view('utama/meta');
			$this->load->view('utama/atas');
			$data["bidang"]=$this->Mod_utama->Namabidang($user);
			$this->load->view('utama/welcome', $data);
			$this->load->view('utama/upload', $data);
			$this->load->view('utama/bawah');
		} 		else {
		?><script type="text/javascript" language="javascript">
			alert("Anda harus Login/Daftar dahulu...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
		}
		}
	}
	
	function simpanberkas()
	{
		$this->load->library('session');
		if ( isset($_SESSION['username']) ) //cek apakah session ada
		{
				$tgl = " %Y-%m-%d";
				$jam = "%h:%i:%a";
				$time = time();
				$in["tgl_posting"] = mdate($tgl,$time);
				$in["judul_file"]=$this->input->post('judul');
				$in["author"]=$_SESSION['username'];
				$acak=rand(00000000000,99999999999);
				$bersih=$_FILES['userfile']['name'];
				$nm=str_replace(" ","_","$bersih");
				$pisah=explode(".",$nm);
				$nama_murni=$pisah[0];
				$ubah=$acak.$nama_murni; //tanpa ekstensi
				$config["file_name"]=$ubah; //dengan eekstensi
				$in["nama_file"]=$acak.$nm;
				$config['upload_path'] = './berkas/';
				$config['allowed_types'] = 'exe|sql|psd|pdf|xls|ppt|php|php4|php3|js|swf|Xhtml|zip|wav|bmp|gif|jpg|jpeg|png|html|htm|txt|rtf|mpeg|mpg|avi|doc|docx|xlsx';
				$config['max_size'] = '50000';
				$config['max_width'] = '1200';
				$config['max_height'] = '1200';						
				$this->load->library('upload', $config);
			
				if(!$this->upload->do_upload())
				{
				 echo $this->upload->display_errors();
				}
				else {
				$this->Mod_utama->Simpan_Daftar("tbl_download",$in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/berkas'>";
				}
		} 		else {
		?><script type="text/javascript" language="javascript">
			alert("Anda harus Login/Daftar dahulu...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
		}
	}
	
	function biodata()
	{
			$q = $this->db->select('pesan')->where('id', 'tutup')->get('pengumuman');
		foreach($q->result_array() as $t){ $tutup = $t['pesan']; }
		if ($tutup == '1')
		{ 
		?><script type="text/javascript" language="javascript">
			alert("Pendaftaran sudah ditutup...! anda tidak bisa merubah data lagi.");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/pengumuman'>";
		} else {
		$data = array();
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session!=""){
		$data["username"]=$_SESSION['username'];
		$noreg=$_SESSION['username'];
		$id["dataq"]=$this->Mod_utama->Ambildata($noreg, 'data_user');
		$dataq=$id["dataq"];
		$file=$this->Mod_utama->Ambilgambar($noreg, 'data_user');
		$data["gambar"]=$file;
		foreach($dataq->result() as $n){}
		$data["nama"]=$n->nama;
		$data["gender"]=$n->LP;
		$data["ktp"]=$n->ktp;
		$data["alamat"]=$n->alamat;
		$data["tplahir"]=$n->tmp_lahir;
		$data["tgllahir"]=$n->tgl_lahir;
		$data["status"]=$n->status;
		$data["bidang"]=$this->Mod_utama->Namabidang($noreg);
		$data["agama"]=$n->agama;
		$data["tlp"]=$n->tlp;
		$data["email"]=$n->email;

		$this->load->view('utama/meta');
		$this->load->view('utama/atas');
		$this->load->view('utama/welcome', $data);
		$this->load->view('utama/cvonline', $data);
		$this->load->view('utama/bawah');
        } 
		else {
		?><script type="text/javascript" language="javascript">
			alert("Anda harus Login/Daftar dahulu...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
		}
	}
	}

	function simpandaftar()
	{
		$in["no_reg"]=$this->Mod_utama->Reg();
		$in["nama"]=$this->security->sanitize_filename($this->input->post('nama'));
		$in["alamat"]=$this->security->sanitize_filename($this->input->post('alamat'));
		$in["LP"]=$this->security->sanitize_filename($this->input->post('gender'));
		$in["ktp"]=$this->security->sanitize_filename($this->input->post('ktp'));
		$passasli=$this->security->sanitize_filename($this->input->post('password'));
		$pass=md5('rangga').md5($passasli);
		$in["password"]=$pass;
		$in["tmp_lahir"]=$this->security->sanitize_filename($this->input->post('tempat_lahir'));
		$in["tgl_lahir"]=$this->security->sanitize_filename($this->input->post('tanggal_lahir'));
		$in["id_bidang"]=$this->security->sanitize_filename($this->input->post('bidang'));
		$this->db->trans_start();
		$this->db->insert("data_user",$in);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
			{
			?><script type="text/javascript" language="javascript">
			alert("ada yang SALAH...! Silahkan ulangi...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
			}
			else
			{ ?><script type="text/javascript" language="javascript">
			alert("Pendaftaran BERHASIL...!");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/suksesdaftar'>";
			}
	}

	function update()
	{
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session!=""){
		$data["username"]=$_SESSION['username'];
		$noreg=$_SESSION['username'];}
		$d["status"]=$this->security->sanitize_filename($this->input->post('status'));
		$d["agama"]=$this->security->sanitize_filename($this->input->post('agama'));
		$d["tlp"]=$this->security->sanitize_filename($this->input->post('tlp'));
		$d["email"]=$this->security->sanitize_filename($this->input->post('email'));

		$this->db->trans_start();
		$this
		->db
		->where('no_reg', $noreg)
		->update("data_user",$d);
		$this->db->trans_complete();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/cvpend'>";
	}

	function updatepend()
	{
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session!=""){
		$data["username"]=$_SESSION['username'];
		$noreg=$_SESSION['username'];}
		$d["no_pend"]=$noreg;
		$d["kat"]=$this->security->sanitize_filename($this->input->post('kat'));
		$d["tingkat"]=$this->security->sanitize_filename($this->input->post('tingkat'));
		$d["thn_tamat"]=$this->security->sanitize_filename($this->input->post('tahun'));
		$d["sekolah"]=$this->security->sanitize_filename($this->input->post('sekolah'));

		$this->db->trans_start();
		$this
		->db
		->insert("data_pendidikan",$d);
		$this->db->trans_complete();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/cvpend'>";
	}

	function updatepeng()
	{
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session!=""){
		$data["username"]=$_SESSION['username'];
		$noreg=$_SESSION['username'];}
		$d["no_pend"]=$noreg;
		$tahun1=$this->security->sanitize_filename($this->input->post('tahunawal'));
		$tahun2=$this->security->sanitize_filename($this->input->post('tahunakhir'));
		$tahun3=$tahun1.'-'.$tahun2;
		$d["tahun"]=$tahun3;
		$d["tempat"]=$this->security->sanitize_filename($this->input->post('rincian'));

		$this->db->trans_start();
		$this
		->db
		->insert("data_pengalaman",$d);
		$this->db->trans_complete();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/cvpeng'>";
	}

	function updateskill()
	{
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session!=""){
		$data["username"]=$_SESSION['username'];
		$noreg=$_SESSION['username'];}
		$d["no_pend"]=$noreg;
		$d["skill"]=$this->security->sanitize_filename($this->input->post('skill'));
		$this->db->trans_start();
		$this
		->db
		->insert("data_skill",$d);
		$this->db->trans_complete();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/cvskill'>";
	}

	function suksesdaftar()
	{
		$this->load->view('utama/meta');
		$this->load->view('utama/atas');
		$this->load->view('utama/logform');
		$data["noreg"]=$this->Mod_utama->Ambilreg();
		$this->load->view('utama/hasil', $data);
		$this->load->view('utama/bawah');
	}
	
	function pengumuman()
	{
		$this->load->library('session');
		if ( isset($_SESSION['username']) ) //cek apakah session ada
		{
			$user = $_SESSION['username'];
			$data["bidang"] = $this->Mod_utama->Namabidang($user);
			$status = $this->Mod_utama->Status($user);
			$data["post"] = $this->Mod_utama->Pengumuman($status);
			$data["user"] = $_SESSION['username'];
			$this->load->view('utama/meta');
						$q = $this->db->select('pesan')->where('id', 'tutup')->get('pengumuman');
		foreach($q->result_array() as $t){ $tutup = $t['pesan']; }
		if ($tutup == '1')
		{ $this->load->view('utama/atas-tutup');
		} else {
			$this->load->view('utama/atas');
			}
			$this->load->view('utama/welcome', $data);
			$this->load->view('utama/pengumuman-khusus', $data);
			$this->load->view('utama/bawah');
		} 		
		else 
		{
			$this->load->view('utama/meta');
			$this->load->view('utama/atas-umum');
			$data["post"] = $this->Mod_utama->Pengumuman('Umum');
			$this->load->view('utama/logform');
			$this->load->view('utama/pengumuman-umum', $data);
			$this->load->view('utama/bawah');
		}
	}

	function kontak()
	{
		$data = array();
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session!=""){
			$user = $_SESSION['username'];
			$data["bidang"] = $this->Mod_utama->Namabidang($user);
			$this->load->model('Mod_master');
			$data["kontak"] = $this->Mod_master->Kontak();
			$this->load->view('utama/meta');
			$q = $this->db->select('pesan')->where('id', 'tutup')->get('pengumuman');
			foreach($q->result_array() as $t){ $tutup = $t['pesan']; }
			if ($tutup == '1')
			{ $this->load->view('utama/atas-tutup');} 
			else {
			$this->load->view('utama/atas');
			}
			$this->load->view('utama/welcome', $data);
			$this->load->view('utama/kontak', $data);
			$this->load->view('utama/bawah');
			}
		else {
			$this->load->model('Mod_master');
			$data["kontak"] = $this->Mod_master->Kontak();
			$this->load->view('utama/meta');
			$q = $this->db->select('pesan')->where('id', 'tutup')->get('pengumuman');
			foreach($q->result_array() as $t){ $tutup = $t['pesan']; }
			if ($tutup == '1')
			{ $this->load->view('utama/atas-tutup');} 
			else {
			$this->load->view('utama/atas-umum');
			}
			$this->load->view('utama/logform');
			$this->load->view('utama/kontak', $data);
			$this->load->view('utama/bawah');
		}
		
	}

	function cvpend()
	{
		$data = array();
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session!=""){
		$data["username"]=$_SESSION['username'];
		$noreg=$_SESSION['username'];
		$data["pend"] = $this->Mod_utama->Cv('data_pendidikan', $noreg);
		$data["bidang"]=$this->Mod_utama->Namabidang($noreg);
		$this->load->view('utama/meta');
		$this->load->view('utama/atas');
		$this->load->view('utama/welcome', $data);
		$this->load->view('utama/cv-pendidikan', $data);
		$this->load->view('utama/bawah');
        } 
		else {
		?><script type="text/javascript" language="javascript">
			alert("Anda harus Login/Daftar dahulu...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
		}

		
	}

	function cvpeng()
	{
		$data = array();
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session!=""){
		$data["username"]=$_SESSION['username'];
		$noreg=$_SESSION['username'];
		$data["peng"] = $this->Mod_utama->Cv('data_pengalaman', $noreg);
		$data["bidang"]=$this->Mod_utama->Namabidang($noreg);
		$this->load->view('utama/meta');
		$this->load->view('utama/atas');
		$this->load->view('utama/welcome', $data);
		$this->load->view('utama/cv-pengalaman', $data);
		$this->load->view('utama/bawah');
        } 
		else {
		?><script type="text/javascript" language="javascript">
			alert("Anda harus Login/Daftar dahulu...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
		}

		
	}

	function cvskill()
	{
		$data = array();
		$session=isset($_SESSION['username']) ? $_SESSION['username']:'';
		if($session!=""){
		$data["username"]=$_SESSION['username'];
		$noreg=$_SESSION['username'];
		$data["skill"] = $this->Mod_utama->Cv('data_skill', $noreg);
		$data["bidang"]=$this->Mod_utama->Namabidang($noreg);
		$this->load->view('utama/meta');
		$this->load->view('utama/atas');
		$this->load->view('utama/welcome', $data);
		$this->load->view('utama/cv-skill', $data);
		$this->load->view('utama/bawah');
        } 
		else {
		?><script type="text/javascript" language="javascript">
			alert("Anda harus Login/Daftar dahulu...");
			</script><?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/utama/daftarbaru'>";
		}

		
	}

}

/* End of file utama.php */
/* Location: ./application/controllers/welcome.php */