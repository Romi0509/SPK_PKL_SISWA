<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Perusahaan');
        // if (!$this->session->userdata('username')) {
        //     redirect('auth/login');
        // }
    }

    public function index()
    {
        $data['perusahaan'] = $this->M_Perusahaan->get_perusahaan();
        $this->load->view('partial/header', $data);
        $this->load->view('partial/sidebar', $data);
        $this->load->view('partial/navbar', $data);
        // $this->load->view('partial/breadcrumb');

        $this->load->view('admin/perusahaan', $data);
        $this->load->view('partial/footer', $data);
        $this->load->view('partial/js', $data);
    }

    public function tambah_perusahaan()
    {
        $periksa = $this->M_Perusahaan->cek($this->input->post('name'));

        if ($periksa->num_rows() > 0) {
            $this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
                    Perusahaan Yang Dimasukkan Sudah ada!!!</div>');
            redirect('admin/perusahaan');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city')
            );

            $this->M_Perusahaan->insert('company', $data);
            $this->session->set_flashdata('success', '<div class ="alert alert-success" role="alert">
                    Perusahaan Berhasil Ditambah </div>');
            redirect('admin/perusahaan');
        }
    }

    public function delete_perusahaan()
    {
        $id = $this->uri->segment(4);

        $where = array('id' => $id);
        $this->M_Perusahaan->delete($where, 'company');
        $this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
        Perusahaan Berhasil Dihapus </div>');

        redirect('admin/perusahaan');
    }

    public function update_perusahaan()
    {
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city')
        );
        $where = array('id' => $id);
        $this->M_Perusahaan->update('company', $data, $where);
        $this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
        Perusahaan Berhasil Diubah </div>');
        redirect('admin/perusahaan');
    }
}
