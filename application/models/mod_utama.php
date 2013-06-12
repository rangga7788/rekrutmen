<?php
class Mod_utama extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
		}
		
		function Cek_user_login($username, $password)
        {
        $query = $this
            ->db
            ->where('no_reg', $username) // kolom nomor registrasi
            ->where('password', md5('rangga').md5($password)) // kolom password
            ->limit(1) // pembatasan jumlah select
            ->get('data_user'); //table name
 
        if ($query->num_rows() == 1) { // jika data = 1
                return $query->row_array(); // return data dan nilai TRUE
        }
        else
                {
                        return FALSE; // else mengembalikan FALSE
                }
        }
		
		function Reg()
		{
			$q=$this->db->query("select no_reg from data_user where state='pl' order by data_user.time ASC");
			foreach($q->result_array() as $k)
			$regawal="".$k['no_reg']."";
			$pecah=explode("/",$regawal);
			$datano=$pecah[0];
				if(empty($regawal)){ 
					$hasil3="001/REK/2013";
				} 
				else if($datano<=8){
					$hasil2=$datano+1;
					$hasil3="00".$hasil2."/REK/2013";
				}
				else if($datano>=9){
					$hasil2=$datano+1;
					$hasil3="0".$hasil2."/REK/2013";
				}
				else if($datano>=99){
					$hasil2=$datano+1;
					$hasil3="".$hasil2."/REK/2013";
				}
			
			return $hasil3;
		}
		
		function Bidang()
		{
			$q=$this->db->query("select * from data_bidang order by data_bidang.id_bidang ASC");
			return $q;
		}

		function Namabidang($noreg)
		{
			$q = $this->db->query("select id_bidang from data_user where no_reg = '$noreg' limit 1");
			foreach ($q->result() as $a)
			$b = $a->id_bidang;
			$q2 = $this->db->query("select nama_bidang from data_bidang where id_bidang = '$b' limit 1");
			foreach ($q2->result() as $a2)
			$b2 = $a2->nama_bidang;
			if (empty($b2)){ $bid = '<font color="red">Empty!</font>';} else {$bid = $b2 ;}
			return $bid;
		}
	
		function Pengumuman($status)
		{
			$q=$this->db->query("select pesan from pengumuman where id = '$status' limit 1");
			foreach ($q->result() as $a)
			$b=$a->pesan;
			if(empty($b))
			{
			$c='<p><b>Belum ada pengumuman untuk anda</p><b>';
			}
			else
			{
			$c=$a->pesan;
			}
			return $c;
		}
	
		function Ambilgambar($id)
		{
			$q=$this->db->query("select nama_file from tbl_download where author='$id' and judul_file='Foto Diri'");
			foreach ($q->result() as $a)
			$b=$a->nama_file;
			if(empty($b))
			{
			$c='Belum ada foto';
			}
			else
			{
			$c=$a->nama_file;
			}
			return $c;
		}

		function Status($noreg)
		{
			$q=$this->db->query("select hasil from data_user where no_reg = '$noreg' limit 1");
			foreach ($q->result() as $a)
			$b=$a->hasil;
			return $b;
		}
		
		function Simpan_daftar($tabel,$data)
		{
			$s=$this->db->insert($tabel,$data);
			return $s;
		}

		function Ambilreg()
		{
			$q=$this->db->query("select no_reg from data_user where state='pl' order by data_user.no_reg ASC");
			foreach($q->result_array() as $k)
			$regawal="".$k['no_reg']."";
			return $regawal;
		}

		function Cv($tabel, $noreg)
		{
			$q=$this->db->query("select * from $tabel where no_pend='$noreg' order by $tabel.id ASC");
			return $q;
		}
		
		function Tampil_File($username,$limit,$ofset)
		{
			$t=$this->db->query("select * from tbl_download where author='$username' LIMIT $ofset,$limit");
			return $t;
		}
		
		function Total_Daftar($tabel)
		{
			$q=$this->db->query("select * from $tabel");
			return $q;
		}
		
		function Tampil_Daftar($id, $tabel, $where)
		{
			$q=$this->db->query("select * from $tabel where $where='$id'");
			//foreach ($q->result() as $a)
			return $q;
		}
		
		function Hapus_Sesuatu($id,$seleksi,$tabel)
		{
			$this->db->where($seleksi,$id);
			$this->db->delete($tabel);
		}
		
		function Datalog($user,$pass)
		{
			$password=mysql_real_escape_string($pass);
			$query = $this
            ->db
            ->where('no_reg', $user) // kolom nomor registrasi
            ->where('password', md5('rangga').md5($password)) // kolom password
            ->limit(1) // pembatasan jumlah select
            ->get('data_user'); //table name
			//$query=$this->db->query("select * from data_user where no_reg='$user' and password=md5('rangga').md5('$password')");
			if ($query->num_rows() > 0)
				{
				return TRUE;
				}
				else
				{
				return FALSE;
				}
		}
		
		function Ambildata($noreg)
		{
			$q=$this->db->query("select * from data_user where no_reg='$noreg'");
			return $q;
		}
		
		function Ambil($id,$field,$where,$tabel)
		{
			$q=$this->db->query("select $field from $tabel where $where='$id'");
			foreach ($q->result() as $a)
			$b=$a->nama_file;
			return $b;
		}
		
	}
?>
