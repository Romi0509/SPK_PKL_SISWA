<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Kriteria extends CI_Model
{

    private $_table = "criteria";

    function __construct()
    {
        parent::__construct();
    }

    function update($table = null, $data = null, $where = null)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete($id, $table)
    {
        $this->db->where($id);
        $this->db->delete($table);
    }

    function insert($table = '', $data = '')
    {
        $this->db->insert($table, $data);
    }

    function get_kriteria()
    {
        $this->db->select('*');
        $this->db->from('criteria');
        $query = $this->db->get();

        return $query;
    }
    function cek($name)
    {
        $periksa = $this->db->get_where('criteria', array('name' => $name));

        return $periksa;
    }

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

    public function cekDataTR($id)
    {
        $this->db->select("*");
        $this->db->where("user_id", $id);
        return $this->db->get("tr_comparison_criteria")->result();
    }

    public function addWeightCriteria($data)
    {
        $this->db->insert("tr_comparison_criteria", $data);
    }

    public function deleteWeightCriteria($where)
    {
        $this->db->where($where);
        $this->db->delete("tr_comparison_criteria");
    }

    public function cekDataBobot($id)
    {
        $this->db->select("*");
        $this->db->where("user_id", $id);
        return $this->db->get("weight_criteria")->result();
    }

    public function addValueWeightCriteria($data)
    {
        $this->db->insert("weight_criteria", $data);
    }

    public function deleteValueWeightCriteria($where)
    {
        $this->db->where($where);
        $this->db->delete("weight_criteria");
    }

    public function get_th_weight()
    {
        $this->db->select("*");
        $this->db->order_by("id ASC");
        return $this->db->get("weight_criteria")->result();
    }

    public function get_th_weightPerson($id)
    {
        $this->db->select("*");
        $this->db->where("user_id", $id);
        $this->db->order_by("id ASC");
        return $this->db->get("weight_criteria")->result();
    }
}
