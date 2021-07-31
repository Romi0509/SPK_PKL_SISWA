<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_User extends CI_Model
{

    private $_table = "siswa";

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

    function insert($table = '', $data = '', $table1 = '', $data1 = '')
    {
        $this->db->insert($table, $data);
        $this->db->insert($table1, $data1);
    }

    function get_user()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $query = $this->db->get();

        return $query;
    }


    function get_data($id_siswa = null)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('normalisasi_siswa', 'normalisasi_siswa.id_siswa = siswa.id');
        if ($id_siswa != null) {

            $this->db->where('siswa.id', $id_siswa);
        }
        $query = $this->db->get();
        return $query;
    }

    function get_user_new($id_user)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('id != 1');
        $this->db->where('id', $id_user);

        $query = $this->db->get();

        return $query;
    }
    public function get_all()
    {
        $this->db->select('*');
        $this->db->where('id != 1');
        return $this->db->get($this->_table)->result();
    }
    function cek($nama_user)
    {
        $periksa = $this->db->get_where('siswa', array('nisn' => $nama_user));

        return $periksa;
    }
    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    public function anggota($id)
    {
        $this->db->select("*");
        $this->db->join("siswa", "user_detail_group.user_id=user.id");
        $this->db->order_by("user.id ASC");
        return $this->db->get("user_detail_group")->result();
    }
}
