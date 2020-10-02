<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PanelModel extends CI_Model {
    
    // kode logic untuk module prodi
    public function getprodi(){
        $data = $this->db->get('prodi');
        return $data;
    }

    public function addprodi($data){
    	$this->kode_prodi = $data['kode_prodi'];
    	$this->nama_prodi = $data['nama_prodi'];
    	$this->db->insert('prodi', $this);
    	return;
    }

    public function hapus($id){
        $this->db->where('id_prodi',$id);
        $this->db->delete('prodi');
       return;
    }

    public function Prodiedit($id){
    	$this->db->where('id_prodi', $id); 
        $result = $this->db->get('prodi')->row(); 
        return $result;
    }
    public function Prodiupdate($where,$data){
        $this->db->where($where);
        $this->db->update('prodi',$data);
        return;
    }

    // batas akhir modul prodi

    // kode logic untuk module fakultas
    public function getfakultas(){
        $data = $this->db->get('fakultas');
        return $data;
    }

    public function addfakultas($data){
        $this->kode_fakul = $data['kode_fakul'];
        $this->nama_fakul = $data['nama_fakul'];
        $this->alamat_fakul = $data['alamat_fakul'];
        $this->telp_fakul = $data['telp_fakul'];
        $this->email_fakul = $data['email_fakul'];
        $this->db->insert('fakultas', $this);
        return;
    }

    public function fakedit($id){
        $this->db->where('id_fakultas', $id); 
        $result = $this->db->get('fakultas')->row(); 
        return $result;
    }

    public function fakulupdate($where,$data){
        $this->db->where($where);
        $this->db->update('fakultas',$data);
        return;
    }

    public function hapusfak($id){
        $this->db->where('id_fakultas',$id);
        $this->db->delete('fakultas');
       return;
    }

    // batas akhir module fakultas

    // kode logic untuk modul penelitian
    public function getriset(){
        $data = $this->db->get('penelitian');
        return $data;
    }
    public function addpenelitian($data){
        $this->judul_penelitian = $data['judul'];
        $this->sumber_dana = $data['sumber_Dana'];
        $this->tahun_penelitian = $data['tahun_penelitian'];
        $this->jumla_dana = $data['jumla_dana'];
        $this->lampiran = $data['lampiran'];
        $this->db->insert('penelitian', $this);
        return;
    }

    public function risetedit($id){
        $this->db->where('id_penelitian', $id); 
        $result = $this->db->get('penelitian')->row(); 
        return $result;
    }

    public function penelitianupdate($where,$data){
        $this->db->where($where);
        $this->db->update('penelitian',$data);
        return;
    }

    public function hapuspenelitian($id){
        $this->db->where('id_penelitian',$id);
        $this->db->delete('penelitian');
       return;
    }
    // batas akhir module penelitian

    // kode logic modul pengabdian masyarakat
    public function getpengab(){
        $data = $this->db->get('pengabdian');
        return $data;
    }
    public function addpengab($data){
        $this->judul = $data['judul'];
        $this->jenis = $data['jenis'];
        $this->tanggal_mulai = $data['tanggal_awal'];
        $this->tanggal_akhir = $data['tanggal_Akhir'];
        $this->tahun = $data['tahun'];
        $this->lampiran = $data['lampiran'];
        $this->db->insert('pengabdian', $this);
        return;
    }

    public function pengabedit($id){
        $this->db->where('id', $id); 
        $result = $this->db->get('pengabdian')->row(); 
        return $result;
    }

    public function pengabupdate($where,$data){
        $this->db->where($where);
        $this->db->update('pengabdian',$data);
        return;
    }

    public function hapuspengab($id){
        $this->db->where('id',$id);
        $this->db->delete('pengabdian');
       return;
    }

    // batah akhir modul pengabdian masyarakat
}