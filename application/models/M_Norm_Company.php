<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Norm_Company extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function update($table = null, $data = null, $where = null)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function insert($table = '', $data = '')
    {
        $this->db->insert($table, $data);
    }
    function get_altern()
    {
        $this->db->select('*');
        $this->db->from('subcriteria');
        $this->db->join('normalisasi_alternative', 'normalisasi_alternative.id_subcriteria = subcriteria.id');
        $query = $this->db->get();

        return $query;
    }
}
