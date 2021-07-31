<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['M_User']);
        // if (!$this->session->userdata('username')) {
        //     redirect('auth/login');
        // }
    }

    public function index()
    {
        $newdata = array(
            'username'  => 'ADMIN',
            'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);


        $this->load->view('partial/header');
        $this->load->view('partial/sidebar');
        $this->load->view('partial/navbar');
        // $this->load->view('partial/breadcrumb');

        $this->load->view('admin/dashboard');
        $this->load->view('partial/footer');
        $this->load->view('partial/js');
    }

    public function update_min()
    {

        $id = $this->input->post('id');
        $ss = $this->input->post('stok_ss');
        $st = $this->input->post('stok_brg');
        $stot = $ss + $st;

        $data = array(
            'stok' => $stot
        );

        $where = array('id_barang' => $id);
        $this->M_Barang->update('tb_barang', $data, $where);
        redirect('admin/dashboard');
    }
}
