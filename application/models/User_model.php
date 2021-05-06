<?php

class User_model extends CI_Model{

    public function get($where = array()){
        $row = $this->db->where($where)->get("kullanici")->row();
        return $row;
    }
}