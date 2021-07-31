<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        // if (!$this->session->userdata('nisn')) {
        //     redirect('auth/login');
        // }
    }

    public function index()
    {
        $data['user'] = $this->M_User->get_user();
        $this->load->view('partial/header', $data);
        $this->load->view('partial/sidebar', $data);
        $this->load->view('partial/navbar', $data);
        // $this->load->view('partial/breadcrumb');

        $this->load->view('admin/user', $data);
        $this->load->view('partial/footer', $data);
        $this->load->view('partial/js', $data);
    }

    public function cvNilai($n)
    {
        $nilai_fix = 0;
        if ($n <= 70) {
            $nilai_fix = 1;
        } elseif ($n > 71 && $n <= 75) {
            $nilai_fix = 2;
        } elseif ($n > 76 && $n <= 80) {
            $nilai_fix = 3;
        } elseif ($n > 81 && $n <= 85) {
            $nilai_fix = 4;
        } elseif ($n > 86 && $n <= 90) {
            $nilai_fix = 5;
        } elseif ($n > 91 && $n <= 95) {
            $nilai_fix = 6;
        } else {
            $nilai_fix = 7;
        }
        return $nilai_fix;
    }

    public function cvSikap($n)
    {
        $nilai_fix = 0;
        if ($n == "kurang") {
            $nilai_fix = 1;
        } elseif ($n == "cukup") {
            $nilai_fix = 2;
        } else {
            $nilai_fix = 3;
        }

        return $nilai_fix;
    }

    public function tambah_user()
    {
        $periksa = $this->M_User->cek($this->input->post('nisn'));

        if ($periksa->num_rows() > 0) {
            $this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
                    Kategori Yang Dimasukkan Sudah ada!!!</div>');
            redirect('admin/user');
        } else {
            $data = array(
                'nisn' => $this->input->post('nisn'),
                'name' => $this->input->post('name'),
                'komunikasi_data' => $this->input->post('komunikasi_data'),
                'rangkaian_elektronik' => $this->input->post('rangkaian_elektronik'),
                'perekayasaan_sistem_kontrol' => $this->input->post('perekayasaan_sistem_kontrol'),
                'sensor_aktuator' => $this->input->post('sensor_aktuator'),
                'gambar_teknik' => $this->input->post('gambar_teknik'),
                'komunikasi' => $this->input->post('komunikasi'),
                'etika' => $this->input->post('etika'),
                'nilai_semester' => $this->input->post('nilai_semester')
            );
            $komdat = $this->cvNilai($this->input->post('komunikasi_data'));
            $elekt = $this->cvNilai($this->input->post('rangkaian_elektronik'));
            $rekayas = $this->cvNilai($this->input->post('perekayasaan_sistem_kontrol'));
            $sentu = $this->cvNilai($this->input->post('sensor_aktuator'));
            $gambar = $this->cvNilai($this->input->post('gambar_teknik'));
            $semes = $this->cvNilai($this->input->post('nilai_semester'));
            $komunik = $this->cvSikap($this->input->post('komunikasi'));
            $etik = $this->cvSikap($this->input->post('etika'));

            $this->db->insert('siswa', $data);
            $id_siswa = $this->db->insert_id();

            $data1 = array(
                'id_siswa' => $id_siswa,
                'komunikasi_data' => $komdat,
                'rangkaian_elektronik' => $elekt,
                'perekayasaan_sistem_kontrol' => $rekayas,
                'sensor_aktuator' => $sentu,
                'gambar_teknik' => $gambar,
                'komunikasi' => $komunik,
                'etika' => $etik,
                'nilai_semester' => $semes
            );

            $this->db->insert('normalisasi_siswa', $data1);

            $this->session->set_flashdata('success', '<div class ="alert alert-success" role="alert">
                    User Berhasil Ditambah </div>');
            redirect('admin/user');
        }
    }

    public function delete_user()
    {
        $id = $this->uri->segment(4);

        $where = array('id' => $id);
        $this->M_User->delete($where, 'siswa');
        $this->M_User->delete(['id_siswa' => $id], 'normalisasi_siswa');
        $this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
        User Berhasil Dihapus </div>');

        redirect('admin/user');
    }

    public function update_user()
    {
        $id = $this->input->post('id');
        $data = array(
            'nisn' => $this->input->post('nisn'),
            'name' => $this->input->post('name'),
            'komunikasi_data' => $this->input->post('komunikasi_data'),
            'rangkaian_elektronik' => $this->input->post('rangkaian_elektronik'),
            'perekayasaan_sistem_kontrol' => $this->input->post('perekayasaan_sistem_kontrol'),
            'sensor_aktuator' => $this->input->post('sensor_aktuator'),
            'gambar_teknik' => $this->input->post('gambar_teknik'),
            'komunikasi' => $this->input->post('komunikasi'),
            'etika' => $this->input->post('etika'),
            'nilai_semester' => $this->input->post('nilai_semester')
        );

        $komdat = $this->cvNilai($this->input->post('komunikasi_data'));
        $elekt = $this->cvNilai($this->input->post('rangkaian_elektronik'));
        $rekayas = $this->cvNilai($this->input->post('perekayasaan_sistem_kontrol'));
        $sentu = $this->cvNilai($this->input->post('sensor_aktuator'));
        $gambar = $this->cvNilai($this->input->post('gambar_teknik'));
        $semes = $this->cvNilai($this->input->post('nilai_semester'));
        $komunik = $this->cvSikap($this->input->post('komunikasi'));
        $etik = $this->cvSikap($this->input->post('etika'));

        $data1 = array(

            'komunikasi_data' => $komdat,
            'rangkaian_elektronik' => $elekt,
            'perekayasaan_sistem_kontrol' => $rekayas,
            'sensor_aktuator' => $sentu,
            'gambar_teknik' => $gambar,
            'komunikasi' => $komunik,
            'etika' => $etik,
            'nilai_semester' => $semes
        );
        $where = array('id' => $id);
        $this->M_User->update('siswa', $data, $where);
        $this->M_User->update('normalisasi_siswa', $data1, ['id_siswa' => $id]);
        $this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
        User Berhasil Diubah </div>');
        redirect('admin/user');
    }
}
