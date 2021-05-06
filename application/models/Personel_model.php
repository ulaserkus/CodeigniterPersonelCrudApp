<?php


class Personel_model extends CI_Model
{

    public function list_all()
    {
        $list = $this->db->get("personel")->result();
        return $list;
    }

    public function get($where = array())
    {
        //get by id

        $row = $this->db->where($where)->get("personel")->row();

        return $row;
    }
    public function insert($data = array())
    {
        //adding method
        $insert = $this->db->insert("personel", $data);
        return $insert;
    }
    public function delete($where)
    {
        //deleting method
        $delete = $this->db->where($where)->delete("personel");
        return $delete;
    }
    public function update($where, $data)
    {
        //updating method
        $update = $this->db->where($where)->update("personel", $data);
        return $update;
    }
    public function order($field = "id", $order_by = "ASC")
    {
        //ordering method
        $order = $this->db->order_by($field, $order_by)->get("personel")->result();
        return $order;
    }
}
