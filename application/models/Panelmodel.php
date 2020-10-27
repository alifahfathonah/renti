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
        $this->skim = $data['skim'];
        $this->anggran = $data['anggran'];
        $this->afliansi = $data['afliansi'];
        $this->kelompok_bidang = $data['kelompok'];
        $this->no_sk = $data['sk'];
        $this->lama_kegiatan = $data['lama'];
        $this->lokasi = $data['lokasi'];
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

    // kode logic untuk module dosen
     public function getdosen(){
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->join('fakultas', 'fakultas.id_fakultas = dosen.id_fakultas','left');
        $this->db->join('prodi', 'prodi.id_prodi = dosen.id_prodi','left');
        $this->db->join('user', 'user.id = dosen.id_user','left');
        $data = $this->db->get();
        return $data;
    }
    public function adddosen($por){
        $this->id_fakultas = $por['id_fakultas'];
        $this->id_prodi = $por['id_prodi'];
        $this->nama_dosen = $por['nama_dosen'];
        $this->alamat = $por['alamat'];
        $this->telp = $por['telp'];
        $this->id_user = $por['id_user'];
        $this->db->insert('dosen', $this);
        return;
    }

    public function getid($id){
        $this->db->where('date_created', $id); 
        $result = $this->db->get('user')->row(); 
        return $result;
    }

    public function hapusdosen($id){
        $this->db->where('id_dosen',$id);
        $this->db->delete('dosen');
       return;
    }

    public function dosenedit($id){
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->join('fakultas', 'fakultas.id_fakultas = dosen.id_fakultas','left');
        $this->db->join('prodi', 'prodi.id_prodi = dosen.id_prodi','left');
        $this->db->join('user', 'user.id = dosen.id_user','left');
        $this->db->where('id_dosen', $id); 
        $result = $this->db->get()->row(); 
        return $result;
    }
    public function dosenupdate($where,$data){
        $this->db->where($where);
        $this->db->update('dosen',$data);
        return;
    }

    // batas akhir modul dosen


    // modul untuk user

    public function getuser(){
        $this->db->select('*');
        $this->db->from('user');
        $id = array('1', '2');
        $this->db->where_in('role_id', $id);
        $data = $this->db->get();
        return $data;
    }

    public function roleuser(){
        $this->db->select('*');
        $this->db->from('user_role');
        $id = array('1', '2');
        $this->db->where_in('id', $id);
        $data = $this->db->get();
        return $data;
    }

    public function adduser($data){
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->role_id = $data['role_id'];
        $this->is_active = 1;
        $this->date_created = $data['date'];
        $this->image = 'default.jpg';
        $this->password = $data['pass'];
        $this->db->insert('user', $this);
        return;
    }

    public function hapususer($id){
        $this->db->where('id',$id);
        $this->db->delete('user');
       return;
    }

    public function userjbt($id){
        $this->db->where('id', $id); 
        $result = $this->db->get('user_role')->row(); 
        return $result;
    }

    public function useredit($id){
        $this->db->where('id', $id); 
        $result = $this->db->get('user')->row(); 
        return $result;
    }

    public function userupdate($where,$data){
        $this->db->where($where);
        $this->db->update('user',$data);
        return;
    }

    // batas akhir untuk module user


    // menu pendidikan
    public function getpendidikan(){
        $data = $this->db->get('pendidikan');
        return $data;
    }

    public function addpendik($data){
        $this->jenjang = $data['jenjang'];
        $this->gelar = $data['gelar'];
        $this->bidang_studi = $data['studi'];
        $this->institusi = $data['stut'];
        $this->tahun_masuk = $data['masuk'];
        $this->tahun_lulus = $data['lulus'];
        $this->db->insert('pendidikan', $this);
        return;
    }

    public function pendikedit($id){
        $this->db->where('id_pendidikan', $id); 
        $result = $this->db->get('pendidikan')->row(); 
        return $result;
    }

    public function pendikupdate($where,$data){
        $this->db->where($where);
        $this->db->update('pendidikan',$data);
        return;
    }

    public function hapuspendik($id){
        $this->db->where('id_pendidikan',$id);
        $this->db->delete('pendidikan');
       return;
    }
    // batas akhir module pendidikan
}