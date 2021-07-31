<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubKriteria extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Subkriteria');
        // if (!$this->session->userdata('username')) {
        //     redirect('auth/login');
        // }
    }

    public function index()
    {
        $data['subkriteria'] = $this->M_Subkriteria->get_subkriteria();
        $this->load->view('partial/header', $data);
        $this->load->view('partial/sidebar', $data);
        $this->load->view('partial/navbar', $data);
        // $this->load->view('partial/breadcrumb');

        $this->load->view('admin/subkriteria', $data);
        $this->load->view('partial/footer', $data);
        $this->load->view('partial/js', $data);
    }

    public function tambah_sub_kriteria()
    {
        $periksa = $this->M_Subkriteria->cek($this->input->post('name'));

        if ($periksa->num_rows() > 0) {
            $this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
                    Sub Kriteria Yang Dimasukkan Sudah ada!!!</div>');
            redirect('admin/subkriteria');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'id' => $this->input->post('id')
            );

            $this->M_Subkriteria->insert('subcriteria', $data);
            $this->session->set_flashdata('success', '<div class ="alert alert-success" role="alert">
                    Sub Kriteria Berhasil Ditambah </div>');
            redirect('admin/subkriteria');
        }
    }

    public function delete_sub_kriteria()
    {
        $id = $this->uri->segment(4);

        $where = array('id' => $id);
        $this->M_Subkriteria->delete($where, 'subcriteria');
        $this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
        Sub Kriteria Berhasil Dihapus </div>');

        redirect('admin/subkriteria');
    }

    public function update_sub_kriteria()
    {
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name'),
            'id' => $this->input->post('id')
        );
        $where = array('id' => $id);
        $this->M_Subkriteria->update('subcriteria', $data, $where);
        $this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
        Sub Kriteria Berhasil Diubah </div>');
        redirect('admin/subkriteria');
    }
}
