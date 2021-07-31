<?php

class M_ComparisonList extends CI_Model
{
    private $_table = "comparison_list";

    public function get_all()
    {
        $this->db->select("*");
        return $this->db->get($this->_table)->result();
    }

    public function get_by_id($id)
    {
        $this->db->select("*");
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->result();
    }

    public function updateCriteria($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function get_th()
    {
        $this->db->select("id, name");
        $this->db->order_by("id ASC");
        return $this->db->get($this->_table)->result();
    }

    public function count_row()
    {
        return $this->db->get($this->_table)->num_rows();
    }
}
