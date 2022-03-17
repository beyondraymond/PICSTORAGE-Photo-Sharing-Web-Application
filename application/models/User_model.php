<?php

class User_model extends CI_Model{

    public function get_person($value, $field){
        $query = $this->db->get_where('user', [$field => $value]);
        return $query->result();
    }

    public function update_person($id, $array){
        $this->db->update('user',
        $array, array('user_id' => $id));
    }
}
?>