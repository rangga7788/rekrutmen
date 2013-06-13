<?php
class Mod_master extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
		}
		
		function Total($id, $tabel, $where)
		{
			$q=$this->db->query("select * from $tabel where $where='$id'");
			return $q;
		}

		function Totalbid($id)
		{
			$q=$this->db->query("select id_bidang from data_user where id_bidang = '$id'");
			$total = $q->num_rows();
			return $total;
		}
	
		function Hapus_Sesuatu($id,$field,$tabel)
		{
			$this->db->where($field,$id);
			$this->db->delete($tabel);
		}

		function Simpan($tabel,$data)
		{
			$s=$this->db->insert($tabel,$data);
			return $s;
		}
		
		function Update($id, $tabel, $where, $isi)
		{
			$q=$this->db->query("update $tabel set hasil = '$isi' where $where = '$id' limit 1");
			return $q;
		}
		
		function Daftarpl($offset,$limit)
		{
			$q=$this->db->query("select * from data_user where state='pl' order by time ASC LIMIT $offset,$limit");
			return $q;
		}

		function Report($kat,$id,$where1,$where2,$tabel)
		{
			$q=$this->db->query("select * from $tabel where $where1='$id' and $where2='$kat'");
			return $q;
		}

		function Ambil($id,$field,$where,$tabel)
		{
			$q=$this->db->query("select $field from $tabel where $where='$id'");
			return $q;
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

		function Kontak()
		{
			$q=$this->db->query("select isikontak from kontak where id = 1 limit 1");
			foreach ($q->result() as $a)
			$b=$a->isikontak;
			if(empty($b))
			{
			$c='<p><b>Belum ada data</p><b>';
			}
			else
			{
			$c=$a->isikontak;
			}
			return $c;
		}
		
	}
?>
