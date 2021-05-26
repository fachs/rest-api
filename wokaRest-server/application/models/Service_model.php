<?php 

class Service_model extends CI_Model
{
    public function getService($id = null)
    {
        if ($id === null) {
            return $this->db->get('services')->result_array();
        } else {
            return $this->db->get_where('services',['id' => $id])->result_array();
        }
    }

    public function getServiceByKeyword($keyword = null)
    {
        if ($keyword === null) {
            return $this->db->get('services')->result_array();
        } else {
            return $this->db->get_where('services',['kategori' => $keyword])->result_array();
        }
    }

    // public function deleteMahasiswa($id)
    // {
    //     $this->db->delete('mahasiswa', ['id' => $id]);
    //     return $this->db->affected_rows();
    // }

    public function createService($data)
    {
        $this->db->insert('services',$data);
        return $this->db->affected_rows();
    }

    public function updateService($data, $id)
    {
        $this->db->update('services', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}


?>