<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Kriteria');
        // if (!$this->session->userdata('username')) {
        //     redirect('auth/login');
        // }
    }

    public function index()
    {
        $data['kriteria'] = $this->M_Kriteria->get_kriteria();
        $this->load->view('partial/header', $data);
        $this->load->view('partial/sidebar', $data);
        $this->load->view('partial/navbar', $data);
        // $this->load->view('partial/breadcrumb');

        $this->load->view('admin/kriteria', $data);
        $this->load->view('partial/footer', $data);
        $this->load->view('partial/js', $data);
    }

    public function tambah_kriteria()
    {
        $periksa = $this->M_Kriteria->cek($this->input->post('name'));

        if ($periksa->num_rows() > 0) {
            $this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
                    Kriteria Yang Dimasukkan Sudah ada!!!</div>');
            redirect('admin/kriteria');
        } else {
            $data = array(
                'name' => $this->input->post('name')
            );

            $this->M_Kriteria->insert('criteria', $data);
            $this->session->set_flashdata('success', '<div class ="alert alert-success" role="alert">
                    Kriteria Berhasil Ditambah </div>');
            redirect('admin/kriteria');
        }
    }

    public function delete_kriteria()
    {
        $id = $this->uri->segment(4);

        $where = array('id' => $id);
        $this->M_Kriteria->delete($where, 'criteria');
        $this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
        Kriteria Berhasil Dihapus </div>');

        redirect('admin/kriteria');
    }

    public function update_kriteria()
    {
        $id = $this->input->post('id');
        $data = array(
            'namea' => $this->input->post('namea')
        );
        $where = array('id' => $id);
        $this->M_Kriteria->update('criteria', $data, $where);
        $this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
        Kriteria Berhasil Diubah </div>');
        redirect('admin/kriteria');
    }
}
