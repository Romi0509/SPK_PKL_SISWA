<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Perusahaan extends CI_Model
{

    private $_table = "company";

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

    function get_perusahaan()
    {
        $this->db->select('*');
        $this->db->from('company');
        $query = $this->db->get();

        return $query;
    }
    function cek($name)
    {
        $periksa = $this->db->get_where('company', array('name' => $name));

        return $periksa;
    }

    public function get_all()
    {
        $this->db->select("*");
        return $this->db->get($this->_table)->result();
    }

    public function addCompany($data)
    {
        $this->db->insert($this->_table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function get_by_id($id)
    {
        $this->db->select("*");
        $this->db->where("id", $id);
        return $this->db->get($this->_table)->result();
    }

    public function updateCompany($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update($this->_table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteCompany($id)
    {
        $this->db->where("id", $id);
        $this->db->update($this->_table, ["is_deleted" => "y"]);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
