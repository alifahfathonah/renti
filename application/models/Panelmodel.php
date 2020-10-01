<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PanelModel extends CI_Model {
    
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
}