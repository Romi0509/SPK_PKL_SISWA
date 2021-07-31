<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Subkriteria extends CI_Model
{

    private $_table = 'subcriteria';

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

    function get_subkriteria()
    {
        $this->db->select('subcriteria.id, subcriteria.name, criteria.name as criterianame');
        $this->db->join('criteria', 'criteria.id = subcriteria.id_criteria');
        $this->db->from('subcriteria');
        $query = $this->db->get();

        return $query;
    }
    function cek($name)
    {
        $periksa = $this->db->get_where('subcriteria', array('name' => $name));

        return $periksa;
    }

    public function get_all()
    {
        $this->db->select('subcriteria.id, subcriteria.name, criteria.name as criterianame');
        $this->db->join('criteria', 'criteria.id = subcriteria.id_criteria');
        return $this->db->get($this->_table)->result();
    }
    public function get_all_orderBy()
    {
        $this->db->select('subcriteria.id, subcriteria.name, criteria.name as criterianame');
        $this->db->join('criteria', 'criteria.id = subcriteria.id_criteria');
        $this->db->order_by('subcriteria.id_criteria', 'ASC');
        return $this->db->get($this->_table)->result();
    }

    public function get_by_id($id)
    {
        $this->db->select("*");
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->result();
    }

    public function updateSubCriteria($id, $data)
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
        return $this->db->get("tr_comparison_subcriteria")->result();
    }

    public function addWeightSubCriteria($data)
    {
        $this->db->insert("tr_comparison_subcriteria", $data);
    }

    public function deleteWeightSubCriteria($where)
    {
        $this->db->where($where);
        $this->db->delete("tr_comparison_subcriteria");
    }

    public function cekDataBobot($id)
    {
        $this->db->select("*");
        $this->db->where("user_id", $id);
        return $this->db->get("weight_subcriteria")->result();
    }

    public function addValueWeightSubCriteria($data)
    {
        $this->db->insert("weight_subcriteria", $data);
    }

    public function deleteValueWeightSubCriteria($where)
    {
        $this->db->where($where);
        $this->db->delete("weight_subcriteria");
    }

    public function get_th_weight()
    {
        $this->db->select("weight_subcriteria.subcriteria_id, subcriteria.id_criteria, weight_subcriteria.weight_subcriteria");
        $this->db->join('subcriteria', 'weight_subcriteria.subcriteria_id = subcriteria.id');
        $this->db->order_by("weight_subcriteria.subcriteria_id ASC");
        return $this->db->get("weight_subcriteria")->result();
    }

    public function get_th_weightPerson($id)
    {
        $this->db->select("weight_subcriteria.subcriteria_id, subcriteria.id_criteria, weight_subcriteria.weight_subcriteria");
        $this->db->join('subcriteria', 'weight_subcriteria.subcriteria_id = subcriteria.id');
        $this->db->where("user_id", $id);
        $this->db->order_by("weight_subcriteria.subcriteria_id ASC");
        return $this->db->get("weight_subcriteria")->result();
    }
}
