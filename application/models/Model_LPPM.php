<?php

class Model_LPPM extends CI_model 
{
    public function getallkepalaLPPM()
    {
        return $this->db->get('penelitian')->result_array();
    }

    public function getkepalaLPPM($limit, $start, $keyword = null)
    {
        if($keyword){
         $this->db->like('id_penelitian', $keyword);  
         $this->db->or_like('id_luaranpenelitian', $keyword); 
         $this->db->or_like('judul_penelitian', $keyword);  
        }
        return $this->db->get('penelitian', $limit, $start)->result_array();
    }
    
    public function countAllkepalaLPPM()
    {
        return $this->db->get('penelitian')->num_rows();
    }

    public function tambahDatapenelitian()
    {
        $data = array(
            "id_penelitian" => $this->input->post('id_penelitian', true),
            "id_luaranpenelitian" => $this->input->post('id_luaranpenelitian', true),
            "judul_penelitian" => $this->input->post('judul_penelitian', true),
            "tahun_penelitian" => $this->input->post('tahun_penelitian', true),
            "sumber_dana" => $this->input->post('sumber_dana', true),
            "jumlah_dana" => $this->input->post('jumlah_dana', true),
            "lampiran" => $this->input->post('lampiran', true)
        );

            $this->db->insert('penelitian', $data);
     } 
    
     public function hapus($id_penelitian)
     {
         $query = $this->db->delete("penelitian", $id_penelitian);
 
         if($query){
             return true;
         }else{
             return false;
         }
 
     }

     public function ubah($id_penelitian)
     {
         $this->db->where('id_penelitian', $id_penelitian);
         return $this->db->get_where('penelitian')->row_array();
     }

     public function update($data, $id_penelitian)
     {

        $query = $this->db->update("penelitian", $data, $id_penelitian);

        if($query)
        {
            return true;
        }else
        {
            return false;
        }
     }
 
}